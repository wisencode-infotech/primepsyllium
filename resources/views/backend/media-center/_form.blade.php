@csrf
@isset($mediaCenterItem)
    @method('PUT')
@endisset

<div>
    <x-input-label for="title" value="Title" />
    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $mediaCenterItem->title ?? '')" required autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('title')" />
</div>

<div class="mt-4">
    <x-input-label for="event_date" value="Event Date" />
    <x-text-input id="event_date" name="event_date" type="date" class="mt-1 block w-full" :value="old('event_date', optional($mediaCenterItem->event_date ?? null)->format('Y-m-d'))" />
    <x-input-error class="mt-2" :messages="$errors->get('event_date')" />
</div>

<div class="mt-4">
    <x-input-label for="description" value="Short Description (shown on the homepage card)" />
    <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted">{{ old('description', $mediaCenterItem->description ?? '') }}</textarea>
    <x-input-error class="mt-2" :messages="$errors->get('description')" />
</div>

<div class="mt-4">
    <x-input-label for="content" value="Full Details (shown on the event page)" />
    <div data-quill="#content" class="mt-1"></div>
    <textarea id="content" name="content" class="hidden">{{ old('content', $mediaCenterItem->content ?? '') }}</textarea>
    <x-input-error class="mt-2" :messages="$errors->get('content')" />
</div>

<div class="mt-4">
    <x-input-label for="link" value="Read More Link (optional, links to an external page instead of the event page)" />
    <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" placeholder="https://..." :value="old('link', $mediaCenterItem->link ?? '')" />
    <x-input-error class="mt-2" :messages="$errors->get('link')" />
</div>

<div class="mt-4">
    <x-image-upload name="image" label="Cover Image" :value="$mediaCenterItem->image_url ?? null" />
    <x-input-error class="mt-2" :messages="$errors->get('image')" />
</div>

<div class="mt-4 flex items-center gap-2">
    <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $mediaCenterItem->is_active ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
    <x-input-label for="is_active" value="Show this item on the website" />
</div>

<div class="mt-6 flex items-center gap-3">
    <x-primary-button>{{ isset($mediaCenterItem) ? 'Update Item' : 'Create Item' }}</x-primary-button>
    <a href="{{ route('admin.media-center-items.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
</div>
