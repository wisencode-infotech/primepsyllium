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
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/frontend/css/app.css', 'resources/frontend/js/app.js'])
    </head>
    <body class="antialiased">
        <div
            x-data="siteShell()"
            x-init="init()"
            @scroll.window="onScroll()"
            class="min-h-screen bg-[var(--color-surface)]"
        >
            <header
                class="site-header fixed inset-x-0 top-0 z-50 transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)]"
                :class="scrolled ? 'py-3' : 'py-6 sm:py-8'"
            >
                <div
                    class="pointer-events-none absolute inset-0 -z-10 transition-opacity duration-700"
                    :class="scrolled
                        ? 'opacity-100 bg-[linear-gradient(to_bottom,var(--color-surface-elevated)_0%,rgba(0,0,0,0)_100%)]'
                        : 'opacity-100 bg-[linear-gradient(to_bottom,var(--color-surface)_0%,rgba(0,0,0,0)_100%)]'"
                ></div>

                <div
                    class="mx-auto grid w-full max-w-7xl grid-cols-[auto_1fr_auto] items-center gap-3 px-4 transition-[transform,opacity,background-color,border-color,box-shadow] duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] sm:px-6 lg:px-8"
                    :class="scrolled
                        ? 'rounded-[1.75rem] border border-border/70 bg-surface-elevated/85 px-3 py-2 shadow-[0_18px_55px_rgba(0,0,0,0.10)] backdrop-blur-xl sm:px-4'
                        : 'rounded-[2rem] border border-transparent bg-transparent px-3 py-2 sm:px-4'"
                >
                    <template x-if="!scrolled">
                        <div class="contents">
                            <div class="flex items-center justify-self-start">
                                <button
                                    type="button"
                                    @click="toggleTheme()"
                                    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-border bg-surface-elevated/90 text-sm text-text shadow-[0_10px_30px_rgba(0,0,0,0.08)] backdrop-blur outline-none transition-all duration-300 hover:bg-surface-muted hover:text-text focus-visible:bg-surface-muted focus-visible:text-text focus-visible:ring-2 focus-visible:ring-[var(--color-primary-ring)] focus-visible:ring-offset-2 focus-visible:ring-offset-surface"
                                    :aria-label="theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode'"
                                >
                                    <span x-text="theme === 'dark' ? '☀' : '☾'"></span>
                                </button>
                            </div>

                            <div class="flex items-center justify-self-start">
                                <a
                                    href="{{ url('/') }}"
                                    class="site-logo group relative z-50 inline-flex items-center justify-center justify-self-start will-change-transform transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)]"
                                    :class="'translate-x-0 scale-100'"
                                >
                                    <img src="{{ asset('assets/frontend/images/logo.svg') }}" alt="{{ config('app.name') }}" class="h-12 w-auto sm:h-14 lg:h-16">
                                </a>
                            </div>

                            <div class="flex items-center justify-self-end gap-2 sm:gap-3">
                                <nav class="hidden items-center lg:flex lg:items-center lg:gap-1">
                                    <template x-for="item in menuItems" :key="item.label">
                                        <a
                                            :href="item.href"
                                            class="group rounded-full px-4 py-2 text-sm font-medium tracking-wide text-text-muted outline-none transition-colors duration-300 hover:bg-surface-muted hover:text-text focus-visible:bg-surface-muted focus-visible:text-text focus-visible:ring-2 focus-visible:ring-[var(--color-primary-ring)] focus-visible:ring-offset-2 focus-visible:ring-offset-surface"
                                            x-text="item.label"
                                        ></a>
                                    </template>
                                </nav>

                                <button
                                    type="button"
                                    @click="menuOpen = !menuOpen"
                                    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-border bg-surface-elevated/90 text-text shadow-[0_10px_30px_rgba(0,0,0,0.08)] backdrop-blur outline-none transition-colors duration-300 hover:bg-surface-muted hover:text-text focus-visible:bg-surface-muted focus-visible:text-text focus-visible:ring-2 focus-visible:ring-[var(--color-primary-ring)] focus-visible:ring-offset-2 focus-visible:ring-offset-surface lg:hidden"
                                    aria-label="Toggle menu"
                                >
                                    <span class="text-xl leading-none" x-text="menuOpen ? '×' : '☰'"></span>
                                </button>
                            </div>
                        </div>
                    </template>

                    <template x-if="scrolled">
                        <div class="contents">
                            <div class="flex min-w-0 items-center justify-self-start">
                                <a
                                    href="{{ url('/') }}"
                                    class="site-logo group relative z-50 inline-flex shrink-0 items-center justify-center origin-left will-change-transform transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)]"
                                    :class="'translate-x-0 scale-[0.72] opacity-95'"
                                >
                                    <img src="{{ asset('assets/frontend/images/logo.svg') }}" alt="{{ config('app.name') }}" class="h-10 w-auto sm:h-12 lg:h-14">
                                </a>
                            </div>

                            <div class="flex min-w-0 items-center justify-self-center">
                                <nav class="hidden items-center lg:flex lg:items-center lg:gap-1">
                                    <template x-for="item in menuItems" :key="item.label">
                                        <a
                                            :href="item.href"
                                            class="group rounded-full px-4 py-2 text-sm font-medium tracking-wide text-text-muted outline-none transition-colors duration-300 hover:bg-surface-muted hover:text-text focus-visible:bg-surface-muted focus-visible:text-text focus-visible:ring-2 focus-visible:ring-[var(--color-primary-ring)] focus-visible:ring-offset-2 focus-visible:ring-offset-surface"
                                            x-text="item.label"
                                        ></a>
                                    </template>
                                </nav>
                            </div>

                            <div class="flex items-center justify-self-end gap-2 sm:gap-3">
                                <button
                                    type="button"
                                    @click="toggleTheme()"
                                    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-border bg-surface-elevated/90 text-sm text-text shadow-[0_10px_30px_rgba(0,0,0,0.08)] backdrop-blur outline-none transition-all duration-300 hover:bg-surface-muted hover:text-text focus-visible:bg-surface-muted focus-visible:text-text focus-visible:ring-2 focus-visible:ring-[var(--color-primary-ring)] focus-visible:ring-offset-2 focus-visible:ring-offset-surface"
                                    :aria-label="theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode'"
                                >
                                    <span x-text="theme === 'dark' ? '☀' : '☾'"></span>
                                </button>

                                <button
                                    type="button"
                                    @click="menuOpen = !menuOpen"
                                    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-border bg-surface-elevated/90 text-text shadow-[0_10px_30px_rgba(0,0,0,0.08)] backdrop-blur outline-none transition-colors duration-300 hover:bg-surface-muted hover:text-text focus-visible:bg-surface-muted focus-visible:text-text focus-visible:ring-2 focus-visible:ring-[var(--color-primary-ring)] focus-visible:ring-offset-2 focus-visible:ring-offset-surface lg:hidden"
                                    aria-label="Toggle menu"
                                >
                                    <span class="text-xl leading-none" x-text="menuOpen ? '×' : '☰'"></span>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

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
                                    class="rounded-2xl px-4 py-3 text-sm font-medium text-text-muted outline-none transition-colors duration-300 hover:bg-surface-muted hover:text-text focus-visible:bg-surface-muted focus-visible:text-text focus-visible:ring-2 focus-visible:ring-[var(--color-primary-ring)] focus-visible:ring-offset-2 focus-visible:ring-offset-surface"
                                    x-text="item.label"
                                ></a>
                            </template>
                        </nav>
                    </div>
                </div>
            </header>

            <main>
                {{ $slot }}
            </main>

            <footer class="border-t border-border/70 bg-surface-elevated/70">
                <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
                    <div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:justify-between">
                        <div class="max-w-sm">
                            <img src="{{ asset('assets/frontend/images/logo.svg') }}" alt="{{ config('app.name') }}" class="h-12 w-auto">
                            <p class="mt-4 text-sm leading-6 text-text-muted">
                                Trusted psyllium manufacturing, designed with a clean and modern digital experience.
                            </p>
                        </div>

                        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <h2 class="text-sm font-semibold uppercase tracking-[0.25em] text-text">Company</h2>
                                <ul class="mt-4 space-y-3 text-sm text-text-muted">
                                    <li><a href="#" class="transition hover:text-primary">About Us</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Accreditation</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Events</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Contact Us</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Blogs</a></li>
                                </ul>
                            </div>

                            <div>
                                <h2 class="text-sm font-semibold uppercase tracking-[0.25em] text-text">Psyllium Products</h2>
                                <ul class="mt-4 space-y-3 text-sm text-text-muted">
                                    <li><a href="#" class="transition hover:text-primary">Psyllium Seeds</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Psyllium Husk</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Psyllium Husk Powder</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Psyllium Seed Powder</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Psyllium KhaKha Powder</a></li>
                                </ul>
                            </div>

                            <div>
                                <h2 class="text-sm font-semibold uppercase tracking-[0.25em] text-text">Countries</h2>
                                <ul class="mt-4 grid grid-cols-2 gap-3 text-sm text-text-muted">
                                    <li><a href="#" class="transition hover:text-primary">USA</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Canada</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Brazil</a></li>
                                    <li><a href="#" class="transition hover:text-primary">Russia</a></li>
                                    <li><a href="#" class="transition hover:text-primary">South Korea</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex flex-col gap-3 border-t border-border/70 pt-6 text-sm text-text-muted sm:flex-row sm:items-center sm:justify-between">
                        <p>© 2026 Prime Psyllium. All rights reserved.</p>
                        <p>UI/UX rebuild in progress.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
