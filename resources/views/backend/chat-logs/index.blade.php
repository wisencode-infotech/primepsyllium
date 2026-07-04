<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Chatbot Conversations
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
                Read-only transcripts of visitor conversations with the AI chatbot widget.
            </p>

            @if ($conversations->total() > 0)
                <form method="POST" action="{{ route('admin.chat-logs.clear-all') }}" onsubmit="return confirm('Delete ALL chatbot conversations? This cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center whitespace-nowrap px-4 py-2 bg-red-600 border border-red-700 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 transition ease-in-out duration-150">
                        Clear All Logs
                    </button>
                </form>
            @endif
        </div>

        <div class="table-shell">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px]">
                    <thead>
                        <tr class="table-head-row">
                            <th class="px-4 sm:px-8 py-3">Session</th>
                            <th class="px-2 py-3">Started</th>
                            <th class="px-2 py-3 w-24">Messages</th>
                            <th class="px-2 py-3 w-32">Escalated</th>
                            <th class="px-2 py-3 w-24 text-right sm:pr-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($conversations as $conversation)
                            <tr class="table-row">
                                <td class="px-4 sm:px-8 py-3 text-sm text-text font-mono">{{ \Illuminate\Support\Str::limit($conversation->session_id, 12, '…') }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $conversation->created_at->format('d M Y, h:i A') }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $conversation->messages_count }}</td>
                                <td class="px-2 py-3">
                                    @if ($conversation->escalated)
                                        @if ($conversation->escalated_contact_inquiry_id)
                                            <a href="{{ route('admin.inquiries.show', $conversation->escalated_contact_inquiry_id) }}" class="pill pill-danger">Escalated</a>
                                        @else
                                            <span class="pill pill-danger">Escalated</span>
                                        @endif
                                    @else
                                        <span class="pill">No</span>
                                    @endif
                                </td>
                                <td class="px-2 py-3 text-right sm:pr-8">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.chat-logs.show', $conversation) }}" class="row-link">View</a>
                                        <form method="POST" action="{{ route('admin.chat-logs.destroy', $conversation) }}" onsubmit="return confirm('Delete this conversation? This cannot be undone.');">
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
                                    No chatbot conversations yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $conversations->links() }}
        </div>
    </div>
</x-backend-layout>
