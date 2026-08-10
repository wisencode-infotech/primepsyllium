<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/product-detail.css')) }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/about-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/about-detail.css')) }}">
        <style>
            .application-section{ position: relative; overflow: hidden; }
            .application-eyebrow-row{ display: flex; align-items: center; justify-content: space-between; gap: 12px; }
            .application-index{ font-size: 15px; font-weight: 700; letter-spacing: 2px; color: var(--primary-light-text); opacity: .55; }
            .application-media{ position: relative; }
            .application-media::before{
                content: "";
                position: absolute;
                inset: 18px -18px -18px 18px;
                background: var(--primary-light-color);
                opacity: .3;
                border-radius: 24px;
                z-index: 0;
            }
            .col-lg-6.order-lg-0 .application-media::before{ inset: 18px 18px -18px -18px; }
            .application-media img{
                position: relative;
                z-index: 1;
                border-radius: 20px;
                box-shadow: 1px 15px 45px 5px #00000022;
                border: 6px solid var(--white-color);
            }
            .application-media-badge{
                position: absolute;
                z-index: 2;
                bottom: -18px;
                left: 24px;
                display: flex;
                align-items: center;
                gap: 10px;
                background: var(--primary-color);
                color: var(--white-color);
                border-radius: 14px;
                padding: 12px 18px;
                box-shadow: 1px 10px 30px 5px #00000030;
            }
            .col-lg-6.order-lg-0 .application-media-badge{ left: auto; right: 24px; }
            .application-media-badge iconify-icon{
                height: 34px;
                width: 34px;
                min-width: 34px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #ffffff26;
                border-radius: 10px;
                font-size: 18px;
            }
            .application-media-badge strong{ display: block; font-size: 18px; line-height: 1.1; }
            .application-media-badge span{ display: block; font-size: 11px; opacity: .8; text-transform: uppercase; letter-spacing: .5px; }
            .application-checklist{
                display: grid;
                grid-template-columns: repeat(1, minmax(0, 1fr));
                gap: 10px;
            }
            @media (min-width: 576px){
                .application-checklist{ grid-template-columns: repeat(2, minmax(0, 1fr)); }
            }
            .application-checklist-item{
                display: flex;
                align-items: center;
                gap: 10px;
                background: var(--white-color);
                border-radius: 12px;
                padding: 12px 14px;
                box-shadow: 1px 3px 20px 5px #00000008;
                transition: transform .25s, box-shadow .25s;
            }
            .application-checklist-item:hover{
                transform: translateY(-3px);
                box-shadow: 1px 8px 25px 5px #00000014;
            }
            .application-checklist-item iconify-icon{
                height: 28px;
                width: 28px;
                min-width: 28px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: var(--primary-color);
                color: var(--white-color);
                border-radius: 50%;
                font-size: 15px;
            }
        </style>
    @endpush

    @php
        $industries = [
            [
                'slug' => 'pharmaceutical',
                'icon' => 'fluent:pill-24-filled',
                'tag' => 'Pharmaceutical Industry',
                'title' => 'Products in Pharmaceutical Industry',
                'desc' => 'Psyllium husk and husk powder act as natural thickening agents and effective lubricant laxatives, making them ideal for high-purity pharmaceutical formulations.',
                'items' => ['Laxation', 'Diabetes Management', 'Cholesterol Control', 'Hemorrhoid Relief'],
                'image' => 'application-1.png',
            ],
            [
                'slug' => 'food-beverage',
                'icon' => 'mdi:silverware-fork-knife',
                'tag' => 'Food & Beverage Industry',
                'title' => 'Products in Food and Beverage Industry',
                'desc' => 'Our psyllium\'s natural mucilage and thickening properties make it a trusted stabilizer and fiber booster across a wide range of food and beverage products.',
                'items' => ['Ice Cream', 'Biscuits & Breads', 'Rice & Instant Noodles', 'Bakery Products', 'Beverages & Fruit Drinks', 'Flavored Drinks', 'Cakes & Jams'],
                'image' => 'application-2.png',
            ],
            [
                'slug' => 'dietary-supplement',
                'icon' => 'mdi:pill-multiple',
                'tag' => 'Dietary Supplement Industry',
                'title' => 'Products in Dietary Supplement Industry',
                'desc' => 'High-quality psyllium husk is in strong demand across the dietary supplement industry, valued for its consistency, purity and ability to enhance the fiber profile of every formulation.',
                'items' => ['Capsules', 'Diet Supplements', 'Powder Blends', 'Granules'],
                'image' => 'application-3.png',
            ],
            [
                'slug' => 'pet-food',
                'icon' => 'mdi:paw',
                'tag' => 'Pet Food Industry',
                'title' => 'Products in Pet Food Industry',
                'desc' => 'Psyllium is an excellent natural source of fiber, helping formulate balanced, health-supporting nutrition for pets.',
                'items' => ['Intestinal Disorders', 'Diarrhea Management', 'Hindgut Health', 'Milk Off-take', 'Hairball Removal'],
                'image' => 'application-4.png',
            ],
            [
                'slug' => 'cosmetic',
                'icon' => 'mdi:flower-outline',
                'tag' => 'Cosmetic Industry',
                'title' => 'Products in Cosmetic Industry',
                'desc' => 'Psyllium\'s effective sizing and binding properties are in strong demand across beauty and personal care formulations.',
                'items' => ['Cosmetics', 'Skin Care Products', 'Anti-aging Herbal Products'],
                'image' => 'application-5.png',
            ],
            [
                'slug' => 'industrial',
                'icon' => 'mdi:factory',
                'tag' => 'Industrial Powder Products',
                'title' => 'Psyllium Industrial Powder Products',
                'desc' => 'Beyond digestive health, our versatile industrial-grade psyllium powder serves practical applications across multiple industries.',
                'items' => ['Landscaping', 'Soil Erosion Control', 'Animal Feed', 'Pathway Construction', 'Cycle Paths', 'Courts & Schoolyards'],
                'image' => 'application-6.png',
            ],
            [
                'slug' => 'meat',
                'icon' => 'mdi:food-steak',
                'tag' => 'Meat Industry',
                'title' => 'Products in Meat Industry',
                'desc' => 'Psyllium acts as a natural binder and stabilizer, adding valuable fiber content to processed meat products.',
                'items' => ['Meat Sausages', 'Meat Patties', 'Meat Batters', 'Meat Rolls'],
                'image' => 'application-7.png',
            ],
        ];

        $totalApplications = collect($industries)->sum(fn ($industry) => count($industry['items']));
    @endphp

    {{-- hero --}}
    <section class="product-hero-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span class="current">Applications</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="mdi:apps"></iconify-icon>Where Psyllium Powers Industries</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">Applications of Psyllium Across Global Industries</h1>
                    <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">From pharmaceuticals to food, cosmetics and beyond &mdash; our premium psyllium husk, seeds and powder deliver natural fiber, binding and thickening properties across seven major industries.</p>
                </div>
            </div>

            <div class="hero-actions d-flex align-items-center justify-content-center flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn fts-14">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                <a href="#industries" class="common-border-btn fts-14">Explore Industries <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="Explore Industries"></a>
            </div>

            <div class="row justify-content-center mt-3 mt-lg-4">
                <div class="col-lg-10">
                    <div class="about-experiance-flex d-flex flex-wrap flex-md-nowrap">
                        <div class="single-about-exp d-md-flex px-3 px-md-0 justify-content-center gap-2 align-items-center wow fadeInUp">
                            <h4 class="d-flex fts-32 fw-5 title-text-L">{{ count($industries) }}</h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Industries <br> Served</p>
                        </div>
                        <div class="about-center-line"></div>
                        <div class="single-about-exp d-md-flex px-3 px-md-0 justify-content-center gap-2 align-items-center wow fadeInUp">
                            <h4 class="d-flex fts-32 fw-5 title-text-L">{{ $totalApplications }} <span class="primary-light-color-L">+</span></h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Real-World <br> Applications</p>
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

    {{-- industries overview --}}
    <section id="industries" class="primer-product-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Industries We Serve</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Seven Industries, One Trusted Fiber Partner</h2>
                <p class="fts-15 fw-4 subtitle-text-L mt-1 mt-lg-2 wow fadeInUp">Explore how our psyllium products are used across the industries we supply.</p>
            </div>
            <div class="row justify-content-center mt-3 mt-lg-4">
                @foreach ($industries as $industry)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <a href="#{{ $industry['slug'] }}" class="text-decoration-none d-block">
                            <div class="industry-use-card wow fadeInUp">
                                <iconify-icon icon="{{ $industry['icon'] }}"></iconify-icon>
                                <h4 class="fts-16 fw-6 title-text-L">{{ $industry['tag'] }}</h4>
                                <p class="fts-14 fw-4 subtitle-text-L mt-1">{{ count($industry['items']) }} key applications</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- industry detail sections --}}
    @foreach ($industries as $index => $industry)
        <section id="{{ $industry['slug'] }}" class="application-section py-4 py-lg-5 {{ $index % 2 === 0 ? 'primer-product-section' : '' }}">
            <div class="container py-lg-2">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-{{ $index % 2 === 0 ? '0' : '5' }} order-lg-{{ $index % 2 === 0 ? '0' : '5' }}">
                        <div class="application-eyebrow-row wow fadeInUp">
                            <h6 class="common-icon-title fts-14 mb-0"><iconify-icon icon="{{ $industry['icon'] }}"></iconify-icon>{{ $industry['tag'] }}</h6>
                            <span class="application-index">{{ sprintf('%02d', $index + 1) }} / {{ sprintf('%02d', count($industries)) }}</span>
                        </div>
                        <h2 class="fts-36 fw-5 title-text-L mt-2 mt-lg-3 wow fadeInUp">{{ $industry['title'] }}</h2>
                        <p class="fts-15 fw-4 subtitle-text-L mt-2 mt-lg-3 wow fadeInUp">{{ $industry['desc'] }}</p>
                        <div class="application-checklist mt-2 mt-lg-3">
                            @foreach ($industry['items'] as $item)
                                <div class="application-checklist-item fts-14 fw-5 title-text-L wow fadeInUp"><iconify-icon icon="mdi:check-bold"></iconify-icon>{{ $item }}</div>
                            @endforeach
                        </div>
                        <a href="{{ route('contact.index') }}" class="common-bg-btn fts-14 mt-3 mt-lg-4 wow fadeInUp">Make an Inquiry <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0 order-{{ $index % 2 === 0 ? '5' : '0' }} order-lg-{{ $index % 2 === 0 ? '5' : '0' }}">
                        <div class="application-media wow zoomIn">
                            <img src="{{ asset('assets/frontend/images/applications/'.$industry['image']) }}" alt="{{ $industry['tag'] }} application" class="w-100" loading="lazy" decoding="async">
                            <div class="application-media-badge">
                                <iconify-icon icon="{{ $industry['icon'] }}"></iconify-icon>
                                <div>
                                    <strong>{{ count($industry['items']) }}</strong>
                                    <span>Applications</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    {{-- cta banner --}}
    <section class="py-4 py-lg-5">
        <div class="container">
            <div class="product-cta-banner p-4 p-md-5">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Get in Touch</h6>
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Have a new application in mind? Let&rsquo;s explore it together.</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
