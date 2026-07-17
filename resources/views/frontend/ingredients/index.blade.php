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
                <span class="current">Ingredients</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Ingredients</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">Nature&rsquo;s Finest Ingredients</h1>
                    <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">We&rsquo;re not just supplying Psyllium &mdash; we&rsquo;re supporting the backbone of agriculture. Our products are trusted by agri-businesses and industry partners because we deliver purity, consistency, and dependable quality that helps them grow with confidence.</p>
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
                <a href="#psyllium-range" class="common-border-btn fts-14">Browse Ingredients <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="Browse Ingredients"></a>
            </div>
        </div>
    </section>

    {{-- psyllium products --}}
    @if ($products->isNotEmpty())
        <section class="py-4 py-lg-5" id="psyllium-range">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Psyllium Range</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Psyllium Products</h2>
                    <p class="fts-15 fw-4 subtitle-text-L mt-1 mt-lg-2 wow fadeInUp">From whole seeds to finely milled powders &mdash; every Prime Psyllium product is naturally sourced and processed to consistent, export-ready quality.</p>
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
    @endif

    {{-- other specialty ingredients --}}
    @if ($otherProducts->isNotEmpty())
        <section class="primer-product-section py-4 py-lg-5" id="specialty-ingredients">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Specialty Range</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Other Ingredients</h2>
                    <p class="fts-15 fw-4 subtitle-text-L mt-1 mt-lg-2 wow fadeInUp">Beyond psyllium, we supply a curated range of premium agri-farm ingredients sourced directly from trusted farmers.</p>
                </div>
                <div class="row justify-content-center mt-3 mt-lg-4">
                    @foreach ($otherProducts as $product)
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
    @endif

    {{-- why choose our ingredients --}}
    <section class="py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Why Choose Us</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">World Class Quality at the Best Price</h2>
                <p class="fts-15 fw-4 subtitle-text-L mt-1 mt-lg-2 wow fadeInUp">Every ingredient we supply is backed by consistent purity, rigorous quality control and reliable on-time delivery.</p>
            </div>
            @php
                $pillars = [
                    ['icon' => 'mdi:medal-outline',        'title' => 'Export-Grade Purity',      'desc' => 'Every batch meets international quality benchmarks and passes rigorous in-house testing before dispatch.'],
                    ['icon' => 'mdi:leaf-circle-outline',  'title' => 'Naturally Sourced',         'desc' => '100% naturally refined and chemical-free — sourced directly from trusted farm networks across India.'],
                    ['icon' => 'mdi:shield-check-outline', 'title' => 'Certified & Compliant',     'desc' => 'Our facilities and products carry globally recognised certifications for food safety and quality.'],
                    ['icon' => 'mdi:handshake-outline',    'title' => 'Reliable Partnership',      'desc' => 'From sample to shipment, we deliver consistent quality and dependable service that you can count on.'],
                    ['icon' => 'mdi:package-variant-closed', 'title' => 'Bulk & Private Label',   'desc' => 'Available in bulk or private-label packaging tailored to your brand and market requirements.'],
                    ['icon' => 'mdi:earth',                'title' => 'Global Reach',              'desc' => 'Trusted by businesses across '.$countriesServedCount.'+ countries with a proven track record of seamless export logistics.'],
                ];
            @endphp
            <div class="row justify-content-center mt-3 mt-lg-4">
                @foreach ($pillars as $pillar)
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="industry-use-card wow fadeInUp">
                            <iconify-icon icon="{{ $pillar['icon'] }}"></iconify-icon>
                            <h4 class="fts-16 fw-6 title-text-L">{{ $pillar['title'] }}</h4>
                            <p class="fts-14 fw-4 subtitle-text-L mt-1">{{ $pillar['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- cta banner --}}
    <section class="py-4 py-lg-5">
        <div class="container">
            <div class="product-cta-banner p-4 p-md-5">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Get in Touch</h6>
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Need a custom ingredient solution? Let&rsquo;s talk.</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
