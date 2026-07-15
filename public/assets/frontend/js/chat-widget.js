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
        var escalationCloseBtn = document.getElementById('ppsy-chat-escalation-close');
        var escalationErrorEl = document.getElementById('ppsy-chat-escalation-error');
        var turnstileContainer = document.getElementById('ppsy-chat-turnstile');
        var turnstileWidgetId = null;
        var sessionId = getSessionId();
        var sending = false;

        escalationSessionField.value = sessionId;

        var mobileQuery = window.matchMedia('(max-width: 640px)');

        function openPanel() {
            widget.classList.add('is-open');
            panel.hidden = false;
            toggleBtn.setAttribute('aria-expanded', 'true');

            if (mobileQuery.matches) {
                // Full-screen on mobile: freeze the page behind the panel and
                // let the user tap the input themselves instead of forcing
                // the keyboard open.
                document.body.classList.add('ppsy-chat-lock');
            } else {
                input.focus();
            }
        }

        function closePanel() {
            widget.classList.remove('is-open');
            panel.hidden = true;
            toggleBtn.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('ppsy-chat-lock');
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

        function whenTurnstileReady(callback, attemptsLeft) {
            attemptsLeft = attemptsLeft === undefined ? 50 : attemptsLeft;

            if (window.turnstile) {
                callback(window.turnstile);

                return;
            }

            if (attemptsLeft <= 0) {
                return;
            }

            setTimeout(function () {
                whenTurnstileReady(callback, attemptsLeft - 1);
            }, 100);
        }

        function renderEscalationTurnstile() {
            if (!turnstileContainer || !config.turnstileSiteKey || turnstileWidgetId !== null) {
                return;
            }

            whenTurnstileReady(function (turnstile) {
                turnstileWidgetId = turnstile.render(turnstileContainer, {
                    sitekey: config.turnstileSiteKey,
                    size: 'flexible',
                });
            });
        }

        function resetEscalationTurnstile() {
            if (turnstileWidgetId === null) {
                return;
            }

            whenTurnstileReady(function (turnstile) {
                turnstile.reset(turnstileWidgetId);
            });
        }

        function showEscalationForm(lastQuestion) {
            escalationMessageField.value = lastQuestion;
            escalationForm.hidden = false;
            form.hidden = true;
            panel.classList.add('is-escalating');
            renderEscalationTurnstile();
        }

        function hideEscalationError() {
            if (escalationErrorEl) {
                escalationErrorEl.hidden = true;
                escalationErrorEl.textContent = '';
            }
        }

        function showEscalationError(message) {
            if (escalationErrorEl) {
                escalationErrorEl.textContent = message;
                escalationErrorEl.hidden = false;
            }
        }

        function hideEscalationForm() {
            escalationForm.hidden = true;
            form.hidden = false;
            panel.classList.remove('is-escalating');
            escalationForm.reset();
            escalationSessionField.value = sessionId;
            hideEscalationError();
            resetEscalationTurnstile();
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

        escalationCloseBtn.addEventListener('click', hideEscalationForm);

        escalationForm.addEventListener('submit', function (event) {
            event.preventDefault();

            var button = escalationForm.querySelector('.ppsy-chat-send');
            var buttonLabel = button.querySelector('span');

            hideEscalationError();
            button.disabled = true;
            buttonLabel.textContent = 'Sending…';

            fetch(escalationForm.action, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': config.csrfToken,
                },
                body: new FormData(escalationForm),
            })
                .then(function (response) {
                    return response.json().then(function (data) {
                        return { ok: response.ok, data: data };
                    });
                })
                .then(function (result) {
                    if (result.ok) {
                        hideEscalationForm();
                        appendMessage('assistant', result.data.message || 'Thank you for reaching out. Our team will get back to you shortly.');
                    } else {
                        var errors = result.data.errors;
                        var message = (errors && Object.values(errors)[0][0]) || result.data.message || 'Something went wrong. Please try again.';
                        showEscalationError(message);
                        resetEscalationTurnstile();
                    }
                })
                .catch(function () {
                    showEscalationError("I'm having trouble connecting right now — please try again shortly.");
                })
                .finally(function () {
                    button.disabled = false;
                    buttonLabel.textContent = 'Send to our team';
                });
        });
    });
})();
