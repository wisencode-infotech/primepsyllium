<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            New Blog Post
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
        @include('backend.blog._form')
    </form>
</x-backend-layout>
