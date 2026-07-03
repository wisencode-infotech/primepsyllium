<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Edit Gallery Item
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="p-4 sm:p-8 bg-surface-elevated shadow sm:rounded-lg">
            <form method="POST" action="{{ route('admin.gallery.update', $galleryItem) }}" enctype="multipart/form-data">
                @include('backend.gallery._form')
            </form>
        </div>
    </div>
</x-backend-layout>
