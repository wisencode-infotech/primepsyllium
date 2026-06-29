<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Inquiry from {{ $inquiry->name }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-4 flex items-center justify-between">
            <a href="{{ route('admin.inquiries.index') }}" class="inline-flex items-center gap-1 text-sm text-text-muted hover:text-text">
                <x-icon name="chevron-left" class="h-4 w-4" /> Back to Inquiries
            </a>

            @if ($inquiry->email_sent)
                <span class="pill pill-success">
                    <span class="h-1.5 w-1.5 rounded-full bg-success"></span> Notified recipients
                </span>
            @else
                <span class="pill pill-danger">
                    <span class="h-1.5 w-1.5 rounded-full bg-danger"></span> Notification failed
                </span>
            @endif
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

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            {{-- Sidebar: contact summary --}}
            <div class="lg:col-span-1">
                <div class="rounded-xl border border-border bg-surface-elevated p-6">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary text-base font-semibold text-white">
                            {{ collect(explode(' ', $inquiry->name))->filter()->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                        </span>
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold text-text">{{ $inquiry->name }}</p>
                            <p class="truncate text-xs text-text-muted">{{ $inquiry->company }}</p>
                        </div>
                    </div>

                    <dl class="mt-6 space-y-4">
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-primary-soft text-primary">
                                <x-icon name="mail" class="h-4 w-4" />
                            </span>
                            <div class="min-w-0">
                                <dt class="text-xs font-semibold uppercase tracking-wider text-text-muted">Email</dt>
                                <dd class="mt-0.5 truncate text-sm"><a href="mailto:{{ $inquiry->email }}" class="text-primary hover:underline">{{ $inquiry->email }}</a></dd>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-primary-soft text-primary">
                                <x-icon name="building" class="h-4 w-4" />
                            </span>
                            <div class="min-w-0">
                                <dt class="text-xs font-semibold uppercase tracking-wider text-text-muted">Company</dt>
                                <dd class="mt-0.5 text-sm text-text">{{ $inquiry->company }}</dd>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-primary-soft text-primary">
                                <x-icon name="box" class="h-4 w-4" />
                            </span>
                            <div class="min-w-0">
                                <dt class="text-xs font-semibold uppercase tracking-wider text-text-muted">Product Interest</dt>
                                <dd class="mt-0.5 text-sm text-text">{{ $inquiry->product_interest }}</dd>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-primary-soft text-primary">
                                <x-icon name="calendar" class="h-4 w-4" />
                            </span>
                            <div class="min-w-0">
                                <dt class="text-xs font-semibold uppercase tracking-wider text-text-muted">Submitted</dt>
                                <dd class="mt-0.5 text-sm text-text">{{ $inquiry->created_at->format('d M Y, h:i A') }}</dd>
                                <dd class="text-xs text-text-muted">{{ $inquiry->created_at->diffForHumans() }}</dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>

            {{-- Main: message, reply history, reply form --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="rounded-xl border border-border bg-surface-elevated p-6">
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-text-muted">Message</h3>
                    <p class="mt-3 whitespace-pre-line rounded-lg border border-border bg-surface p-4 text-sm text-text">{{ $inquiry->message }}</p>
                </div>

                @if ($inquiry->replies->isNotEmpty())
                    <div class="rounded-xl border border-border bg-surface-elevated p-6">
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-text-muted">
                            Reply History <span class="text-text-muted/70">({{ $inquiry->replies->count() }})</span>
                        </h3>
                        <div class="mt-4 space-y-4">
                            @foreach ($inquiry->replies as $reply)
                                <div class="rounded-lg border border-border bg-surface p-4">
                                    <div class="flex items-center gap-2.5">
                                        <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-primary text-xs font-semibold text-white">
                                            {{ collect(explode(' ', $reply->user?->name ?? 'Admin'))->filter()->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                                        </span>
                                        <span class="text-sm font-medium text-text">{{ $reply->user?->name ?? 'Admin' }}</span>
                                        <span class="ml-auto text-xs text-text-muted" title="{{ $reply->created_at->format('d M Y, h:i A') }}">{{ $reply->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="mt-3 whitespace-pre-line text-sm text-text">{{ $reply->message }}</p>

                                    @if ($reply->attachments->isNotEmpty())
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            @foreach ($reply->attachments as $attachment)
                                                @php
                                                    $sizeKb = $attachment->size / 1024;
                                                    $sizeLabel = $sizeKb < 1024 ? number_format($sizeKb, 1).' KB' : number_format($sizeKb / 1024, 1).' MB';
                                                @endphp
                                                <a href="{{ $attachment->url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-md border border-border bg-surface-elevated px-2.5 py-1.5 text-xs text-text hover:border-primary hover:text-primary">
                                                    <x-icon name="document" class="h-3.5 w-3.5 shrink-0" />
                                                    <span class="max-w-[10rem] truncate">{{ $attachment->original_name }}</span>
                                                    <span class="text-text-muted">{{ $sizeLabel }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="rounded-xl border border-border bg-surface-elevated p-6">
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-text-muted">Reply to {{ $inquiry->name }}</h3>

                    <form
                        method="POST"
                        action="{{ route('admin.inquiries.reply', $inquiry) }}"
                        enctype="multipart/form-data"
                        x-data="{
                            files: [],
                            dragging: false,
                            sending: false,
                            addFiles(newFiles) {
                                for (const file of newFiles) {
                                    if (this.files.length >= 5) break;
                                    this.files.push(file);
                                }
                                this.syncInput();
                            },
                            removeFile(index) {
                                this.files.splice(index, 1);
                                this.syncInput();
                            },
                            syncInput() {
                                const dt = new DataTransfer();
                                this.files.forEach(file => dt.items.add(file));
                                this.$refs.attachmentsInput.files = dt.files;
                            },
                            formatSize(bytes) {
                                if (bytes < 1024) return bytes + ' B';
                                if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
                                return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
                            },
                        }"
                        @submit="sending = true"
                        class="mt-3"
                    >
                        @csrf
                        <textarea
                            name="message"
                            rows="5"
                            required
                            placeholder="Type your reply. It will be emailed to {{ $inquiry->email }}."
                            class="w-full rounded-md border border-border bg-surface text-sm text-text p-3 focus:outline-none focus:ring-2 focus:ring-primary"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <div class="mt-3">
                            <label
                                @dragover.prevent="dragging = true"
                                @dragleave.prevent="dragging = false"
                                @drop.prevent="dragging = false; addFiles([...$event.dataTransfer.files])"
                                :class="dragging ? 'border-primary bg-primary-soft' : 'border-border bg-surface'"
                                class="flex cursor-pointer flex-col items-center justify-center gap-1.5 rounded-lg border-2 border-dashed px-4 py-5 text-center transition hover:border-primary hover:bg-primary-soft"
                            >
                                <x-icon name="upload" class="h-5 w-5 text-text-muted" />
                                <span class="text-sm text-text">Click to attach files or drag and drop</span>
                                <span class="text-xs text-text-muted">Up to 5 files, 5MB each &middot; PDF, Word, Excel, images or ZIP</span>
                                <input
                                    x-ref="attachmentsInput"
                                    type="file"
                                    name="attachments[]"
                                    multiple
                                    class="hidden"
                                    @change="addFiles([...$event.target.files])"
                                >
                            </label>
                            @error('attachments.*')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <div class="mt-2 space-y-1.5" x-show="files.length" style="display: none;">
                                <template x-for="(file, index) in files" :key="file.name + file.size">
                                    <div class="flex items-center justify-between gap-2 rounded-md border border-border bg-surface px-3 py-2">
                                        <div class="flex min-w-0 items-center gap-2">
                                            <x-icon name="document" class="h-4 w-4 shrink-0 text-text-muted" />
                                            <span class="truncate text-sm text-text" x-text="file.name"></span>
                                            <span class="shrink-0 text-xs text-text-muted" x-text="formatSize(file.size)"></span>
                                        </div>
                                        <button type="button" @click="removeFile(index)" class="shrink-0 text-text-muted hover:text-red-600">
                                            <x-icon name="x" class="h-4 w-4" />
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-end">
                            <button
                                type="submit"
                                :disabled="sending"
                                :class="sending ? 'opacity-70 cursor-not-allowed' : ''"
                                class="inline-flex items-center gap-2 rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover"
                            >
                                <span x-text="sending ? 'Sending…' : 'Send Reply'"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
