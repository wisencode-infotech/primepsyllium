@csrf
@isset($blogPost)
    @method('PUT')
@endisset

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

    {{-- Main content column --}}
    <div class="lg:col-span-2 space-y-6">

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg space-y-4">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3">Post Content</h3>

            <div>
                <x-input-label for="title" value="Title" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $blogPost->title ?? '')" required autofocus placeholder="Enter post title…" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
                <x-input-label for="excerpt" value="Excerpt" />
                <p class="text-xs text-text-muted mb-1">A short summary shown on the blog listing page and in search results.</p>
                <textarea id="excerpt" name="excerpt" rows="3" class="mt-1 block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted" placeholder="Write a short summary…">{{ old('excerpt', $blogPost->excerpt ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('excerpt')" />
            </div>

            <div>
                <x-input-label for="content" value="Content" />
                <div data-quill="#content" data-image-upload-url="{{ route('admin.blog.upload-image') }}" class="mt-1"></div>
                <textarea id="content" name="content" class="hidden">{{ old('content', $blogPost->content ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('content')" />
            </div>
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg space-y-4">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3">SEO</h3>

            <div>
                <x-input-label for="seo_title" value="SEO Title" />
                <p class="text-xs text-text-muted mb-1">Overrides the page title in search results. Leave blank to use the post title.</p>
                <x-text-input id="seo_title" name="seo_title" type="text" class="mt-1 block w-full" :value="old('seo_title', $blogPost->seo_title ?? '')" placeholder="Optional SEO title…" />
                <x-input-error class="mt-2" :messages="$errors->get('seo_title')" />
            </div>

            <div>
                <x-input-label for="seo_description" value="SEO Description" />
                <p class="text-xs text-text-muted mb-1">A brief description for search engines. Recommended: 150–160 characters.</p>
                <textarea id="seo_description" name="seo_description" rows="2" class="mt-1 block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted" placeholder="Optional meta description…">{{ old('seo_description', $blogPost->seo_description ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('seo_description')" />
            </div>
        </div>

    </div>

    {{-- Sidebar column --}}
    <div class="space-y-6">

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg space-y-4">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3">Publish</h3>

            <div>
                <x-input-label for="published_at" value="Publish Date" />
                <p class="text-xs text-text-muted mb-1">Leave blank to save as draft. Set a future date to schedule.</p>
                <x-text-input
                    id="published_at"
                    name="published_at"
                    type="datetime-local"
                    class="mt-1 block w-full"
                    :value="old('published_at', isset($blogPost) && $blogPost->published_at ? $blogPost->published_at->format('Y-m-d\TH:i') : '')"
                />
                <x-input-error class="mt-2" :messages="$errors->get('published_at')" />
            </div>

            <div class="flex items-center gap-2 pt-1">
                <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $blogPost->is_active ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
                <x-input-label for="is_active" value="Show on website" />
            </div>

            <div class="pt-2 flex items-center gap-3">
                <x-primary-button>{{ isset($blogPost) ? 'Update Post' : 'Create Post' }}</x-primary-button>
                <a href="{{ route('admin.blog.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
            </div>
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg space-y-4">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3">Details</h3>

            <div>
                <x-input-label for="category" value="Category" />
                <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" :value="old('category', $blogPost->category ?? '')" placeholder="e.g. Industry News" />
                <x-input-error class="mt-2" :messages="$errors->get('category')" />
            </div>
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3 mb-4">Featured Image</h3>
            <x-image-upload name="featured_image" label="Featured Image" :value="$blogPost->featured_image_url ?? null" />
            <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg" x-data="attachmentManager()">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3 mb-4">File Attachments</h3>

            {{-- existing attachments --}}
            @if (isset($blogPost) && $blogPost->attachments->isNotEmpty())
                <ul class="space-y-2 mb-4">
                    @foreach ($blogPost->attachments as $attachment)
                        <li class="flex items-center gap-2 text-sm" x-data="{ removed: false }" x-show="!removed">
                            <iconify-icon icon="{{ $attachment->icon }}" class="text-text-muted shrink-0" style="font-size:16px"></iconify-icon>
                            <span class="flex-1 truncate text-text" title="{{ $attachment->original_name }}">{{ $attachment->original_name }}</span>
                            <span class="text-xs text-text-muted shrink-0">{{ $attachment->formatted_size }}</span>
                            <button
                                type="button"
                                class="shrink-0 text-danger hover:text-red-700 transition"
                                title="Remove attachment"
                                @click="removeAttachment({{ $attachment->id }}, () => removed = true)"
                            >
                                <x-icon name="x" class="h-3.5 w-3.5" />
                            </button>
                        </li>
                    @endforeach
                </ul>
            @endif

            {{-- new uploads --}}
            <div>
                <label class="block">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium border border-border rounded-md text-text-muted hover:bg-surface-muted cursor-pointer transition">
                        <x-icon name="upload" class="h-3.5 w-3.5" />
                        Add files
                    </span>
                    <input
                        type="file"
                        name="attachments[]"
                        multiple
                        accept=".jpg,.jpeg,.png,.webp,.pdf,.doc,.docx,.xls,.xlsx,.csv,.zip"
                        class="sr-only"
                        @change="previewFiles($event)"
                    >
                </label>
                <p class="text-xs text-text-muted mt-1.5">PDF, Word, Excel, images, ZIP — max 10 MB each.</p>
            </div>

            {{-- preview of newly picked files --}}
            <ul class="space-y-1 mt-3" x-show="newFiles.length > 0" style="display:none">
                <template x-for="(f, i) in newFiles" :key="i">
                    <li class="flex items-center gap-2 text-sm">
                        <iconify-icon icon="ph:file" class="text-text-muted shrink-0" style="font-size:16px"></iconify-icon>
                        <span class="flex-1 truncate text-text" x-text="f.name"></span>
                        <span class="text-xs text-text-muted shrink-0" x-text="formatSize(f.size)"></span>
                    </li>
                </template>
            </ul>
        </div>

    </div>
</div>

@push('scripts')
<script>
function attachmentManager() {
    return {
        newFiles: [],
        previewFiles(event) {
            this.newFiles = Array.from(event.target.files);
        },
        formatSize(bytes) {
            if (bytes >= 1048576) return (bytes / 1048576).toFixed(1) + ' MB';
            if (bytes >= 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return bytes + ' B';
        },
        removeAttachment(id, done) {
            if (!confirm('Remove this attachment? This cannot be undone.')) return;
            fetch("{{ url('admin/blog-attachments') }}/" + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
            }).then(r => { if (r.ok) done(); else alert('Failed to delete. Please try again.'); })
              .catch(() => alert('Network error. Please try again.'));
        },
    };
}
</script>
@endpush
