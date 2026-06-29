<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/product-detail.css')) }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/event-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/event-detail.css')) }}">
    @endpush

    {{-- event hero --}}
    <section class="product-hero-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('home') }}#media-center">Media Center</a>
                <span>/</span>
                <span class="current">{{ $event->title }}</span>
            </nav>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-center text-lg-start">
                        <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeIn"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Media Center</h6>
                        <h1 class="fts-36 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">{{ $event->title }}</h1>

                        @if ($event->formatted_date)
                            <div class="product-feature-list justify-content-center justify-content-lg-start mt-3 wow fadeIn">
                                <div class="product-feature-chip fts-13"><iconify-icon icon="mdi:calendar-month-outline"></iconify-icon>{{ $event->formatted_date }}</div>
                            </div>
                        @endif

                        @if ($event->description)
                            <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">{{ $event->description }}</p>
                        @endif

                        <div class="hero-actions d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                            <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn fts-14">Get in Touch <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Get in Touch"></a>
                            <a href="{{ route('home') }}#media-center" class="common-border-btn fts-14">Back to Media Center <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="Back to Media Center"></a>
                        </div>
                    </div>
                </div>
                @if ($event->image_url)
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="event-hero-media wow zoomIn">
                            <img src="{{ $event->image_url }}" alt="{{ $event->title }}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- event content --}}
    @if ($event->clean_content)
        <section class="event-content-section product-content-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="product-content wow fadeInUp">
                            {!! $event->clean_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- prev / next navigation --}}
    @if ($previous || $next)
        <section class="py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="d-flex flex-column flex-md-row gap-3">
                            @if ($previous)
                                <a href="{{ route('events.show', $previous) }}" class="event-prevnext-card wow fadeInUp">
                                    <iconify-icon icon="mdi:arrow-left"></iconify-icon>
                                    <div>
                                        <p class="fts-12 fw-4 subtitle-text-L text-uppercase mb-1">Previous</p>
                                        <p class="fts-14 fw-6 title-text-L mb-0">{{ $previous->title }}</p>
                                    </div>
                                </a>
                            @endif
                            @if ($next)
                                <a href="{{ route('events.show', $next) }}" class="event-prevnext-card next wow fadeInUp">
                                    <iconify-icon icon="mdi:arrow-right"></iconify-icon>
                                    <div>
                                        <p class="fts-12 fw-4 subtitle-text-L text-uppercase mb-1">Next</p>
                                        <p class="fts-14 fw-6 title-text-L mb-0">{{ $next->title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- more from media center --}}
    @if ($otherItems->isNotEmpty())
        <section class="primer-product-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Media Center</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">More From Media Center</h2>
                </div>
                <div class="row justify-content-center mt-3 mt-lg-4">
                    @foreach ($otherItems as $item)
                        <div class="col-lg-4 col-md-6 mt-3">
                            <a href="{{ route('events.show', $item) }}" class="related-event-card wow fadeInUp">
                                @if ($item->image_url)
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="related-event-thumb">
                                @endif
                                <div class="related-event-body">
                                    @if ($item->formatted_date)
                                        <p class="fts-12 fw-4 primary-light-color-L text-uppercase mb-1">{{ $item->formatted_date }}</p>
                                    @endif
                                    <h4 class="fts-16 fw-6 title-text-L">{{ $item->title }}</h4>
                                    <p class="fts-14 fw-4 subtitle-text-L mt-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $item->description }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- cta banner --}}
    <section class="py-4 py-lg-5">
        <div class="container">
            <div class="product-cta-banner p-4 p-md-5">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Get in Touch</h6>
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Meeting us at a trade show? Let&rsquo;s schedule a time to talk.</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Request a Quote"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
