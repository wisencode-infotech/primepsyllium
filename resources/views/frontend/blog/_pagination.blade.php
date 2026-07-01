@if ($paginator->hasPages())
    <nav class="blog-pagination-nav d-flex align-items-center gap-2 flex-wrap justify-content-center">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="blog-page-btn disabled">
                <iconify-icon icon="mdi:chevron-left"></iconify-icon>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="blog-page-btn">
                <iconify-icon icon="mdi:chevron-left"></iconify-icon>
            </a>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="blog-page-btn disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="blog-page-btn active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="blog-page-btn">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="blog-page-btn">
                <iconify-icon icon="mdi:chevron-right"></iconify-icon>
            </a>
        @else
            <span class="blog-page-btn disabled">
                <iconify-icon icon="mdi:chevron-right"></iconify-icon>
            </span>
        @endif
    </nav>
@endif
