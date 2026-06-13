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
                    <div class="flex-1 text-center lg:text-left">
                        <p class="text-2xl font-black text-[#006a4e] sm:text-3xl">6<span class="text-lg sm:text-xl">+</span></p>
                        <p class="mt-1 text-[10px] font-semibold text-text-muted sm:text-[11px]">Certifications</p>
                    </div>
                </div>
            </div>

            {{-- ── RIGHT: CIRCULAR IMAGE ── --}}
            <div class="relative flex items-center justify-center pb-6 lg:justify-end lg:pb-0">

                {{-- Glow --}}
                <div class="absolute h-[340px] w-[340px] rounded-full bg-[#006a4e]/8 blur-[70px] sm:h-[440px] sm:w-[440px] lg:h-[560px] lg:w-[560px]"></div>

                {{-- Outer dashed ring --}}
                <div class="absolute h-[320px] w-[320px] rounded-full border border-dashed border-[#006a4e]/12 sm:h-[430px] sm:w-[430px] lg:h-[560px] lg:w-[560px]"></div>

                {{-- Middle ring --}}
                <div class="absolute h-[278px] w-[278px] rounded-full border border-[#006a4e]/[0.08] bg-[#006a4e]/[0.03] sm:h-[374px] sm:w-[374px] lg:h-[490px] lg:w-[490px]"></div>

                {{-- Inner ring --}}
                <div class="absolute h-[254px] w-[254px] rounded-full border-2 border-[#006a4e]/[0.12] bg-[#006a4e]/[0.04] sm:h-[346px] sm:w-[346px] lg:h-[458px] lg:w-[458px]"></div>

                {{-- Spinning circular image --}}
                <div class="relative z-10 h-[240px] w-[240px] sm:h-[320px] sm:w-[320px] lg:h-[430px] lg:w-[430px]"
                     style="filter:drop-shadow(0 20px 60px rgba(0,106,78,0.28)) drop-shadow(0 6px 20px rgba(0,106,78,0.14));">
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
     ABOUT / STORY SECTION
     ============================================================ --}}
