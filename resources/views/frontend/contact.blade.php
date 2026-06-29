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
                <span class="current">Contact</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>We&rsquo;re Here to Help</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">Let&rsquo;s Start a Conversation</h1>
                    <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">Have a question about our psyllium products, pricing or bulk orders? Reach out and our team will get back to you shortly.</p>
                </div>
            </div>

            <div class="row justify-content-center mt-3 mt-lg-4">
                <div class="col-lg-9">
                    <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-3 wow fadeInUp">
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:clock-fast"></iconify-icon>Quick Response</div>
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:earth"></iconify-icon>14+ Countries Served</div>
                        <div class="psyllium-pillar-chip fts-14"><iconify-icon icon="mdi:account-group-outline"></iconify-icon>Dedicated Support Team</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- contact form + locations --}}
    <section class="prime-contact-section py-4 py-lg-5" id="get-in-touch">
        <div class="container py-lg-2">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="contact-left-layout">
                        <h6 class="common-icon-title fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Get in Touch</h6>
                        <h2 class="fts-36 fw-5 title-text-L mt-2 mt-lg-3 wow fadeInUp">Discuss Your Requirements.</h2>
                        <div class="contact-form-prime contact-form-card mt-3 mt-lg-4">
                            @if (session('contact_status'))
                                <div class="alert alert-success fts-14 mb-3" role="alert">
                                    {{ session('contact_status') }}
                                </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row gx-3 gy-3">
                                    <div class="col-6">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-name" class="fts-14 fw-5 title-text-L mb-2 ms-2">Full Name *</label>
                                            <input type="text" name="name" id="contact-name" value="{{ old('name') }}" placeholder="Enter Full Name" class="common-input fts-14" required>
                                            @error('name')
                                                <span class="text-danger fts-12">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-company" class="fts-14 fw-5 title-text-L mb-2 ms-2">Company *</label>
                                            <input type="text" name="company" id="contact-company" value="{{ old('company') }}" placeholder="Enter Company Name" class="common-input fts-14" required>
                                            @error('company')
                                                <span class="text-danger fts-12">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-email" class="fts-14 fw-5 title-text-L mb-2 ms-2">Email Address *</label>
                                            <input type="email" name="email" id="contact-email" value="{{ old('email') }}" placeholder="Enter Email Address" class="common-input fts-14" required>
                                            @error('email')
                                                <span class="text-danger fts-12">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-product" class="fts-14 fw-5 title-text-L mb-2 ms-2">Product Interest *</label>
                                            <select name="product_interest" id="contact-product" class="common-input fts-14" required>
                                                <option value="" {{ old('product_interest') ? '' : 'selected disabled' }}>Enter Product Interest</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->name }}" {{ old('product_interest') === $product->name ? 'selected' : '' }}>{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_interest')
                                                <span class="text-danger fts-12">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-message" class="fts-14 fw-5 title-text-L mb-2 ms-2">Message *</label>
                                            <textarea name="message" id="contact-message" class="common-input fts-14" rows="6" placeholder="Tell us about your requirement...." required>{{ old('message') }}</textarea>
                                            @error('message')
                                                <span class="text-danger fts-12">{{ $message }}</span>
                                            @enderror
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

                <div class="col-lg-7">
                    <div class="contact-right-locations mt-3 mt-lg-0">
                        <h6 class="common-icon-title fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Find Us</h6>
                        <h2 class="fts-36 fw-5 title-text-L mt-2 mt-lg-3 wow fadeInUp">Visit Our Locations</h2>

                        <div class="row mt-3 mt-lg-4">
                            <div class="col-md-6 mt-3">
                                <div class="industry-use-card text-start wow fadeInUp">
                                    <iconify-icon icon="mdi:office-building-outline"></iconify-icon>
                                    <h4 class="fts-16 fw-6 title-text-L mt-2">Head Office</h4>
                                    <p class="fts-14 fw-4 subtitle-text-L mt-1">
                                        <a href="https://maps.google.com/?q={{ urlencode($settings->address ?: 'Survey No. 314/2, S. B. Pura Road, Palanpur, B.K., Gujarat - 385001, INDIA') }}" target="_blank" rel="noopener noreferrer" class="subtitle-text-L">
                                            {{ $settings->address ?: 'Survey No. 314/2, S. B. Pura Road, Palanpur, B.K., Gujarat - 385001, INDIA' }}
                                        </a>
                                    </p>
                                    <div class="rounded-3 overflow-hidden mt-2">
                                        <iframe
                                            src="https://www.google.com/maps?q={{ urlencode($settings->address ?: 'Survey No. 314/2, S. B. Pura Road, Palanpur, B.K., Gujarat - 385001, INDIA') }}&output=embed"
                                            width="100%" height="140" style="border:0; display:block;" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Prime Psyllium &ndash; Head Office map"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="industry-use-card text-start wow fadeInUp">
                                    <iconify-icon icon="mdi:factory"></iconify-icon>
                                    <h4 class="fts-16 fw-6 title-text-L mt-2">Manufacturing Unit</h4>
                                    <p class="fts-14 fw-4 subtitle-text-L mt-1">
                                        <a href="https://maps.google.com/?q={{ urlencode('Patan Road, Khali Char Rasta, Nedra, Siddhpur, Kanesara, Gujarat 384151') }}" target="_blank" rel="noopener noreferrer" class="subtitle-text-L">
                                            Patan Road, Khali Char Rasta, Nedra, Siddhpur, Kanesara, Gujarat 384151
                                        </a>
                                    </p>
                                    <div class="rounded-3 overflow-hidden mt-2">
                                        <iframe
                                            src="https://www.google.com/maps?q={{ urlencode('Patan Road, Khali Char Rasta, Nedra, Siddhpur, Kanesara, Gujarat 384151') }}&output=embed"
                                            width="100%" height="140" style="border:0; display:block;" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Prime Psyllium &ndash; Manufacturing Unit map"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (!empty($settings->socialLinks()))
                            <div class="mt-4">
                                <h6 class="fts-14 fw-5 title-text-L mb-2 wow fadeInUp">Connect With Us</h6>
                                <div class="footer_socialmedia d-flex flex-wrap gap-2 wow fadeInUp">
                                    @foreach ($settings->socialLinks() as $link)
                                        <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="{{ $link['label'] }}" class="{{ $link['class'] }} border-lightcolor"><iconify-icon icon="{{ $link['icon'] }}"></iconify-icon></a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
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
