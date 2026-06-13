<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <link rel="icon" type="image/png" href="{{ asset('assets/frontend/icons/favicon.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">

        @vite(['resources/frontend/css/app.css', 'resources/frontend/js/app.js'])
    </head>
    <body class="antialiased">
        <div
            x-data="siteShell()"
            x-init="init()"
            @scroll.window="onScroll()"
            class="min-h-screen bg-surface"
        >
            {{-- ============================================================
                 HEADER
                 ============================================================ --}}
            <header
                class="site-header fixed inset-x-0 top-0 z-50 transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)]"
                :class="scrolled ? 'py-2' : 'py-5 sm:py-6'"
            >
                {{-- Background blur layer --}}
                <div
                    class="pointer-events-none absolute inset-0 -z-10 transition-opacity duration-700"
                    :class="scrolled
                        ? 'opacity-100 bg-[linear-gradient(to_bottom,var(--color-surface-elevated)_0%,rgba(0,0,0,0)_100%)]'
                        : 'opacity-100 bg-[linear-gradient(to_bottom,var(--color-surface)_60%,rgba(0,0,0,0)_100%)]'"
                ></div>

                {{-- Nav container --}}
                <div
                    class="mx-auto grid w-full max-w-7xl items-center gap-3 px-4 transition-[transform,opacity,background-color,border-color,box-shadow] duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] sm:px-6 lg:px-8"
                    :class="scrolled
                        ? 'grid-cols-[auto_1fr_auto] rounded-[1.75rem] border border-border/70 bg-surface-elevated/90 px-3 py-2 shadow-[0_18px_55px_rgba(0,0,0,0.09)] backdrop-blur-xl sm:px-4'
                        : 'grid-cols-[auto_1fr_auto] rounded-[2rem] border border-transparent bg-transparent px-0 py-0'"
                >
                    {{-- NOT scrolled state --}}
                    <template x-if="!scrolled">
                        <div class="contents">
                            {{-- Logo --}}
                            <div class="flex items-center justify-self-start">
                                <a href="{{ url('/') }}" class="site-logo inline-flex items-center justify-center will-change-transform transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)]">
                                    <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="{{ config('app.name') }}" class="h-11 w-auto sm:h-12 lg:h-14">
                                </a>
                            </div>

                            {{-- Desktop nav --}}
                            <div class="flex items-center justify-self-center">
                                <nav class="hidden items-center lg:flex lg:gap-0.5">
                                    <template x-for="item in menuItems" :key="item.label">
                                        <a
                                            :href="item.href"
                                            class="rounded-full px-4 py-2 text-[13px] font-semibold tracking-wide text-text-muted outline-none transition-colors duration-200 hover:bg-surface-muted hover:text-text focus-visible:bg-surface-muted focus-visible:text-text"
                                            x-text="item.label"
                                        ></a>
                                    </template>
                                </nav>
                            </div>

                            {{-- Right actions --}}
                            <div class="flex items-center justify-self-end gap-2 sm:gap-3">
                                {{-- Theme toggle --}}
                                <button
                                    type="button"
                                    @click="toggleTheme()"
                                    :aria-label="theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode'"
                                    class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer items-center rounded-full border border-border bg-surface-muted shadow-inner outline-none transition-colors duration-300 focus-visible:ring-2 focus-visible:ring-primary/40"
                                >
                                    <span
                                        class="inline-flex h-4 w-4 items-center justify-center rounded-full bg-surface-elevated shadow transition-all duration-300"
                                        :class="theme === 'dark' ? 'translate-x-[1.375rem]' : 'translate-x-0.5'"
                                    >
                                        <svg x-show="theme === 'dark'" width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2"/></svg>
                                        <svg x-show="theme === 'light'" width="9" height="9" viewBox="0 0 24 24" fill="#006a4e" stroke="none"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                                    </span>
                                </button>
                                <a
                                    href="#contact"
                                    class="hidden rounded-full bg-primary px-5 py-2.5 text-[13px] font-semibold text-[#faf8ec] shadow-[0_4px_16px_rgba(0,106,78,0.25)] transition-all duration-300 hover:bg-primary-hover hover:shadow-[0_8px_24px_rgba(0,106,78,0.35)] lg:inline-flex items-center gap-1.5"
                                >
                                    Get in Touch
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                                </a>
                                <button
                                    type="button"
                                    @click="menuOpen = !menuOpen"
                                    class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-border bg-surface-elevated/90 text-text shadow-[0_8px_24px_rgba(0,0,0,0.07)] backdrop-blur outline-none transition-colors duration-200 hover:bg-surface-muted lg:hidden"
                                    aria-label="Toggle menu"
                                >
                                    <span class="text-lg leading-none" x-text="menuOpen ? '×' : '☰'"></span>
                                </button>
                            </div>
                        </div>
                    </template>

                    {{-- SCROLLED state --}}
                    <template x-if="scrolled">
                        <div class="contents">
                            {{-- Logo (smaller) --}}
                            <div class="flex items-center justify-self-start">
                                <a href="{{ url('/') }}" class="site-logo inline-flex shrink-0 items-center origin-left will-change-transform transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] scale-[0.8]">
                                    <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="{{ config('app.name') }}" class="h-10 w-auto sm:h-12">
                                </a>
                            </div>

                            {{-- Desktop nav (center) --}}
                            <div class="flex items-center justify-self-center">
                                <nav class="hidden items-center lg:flex lg:gap-0.5">
                                    <template x-for="item in menuItems" :key="item.label">
                                        <a
                                            :href="item.href"
                                            class="rounded-full px-4 py-2 text-[13px] font-semibold tracking-wide text-text-muted outline-none transition-colors duration-200 hover:bg-surface-muted hover:text-text focus-visible:bg-surface-muted focus-visible:text-text"
                                            x-text="item.label"
                                        ></a>
                                    </template>
                                </nav>
                            </div>

                            {{-- Right actions --}}
                            <div class="flex items-center justify-self-end gap-2 sm:gap-3">
                                {{-- Theme toggle --}}
                                <button
                                    type="button"
                                    @click="toggleTheme()"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-border bg-surface-elevated/90 text-text shadow-sm backdrop-blur outline-none transition-colors duration-200 hover:bg-surface-muted"
                                    :aria-label="theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode'"
                                >
                                    <svg x-show="theme === 'dark'" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>
                                    <svg x-show="theme === 'light'" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                                </button>
                                <a
                                    href="#contact"
                                    class="hidden rounded-full bg-primary px-5 py-2.5 text-[13px] font-semibold text-[#faf8ec] shadow-[0_4px_16px_rgba(0,106,78,0.25)] transition-all duration-300 hover:bg-primary-hover lg:inline-flex items-center gap-1.5"
                                >
                                    Get in Touch
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                                </a>
                                <button
                                    type="button"
                                    @click="menuOpen = !menuOpen"
                                    class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-border bg-surface-elevated/90 text-text shadow-[0_8px_24px_rgba(0,0,0,0.07)] backdrop-blur outline-none transition-colors duration-200 hover:bg-surface-muted lg:hidden"
                                    aria-label="Toggle menu"
                                >
                                    <span class="text-lg leading-none" x-text="menuOpen ? '×' : '☰'"></span>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Mobile dropdown menu --}}
                <div class="lg:hidden">
                    <div
                        x-show="menuOpen"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-3"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-3"
                        class="mx-4 mt-3 rounded-[1.5rem] border border-border bg-surface-elevated/95 p-3 shadow-[0_24px_60px_rgba(0,0,0,0.12)] backdrop-blur sm:mx-6"
                        style="display: none;"
                    >
                        <nav class="grid gap-1">
                            <template x-for="item in menuItems" :key="item.label">
                                <a
                                    :href="item.href"
                                    @click="menuOpen = false"
                                    class="rounded-2xl px-4 py-3 text-sm font-semibold text-text-muted outline-none transition-colors duration-200 hover:bg-surface-muted hover:text-text"
                                    x-text="item.label"
                                ></a>
                            </template>
                            <a
                                href="#contact"
                                @click="menuOpen = false"
                                class="mt-1 rounded-2xl bg-primary px-4 py-3 text-sm font-semibold text-[#faf8ec] text-center"
                            >Get in Touch →</a>
                        </nav>
                    </div>
                </div>
            </header>

            {{-- Main content slot --}}
            <main>
                {{ $slot }}
            </main>

            {{-- ============================================================
                 FOOTER
                 ============================================================ --}}
            <footer class="bg-[#006a4e] text-[#faf8ec]">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                    {{-- Top footer --}}
                    <div class="grid gap-10 py-16 lg:grid-cols-[1.5fr_1fr_1fr_1fr_1fr] lg:py-20">

                        {{-- Brand column --}}
                        <div class="lg:pr-6">
                            <a href="{{ url('/') }}" class="inline-flex items-center rounded-xl bg-[#faf8ec] px-4 py-2 transition-opacity hover:opacity-85">
                                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="{{ config('app.name') }}" class="h-10 w-auto">
                            </a>
                            <p class="mt-4 text-sm leading-6 text-[#faf8ec]/65">
                                Prime Psyllium is one of India's leading Psyllium suppliers and manufacturers since 1995, offering high-quality Psyllium Husk, Seeds &amp; Powder to global markets.
                            </p>
                            {{-- Contact info --}}
                            <div class="mt-5 space-y-2 text-[12px] text-[#faf8ec]/60">
                                <p class="flex items-start gap-2"><svg class="mt-0.5 shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>Survey No. 314/2, S. B. Pura Road, Palanpur, B.K., Gujarat-385001, India</p>
                                <p class="flex items-center gap-2"><svg class="shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><a href="tel:+919157573300" class="transition hover:text-[#faf8ec]">+91 91575 73300</a></p>
                                <p class="flex items-center gap-2"><svg class="shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="2,4 12,13 22,4"/></svg><a href="mailto:info@primepsyllium.com" class="transition hover:text-[#faf8ec]">info@primepsyllium.com</a></p>
                            </div>
                            {{-- Social icons --}}
                            <div class="mt-5 flex items-center gap-2.5">
                                <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#faf8ec]/10 text-[#faf8ec]/70 transition hover:bg-[#faf8ec]/20 hover:text-[#faf8ec]" aria-label="LinkedIn">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                                </a>
                                <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#faf8ec]/10 text-[#faf8ec]/70 transition hover:bg-[#faf8ec]/20 hover:text-[#faf8ec]" aria-label="Instagram">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                                </a>
                                <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#faf8ec]/10 text-[#faf8ec]/70 transition hover:bg-[#faf8ec]/20 hover:text-[#faf8ec]" aria-label="Facebook">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                                </a>
                                <a href="#" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#faf8ec]/10 text-[#faf8ec]/70 transition hover:bg-[#faf8ec]/20 hover:text-[#faf8ec]" aria-label="YouTube">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58a2.78 2.78 0 0 0 1.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
                                </a>
                            </div>
                        </div>

                        {{-- Company --}}
                        <div>
                            <h3 class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#faf8ec]/50">Company</h3>
                            <ul class="mt-5 space-y-3 text-sm">
                                <li><a href="#about" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">About Us</a></li>
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Accreditation</a></li>
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Events</a></li>
                                <li><a href="#contact" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Contact Us</a></li>
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Blogs</a></li>
                            </ul>
                        </div>

                        {{-- Products --}}
                        <div>
                            <h3 class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#faf8ec]/50">Psyllium Products</h3>
                            <ul class="mt-5 space-y-3 text-sm">
                                <li><a href="#products" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Psyllium Seeds</a></li>
                                <li><a href="#products" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Psyllium Husk</a></li>
                                <li><a href="#products" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Psyllium Husk Powder</a></li>
                                <li><a href="#products" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Psyllium Seed Powder</a></li>
                                <li><a href="#products" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Psyllium KhaKha Powder</a></li>
                            </ul>
                        </div>

                        {{-- Countries --}}
                        <div>
                            <h3 class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#faf8ec]/50">Countries</h3>
                            <ul class="mt-5 space-y-3 text-sm">
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">USA</a></li>
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Canada</a></li>
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Brazil</a></li>
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Russia</a></li>
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">South Korea</a></li>
                            </ul>
                        </div>

                        {{-- Support --}}
                        <div>
                            <h3 class="text-[11px] font-bold uppercase tracking-[0.35em] text-[#faf8ec]/50">Support</h3>
                            <ul class="mt-5 space-y-3 text-sm">
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">FAQs</a></li>
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Shipping &amp; Delivery</a></li>
                                <li><a href="#" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Privacy Policy</a></li>
                                <li><a href="#contact" class="text-[#faf8ec]/65 transition hover:text-[#faf8ec]">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    {{-- Bottom bar --}}
                    <div class="flex flex-col gap-4 border-t border-[#faf8ec]/10 py-6 text-xs text-[#faf8ec]/45 sm:flex-row sm:items-center sm:justify-between">
                        <p>© 2024 Prime Psyllium. All Rights Reserved.</p>
                        <div class="flex flex-wrap items-center gap-4">
                            <span>FSSC 22000</span>
                            <span>FDA Approved</span>
                            <span>GMP Certified</span>
                            <span>HALAL &amp; Kosher</span>
                            <a href="#hero" class="transition hover:text-[#faf8ec]/70">Back to Top ↑</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