<section id="about" class="relative overflow-hidden bg-surface py-20 lg:py-28">

    {{-- Decorative background blobs --}}
    <div class="pointer-events-none absolute inset-0 -z-10">
        <div class="absolute -left-40 top-1/2 h-96 w-96 -translate-y-1/2 rounded-full bg-[#006a4e]/5 blur-[80px]"></div>
        <div class="absolute -right-40 bottom-0 h-80 w-80 rounded-full bg-[#006a4e]/5 blur-[80px]"></div>
    </div>

    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-20">

            {{-- ── LEFT: IMAGE ── --}}
            <div class="relative">

                {{-- Decorative corner accent --}}
                <div class="absolute -left-4 -top-4 h-24 w-24 rounded-tl-3xl border-l-2 border-t-2 border-[#006a4e]/25 lg:-left-6 lg:-top-6 lg:h-32 lg:w-32"></div>
                <div class="absolute -bottom-4 -right-4 h-24 w-24 rounded-br-3xl border-b-2 border-r-2 border-[#006a4e]/25 lg:-bottom-6 lg:-right-6 lg:h-32 lg:w-32"></div>

                {{-- Image frame --}}
                <div class="relative overflow-hidden rounded-3xl shadow-[0_24px_80px_rgba(0,106,78,0.18)]">
                    <img
                        src="{{ asset('assets/frontend/images/about-palanpur.webp') }}"
                        alt="Palanpur — The Home of Prime Psyllium"
                        class="h-[420px] w-full object-cover object-center sm:h-[480px] lg:h-[560px]"
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

                    {{-- Location tag --}}
                    <div class="absolute bottom-5 left-5 flex items-center gap-2.5 rounded-full bg-surface-elevated/90 px-4 py-2 backdrop-blur-sm shadow-lg">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span class="text-[11px] font-bold text-text">Palanpur, Gujarat, India</span>
                    </div>
                </div>

                {{-- Circular badge --}}
                <div class="absolute -right-5 top-10 z-10 flex h-20 w-20 flex-col items-center justify-center rounded-full bg-[#006a4e] shadow-[0_8px_32px_rgba(0,106,78,0.40)] sm:-right-6 sm:h-24 sm:w-24">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#faf8ec" stroke-width="1.5"><path d="M12 2a10 10 0 100 20A10 10 0 0012 2z"/><path d="M12 6v6l4 2" stroke-opacity="0.7"/></svg>
                    <p class="mt-1 text-center text-[7px] font-bold uppercase leading-tight tracking-wider text-[#faf8ec]">Est.<br>1995</p>
                </div>

                {{-- Natural badge --}}
                <div class="absolute -bottom-5 left-10 z-10 flex items-center gap-2 rounded-full bg-surface-elevated px-4 py-2.5 shadow-[0_8px_30px_rgba(0,0,0,0.12)] sm:left-14">
                    <div class="flex h-6 w-6 items-center justify-center rounded-full bg-[#006a4e]/10">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#006a4e" stroke-width="2"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"/><path d="M8 12s1.5-3 4-3 4 3 4 3-1.5 3-4 3-4-3-4-3z" fill="#006a4e" fill-opacity="0.2"/></svg>
                    </div>
                    <span class="text-[11px] font-bold text-text">100% Natural &amp; Pure</span>
                </div>
            </div>

            {{-- ── RIGHT: CONTENT ── --}}
            <div class="lg:pl-4">

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

                {{-- Stat + group companies blurb --}}
                <div class="mt-8 flex items-start gap-6 rounded-2xl border border-[#006a4e]/10 bg-surface-elevated p-6 shadow-[0_4px_24px_rgba(0,106,78,0.07)]">
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
                        class="group rounded-2xl border border-[#006a4e]/10 bg-surface-elevated p-4 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_32px_rgba(0,106,78,0.12)]"
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

                        <a href="#" class="mt-3 inline-flex items-center gap-1 text-[11px] font-bold text-[#006a4e] transition hover:gap-2">
                            View Details
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 6h8M6 2l4 4-4 4"/></svg>
                        </a>
                    </div>
                    @endforeach

                    {{-- Also Available cards — shown only when toggled --}}
                    @foreach($productConfig['also_available'] as $item)
                    <div
                        x-show="showAlsoAvailable && showOtherProducts"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="group flex flex-col rounded-2xl border border-[#006a4e]/10 bg-surface-elevated p-4 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_32px_rgba(0,106,78,0.12)]"
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
                        <a href="#" class="mt-3 inline-flex items-center gap-1 text-[11px] font-bold text-[#006a4e] transition hover:gap-2">
                            View Details
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 6h8M6 2l4 4-4 4"/></svg>
                        </a>
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
<section id="about" class="bg-surface-elevated py-16 lg:py-24">
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
        <div class="grid gap-6 lg:grid-cols-[1fr_440px] xl:grid-cols-[1fr_500px]">

            {{-- Left: Certifications --}}
            <div class="rounded-3xl border border-[#006a4e]/10 bg-surface-elevated p-8 sm:p-10">
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

                <div class="mt-8 grid grid-cols-3 gap-3 sm:grid-cols-6">
                    @foreach([
                        ['Sedex',  'Sedex Member',      'sedex.webp'],
                        ['FSSC',   'FSSC 22000',         'fssc.webp'],
                        ['FDA',    'FDA Approved',        'fda.webp'],
                        ['GMP',    'Good Mfg. Practice',  'gmp.webp'],
                        ['Kosher', 'KBD Kosher',          'klbd.webp'],
                        ['HALAL',  'HALAL Certified',     'halal.webp'],
                    ] as $cert)
                    <div class="flex flex-col items-center rounded-xl border border-[#006a4e]/12 p-3 text-center transition hover:border-[#006a4e]/28 hover:bg-surface">
                        <div class="flex h-14 w-14 items-center justify-center rounded-full border border-[#006a4e]/10 bg-surface-elevated p-1">
                            <img
                                src="{{ asset('assets/frontend/images/certificate/' . $cert[2]) }}"
                                alt="{{ $cert[0] }}"
                                class="h-full w-full object-contain"
                            >
                        </div>
                        <p class="mt-2 text-[10px] font-extrabold text-text leading-tight">{{ $cert[0] }}</p>
                        <p class="mt-0.5 text-[9px] text-text-muted leading-tight">{{ $cert[1] }}</p>
                    </div>
                    @endforeach
                </div>

                <a href="#" class="mt-8 inline-flex items-center gap-2 rounded-full border border-[#006a4e]/20 bg-surface px-6 py-3 text-[13px] font-bold text-[#006a4e] transition hover:bg-[#006a4e]/8">
                    View All Certifications
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </a>
            </div>

            {{-- Right: Sustainability card --}}
            <div id="sustainability" class="relative flex flex-col justify-end overflow-hidden rounded-3xl bg-[#006a4e] p-8 sm:p-10">
                <div class="pointer-events-none absolute inset-0">
                    <div class="absolute -right-16 -top-16 h-56 w-56 rounded-full bg-[#faf8ec]/[0.05]"></div>
                    <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-[#faf8ec]/[0.04]"></div>
                </div>
                <svg class="pointer-events-none absolute bottom-0 right-0 opacity-[0.07]" width="220" height="280" viewBox="0 0 220 280" fill="#faf8ec"><path d="M110 0 C110 0 20 70 20 160 C20 225 60 280 110 280 C160 280 200 225 200 160 C200 70 110 0 110 0 Z"/></svg>
                <div class="relative z-10">
                    <p class="text-[11px] font-bold uppercase tracking-[0.45em] text-[#faf8ec]/55">Our Commitment</p>
                    <h2 class="mt-4 text-2xl font-extrabold leading-[1.18] text-[#faf8ec] sm:text-3xl">
                        Delivering Wellbeing.<br>Sustaining Tomorrow.
                    </h2>
                    <p class="mt-4 text-[13px] leading-6 text-[#faf8ec]/68">
                        We are committed to nature, communities, and a healthier planet — through eco-friendly processing, chemical-free sourcing, and biodegradable packaging for generations to come.
                    </p>
                    <a href="#" class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-[#faf8ec] transition hover:gap-3">
                        Explore Our Sustainability
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 8 · GLOBAL PRESENCE
     ============================================================ --}}
