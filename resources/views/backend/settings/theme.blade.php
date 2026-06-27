<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Brand Theme Settings
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
                Controls the primary/secondary colors used across the public website &mdash; buttons, links, hover states and accent backgrounds. Changes apply site-wide immediately.
            </p>

            <form method="POST" action="{{ route('admin.theme.update') }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div>
                        <x-color-input
                            name="primary_color"
                            label="Primary Color"
                            :value="old('primary_color', $setting->primary_color)"
                            :default="\App\Models\Setting::DEFAULT_PRIMARY_COLOR"
                            help="Buttons, links, icons and the active nav state."
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('primary_color')" />
                    </div>

                    <div>
                        <x-color-input
                            name="secondary_color"
                            label="Secondary Color"
                            :value="old('secondary_color', $setting->secondary_color)"
                            :default="\App\Models\Setting::DEFAULT_SECONDARY_COLOR"
                            help="Secondary accents such as the copyright text highlight."
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('secondary_color')" />
                    </div>

                    <div>
                        <x-color-input
                            name="primary_light_color"
                            label="Primary Light Color"
                            :value="old('primary_light_color', $setting->primary_light_color)"
                            :default="\App\Models\Setting::DEFAULT_PRIMARY_LIGHT_COLOR"
                            help="Soft backgrounds and light accent fills."
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('primary_light_color')" />
                    </div>
                </div>

                <div class="mt-6 flex items-center gap-3">
                    <x-primary-button>Save Theme</x-primary-button>

                    <x-secondary-button
                        type="submit"
                        form="restore-theme-form"
                        onclick="return confirm('Restore the default brand colors? This cannot be undone.')"
                    >
                        Restore Defaults
                    </x-secondary-button>
                </div>
            </form>

            <form id="restore-theme-form" method="POST" action="{{ route('admin.theme.restore') }}" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-backend-layout>
