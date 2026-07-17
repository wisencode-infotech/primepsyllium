<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/product-detail.css')) }}">
    @endpush

    {{-- hero section --}}
    <section class="product-hero-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span class="current">Psyllium Products</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Products</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">Psyllium Products</h1>
                    <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">From whole seeds to finely milled powders, every Prime Psyllium product is naturally sourced and processed to consistent, export-ready quality &mdash; built for pharmaceutical, food and industrial use.</p>
                </div>
            </div>

            <div class="row justify-content-center mt-3 mt-lg-4">
                <div class="col-lg-9">
                    <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-3 wow fadeInUp">
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:leaf"></iconify-icon>100% Naturally Refined</div>
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:recycle-variant"></iconify-icon>Sustainably Processed</div>
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:flask-off-outline"></iconify-icon>Chemical-Free Sourcing</div>
                    </div>
                </div>
            </div>

            <div class="hero-actions d-flex align-items-center justify-content-center flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn fts-14">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                <a href="#all-products" class="common-border-btn fts-14">Browse Products <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="Browse Products"></a>
            </div>
        </div>
    </section>

    {{-- full product grid --}}
    <section class="py-4 py-lg-5" id="all-products">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h2 class="fts-36 fw-5 title-text-L wow fadeInUp">Our Complete Product Range</h2>
                <p class="fts-15 fw-4 subtitle-text-L mt-1 mt-lg-2 wow fadeInUp">Pick the form that fits your application &mdash; every product is available in bulk and private-label packaging.</p>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 mt-3">
                        <a href="{{ route('products.show', $product) }}" class="related-product-card d-block wow fadeInUp">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-img" loading="lazy" decoding="async">
                            <h4 class="mt-2 mt-md-3 fts-18 fw-6 title-text-L">{{ $product->name }}</h4>
                            <p class="fts-14 fw-4 subtitle-text-L mt-1 mt-md-2">{{ $product->description }}</p>
                            <span class="media-more fts-14 fw-4 primary-light-color-L text-decoration-underline d-flex align-items-center gap-1 justify-content-center mt-1 mt-md-2">Read More <img src="{{ asset('assets/frontend/images/arrow-light.png') }}" alt=""></span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- industries served --}}
    <section class="primer-product-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Applications</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Industries We Serve</h2>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                @php
                    $industries = [
                        ['icon' => 'fluent:pill-24-filled', 'title' => 'Pharmaceutical', 'desc' => 'Laxative formulations &amp; fiber-based medicines', 'anchor' => 'pharmaceutical'],
                        ['icon' => 'mdi:silverware-fork-knife', 'title' => 'Food & Beverage', 'desc' => 'Bakery, dairy and beverage fiber fortification', 'anchor' => 'food-beverage'],
                        ['icon' => 'mdi:pill-multiple', 'title' => 'Nutraceuticals', 'desc' => 'Dietary fiber supplements &amp; functional foods', 'anchor' => 'dietary-supplement'],
                        ['icon' => 'mdi:flower-outline', 'title' => 'Cosmetics', 'desc' => 'Natural thickening &amp; stabilizing agent', 'anchor' => 'cosmetic'],
                        ['icon' => 'mdi:factory', 'title' => 'Industrial', 'desc' => 'Binding &amp; gelling agent for technical uses', 'anchor' => 'industrial'],
                        ['icon' => 'mdi:cow', 'title' => 'Animal Feed', 'desc' => 'Fiber-rich additive for livestock nutrition', 'anchor' => 'pet-food'],
                    ];
                @endphp
                @foreach ($industries as $industry)
                    <div class="col-lg-4 col-md-6 mt-3">
                        <a href="{{ route('applications.index') }}#{{ $industry['anchor'] }}" class="text-decoration-none d-block">
                            <div class="industry-use-card wow fadeInUp">
                                <iconify-icon icon="{{ $industry['icon'] }}"></iconify-icon>
                                <h4 class="fts-16 fw-6 title-text-L">{{ $industry['title'] }}</h4>
                                <p class="fts-14 fw-4 subtitle-text-L mt-1">{!! $industry['desc'] !!}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-3 mt-lg-4">
                <a href="{{ route('applications.index') }}" class="common-border-btn fts-14">View All Applications <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="View All Applications"></a>
            </div>
        </div>
    </section>

    {{-- certified quality --}}
    @if ($certifications->isNotEmpty())
        <section class="py-4 py-lg-5 trust-strip-box">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Certified Quality</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Globally Certified &amp; Trusted</h2>
                </div>
                <div class="coverage-sliders mt-3 mt-lg-4">
                    @foreach ($certifications as $certification)
                        <div class="media-items">
                            <img src="{{ $certification->image_url }}" alt="{{ $certification->name }}" class="brand-media-logo" loading="lazy" decoding="async">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- exported worldwide --}}
    @if ($countries->isNotEmpty())
        <section class="py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Global Reach</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Exported to {{ $countries->count() }}+ Countries</h2>
                </div>
                <div class="row justify-content-center mt-3 mt-lg-4">
                    @foreach ($countries as $country)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
                            @if ($country->has_page)
                                <a href="{{ $country->url }}" class="country-chip text-decoration-none wow fadeInUp">
                                    <img src="{{ $country->image_url }}" alt="{{ $country->name }}" loading="lazy" decoding="async">
                                    <span class="fts-14 fw-4 subtitle-text-L">{{ $country->name }}</span>
                                </a>
                            @else
                                <div class="country-chip wow fadeInUp">
                                    <img src="{{ $country->image_url }}" alt="{{ $country->name }}" loading="lazy" decoding="async">
                                    <span class="fts-14 fw-4 subtitle-text-L">{{ $country->name }}</span>
                                </div>
                            @endif
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
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Need a custom psyllium solution? Let&rsquo;s talk.</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
