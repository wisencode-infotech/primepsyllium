<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
            @include('profile.partials.update-password-form')
        </div>
    </div>
</x-backend-layout>
