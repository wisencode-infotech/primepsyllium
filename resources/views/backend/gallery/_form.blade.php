@csrf
@isset($galleryItem)
    @method('PUT')
@endisset

<div x-data="{ type: '{{ old('type', $galleryItem->type ?? 'image') }}' }">
    <div>
        <x-input-label for="title" value="Title (optional)" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $galleryItem->title ?? '')" autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>

    <div class="mt-4">
        <x-input-label value="Type" />
        <div class="mt-1 flex gap-3">
            <label class="flex items-center gap-2 rounded-lg border border-border px-4 py-2 cursor-pointer" :class="type === 'image' ? 'border-primary bg-primary-soft' : ''">
                <input type="radio" name="type" value="image" x-model="type" class="text-primary focus:ring-focus">
                <span class="text-sm text-text">Image</span>
            </label>
            <label class="flex items-center gap-2 rounded-lg border border-border px-4 py-2 cursor-pointer" :class="type === 'video' ? 'border-primary bg-primary-soft' : ''">
                <input type="radio" name="type" value="video" x-model="type" class="text-primary focus:ring-focus">
                <span class="text-sm text-text">Video</span>
            </label>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('type')" />
    </div>

    <div class="mt-4" x-show="type === 'image'" style="display: none;">
        <x-image-upload name="image" label="Image" :value="$galleryItem->image_url ?? null" />
        <x-input-error class="mt-2" :messages="$errors->get('image')" />
    </div>

    <div class="mt-4" x-show="type === 'video'" style="display: none;">
        <x-video-upload name="video" label="Video" :value="$galleryItem->video_url ?? null" />
        <x-input-error class="mt-2" :messages="$errors->get('video')" />

        <div class="mt-4">
            <x-image-upload name="video_thumbnail" label="Video Thumbnail" hint="Shown in the gallery grid before the video plays" :value="$galleryItem->video_thumbnail_url ?? null" />
            <x-input-error class="mt-2" :messages="$errors->get('video_thumbnail')" />
        </div>
    </div>

    <div class="mt-4 flex items-center gap-2">
        <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $galleryItem->is_active ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
        <x-input-label for="is_active" value="Show this item on the website" />
    </div>

    <div class="mt-6 flex items-center gap-3">
        <x-primary-button>{{ isset($galleryItem) ? 'Update Item' : 'Create Item' }}</x-primary-button>
        <a href="{{ route('admin.gallery.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
    </div>
</div>
