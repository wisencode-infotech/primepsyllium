<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Certifications
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-4 flex items-center justify-end">
            <a href="{{ route('admin.certifications.create') }}" class="inline-flex items-center px-4 py-2 bg-primary border border-primary-border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-hover transition ease-in-out duration-150">
                Add Certification
            </a>
        </div>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="bg-surface-elevated shadow sm:rounded-lg overflow-hidden">
                <p class="px-4 sm:px-8 pt-4 sm:pt-6 text-sm text-text-muted">
                    Drag rows by the handle to change the order badges appear in on the homepage.
                </p>

                <div class="overflow-x-auto">
                    <table class="w-full mt-4 min-w-[640px]">
                        <thead>
                            <tr class="text-left text-xs font-semibold text-text-muted uppercase tracking-wider border-b border-border">
                                <th class="px-4 sm:px-8 py-2 w-10"></th>
                                <th class="px-2 py-2 w-20">Logo</th>
                                <th class="px-2 py-2">Name</th>
                                <th class="px-2 py-2 w-28">Status</th>
                                <th class="px-2 py-2 w-40 text-right sm:pr-8">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="certification-rows">
                            @forelse ($certifications as $certification)
                                <tr draggable="true" data-id="{{ $certification->id }}" class="border-b border-border last:border-b-0 cursor-move hover:bg-surface-muted">
                                    <td class="px-4 sm:px-8 py-3 text-text-muted">&#x2630;</td>
                                    <td class="px-2 py-3">
                                        @if ($certification->image_url)
                                            <img src="{{ $certification->image_url }}" alt="{{ $certification->name }}" class="h-12 w-12 object-contain rounded-md border border-border bg-white p-1">
                                        @endif
                                    </td>
                                    <td class="px-2 py-3 text-sm text-text">{{ $certification->name }}</td>
                                    <td class="px-2 py-3">
                                        @if ($certification->is_active)
                                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-green-50 text-green-700">Visible</span>
                                        @else
                                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-surface-muted text-text-muted">Hidden</span>
                                        @endif
                                    </td>
                                    <td class="px-2 py-3 text-right sm:pr-8">
                                        <div class="flex items-center justify-end gap-3">
                                            <a href="{{ route('admin.certifications.edit', $certification) }}" class="text-sm text-primary hover:text-primary-hover">Edit</a>
                                            <form method="POST" action="{{ route('admin.certifications.destroy', $certification) }}" onsubmit="return confirm('Delete this certification? This cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm text-red-600 hover:underline">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 sm:px-8 py-6 text-sm text-text-muted text-center">
                                        No certifications yet. Click "Add Certification" to create your first one.
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
                const tbody = document.getElementById('certification-rows');
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

                    fetch("{{ route('admin.certifications.reorder') }}", {
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
