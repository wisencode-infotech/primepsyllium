<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Blog Posts
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-4 flex items-center justify-end">
            <a href="{{ route('admin.blog.create') }}" class="inline-flex items-center px-4 py-2 bg-primary border border-primary-border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-hover transition ease-in-out duration-150">
                New Post
            </a>
        </div>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-shell">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px]">
                    <thead>
                        <tr class="table-head-row">
                            <th class="px-4 sm:px-8 py-3 w-20">Image</th>
                            <th class="px-2 py-3">Title</th>
                            <th class="px-2 py-3 w-32">Category</th>
                            <th class="px-2 py-3 w-36">Published</th>
                            <th class="px-2 py-3 w-28">Status</th>
                            <th class="px-2 py-3 w-40 text-right sm:pr-8">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blogPosts as $post)
                            <tr class="table-row">
                                <td class="px-4 sm:px-8 py-3">
                                    @if ($post->featured_image_url)
                                        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="h-12 w-16 object-cover rounded-md border border-border">
                                    @else
                                        <div class="h-12 w-16 rounded-md border border-border bg-surface-muted flex items-center justify-center">
                                            <x-icon name="image" class="h-5 w-5 text-text-muted" />
                                        </div>
                                    @endif
                                </td>
                                <td class="px-2 py-3">
                                    <p class="text-sm font-medium text-text">{{ $post->title }}</p>
                                    @if ($post->excerpt)
                                        <p class="text-xs text-text-muted mt-0.5 line-clamp-1">{{ $post->excerpt }}</p>
                                    @endif
                                </td>
                                <td class="px-2 py-3 text-sm text-text-muted">
                                    {{ $post->category ?? '—' }}
                                </td>
                                <td class="px-2 py-3 text-sm text-text-muted">
                                    @if ($post->published_at)
                                        {{ $post->published_at->format('M j, Y') }}
                                        @if ($post->published_at > now())
                                            <span class="pill pill-info ml-1">Scheduled</span>
                                        @endif
                                    @else
                                        <span class="text-text-muted">Draft</span>
                                    @endif
                                </td>
                                <td class="px-2 py-3">
                                    @if ($post->is_active)
                                        <span class="pill pill-success">Visible</span>
                                    @else
                                        <span class="pill pill-muted">Hidden</span>
                                    @endif
                                </td>
                                <td class="px-2 py-3 text-right sm:pr-8">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ $post->url }}" target="_blank" class="row-link text-text-muted" title="View on site">
                                            <x-icon name="external-link" class="h-4 w-4" />
                                        </a>
                                        <a href="{{ route('admin.blog.edit', $post) }}" class="row-link">Edit</a>
                                        <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" onsubmit="return confirm('Delete this post? This cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="row-link-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 sm:px-8 py-8 text-sm text-text-muted text-center">
                                    No blog posts yet. <a href="{{ route('admin.blog.create') }}" class="text-primary hover:underline">Create your first post</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-backend-layout>
