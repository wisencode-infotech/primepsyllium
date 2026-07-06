@csrf
@isset($galleryCategory)
    @method('PUT')
@endisset

<div>
    <x-input-label for="name" value="Category Name" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $galleryCategory->name ?? '')" autofocus required />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div class="mt-6 flex items-center gap-3">
    <x-primary-button>{{ isset($galleryCategory) ? 'Update Category' : 'Add Category' }}</x-primary-button>
    <a href="{{ route('admin.gallery-categories.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
</div>
