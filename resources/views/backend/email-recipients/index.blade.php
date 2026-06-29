<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Email Recipients
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-4 flex items-center justify-end">
            <a href="{{ route('admin.email-recipients.create') }}" class="inline-flex items-center px-4 py-2 bg-primary border border-primary-border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-hover transition ease-in-out duration-150">
                Add Recipient
            </a>
        </div>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="mb-4 p-4 bg-primary-soft border border-primary-border rounded-md text-sm text-text">
            Every <strong>active</strong> recipient below receives an email whenever a visitor submits the "Discuss Your Requirements" contact form. Add as many recipients as you need.
        </div>

        <div class="table-shell">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[640px]">
                    <thead>
                        <tr class="table-head-row">
                            <th class="px-4 sm:px-8 py-3">Name</th>
                            <th class="px-2 py-3">Email</th>
                            <th class="px-2 py-3 w-28">Status</th>
                            <th class="px-2 py-3 w-40 text-right sm:pr-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($emailRecipients as $emailRecipient)
                            <tr class="table-row">
                                <td class="px-4 sm:px-8 py-3 text-sm text-text">{{ $emailRecipient->name ?: '—' }}</td>
                                <td class="px-2 py-3 text-sm text-text">{{ $emailRecipient->email }}</td>
                                <td class="px-2 py-3">
                                    @if ($emailRecipient->is_active)
                                        <span class="pill pill-success">Active</span>
                                    @else
                                        <span class="pill pill-muted">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-2 py-3 text-right sm:pr-8">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.email-recipients.edit', $emailRecipient) }}" class="row-link">Edit</a>
                                        <form method="POST" action="{{ route('admin.email-recipients.destroy', $emailRecipient) }}" onsubmit="return confirm('Remove this recipient? They will stop receiving contact form notifications.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="row-link-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 sm:px-8 py-6 text-sm text-text-muted text-center">
                                    No recipients yet. Click "Add Recipient" to start receiving contact form notifications.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-backend-layout>
