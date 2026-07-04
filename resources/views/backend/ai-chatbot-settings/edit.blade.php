<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            AI Chatbot Settings
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto space-y-6">
        @if (session('status'))
            <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
            <h3 class="font-semibold text-text mb-1">Cloudflare AI Gateway Connection</h3>
            <p class="text-sm text-text-muted mb-4">
                These settings connect the chat widget to its AI backend (a Cloudflare Worker). If you ever redeploy
                the Worker to a new URL, or rotate its secret key, update them here — no code changes or developer
                needed.
            </p>

            <form method="POST" action="{{ route('admin.ai-chatbot-settings.update') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="chat_gateway_url" value="Worker URL" />
                    <x-text-input
                        id="chat_gateway_url"
                        name="chat_gateway_url"
                        type="url"
                        class="mt-1 block w-full"
                        :value="old('chat_gateway_url', $setting->chat_gateway_url)"
                        placeholder="https://primepsyllium-ai-gateway.your-subdomain.workers.dev"
                    />
                    <p class="mt-1 text-xs text-text-muted">
                        Found in the Cloudflare dashboard under Workers &amp; Pages &rarr; your worker &rarr; Domains.
                    </p>
                    <x-input-error class="mt-2" :messages="$errors->get('chat_gateway_url')" />
                </div>

                <div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="chat_gateway_secret" value="Shared Secret" />
                        @if ($setting->chat_gateway_secret)
                            <span class="pill pill-success">Configured</span>
                        @else
                            <span class="pill pill-danger">Not set</span>
                        @endif
                    </div>
                    <x-text-input
                        id="chat_gateway_secret"
                        name="chat_gateway_secret"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="new-password"
                        placeholder="Leave blank to keep the current secret"
                    />
                    <p class="mt-1 text-xs text-text-muted">
                        Must exactly match the value set on the Worker via <code class="bg-surface px-1 py-0.5 rounded">wrangler secret put GATEWAY_SHARED_SECRET</code>.
                        For security, the current value is never shown here — leave this blank to keep it unchanged.
                    </p>
                    <x-input-error class="mt-2" :messages="$errors->get('chat_gateway_secret')" />
                </div>

                <div>
                    <x-input-label for="chat_gateway_timeout" value="Request Timeout (seconds)" />
                    <x-text-input
                        id="chat_gateway_timeout"
                        name="chat_gateway_timeout"
                        type="number"
                        min="1"
                        max="120"
                        class="mt-1 block w-40"
                        :value="old('chat_gateway_timeout', $setting->chat_gateway_timeout ?? 15)"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('chat_gateway_timeout')" />
                </div>

                <div class="pt-2">
                    <x-primary-button>Save Settings</x-primary-button>
                </div>
            </form>
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
            <h3 class="font-semibold text-text mb-1">What this page does not control</h3>
            <p class="text-sm text-text-muted">
                The AI model/provider (e.g. switching from the current open-source model to a different one) is
                configured inside the Cloudflare Worker itself, not here — changing it still requires a developer to
                update the Worker's configuration and redeploy it. This page only controls how your website connects
                to whichever Worker is currently deployed.
            </p>
        </div>
    </div>
</x-backend-layout>
