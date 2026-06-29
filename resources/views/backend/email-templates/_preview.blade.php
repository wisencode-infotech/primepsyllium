<div class="sticky top-6 p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
    <h3 class="font-semibold text-text mb-1">Email Preview</h3>
    <p class="text-sm text-text-muted mb-4">Live preview using sample data, styled with your <a href="{{ route('admin.email-branding.edit') }}" class="underline hover:text-text">Email Branding</a> colors.</p>

    <div class="rounded-md bg-surface border border-border px-4 py-2.5 text-center text-sm mb-4">
        <span class="text-text-muted">Subject:</span>
        <span class="font-semibold text-text" x-text="renderedSubject()"></span>
    </div>

    <div class="overflow-hidden rounded-lg border border-border">
        <div class="flex items-center gap-3 px-5 py-4" style="background-color: {{ $setting->email_primary_color }}">
            @if ($setting->email_logo_url)
                <img src="{{ $setting->email_logo_url }}" alt="{{ $setting->email_brand_name }}" class="h-8 w-8 rounded object-contain bg-white p-1">
            @endif
            <div>
                <p class="font-bold text-white">{{ $setting->email_brand_name }}</p>
                <p class="text-xs text-white/80">Official Communications</p>
            </div>
        </div>

        <div
            class="px-5 py-6 text-sm [&_p]:mb-3 [&_p:last-child]:mb-0 [&_strong]:font-semibold [&_ul]:mb-3 [&_ul]:list-disc [&_ul]:pl-5 [&_ol]:mb-3 [&_ol]:list-decimal [&_ol]:pl-5 [&_a]:underline"
            style="background-color: {{ $setting->email_background_color }}; color: {{ $setting->email_text_color }}; line-height: 1.6;"
            x-html="renderedBody()"
        ></div>

        <div class="px-5 py-4 text-center text-xs text-white/80" style="background-color: {{ $setting->email_secondary_color }}">
            <p class="font-semibold text-white">You are receiving this email from {{ $setting->email_brand_name }}.</p>
            @if ($setting->address)
                <p class="mt-1">{{ $setting->address }}</p>
            @endif
            <p class="mt-1">&copy; {{ now()->year }} {{ $setting->email_brand_name }}. All rights reserved.</p>
        </div>
    </div>
</div>
