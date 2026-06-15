<x-frontend-layout>

{{-- ============================================================
     SECTION 1 · HERO
     ============================================================ --}}
<section id="hero" class="relative flex min-h-[100svh] flex-col justify-center overflow-hidden bg-surface">

    {{-- Background texture dots --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden opacity-30">
        @for($r = 0; $r < 8; $r++)
            @for($c = 0; $c < 14; $c++)
                <div class="absolute h-1 w-1 rounded-full bg-[#006a4e]/20" style="top:{{ $r*14+4 }}%;left:{{ $c*7.5+2 }}%;"></div>
            @endfor
        @endfor
    </div>

    {{-- "PURE BY NATURE" vertical label — desktop only --}}
    <div class="absolute left-5 top-1/2 z-10 hidden lg:flex" style="writing-mode:vertical-rl;transform:translateY(-50%) rotate(180deg);">
        <span class="select-none text-[9px] font-bold uppercase tracking-[0.65em] text-[#006a4e]/30">Pure By Nature</span>
    </div>

    <div class="mx-auto w-full max-w-7xl px-5 sm:px-6 lg:px-10">
        <div class="grid grid-cols-1 items-center gap-4 pt-28 pb-12 sm:pt-32 sm:pb-16 lg:grid-cols-2 lg:gap-10 lg:pt-28 lg:pb-16 min-h-[100svh]">

            {{-- ── LEFT: COPY ── --}}
            <div class="relative z-10 text-center lg:text-left">

                {{-- Eyebrow pill --}}
                <div class="inline-flex items-center gap-2.5 rounded-full border border-[#006a4e]/20 bg-surface-elevated px-4 py-2 shadow-sm">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#006a4e]"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.38em] text-[#006a4e] sm:text-[10.5px]">Your Fiber Partner Since 1995</span>
                </div>

                {{-- Headline --}}
                <h1 class="mt-5 text-[2.4rem] font-extrabold leading-[1.06] tracking-[-0.02em] text-text sm:text-[3rem] md:text-[3.4rem] lg:text-[3.6rem] xl:text-[4rem]">
                    India's Most<br>
                    <span class="relative inline-block text-[#006a4e]">Trusted
                        <svg class="absolute -bottom-1 left-0 w-full" viewBox="0 0 200 8" fill="none" preserveAspectRatio="none"><path d="M2 6 Q50 2 100 5 Q150 8 198 4" stroke="#006a4e" stroke-width="2.5" stroke-opacity="0.25" stroke-linecap="round" fill="none"/></svg>
                    </span>
                    Psyllium<br>
                    Manufacturer.
                </h1>

                {{-- Subtext --}}
                <p class="mx-auto mt-5 max-w-[420px] text-[14px] leading-7 text-text-muted sm:text-[15px] lg:mx-0">
                    We deliver reliable, high-quality psyllium solutions that boost performance, reduce costs and support a greener future.
                </p>

                {{-- CTAs --}}
                <div class="mt-7 flex flex-wrap items-center justify-center gap-3 lg:justify-start">
                    <a href="#contact" class="inline-flex items-center gap-2.5 rounded-full bg-[#006a4e] px-6 py-3.5 text-[13px] font-bold text-[#faf8ec] shadow-[0_10px_32px_rgba(0,106,78,0.35)] transition-all duration-300 hover:bg-[#00553f] hover:shadow-[0_16px_40px_rgba(0,106,78,0.42)] sm:px-7">
                        Get Started
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                    </a>
                    <a href="#products" class="inline-flex items-center gap-2.5 rounded-full border border-[#006a4e]/20 bg-surface-elevated px-6 py-3.5 text-[13px] font-bold text-text shadow-sm transition-all duration-300 hover:border-[#006a4e]/40 hover:shadow-md">
                        View Products
                    </a>
                </div>

                {{-- Stats row --}}
                <div class="mx-auto mt-8 flex max-w-sm items-stretch gap-0 border-t border-[#006a4e]/10 pt-7 lg:mx-0 lg:max-w-none">
                    <div class="flex-1 text-center lg:text-left">
                        <p class="text-2xl font-black text-[#006a4e] sm:text-3xl">30<span class="text-lg sm:text-xl">+</span></p>
                        <p class="mt-1 text-[10px] font-semibold text-text-muted sm:text-[11px]">Years Experience</p>
                    </div>
                    <div class="w-px bg-[#006a4e]/10"></div>
                    <div class="flex-1 text-center lg:text-left lg:px-6">
                        <p class="text-2xl font-black text-[#006a4e] sm:text-3xl">90<span class="text-lg sm:text-xl">+</span></p>
                        <p class="mt-1 text-[10px] font-semibold text-text-muted sm:text-[11px]">Countries Served</p>
                    </div>
                    <div class="w-px bg-[#006a4e]/10"></div>
                    <div class="flex-1 text-center lg:px-6 lg:text-left">
                        <p class="text-2xl font-black text-[#006a4e] sm:text-3xl">6<span class="text-lg sm:text-xl">+</span></p>
                        <p class="mt-1 text-[10px] font-semibold text-text-muted sm:text-[11px]">Certifications</p>
                    </div>
                </div>
            </div>

            {{-- ── RIGHT: CIRCULAR IMAGE ── --}}
            <div class="relative flex items-center justify-center pb-6 lg:justify-end lg:pb-0">

                {{-- Glow --}}
                <div class="absolute h-[340px] w-[340px] rounded-full blur-[70px] sm:h-[440px] sm:w-[440px] lg:h-[560px] lg:w-[560px]" style="background-color:rgba(118, 158, 43, 0.14);"></div>

                {{-- Outer dashed ring --}}
                <div class="absolute h-[320px] w-[320px] rounded-full border border-dashed sm:h-[430px] sm:w-[430px] lg:h-[560px] lg:w-[560px]" style="border-color:rgba(118, 158, 43, 0.18);"></div>

                {{-- Middle ring --}}
                <div class="absolute h-[278px] w-[278px] rounded-full border sm:h-[374px] sm:w-[374px] lg:h-[490px] lg:w-[490px]" style="border-color:rgba(118, 158, 43, 0.16);background-color:rgba(118, 158, 43, 0.06);"></div>

                {{-- Inner ring --}}
                <div class="absolute h-[254px] w-[254px] rounded-full border-2 sm:h-[346px] sm:w-[346px] lg:h-[458px] lg:w-[458px]" style="border-color:rgba(118, 158, 43, 0.24);background-color:rgba(118, 158, 43, 0.08);"></div>

                {{-- Spinning circular image --}}
                <div class="relative z-10 h-[240px] w-[240px] sm:h-[320px] sm:w-[320px] lg:h-[430px] lg:w-[430px]"
                     style="filter:drop-shadow(0 20px 60px rgba(118,158,43,0.32)) drop-shadow(0 6px 20px rgba(118,158,43,0.18));">
                    <div class="h-full w-full animate-spin-globe" style="clip-path:circle(50% at 50% 50%);-webkit-clip-path:circle(50% at 50% 50%);">
                        <img
                            src="{{ asset('assets/frontend/images/hero-image.png') }}"
                            alt="Prime Psyllium — Global Natural Fiber Manufacturer"
                            class="h-full w-full object-cover object-center"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                        >
                        <div class="h-full w-full hidden flex-col items-center justify-center gap-2 bg-gradient-to-br from-[#006a4e] to-[#004a38] text-center">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#faf8ec" stroke-width="0.8" stroke-opacity="0.35"><circle cx="12" cy="12" r="10"/><ellipse cx="12" cy="12" rx="4" ry="10"/><line x1="2" y1="12" x2="22" y2="12"/></svg>
                            <p class="px-6 text-[9px] leading-5 text-[#faf8ec]/30">hero-image.png</p>
                        </div>
                    </div>
                </div>

                {{-- Floating card: Established — hidden on small, shown sm+ --}}
                <div class="absolute right-0 top-8 z-20 hidden rounded-2xl bg-surface-elevated/95 px-4 py-3 shadow-[0_12px_40px_rgba(0,0,0,0.13)] backdrop-blur-sm sm:block lg:-right-4">
                    <p class="text-[8.5px] font-bold uppercase tracking-[0.18em] text-text-muted">Established</p>
                    <p class="mt-0.5 text-[1.6rem] font-black leading-none tracking-tight text-[#006a4e]">1995</p>
                    <p class="mt-1 text-[8.5px] font-semibold text-text-muted">30+ Years of Trust</p>
                </div>

                {{-- Floating card: Countries — hidden on small, shown sm+ --}}
                <div class="absolute bottom-16 left-0 z-20 hidden rounded-2xl bg-surface-elevated/95 px-4 py-3 shadow-[0_12px_40px_rgba(0,0,0,0.13)] backdrop-blur-sm sm:block lg:-left-4 lg:bottom-20">
                    <p class="text-[8.5px] font-bold uppercase tracking-[0.18em] text-text-muted">Global Reach</p>
                    <p class="mt-0.5 text-[1.6rem] font-black leading-none tracking-tight text-[#006a4e]">90<span class="text-base">+</span></p>
                    <p class="mt-1 text-[8.5px] font-semibold text-text-muted">Countries Worldwide</p>
                </div>

                {{-- FDA badge — hidden on small, shown sm+ --}}
                <div class="absolute bottom-4 right-6 z-20 hidden items-center gap-2 rounded-full bg-[#006a4e] px-4 py-2.5 shadow-[0_8px_24px_rgba(0,106,78,0.40)] sm:flex lg:bottom-6 lg:right-8">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#faf8ec" stroke-width="2.5"><path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
                    <span class="text-[11px] font-bold tracking-wide text-[#faf8ec]">FDA Approved</span>
                </div>

            </div>
        </div>
    </div>

    {{-- Scroll cue — desktop only --}}
    <div class="absolute bottom-6 left-1/2 hidden -translate-x-1/2 flex-col items-center gap-2 lg:flex">
        <span class="text-[9px] font-bold uppercase tracking-[0.5em] text-[#006a4e]/30">Scroll</span>
        <div class="h-10 w-px bg-gradient-to-b from-[#006a4e]/20 to-transparent"></div>
    </div>
</section>


{{-- ============================================================
     MARQUEE TICKER
     ============================================================ --}}
<div class="overflow-hidden border-y border-[#006a4e]/10 bg-[#006a4e]/[0.03] py-4">
    <div class="animate-marquee flex w-max gap-0">
        @foreach(range(1, 8) as $i)
        <span class="flex items-center gap-4 px-8 text-[11px] font-bold uppercase tracking-[0.45em] text-[#006a4e]/55">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="#006a4e" fill-opacity="0.5"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg>
            Prime Farm, Prime Quality
            <svg width="5" height="5" viewBox="0 0 5 5" fill="#006a4e" fill-opacity="0.3"><circle cx="2.5" cy="2.5" r="2.5"/></svg>
            India's Most Trusted Psyllium Manufacturer &amp; Global Exporter
            <svg width="14" height="14" viewBox="0 0 24 24" fill="#006a4e" fill-opacity="0.5"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg>
            Sustainably Processed · Chemical-Free Sourcing · Biodegradable Packaging
        </span>
        @endforeach
    </div>
</div>



{{-- ============================================================
     SECTION 2 · ABOUT / OUR STORY
     ============================================================ --}}
<section id="about" class="story-section story-section-v2 relative overflow-hidden bg-surface py-14 lg:py-20">
    <div class="story-grid pointer-events-none absolute inset-0"></div>
    <div class="story-aurora pointer-events-none absolute left-1/2 top-10 h-[520px] w-[520px] -translate-x-1/2 rounded-full"></div>
    <div class="story-v2-glow story-v2-glow-left"></div>
    <div class="story-v2-glow story-v2-glow-right"></div>

    <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="story-v2-shell">
            <div class="story-v2-top story-reveal">
                <div>
                    <p class="inline-flex items-center gap-2.5 rounded-full border border-[#006a4e]/18 bg-[#006a4e]/5 px-4 py-2 text-[10px] font-extrabold uppercase tracking-[0.42em] text-[#006a4e]">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#769e2b]"></span>
                        Our Story
                    </p>
                    <h2 class="mt-4 max-w-3xl text-4xl font-black leading-[0.98] tracking-tight text-text sm:text-5xl lg:text-[3.65rem] xl:text-[4rem]">
                        Built in Palanpur.<br>
                        Trusted across <span class="story-v2-gradient-text">90+ countries.</span>
                    </h2>
                </div>
                <p class="story-v2-intro max-w-md text-[14px] leading-7 text-text-muted">
                    Prime Psyllium blends founder-led expertise since <strong class="font-semibold text-text">1995</strong> with modern processing, reliable sourcing, and export-ready quality for global brands.
                </p>
            </div>

            <div class="mt-8 grid gap-5 lg:grid-cols-[0.96fr_1.04fr] lg:items-stretch">
                <div class="story-v2-visual story-reveal">
                    <div class="story-v2-mapline" aria-hidden="true"></div>
                    <div class="story-v2-image-wrap">
                        <img
                            src="{{ asset('assets/frontend/images/about-palanpur.webp') }}"
                            alt="Palanpur, Gujarat - the home of Prime Psyllium"
                            class="story-v2-image"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                        >
                        <div class="hidden min-h-[520px] flex-col items-center justify-center gap-4 bg-gradient-to-br from-[#006a4e]/10 to-[#006a4e]/5">
                            <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-[#006a4e]/10">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.5" stroke-opacity="0.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                            </div>
                            <p class="text-[11px] font-semibold text-[#006a4e]/40">about-palanpur.webp</p>
                        </div>
                        <div class="story-v2-image-shade"></div>
                        <div class="story-v2-scan"></div>
                    </div>

                    <div class="story-v2-location">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>Palanpur, Gujarat, India</span>
                    </div>

                    <div class="story-v2-seal">
                        <span>Est.</span>
                        <strong>1995</strong>
                    </div>

                    <div class="story-v2-mini-card story-v2-mini-card-one">
                        <p>Founder Expertise</p>
                        <strong>30+ years</strong>
                    </div>
                    <div class="story-v2-mini-card story-v2-mini-card-two">
                        <p>Global Supply</p>
                        <strong>6 continents</strong>
                    </div>
                </div>

                <div class="story-v2-console story-reveal" style="animation-delay:0.16s;">
                    <div class="story-v2-console-grid"></div>
                    <div class="relative z-10">
                        <div class="flex flex-wrap gap-2">
                            @foreach(['Psyllium Husk', 'Psyllium Seeds', 'Psyllium Powder'] as $chip)
                                <span class="story-v2-chip">{{ $chip }}</span>
                            @endforeach
                        </div>

                        <h3 class="mt-6 text-3xl font-black leading-tight text-[#faf8ec] sm:text-[2.15rem]">
                            Top rated psyllium products manufacturer &amp; supplier.
                        </h3>

                        <div class="mt-5 space-y-3 text-[13px] leading-6 text-[#faf8ec]/72">
                            <p>
                                Prime Psyllium has been a trusted Psyllium manufacturer and supplier in India since 2018, built on decades of industry expertise.
                            </p>
                            <p>
                                We deliver high-quality Psyllium Husk, Psyllium Seeds, and Psyllium Powder with consistent purity, reliability, and professional care for customers worldwide.
                            </p>
                        </div>

                        <div class="story-v2-timeline mt-6">
                            @foreach([
                                ['1995', 'Founder entered the psyllium business'],
                                ['2018', 'Prime Psyllium built with export focus'],
                                ['90+', 'Countries served with dependable supply'],
                            ] as $index => $item)
                                <div class="story-v2-timeline-item" style="animation-delay:{{ 0.22 + ($index * 0.1) }}s;">
                                    <span></span>
                                    <div>
                                        <strong>{{ $item[0] }}</strong>
                                        <p>{{ $item[1] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="story-v2-proof mt-6">
                            <div>
                                <p class="text-[2.8rem] font-black leading-none text-[#faf8ec]">30<span class="text-2xl">+</span></p>
                                <p class="mt-1 text-[10px] font-bold uppercase tracking-[0.2em] text-[#faf8ec]/55">Years of experience</p>
                            </div>
                            <p>
                                Group companies <strong>Amiras Agro</strong> and <strong>Fibra</strong> support premium spices and high-quality processed psyllium products for global markets.
                            </p>
                        </div>

                        <a href="#contact" class="story-v2-cta mt-6 inline-flex items-center gap-2.5 rounded-full bg-[#faf8ec] px-6 py-3 text-[13px] font-extrabold text-[#006a4e] shadow-[0_18px_44px_rgba(0,0,0,0.22)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_24px_54px_rgba(0,0,0,0.28)]">
                            Start a Conversation
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="story-v2-stats story-reveal" style="animation-delay:0.3s;">
                @foreach([
                    ['100%', 'Natural sourcing mindset'],
                    ['90+', 'Countries served'],
                    ['6', 'Continents reached'],
                    ['30+', 'Years of trust'],
                ] as $stat)
                    <div class="story-v2-stat">
                        <strong>{{ $stat[0] }}</strong>
                        <span>{{ $stat[1] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section id="about-legacy" class="hidden">

    {{-- Decorative background blobs --}}
    <div class="pointer-events-none absolute inset-0 -z-10">
        <div class="absolute -left-40 top-1/2 h-96 w-96 -translate-y-1/2 rounded-full bg-[#006a4e]/5 blur-[80px]"></div>
        <div class="absolute -right-40 bottom-0 h-80 w-80 rounded-full bg-[#006a4e]/5 blur-[80px]"></div>
    </div>
    <div class="story-grid pointer-events-none absolute inset-0"></div>
    <div class="story-aurora pointer-events-none absolute left-1/2 top-10 h-[520px] w-[520px] -translate-x-1/2 rounded-full"></div>

    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-20">

            {{-- ── LEFT: IMAGE ── --}}
            <div class="story-reveal story-visual relative">
                <div class="story-orbit story-orbit-one"></div>
                <div class="story-orbit story-orbit-two"></div>

                {{-- Decorative corner accent --}}
                <div class="absolute -left-4 -top-4 h-24 w-24 rounded-tl-3xl border-l-2 border-t-2 border-[#006a4e]/25 lg:-left-6 lg:-top-6 lg:h-32 lg:w-32"></div>
                <div class="absolute -bottom-4 -right-4 h-24 w-24 rounded-br-3xl border-b-2 border-r-2 border-[#006a4e]/25 lg:-bottom-6 lg:-right-6 lg:h-32 lg:w-32"></div>

                {{-- Animated route line --}}
                <svg class="pointer-events-none absolute -right-7 -top-7 z-10 hidden h-40 w-40 text-[#006a4e]/35 lg:block" viewBox="0 0 160 160" fill="none" aria-hidden="true">
                    <path class="story-dash" d="M10 118 C48 52 86 142 148 30" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <circle cx="148" cy="30" r="4" fill="#006a4e"/>
                </svg>

                {{-- Image frame --}}
                <div class="story-frame relative overflow-hidden rounded-3xl shadow-[0_24px_80px_rgba(0,106,78,0.18)]">
                    <img
                        src="{{ asset('assets/frontend/images/about-palanpur.webp') }}"
                        alt="Palanpur — The Home of Prime Psyllium"
                        class="story-image h-[420px] w-full object-cover object-center sm:h-[480px] lg:h-[560px]"
                        onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                    >
                    {{-- Fallback placeholder --}}
                    <div class="hidden h-[420px] w-full flex-col items-center justify-center gap-4 bg-gradient-to-br from-[#006a4e]/10 to-[#006a4e]/5 sm:h-[480px] lg:h-[560px]">
                        <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-[#006a4e]/10">
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.5" stroke-opacity="0.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                        </div>
                        <p class="text-[11px] font-semibold text-[#006a4e]/40">Place image at<br><span class="font-mono">public/assets/frontend/images/about-palanpur.jpg</span></p>
                    </div>

                    {{-- Green gradient overlay at bottom --}}
                    <div class="absolute bottom-0 left-0 right-0 h-28 bg-gradient-to-t from-[#006a4e]/40 to-transparent"></div>
                    <div class="story-sweep pointer-events-none absolute -inset-y-16 left-0 w-28 bg-gradient-to-r from-transparent via-[#faf8ec]/70 to-transparent blur-sm"></div>
                    <div class="story-image-tint pointer-events-none absolute inset-0"></div>

                    {{-- Location tag --}}
                    <div class="absolute bottom-5 left-5 flex items-center gap-2.5 rounded-full bg-surface-elevated/90 px-4 py-2 backdrop-blur-sm shadow-lg">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span class="text-[11px] font-bold text-text">Palanpur, Gujarat, India</span>
                    </div>
                </div>

                {{-- Circular badge --}}
                <div class="story-float story-pulse absolute -right-5 top-10 z-10 flex h-20 w-20 flex-col items-center justify-center rounded-full bg-[#006a4e] shadow-[0_8px_32px_rgba(0,106,78,0.40)] sm:-right-6 sm:h-24 sm:w-24">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#faf8ec" stroke-width="1.5"><path d="M12 2a10 10 0 100 20A10 10 0 0012 2z"/><path d="M12 6v6l4 2" stroke-opacity="0.7"/></svg>
                    <p class="mt-1 text-center text-[7px] font-bold uppercase leading-tight tracking-wider text-[#faf8ec]">Est.<br>1995</p>
                </div>

                {{-- Natural badge --}}
                <div class="story-float absolute -bottom-5 left-10 z-10 flex items-center gap-2 rounded-full bg-surface-elevated px-4 py-2.5 shadow-[0_8px_30px_rgba(0,0,0,0.12)] sm:left-14" style="animation-delay:1.1s;">
                    <div class="flex h-6 w-6 items-center justify-center rounded-full bg-[#006a4e]/10">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="2"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"/><path d="M8 12s1.5-3 4-3 4 3 4 3-1.5 3-4 3-4-3-4-3z" fill="#006a4e" fill-opacity="0.2"/></svg>
                    </div>
                    <span class="text-[11px] font-bold text-text">100% Natural &amp; Pure</span>
                </div>
            </div>

            {{-- ── RIGHT: CONTENT ── --}}
            <div class="story-reveal lg:pl-4" style="animation-delay:0.18s;">

                {{-- Eyebrow --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-[#006a4e]/20 bg-[#006a4e]/5 px-4 py-1.5 text-[10.5px] font-bold uppercase tracking-[0.4em] text-[#006a4e]">
                    Our Story
                </div>

                {{-- Heading --}}
                <h2 class="mt-4 text-3xl font-extrabold leading-[1.1] tracking-tight text-text sm:text-4xl lg:text-[2.6rem]">
                    Prime Psyllium — Top Rated<br class="hidden sm:block">
                    Psyllium Products<br class="hidden sm:block">
                    <span class="text-[#006a4e]">Manufacturer &amp; Supplier</span>
                </h2>

                {{-- Body --}}
                <p class="mt-5 text-[15px] leading-8 text-text-muted">
                    Prime Psyllium has been a trusted Psyllium manufacturer and supplier in India since 2018, built on decades of industry expertise. Our founder has been actively involved in the psyllium business since <strong class="font-semibold text-text">1995</strong>, bringing deep knowledge and experience across sourcing, processing, and global supply.
                </p>
                <p class="mt-3 text-[15px] leading-8 text-text-muted">
                    We deliver high-quality Psyllium Husk, Psyllium Seeds, and Psyllium Powder with consistent purity, reliability, and professional care. With exports to the USA, Brazil, Russia, and other international markets, we proudly serve brands and partners worldwide.
                </p>

                {{-- Animated timeline chips --}}
                <div class="story-milestones mt-7 grid gap-3 sm:grid-cols-3">
                    @foreach([
                        ['1995','Founder expertise'],
                        ['2018','Prime Psyllium built'],
                        ['90+','Countries served'],
                    ] as $index => $milestone)
                        <div class="story-reveal story-card rounded-2xl border border-[#006a4e]/12 bg-surface-elevated/85 p-4 shadow-[0_10px_34px_rgba(0,106,78,0.07)] backdrop-blur-sm" style="animation-delay:{{ 0.28 + ($index * 0.1) }}s;">
                            <p class="text-[1.35rem] font-black leading-none text-[#006a4e]">{{ $milestone[0] }}</p>
                            <p class="mt-2 text-[10px] font-bold uppercase tracking-[0.18em] text-text-muted">{{ $milestone[1] }}</p>
                        </div>
                    @endforeach
                </div>

                {{-- Stat + group companies blurb --}}
                <div class="story-reveal story-proof mt-8 flex items-start gap-6 rounded-2xl border border-[#006a4e]/10 bg-surface-elevated p-6 shadow-[0_4px_24px_rgba(0,106,78,0.07)]" style="animation-delay:0.48s;">
                    <div class="shrink-0 text-center">
                        <p class="text-[2.6rem] font-black leading-none tracking-tight text-[#006a4e]">30<span class="text-2xl">+</span></p>
                        <p class="mt-1.5 text-[10px] font-bold uppercase tracking-wider text-text-muted">Years of<br>Experience</p>
                    </div>
                    <div class="w-px self-stretch bg-[#006a4e]/12"></div>
                    <p class="text-[13.5px] leading-7 text-text-muted">
                        <strong class="font-semibold text-text">Prime Psyllium</strong> group companies <strong class="font-semibold text-text">Amiras Agro</strong> deliver premium spices, while <strong class="font-semibold text-text">Fibra</strong> delivers high-quality processed Psyllium products for global markets.
                    </p>
                </div>

                {{-- CTA --}}
                <div class="mt-8">
                    <a href="#contact" class="inline-flex items-center gap-2.5 rounded-full bg-[#006a4e] px-7 py-3.5 text-[13px] font-bold text-[#faf8ec] shadow-[0_10px_32px_rgba(0,106,78,0.32)] transition-all duration-300 hover:bg-[#00553f] hover:shadow-[0_16px_40px_rgba(0,106,78,0.42)]">
                        Get Started
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 3 · PRODUCTS
     ============================================================ --}}
@php $productConfig = config('products'); @endphp

{{-- Pass config safely via script tag — avoids HTML attribute encoding issues --}}
<script>window.__productsConfig = @json($productConfig);</script>

<section id="products" class="py-12 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[288px_1fr] xl:grid-cols-[316px_1fr]"
             x-data="productsSection()"
             x-cloak>

            {{-- Left sidebar --}}
            <div class="flex flex-col gap-5">
                <p class="inline-flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.45em] text-[#006a4e]">
                    <span class="block h-px w-6 bg-[#006a4e]/50"></span>
                    Our Products
                </p>
                <h2 class="text-3xl font-extrabold leading-[1.12] text-text sm:text-4xl">
                    Our Psyllium<br>Products
                </h2>
                <p class="text-[13px] leading-6 text-text-muted">
                    Psyllium that brings nature's wellness to every product. Clean, pure and backed by trust.
                </p>
                <a href="#" class="group inline-flex items-center gap-2 text-sm font-bold text-[#006a4e] transition hover:gap-3">
                    Explore All Products
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
                </a>

                {{-- Custom solution card --}}
                <div class="mt-2 rounded-2xl bg-[#006a4e] p-5 text-[#faf8ec]">
                    <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-[#faf8ec]/12">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v12M6 12h12" stroke-opacity="0.9"/></svg>
                    </div>
                    <h3 class="text-[15px] font-bold leading-snug">Need a Custom Solution?</h3>
                    <p class="mt-2 text-[12px] leading-5 text-[#faf8ec]/70">We offer tailor-made psyllium solutions to meet your unique requirements across industries.</p>
                    <a href="#contact" class="mt-4 inline-flex items-center gap-1.5 rounded-full bg-[#faf8ec]/14 px-4 py-2 text-[12px] font-bold text-[#faf8ec] transition hover:bg-[#faf8ec]/24">
                        Connect with Us
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 6h8M6 2l4 4-4 4"/></svg>
                    </a>
                </div>
            </div>

            {{-- Right: Product panel --}}
            <div>

                {{-- Search bar --}}
                <div class="relative mb-5">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-[#006a4e]/40" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    <input
                        type="text"
                        x-model.debounce.200ms="search"
                        placeholder="Search products by name, type or grade…"
                        class="w-full rounded-full border border-[#006a4e]/15 bg-surface-elevated py-2.5 pl-10 pr-4 text-[13px] text-text placeholder-[#5d6d65]/55 outline-none transition focus:border-[#006a4e]/40 focus:ring-2 focus:ring-[#006a4e]/10"
                    >
                    {{-- Clear button --}}
                    <button
                        x-show="search"
                        @click="search = ''"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-text-muted/50 hover:text-[#006a4e]"
                        title="Clear search"
                    >
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 2l10 10M12 2L2 12"/></svg>
                    </button>
                </div>

                {{-- Category tabs (driven by config) --}}
                <div class="mb-6 flex flex-wrap gap-2">
                    <template x-for="tab in tabs" :key="tab.id">
                        <button
                            type="button"
                            @click="activeTab = tab.id; search = ''"
                            :class="activeTab === tab.id
                                ? 'bg-[#006a4e] text-[#faf8ec] shadow-[0_4px_14px_rgba(0,106,78,0.28)]'
                                : 'bg-surface-elevated border border-[#006a4e]/14 text-text-muted hover:border-[#006a4e]/35 hover:text-text'"
                            class="rounded-full px-4 py-2 text-[12px] font-bold transition-all duration-200"
                            x-text="tab.label"
                        ></button>
                    </template>
                </div>

                {{-- Result count --}}
                <p class="mb-4 text-[11px] font-semibold text-text-muted">
                    Showing <span class="font-black text-[#006a4e]" x-text="visibleCount"></span> product<span x-show="visibleCount !== 1">s</span>
                    <span x-show="search" x-text="` for "${search}"`"></span>
                </p>

                {{-- Product cards grid — rendered server-side, filtered client-side via x-show --}}
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">

                    @foreach($productConfig['items'] as $product)
                    <div
                        data-pid="{{ $product['id'] }}"
                        x-show="isVisible($el.dataset.pid)"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        @click="openDrawer(products.find(p => String(p.id) === String($el.dataset.pid)))"
                        @keydown.enter.prevent="openDrawer(products.find(p => String(p.id) === String($el.dataset.pid)))"
                        @keydown.space.prevent="openDrawer(products.find(p => String(p.id) === String($el.dataset.pid)))"
                        role="button"
                        tabindex="0"
                        class="group cursor-pointer rounded-2xl border border-[#006a4e]/10 bg-surface-elevated p-4 text-left shadow-sm outline-none transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_32px_rgba(0,106,78,0.12)] focus-visible:ring-2 focus-visible:ring-[#006a4e]/25"
                    >
                        {{-- Product image --}}
                        <div class="mb-4 flex h-32 items-center justify-center overflow-hidden rounded-xl bg-surface-muted">
                            <img
                                src="{{ asset($product['image']) }}"
                                alt="{{ $product['name'] }}"
                                class="h-full w-full object-cover"
                                onerror="this.style.opacity='0.15'"
                            >
                        </div>

                        <h3 class="text-[13px] font-extrabold text-text">{{ $product['name'] }}</h3>
                        <p class="mt-1 text-[11px] leading-4 text-text-muted">{{ $product['description'] }}</p>

                        {{-- Category tags --}}
                        <div class="mt-2 flex flex-wrap gap-1">
                            @foreach($product['categories'] as $cat)
                            <span class="rounded-full bg-[#006a4e]/6 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-[#006a4e]/60">{{ $cat }}</span>
                            @endforeach
                        </div>

                        <button type="button" class="mt-3 inline-flex items-center gap-1 text-[11px] font-bold text-[#006a4e] transition group-hover:gap-2">
                            View Details
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 6h8M6 2l4 4-4 4"/></svg>
                        </button>
                    </div>
                    @endforeach

                    {{-- Also Available cards — shown only when toggled --}}
                    @foreach($productConfig['also_available'] as $item)
                    <div
                        x-show="showAlsoAvailable && showOtherProducts"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        @click="openDrawer(alsoProducts.find(p => p.slug === '{{ $item['slug'] }}'), 'also')"
                        @keydown.enter.prevent="openDrawer(alsoProducts.find(p => p.slug === '{{ $item['slug'] }}'), 'also')"
                        @keydown.space.prevent="openDrawer(alsoProducts.find(p => p.slug === '{{ $item['slug'] }}'), 'also')"
                        role="button"
                        tabindex="0"
                        class="group flex cursor-pointer flex-col rounded-2xl border border-[#006a4e]/10 bg-surface-elevated p-4 text-left shadow-sm outline-none transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_32px_rgba(0,106,78,0.12)] focus-visible:ring-2 focus-visible:ring-[#006a4e]/25"
                    >
                        <div class="mb-3 self-start rounded-full bg-[#006a4e]/6 px-2.5 py-0.5 text-[9px] font-bold uppercase tracking-[0.3em] text-[#006a4e]/60">Also Available</div>
                        <div class="mb-4 flex h-32 items-center justify-center overflow-hidden rounded-xl bg-surface-muted">
                            <img
                                src="{{ asset($item['image']) }}"
                                alt="{{ $item['name'] }}"
                                class="h-full w-full object-cover"
                                onerror="this.style.opacity='0.15'"
                            >
                        </div>
                        <h3 class="text-[13px] font-extrabold text-text">{{ $item['name'] }}</h3>
                        <p class="mt-1 text-[11px] leading-4 text-text-muted">{{ $item['description'] }}</p>
                        <button type="button" class="mt-3 inline-flex items-center gap-1 text-[11px] font-bold text-[#006a4e] transition group-hover:gap-2">
                            View Details
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 6h8M6 2l4 4-4 4"/></svg>
                        </button>
                    </div>
                    @endforeach

                    {{-- No results message --}}
                    <div
                        x-show="visibleCount === 0"
                        class="col-span-2 sm:col-span-3 py-12 text-center"
                    >
                        <svg class="mx-auto mb-3 text-[#006a4e]/20" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                        <p class="text-[13px] font-semibold text-text-muted">No products found for "<span x-text="search"></span>"</p>
                        <button @click="search = ''; activeTab = 'all-products'" class="mt-3 text-[12px] font-bold text-[#006a4e] underline">Clear filter</button>
                    </div>

                </div>

                {{-- Other Products toggle — visible only on All Products with no search --}}
                <div x-show="showAlsoAvailable" class="mt-8 flex items-center gap-4">
                    <div class="h-px flex-1 bg-[#006a4e]/10"></div>
                    <button
                        @click="showOtherProducts = !showOtherProducts"
                        class="inline-flex items-center gap-2 rounded-full border border-[#006a4e]/20 bg-surface-elevated px-5 py-2.5 text-[12px] font-bold text-[#006a4e] shadow-sm transition-all duration-300 hover:border-[#006a4e]/40 hover:shadow-md"
                    >
                        <span x-text="showOtherProducts ? 'Hide Other Products' : 'View Other Products'"></span>
                        <svg
                            width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="2.2"
                            class="transition-transform duration-300"
                            :class="showOtherProducts ? 'rotate-180' : ''"
                        >
                            <path d="M2 4.5l4.5 4.5 4.5-4.5"/>
                        </svg>
                    </button>
                    <div class="h-px flex-1 bg-[#006a4e]/10"></div>
                </div>

            </div>

            {{-- Product details drawer --}}
            <template x-teleport="body">
                <div
                    x-show="drawerOpen"
                    x-cloak
                    class="fixed inset-0 z-[80]"
                    @keydown.escape.window="closeDrawer()"
                >
                    <div
                        x-show="drawerOpen"
                        x-transition.opacity.duration.300ms
                        class="absolute inset-0 bg-[#0b1713]/55 backdrop-blur-sm"
                        @click="closeDrawer()"
                    ></div>

                    <aside
                        x-show="drawerOpen"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="translate-x-full opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="translate-x-0 opacity-100"
                        x-transition:leave-end="translate-x-full opacity-0"
                        class="product-drawer absolute right-0 top-0 flex h-full w-full max-w-full flex-col overflow-y-auto bg-surface-elevated shadow-[-28px_0_80px_rgba(0,0,0,0.24)] sm:max-w-[660px] lg:max-w-[52vw] xl:max-w-[860px] lg:rounded-l-[2rem]"
                        @click.stop
                    >
                        <template x-if="selectedProduct">
                            <div>
                                <div class="product-drawer-hero relative overflow-hidden p-5 sm:p-7">
                                    <div class="product-drawer-orbit product-drawer-orbit-one"></div>
                                    <div class="product-drawer-orbit product-drawer-orbit-two"></div>
                                    <button
                                        type="button"
                                        @click="closeDrawer()"
                                        class="absolute right-5 top-5 z-20 flex h-10 w-10 items-center justify-center rounded-full border border-[#faf8ec]/25 bg-[#0b1713]/35 text-[#faf8ec] shadow-[0_12px_30px_rgba(0,0,0,0.2)] backdrop-blur-md transition hover:bg-[#0b1713]/55"
                                        aria-label="Close product details"
                                    >
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M4 4l10 10M14 4L4 14"/></svg>
                                    </button>
                                    <div class="product-drawer-hero-grid relative z-10 grid gap-5 sm:grid-cols-[minmax(0,1fr)_230px] sm:items-end">
                                        <div class="product-drawer-copy pt-12 sm:pt-16">
                                            <div class="inline-flex items-center gap-2 rounded-full border border-[#faf8ec]/18 bg-[#faf8ec]/10 px-3 py-1.5 backdrop-blur-sm">
                                                <span class="h-1.5 w-1.5 rounded-full bg-[#b9df72] shadow-[0_0_16px_rgba(185,223,114,0.85)]"></span>
                                                <span class="text-[9px] font-extrabold uppercase tracking-[0.35em] text-[#faf8ec]/72">Product Details</span>
                                            </div>
                                            <h3 class="mt-4 text-3xl font-black leading-tight text-[#faf8ec] sm:text-[2.55rem]" x-text="selectedProduct.name"></h3>
                                            <p class="mt-3 max-w-xl text-[13px] leading-6 !text-[#faf8ec]/78" x-text="selectedProduct.overview"></p>
                                        </div>
                                        <div class="product-drawer-media-card">
                                            <img
                                                :src="`{{ asset('') }}${selectedProduct.image}`"
                                                :alt="selectedProduct.name"
                                                class="h-full w-full rounded-[1.15rem] bg-[#faf8ec] object-cover object-center"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="product-drawer-body space-y-5 p-5 sm:p-7">
                                    <div class="product-drawer-reveal flex flex-wrap gap-2">
                                        <template x-for="label in selectedProduct.categoryLabels" :key="label">
                                            <span class="rounded-full bg-[#006a4e]/8 px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-[0.18em] text-[#006a4e]" x-text="label"></span>
                                        </template>
                                    </div>

                                    <div class="product-drawer-card product-drawer-reveal rounded-2xl border border-[#006a4e]/10 bg-surface p-5">
                                        <p class="text-[11px] font-bold uppercase tracking-[0.28em] text-[#006a4e]/65">Product Detail</p>
                                        <div class="mt-3 space-y-3">
                                            <template x-for="paragraph in selectedProduct.details" :key="paragraph">
                                                <p class="text-[14px] leading-7 text-text-muted" x-text="paragraph"></p>
                                            </template>
                                        </div>
                                    </div>

                                    <div class="product-drawer-card product-drawer-reveal rounded-2xl border border-[#006a4e]/10 bg-[#006a4e]/[0.035] p-5">
                                        <div class="flex items-center justify-between gap-3">
                                            <div>
                                                <p class="text-[11px] font-bold uppercase tracking-[0.28em] text-[#006a4e]/65" x-text="selectedProduct.specTable.title"></p>
                                                <p class="mt-1 text-[11px] font-semibold text-text-muted" x-text="selectedProduct.specTable.subtitle"></p>
                                            </div>
                                            <span class="hidden rounded-full bg-surface-elevated px-2.5 py-1 text-[10px] font-extrabold uppercase tracking-[0.16em] text-[#006a4e] sm:inline-flex">Specification</span>
                                        </div>
                                        <div class="mt-4 overflow-x-auto rounded-2xl border border-[#006a4e]/10 bg-surface shadow-[0_16px_44px_rgba(0,106,78,0.06)]">
                                            <table class="min-w-[720px] w-full border-collapse text-left text-[12px]">
                                                <thead>
                                                    <tr class="bg-[#006a4e] text-[#faf8ec]">
                                                        <template x-for="column in selectedProduct.specTable.columns" :key="column">
                                                            <th class="px-4 py-3 font-extrabold" x-text="column"></th>
                                                        </template>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template x-for="(row, rowIndex) in selectedProduct.specTable.rows" :key="`${selectedProduct.slug}-${rowIndex}`">
                                                        <tr :class="rowIndex % 2 === 0 ? 'bg-[#006a4e]/[0.055]' : 'bg-surface'">
                                                            <template x-for="(cell, cellIndex) in row" :key="`${selectedProduct.slug}-${rowIndex}-${cellIndex}`">
                                                                <td
                                                                    class="border-t border-[#006a4e]/10 px-4 py-3 leading-5"
                                                                    :class="cellIndex === 0 ? 'font-extrabold text-text' : 'font-semibold text-text-muted'"
                                                                    x-text="cell"
                                                                ></td>
                                                            </template>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </div>
                                        <p
                                            x-show="selectedProduct.specTable.note"
                                            class="mt-3 text-[11px] leading-5 text-text-muted"
                                            x-text="selectedProduct.specTable.note"
                                        ></p>
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            <template x-for="spec in selectedProduct.specs" :key="spec">
                                                <span class="rounded-full border border-[#006a4e]/10 bg-surface px-3 py-1.5 text-[10px] font-bold text-[#006a4e]" x-text="spec"></span>
                                            </template>
                                        </div>
                                    </div>

                                    <div class="product-drawer-reveal grid gap-4 sm:grid-cols-2">
                                        <div class="product-drawer-card rounded-2xl border border-[#006a4e]/10 bg-surface p-5">
                                            <p class="mb-3 text-[11px] font-bold uppercase tracking-[0.28em] text-[#006a4e]/65">Key Strengths</p>
                                            <div class="space-y-2">
                                                <template x-for="feature in selectedProduct.features" :key="feature">
                                                    <div class="flex items-center gap-2 rounded-xl border border-[#006a4e]/10 bg-surface px-3 py-2.5">
                                                        <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#006a4e] text-[#faf8ec]">
                                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg>
                                                        </span>
                                                        <span class="text-[12px] font-semibold text-text" x-text="feature"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>

                                        <div class="product-drawer-card rounded-2xl border border-[#006a4e]/10 bg-surface p-5">
                                            <p class="mb-3 text-[11px] font-bold uppercase tracking-[0.28em] text-[#006a4e]/65">Applications</p>
                                            <div class="space-y-2">
                                                <template x-for="app in selectedProduct.applications" :key="app">
                                                    <div class="rounded-xl border border-[#006a4e]/10 bg-surface px-3 py-2.5 text-[12px] font-semibold text-text-muted" x-text="app"></div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-drawer-reveal rounded-2xl bg-[#006a4e] p-5 text-[#faf8ec] shadow-[0_18px_44px_rgba(0,106,78,0.22)]">
                                        <p class="text-[15px] font-extrabold">Need this product in bulk?</p>
                                        <p class="mt-2 text-[12px] leading-5 text-[#faf8ec]/72">Share your grade, packaging, quantity and destination. Our team can help with a suitable supply plan.</p>
                                        <a href="#contact" @click="closeDrawer()" class="mt-4 inline-flex items-center gap-2 rounded-full bg-[#faf8ec] px-5 py-2.5 text-[12px] font-extrabold text-[#006a4e] transition hover:bg-[#faf8ec]/90">
                                            Request Quote
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 6.5h9M7 2.5l4 4-4 4"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </aside>
                </div>
            </template>
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 4 · INDUSTRIES / APPLICATIONS
     ============================================================ --}}
<section id="applications" class="bg-surface-elevated py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mb-12 text-center lg:text-left">
            <p class="inline-flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.45em] text-[#006a4e]">
                <span class="block h-px w-6 bg-[#006a4e]/50"></span>
                Applications
                <span class="block h-px w-6 bg-[#006a4e]/50"></span>
            </p>
            <h2 class="mt-4 text-3xl font-extrabold leading-[1.12] text-text sm:text-4xl lg:text-[2.6rem]">
                Nurturing the Natural Power<br class="hidden lg:block"> of Psyllium Husk
            </h2>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

            {{-- Pharmaceutical --}}
            <div class="group rounded-2xl border border-[#006a4e]/10 bg-surface p-6 transition-all duration-300 hover:border-[#006a4e]/25 hover:shadow-[0_12px_32px_rgba(0,106,78,0.08)]">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-[#006a4e]/8">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.8" stroke-linecap="round"><path d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2v-4M9 21H5a2 2 0 0 1-2-2v-4m0 0h18"/></svg>
                </div>
                <h3 class="text-[15px] font-extrabold text-text">Pharmaceutical Industry</h3>
                <p class="mt-2 text-[12px] leading-5 text-text-muted">Trusted in modern medicine, Psyllium Husk Powder acts as a natural bulk-forming fiber known for its purity and gentle effectiveness.</p>
            </div>

            {{-- Food & Beverage --}}
            <div class="group rounded-2xl border border-[#006a4e]/10 bg-surface p-6 transition-all duration-300 hover:border-[#006a4e]/25 hover:shadow-[0_12px_32px_rgba(0,106,78,0.08)]">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-[#006a4e]/8">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.8" stroke-linecap="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
                </div>
                <h3 class="text-[15px] font-extrabold text-text">Food &amp; Beverage Industry</h3>
                <p class="mt-2 text-[12px] leading-5 text-text-muted">A clean-label ingredient that enhances texture, viscosity, and stability across bakery, cereals, beverages and functional foods.</p>
            </div>

            {{-- Dietary Supplement --}}
            <div class="group rounded-2xl border border-[#006a4e]/10 bg-surface p-6 transition-all duration-300 hover:border-[#006a4e]/25 hover:shadow-[0_12px_32px_rgba(0,106,78,0.08)]">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-[#006a4e]/8">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.8" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3 class="text-[15px] font-extrabold text-text">Dietary Supplement Industry</h3>
                <p class="mt-2 text-[12px] leading-5 text-text-muted">A leading source of soluble fiber for gut health and wellness supplements — trusted by formulators worldwide.</p>
            </div>

            {{-- Cosmetic --}}
            <div class="group rounded-2xl border border-[#006a4e]/10 bg-surface p-6 transition-all duration-300 hover:border-[#006a4e]/25 hover:shadow-[0_12px_32px_rgba(0,106,78,0.08)]">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-[#006a4e]/8">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
                </div>
                <h3 class="text-[15px] font-extrabold text-text">Cosmetic Industry</h3>
                <p class="mt-2 text-[12px] leading-5 text-text-muted">A plant-derived stabilizer and thickener suitable for skincare and personal care innovations.</p>
            </div>

            {{-- Industrial --}}
            <div class="group rounded-2xl border border-[#006a4e]/10 bg-surface p-6 transition-all duration-300 hover:border-[#006a4e]/25 hover:shadow-[0_12px_32px_rgba(0,106,78,0.08)]">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-[#006a4e]/8">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.8" stroke-linecap="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                </div>
                <h3 class="text-[15px] font-extrabold text-text">Industrial Powder Products</h3>
                <p class="mt-2 text-[12px] leading-5 text-text-muted">A reliable binder and stabilizer across multiple industrial blends and manufacturing processes.</p>
            </div>

            {{-- Meat --}}
            <div class="group rounded-2xl border border-[#006a4e]/10 bg-surface p-6 transition-all duration-300 hover:border-[#006a4e]/25 hover:shadow-[0_12px_32px_rgba(0,106,78,0.08)]">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-[#006a4e]/8">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.8" stroke-linecap="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </div>
                <h3 class="text-[15px] font-extrabold text-text">Meat Industry</h3>
                <p class="mt-2 text-[12px] leading-5 text-text-muted">A natural ingredient that enhances juiciness, texture, and binding in processed meats while boosting fiber content.</p>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 5 · OUR PROCESS
     ============================================================ --}}
<section id="process" class="py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mb-14 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="inline-flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.45em] text-[#006a4e]">
                    <span class="block h-px w-6 bg-[#006a4e]/50"></span>
                    Our Process
                </p>
                <h2 class="mt-4 text-3xl font-extrabold leading-[1.12] text-text sm:text-4xl lg:text-[2.6rem]">
                    Purity in Every Step.
                </h2>
            </div>
            <a href="#" class="inline-flex shrink-0 items-center gap-2 rounded-full bg-[#006a4e] px-6 py-3 text-[13px] font-bold text-[#faf8ec] shadow-[0_6px_20px_rgba(0,106,78,0.28)] transition hover:bg-[#00553f]">
                View Full Process
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-6 lg:gap-4">
            @foreach([
                ['01', 'Raw Material', 'Carefully sourced from trusted psyllium farms in Gujarat, India', 'M19 4 C19 4 8 14 8 22 C8 28 13 33 19 33 C25 33 30 28 30 22 C30 14 19 4 19 4 ZM19 33 L19 20M19 24 L14 20M19 28 L24 24'],
                ['02', 'Cleaning & Grading', 'Advanced cleaning & grading for consistent purity standards', 'M15 16 C15 19.866 11.866 23 8 23 C4.134 23 1 19.866 1 16 C1 12.134 4.134 9 8 9 C11.866 9 15 12.134 15 16ZM20 21 L30 31M8 9 L22 9 M8 16 L22 16 M8 23 L16 23'],
                ['03', 'Processing', 'Hygienic milling & processing to preserve quality and purity', 'M8 6 L26 6 L26 32 L8 32 ZM12 14 L24 14 M12 19 L24 19 M12 24 L20 24M22 26 C22 28.209 23.791 30 26 30 C28.209 30 30 28.209 30 26 C30 23.791 28.209 22 26 22 C23.791 22 22 23.791 22 26ZM24 26 L26 28 L29 24'],
                ['04', 'Quality Check', 'Rigorous lab testing at every stage for export-grade quality', 'M19 7 C19 7 14 12 14 17 C14 20.5 16 23 19 23 C22 23 24 20.5 24 17 C24 12 19 7 19 7ZM19 23 L19 18M14 32 L24 32 L22 36 L16 36ZM19 29 L19 32'],
                ['05', 'Packaging', 'Biodegradable packaging with care for perfect preservation', 'M7 14 L19 8 L31 14 L31 28 L19 34 L7 28 ZM7 14 L19 20 L31 14M19 20 L19 34M13 11 L25 17'],
                ['06', 'Global Delivery', 'Delivering premium psyllium to 90+ countries across 6 continents', 'M19 7 C13.477 7 9 11.477 9 17 C9 22.523 13.477 27 19 27 C24.523 27 29 22.523 29 17 C29 11.477 24.523 7 19 7ZM14 17 C14 17 15.5 20 19 20 C22.5 20 24 17 24 17M14 17 C14 17 15.5 14 19 14 C22.5 14 24 17 24 17M9 17 L29 17M19 7 L19 27'],
            ] as $step)
            <div class="relative flex flex-col items-center text-center">
                <div class="relative mb-5 flex h-20 w-20 items-center justify-center rounded-2xl border border-[#006a4e]/14 bg-surface-elevated">
                    <svg width="36" height="36" viewBox="0 0 38 38" fill="none" stroke="#006a4e" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" opacity="0.72">
                        <path d="{{ $step[3] }}"/>
                    </svg>
                    <div class="absolute -top-3 -right-3 flex h-6 w-6 items-center justify-center rounded-full bg-[#006a4e] text-[10px] font-black text-[#faf8ec]">{{ $step[0] }}</div>
                </div>
                <h3 class="text-[13px] font-extrabold text-text">{{ $step[1] }}</h3>
                <p class="mt-1.5 text-[11px] leading-4 text-text-muted">{{ $step[2] }}</p>
                @if(!$loop->last)
                <div class="absolute -right-5 top-10 hidden text-[#006a4e]/25 lg:block">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 9h10M10 5l4 4-4 4"/></svg>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 6 · WHY CHOOSE US
     ============================================================ --}}
<section id="why-us" class="bg-surface-elevated py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            {{-- Left --}}
            <div>
                <p class="inline-flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.45em] text-[#006a4e]">
                    <span class="block h-px w-6 bg-[#006a4e]/50"></span>
                    Why Choose Us
                </p>
                <h2 class="mt-4 text-3xl font-extrabold leading-[1.12] text-text sm:text-4xl lg:text-[2.4rem]">
                    Trusted Specialists in<br>Psyllium Husk Powder<br>Manufacturing
                </h2>
                <p class="mt-5 text-[13px] leading-6 text-text-muted">
                    India's Most Trusted Manufacturer &amp; Global Exporter of Premium Psyllium. Prime Psyllium is one of India's leading Psyllium suppliers and manufacturers since 1995, offering high-quality Psyllium Husk, Psyllium Seeds, and Psyllium Husk Powder to global markets.
                </p>
                <a href="#contact" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#006a4e] px-6 py-3.5 text-[13px] font-bold text-[#faf8ec] shadow-[0_6px_20px_rgba(0,106,78,0.28)] transition hover:bg-[#00553f]">
                    Get Started Today
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </a>
            </div>

            {{-- Right: 3 advantage cards --}}
            <div class="grid gap-4">
                <div class="flex items-start gap-4 rounded-2xl border border-[#006a4e]/10 bg-surface p-5">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#006a4e]/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.8" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4" stroke-opacity="0.8"/></svg>
                    </div>
                    <div>
                        <h3 class="text-[14px] font-extrabold text-text">Eco-Friendly &amp; Sustainably Processed</h3>
                        <p class="mt-1.5 text-[12px] leading-5 text-text-muted">Our manufacturing follows eco-friendly methods that minimise environmental impact at every stage of production.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 rounded-2xl border border-[#006a4e]/10 bg-surface p-5">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#006a4e]/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.8" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 12l2 2 4-4"/></svg>
                    </div>
                    <div>
                        <h3 class="text-[14px] font-extrabold text-text">Biodegradable Packaging &amp; Quality Assured</h3>
                        <p class="mt-1.5 text-[12px] leading-5 text-text-muted">We use biodegradable materials that protect product integrity while supporting sustainability goals.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 rounded-2xl border border-[#006a4e]/10 bg-surface p-5">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#006a4e]/8">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="1.8" stroke-linecap="round"><path d="M12 2a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 12c5.33 0 8 2.67 8 4v2H4v-2c0-1.33 2.67-4 8-4z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-[14px] font-extrabold text-text">Chemical-Free Sourcing &amp; 100% Naturally Refined</h3>
                        <p class="mt-1.5 text-[12px] leading-5 text-text-muted">Every product is 100% naturally refined with chemical-free sourcing — pure from farm to final product.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 7 · QUALITY & CERTIFICATIONS
     ============================================================ --}}
<section id="quality" class="py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_440px] xl:grid-cols-[minmax(0,1fr)_500px]">

            {{-- Left: Certifications --}}
            <div class="min-w-0 rounded-3xl border border-[#006a4e]/10 bg-surface-elevated p-8 sm:p-10">
                <p class="inline-flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.45em] text-[#006a4e]">
                    <span class="block h-px w-6 bg-[#006a4e]/50"></span>
                    Certified Quality
                </p>
                <h2 class="mt-4 text-3xl font-extrabold leading-[1.12] text-text sm:text-[2.1rem]">
                    Quality Backed.<br>Trust Delivered.
                </h2>
                <p class="mt-4 max-w-md text-[13px] leading-6 text-text-muted">
                    We adhere to international standards to ensure unmatched quality &amp; safety — every batch, every shipment.
                </p>

                @php
                    $certifications = [
                        ['Sedex',  'Sedex Member',      'sedex.webp'],
                        ['FSSC',   'FSSC 22000',         'fssc.webp'],
                        ['FDA',    'FDA Approved',        'fda.webp'],
                        ['GMP',    'Good Mfg. Practice',  'gmp.webp'],
                        ['Kosher', 'KBD Kosher',          'klbd.webp'],
                        ['HALAL',  'HALAL Certified',     'halal.webp'],
                    ];
                @endphp

                <div class="cert-slider mt-8">
                    <div class="cert-slider-track">
                        @foreach(array_merge($certifications, $certifications) as $cert)
                            <div class="cert-slide">
                                <div class="cert-logo">
                                    <img
                                        src="{{ asset('assets/frontend/images/certificate/' . $cert[2]) }}"
                                        alt="{{ $cert[0] }}"
                                        class="h-full w-full object-contain"
                                    >
                                </div>
                                <p class="cert-title mt-3 text-[12px] font-extrabold leading-tight">{{ $cert[0] }}</p>
                                <p class="cert-desc mt-1 text-[10px] leading-tight">{{ $cert[1] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <a href="#" class="mt-8 inline-flex items-center gap-2 rounded-full border border-[#006a4e]/20 bg-surface px-6 py-3 text-[13px] font-bold text-[#006a4e] transition hover:bg-[#006a4e]/8">
                    View All Certifications
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </a>
            </div>

            {{-- Right: Sustainability card --}}
            <div id="sustainability" class="sustain-card relative flex min-h-[520px] flex-col justify-between overflow-hidden rounded-3xl bg-[#006a4e] p-8 sm:p-10">
                <div class="pointer-events-none absolute inset-0">
                    <div class="absolute -right-16 -top-16 h-56 w-56 rounded-full bg-[#faf8ec]/[0.05]"></div>
                    <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-[#faf8ec]/[0.04]"></div>
                </div>
                <div class="sustain-glow sustain-glow-one"></div>
                <div class="sustain-glow sustain-glow-two"></div>
                <div class="sustain-rings" aria-hidden="true"></div>
                <svg class="pointer-events-none absolute bottom-0 right-0 opacity-[0.07]" width="220" height="280" viewBox="0 0 220 280" fill="#faf8ec"><path d="M110 0 C110 0 20 70 20 160 C20 225 60 280 110 280 C160 280 200 225 200 160 C200 70 110 0 110 0 Z"/></svg>
                <svg class="sustain-leaf pointer-events-none absolute -right-8 bottom-2 h-[300px] w-[240px] opacity-20" viewBox="0 0 220 280" fill="none" aria-hidden="true">
                    <path d="M110 0 C110 0 20 70 20 160 C20 225 60 280 110 280 C160 280 200 225 200 160 C200 70 110 0 110 0 Z" fill="#faf8ec"/>
                    <path d="M110 42 C118 92 118 160 96 240" stroke="#006a4e" stroke-width="3" stroke-linecap="round" opacity="0.45"/>
                    <path d="M111 124 C88 118 66 104 48 84" stroke="#006a4e" stroke-width="2" stroke-linecap="round" opacity="0.32"/>
                    <path d="M108 154 C136 146 162 128 182 104" stroke="#006a4e" stroke-width="2" stroke-linecap="round" opacity="0.32"/>
                </svg>
                <div class="relative z-10">
                    <div class="inline-flex items-center gap-2 rounded-full border border-[#faf8ec]/15 bg-[#faf8ec]/8 px-3 py-1.5 backdrop-blur-sm">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#b9df72] shadow-[0_0_16px_rgba(185,223,114,0.9)]"></span>
                        <span class="text-[10px] font-bold uppercase tracking-[0.38em] text-[#faf8ec]/70">Our Commitment</span>
                    </div>
                    <h2 class="mt-5 text-3xl font-extrabold leading-[1.08] text-[#faf8ec] sm:text-[2.35rem]">
                        Delivering Wellbeing.<br>Sustaining Tomorrow.
                    </h2>
                    <p class="sustain-copy mt-4 text-[13px] leading-6">
                        We are committed to nature, communities, and a healthier planet — through eco-friendly processing, chemical-free sourcing, and biodegradable packaging for generations to come.
                    </p>
                    <div class="mt-7 grid gap-3 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                        @foreach([
                            ['100%','Naturally Refined'],
                            ['90+','Countries Served'],
                            ['6','Continents'],
                        ] as $item)
                            <div class="sustain-stat">
                                <p class="text-2xl font-black leading-none text-[#faf8ec]">{{ $item[0] }}</p>
                                <p class="sustain-stat-label mt-1 text-[9px] font-bold uppercase tracking-[0.16em]">{{ $item[1] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <a href="#" class="group mt-7 inline-flex items-center gap-2 rounded-full bg-[#faf8ec] px-5 py-3 text-[12px] font-extrabold text-[#006a4e] shadow-[0_16px_34px_rgba(0,0,0,0.18)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_20px_44px_rgba(0,0,0,0.22)]">
                        Explore Our Sustainability
                        <svg class="transition-transform duration-300 group-hover:translate-x-1" width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 8 · GLOBAL PRESENCE
     ============================================================ --}}
<section id="global" class="global-section relative overflow-hidden bg-[#006a4e] py-16 lg:py-24">
    <div class="global-bg-grid pointer-events-none absolute inset-0"></div>
    <div class="global-glow global-glow-left"></div>
    <div class="global-glow global-glow-right"></div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[380px_1fr] lg:items-start xl:grid-cols-[420px_1fr]">

            {{-- Left --}}
            <div>
                <p class="inline-flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.45em] text-[#faf8ec]/50">
                    <span class="block h-px w-6 bg-[#faf8ec]/40"></span>
                    Global Presence
                </p>
                <h2 class="mt-4 text-3xl font-extrabold leading-[1.1] text-[#faf8ec] sm:text-4xl lg:text-[2.5rem]">
                    Our Global<br>Presence.
                </h2>
                <p class="mt-5 text-[13px] leading-6 text-[#faf8ec]/65">
                    Delivering nature's purity to 90+ countries across 6 continents — partnering with businesses and communities worldwide since 1995.
                </p>

                {{-- Country tags --}}
                <div class="mt-8 flex flex-wrap gap-2">
                    @foreach(['Canada','Russia','South Korea','Brazil','South Africa','USA','UAE','Morocco','Bahrain','Sri Lanka','Turkey','Ecuador','Australia','Argentina'] as $country)
                    <span class="global-chip rounded-full border border-[#faf8ec]/18 px-3 py-1.5 text-[11px] font-semibold text-[#faf8ec]/70 transition hover:border-[#faf8ec]/35 hover:text-[#faf8ec]">{{ $country }}</span>
                    @endforeach
                    <span class="global-chip rounded-full border border-[#faf8ec]/18 px-3 py-1.5 text-[11px] font-semibold text-[#faf8ec]/50">+76 more</span>
                </div>

                <a href="#" class="mt-8 inline-flex items-center gap-2 rounded-full border border-[#faf8ec]/20 px-6 py-3 text-[13px] font-bold text-[#faf8ec] transition hover:bg-[#faf8ec]/10">
                    View All Countries
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </a>
            </div>

            {{-- Right: Map + Stats --}}
            <div>
                {{-- SVG World Map --}}
                <div class="global-map-card relative mb-8 overflow-hidden rounded-2xl border border-[#faf8ec]/15 bg-[#faf8ec] p-4 shadow-[0_24px_70px_rgba(0,0,0,0.16)]">
                    <img
                        src="{{ asset('assets/frontend/images/map.svg') }}"
                        alt="Prime Psyllium global presence map"
                        class="global-map-image h-auto w-full"
                    >
                    <div class="global-map-shine pointer-events-none absolute inset-y-0 left-0 w-32"></div>
                    <svg class="global-routes pointer-events-none absolute inset-4 h-[calc(100%-2rem)] w-[calc(100%-2rem)]" viewBox="0 0 1076 400" fill="none" aria-hidden="true">
                        <path class="global-route global-route-one" d="M568 168 C420 92 294 108 214 176" />
                        <path class="global-route global-route-two" d="M568 168 C680 86 792 80 914 118" />
                        <path class="global-route global-route-three" d="M568 168 C520 255 430 300 326 292" />
                        <path class="global-route global-route-four" d="M568 168 C640 228 716 240 820 246" />
                    </svg>
                    @foreach([
                        ['left' => '29%', 'top' => '28%', 'label' => 'Canada'],
                        ['left' => '74%', 'top' => '27%', 'label' => 'Russia'],
                        ['left' => '83%', 'top' => '42%', 'label' => 'South Korea'],
                        ['left' => '34%', 'top' => '68%', 'label' => 'Brazil'],
                        ['left' => '54%', 'top' => '80%', 'label' => 'South Africa'],
                        ['left' => '28%', 'top' => '47%', 'label' => 'USA'],
                        ['left' => '59%', 'top' => '51%', 'label' => 'UAE'],
                        ['left' => '48%', 'top' => '48%', 'label' => 'Morocco'],
                        ['left' => '60%', 'top' => '50%', 'label' => 'Bahrain'],
                        ['left' => '64%', 'top' => '63%', 'label' => 'Sri Lanka'],
                        ['left' => '56%', 'top' => '45%', 'label' => 'Turkey'],
                        ['left' => '27%', 'top' => '65%', 'label' => 'Ecuador'],
                        ['left' => '80%', 'top' => '76%', 'label' => 'Australia'],
                        ['left' => '32%', 'top' => '83%', 'label' => 'Argentina'],
                    ] as $pin)
                        <span class="global-pin" style="left:{{ $pin['left'] }};top:{{ $pin['top'] }};" aria-label="{{ $pin['label'] }}"></span>
                    @endforeach
                    <svg viewBox="0 0 720 360" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                        @foreach([
                            [80,80],[90,85],[100,80],[110,78],[120,76],[130,78],[140,82],[150,86],[160,88],[170,86],[180,84],
                            [80,92],[90,97],[100,95],[110,92],[120,90],[130,92],[140,96],[150,100],[160,102],[170,100],[180,98],
                            [80,104],[90,109],[100,107],[110,104],[120,102],[130,104],[140,108],[150,112],[160,114],[170,112],[180,110],
                            [90,121],[100,119],[110,116],[120,114],[130,116],[140,120],[150,124],[160,126],[170,124],
                            [100,131],[110,128],[120,126],[130,128],[140,132],[150,136],[160,138],
                            [310,70],[320,68],[330,66],[340,68],[350,72],[360,74],[370,72],[380,70],
                            [310,82],[320,80],[330,78],[340,80],[350,84],[360,86],[370,84],[380,82],[390,80],
                            [310,94],[320,92],[330,90],[340,92],[350,96],[360,98],[370,96],[380,94],[390,92],
                            [310,106],[320,104],[330,102],[340,104],[350,108],[360,110],[370,108],[380,106],
                            [320,118],[330,116],[340,116],[350,120],[360,122],[370,120],
                            [320,134],[330,132],[340,130],[350,132],[360,134],[370,132],[380,134],
                            [310,146],[320,144],[330,142],[340,142],[350,146],[360,148],[370,146],[380,144],[390,146],
                            [310,158],[320,156],[330,154],[340,156],[350,160],[360,162],[370,160],[380,158],[390,156],
                            [310,170],[320,168],[330,168],[340,170],[350,174],[360,176],[370,174],[380,170],
                            [320,182],[330,182],[340,184],[350,188],[360,190],[370,188],[380,184],
                            [330,196],[340,198],[350,202],[360,204],[370,202],[380,198],
                            [420,60],[430,58],[440,56],[450,58],[460,60],[470,62],[480,60],[490,58],[500,60],[510,62],[520,60],[530,62],[540,64],
                            [410,72],[420,72],[430,70],[440,68],[450,70],[460,72],[470,74],[480,72],[490,70],[500,72],[510,74],[520,72],[530,70],[540,72],[550,74],[560,72],
                            [410,84],[420,84],[430,82],[440,80],[450,82],[460,84],[470,86],[480,84],[490,82],[500,84],[510,86],[520,84],[530,82],[540,84],[550,86],[560,84],[570,82],[580,84],
                            [420,96],[430,94],[440,92],[450,94],[460,96],[470,98],[480,96],[490,94],[500,96],[510,98],[520,96],[530,94],[540,96],[550,98],[560,96],[570,94],[580,96],
                            [430,108],[440,106],[450,108],[460,110],[470,112],[480,110],[490,108],[500,110],[510,112],[520,110],[530,108],[540,110],[550,112],[560,110],[570,108],
                            [440,120],[450,120],[460,122],[470,124],[480,122],[490,120],[500,122],[510,124],[520,122],[530,120],[540,122],[550,124],[560,122],
                            [450,132],[460,134],[470,136],[480,134],[490,132],[500,134],[510,136],[520,134],[530,132],[540,134],
                            [530,230],[540,228],[550,226],[560,228],[570,230],[580,228],[590,230],
                            [520,242],[530,242],[540,240],[550,238],[560,240],[570,242],[580,240],[590,238],[600,240],
                            [520,254],[530,254],[540,252],[550,250],[560,252],[570,254],[580,252],[590,250],[600,252],
                            [180,154],[190,152],[200,154],[210,156],[220,154],[230,156],
                            [170,166],[180,166],[190,164],[200,166],[210,168],[220,166],[230,164],[240,166],
                            [170,178],[180,178],[190,176],[200,178],[210,180],[220,178],[230,176],[240,178],
                            [180,190],[190,188],[200,190],[210,192],[220,190],[230,188],[240,190],
                            [190,202],[200,200],[210,202],[220,204],[230,202],
                            [195,214],[205,212],[215,214],[225,216],[230,214],
                        ] as $dot)
                            <circle cx="{{ $dot[0] }}" cy="{{ $dot[1] }}" r="2.8" fill="#faf8ec"/>
                        @endforeach
                        {{-- Key market highlights --}}
                        <circle cx="125" cy="100" r="5.5" fill="#faf8ec" fill-opacity="0.85"/>
                        <circle cx="340" cy="90" r="5" fill="#faf8ec" fill-opacity="0.85"/>
                        <circle cx="480" cy="110" r="6" fill="#faf8ec" fill-opacity="0.9"/>
                        <circle cx="210" cy="180" r="5" fill="#faf8ec" fill-opacity="0.8"/>
                        <circle cx="560" cy="252" r="4.5" fill="#faf8ec" fill-opacity="0.75"/>
                        {{-- Connection lines --}}
                        <path d="M125,100 Q230,60 340,90" stroke="#faf8ec" stroke-width="0.8" stroke-opacity="0.3" stroke-dasharray="4 6" fill="none"/>
                        <path d="M340,90 Q415,80 480,110" stroke="#faf8ec" stroke-width="0.8" stroke-opacity="0.3" stroke-dasharray="4 6" fill="none"/>
                        <path d="M480,110 Q520,180 560,252" stroke="#faf8ec" stroke-width="0.8" stroke-opacity="0.25" stroke-dasharray="4 6" fill="none"/>
                        <path d="M340,90 Q270,140 210,180" stroke="#faf8ec" stroke-width="0.8" stroke-opacity="0.2" stroke-dasharray="4 6" fill="none"/>
                    </svg>
                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                    @foreach([['90+','Countries'],['6','Continents'],['1000+','Happy Clients'],['30+','Years of Trust']] as $stat)
                    <div class="global-stat rounded-2xl bg-[#faf8ec]/8 p-5 text-center">
                        <p class="text-3xl font-black text-[#faf8ec]">{{ $stat[0] }}</p>
                        <p class="mt-1.5 text-[11px] font-semibold text-[#faf8ec]/60">{{ $stat[1] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 9 · MEDIA CENTER / EVENTS
     ============================================================ --}}
@php
$events = [
    [
        'title'    => 'World Food Moscow 2025',
        'date'     => 'Sep 2, 2025',
        'tag'      => 'Exhibition',
        'location' => 'Moscow, Russia',
        'excerpt'  => 'Inviting global partners to visit Prime Psyllium at World Food Expo 2025. Meet our team, explore our certified psyllium product range, and discuss tailored bulk supply solutions for your market.',
    ],
    [
        'title'    => 'Fi South America Expo 2025',
        'date'     => 'Aug 18, 2025',
        'tag'      => 'Trade Show',
        'location' => 'São Paulo, Brazil',
        'excerpt'  => 'Connecting with food ingredient leaders and new partners across Latin America at Fi South America 2025.',
    ],
];
$featured = $events[0];
$others   = array_slice($events, 1);
@endphp

<section id="media" class="bg-surface py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-10 flex flex-wrap items-end justify-between gap-5">
            <div>
                <p class="inline-flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.45em] text-[#006a4e]">
                    <span class="block h-px w-6 bg-[#006a4e]/50"></span>
                    Media Center
                </p>
                <h2 class="mt-3 text-3xl font-extrabold leading-tight tracking-tight text-text sm:text-4xl">
                    Global Events &amp; Trade Shows
                </h2>
            </div>
            <a href="#" class="group inline-flex items-center gap-2 text-[13px] font-bold text-[#006a4e] transition-all hover:gap-3">
                View All Events
                <span class="flex h-7 w-7 items-center justify-center rounded-full bg-[#006a4e]/10 transition-colors group-hover:bg-[#006a4e] group-hover:text-[#faf8ec]">
                    <svg width="12" height="12" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </span>
            </a>
        </div>

        {{-- ── FEATURED EVENT CARD ── --}}
        @php
            $fParts   = explode(' ', $featured['date']);
            $fDay     = rtrim($fParts[1] ?? '', ',');
            $fMonth   = strtoupper(substr($fParts[0] ?? '', 0, 3));
            $fYear    = $fParts[2] ?? '';
            $fCity    = trim(explode(',', $featured['location'])[0]);
            $fCountry = trim(explode(',', $featured['location'])[1] ?? '');
        @endphp

        <div class="mb-6 overflow-hidden rounded-3xl border border-[#006a4e]/10 shadow-[0_8px_48px_rgba(0,106,78,0.12)]">
            <div class="grid lg:grid-cols-[1fr_340px] xl:grid-cols-[1fr_380px]">

                {{-- Left: content --}}
                <div class="bg-surface-elevated p-8 sm:p-10 lg:p-12">

                    <div class="mb-6 inline-flex items-center gap-2 rounded-full bg-[#006a4e]/8 px-3 py-1.5">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#006a4e]"></span>
                        <span class="text-[10px] font-bold uppercase tracking-[0.4em] text-[#006a4e]">Featured Event</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-baseline gap-2">
                            <span class="text-[4rem] font-black leading-none tracking-tight text-[#006a4e]">{{ $fDay }}</span>
                            <div>
                                <p class="text-[14px] font-extrabold uppercase leading-none text-[#006a4e]">{{ $fMonth }}</p>
                                <p class="mt-0.5 text-[12px] font-semibold text-text-muted">{{ $fYear }}</p>
                            </div>
                        </div>
                        <div class="h-12 w-px bg-[#006a4e]/15"></div>
                        <div class="flex flex-col gap-1.5">
                            <span class="inline-flex w-fit rounded-full bg-[#006a4e] px-3 py-0.5 text-[9px] font-bold uppercase tracking-wider text-[#faf8ec]">{{ $featured['tag'] }}</span>
                            <span class="flex items-center gap-1.5 text-[12px] font-semibold text-text-muted">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                {{ $featured['location'] }}
                            </span>
                        </div>
                    </div>

                    <h3 class="mt-6 text-[1.75rem] font-extrabold leading-snug text-text sm:text-[2rem]">
                        {{ $featured['title'] }}
                    </h3>
                    <p class="mt-3 max-w-lg text-[14px] leading-7 text-text-muted">
                        {{ $featured['excerpt'] }}
                    </p>

                    <div class="mt-7 flex flex-wrap items-center gap-3">
                        <a href="#contact" class="inline-flex items-center gap-2 rounded-full bg-[#006a4e] px-6 py-3 text-[13px] font-bold text-[#faf8ec] shadow-[0_6px_20px_rgba(0,106,78,0.28)] transition hover:bg-[#00553f]">
                            Request a Meeting
                            <svg width="13" height="13" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                        </a>
                        <a href="#" class="inline-flex items-center gap-2 rounded-full border border-[#006a4e]/20 px-6 py-3 text-[13px] font-bold text-[#006a4e] transition hover:border-[#006a4e]/40 hover:bg-[#006a4e]/5">
                            Event Details
                        </a>
                    </div>
                </div>

                {{-- Right: green visual panel --}}
                <div class="relative flex flex-col items-center justify-center overflow-hidden bg-[#006a4e] p-10 text-center">
                    <div class="pointer-events-none absolute inset-0">
                        <div class="absolute -right-16 -top-16 h-52 w-52 rounded-full border border-[#faf8ec]/10"></div>
                        <div class="absolute -bottom-20 -left-20 h-60 w-60 rounded-full border border-[#faf8ec]/[0.07]"></div>
                        <div class="absolute left-1/2 top-1/2 h-80 w-80 -translate-x-1/2 -translate-y-1/2 rounded-full border border-[#faf8ec]/[0.04]"></div>
                    </div>
                    <div class="pointer-events-none absolute inset-0 opacity-[0.15]">
                        @for($r = 0; $r < 7; $r++)
                            @for($c = 0; $c < 5; $c++)
                                <div class="absolute h-[3px] w-[3px] rounded-full bg-[#faf8ec]" style="top:{{ $r*16+4 }}%;left:{{ $c*22+5 }}%;"></div>
                            @endfor
                        @endfor
                    </div>

                    <div class="relative z-10">
                        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full border border-[#faf8ec]/20 bg-[#faf8ec]/10">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#faf8ec" stroke-width="1.4" stroke-opacity="0.85"><circle cx="12" cy="12" r="10"/><ellipse cx="12" cy="12" rx="4" ry="10"/><line x1="2" y1="12" x2="22" y2="12"/></svg>
                        </div>

                        <p class="text-[10px] font-bold uppercase tracking-[0.4em] text-[#faf8ec]/45">Venue</p>
                        <p class="mt-2 text-[2rem] font-black leading-tight text-[#faf8ec]">{{ $fCity }}</p>
                        <p class="mt-0.5 text-[12px] font-semibold text-[#faf8ec]/55">{{ $fCountry }}</p>

                        <div class="mx-auto my-6 h-px w-14 bg-[#faf8ec]/20"></div>

                        <div class="flex items-center justify-center gap-5">
                            @foreach([['25+','Events'],['90+','Countries'],['6','Continents']] as $s)
                            <div>
                                <p class="text-[1.25rem] font-black text-[#faf8ec]">{{ $s[0] }}</p>
                                <p class="text-[9px] font-semibold uppercase tracking-wide text-[#faf8ec]/45">{{ $s[1] }}</p>
                            </div>
                            @if(!$loop->last)<div class="h-7 w-px bg-[#faf8ec]/20"></div>@endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- ── OTHER EVENTS ── --}}
        @if(count($others) > 0)
        <div class="mb-6 space-y-3">
            @foreach($others as $ev)
            @php
                $eParts = explode(' ', $ev['date']);
                $eDay   = rtrim($eParts[1] ?? '', ',');
                $eMonth = strtoupper(substr($eParts[0] ?? '', 0, 3));
                $eYear  = $eParts[2] ?? '';
            @endphp
            <div class="group relative flex flex-wrap items-center gap-5 overflow-hidden rounded-2xl border border-[#006a4e]/10 bg-surface-elevated px-8 py-5 transition-all duration-300 hover:border-[#006a4e]/25 hover:shadow-[0_12px_32px_rgba(0,106,78,0.10)] sm:flex-nowrap">
                <div class="absolute inset-y-4 left-0 w-[3px] rounded-full bg-[#006a4e]/15 transition-colors duration-300 group-hover:bg-[#006a4e]"></div>

                {{-- Date pill --}}
                <div class="shrink-0">
                    <div class="inline-flex items-center gap-2 rounded-full border border-[#006a4e]/15 bg-surface px-3 py-1.5">
                        <span class="text-[13px] font-black text-[#006a4e]">{{ $eDay }}</span>
                        <span class="text-[9px] font-bold uppercase tracking-wide text-[#006a4e]/55">{{ $eMonth }} {{ $eYear }}</span>
                    </div>
                </div>

                <div class="hidden h-8 w-px shrink-0 bg-[#006a4e]/10 sm:block"></div>

                {{-- Content --}}
                <div class="min-w-0 flex-1">
                    <div class="mb-1 flex flex-wrap items-center gap-2">
                        <span class="rounded-full bg-[#006a4e]/8 px-2.5 py-0.5 text-[9px] font-bold uppercase tracking-wider text-[#006a4e]">{{ $ev['tag'] }}</span>
                        <span class="flex items-center gap-1 text-[11px] text-text-muted">
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            {{ $ev['location'] }}
                        </span>
                    </div>
                    <h3 class="text-[14px] font-extrabold leading-snug text-text transition-colors group-hover:text-[#006a4e]">{{ $ev['title'] }}</h3>
                    <p class="mt-0.5 text-[12px] leading-5 text-text-muted line-clamp-1">{{ $ev['excerpt'] }}</p>
                </div>

                {{-- Arrow --}}
                <a href="#" class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-[#006a4e]/12 text-[#006a4e]/30 transition-all duration-300 group-hover:border-[#006a4e] group-hover:bg-[#006a4e] group-hover:text-[#faf8ec]">
                    <svg width="13" height="13" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </a>
            </div>
            @endforeach
        </div>
        @endif

        {{-- ── BOTTOM CTA STRIP ── --}}
        <div class="overflow-hidden rounded-2xl bg-[#006a4e]">
            <div class="relative px-8 py-8 sm:px-10">
                <div class="pointer-events-none absolute inset-0">
                    <div class="absolute -right-10 -top-10 h-36 w-36 rounded-full bg-[#faf8ec]/[0.06]"></div>
                    <div class="absolute -bottom-8 left-1/3 h-28 w-28 rounded-full bg-[#faf8ec]/[0.04]"></div>
                </div>
                <div class="relative flex flex-wrap items-center justify-between gap-6">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.4em] text-[#faf8ec]/50">Join Us Worldwide</p>
                        <p class="mt-1 text-[1.2rem] font-extrabold leading-snug text-[#faf8ec]">Want to Meet Our Team at the Next Expo?</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-8">
                        @foreach([['25+','Global Events'],['6','Continents'],['90+','Countries']] as $s)
                        <div class="text-center">
                            <p class="text-[1.4rem] font-black text-[#faf8ec]">{{ $s[0] }}</p>
                            <p class="text-[9px] font-semibold uppercase tracking-wider text-[#faf8ec]/45">{{ $s[1] }}</p>
                        </div>
                        @endforeach
                    </div>
                    <a href="#contact" class="inline-flex items-center gap-2 rounded-full bg-[#faf8ec] px-6 py-3 text-[13px] font-bold text-[#006a4e] transition hover:bg-[#faf8ec]/90">
                        Enquire Now
                        <svg width="13" height="13" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- ============================================================
     SECTION 10 · GROUP OF COMPANIES
     ============================================================ --}}
<section id="companies" class="relative overflow-hidden py-20 lg:py-24">

    <div class="pointer-events-none absolute inset-0 -z-10">
        <div class="absolute -left-32 top-1/2 h-64 w-64 -translate-y-1/2 rounded-full bg-[#006a4e]/5 blur-3xl"></div>
        <div class="absolute -right-32 top-1/2 h-64 w-64 -translate-y-1/2 rounded-full bg-[#006a4e]/5 blur-3xl"></div>
    </div>

    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">

        <div class="mb-14 text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-[#006a4e]/20 bg-[#006a4e]/5 px-4 py-1.5 text-[10.5px] font-bold uppercase tracking-[0.4em] text-[#006a4e]">Our Family</span>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-text sm:text-4xl">Group of Companies</h2>
            <p class="mx-auto mt-3 max-w-xl text-[15px] leading-relaxed text-text-muted">A collective of trusted brands built on quality, integrity, and global reach.</p>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">

            {{-- Prime Psyllium --}}
            <div class="group relative flex flex-col overflow-hidden rounded-3xl border border-[#006a4e]/10 bg-surface-elevated p-8 shadow-[0_4px_32px_rgba(0,106,78,0.07)] transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_16px_48px_rgba(0,106,78,0.15)]">
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#006a4e] to-[#00916c] opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                <div class="mb-6 flex h-16 items-center">
                    <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Prime Psyllium" class="h-14 w-auto object-contain">
                </div>
                <div class="mb-5 h-px bg-gradient-to-r from-[#006a4e]/15 to-transparent"></div>
                <p class="flex-1 text-[14px] leading-7 text-text-muted">
                    Prime Psyllium is one of India's leading Psyllium suppliers and manufacturers since 1995, offering high-quality Psyllium Husk, Seeds, Powder, and a complete range of Psyllium products for global industries.
                </p>
            </div>

            {{-- FIBRA --}}
            <div class="group relative flex flex-col overflow-hidden rounded-3xl border border-[#006a4e]/10 bg-surface-elevated p-8 shadow-[0_4px_32px_rgba(0,106,78,0.07)] transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_16px_48px_rgba(0,106,78,0.15)]">
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#006a4e] to-[#00916c] opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                <div class="mb-6 flex h-16 items-center">
                    <img src="{{ asset('assets/frontend/images/fibra.webp') }}" alt="Fibra" class="h-12 w-auto object-contain">
                </div>
                <div class="mb-5 h-px bg-gradient-to-r from-[#006a4e]/15 to-transparent"></div>
                <p class="flex-1 text-[14px] leading-7 text-text-muted">
                    Fibra is a specialized Psyllium production brand delivering premium, consistently processed Psyllium products supported by modern technology, strict quality standards, and reliable supply for international markets.
                </p>
            </div>

            {{-- Amiras Agro --}}
            <div class="group relative flex flex-col overflow-hidden rounded-3xl border border-[#006a4e]/10 bg-surface-elevated p-8 shadow-[0_4px_32px_rgba(0,106,78,0.07)] transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_16px_48px_rgba(0,106,78,0.15)]">
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#006a4e] to-[#00916c] opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                <div class="mb-6 flex h-16 items-center">
                    <img src="{{ asset('assets/frontend/images/amiras.webp') }}" alt="Amiras Agro" class="h-12 w-auto object-contain">
                </div>
                <div class="mb-5 h-px bg-gradient-to-r from-[#006a4e]/15 to-transparent"></div>
                <p class="flex-1 text-[14px] leading-7 text-text-muted">
                    Amiras Agro &amp; Foods is a trusted manufacturer, supplier, and private label partner of Whole Spices, Powdered Spices, Herbs, and Oil Seeds, providing complete sourcing, processing, and packaging solutions for businesses worldwide.
                </p>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 11 · CONTACT CTA
     ============================================================ --}}
<section id="contact" class="py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-3xl bg-[#10211b]">
            <div class="relative px-8 py-12 sm:px-12 lg:px-16 lg:py-16">
                {{-- Decorative --}}
                <div class="pointer-events-none absolute inset-0 overflow-hidden">
                    <div class="absolute -right-24 -top-24 h-80 w-80 rounded-full bg-[#006a4e]/30"></div>
                    <div class="absolute -bottom-24 -left-24 h-64 w-64 rounded-full bg-[#006a4e]/20"></div>
                </div>
                <div class="relative z-10 grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-[0.45em] text-[#faf8ec]/50">Your Fiber Partner</p>
                        <h2 class="mt-3 text-3xl font-extrabold text-[#faf8ec] sm:text-4xl">World Class Psyllium Products<br class="hidden sm:block"> At The Best Possible Price.</h2>
                        <p class="mt-4 text-[13px] leading-6 text-[#faf8ec]/60">
                            Get in touch with our team to discuss your requirements, request a sample, or get a competitive quote.
                        </p>
                        <div class="mt-5 flex flex-wrap items-center gap-4 text-[12px] text-[#faf8ec]/55">
                            <span class="flex items-center gap-2">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                +91 91575 73300
                            </span>
                            <span class="flex items-center gap-2">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="2,4 12,13 22,4"/></svg>
                                info@primepsyllium.com
                            </span>
                            <span class="flex items-center gap-2">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                Palanpur, Gujarat, India
                            </span>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-col gap-3 sm:flex-row lg:flex-col">
                        <a href="mailto:info@primepsyllium.com" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#006a4e] px-7 py-3.5 text-[13px] font-bold text-[#faf8ec] shadow-[0_6px_20px_rgba(0,106,78,0.4)] transition hover:bg-[#00553f]">
                            Start Growing Smarter
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                        </a>
                        <a href="tel:+919157573300" class="inline-flex items-center justify-center gap-2 rounded-full border border-[#faf8ec]/20 px-7 py-3.5 text-[13px] font-bold text-[#faf8ec] transition hover:bg-[#faf8ec]/10">
                            Call Us Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</x-frontend-layout>
