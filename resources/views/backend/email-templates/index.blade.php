<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Email Templates
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-4 flex items-center justify-end">
            <a href="{{ route('admin.email-templates.create') }}" class="inline-flex items-center px-4 py-2 bg-primary border border-primary-border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-hover transition ease-in-out duration-150">
                Add Template
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

        <div class="bg-surface-elevated shadow sm:rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[720px]">
                    <thead>
                        <tr class="text-left text-xs font-semibold text-text-muted uppercase tracking-wider border-b border-border">
                            <th class="px-4 sm:px-8 py-3">Name</th>
                            <th class="px-2 py-3">Slug</th>
                            <th class="px-2 py-3">Subject</th>
                            <th class="px-2 py-3 w-28">Status</th>
                            <th class="px-2 py-3 w-40 text-right sm:pr-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($emailTemplates as $emailTemplate)
                            <tr class="border-b border-border last:border-b-0 hover:bg-surface-muted">
                                <td class="px-4 sm:px-8 py-3 text-sm text-text">{{ $emailTemplate->name }}</td>
                                <td class="px-2 py-3 text-sm text-text-muted"><code>{{ $emailTemplate->slug }}</code></td>
                                <td class="px-2 py-3 text-sm text-text-muted truncate max-w-xs">{{ $emailTemplate->subject }}</td>
                                <td class="px-2 py-3">
                                    @if ($emailTemplate->is_active)
                                        <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-green-50 text-green-700">Active</span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-surface-muted text-text-muted">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-2 py-3 text-right sm:pr-8">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.email-templates.edit', $emailTemplate) }}" class="text-sm text-primary hover:text-primary-hover">Edit</a>
                                        @if ($emailTemplate->slug !== \App\Models\EmailTemplate::CONTACT_INQUIRY_SLUG)
                                            <form method="POST" action="{{ route('admin.email-templates.destroy', $emailTemplate) }}" onsubmit="return confirm('Delete this email template? This cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm text-red-600 hover:underline">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 sm:px-8 py-6 text-sm text-text-muted text-center">
                                    No email templates yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-backend-layout>
