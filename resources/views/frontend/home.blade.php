<x-frontend-layout>

    {{-- header / hero section start --}}
    <header class="prime-header-layout py-4 py-lg-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-left-layout text-center text-lg-start">
                        <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeIn"><iconify-icon icon="icon-park-solid:factory-building"></iconify-icon>Your Fiber Partner Since 1995</h6>
                        <h1 class="fts-54 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">Pure fiber, refined for the world.</h1>
                        <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">We deliver reliable, high-quality psyllium solutions that boost performance, reduce costs and support a greener future.</p>
                        <div class="hero-actions d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                            <a href="#get-in-touch" class="common-bg-btn fts-14">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Request a Quote"></a>
                            <a href="#products" class="common-border-btn fts-14">Explore Products <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="Explore Products"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 px-sm-0 mt-4 mt-lg-0">
                    <div class="header-right-layout position-relative">
                        <img src="{{ asset('assets/frontend/images/hero-img.png') }}" alt="Prime Psyllium" class="w-100 wow zoomIn" style="mix-blend-mode: darken;">
                        <div class="header-step-position-1 fts-14"><iconify-icon icon="iconamoon:certificate-badge-light" class="fts-22 primary-light-color-L"></iconify-icon>FSSC 22000 Certified</div>
                        <div class="header-step-position-2 fts-14"><iconify-icon icon="hugeicons:tags" class="fts-22 primary-light-color-L"></iconify-icon>Bulk &amp; Private Label</div>
                        <div class="header-step-position-3 fts-14"><iconify-icon icon="streamline-ultimate:job-responsibility-bag-hand" class="fts-22 primary-light-color-L"></iconify-icon>Export-Grade Purity</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Media Coverage / certifications slider section --}}
    <section class="media-coverage-main py-4 py-lg-5">
        <div class="container">
            <div class="coverage-sliders">
                @foreach($certifications as $certification)
                    <div class="media-items">
                        <img src="{{ $certification->image_url }}" alt="{{ $certification->name }}" class="brand-media-logo">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- about us section start --}}
    <section id="about-us" class="about-main-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <div class="row justify-content-center">
                <div class="col-lg-5 order-5 order-lg-0 mt-3 mt-lg-0">
                    <div class="about-left-layout">
                        <img src="{{ asset('assets/frontend/images/about-img-bg.png') }}" alt="Prime Psyllium" class="w-100 px-2 px-md- px-lg-5 wow zoomIn">
                    </div>
                </div>
                <div class="col-lg-5 order-0 order-lg-5">
                    <div class="about-right-layout mt-lg-4">
                        <h6 class="common-icon-title fts-14 wow fadeInUp"><iconify-icon icon="icon-park-solid:factory-building"></iconify-icon>About us</h6>
                        <h2 class="fts-46 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Prime Psyllium</h2>
                        <h4 class="fts-16 fw-5 title-text-L mt-2 mt-lg-3 wow fadeInUp">Top Rated Psyllium Products Manufacturer &amp; Supplier</h4>
                        <p class="fts-15 fw-4 subtitle-text-L mt-2 mt-lg-3 wow fadeInUp">Prime Psyllium has been a trusted Psyllium manufacturer and supplier in India since 2018, built on decades of industry expertise. Our founder has been actively involved in the psyllium business since 1995, bringing deep knowledge and experience across sourcing, processing, and global supply.</p>
                        <a href="#products" class="secondary-more fts-14 mt-2 mt-lg-3 fw-5 wow fadeInUp">Learn More <img src="{{ asset('assets/frontend/images/arrow-secondary.png') }}" alt=""></a>
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
                            <h4 class="d-flex fts-32 fw-5 title-text-L">14 <span class="primary-light-color-L">+</span></h4>
                            <p class="fts-14 fw-4 subtitle-text-L">Countries Served <br> Worldwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Premium Psyllium Products section --}}
    <section class="primer-product-section py-4 py-lg-5" id="products">
        <div class="container">
            <div class="heading-products text-center">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Products</h6>
                <h2 class="fts-46 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">Premium Psyllium Products</h2>
                <p class="fts-15 fw-4 subtitle-text-L mt-1 mt-lg-2 wow fadeInUp">Psyllium that brings nature&rsquo;s wellness to every product. Clean, pure and backed by trust.</p>
            </div>
            <div class="prime-product-slider mt-3 mt-lg-4 pt-3 px-lg-4">
                @foreach($products as $product)
                    <div class="single-prime-product text-center mx-2">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-img">
                        <h4 class="mt-2 mt-md-3 fts-20 fw-6 title-text-L">{{ $product->name }}</h4>
                        <p class="fts-14 fw-4 subtitle-text-L mt-1 mt-md-2">{{ $product->description }}</p>
                        <a href="#get-in-touch" class="media-more fts-14 fw-4 primary-light-color-L text-decoration-underline d-flex align-items-center gap-1 justify-content-center mt-1 mt-md-2">Read More <img src="{{ asset('assets/frontend/images/arrow-light.png') }}" alt=""></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Rooted in Quality. Driven by Trust. section --}}
    <section id="quality" class="quality-trusted-section py-4 py-lg-5">
        <div class="container py-lg-5 py-2">
            <div class="row">
                <div class="col-lg-5 pe-lg-5">
                    <div class="driven-trust-box p-4 p-md-5">
                        <h6 class="common-icon-title fts-14"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Who We Are</h6>
                        <h2 class="fts-46 fw-5 white-color-L mt-2 mt-lg-3">Rooted in Quality. Driven by Trust.</h2>
                        <p class="fts-15 fw-4 white-color-L mt-2 mt-lg-3">Prime Psyllium is a trusted supplier of premium psyllium products, serving businesses worldwide with a commitment to quality, consistency, and dependable partnerships.</p>
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
                        <a href="#get-in-touch" class="common-bg-btn bg-white fts-14 mt-2 mt-lg-3">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Request a Quote"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- media center section start --}}
    <div class="media-center-section pt-4 pt-lg-5">
        <div class="container">
            <h6 class="common-icon-title mx-auto fts-14 mb-3 mb-lg-4 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Media Center</h6>
            <div class="row">
                <div class="col-xxl-10 mx-auto mt-lg-2">
                    <div class="row justify-content-center">
                        @foreach ($mediaCenterItems as $item)
                            <div class="col-lg-5 mt-3">
                                <div class="media-center-box p-4">
                                    <div class="footer-steps-box">
                                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                                    </div>
                                    <div class="footer-steps-content mt-3">
                                        <span>{{ $item->formatted_date }}</span>
                                        <h4 class="fts-16 fw-6 title-text-L">{{ $item->title }}</h4>
                                        <p class="fts-14 fw-4 subtitle-text-L mt-1 mt-md-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $item->description }}</p>
                                        <a href="{{ $item->link ?: route('events.show', $item) }}" class="media-more mt-1 mt-md-2 fts-14 fw-4 primary-light-color-L text-decoration-underline d-flex align-items-center gap-1">Read More <img src="{{ asset('assets/frontend/images/arrow-light.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Our Global Presence section --}}
    <section id="our-global-presence" class="our-global-section py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="global-left-layout px-2 px-sm-4">
                        <img src="{{ $settings->global_presence_image_url ?? asset('assets/frontend/images/globe.png') }}" alt="Prime Psyllium global presence" class="w-100 wow zoomIn">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="global-right-layout mt-3">
                        <h6 class="common-icon-title fts-14 mb-3 mb-lg-4 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Global Presence</h6>
                        <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeInUp">Building long-term relationships with businesses worldwide through quality products, reliable supply, and consistent service.</p>
                        <ul class="global-country-list d-flex flex-wrap mt-3 mt-lg-4">
                            @foreach($countries as $country)
                                <li class="fts-15 fw-4 subtitle-text-L py-1 wow fadeInUp"><img src="{{ $country->image_url }}" alt="{{ $country->name }}">{{ $country->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- contact section start --}}
    <section class="prime-contact-section py-4 py-lg-5" id="get-in-touch">
        <div class="contact-right-bg">
            <img src="{{ asset('assets/frontend/images/packaging.png') }}" alt="" class="w-100 d-md-none">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="contact-left-layout">
                            <h6 class="common-icon-title fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Get in Touch</h6>
                            <h2 class="fts-54 fw-5 title-text-L mt-2 mt-lg-3 wow fadeInUp">Discuss Your Requirements.</h2>
                            <div class="contact-form-prime contact-form-card mt-3 mt-lg-4">
                                <form action="" method="get">
                                    <div class="row gx-3 gy-3">
                                        <div class="col-6">
                                            <div class="common-contact-field wow fadeInUp">
                                                <label for="contact-name" class="fts-14 fw-5 title-text-L mb-2 ms-2">Full Name *</label>
                                                <input type="text" name="name" id="contact-name" placeholder="Enter Full Name" class="common-input fts-14" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="common-contact-field wow fadeInUp">
                                                <label for="contact-company" class="fts-14 fw-5 title-text-L mb-2 ms-2">Company *</label>
                                                <input type="text" name="company" id="contact-company" placeholder="Enter Company Name" class="common-input fts-14" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="common-contact-field wow fadeInUp">
                                                <label for="contact-email" class="fts-14 fw-5 title-text-L mb-2 ms-2">Email Address *</label>
                                                <input type="email" name="email" id="contact-email" placeholder="Enter Email Address" class="common-input fts-14" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="common-contact-field wow fadeInUp">
                                                <label for="contact-product" class="fts-14 fw-5 title-text-L mb-2 ms-2">Product Interest *</label>
                                                <select name="product_interest" id="contact-product" class="common-input fts-14" required>
                                                    <option value="" selected disabled>Enter Product Interest</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->slug }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="common-contact-field wow fadeInUp">
                                                <label for="contact-message" class="fts-14 fw-5 title-text-L mb-2 ms-2">Message *</label>
                                                <textarea name="message" id="contact-message" class="common-input fts-14" rows="6" placeholder="Tell us about your requirement...." required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="common-bg-btn contact-submit-btn fts-14 wow fadeInUp">Get Started <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5"></div>
                </div>
            </div>
        </div>
        <section class="contact-info-strip mt-4 pt-lg-4">
            <div class="container">
                <div class="row px-xl-5">
                    <div class="col-lg-4 py-2 my-1">
                        <div class="contact-details-prime wow fadeInUp d-flex gap-3">
                            <div class="left-contact-icon"><iconify-icon icon="subway:call"></iconify-icon></div>
                            <div class="right-contact-text">
                                <p class="fts-13 subtitle-text-L fw-4 text-uppercase">Call us:</p>
                                <a href="tel:{{ preg_replace('/\s+/', '', $settings->phone) }}" class="fts-14 fw-5 black-color-L">{{ $settings->phone }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 py-2 my-1">
                        <div class="contact-details-prime wow fadeInUp d-flex gap-3">
                            <div class="left-contact-icon"><iconify-icon icon="clarity:email-solid"></iconify-icon></div>
                            <div class="right-contact-text">
                                <p class="fts-13 subtitle-text-L fw-4 text-uppercase">email us:</p>
                                <a href="mailto:{{ $settings->email }}" class="fts-14 fw-5 primary-color-L text-decoration-underline">{{ $settings->email }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 py-2 my-1">
                        <div class="contact-details-prime wow fadeInUp d-flex gap-3">
                            <div class="left-contact-icon"><iconify-icon icon="mdi:map-marker"></iconify-icon></div>
                            <div class="right-contact-text">
                                <p class="fts-13 subtitle-text-L fw-4 text-uppercase">address:</p>
                                <a href="https://maps.google.com/?q={{ urlencode($settings->address) }}" target="_blank" rel="noopener noreferrer" class="fts-14 fw-5 black-color-L">{{ $settings->address }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

</x-frontend-layout>
