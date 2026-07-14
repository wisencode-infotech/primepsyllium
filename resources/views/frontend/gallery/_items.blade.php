@foreach ($galleryItems as $item)
    @php
        $thumb = $item->type === 'video' ? $item->video_thumbnail_thumb_url : $item->image_thumb_url;
        $src = $item->type === 'video' ? $item->video_url : $item->image_url;
    @endphp
    <button
        type="button"
        class="gallery-item wow zoomIn"
        data-type="{{ $item->type }}"
        data-src="{{ $src }}"
        data-thumb="{{ $thumb }}"
        data-title="{{ $item->title }}"
        data-date="{{ $item->memory_date_label }}"
    >
        <img src="{{ $thumb }}" alt="{{ $item->title ?: 'Prime Psyllium gallery' }}" loading="lazy" decoding="async">

        @if ($item->type === 'video')
            <span class="gallery-item-tag"><iconify-icon icon="ph:play-fill"></iconify-icon>Video</span>
        @endif

        @if ($item->memory_date_label)
            <span class="gallery-item-date"><iconify-icon icon="ph:calendar-blank-bold"></iconify-icon>{{ $item->memory_date_label }}</span>
        @endif

        <span class="gallery-item-overlay">
            <span class="gallery-item-icon @if($item->type === 'video') gallery-item-play @endif">
                <iconify-icon icon="{{ $item->type === 'video' ? 'ph:play-fill' : 'ph:arrows-out-simple-bold' }}"></iconify-icon>
            </span>
            @if ($item->title)
                <span class="gallery-item-title fts-14 fw-5">{{ $item->title }}</span>
            @endif
        </span>
    </button>
@endforeach
