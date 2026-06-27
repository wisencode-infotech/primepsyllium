<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Contact Inquiries
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <p class="text-sm text-text-muted mb-4">
            Leads submitted through the homepage "Discuss Your Requirements" form. Notifications are sent to the recipients configured under <a href="{{ route('admin.email-recipients.index') }}" class="text-primary hover:underline">Email Recipients</a>.
        </p>

        <div class="bg-surface-elevated shadow sm:rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px]">
                    <thead>
                        <tr class="text-left text-xs font-semibold text-text-muted uppercase tracking-wider border-b border-border">
                            <th class="px-4 sm:px-8 py-3">Name</th>
                            <th class="px-2 py-3">Company</th>
                            <th class="px-2 py-3">Email</th>
                            <th class="px-2 py-3">Product Interest</th>
                            <th class="px-2 py-3 w-32">Submitted</th>
                            <th class="px-2 py-3 w-28">Notified</th>
                            <th class="px-2 py-3 w-32 text-right sm:pr-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inquiries as $inquiry)
                            <tr class="border-b border-border last:border-b-0 hover:bg-surface-muted">
                                <td class="px-4 sm:px-8 py-3 text-sm text-text">{{ $inquiry->name }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $inquiry->company }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $inquiry->email }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $inquiry->product_interest }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted">{{ $inquiry->created_at->format('d M Y') }}</td>
                                <td class="px-2 py-3">
                                    @if ($inquiry->email_sent)
                                        <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-green-50 text-green-700">Sent</span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-red-50 text-red-700">Failed</span>
                                    @endif
                                </td>
                                <td class="px-2 py-3 text-right sm:pr-8">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-sm text-primary hover:text-primary-hover">View</a>
                                        <form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry) }}" onsubmit="return confirm('Delete this inquiry? This cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 sm:px-8 py-6 text-sm text-text-muted text-center">
                                    No inquiries submitted yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $inquiries->links() }}
        </div>
    </div>
</x-backend-layout>
