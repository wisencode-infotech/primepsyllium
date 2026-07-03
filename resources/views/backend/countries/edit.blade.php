<x-backend-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-semibold text-xl text-text leading-tight">
                Edit Country
            </h2>
            @if ($country->has_page && $country->url)
                <a href="{{ $country->url }}" target="_blank" class="inline-flex items-center gap-1 text-xs text-text-muted hover:text-text border border-border rounded-md px-2.5 py-1 transition">
                    <x-icon name="external-link" class="h-3.5 w-3.5" />
                    View on site
                </a>
            @endif
        </div>
    </x-slot>

    <form method="POST" action="{{ route('admin.countries.update', $country) }}" enctype="multipart/form-data">
        @include('backend.countries._form')
    </form>
</x-backend-layout>
