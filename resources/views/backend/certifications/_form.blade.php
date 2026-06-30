@csrf
@isset($certification)
    @method('PUT')
@endisset

<div>
    <x-input-label for="name" value="Certification Name" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $certification->name ?? '')" required autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div class="mt-4">
    <x-image-upload name="logo" label="Badge / Logo" :value="$certification->image_url ?? null" />
    <x-input-error class="mt-2" :messages="$errors->get('logo')" />
</div>

<div class="mt-4 flex items-center gap-2">
    <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $certification->is_active ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
    <x-input-label for="is_active" value="Show this badge on the website (Accreditation page)" />
</div>

<div class="mt-3 flex items-center gap-2">
    <input id="show_on_home" name="show_on_home" type="checkbox" value="1" {{ old('show_on_home', $certification->show_on_home ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
    <x-input-label for="show_on_home" value="Show this badge on the Home page" />
</div>

<div class="mt-6 flex items-center gap-3">
    <x-primary-button>{{ isset($certification) ? 'Update Certification' : 'Create Certification' }}</x-primary-button>
    <a href="{{ route('admin.certifications.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
</div>
