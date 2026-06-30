@csrf
@isset($product)
    @method('PUT')
@endisset

<div>
    <x-input-label for="name" value="Product Name" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name ?? '')" required autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div class="mt-4">
    <x-input-label value="Product Category" />
    <div class="mt-2 flex gap-6">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" name="category" value="psyllium" class="text-primary focus:ring-focus"
                {{ old('category', $product->category ?? 'psyllium') === 'psyllium' ? 'checked' : '' }}>
            <span class="text-sm text-text">Psyllium Products</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" name="category" value="other" class="text-primary focus:ring-focus"
                {{ old('category', $product->category ?? 'psyllium') === 'other' ? 'checked' : '' }}>
            <span class="text-sm text-text">Other Ingredients</span>
        </label>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('category')" />
</div>

<div class="mt-4">
    <x-input-label for="description" value="Short Description (shown on the homepage card)" />
    <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted">{{ old('description', $product->description ?? '') }}</textarea>
    <x-input-error class="mt-2" :messages="$errors->get('description')" />
</div>

<div class="mt-4">
    <x-input-label for="content" value="Full Details (shown on the product page)" />
    <div data-quill="#content" class="mt-1"></div>
    <textarea id="content" name="content" class="hidden">{{ old('content', $product->content ?? '') }}</textarea>
    <x-input-error class="mt-2" :messages="$errors->get('content')" />
</div>

<div class="mt-4">
    <x-image-upload name="image" label="Product Image" :value="$product->image_url ?? null" />
    <x-input-error class="mt-2" :messages="$errors->get('image')" />
</div>

<div class="mt-4 flex items-center gap-2">
    <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
    <x-input-label for="is_active" value="Show this product on the website" />
</div>

<div class="mt-6 flex items-center gap-3">
    <x-primary-button>{{ isset($product) ? 'Update Product' : 'Create Product' }}</x-primary-button>
    <a href="{{ route('admin.products.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
</div>
