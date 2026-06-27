<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Inquiry from {{ $inquiry->name }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('admin.inquiries.index') }}" class="text-sm text-text-muted hover:text-text">&larr; Back to Inquiries</a>
        </div>

        <div class="p-4 sm:p-8 bg-surface-elevated shadow sm:rounded-lg">
            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <dt class="text-xs font-semibold text-text-muted uppercase tracking-wider">Full Name</dt>
                    <dd class="mt-1 text-sm text-text">{{ $inquiry->name }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-text-muted uppercase tracking-wider">Company</dt>
                    <dd class="mt-1 text-sm text-text">{{ $inquiry->company }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-text-muted uppercase tracking-wider">Email</dt>
                    <dd class="mt-1 text-sm text-text"><a href="mailto:{{ $inquiry->email }}" class="text-primary hover:underline">{{ $inquiry->email }}</a></dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-text-muted uppercase tracking-wider">Product Interest</dt>
                    <dd class="mt-1 text-sm text-text">{{ $inquiry->product_interest }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-text-muted uppercase tracking-wider">Submitted</dt>
                    <dd class="mt-1 text-sm text-text">{{ $inquiry->created_at->format('d M Y, h:i A') }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-text-muted uppercase tracking-wider">Notification</dt>
                    <dd class="mt-1 text-sm text-text">
                        @if ($inquiry->email_sent)
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-green-50 text-green-700">Sent to recipients</span>
                        @else
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-red-50 text-red-700">Not delivered</span>
                        @endif
                    </dd>
                </div>
            </dl>

            <div class="mt-6">
                <dt class="text-xs font-semibold text-text-muted uppercase tracking-wider">Message</dt>
                <dd class="mt-2 text-sm text-text whitespace-pre-line rounded-md border border-border bg-surface p-4">{{ $inquiry->message }}</dd>
            </div>
        </div>
    </div>
</x-backend-layout>
