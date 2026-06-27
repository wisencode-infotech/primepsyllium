<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Site Settings
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="p-4 sm:p-8 bg-surface-elevated shadow sm:rounded-lg">
            <p class="text-sm text-text-muted mb-6">
                This contact info and logo appear in the website footer and navigation.
            </p>

            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="phone" value="Phone Number" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $setting->phone)" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" value="Email Address" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $setting->email)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="address" value="Address" />
                    <textarea id="address" name="address" rows="3" class="mt-1 block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted" required>{{ old('address', $setting->address) }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>

                <div class="mt-4">
                    <x-image-upload name="logo" label="Site Logo" :value="$setting->logo_url" />
                    <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                </div>

                <div class="mt-4">
                    <x-image-upload name="global_presence_image" label="Global Presence Illustration" :value="$setting->global_presence_image_url" />
                    <p class="mt-1 text-xs text-text-muted">Shown next to the country list in the "Our Global Presence" homepage section.</p>
                    <x-input-error class="mt-2" :messages="$errors->get('global_presence_image')" />
                </div>

                <div class="mt-4">
                    <x-image-upload name="favicon" label="Favicon" :value="$setting->favicon_url" />
                    <p class="mt-1 text-xs text-text-muted">Shown as the browser tab icon. PNG, ICO or SVG recommended.</p>
                    <x-input-error class="mt-2" :messages="$errors->get('favicon')" />
                </div>

                <div class="mt-6">
                    <x-primary-button>Save Settings</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-backend-layout>
