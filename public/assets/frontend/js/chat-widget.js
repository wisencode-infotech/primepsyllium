(function () {
    'use strict';

    var config = window.ChatWidgetConfig || {};
    var SESSION_STORAGE_KEY = 'ppsy_chat_session_id';

    function getSessionId() {
        var sessionId = localStorage.getItem(SESSION_STORAGE_KEY);

        if (!sessionId) {
            sessionId = (crypto.randomUUID ? crypto.randomUUID() : String(Date.now()) + Math.random().toString(16).slice(2));
            localStorage.setItem(SESSION_STORAGE_KEY, sessionId);
        }

        return sessionId;
    }

    document.addEventListener('DOMContentLoaded', function () {
        var widget = document.getElementById('ppsy-chat-widget');

        if (!widget) {
            return;
        }

        var toggleBtn = document.getElementById('ppsy-chat-toggle');
        var closeBtn = document.getElementById('ppsy-chat-close');
        var panel = document.getElementById('ppsy-chat-panel');
        var messagesEl = document.getElementById('ppsy-chat-messages');
        var suggestionsEl = document.getElementById('ppsy-chat-suggestions');
        var form = document.getElementById('ppsy-chat-form');
        var input = document.getElementById('ppsy-chat-input');
        var escalationForm = document.getElementById('ppsy-chat-escalation');
        var escalationSessionField = document.getElementById('ppsy-chat-escalation-session');
        var escalationMessageField = document.getElementById('ppsy-chat-escalation-message');
        var sessionId = getSessionId();
        var sending = false;

        escalationSessionField.value = sessionId;

        function openPanel() {
            widget.classList.add('is-open');
            panel.hidden = false;
            toggleBtn.setAttribute('aria-expanded', 'true');
            input.focus();
        }

        function closePanel() {
            widget.classList.remove('is-open');
            panel.hidden = true;
            toggleBtn.setAttribute('aria-expanded', 'false');
        }

        toggleBtn.addEventListener('click', function () {
            if (panel.hidden) {
                openPanel();
            } else {
                closePanel();
            }
        });

        closeBtn.addEventListener('click', closePanel);

        function scrollToBottom() {
            messagesEl.scrollTop = messagesEl.scrollHeight;
        }

        function appendMessage(role, text) {
            var bubble = document.createElement('div');
            bubble.className = 'ppsy-chat-message ppsy-chat-message-' + role;

            var paragraph = document.createElement('p');
            paragraph.textContent = text;
            bubble.appendChild(paragraph);

            messagesEl.appendChild(bubble);
            scrollToBottom();

            return bubble;
        }

        function appendSources(bubble, sources) {
            if (!sources || sources.length === 0) {
                return;
            }

            var wrap = document.createElement('div');
            wrap.className = 'ppsy-chat-message-sources';

            sources.forEach(function (source) {
                if (source.url) {
                    var link = document.createElement('a');
                    link.href = source.url;
                    link.target = '_blank';
                    link.rel = 'noopener';
                    link.textContent = source.title;
                    wrap.appendChild(link);
                } else {
                    var span = document.createElement('span');
                    span.textContent = source.title;
                    wrap.appendChild(span);
                }
            });

            bubble.appendChild(wrap);
        }

        function showTyping() {
            var typing = document.createElement('div');
            typing.className = 'ppsy-chat-typing';
            typing.id = 'ppsy-chat-typing-indicator';
            typing.innerHTML = '<span></span><span></span><span></span>';
            messagesEl.appendChild(typing);
            scrollToBottom();
        }

        function hideTyping() {
            var typing = document.getElementById('ppsy-chat-typing-indicator');

            if (typing) {
                typing.remove();
            }
        }

        function renderSuggestions(suggestions) {
            suggestionsEl.innerHTML = '';

            if (!suggestions || suggestions.length === 0) {
                suggestionsEl.hidden = true;

                return;
            }

            suggestions.forEach(function (suggestion) {
                var chip = document.createElement('button');
                chip.type = 'button';
                chip.className = 'ppsy-chat-suggestion-chip';
                chip.textContent = suggestion;
                chip.addEventListener('click', function () {
                    suggestionsEl.hidden = true;
                    sendMessage(suggestion);
                });
                suggestionsEl.appendChild(chip);
            });

            suggestionsEl.hidden = false;
        }

        function showEscalationForm(lastQuestion) {
            escalationMessageField.value = lastQuestion;
            escalationForm.hidden = false;
            form.hidden = true;
        }

        function sendMessage(message) {
            if (sending || !message) {
                return;
            }

            sending = true;
            appendMessage('user', message);
            suggestionsEl.hidden = true;
            showTyping();

            fetch(config.endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': config.csrfToken,
                },
                body: JSON.stringify({ message: message, session_id: sessionId }),
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    hideTyping();

                    if (data.session_id) {
                        sessionId = data.session_id;
                        localStorage.setItem(SESSION_STORAGE_KEY, sessionId);
                        escalationSessionField.value = sessionId;
                    }

                    var bubble = appendMessage('assistant', data.answer || "Sorry, I couldn't process that.");
                    appendSources(bubble, data.sources);

                    if (data.escalate) {
                        showEscalationForm(message);
                    } else {
                        renderSuggestions(data.suggested_follow_ups);
                    }
                })
                .catch(function () {
                    hideTyping();
                    appendMessage('assistant', "I'm having trouble connecting right now — please try again shortly.");
                })
                .finally(function () {
                    sending = false;
                });
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            var message = input.value.trim();

            if (!message) {
                return;
            }

            input.value = '';
            sendMessage(message);
        });

        input.addEventListener('keydown', function (event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                form.requestSubmit();
            }
        });

        escalationForm.addEventListener('submit', function () {
            var button = escalationForm.querySelector('.ppsy-chat-send');
            button.disabled = true;
            button.querySelector('span').textContent = 'Sending…';
        });
    });
})();
