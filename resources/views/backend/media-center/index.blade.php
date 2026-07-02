<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Media Center
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-4 flex items-center justify-end">
            <a href="{{ route('admin.media-center-items.create') }}" class="inline-flex items-center px-4 py-2 bg-primary border border-primary-border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-hover transition ease-in-out duration-150">
                Add Item
            </a>
        </div>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-shell">
            <p class="px-4 sm:px-8 pt-4 sm:pt-6 text-sm text-text-muted">
                Drag rows by the handle to change the order items appear in on the homepage.
            </p>

            <div class="overflow-x-auto">
                <table class="w-full mt-4 min-w-[720px]">
                    <thead>
                        <tr class="table-head-row">
                            <th class="px-4 sm:px-8 py-3 w-10"></th>
                            <th class="px-2 py-3 w-20">Image</th>
                            <th class="px-2 py-3">Title</th>
                            <th class="px-2 py-3 w-32">Date</th>
                            <th class="px-2 py-3 w-28">Status</th>
                            <th class="px-2 py-3 w-28">Homepage</th>
                            <th class="px-2 py-3 w-40 text-right sm:pr-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="media-center-rows">
                        @forelse ($mediaCenterItems as $item)
                            <tr draggable="true" data-id="{{ $item->id }}" class="table-row cursor-move">
                                <td class="px-4 sm:px-8 py-3 text-text-muted">&#x2630;</td>
                                <td class="px-2 py-3">
                                    @if ($item->image_url)
                                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="h-12 w-12 object-cover rounded-md border border-border">
                                    @endif
                                </td>
                                <td class="px-2 py-3 text-sm text-text">{{ $item->title }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $item->formatted_date }}</td>
                                <td class="px-2 py-3">
                                    @if ($item->is_active)
                                        <span class="pill pill-success">Visible</span>
                                    @else
                                        <span class="pill pill-muted">Hidden</span>
                                    @endif
                                </td>
                                <td class="px-2 py-3">
                                    @if ($item->show_on_homepage)
                                        <span class="pill pill-success">Shown</span>
                                    @else
                                        <span class="pill pill-muted">Hidden</span>
                                    @endif
                                </td>
                                <td class="px-2 py-3 text-right sm:pr-8">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.media-center-items.edit', $item) }}" class="row-link">Edit</a>
                                        <form method="POST" action="{{ route('admin.media-center-items.destroy', $item) }}" onsubmit="return confirm('Delete this item? This cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="row-link-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 sm:px-8 py-6 text-sm text-text-muted text-center">
                                    No media center items yet. Click "Add Item" to create your first one.
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
                const tbody = document.getElementById('media-center-rows');
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

                    fetch("{{ route('admin.media-center-items.reorder') }}", {
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
