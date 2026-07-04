<div id="ppsy-chat-widget" class="ppsy-chat-widget">
    <button type="button" id="ppsy-chat-toggle" class="ppsy-chat-toggle" aria-label="Open chat assistant" aria-expanded="false" aria-controls="ppsy-chat-panel">
        <iconify-icon icon="tabler:message-chatbot" class="ppsy-chat-toggle-icon-open"></iconify-icon>
        <iconify-icon icon="tabler:x" class="ppsy-chat-toggle-icon-close"></iconify-icon>
    </button>

    <div id="ppsy-chat-panel" class="ppsy-chat-panel" role="dialog" aria-label="Chat with {{ config('app.name') }}" hidden>
        <div class="ppsy-chat-header">
            <div class="ppsy-chat-header-title">
                <img src="{{ $settings->logo_url ?? asset('assets/frontend/images/brand-logo.png') }}" alt="" class="ppsy-chat-header-logo">
                <div>
                    <p class="ppsy-chat-header-name">{{ config('app.name') }} Assistant</p>
                    <p class="ppsy-chat-header-status">Ask about our products &amp; certifications</p>
                </div>
            </div>
            <button type="button" id="ppsy-chat-close" class="ppsy-chat-close" aria-label="Close chat">
                <iconify-icon icon="tabler:x"></iconify-icon>
            </button>
        </div>

        <div id="ppsy-chat-messages" class="ppsy-chat-messages" aria-live="polite">
            <div class="ppsy-chat-message ppsy-chat-message-assistant">
                <p>Hi! I can answer questions about our psyllium husk products, certifications, and company. How can I help?</p>
            </div>
        </div>

        <div id="ppsy-chat-suggestions" class="ppsy-chat-suggestions" hidden></div>

        <form id="ppsy-chat-escalation" class="ppsy-chat-escalation" method="POST" action="{{ route('contact.store') }}" hidden>
            @csrf
            <input type="hidden" name="source" value="chatbot">
            <input type="hidden" name="session_id" id="ppsy-chat-escalation-session">
            <input type="hidden" name="product_interest" value="General Enquiry (via Chatbot)">
            <p class="ppsy-chat-escalation-hint">Let our team follow up with you directly:</p>

            <label class="ppsy-chat-field-label" for="ppsy-chat-escalation-name">Your name</label>
            <input type="text" name="name" id="ppsy-chat-escalation-name" placeholder="John Doe" required class="ppsy-chat-input-field">

            <label class="ppsy-chat-field-label" for="ppsy-chat-escalation-email">Your email</label>
            <input type="email" name="email" id="ppsy-chat-escalation-email" placeholder="you@company.com" required class="ppsy-chat-input-field">

            <label class="ppsy-chat-field-label" for="ppsy-chat-escalation-company">Company <span class="ppsy-chat-field-optional">(optional)</span></label>
            <input type="text" name="company" id="ppsy-chat-escalation-company" placeholder="Your company name" class="ppsy-chat-input-field">

            <label class="ppsy-chat-field-label" for="ppsy-chat-escalation-message">Your message</label>
            <textarea name="message" id="ppsy-chat-escalation-message" rows="3" required class="ppsy-chat-input-field"></textarea>

            <button type="submit" class="ppsy-chat-send ppsy-chat-send-block">
                <iconify-icon icon="tabler:send-2"></iconify-icon>
                <span>Send to our team</span>
            </button>
        </form>

        <form id="ppsy-chat-form" class="ppsy-chat-form">
            <textarea id="ppsy-chat-input" class="ppsy-chat-input-field" rows="1" placeholder="Type your question…" maxlength="2000" required></textarea>
            <button type="submit" class="ppsy-chat-send" aria-label="Send message">
                <iconify-icon icon="tabler:send-2"></iconify-icon>
            </button>
        </form>
    </div>
</div>

<script>
    window.ChatWidgetConfig = {
        endpoint: @json(route('chat.send')),
        csrfToken: @json(csrf_token()),
    };
</script>
