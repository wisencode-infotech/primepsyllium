<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Conversation {{ \Illuminate\Support\Str::limit($conversation->session_id, 12, '…') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="mb-4 flex items-center justify-between">
            <a href="{{ route('admin.chat-logs.index') }}" class="inline-flex items-center gap-1 text-sm text-text-muted hover:text-text">
                <x-icon name="chevron-left" class="h-4 w-4" /> Back to Chat Logs
            </a>

            <div class="flex items-center gap-3">
                @if ($conversation->escalated)
                    @if ($conversation->contactInquiry)
                        <a href="{{ route('admin.inquiries.show', $conversation->contactInquiry) }}" class="pill pill-danger">
                            Escalated to Inquiry #{{ $conversation->contactInquiry->id }}
                        </a>
                    @else
                        <span class="pill pill-danger">Escalated</span>
                    @endif
                @endif

                <form method="POST" action="{{ route('admin.chat-logs.destroy', $conversation) }}" onsubmit="return confirm('Delete this conversation? This cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="row-link-danger text-sm">Delete</button>
                </form>
            </div>
        </div>

        <div class="rounded-xl border border-border bg-surface-elevated p-6 space-y-4">
            @forelse ($conversation->messages as $message)
                <div class="flex {{ $message->role === 'user' ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[80%] rounded-lg px-4 py-3 text-sm {{ $message->role === 'user' ? 'bg-primary text-white' : 'bg-surface border border-border text-text' }}">
                        <p class="whitespace-pre-line">{{ $message->content }}</p>

                        @if ($message->role === 'assistant' && ! empty($message->sources))
                            <div class="mt-2 flex flex-wrap gap-1.5 border-t border-border/40 pt-2">
                                @foreach ($message->sources as $source)
                                    @if (! empty($source['url']))
                                        <a href="{{ $source['url'] }}" target="_blank" rel="noopener" class="text-xs underline opacity-80 hover:opacity-100">{{ $source['title'] }}</a>
                                    @else
                                        <span class="text-xs opacity-80">{{ $source['title'] }}</span>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                        <p class="mt-1.5 text-xs opacity-60">{{ $message->created_at->format('h:i A') }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-text-muted text-center">No messages recorded.</p>
            @endforelse
        </div>
    </div>
</x-backend-layout>