<section id="global" class="bg-[#006a4e] py-16 lg:py-24">
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
                    <span class="rounded-full border border-[#faf8ec]/18 px-3 py-1.5 text-[11px] font-semibold text-[#faf8ec]/70 transition hover:border-[#faf8ec]/35 hover:text-[#faf8ec]">{{ $country }}</span>
                    @endforeach
                    <span class="rounded-full border border-[#faf8ec]/18 px-3 py-1.5 text-[11px] font-semibold text-[#faf8ec]/50">+76 more</span>
                </div>

                <a href="#" class="mt-8 inline-flex items-center gap-2 rounded-full border border-[#faf8ec]/20 px-6 py-3 text-[13px] font-bold text-[#faf8ec] transition hover:bg-[#faf8ec]/10">
                    View All Countries
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </a>
            </div>

            {{-- Right: Map + Stats --}}
            <div>
                {{-- SVG World Map --}}
                <div class="relative mb-8 overflow-hidden rounded-2xl">
                    <svg viewBox="0 0 720 360" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto opacity-40">
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
                    <div class="rounded-2xl bg-[#faf8ec]/8 p-5 text-center">
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
     GROUP OF COMPANIES
     ============================================================ --}}
<section class="relative overflow-hidden py-20 lg:py-24">

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
     MEDIA CENTER / EVENTS
     ============================================================ --}}
@php
$events = [
    ['title' => 'World Food Moscow 2025',        'date' => 'Sep 2, 2025',   'tag' => 'Exhibition', 'location' => 'Moscow, Russia',       'excerpt' => 'Inviting global partners to visit Prime Psyllium at World Food Expo 2025 and explore our full certified psyllium product range.'],
    ['title' => 'Fi South America Expo 2025',    'date' => 'Aug 18, 2025',  'tag' => 'Trade Show', 'location' => 'São Paulo, Brazil',     'excerpt' => 'Connecting with food ingredient leaders and new partners across Latin America at Fi South America 2025.'],
];
@endphp

