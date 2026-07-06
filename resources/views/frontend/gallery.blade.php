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

    {{-- category filters --}}
    @if ($categories->isNotEmpty())
        <section class="gallery-filter-section py-2 py-lg-3">
            <div class="container-fluid px-lg-5">
                <div class="gallery-filter-tabs d-flex align-items-center flex-wrap gap-2 wow fadeIn">
                    <a href="{{ route('gallery.index') }}" data-category-id="" class="gallery-filter-tab {{ !$activeCategory ? 'active' : '' }}">
                        All
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('gallery.index', ['category' => $cat->id]) }}" data-category-id="{{ $cat->id }}" class="gallery-filter-tab {{ $activeCategory?->id === $cat->id ? 'active' : '' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- gallery grid --}}
    <section class="gallery-section py-4 py-lg-5">
        <div class="container-fluid px-lg-5 py-lg-2">
            <div id="galleryEmptyState" class="text-center py-5 wow fadeIn" style="{{ $galleryItems->isEmpty() ? '' : 'display: none;' }}">
                <p class="fts-15 fw-4 subtitle-text-L mb-0" id="galleryEmptyStateText">
                    @if ($activeCategory)
                        No items in <strong>{{ $activeCategory->name }}</strong> yet. <a href="{{ route('gallery.index') }}" class="primary-color-L text-decoration-underline">View all photos</a>
                    @else
                        Our gallery is being updated. Please check back soon.
                    @endif
                </p>
            </div>

            <div id="galleryGrid" class="gallery-bento" style="{{ $galleryItems->isEmpty() ? 'display: none;' : '' }}">
                @include('frontend.gallery._items')
            </div>

            <div class="text-center mt-4 mt-lg-5">
                <button
                    type="button"
                    id="galleryLoadMore"
                    class="gallery-load-more-btn fts-14 fw-5"
                    data-next-page="{{ $galleryItems->currentPage() + 1 }}"
                    style="{{ $galleryItems->hasMorePages() ? '' : 'display: none;' }}"
                >
                    Load More
                </button>
            </div>
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
            var galleryItemsUrl = '{{ route('gallery.items') }}';
            var galleryIndexUrl = '{{ route('gallery.index') }}';

            var grid = document.getElementById('galleryGrid');
            var emptyState = document.getElementById('galleryEmptyState');
            var emptyStateText = document.getElementById('galleryEmptyStateText');
            var loadMoreBtn = document.getElementById('galleryLoadMore');
            var filterTabs = Array.from(document.querySelectorAll('.gallery-filter-tab'));

            var modalEl = document.getElementById('galleryLightboxModal');
            var imageEl = document.getElementById('galleryLightboxImage');
            var videoEl = document.getElementById('galleryLightboxVideo');
            var titleEl = document.getElementById('galleryLightboxTitle');
            var countEl = document.getElementById('galleryLightboxCount');
            if (!modalEl || !grid) return;
            var modal = new bootstrap.Modal(modalEl);

            var items = [];
            var currentIndex = 0;
            var activeCategoryId = '{{ $activeCategory?->id ?? '' }}';

            function refreshItems() {
                items = Array.from(grid.querySelectorAll('.gallery-item'));
            }
            refreshItems();

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

            // event delegation so items added via AJAX (filter/load more) open the lightbox too
            grid.addEventListener('click', function (event) {
                var target = event.target.closest('.gallery-item');
                if (!target) return;
                var index = items.indexOf(target);
                if (index === -1) return;
                showItem(index);
                modal.show();
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

            // --- AJAX category filter + load more ---

            function setActiveTab(categoryId) {
                filterTabs.forEach(function (tab) {
                    tab.classList.toggle('active', tab.dataset.categoryId === String(categoryId || ''));
                });
            }

            function categoryLabel(categoryId) {
                var tab = filterTabs.find(function (t) { return t.dataset.categoryId === String(categoryId || ''); });
                return tab ? tab.textContent.trim() : '';
            }

            function fetchItems(categoryId, page, append) {
                var url = new URL(galleryItemsUrl, window.location.origin);
                if (categoryId) url.searchParams.set('category', categoryId);
                url.searchParams.set('page', page);

                grid.classList.add('is-loading');
                if (loadMoreBtn) loadMoreBtn.disabled = true;

                return fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } })
                    .then(function (response) { return response.json(); })
                    .then(function (data) {
                        if (append) {
                            grid.insertAdjacentHTML('beforeend', data.html);
                        } else {
                            grid.innerHTML = data.html;
                        }
                        refreshItems();

                        var hasAnyItems = append ? items.length > 0 : data.total > 0;
                        grid.style.display = hasAnyItems ? '' : 'none';
                        emptyState.style.display = hasAnyItems ? 'none' : '';
                        if (!hasAnyItems) {
                            var label = categoryLabel(categoryId);
                            emptyStateText.innerHTML = label
                                ? 'No items in <strong>' + label + '</strong> yet. <a href="' + galleryIndexUrl + '" class="primary-color-L text-decoration-underline">View all photos</a>'
                                : 'Our gallery is being updated. Please check back soon.';
                        }

                        if (loadMoreBtn) {
                            loadMoreBtn.style.display = data.has_more ? '' : 'none';
                            loadMoreBtn.dataset.nextPage = data.next_page;
                            loadMoreBtn.dataset.category = categoryId || '';
                            loadMoreBtn.disabled = false;
                        }
                        grid.classList.remove('is-loading');
                    })
                    .catch(function () {
                        grid.classList.remove('is-loading');
                        if (loadMoreBtn) loadMoreBtn.disabled = false;
                    });
            }

            filterTabs.forEach(function (tab) {
                tab.addEventListener('click', function (event) {
                    event.preventDefault();
                    var categoryId = tab.dataset.categoryId;
                    if (categoryId === activeCategoryId) return;

                    activeCategoryId = categoryId;
                    setActiveTab(categoryId);
                    fetchItems(categoryId, 1, false);

                    var newUrl = categoryId ? (galleryIndexUrl + '?category=' + categoryId) : galleryIndexUrl;
                    window.history.pushState({ category: categoryId }, '', newUrl);
                });
            });

            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function () {
                    var nextPage = loadMoreBtn.dataset.nextPage || 2;
                    fetchItems(loadMoreBtn.dataset.category || activeCategoryId, nextPage, true);
                });
            }

            window.addEventListener('popstate', function (event) {
                var categoryId = (event.state && event.state.category) || '';
                activeCategoryId = categoryId;
                setActiveTab(categoryId);
                fetchItems(categoryId, 1, false);
            });
        });
    </script>
</x-frontend-layout>
