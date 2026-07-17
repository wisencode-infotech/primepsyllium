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
                <span class="current">About Us</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="icon-park-solid:factory-building"></iconify-icon>Your Fiber Partner Since 1995</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">Rooted in Tradition. Refined for the World.</h1>
                    <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">Prime Psyllium has been a trusted psyllium manufacturer and supplier in India since 2018, built on decades of family expertise that goes back to 1995.</p>
                </div>
            </div>

            <div class="row justify-content-center mt-3 mt-lg-4">
                <div class="col-lg-9">
                    <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-3 wow fadeInUp">
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:certificate-outline"></iconify-icon>30+ Years of Expertise</div>
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:leaf"></iconify-icon>Export-Grade Purity</div>
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:earth"></iconify-icon>{{ $countriesServedCount }}+ Countries Served</div>
                    </div>
                </div>
            </div>

            <div class="hero-actions d-flex align-items-center justify-content-center flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn fts-14">Get in Touch <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Get in Touch"></a>
                <a href="#our-journey" class="common-border-btn fts-14">Our Journey <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="Our Journey"></a>
            </div>
        </div>
    </section>

    {{-- who we are --}}
    <section class="about-main-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="row justify-content-center">
                <div class="col-lg-5 order-5 order-lg-0 mt-3 mt-lg-0">
                    <div class="about-left-layout">
                        <img src="{{ asset('assets/frontend/images/about-founder.webp') }}" alt="Haji NoorBhai KamalBhai Moriya, founding patriarch of Prime Psyllium" class="w-100 px-2 px-md-4 px-lg-5 wow zoomIn" loading="lazy" decoding="async">
                        <p class="fts-14 fw-5 title-text-L text-center mt-2 wow fadeInUp">Haji NoorBhai KamalBhai Moriya &mdash; Our Founding Patriarch</p>
                    </div>
                </div>
                <div class="col-lg-5 order-0 order-lg-5">
                    <div class="about-right-layout mt-lg-4">
                        <h6 class="common-icon-title fts-14 wow fadeInUp"><iconify-icon icon="icon-park-solid:factory-building"></iconify-icon>Who We Are</h6>
                        <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Prime Psyllium</h2>
                        <h4 class="fts-16 fw-5 title-text-L mt-2 mt-lg-3 wow fadeInUp">Top Rated Psyllium Products Manufacturer &amp; Supplier</h4>
                        <p class="fts-15 fw-4 subtitle-text-L mt-2 mt-lg-3 wow fadeInUp">Our roots trace back to Haji NoorBhai KamalBhai Moriya, who began cultivating and trading seeds in the 1950s and laid the foundation of the family&rsquo;s legacy in agriculture. That legacy carries through four generations to Prime Psyllium, a trusted psyllium manufacturer and supplier in India since 2018.</p>
                        <p class="fts-15 fw-4 subtitle-text-L mt-2 mt-lg-3 wow fadeInUp">Every batch we ship is sustainably processed and 100% naturally refined, backed by export-grade quality and consistent purity that meets international standards.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                <div class="col-lg-10">
                    <div class="about-experiance-flex d-flex flex-wrap flex-md-nowrap">
                        <div class="single-about-exp d-md-flex px-3 px-md-0 justify-content-center gap-2 align-items-center wow fadeInUp">
                            <h4 class="d-flex fts-32 fw-5 title-text-L">30 <span class="primary-light-color-L">+</span></h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Years of Industry <br> Expertise</p>
                        </div>
                        <div class="about-center-line"></div>
                        <div class="single-about-exp d-md-flex px-3 px-md-0 justify-content-center gap-2 align-items-center wow fadeInUp">
                            <h4 class="d-flex fts-32 fw-5 title-text-L">100 <span class="primary-light-color-L">%</span></h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Natural, Chemical <br> Free Sourcing</p>
                        </div>
                        <div class="about-center-line d-none d-md-block"></div>
                        <div class="single-about-exp re-size d-flex justify-content-center gap-2 align-items-center wow fadeInUp">
                            <h4 class="d-flex fts-32 fw-5 title-text-L">{{ $countriesServedCount }} <span class="primary-light-color-L">+</span></h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Countries Served <br> Worldwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- our journey / history timeline --}}
    <section id="our-journey" class="primer-product-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Journey</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">From Family Farms to Global Supply</h2>
                <p class="fts-15 fw-4 subtitle-text-L mt-1 mt-lg-2 wow fadeInUp">Seven decades of family expertise, built one generation at a time.</p>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                <div class="col-lg-8">
                    <div class="about-timeline">
                        <div class="timeline-item wow fadeInUp">
                            <span class="timeline-year">1950s</span>
                            <h4 class="fts-16 fw-6 title-text-L">A Family Begins in Agriculture</h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Our great-grandfather, Haji NoorBhai KamalBhai Moriya, began cultivating and trading cumin seeds, expanding cultivation across 40 villages.</p>
                        </div>
                        <div class="timeline-item wow fadeInUp">
                            <span class="timeline-year">1970</span>
                            <h4 class="fts-16 fw-6 title-text-L">A Trading House Is Established</h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Our grandfather opened a trading shop in the Palanpur market yard under &ldquo;M S Habibbhai Noorbhai Moriya,&rdquo; dealing in high-quality spices and grains.</p>
                        </div>
                        <div class="timeline-item wow fadeInUp">
                            <span class="timeline-year">1995</span>
                            <h4 class="fts-16 fw-6 title-text-L">Entry Into Psyllium</h4>
                            <p class="fts-14 fw-4 subtitle-text-L">The family entered psyllium husk production, starting with a small manufacturing unit processing one tonne a day.</p>
                        </div>
                        <div class="timeline-item wow fadeInUp">
                            <span class="timeline-year">2012</span>
                            <h4 class="fts-16 fw-6 title-text-L">Diversifying Into Spices</h4>
                            <p class="fts-14 fw-4 subtitle-text-L">We expanded into the spices sector, launching our Spices Ventures to diversify our product portfolio.</p>
                        </div>
                        <div class="timeline-item wow fadeInUp">
                            <span class="timeline-year">2018</span>
                            <h4 class="fts-16 fw-6 title-text-L">Prime Psyllium Is Founded</h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Prime Psyllium was founded under visionary leadership, with a mission to deliver premium-quality psyllium products globally.</p>
                        </div>
                        <div class="timeline-item wow fadeInUp">
                            <span class="timeline-year">2019</span>
                            <h4 class="fts-16 fw-6 title-text-L">Going Global</h4>
                            <p class="fts-14 fw-4 subtitle-text-L">We began exporting to international markets, marking the start of our global presence that now spans {{ $countriesServedCount }}+ countries.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- mission & vision --}}
    <section class="py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>What Drives Us</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Our Mission &amp; Vision</h2>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                <div class="col-lg-5 col-md-6 mt-3">
                    <div class="mission-vision-card wow fadeInUp">
                        <iconify-icon icon="mdi:target-arrow"></iconify-icon>
                        <h4 class="fts-18 fw-6 title-text-L">Our Mission</h4>
                        <p class="fts-15 fw-4 subtitle-text-L mt-2">To support the health and well-being of our customers by offering hygienic, natural and premium-quality psyllium products at competitive prices.</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 mt-3">
                    <div class="mission-vision-card wow fadeInUp">
                        <iconify-icon icon="mdi:eye-outline"></iconify-icon>
                        <h4 class="fts-18 fw-6 title-text-L">Our Vision</h4>
                        <p class="fts-15 fw-4 subtitle-text-L mt-2">Long-term success comes from meaningful relationships built on trust, transparency and genuine care for our customers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- core values --}}
    <section class="primer-product-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Values</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">What We Stand For</h2>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                @php
                    $values = [
                        ['icon' => 'mdi:handshake-outline', 'title' => 'Integrity & Care', 'desc' => 'We act with honesty, responsibility and genuine care in every relationship.'],
                        ['icon' => 'mdi:medal-outline', 'title' => 'Highest Quality Standards', 'desc' => 'Every batch is held to consistent, export-grade quality benchmarks.'],
                        ['icon' => 'mdi:shield-check-outline', 'title' => 'Safe, Trusted Products', 'desc' => 'Hygienic, certified processing you and your customers can rely on.'],
                        ['icon' => 'mdi:leaf-circle-outline', 'title' => 'Wellness & Sustainability', 'desc' => 'Naturally sourced fiber that supports health and long-term sustainability.'],
                    ];
                @endphp
                @foreach ($values as $value)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="industry-use-card wow fadeInUp">
                            <iconify-icon icon="{{ $value['icon'] }}"></iconify-icon>
                            <h4 class="fts-16 fw-6 title-text-L">{{ $value['title'] }}</h4>
                            <p class="fts-14 fw-4 subtitle-text-L mt-1">{{ $value['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- our brands --}}
    <section class="py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Brands</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">What We Offer</h2>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                @php
                    $brands = [
                        ['logo' => asset('assets/frontend/images/brand-logo.png'), 'title' => 'Prime Psyllium', 'desc' => 'High-quality psyllium husk, seeds and powder for global markets.'],
                        ['logo' => asset('assets/frontend/images/fibra.webp'), 'title' => 'Fibra', 'desc' => 'Specialized psyllium production powered by modern technology.'],
                        ['logo' => asset('assets/frontend/images/amiras.webp'), 'title' => 'Amiras Agro & Foods', 'desc' => 'Spices, powdered spices, herbs and oil seeds.'],
                    ];
                @endphp
                @foreach ($brands as $brand)
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="industry-use-card brand-logo-card wow fadeInUp">
                            <img src="{{ $brand['logo'] }}" alt="{{ $brand['title'] }}">
                            <p class="fts-14 fw-4 subtitle-text-L mt-2">{{ $brand['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- leadership team --}}
    <section class="primer-product-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Leadership</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">The People Behind Prime Psyllium</h2>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                @php
                    $team = [
                        ['name' => 'Mr. Abbas Moriya', 'role' => 'Chairman'],
                        ['name' => 'Mr. Mahendi Moriya', 'role' => 'Managing Director &ndash; Raw Material & Procurement'],
                        ['name' => 'Mr. Irfan Moriya', 'role' => 'Chief Operating Officer &ndash; Export & Marketing'],
                        ['name' => 'Mr. Haider Maknojiya', 'role' => 'Director of Operations'],
                        ['name' => 'Mr. Hasmukh Prajapati', 'role' => 'General Manager'],
                        ['name' => 'Mr. Ehmad', 'role' => 'Quality Head'],
                    ];
                @endphp
                @foreach ($team as $member)
                    <div class="col-lg-2 col-md-4 col-6 mt-3">
                        <div class="team-member-card wow fadeInUp">
                            <div class="team-avatar"><iconify-icon icon="mdi:account-outline"></iconify-icon></div>
                            <h4 class="fts-14 fw-6 title-text-L">{{ $member['name'] }}</h4>
                            <span class="team-role">{!! $member['role'] !!}</span>
                        </div>
                    </div>
                @endforeach
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

    {{-- global presence --}}
    @if ($countries->isNotEmpty())
        <section id="our-global-presence" class="our-global-section py-4 py-lg-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="global-left-layout px-2 px-sm-4">
                            <img src="{{ $settings->global_presence_image_url ?? asset('assets/frontend/images/globe.webp') }}" alt="Prime Psyllium global presence" class="w-100 wow zoomIn" loading="lazy" decoding="async">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="global-right-layout mt-3">
                            <h6 class="common-icon-title fts-14 mb-3 mb-lg-4 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Global Reach</h6>
                            <h2 class="fts-36 fw-5 title-text-L wow fadeInUp">Trusted in {{ $countries->count() }}+ Countries Worldwide</h2>
                            <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeInUp">Building long-term relationships with businesses worldwide through quality products, reliable supply and consistent service.</p>
                            <ul class="global-country-list d-flex flex-wrap mt-3 mt-lg-4">
                                @foreach ($countries as $country)
                                    <li class="fts-15 fw-4 subtitle-text-L py-1 wow fadeInUp">
                                        @if ($country->has_page)
                                            <a href="{{ $country->url }}" class="d-flex align-items-center gap-1 text-reset text-decoration-none"><img src="{{ $country->image_url }}" alt="{{ $country->name }}" loading="lazy" decoding="async">{{ $country->name }}</a>
                                        @else
                                            <img src="{{ $country->image_url }}" alt="{{ $country->name }}" loading="lazy" decoding="async">{{ $country->name }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
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
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Want to partner with Prime Psyllium? Let&rsquo;s talk.</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