<section id="media" class="bg-surface py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Header row --}}
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

        <div class="grid gap-5 lg:grid-cols-[1fr_320px] xl:grid-cols-[1fr_360px]">

            {{-- LEFT: event cards --}}
            <div class="space-y-3">
                @foreach($events as $i => $ev)
                <div class="group flex items-start gap-5 rounded-2xl border border-[#006a4e]/8 bg-surface-elevated px-6 py-5 shadow-sm transition-all duration-300 hover:border-[#006a4e]/22 hover:shadow-[0_8px_28px_rgba(0,106,78,0.09)]">

                    {{-- Date block --}}
                    <div class="flex w-12 shrink-0 flex-col items-center rounded-xl border border-[#006a4e]/12 bg-surface py-2 text-center">
                        <span class="text-[9px] font-bold uppercase tracking-wide text-[#006a4e]/55">
                            {{ strtoupper(substr(explode(' ', $ev['date'])[0], 0, 3)) }}
                        </span>
                        <span class="text-[20px] font-black leading-none text-[#006a4e]">
                            {{ explode(' ', $ev['date'])[1] ?? '' }}
                        </span>
                        <span class="text-[9px] font-semibold text-text-muted">
                            {{ explode(', ', $ev['date'])[1] ?? '' }}
                        </span>
                    </div>

                    {{-- Content --}}
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="rounded-full bg-[#006a4e] px-2.5 py-0.5 text-[9px] font-bold uppercase tracking-wider text-[#faf8ec]">{{ $ev['tag'] }}</span>
                            <span class="flex items-center gap-1 text-[11px] text-text-muted">
                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                {{ $ev['location'] }}
                            </span>
                        </div>
                        <h3 class="mt-1.5 text-[15px] font-extrabold leading-snug text-text transition-colors duration-200 group-hover:text-[#006a4e]">
                            {{ $ev['title'] }}
                        </h3>
                        <p class="mt-1 text-[12px] leading-5 text-text-muted line-clamp-2">{{ $ev['excerpt'] }}</p>
                    </div>

                    {{-- Arrow --}}
                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-[#006a4e]/12 text-[#006a4e]/30 transition-all duration-300 group-hover:border-[#006a4e] group-hover:bg-[#006a4e] group-hover:text-[#faf8ec]">
                        <svg width="13" height="13" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- RIGHT: sidebar --}}
            <div class="flex flex-col gap-4">

                {{-- Stats card --}}
                <div class="rounded-2xl border border-[#006a4e]/10 bg-surface-elevated p-6 shadow-sm">
                    <p class="text-[10px] font-bold uppercase tracking-[0.35em] text-[#006a4e]/60">Our Expo Presence</p>
                    <div class="mt-4 space-y-4">
                        @foreach([['25+', 'Global Events Attended'], ['6', 'Continents Covered'], ['90+', 'Countries Reached'], ['2025', 'Active Exhibition Year']] as $stat)
                        <div class="flex items-center justify-between border-b border-[#006a4e]/8 pb-3 last:border-0 last:pb-0">
                            <span class="text-[12px] font-semibold text-text-muted">{{ $stat[1] }}</span>
                            <span class="text-[18px] font-black text-[#006a4e]">{{ $stat[0] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Meet us CTA --}}
                <div class="relative overflow-hidden rounded-2xl bg-[#006a4e] p-6">
                    <div class="pointer-events-none absolute -right-8 -top-8 h-32 w-32 rounded-full bg-[#faf8ec]/[0.07]"></div>
                    <div class="pointer-events-none absolute -bottom-6 -left-6 h-24 w-24 rounded-full bg-[#faf8ec]/[0.05]"></div>
                    <div class="relative">
                        <p class="text-[10px] font-bold uppercase tracking-[0.35em] text-[#faf8ec]/50">Upcoming</p>
                        <p class="mt-2 text-[18px] font-extrabold leading-snug text-[#faf8ec]">Want to Meet<br>Our Team?</p>
                        <p class="mt-2 text-[12px] leading-5 text-[#faf8ec]/65">Find us at the next global trade expo. Enquire about booth visits, meetings, or product samples.</p>
                        <a href="#contact" class="mt-4 inline-flex items-center gap-2 rounded-full bg-[#faf8ec] px-5 py-2.5 text-[12px] font-bold text-[#006a4e] transition hover:bg-[#faf8ec]/90">
                            Enquire Now
                            <svg width="12" height="12" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     SECTION 9 · CONTACT CTA
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
