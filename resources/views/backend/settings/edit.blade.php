<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Site Settings
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        @if (session('status'))
            <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
                <h3 class="font-semibold text-text mb-1">Contact Information</h3>
                <p class="text-sm text-text-muted mb-4">Shown in the website footer and navigation.</p>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <x-input-label for="phone" value="Phone Number" />
                        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $setting->phone)" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <div>
                        <x-input-label for="email" value="Email Address" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $setting->email)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-input-label for="address" value="Address" />
                        <textarea id="address" name="address" rows="2" class="mt-1 block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted" required>{{ old('address', $setting->address) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
                <h3 class="font-semibold text-text mb-1">Branding & Media</h3>
                <p class="text-sm text-text-muted mb-4">Logo, favicon and the global presence illustration.</p>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <div>
                        <x-image-upload name="logo" label="Site Logo" :value="$setting->logo_url" />
                        <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                    </div>

                    <div>
                        <x-image-upload name="global_presence_image" label="Global Presence Illustration" :value="$setting->global_presence_image_url" />
                        <p class="mt-1 text-xs text-text-muted">Used in the "Our Global Presence" section.</p>
                        <x-input-error class="mt-2" :messages="$errors->get('global_presence_image')" />
                    </div>

                    <div>
                        <x-image-upload name="favicon" label="Favicon" :value="$setting->favicon_url" />
                        <p class="mt-1 text-xs text-text-muted">Browser tab icon. PNG, ICO or SVG.</p>
                        <x-input-error class="mt-2" :messages="$errors->get('favicon')" />
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
                <h3 class="font-semibold text-text mb-1">Social Media Links</h3>
                <p class="text-sm text-text-muted mb-4">Shown as icons in the website footer. Leave a field blank to hide that icon.</p>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <x-input-label for="facebook_url" value="Facebook URL" />
                        <x-text-input id="facebook_url" name="facebook_url" type="url" class="mt-1 block w-full" :value="old('facebook_url', $setting->facebook_url)" placeholder="https://facebook.com/yourpage" />
                        <x-input-error class="mt-2" :messages="$errors->get('facebook_url')" />
                    </div>

                    <div>
                        <x-input-label for="instagram_url" value="Instagram URL" />
                        <x-text-input id="instagram_url" name="instagram_url" type="url" class="mt-1 block w-full" :value="old('instagram_url', $setting->instagram_url)" placeholder="https://instagram.com/yourpage" />
                        <x-input-error class="mt-2" :messages="$errors->get('instagram_url')" />
                    </div>

                    <div>
                        <x-input-label for="whatsapp_url" value="WhatsApp URL" />
                        <x-text-input id="whatsapp_url" name="whatsapp_url" type="url" class="mt-1 block w-full" :value="old('whatsapp_url', $setting->whatsapp_url)" placeholder="https://wa.me/919157573300" />
                        <x-input-error class="mt-2" :messages="$errors->get('whatsapp_url')" />
                    </div>

                    <div>
                        <x-input-label for="twitter_url" value="Twitter / X URL" />
                        <x-text-input id="twitter_url" name="twitter_url" type="url" class="mt-1 block w-full" :value="old('twitter_url', $setting->twitter_url)" placeholder="https://x.com/yourpage" />
                        <x-input-error class="mt-2" :messages="$errors->get('twitter_url')" />
                    </div>

                    <div>
                        <x-input-label for="linkedin_url" value="LinkedIn URL" />
                        <x-text-input id="linkedin_url" name="linkedin_url" type="url" class="mt-1 block w-full" :value="old('linkedin_url', $setting->linkedin_url)" placeholder="https://linkedin.com/company/yourpage" />
                        <x-input-error class="mt-2" :messages="$errors->get('linkedin_url')" />
                    </div>

                    <div>
                        <x-input-label for="teams_url" value="Microsoft Teams URL" />
                        <x-text-input id="teams_url" name="teams_url" type="url" class="mt-1 block w-full" :value="old('teams_url', $setting->teams_url)" placeholder="https://teams.microsoft.com/l/..." />
                        <x-input-error class="mt-2" :messages="$errors->get('teams_url')" />
                    </div>
                </div>
            </div>

            <div>
                <x-primary-button>Save Settings</x-primary-button>
            </div>
        </form>
    </div>
</x-backend-layout>
