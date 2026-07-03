<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/product-detail.css')) }}">
    @endpush

    {{-- product hero section --}}
    <section class="product-hero-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('home') }}#products">Products</a>
                <span>/</span>
                <span class="current">{{ $product->name }}</span>
            </nav>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="product-hero-content text-center text-lg-start">
                        <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeIn"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Products</h6>
                        <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">{{ $product->name }}</h1>

                        @if ($product->description)
                            <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">{{ $product->description }}</p>
                        @endif

                        <div class="product-feature-list justify-content-center justify-content-lg-start mt-3 mt-lg-4 wow fadeIn">
                            <div class="product-feature-chip fts-13"><iconify-icon icon="iconamoon:certificate-badge-light"></iconify-icon>FSSC 22000 Certified</div>
                            <div class="product-feature-chip fts-13"><iconify-icon icon="hugeicons:tags"></iconify-icon>Bulk &amp; Private Label</div>
                            <div class="product-feature-chip fts-13"><iconify-icon icon="streamline-ultimate:job-responsibility-bag-hand"></iconify-icon>Export-Grade Purity</div>
                        </div>

                        <div class="hero-actions d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                            <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn fts-14">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Request a Quote"></a>
                            <a href="{{ route('home') }}#products" class="common-border-btn fts-14">View All Products <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="View All Products"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="product-hero-media wow zoomIn">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- product content section --}}
    <section class="product-content-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="row">
                <div class="col-lg-7">
                    @if ($product->clean_content)
                        <div class="product-content wow fadeInUp">
                            {!! $product->clean_content !!}
                        </div>
                    @elseif ($product->description)
                        <p class="product-content wow fadeInUp">{{ $product->description }}</p>
                    @endif
                </div>
                <div class="col-lg-4 offset-lg-1 mt-4 mt-lg-0">
                    <div class="product-specs-box wow fadeInUp">
                        <h4 class="fts-18 fw-6 title-text-L mb-3">Why Choose Prime Psyllium</h4>
                        <div class="single-spec-item">
                            <iconify-icon icon="mdi:leaf"></iconify-icon>
                            <p class="fts-14 fw-4 subtitle-text-L">100% naturally refined, chemical-free sourcing</p>
                        </div>
                        <div class="single-spec-item">
                            <iconify-icon icon="iconamoon:certificate-badge-light"></iconify-icon>
                            <p class="fts-14 fw-4 subtitle-text-L">Produced in an FSSC 22000 certified facility</p>
                        </div>
                        <div class="single-spec-item">
                            <iconify-icon icon="hugeicons:tags"></iconify-icon>
                            <p class="fts-14 fw-4 subtitle-text-L">Bulk supply with custom private label packaging</p>
                        </div>
                        <div class="single-spec-item">
                            <iconify-icon icon="streamline-ultimate:job-responsibility-bag-hand"></iconify-icon>
                            <p class="fts-14 fw-4 subtitle-text-L">Reliable export-grade purity, trusted worldwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- related products section --}}
    @if ($otherProducts->isNotEmpty())
        <section class="related-products-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Explore More</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Other Psyllium Products</h2>
                </div>
                <div class="row justify-content-center mt-3 mt-lg-4">
                    @foreach ($otherProducts as $otherProduct)
                        <div class="col-lg-4 col-md-6 mt-3">
                            <a href="{{ route('products.show', $otherProduct) }}" class="related-product-card d-block wow fadeInUp">
                                <img src="{{ $otherProduct->image_url }}" alt="{{ $otherProduct->name }}" class="product-img" loading="lazy" decoding="async">
                                <h4 class="mt-2 mt-md-3 fts-18 fw-6 title-text-L">{{ $otherProduct->name }}</h4>
                                <p class="fts-14 fw-4 subtitle-text-L mt-1 mt-md-2">{{ $otherProduct->description }}</p>
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
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Interested in {{ $product->name }}? Let&rsquo;s discuss your requirement.</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Request a Quote"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
