<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Gallery Categories
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-4 flex items-center justify-between">
            <a href="{{ route('admin.gallery.index') }}" class="text-sm text-text-muted hover:text-text">&larr; Back to Gallery</a>
            <a href="{{ route('admin.gallery-categories.create') }}" class="inline-flex items-center px-4 py-2 bg-primary border border-primary-border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-hover transition ease-in-out duration-150">
                Add Category
            </a>
        </div>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-md text-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-shell">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[480px]">
                    <thead>
                        <tr class="table-head-row">
                            <th class="px-4 sm:px-8 py-3">Name</th>
                            <th class="px-2 py-3 w-32">Items</th>
                            <th class="px-2 py-3 w-40 text-right sm:pr-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleryCategories as $galleryCategory)
                            <tr class="table-row">
                                <td class="px-4 sm:px-8 py-3 text-sm text-text">{{ $galleryCategory->name }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $galleryCategory->gallery_items_count }}</td>
                                <td class="px-2 py-3 text-right sm:pr-8">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.gallery-categories.edit', $galleryCategory) }}" class="row-link">Edit</a>
                                        <form method="POST" action="{{ route('admin.gallery-categories.destroy', $galleryCategory) }}" onsubmit="return confirm('Delete this category? This cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="row-link-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 sm:px-8 py-6 text-sm text-text-muted text-center">
                                    No categories yet. Click "Add Category" to create your first one.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-backend-layout>
