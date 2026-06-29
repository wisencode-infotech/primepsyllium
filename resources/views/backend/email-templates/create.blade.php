<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Add Email Template
        </h2>
    </x-slot>

    <div
        x-data="{
            subject: @js(old('subject', '')),
            body: @js(old('body', '')),
            sample: @js($sampleData),
            renderedSubject() {
                let value = this.subject || '(No subject yet)';
                for (const [token, replacement] of Object.entries(this.sample)) {
                    value = value.split(token).join(replacement);
                }
                return value;
            },
            renderedBody() {
                let value = this.body || '<p class=\'opacity-60\'>Your email body preview will appear here&hellip;</p>';
                for (const [token, replacement] of Object.entries(this.sample)) {
                    value = value.split(token).join(replacement);
                }
                return value;
            },
        }"
        class="grid grid-cols-1 gap-6 lg:grid-cols-3"
    >
        @if (session('status'))
            <div class="lg:col-span-3 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="lg:col-span-2">
            <form method="POST" action="{{ route('admin.email-templates.store') }}">
                @include('backend.email-templates._form')
            </form>
        </div>

        <div class="lg:col-span-1">
            @include('backend.email-templates._preview')
        </div>
    </div>
</x-backend-layout>
