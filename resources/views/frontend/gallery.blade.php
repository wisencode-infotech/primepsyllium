<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/gallery.css') }}?v={{ filemtime(public_path('assets/frontend/css/gallery.css')) }}">
    @endpush

    {{-- hero --}}
    <section class="product-hero-section gallery-hero-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span class="current">Gallery</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="ph:image-square-fill"></iconify-icon>Our Gallery</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">A Glimpse Into Prime Psyllium</h1>
                    <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">Explore our facilities, processes and moments from across the Prime Psyllium journey — in photos and videos.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- gallery grid --}}
    <section class="gallery-section py-4 py-lg-5">
        <div class="container-fluid px-lg-5 py-lg-2">
            @if ($galleryItems->isEmpty())
                <div class="text-center py-5 wow fadeIn">
                    <p class="fts-15 fw-4 subtitle-text-L mb-0">Our gallery is being updated. Please check back soon.</p>
                </div>
            @else
                <div class="gallery-bento">
                    @foreach ($galleryItems as $item)
                        @php
                            $thumb = $item->type === 'video' ? $item->video_thumbnail_url : $item->image_url;
                            $src = $item->type === 'video' ? $item->video_url : $item->image_url;
                        @endphp
                        <button
                            type="button"
                            class="gallery-item wow zoomIn"
                            data-type="{{ $item->type }}"
                            data-src="{{ $src }}"
                            data-thumb="{{ $thumb }}"
                            data-title="{{ $item->title }}"
                        >
                            <img src="{{ $thumb }}" alt="{{ $item->title ?: 'Prime Psyllium gallery' }}" loading="lazy" decoding="async">

                            @if ($item->type === 'video')
                                <span class="gallery-item-tag"><iconify-icon icon="ph:play-fill"></iconify-icon>Video</span>
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
                </div>
            @endif
        </div>
    </section>

    {{-- lightbox --}}
    <div class="modal fade gallery-lightbox-modal" id="galleryLightboxModal" tabindex="-1" aria-labelledby="galleryLightboxModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <button type="button" class="btn-close gallery-lightbox-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <button type="button" class="gallery-lightbox-nav gallery-lightbox-prev" aria-label="Previous">
                    <iconify-icon icon="ph:caret-left-bold"></iconify-icon>
                </button>
                <button type="button" class="gallery-lightbox-nav gallery-lightbox-next" aria-label="Next">
                    <iconify-icon icon="ph:caret-right-bold"></iconify-icon>
                </button>

                <div class="modal-body p-0">
                    <span id="galleryLightboxCount" class="gallery-lightbox-count"></span>
                    <img id="galleryLightboxImage" class="w-100 gallery-lightbox-image" src="" alt="">
                    <video id="galleryLightboxVideo" class="w-100 gallery-lightbox-video" controls playsinline preload="none"></video>
                    <p id="galleryLightboxTitle" class="gallery-lightbox-title fts-15 fw-5 mb-0"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var items = Array.from(document.querySelectorAll('.gallery-item'));

            var modalEl = document.getElementById('galleryLightboxModal');
            var imageEl = document.getElementById('galleryLightboxImage');
            var videoEl = document.getElementById('galleryLightboxVideo');
            var titleEl = document.getElementById('galleryLightboxTitle');
            var countEl = document.getElementById('galleryLightboxCount');
            if (!modalEl) return;
            var modal = new bootstrap.Modal(modalEl);

            var currentIndex = 0;

            function showItem(index) {
                if (!items.length) return;
                currentIndex = (index + items.length) % items.length;
                var item = items[currentIndex];

                if (item.dataset.type === 'video') {
                    imageEl.classList.add('d-none');
                    videoEl.classList.remove('d-none');
                    videoEl.src = item.dataset.src;
                    videoEl.poster = item.dataset.thumb;
                } else {
                    videoEl.pause();
                    videoEl.removeAttribute('src');
                    videoEl.load();
                    videoEl.classList.add('d-none');
                    imageEl.classList.remove('d-none');
                    imageEl.src = item.dataset.src;
                    imageEl.alt = item.dataset.title;
                }

                titleEl.textContent = item.dataset.title;
                titleEl.classList.toggle('d-none', !item.dataset.title);
                countEl.textContent = (currentIndex + 1) + ' / ' + items.length;
            }

            items.forEach(function (item, index) {
                item.addEventListener('click', function () {
                    showItem(index);
                    modal.show();
                });
            });

            modalEl.querySelector('.gallery-lightbox-prev').addEventListener('click', function () {
                showItem(currentIndex - 1);
            });
            modalEl.querySelector('.gallery-lightbox-next').addEventListener('click', function () {
                showItem(currentIndex + 1);
            });

            modalEl.addEventListener('show.bs.modal', function () {
                document.body.classList.add('gallery-lightbox-active');
            });
            modalEl.addEventListener('hidden.bs.modal', function () {
                document.body.classList.remove('gallery-lightbox-active');
                videoEl.pause();
                videoEl.removeAttribute('src');
                videoEl.load();
            });

            document.addEventListener('keydown', function (event) {
                if (!modalEl.classList.contains('show')) return;
                if (event.key === 'ArrowLeft') showItem(currentIndex - 1);
                if (event.key === 'ArrowRight') showItem(currentIndex + 1);
            });

            // swipe left/right to navigate on touch devices
            var touchStartX = 0;
            var modalBody = modalEl.querySelector('.modal-body');
            modalBody.addEventListener('touchstart', function (event) {
                touchStartX = event.changedTouches[0].clientX;
            }, { passive: true });
            modalBody.addEventListener('touchend', function (event) {
                var deltaX = event.changedTouches[0].clientX - touchStartX;
                if (Math.abs(deltaX) < 40) return;
                showItem(currentIndex + (deltaX < 0 ? 1 : -1));
            }, { passive: true });
        });
    </script>
</x-frontend-layout>
