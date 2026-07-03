<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/product-detail.css')) }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/country-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/country-detail.css')) }}">
    @endpush

    {{-- hero --}}
    <section class="product-hero-section country-hero-section py-4 py-lg-5" @if ($country->banner_image_url) style="background-image: linear-gradient(180deg, rgba(15, 46, 34, 0.72), rgba(15, 46, 34, 0.88)), url('{{ $country->banner_image_url }}');" @endif>
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('home') }}#our-global-presence">Global Presence</a>
                <span>/</span>
                <span class="current">{{ $country->name }}</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    @if ($country->image_url)
                        <img src="{{ $country->image_url }}" alt="{{ $country->name }} flag" class="country-hero-flag mb-3 wow zoomIn" loading="lazy" decoding="async">
                    @endif
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="mdi:earth"></iconify-icon>Trusted Manufacturer &amp; Supplier of Psyllium Products</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">{{ $country->name }}</h1>
                </div>
            </div>

            <div class="hero-actions d-flex align-items-center justify-content-center flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn fts-14">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Request a Quote"></a>
            </div>
        </div>
    </section>

    {{-- major cities --}}
    @if (! empty($country->cities))
        <section class="py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="mdi:city-variant-outline"></iconify-icon>Where We Deliver</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Major Cities We Supply Psyllium Products</h2>
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-3 mt-3 mt-lg-4">
                    @foreach ($country->cities as $city)
                        <div class="city-chip fts-14 wow fadeInUp"><iconify-icon icon="mdi:map-marker-outline"></iconify-icon>{{ $city }}</div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- product range: international markets --}}
    @if ($products->isNotEmpty())
        <section class="primer-product-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Products</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Our Psyllium Products for International Markets</h2>
                </div>
                <div class="row justify-content-center mt-3 mt-lg-4">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 mt-3">
                            <a href="{{ route('products.show', $product) }}" class="related-product-card d-block wow fadeInUp">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-img" loading="lazy" decoding="async">
                                <h4 class="mt-2 mt-md-3 fts-18 fw-6 title-text-L">{{ $product->name }}</h4>
                                <p class="fts-14 fw-4 subtitle-text-L mt-1 mt-md-2">{{ $product->description }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- introduction --}}
    @if ($country->intro_content)
        <section class="product-content-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="heading-products text-center">
                            <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Introduction</h6>
                            <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Psyllium Supplier for {{ $country->name }}</h2>
                        </div>
                        <div class="product-content mt-3 mt-lg-4 wow fadeInUp">
                            {!! $country->intro_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- market demand --}}
    @if ($country->market_demand_content)
        <section class="primer-product-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="heading-products text-center">
                            <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="mdi:trending-up"></iconify-icon>Market Insights</h6>
                            <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Market Demand in {{ $country->name }}</h2>
                        </div>
                        <div class="product-content mt-3 mt-lg-4 wow fadeInUp">
                            {!! $country->market_demand_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- product range: country specific --}}
    @if ($products->isNotEmpty())
        <section class="py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Product Range</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Our Psyllium Product Range for {{ $country->name }}</h2>
                </div>
                <div class="row justify-content-center mt-3 mt-lg-4">
                    @foreach ($products as $product)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
                            <a href="{{ route('products.show', $product) }}" class="country-chip d-block wow fadeInUp">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy" decoding="async">
                                <span class="fts-14 fw-4 subtitle-text-L">{{ $product->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- export capability --}}
    @if ($country->export_capability_content)
        <section class="primer-product-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="heading-products text-center">
                            <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="hugeicons:tags"></iconify-icon>Export Ready</h6>
                            <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Export Capability</h2>
                        </div>
                        <div class="product-content mt-3 mt-lg-4 wow fadeInUp">
                            {!! $country->export_capability_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- quality standards --}}
    @if ($country->quality_standards_content)
        <section class="py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="heading-products text-center">
                            <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="iconamoon:certificate-badge-light"></iconify-icon>Assurance</h6>
                            <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Quality Standards</h2>
                        </div>
                        <div class="product-content mt-3 mt-lg-4 wow fadeInUp">
                            {!! $country->quality_standards_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- export logistics --}}
    @if ($country->export_logistics_content)
        <section class="primer-product-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="heading-products text-center">
                            <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="streamline-ultimate:job-responsibility-bag-hand"></iconify-icon>Logistics</h6>
                            <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Export Logistics to {{ $country->name }}</h2>
                        </div>
                        <div class="product-content mt-3 mt-lg-4 wow fadeInUp">
                            {!! $country->export_logistics_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- faq --}}
    @if (! empty($country->faqs))
        <section class="py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="heading-products text-center">
                            <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="mdi:help-circle-outline"></iconify-icon>FAQ</h6>
                            <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Frequently Asked Questions</h2>
                        </div>
                        <div class="country-faq-list mt-3 mt-lg-4">
                            @foreach ($country->faqs as $faq)
                                <details class="country-faq-item wow fadeInUp">
                                    <summary class="fts-16 fw-6 title-text-L">{{ $faq['question'] }}</summary>
                                    <p class="fts-14 fw-4 subtitle-text-L mt-2">{{ $faq['answer'] }}</p>
                                </details>
                            @endforeach
                        </div>
                    </div>
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
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Looking for a Reliable Psyllium Supplier in {{ $country->name }}?</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
