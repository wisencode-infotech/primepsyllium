@csrf
@isset($emailRecipient)
    @method('PUT')
@endisset

<div>
    <x-input-label for="name" value="Recipient Name" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $emailRecipient->name ?? '')" autofocus />
    <p class="mt-1 text-xs text-text-muted">Optional — helps you tell recipients apart in the list below.</p>
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div class="mt-4">
    <x-input-label for="email" value="Email Address" />
    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $emailRecipient->email ?? '')" required />
    <x-input-error class="mt-2" :messages="$errors->get('email')" />
</div>

<div class="mt-4 flex items-center gap-2">
    <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $emailRecipient->is_active ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
    <x-input-label for="is_active" value="Active — receives contact form notifications" />
</div>

<div class="mt-6 flex items-center gap-3">
    <x-primary-button>{{ isset($emailRecipient) ? 'Update Recipient' : 'Add Recipient' }}</x-primary-button>
    <a href="{{ route('admin.email-recipients.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
</div>
