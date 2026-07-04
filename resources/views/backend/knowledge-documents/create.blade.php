<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Upload Knowledge Base Document
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-surface-elevated shadow sm:rounded-lg">
                <form method="POST" action="{{ route('admin.knowledge-documents.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="title" value="Title (optional)" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" placeholder="Defaults to the file name" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="file" value="Document (PDF, Word, or plain text — up to 20MB)" />
                        <input id="file" name="file" type="file" accept=".pdf,.doc,.docx,.txt" required class="mt-1 block w-full text-sm text-text-muted file:mr-4 file:rounded-lg file:border-0 file:bg-primary-soft file:px-4 file:py-2 file:text-sm file:font-medium file:text-primary">
                        <x-input-error class="mt-2" :messages="$errors->get('file')" />
                    </div>

                    <div class="mt-6 flex items-center gap-3">
                        <x-primary-button>Upload Document</x-primary-button>
                        <a href="{{ route('admin.knowledge-documents.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-backend-layout>
