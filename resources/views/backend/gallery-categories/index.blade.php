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
            <p class="px-4 sm:px-8 pt-4 sm:pt-6 text-sm text-text-muted">
                Drag rows by the handle to change the order categories appear in on the gallery page.
                Mark one category as default to have the public gallery page open on that category instead of "All".
            </p>

            <div class="overflow-x-auto">
                <table class="w-full mt-4 min-w-[560px]">
                    <thead>
                        <tr class="table-head-row">
                            <th class="px-4 sm:px-8 py-3 w-10"></th>
                            <th class="px-2 py-3">Name</th>
                            <th class="px-2 py-3 w-32">Items</th>
                            <th class="px-2 py-3 w-40">Default</th>
                            <th class="px-2 py-3 w-40 text-right sm:pr-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="gallery-category-rows">
                        @forelse ($galleryCategories as $galleryCategory)
                            <tr draggable="true" data-id="{{ $galleryCategory->id }}" class="table-row cursor-move">
                                <td class="px-4 sm:px-8 py-3 text-text-muted">&#x2630;</td>
                                <td class="px-2 py-3 text-sm text-text">{{ $galleryCategory->name }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $galleryCategory->gallery_items_count }}</td>
                                <td class="px-2 py-3">
                                    @if ((int) $defaultCategoryId === (int) $galleryCategory->id)
                                        <div class="flex items-center gap-2">
                                            <span class="pill pill-success">Default</span>
                                            <form method="POST" action="{{ route('admin.gallery-categories.clear-default') }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="row-link text-xs">Clear</button>
                                            </form>
                                        </div>
                                    @else
                                        <form method="POST" action="{{ route('admin.gallery-categories.set-default', $galleryCategory) }}">
                                            @csrf
                                            <button type="submit" class="row-link text-xs">Set as default</button>
                                        </form>
                                    @endif
                                </td>
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
                                <td colspan="5" class="px-4 sm:px-8 py-6 text-sm text-text-muted text-center">
                                    No categories yet. Click "Add Category" to create your first one.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            (function () {
                const tbody = document.getElementById('gallery-category-rows');
                if (!tbody) return;

                let draggedRow = null;

                tbody.addEventListener('dragstart', (event) => {
                    draggedRow = event.target.closest('tr');
                    event.dataTransfer.effectAllowed = 'move';
                });

                tbody.addEventListener('dragover', (event) => {
                    event.preventDefault();
                    const targetRow = event.target.closest('tr');
                    if (!targetRow || targetRow === draggedRow) return;

                    const rect = targetRow.getBoundingClientRect();
                    const after = (event.clientY - rect.top) / rect.height > 0.5;
                    tbody.insertBefore(draggedRow, after ? targetRow.nextSibling : targetRow);
                });

                tbody.addEventListener('drop', (event) => {
                    event.preventDefault();
                    const order = Array.from(tbody.querySelectorAll('tr[data-id]')).map((row) => row.dataset.id);

                    fetch("{{ route('admin.gallery-categories.reorder') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify({ order }),
                    });
                });
            })();
        </script>
    @endpush
</x-backend-layout>
