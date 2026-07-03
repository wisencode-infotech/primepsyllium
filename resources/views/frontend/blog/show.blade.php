<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/product-detail.css')) }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/blog.css') }}?v={{ filemtime(public_path('assets/frontend/css/blog.css')) }}">
    @endpush

    @if ($post->seo_title || $post->seo_description)
        @push('seo')
            @if ($post->seo_title)
                <title>{{ $post->seo_title }} — {{ config('app.name') }}</title>
            @endif
            @if ($post->seo_description)
                <meta name="description" content="{{ $post->seo_description }}">
            @endif
        @endpush
    @endif

    {{-- hero --}}
    <section class="product-hero-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('blog.index') }}">Blog</a>
                <span>/</span>
                <span class="current">{{ $post->title }}</span>
            </nav>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-center text-lg-start">
                        @if ($post->category)
                            <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeIn"><iconify-icon icon="ph:article-bold"></iconify-icon>{{ $post->category }}</h6>
                        @else
                            <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeIn"><iconify-icon icon="ph:article-bold"></iconify-icon>Blog</h6>
                        @endif
                        <h1 class="fts-36 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">{{ $post->title }}</h1>

                        <div class="product-feature-list justify-content-center justify-content-lg-start mt-3 wow fadeIn">
                            @if ($post->formatted_date)
                                <div class="product-feature-chip fts-13">
                                    <iconify-icon icon="mdi:calendar-month-outline"></iconify-icon>{{ $post->formatted_date }}
                                </div>
                            @endif
                            <div class="product-feature-chip fts-13">
                                <iconify-icon icon="mdi:clock-outline"></iconify-icon>{{ $post->reading_time }} min read
                            </div>
                        </div>

                        <div class="hero-actions d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap gap-2 gap-md-3 mt-3 mt-lg-4 wow fadeIn">
                            <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn fts-14">Get in Touch <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt="Get in Touch"></a>
                            <a href="{{ route('blog.index') }}" class="common-border-btn fts-14">Back to Blog <img src="{{ asset('assets/frontend/images/arrow-primary.png') }}" alt="Back to Blog"></a>
                        </div>
                    </div>
                </div>

                @if ($post->featured_image_url)
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="blog-hero-media wow fadeIn">
                            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- blog content --}}
    @if ($post->clean_content)
        <section class="blog-content-section product-content-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="product-content blog-content wow fadeInUp">
                            {!! $post->clean_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- attachments + share --}}
    <section class="py-3 py-lg-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="blog-meta-card wow fadeIn">

                        {{-- attachments --}}
                        @if ($post->attachments->isNotEmpty())
                            <div class="blog-meta-card-section">
                                <p class="blog-meta-card-label">
                                    <iconify-icon icon="ph:paperclip-bold"></iconify-icon>
                                    Downloads
                                </p>
                                <ul class="list-unstyled m-0 d-flex flex-column gap-2 mt-2">
                                    @foreach ($post->attachments as $attachment)
                                        <li>
                                            <a href="{{ $attachment->url }}" target="_blank" rel="noopener noreferrer" class="blog-attachment-item">
                                                <span class="blog-attachment-icon-wrap">
                                                    <iconify-icon icon="{{ $attachment->icon }}"></iconify-icon>
                                                </span>
                                                <span class="fts-14 fw-4 title-text-L flex-grow-1 text-truncate">{{ $attachment->original_name }}</span>
                                                <span class="fts-12 fw-4 subtitle-text-L flex-shrink-0">{{ $attachment->formatted_size }}</span>
                                                <span class="blog-attachment-download-btn">
                                                    <iconify-icon icon="mdi:download"></iconify-icon>
                                                    Download
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="blog-meta-card-divider"></div>
                        @endif

                        {{-- share & tag row --}}
                        <div class="blog-meta-card-section d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                @if ($post->category)
                                    <a href="{{ route('blog.index', ['category' => $post->category]) }}" class="blog-tag">
                                        <iconify-icon icon="ph:tag-bold"></iconify-icon>
                                        {{ $post->category }}
                                    </a>
                                @endif
                                <span class="fts-12 fw-4 subtitle-text-L d-flex align-items-center gap-1">
                                    <iconify-icon icon="mdi:clock-outline"></iconify-icon>
                                    {{ $post->reading_time }} min read
                                </span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="fts-13 fw-5 subtitle-text-L">Share this article</span>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer" class="blog-share-btn" title="Share on LinkedIn">
                                    <iconify-icon icon="mdi:linkedin"></iconify-icon>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" rel="noopener noreferrer" class="blog-share-btn" title="Share on X">
                                    <iconify-icon icon="ri:twitter-x-fill"></iconify-icon>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer" class="blog-share-btn" title="Share on Facebook">
                                    <iconify-icon icon="mdi:facebook"></iconify-icon>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- related posts --}}
    @if ($relatedPosts->isNotEmpty())
        <section class="primer-product-section py-4 py-lg-5">
            <div class="container py-lg-2">
                <div class="heading-products text-center">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeInUp"><iconify-icon icon="ph:article-bold"></iconify-icon>More from the Blog</h6>
                    <h2 class="fts-32 fw-5 title-text-L mt-1 mt-lg-2 wow fadeInUp">You Might Also Like</h2>
                </div>
                <div class="row mt-3 mt-lg-4">
                    @foreach ($relatedPosts as $related)
                        <div class="col-lg-4 col-md-6 mt-3 d-flex">
                            <a href="{{ $related->url }}" class="blog-card wow fadeInUp w-100">
                                <div class="blog-card-thumb-wrap">
                                    @if ($related->featured_image_url)
                                        <img src="{{ $related->featured_image_url }}" alt="{{ $related->title }}" class="blog-card-thumb" loading="lazy" decoding="async">
                                    @else
                                        <div class="blog-card-thumb-placeholder">
                                            <iconify-icon icon="ph:article"></iconify-icon>
                                        </div>
                                    @endif
                                    @if ($related->category)
                                        <span class="blog-card-category">{{ $related->category }}</span>
                                    @endif
                                </div>
                                <div class="blog-card-body">
                                    <div class="blog-card-meta d-flex align-items-center gap-3 mb-2">
                                        @if ($related->formatted_date)
                                            <span class="fts-12 fw-4 subtitle-text-L d-flex align-items-center gap-1">
                                                <iconify-icon icon="mdi:calendar-month-outline"></iconify-icon>
                                                {{ $related->formatted_date }}
                                            </span>
                                        @endif
                                        <span class="fts-12 fw-4 subtitle-text-L d-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:clock-outline"></iconify-icon>
                                            {{ $related->reading_time }} min read
                                        </span>
                                    </div>
                                    <h4 class="blog-card-title fts-17 fw-6 title-text-L">{{ $related->title }}</h4>
                                    @if ($related->excerpt)
                                        <p class="blog-card-excerpt fts-14 fw-4 subtitle-text-L mt-2">{{ $related->excerpt }}</p>
                                    @endif
                                    <span class="blog-read-more fts-14 fw-5 primary-color-L d-flex align-items-center gap-1 mt-3">
                                        Read Article <iconify-icon icon="mdi:arrow-right"></iconify-icon>
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
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
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Want to know more about our psyllium products?</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
