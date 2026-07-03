<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Add Country
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.countries.store') }}" enctype="multipart/form-data">
        @include('backend.countries._form')
    </form>
</x-backend-layout>
