<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/product-detail.css')) }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/about-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/about-detail.css')) }}">
    @endpush

    {{-- hero --}}
    <section class="product-hero-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span class="current">Accreditation</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="iconamoon:certificate-badge-light"></iconify-icon>Accreditation &amp; Quality Certificates</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">Globally Certified. Trusted Worldwide.</h1>
                    <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">Our certifications reflect our commitment to food safety, product quality, and international compliance standards — giving our partners the confidence to rely on us.</p>
                </div>
            </div>

            <div class="row justify-content-center mt-3 mt-lg-4">
                <div class="col-lg-9">
                    <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-3 wow fadeInUp">
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:certificate-outline"></iconify-icon>FSSC 22000 Certified</div>
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:shield-check-outline"></iconify-icon>Export-Grade Quality</div>
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:leaf"></iconify-icon>100% Natural Processing</div>
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:earth"></iconify-icon>International Standards</div>
                    </div>
                </div>
            </div>

            <div class="hero-actions d-flex align-items-center justify-content-center flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn fts-14">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                <a href="#certifications" class="common-border-btn fts-14">View Certificates <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="View Certificates"></a>
            </div>
        </div>
    </section>

    {{-- why certifications matter --}}
    <section class="primer-product-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Why It Matters</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Quality You Can Trust</h2>
                <p class="fts-15 fw-4 subtitle-text-L mt-1 mt-lg-2 wow fadeInUp">Every certification we hold is a commitment — to safety, purity, and the global standards that matter most to our partners.</p>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                @php
                    $pillars = [
                        ['icon' => 'mdi:food-apple-outline', 'title' => 'Food Safety Standards', 'desc' => 'We adhere to internationally recognized food safety management systems, ensuring every batch meets strict hygiene and safety requirements.'],
                        ['icon' => 'mdi:medal-outline', 'title' => 'Consistent Product Quality', 'desc' => 'Our certifications validate that our manufacturing processes deliver consistent, export-grade quality from batch to batch.'],
                        ['icon' => 'mdi:earth', 'title' => 'Global Market Access', 'desc' => 'Our accreditations are recognized across USA, Canada, Europe and beyond — enabling frictionless import and distribution for our partners.'],
                        ['icon' => 'mdi:leaf-circle-outline', 'title' => 'Natural &amp; Sustainable', 'desc' => 'Certified processes ensure our psyllium is 100% naturally refined, chemical-free and produced in an environmentally responsible manner.'],
                    ];
                @endphp
                @foreach ($pillars as $pillar)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="industry-use-card wow fadeInUp">
                            <iconify-icon icon="{{ $pillar['icon'] }}"></iconify-icon>
                            <h4 class="fts-16 fw-6 title-text-L">{!! $pillar['title'] !!}</h4>
                            <p class="fts-14 fw-4 subtitle-text-L mt-1">{!! $pillar['desc'] !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- certifications grid --}}
    @if ($certifications->isNotEmpty())
        <section id="certifications" class="py-4 py-lg-5 trust-strip-box">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Certifications</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Accreditation &amp; Quality Certificates</h2>
                    <p class="fts-15 fw-4 subtitle-text-L mt-1 mt-lg-2 wow fadeInUp">Recognized by the world's leading quality and food safety bodies.</p>
                </div>
                <div class="row justify-content-center mt-3 mt-lg-4">
                    @foreach ($certifications as $certification)
                        <div class="col-lg-2 col-md-4 col-6 mt-3">
                            <div class="mission-vision-card text-center wow fadeInUp">
                                <img src="{{ $certification->image_url }}" alt="{{ $certification->name }}" class="cert-logo" loading="lazy" decoding="async">
                                @if ($certification->name)
                                    <p class="fts-13 fw-5 subtitle-text-L mb-0">{{ $certification->name }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- quality commitment --}}
    <section class="quality-trusted-section py-4 py-lg-5">
        <div class="container py-lg-5 py-2">
            <div class="row">
                <div class="col-lg-5 pe-lg-5">
                    <div class="driven-trust-box p-4 p-md-5">
                        <h6 class="common-icon-title fts-14"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Commitment</h6>
                        <h2 class="fts-36 fw-5 white-color-L mt-2 mt-lg-3">Rooted in Quality. Built on Trust.</h2>
                        <p class="fts-15 fw-4 white-color-L mt-2 mt-lg-3">Prime Psyllium invests continuously in maintaining and expanding our certifications. Our quality systems are audited regularly so our partners can always rely on the products they receive.</p>
                        <div class="d-flex flex-wrap flex-md-nowrap gap-2 mt-2 mt-lg-4">
                            <div class="nature-prces d-flex align-items-center gap-2 py-1">
                                <img src="{{ asset('assets/frontend/images/naturelly.png') }}" alt="">
                                <p class="fts-14 fw-4 white-color-L">100% Naturally Refined Production</p>
                            </div>
                            <div class="nature-prces d-flex align-items-center gap-2 py-1">
                                <img src="{{ asset('assets/frontend/images/Processed.png') }}" alt="">
                                <p class="fts-14 fw-4 white-color-L">Sustainably Processed</p>
                            </div>
                        </div>
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 mt-2 mt-lg-3">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- stats strip --}}
    <section class="about-main-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="about-experiance-flex d-flex flex-wrap flex-md-nowrap">
                        <div class="single-about-exp d-md-flex px-3 px-md-0 justify-content-center gap-2 align-items-center wow fadeInUp">
                            <h4 class="d-flex fts-32 fw-5 title-text-L">{{ $certifications->count() }} <span class="primary-light-color-L">+</span></h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Certifications &amp; <br> Accreditations</p>
                        </div>
                        <div class="about-center-line"></div>
                        <div class="single-about-exp d-md-flex px-3 px-md-0 justify-content-center gap-2 align-items-center wow fadeInUp">
                            <h4 class="d-flex fts-32 fw-5 title-text-L">14 <span class="primary-light-color-L">+</span></h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Countries Served <br> Worldwide</p>
                        </div>
                        <div class="about-center-line d-none d-md-block"></div>
                        <div class="single-about-exp re-size d-flex justify-content-center gap-2 align-items-center wow fadeInUp">
                            <h4 class="d-flex fts-32 fw-5 title-text-L">30 <span class="primary-light-color-L">+</span></h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Years of Industry <br> Expertise</p>
                        </div>
                    </div>
                </div>
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
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Ready to partner with a certified, trusted psyllium supplier?</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
