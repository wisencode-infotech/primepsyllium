<x-backend-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-semibold text-xl text-text leading-tight">
                Edit Post
            </h2>
            <a href="{{ $blogPost->url }}" target="_blank" class="inline-flex items-center gap-1 text-xs text-text-muted hover:text-text border border-border rounded-md px-2.5 py-1 transition">
                <x-icon name="external-link" class="h-3.5 w-3.5" />
                View on site
            </a>
        </div>
    </x-slot>

    <form method="POST" action="{{ route('admin.blog.update', $blogPost) }}" enctype="multipart/form-data">
        @include('backend.blog._form')
    </form>
</x-backend-layout>
