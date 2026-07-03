<x-frontend-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/product-detail.css') }}?v={{ filemtime(public_path('assets/frontend/css/product-detail.css')) }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/blog.css') }}?v={{ filemtime(public_path('assets/frontend/css/blog.css')) }}">
    @endpush

    {{-- hero --}}
    <section class="product-hero-section py-4 py-lg-5">
        <div class="container py-lg-2">
            <nav class="product-breadcrumb fts-14 fw-4 mb-3 mb-lg-4 wow fadeIn">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span class="current">Blog</span>
            </nav>

            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h6 class="common-icon-title mx-auto fts-14 wow fadeIn"><iconify-icon icon="ph:article-bold"></iconify-icon>Blog</h6>
                    <h1 class="fts-46 fw-6 title-text-L mt-3 mt-lg-4 wow fadeIn">Insights &amp; Industry Updates</h1>
                    <p class="fts-15 fw-4 subtitle-text-L mt-3 mt-lg-4 wow fadeIn">Expert perspectives on psyllium husk, natural fiber ingredients, health trends, and the latest from Prime Psyllium.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- category filters --}}
    @if ($categories->isNotEmpty())
        <section class="blog-filter-section py-2 py-lg-3">
            <div class="container">
                <div class="blog-filter-tabs d-flex align-items-center flex-wrap gap-2 wow fadeIn">
                    <a href="{{ route('blog.index') }}" class="blog-filter-tab {{ !$activeCategory ? 'active' : '' }}">
                        All Posts
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('blog.index', ['category' => $cat]) }}" class="blog-filter-tab {{ $activeCategory === $cat ? 'active' : '' }}">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- blog grid --}}
    <section class="py-4 py-lg-5">
        <div class="container py-lg-2">
            @if ($posts->isNotEmpty())
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-md-6 mt-3 d-flex">
                            <a href="{{ route('blog.show', $post) }}" class="blog-card wow fadeInUp w-100">
                                <div class="blog-card-thumb-wrap">
                                    @if ($post->featured_image_url)
                                        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="blog-card-thumb" loading="lazy" decoding="async">
                                    @else
                                        <div class="blog-card-thumb-placeholder">
                                            <iconify-icon icon="ph:article"></iconify-icon>
                                        </div>
                                    @endif
                                    @if ($post->category)
                                        <span class="blog-card-category">{{ $post->category }}</span>
                                    @endif
                                </div>
                                <div class="blog-card-body">
                                    <div class="blog-card-meta d-flex align-items-center gap-3 mb-2">
                                        @if ($post->formatted_date)
                                            <span class="fts-12 fw-4 subtitle-text-L d-flex align-items-center gap-1">
                                                <iconify-icon icon="mdi:calendar-month-outline"></iconify-icon>
                                                {{ $post->formatted_date }}
                                            </span>
                                        @endif
                                        <span class="fts-12 fw-4 subtitle-text-L d-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:clock-outline"></iconify-icon>
                                            {{ $post->reading_time }} min read
                                        </span>
                                    </div>
                                    <h4 class="blog-card-title fts-18 fw-6 title-text-L">{{ $post->title }}</h4>
                                    @if ($post->excerpt)
                                        <p class="blog-card-excerpt fts-14 fw-4 subtitle-text-L mt-2">{{ $post->excerpt }}</p>
                                    @endif
                                    <span class="blog-read-more fts-14 fw-5 primary-color-L d-flex align-items-center gap-1 mt-3">
                                        Read Article <iconify-icon icon="mdi:arrow-right"></iconify-icon>
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- pagination --}}
                @if ($posts->hasPages())
                    <div class="blog-pagination d-flex justify-content-center mt-5 wow fadeIn">
                        {{ $posts->links('frontend.blog._pagination') }}
                    </div>
                @endif

            @else
                <div class="text-center py-5">
                    <iconify-icon icon="ph:article" style="font-size: 48px; color: var(--primary-light-color);"></iconify-icon>
                    <p class="fts-16 fw-4 subtitle-text-L mt-3">
                        @if ($activeCategory)
                            No posts in <strong>{{ $activeCategory }}</strong> yet. <a href="{{ route('blog.index') }}" class="primary-color-L text-decoration-underline">View all posts</a>
                        @else
                            No blog posts yet &mdash; check back soon.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- cta banner --}}
    <section class="py-4 py-lg-5">
        <div class="container">
            <div class="product-cta-banner p-4 p-md-5">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h6 class="common-icon-title fts-14 mx-auto mx-lg-0 wow fadeInUp"><iconify-icon icon="ph:flower-tulip-bold"></iconify-icon>Get in Touch</h6>
                        <h3 class="fts-28 fw-5 white-color-L mt-2 mt-lg-3 wow fadeInUp">Interested in our psyllium products? Let&rsquo;s talk.</h3>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}#get-in-touch" class="common-bg-btn bg-white fts-14 d-inline-flex wow fadeInUp">Request a Quote <img src="{{ asset('assets/frontend/images/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
