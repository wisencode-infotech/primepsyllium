<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Add Email Template
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-surface-elevated shadow sm:rounded-lg">
                <form method="POST" action="{{ route('admin.email-templates.store') }}">
                    @include('backend.email-templates._form')
                </form>
            </div>
        </div>
    </div>
</x-backend-layout>
