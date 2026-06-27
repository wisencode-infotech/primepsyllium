@csrf
@isset($country)
    @method('PUT')
@endisset

<div>
    <x-input-label for="name" value="Country Name" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $country->name ?? '')" required autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div class="mt-4">
    <x-image-upload name="flag" label="Flag Image" :value="$country->image_url ?? null" />
    <x-input-error class="mt-2" :messages="$errors->get('flag')" />
</div>

<div class="mt-4 flex items-center gap-2">
    <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $country->is_active ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
    <x-input-label for="is_active" value="Show this country on the website" />
</div>

<div class="mt-3 flex items-center gap-2">
    <input id="show_in_footer" name="show_in_footer" type="checkbox" value="1" {{ old('show_in_footer', $country->show_in_footer ?? false) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
    <x-input-label for="show_in_footer" value="Also show in the footer's Countries list" />
</div>
<p class="mt-1 text-xs text-text-muted">
    Only a handful of countries should appear in the footer to keep it compact — the rest are summarized as "+N countries".
</p>

<div class="mt-6 flex items-center gap-3">
    <x-primary-button>{{ isset($country) ? 'Update Country' : 'Create Country' }}</x-primary-button>
    <a href="{{ route('admin.countries.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
</div>
