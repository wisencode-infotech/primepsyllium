<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Email Brand Identity
        </h2>
    </x-slot>

    <div
        x-data="{
            brandName: @js(old('email_brand_name', $setting->email_brand_name)),
            websiteUrl: @js(old('email_website_url', $setting->email_website_url)),
            logoPreview: @js($setting->email_logo_url),
            colors: {
                primary: @js(old('email_primary_color', $setting->email_primary_color)),
                secondary: @js(old('email_secondary_color', $setting->email_secondary_color)),
                accent: @js(old('email_accent_color', $setting->email_accent_color)),
                text: @js(old('email_text_color', $setting->email_text_color)),
                background: @js(old('email_background_color', $setting->email_background_color)),
                button: @js(old('email_button_color', $setting->email_button_color)),
                buttonText: @js(old('email_button_text_color', $setting->email_button_text_color)),
            },
        }"
        class="grid grid-cols-1 gap-6 lg:grid-cols-3"
    >
        @if (session('status'))
            <div class="lg:col-span-3 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="lg:col-span-2 space-y-6">
            <form method="POST" action="{{ route('admin.email-branding.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-4 sm:p-8 bg-surface-elevated shadow sm:rounded-lg">
                    <h3 class="font-semibold text-text mb-1">Basic Brand Information</h3>
                    <p class="text-sm text-text-muted mb-6">Configure the brand settings that appear in all system and transactional emails.</p>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <x-input-label for="email_brand_name" value="Brand Name" />
                            <x-text-input
                                id="email_brand_name"
                                name="email_brand_name"
                                type="text"
                                class="mt-1 block w-full"
                                x-model="brandName"
                                required
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('email_brand_name')" />
                        </div>

                        <div>
                            <x-input-label for="email_website_url" value="Website URL" />
                            <x-text-input
                                id="email_website_url"
                                name="email_website_url"
                                type="text"
                                class="mt-1 block w-full"
                                x-model="websiteUrl"
                                required
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('email_website_url')" />
                        </div>
                    </div>

                    <div class="mt-6" x-data="{ fileName: null }">
                        <x-input-label for="email_logo" value="Brand Logo" />

                        <div class="mt-1 flex items-center gap-4">
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-lg border border-border bg-surface object-contain p-1">
                                <img x-show="logoPreview" :src="logoPreview" class="h-full w-full object-contain">
                                <span x-show="!logoPreview" class="text-xs text-text-muted">No logo</span>
                            </div>

                            <div>
                                <input
                                    id="email_logo"
                                    name="email_logo"
                                    type="file"
                                    accept="image/png,image/jpeg,image/webp,image/svg+xml"
                                    class="block w-full text-sm text-text-muted file:mr-3 file:rounded-md file:border-0 file:bg-surface-muted file:px-3 file:py-2 file:text-sm file:font-semibold file:text-text hover:file:bg-border"
                                    @change="
                                        const file = $event.target.files[0];
                                        if (file) {
                                            fileName = file.name;
                                            logoPreview = URL.createObjectURL(file);
                                        }
                                    "
                                >
                                <p class="mt-1 text-xs text-text-muted">PNG, JPG, WebP or SVG. Max 2 MB. Leave blank to use your site logo.</p>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('email_logo')" />
                    </div>
                </div>

                <div class="mt-6 p-4 sm:p-8 bg-surface-elevated shadow sm:rounded-lg">
                    <h3 class="font-semibold text-text mb-1">Brand Colors</h3>
                    <p class="text-sm text-text-muted mb-6">Used for the header, footer, buttons and accents across all branded emails. Defaults are inherited from your <a href="{{ route('admin.theme.edit') }}" class="underline hover:text-text">Brand Theme</a> colors until you override them here.</p>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        @foreach ([
                            ['key' => 'primary', 'name' => 'email_primary_color', 'label' => 'Primary Color', 'default' => $setting->primary_color],
                            ['key' => 'secondary', 'name' => 'email_secondary_color', 'label' => 'Secondary Color', 'default' => \App\Models\Setting::DEFAULT_EMAIL_SECONDARY_COLOR],
                            ['key' => 'accent', 'name' => 'email_accent_color', 'label' => 'Accent Color', 'default' => $setting->primary_light_color],
                            ['key' => 'text', 'name' => 'email_text_color', 'label' => 'Text Color', 'default' => \App\Models\Setting::DEFAULT_EMAIL_TEXT_COLOR],
                            ['key' => 'background', 'name' => 'email_background_color', 'label' => 'Background Color', 'default' => \App\Models\Setting::DEFAULT_EMAIL_BACKGROUND_COLOR],
                            ['key' => 'button', 'name' => 'email_button_color', 'label' => 'Button Color', 'default' => $setting->primary_color],
                            ['key' => 'buttonText', 'name' => 'email_button_text_color', 'label' => 'Button Text Color', 'default' => \App\Models\Setting::DEFAULT_EMAIL_BUTTON_TEXT_COLOR],
                        ] as $field)
                            <div>
                                <x-input-label :for="$field['name']" :value="$field['label']" />

                                <div class="mt-1 flex items-center gap-3">
                                    <label
                                        for="{{ $field['name'] }}_picker"
                                        :style="{ backgroundColor: colors.{{ $field['key'] }} }"
                                        class="h-10 w-10 shrink-0 cursor-pointer rounded-md border border-border shadow-sm"
                                    ></label>

                                    <input x-model="colors.{{ $field['key'] }}" id="{{ $field['name'] }}_picker" type="color" class="sr-only">

                                    <input
                                        x-model="colors.{{ $field['key'] }}"
                                        id="{{ $field['name'] }}"
                                        name="{{ $field['name'] }}"
                                        type="text"
                                        maxlength="7"
                                        pattern="^#[0-9A-Fa-f]{6}$"
                                        placeholder="{{ $field['default'] }}"
                                        class="block w-32 rounded-md border-border bg-surface-elevated text-text shadow-sm focus:border-primary focus:ring-focus"
                                    >
                                </div>

                                <p class="mt-1 text-xs text-text-muted">Default: {{ $field['default'] }}</p>
                                <x-input-error class="mt-2" :messages="$errors->get($field['name'])" />
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-6 flex items-center gap-3">
                    <x-primary-button>Save Email Branding</x-primary-button>

                    <x-secondary-button
                        type="submit"
                        form="restore-email-branding-form"
                        onclick="return confirm('Restore the default email brand colors? This cannot be undone.')"
                    >
                        Restore Defaults
                    </x-secondary-button>
                </div>
            </form>

            <form id="restore-email-branding-form" method="POST" action="{{ route('admin.email-branding.restore') }}" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>

        <div class="lg:col-span-1">
            <div class="sticky top-6 p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
                <h3 class="font-semibold text-text mb-1">Email Preview</h3>
                <p class="text-sm text-text-muted mb-4">Live preview of your branded email layout.</p>

                <div class="grid grid-cols-2 gap-3 mb-4">
                    <div class="flex items-center gap-2 rounded-md border border-border p-2">
                        <span class="h-3 w-3 shrink-0 rounded-full" :style="{ backgroundColor: colors.primary }"></span>
                        <div class="text-xs">
                            <p class="font-semibold text-text">Primary</p>
                            <p class="text-text-muted">Email header and links</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 rounded-md border border-border p-2">
                        <span class="h-3 w-3 shrink-0 rounded-full" :style="{ backgroundColor: colors.accent }"></span>
                        <div class="text-xs">
                            <p class="font-semibold text-text">Accent</p>
                            <p class="text-text-muted">Highlights and callouts</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 rounded-md border border-border p-2">
                        <span class="h-3 w-3 shrink-0 rounded-full" :style="{ backgroundColor: colors.button }"></span>
                        <div class="text-xs">
                            <p class="font-semibold text-text">Button</p>
                            <p class="text-text-muted">Call-to-action buttons</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 rounded-md border border-border p-2">
                        <span class="h-3 w-3 shrink-0 rounded-full" :style="{ backgroundColor: colors.secondary }"></span>
                        <div class="text-xs">
                            <p class="font-semibold text-text">Secondary</p>
                            <p class="text-text-muted">Footer background</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden rounded-lg border border-border">
                    <div class="flex items-center gap-3 px-5 py-4" :style="{ backgroundColor: colors.primary }">
                        <img x-show="logoPreview" :src="logoPreview" class="h-8 w-8 rounded object-contain bg-white p-1">
                        <div>
                            <p class="font-bold text-white" x-text="brandName"></p>
                            <p class="text-xs text-white/80">Official Communications</p>
                        </div>
                    </div>

                    <div class="px-5 py-8 text-center" :style="{ backgroundColor: colors.background, color: colors.text }">
                        <div class="rounded-md border border-dashed border-current p-4 text-sm opacity-80">
                            <p>Email Template Body Goes Here</p>
                            <p class="mt-2 text-xs opacity-70">(subject, body_html from email_templates &mdash; with placeholders replaced)</p>
                        </div>

                        <button
                            type="button"
                            class="mt-5 inline-flex items-center justify-center whitespace-nowrap rounded-md border-0 px-6 py-2.5 text-sm font-semibold leading-normal shadow-sm"
                            :style="{ backgroundColor: colors.button, color: colors.buttonText, border: 'none' }"
                        >
                            Call to Action
                        </button>
                    </div>

                    <div class="px-5 py-4 text-center text-xs text-white/80" :style="{ backgroundColor: colors.secondary }">
                        <p class="font-semibold text-white" x-text="'You are receiving this email from ' + brandName + '.'"></p>
                        @if ($setting->address)
                            <p class="mt-1">{{ $setting->address }}</p>
                        @endif
                        <p class="mt-1" x-text="'© ' + new Date().getFullYear() + ' ' + brandName + '. All rights reserved.'"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
