<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>{{ config('site.seo.title') }}</title>
        <meta name="description" content="{{ config('site.seo.description') }}">
        <meta name="robots" content="{{ config('site.seo.robots') }}">
        <link rel="canonical" href="{{ config('site.seo.canonical') }}">
        <meta property="og:locale" content="{{ config('site.seo.og_locale') }}">
        <meta property="og:type" content="{{ config('site.seo.og_type') }}">
        <meta property="og:title" content="{{ config('site.seo.title') }}">
        <meta property="og:description" content="{{ config('site.seo.description') }}">
        <meta property="og:url" content="{{ config('site.seo.canonical') }}">
        <meta property="og:site_name" content="{{ config('site.seo.og_site_name') }}">
        <meta name="twitter:card" content="{{ config('site.seo.twitter_card') }}">
        <meta name="google-site-verification" content="{{ config('site.seo.site_verification') }}">
        <link rel="icon" type="image/png" href="{{ $settings->favicon_url ?? asset('assets/frontend/icons/favicon.png') }}">

        {{-- Prime Psyllium frontend design --}}
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}?v={{ filemtime(public_path('assets/frontend/css/main.css')) }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
        @stack('styles')

        {{-- Admin-configurable brand theme colors override the defaults baked into common.css --}}
        <style>
            :root {
                @foreach ($settings->themeVariables() as $property => $color)
                    {{ $property }}: {{ $color }};
                @endforeach
            }
        </style>
    </head>

    <body>
        <div class="nav-header-section">
            {{-- desktop navbar section start --}}
            <nav class="prime-desknav-main py-2">
                <div class="container">
                    <div class="inner desktop-nav d-flex justify-content-between gap-2 align-items-center py-1 d-none d-lg-flex">
                        <a href="{{ url('/') }}">
                            <img src="{{ $settings->logo_url ?? asset('assets/frontend/images/brand-logo.png') }}" alt="{{ config('app.name') }}" class="desktop-nav-logo">
                        </a>
                        <div class="d-flex align-items-center gap-2 ms-auto">
                            <ul class="desktop-navbar-list d-lg-flex d-none align-items-center gap-1 mb-0">
                                <li><a href="{{ route('products.index') }}" class="desktop-nav-items">Products</a></li>
                                <li><a href="{{ route('ingredients.index') }}" class="desktop-nav-items">Ingredients</a></li>
                                <li><a href="{{ route('accreditation.index') }}" class="desktop-nav-items">Accreditation</a></li>
                                <li><a href="{{ route('about.index') }}" class="desktop-nav-items">About Us</a></li>
                                <li><a href="{{ route('blog.index') }}" class="desktop-nav-items {{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
                                <li><a href="{{ route('contact.index') }}" class="desktop-nav-items">Contact Us</a></li>
                            </ul>
                            <a href="#get-in-touch" class="btn-desknav-talk fts-14 d-lg-flex d-none">Let&rsquo;s Talk <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Let&rsquo;s Talk"></a>
                        </div>
                    </div>
                    <div class="mobile-header d-flex d-lg-none align-items-center justify-content-between py-2">
                        <div class="mobile-nav-spacer"></div>
                        <a href="{{ url('/') }}" class="mobile-nav-logo text-center">
                            <img src="{{ $settings->logo_url ?? asset('assets/frontend/images/brand-logo.png') }}" alt="{{ config('app.name') }}" class="desktop-nav-logo">
                        </a>
                        <button class="btn-desknav-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#primeNavOffcanvas" aria-controls="#primeNavOffcanvas"><iconify-icon icon="tabler:menu"></iconify-icon></button>
                    </div>
                </div>

                {{-- side navbar --}}
                <div class="prime-nav-sidebar">
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="primeNavOffcanvas" aria-labelledby="primeNavOffcanvasLabel">
                        <div class="prime-nav-heading d-flex align-items-center justify-content-between gap-2 px-3 pt-3 pb-2 mt-1">
                            <a href="{{ url('/') }}">
                                <img src="{{ $settings->logo_url ?? asset('assets/frontend/images/brand-logo.png') }}" alt="{{ config('app.name') }}" class="desktop-nav-logo offcanvas-logo">
                            </a>
                            <button type="button" class="btn-close fts-13" data-bs-dismiss="offcanvas" aria-label="Close"><iconify-icon icon="charm:cross" class="fts-26 subtitle-text-L"></iconify-icon></button>
                        </div>
                        <div class="prime-nav-body px-3">
                            <ul class="desktop-navbar-list mt-2">
                                <li><a href="{{ route('products.index') }}" class="desktop-nav-items mx-0 my-1">Products</a></li>
                                <li><a href="#quality" class="desktop-nav-items mx-0 my-1">Ingredients</a></li>
                                <li><a href="{{ route('accreditation.index') }}" class="desktop-nav-items mx-0 my-1">Accreditation</a></li>
                                <li><a href="{{ route('about.index') }}" class="desktop-nav-items mx-0 my-1">About Us</a></li>
                                <li><a href="{{ route('blog.index') }}" class="desktop-nav-items mx-0 my-1">Blog</a></li>
                                <li><a href="{{ route('contact.index') }}" class="desktop-nav-items mx-0 my-1">Contact Us</a></li>
                            </ul>
                            <a href="#get-in-touch" class="btn-desknav-talk fts-14 d-flex justify-content-center mt-2 w-100">Let&rsquo;s Talk <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Let&rsquo;s Talk"></a>
                        </div>
                    </div>
                </div>
            </nav>

            {{ $slot }}
        </div>

        {{-- footer section start --}}
        <footer class="yummatic-footer-main pt-3 pt-lg-5">
            <div class="container">
                <div class="inners-common-footer">
                    <div class="row">
                        <div class="col-xl-5 col-lg-3 col-md-6 col-6">
                            <div class="single-motorfooter-links mb-3 mb-lg-0">
                                <div class="footer-left-logo py-1 text-center">
                                    <a href="{{ url('/') }}"><img src="{{ $settings->logo_url ?? asset('assets/frontend/images/brand-logo.png') }}" alt="{{ config('app.name') }}" class="footer-logo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                            <div class="single-motorfooter-links mb-3 mb-lg-0">
                                <h4 class="fts-18 fw-7 title-text-L">Company</h4>
                                <ul class="ui-footer-links mt-lg-2 mt-1">
                                    <li><a href="{{ route('about.index') }}" class="fts-14">About Us</a></li>
                                    <li><a href="{{ route('accreditation.index') }}" class="fts-14">Accreditation</a></li>
                                    <li><a href="{{ route('events.index') }}" class="fts-14">Events</a></li>
                                    <li><a href="{{ route('contact.index') }}" class="fts-14">Contact Us</a></li>
                                    <li><a href="{{ route('blog.index') }}" class="fts-14">Blogs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="single-motorfooter-links mb-3 mb-lg-0">
                                <h4 class="fts-18 fw-7 title-text-L">Psyllium Products</h4>
                                <ul class="ui-footer-links mt-lg-2 mt-1">
                                    @foreach ($footerProducts as $footerProduct)
                                        <li><a href="{{ route('products.show', $footerProduct) }}" class="fts-14">{{ $footerProduct->name }}</a></li>
                                    @endforeach
                                    @if ($footerProductsRemaining > 0)
                                        <li><a href="{{ route('products.index') }}" class="fts-14">+{{ $footerProductsRemaining }} more</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-6">
                            <div class="single-motorfooter-links mb-3 mb-lg-0">
                                <h4 class="fts-18 fw-7 title-text-L pe-lg-4">Countries</h4>
                                <ul class="ui-footer-links mt-lg-2 mt-1">
                                    @foreach ($footerCountries as $footerCountry)
                                        <li><a href="#our-global-presence" class="fts-14">{{ $footerCountry->name }}</a></li>
                                    @endforeach
                                    @if ($footerCountriesRemaining > 0)
                                        <li><a href="#our-global-presence" class="fts-14">+{{ $footerCountriesRemaining }} countries</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-3 col-md-6 col-6"></div>
                        <div class="col-xl-7 col-lg-9 col-md-12 mt-3 mt-lg-4">
                            <div class="row">
                                <div class="col-md-4 order-5 order-lg-0">
                                    <div class="copyright-text py-1">
                                        <p class="fts-14 fw-3 subtitle-text-L text-center text-md-start">&copy; {{ now()->year }} <span class="secondary-color-L fw-5">{{ config('app.name') }}.</span> All Rights Reserved.</p>
                                    </div>
                                </div>
                                <div class="col-lg-8 order-0 order-lg-5">
                                    <div class="socilas-iconsviewsdesign py-1 d-flex flex-column align-items-center align-items-lg-end">
                                        <div class="footer_socialmedia d-flex justify-content-center justify-content-lg-end flex-wrap gap-2">
                                            @foreach ($settings->socialLinks() as $link)
                                                <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="{{ $link['label'] }}" class="{{ $link['class'] }} border-lightcolor"><iconify-icon icon="{{ $link['icon'] }}"></iconify-icon></a>
                                            @endforeach
                                        </div>

                                        <p class="footer-credit-text fts-13 fw-4 subtitle-text-L text-center text-lg-end mt-2 mb-0">Built by <a href="https://wisencode.com" target="_blank" rel="noopener noreferrer" class="secondary-color-L fw-5 text-decoration-none">Wisencode Infotech</a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/frontend/images/Footer-bg.png') }}" alt="footer background" class="w-100">
        </footer>

        {{-- all js file include --}}
        <script src="{{ asset('assets/frontend/js/jQuery.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/bootstrap.bundle.js') }}"></script>
        <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>
        <script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/wow.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/main.js') }}?v={{ filemtime(public_path('assets/frontend/js/main.js')) }}"></script>
    </body>
</html>
