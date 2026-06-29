<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/product-detail.css')) }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/event-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/event-detail.css')) }}">
    @endpush

    {{-- hero --}}
    <section class="product-hero-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span class="current">Events</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Media Center</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">Events &amp; Trade Shows</h1>
                    <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">Catch Prime Psyllium at exhibitions and trade shows around the world &mdash; see where we&rsquo;re headed next and where we&rsquo;ve recently shown up.</p>
                </div>
            </div>

            <div class="hero-actions d-flex align-items-center justify-content-center flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn fts-14">Get in Touch <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Get in Touch"></a>
            </div>
        </div>
    </section>

    {{-- events grid --}}
    <section class="py-4 py-lg-5">
        <div class="container py-lg-2">
            @if ($events->isNotEmpty())
                <div class="row justify-content-center">
                    @foreach ($events as $event)
                        <div class="col-lg-4 col-md-6 mt-3">
                            <a href="{{ $event->link ?: route('events.show', $event) }}" class="related-event-card wow fadeInUp">
                                @if ($event->image_url)
                                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="related-event-thumb">
                                @endif
                                <div class="related-event-body">
                                    @if ($event->formatted_date)
                                        <p class="fts-12 fw-4 primary-light-color-L text-uppercase mb-1">{{ $event->formatted_date }}</p>
                                    @endif
                                    <h4 class="fts-16 fw-6 title-text-L">{{ $event->title }}</h4>
                                    @if ($event->description)
                                        <p class="fts-14 fw-4 subtitle-text-L mt-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $event->description }}</p>
                                    @endif
                                    <span class="media-more fts-14 fw-4 primary-light-color-L text-decoration-underline d-flex align-items-center gap-1 mt-2">Read More <img src="{{ asset('assets/frontend/images/arrow-light.png') }}" alt=""></span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-4">
                    <p class="fts-15 fw-4 subtitle-text-L">No events to show right now &mdash; check back soon.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- cta banner --}}
    <section class="py-4 py-lg-5">
        <div class="container">
            <div class="product-cta-banner p-4 p-md-5">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Get in Touch</h6>
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Want to meet us at the next trade show? Let&rsquo;s talk.</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Request a Quote"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
