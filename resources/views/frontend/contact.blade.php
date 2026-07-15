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

    {{-- contact form + info sidebar --}}
    <section class="prime-contact-section py-4 py-lg-5 pb-lg-4" id="get-in-touch">
        <div class="container py-lg-2">

            {{-- Row 1: Headings --}}
            <div class="row mb-3 mb-lg-4">
                <div class="col-lg-7">
                    <h6 class="common-icon-title fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Get in Touch</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-2 mt-lg-3 wow fadeInUp">Tell Us Your Requirements</h2>
                </div>
                {{-- Right heading: desktop only — on mobile the sidebar stacks below the form with its own label --}}
                <div class="col-lg-5 d-none d-lg-block">
                    <h6 class="common-icon-title fts-14 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Reach Us Directly</h6>
                    <h2 class="fts-36 fw-5 title-text-L mt-2 mt-lg-3 wow fadeInUp">Contact Us</h2>
                </div>
            </div>

            {{-- Row 2: Form + sidebar (naturally aligned) --}}
            <div class="row gy-4">

                {{-- Left: Form --}}
                <div class="col-lg-7">
                    <div class="contact-left-layout h-100">
                        <div class="contact-form-prime contact-form-card">

                            @if (session('contact_status'))
                                <div class="contact-success-msg mb-4 wow fadeIn" role="alert">
                                    <iconify-icon icon="mdi:check-circle"></iconify-icon>
                                    <div>
                                        <p class="fts-14 fw-6 title-text-L mb-1">Message Sent Successfully!</p>
                                        <p class="fts-13 subtitle-text-L mb-0">{{ session('contact_status') }}</p>
                                    </div>
                                </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row gx-3 gy-3">

                                    <div class="col-sm-6">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-name" class="fts-14 fw-5 title-text-L mb-2 ms-1">
                                                <iconify-icon icon="mdi:account-outline" class="contact-label-icon"></iconify-icon> Full Name <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="name" id="contact-name" value="{{ old('name') }}" placeholder="John Doe" class="common-input fts-14{{ $errors->has('name') ? ' is-invalid-field' : '' }}" required>
                                            @error('name')<span class="contact-field-error fts-12">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-company" class="fts-14 fw-5 title-text-L mb-2 ms-1">
                                                <iconify-icon icon="mdi:office-building-outline" class="contact-label-icon"></iconify-icon> Company <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="company" id="contact-company" value="{{ old('company') }}" placeholder="Your Company Name" class="common-input fts-14{{ $errors->has('company') ? ' is-invalid-field' : '' }}" required>
                                            @error('company')<span class="contact-field-error fts-12">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-email" class="fts-14 fw-5 title-text-L mb-2 ms-1">
                                                <iconify-icon icon="mdi:email-outline" class="contact-label-icon"></iconify-icon> Email Address <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" name="email" id="contact-email" value="{{ old('email') }}" placeholder="you@company.com" class="common-input fts-14{{ $errors->has('email') ? ' is-invalid-field' : '' }}" required>
                                            @error('email')<span class="contact-field-error fts-12">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-product" class="fts-14 fw-5 title-text-L mb-2 ms-1">
                                                <iconify-icon icon="mdi:leaf" class="contact-label-icon"></iconify-icon> Product Interest <span class="text-danger">*</span>
                                            </label>
                                            <select name="product_interest" id="contact-product" class="common-input fts-14{{ $errors->has('product_interest') ? ' is-invalid-field' : '' }}" required>
                                                <option value="" {{ old('product_interest') ? '' : 'selected disabled' }}>Select a Product</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->name }}" {{ old('product_interest') === $product->name ? 'selected' : '' }}>{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_interest')<span class="contact-field-error fts-12">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="common-contact-field wow fadeInUp">
                                            <label for="contact-message" class="fts-14 fw-5 title-text-L mb-2 ms-1">
                                                <iconify-icon icon="mdi:message-text-outline" class="contact-label-icon"></iconify-icon> Your Message <span class="text-danger">*</span>
                                            </label>
                                            <textarea name="message" id="contact-message" class="common-input fts-14{{ $errors->has('message') ? ' is-invalid-field' : '' }}" rows="5" placeholder="Describe your requirements, quantity needed, and any specific questions...">{{ old('message') }}</textarea>
                                            @error('message')<span class="contact-field-error fts-12">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="cf-turnstile wow fadeInUp" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                                        @error('cf-turnstile-response')
                                            <span class="contact-field-error fts-12">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 wow fadeInUp">
                                            <p class="fts-12 subtitle-text-L mb-0 d-flex align-items-center gap-1">
                                                <iconify-icon icon="mdi:lock-outline"></iconify-icon> Your information is secure and never shared.
                                            </p>
                                            <button type="submit" class="common-bg-btn contact-submit-btn fts-14">
                                                Send Message <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="">
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Right: Info Sidebar --}}
                <div class="col-lg-5">
                    <div class="contact-info-sidebar mt-2 mt-lg-0">

                        {{-- Mobile-only heading --}}
                        <h6 class="common-icon-title fts-14 d-lg-none mb-3 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Reach Us Directly</h6>

                        {{-- Quick contact cards --}}
                        <div class="contact-quick-cards d-flex flex-column gap-3">
                            @if($settings->phone)
                                <a href="tel:{{ preg_replace('/\s+/', '', $settings->phone) }}" class="contact-quick-card wow fadeInUp">
                                    <div class="cqc-icon"><iconify-icon icon="subway:call"></iconify-icon></div>
                                    <div class="flex-grow-1">
                                        <p class="fts-12 subtitle-text-L fw-4 text-uppercase mb-1">Call Us</p>
                                        <p class="fts-14 fw-6 title-text-L mb-0">{{ $settings->phone }}</p>
                                    </div>
                                    <iconify-icon icon="mdi:chevron-right" class="cqc-arrow"></iconify-icon>
                                </a>
                            @endif

                            @if($settings->whatsapp_url)
                                <a href="{{ $settings->whatsapp_url }}" target="_blank" rel="noopener noreferrer" class="contact-quick-card contact-quick-card--whatsapp wow fadeInUp">
                                    <div class="cqc-icon cqc-icon--whatsapp"><iconify-icon icon="mingcute:whatsapp-fill"></iconify-icon></div>
                                    <div class="flex-grow-1">
                                        <p class="fts-12 fw-4 text-uppercase mb-1" style="color:#25d366;">WhatsApp</p>
                                        <p class="fts-14 fw-6 title-text-L mb-0">Chat With Us</p>
                                    </div>
                                    <iconify-icon icon="mdi:chevron-right" class="cqc-arrow"></iconify-icon>
                                </a>
                            @endif

                            @if($settings->email)
                                <a href="mailto:{{ $settings->email }}" class="contact-quick-card wow fadeInUp">
                                    <div class="cqc-icon"><iconify-icon icon="clarity:email-solid"></iconify-icon></div>
                                    <div class="flex-grow-1">
                                        <p class="fts-12 subtitle-text-L fw-4 text-uppercase mb-1">Email Us</p>
                                        <p class="fts-14 fw-6 title-text-L mb-0">{{ $settings->email }}</p>
                                    </div>
                                    <iconify-icon icon="mdi:chevron-right" class="cqc-arrow"></iconify-icon>
                                </a>
                            @endif

                            @if($settings->address)
                                <a href="https://maps.google.com/?q={{ urlencode($settings->address) }}" target="_blank" rel="noopener noreferrer" class="contact-quick-card wow fadeInUp">
                                    <div class="cqc-icon"><iconify-icon icon="mdi:map-marker"></iconify-icon></div>
                                    <div class="flex-grow-1">
                                        <p class="fts-12 subtitle-text-L fw-4 text-uppercase mb-1">Head Office</p>
                                        <p class="fts-13 fw-5 title-text-L mb-0">{{ $settings->address }}</p>
                                    </div>
                                    <iconify-icon icon="mdi:chevron-right" class="cqc-arrow"></iconify-icon>
                                </a>
                            @endif
                        </div>

                        {{-- Social links --}}
                        @if (!empty($settings->socialLinks()))
                            <div class="mt-4 wow fadeInUp">
                                <h6 class="fts-13 fw-5 subtitle-text-L text-uppercase mb-2 ms-1">Follow Us</h6>
                                <div class="footer_socialmedia d-flex flex-wrap gap-2">
                                    @foreach ($settings->socialLinks() as $link)
                                        <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="{{ $link['label'] }}" aria-label="{{ $link['label'] }}" class="{{ $link['class'] }} border-lightcolor"><iconify-icon icon="{{ $link['icon'] }}"></iconify-icon></a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Locations section --}}
    <section class="contact-locations-section py-4 py-lg-4">
        <div class="container">

            <div class="text-center mb-3 mb-lg-4">
                <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Our Locations</h6>
                <h2 class="fts-36 fw-5 title-text-L mt-2 mt-lg-3 wow fadeIn">Visit Us in Person</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="contact-location-card wow fadeInUp">
                        <div class="clc-header">
                            <div class="clc-icon"><iconify-icon icon="mdi:office-building-outline"></iconify-icon></div>
                            <div>
                                <h4 class="fts-16 fw-6 title-text-L mb-1">Head Office</h4>
                                <p class="fts-12 subtitle-text-L mb-0">Administrative &amp; Business</p>
                            </div>
                        </div>
                        <p class="fts-13 fw-4 subtitle-text-L mt-3 mb-3">
                            <a href="https://maps.google.com/?q={{ urlencode($settings->address ?: 'Survey No. 314/2, S. B. Pura Road, Palanpur, B.K., Gujarat - 385001, INDIA') }}" target="_blank" rel="noopener noreferrer" class="subtitle-text-L">
                                {{ $settings->address ?: 'Survey No. 314/2, S. B. Pura Road, Palanpur, B.K., Gujarat - 385001, INDIA' }}
                            </a>
                        </p>
                        <div class="clc-map">
                            <iframe
                                src="https://www.google.com/maps?q={{ urlencode($settings->address ?: 'Survey No. 314/2, S. B. Pura Road, Palanpur, B.K., Gujarat - 385001, INDIA') }}&output=embed"
                                width="100%" height="210" style="border:0; display:block;" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Prime Psyllium &ndash; Head Office map"></iframe>
                        </div>
                        <a href="https://maps.google.com/?q={{ urlencode($settings->address ?: 'Survey No. 314/2, S. B. Pura Road, Palanpur, B.K., Gujarat - 385001, INDIA') }}" target="_blank" rel="noopener noreferrer" class="clc-directions-btn mt-3 fts-13">
                            <iconify-icon icon="mdi:directions"></iconify-icon> Get Directions
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-location-card wow fadeInUp">
                        <div class="clc-header">
                            <div class="clc-icon"><iconify-icon icon="mdi:factory"></iconify-icon></div>
                            <div>
                                <h4 class="fts-16 fw-6 title-text-L mb-1">Manufacturing Unit</h4>
                                <p class="fts-12 subtitle-text-L mb-0">Production &amp; Processing</p>
                            </div>
                        </div>
                        <p class="fts-13 fw-4 subtitle-text-L mt-3 mb-3">
                            <a href="https://maps.google.com/?q={{ urlencode('Patan Road, Khali Char Rasta, Nedra, Siddhpur, Kanesara, Gujarat 384151') }}" target="_blank" rel="noopener noreferrer" class="subtitle-text-L">
                                Patan Road, Khali Char Rasta, Nedra, Siddhpur, Kanesara, Gujarat 384151
                            </a>
                        </p>
                        <div class="clc-map">
                            <iframe
                                src="https://www.google.com/maps?q={{ urlencode('Patan Road, Khali Char Rasta, Nedra, Siddhpur, Kanesara, Gujarat 384151') }}&output=embed"
                                width="100%" height="210" style="border:0; display:block;" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Prime Psyllium &ndash; Manufacturing Unit map"></iframe>
                        </div>
                        <a href="https://maps.google.com/?q={{ urlencode('Patan Road, Khali Char Rasta, Nedra, Siddhpur, Kanesara, Gujarat 384151') }}" target="_blank" rel="noopener noreferrer" class="clc-directions-btn mt-3 fts-13">
                            <iconify-icon icon="mdi:directions"></iconify-icon> Get Directions
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- contact info strip --}}
    <section class="contact-info-strip">
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

</x-frontend-layout>
