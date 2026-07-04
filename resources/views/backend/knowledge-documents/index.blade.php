<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Knowledge Base Documents
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex items-center justify-between gap-4 mb-4">
            <p class="text-sm text-text-muted">
                Extra reference material (PDFs, Word docs, plain text) the chatbot can draw on alongside Products, Blog posts, and Certifications.
            </p>
            <a href="{{ route('admin.knowledge-documents.create') }}" class="inline-flex items-center whitespace-nowrap px-4 py-2 bg-primary border border-primary-border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-hover transition ease-in-out duration-150">
                Upload Document
            </a>
        </div>

        <div class="table-shell">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px]">
                    <thead>
                        <tr class="table-head-row">
                            <th class="px-4 sm:px-8 py-3">Title</th>
                            <th class="px-2 py-3">File</th>
                            <th class="px-2 py-3 w-32">Uploaded</th>
                            <th class="px-2 py-3 w-28">Status</th>
                            <th class="px-2 py-3 w-32 text-right sm:pr-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($documents as $document)
                            <tr class="table-row">
                                <td class="px-4 sm:px-8 py-3 text-sm text-text">{{ $document->title }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $document->original_filename }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $document->created_at->format('d M Y') }}</td>
                                <td class="px-2 py-3">
                                    @switch($document->status)
                                        @case('synced')
                                            <span class="pill pill-success">Synced</span>
                                            @break
                                        @case('processing')
                                            <span class="pill">Processing</span>
                                            @break
                                        @case('failed')
                                            <span class="pill pill-danger" title="{{ $document->error_message }}">Failed</span>
                                            @break
                                        @default
                                            <span class="pill">Pending</span>
                                    @endswitch
                                </td>
                                <td class="px-2 py-3 text-right sm:pr-8">
                                    <form method="POST" action="{{ route('admin.knowledge-documents.destroy', $document) }}" onsubmit="return confirm('Delete this document? It will be removed from the chatbot knowledge base.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="row-link-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 sm:px-8 py-6 text-sm text-text-muted text-center">
                                    No documents uploaded yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $documents->links() }}
        </div>
    </div>
</x-backend-layout>
