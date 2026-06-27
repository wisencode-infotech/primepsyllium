<x-frontend-layout>

    @if ($event->image_url)
        <div class="d-flex align-items-center justify-content-center" style="background: #f4f2ec; min-height: 220px; max-height: 380px; overflow: hidden;">
            <img src="{{ $event->image_url }}" alt="{{ $event->title }}" style="max-width: 90%; max-height: 340px; width: auto; height: auto; object-fit: contain;" class="py-4">
        </div>
    @endif

    <section class="py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <h1 class="fts-46 fw-5 title-text-L">{{ $event->title }}</h1>

                    @if ($event->formatted_date)
                        <p class="fts-14 fw-5 primary-light-color-L mt-2">{{ $event->formatted_date }}</p>
                    @endif

                    @if ($event->description)
                        <p class="fts-16 fw-5 title-text-L mt-3">{{ $event->description }}</p>
                    @endif

                    @if ($event->content)
                        <div class="fts-15 fw-4 subtitle-text-L mt-3">
                            {!! $event->content !!}
                        </div>
                    @endif

                    @if ($previous || $next)
                        <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top flex-wrap gap-2">
                            <div>
                                @if ($previous)
                                    <a href="{{ route('events.show', $previous) }}" class="secondary-more fts-14 fw-5">&larr; {{ $previous->title }}</a>
                                @endif
                            </div>
                            <div class="text-end">
                                @if ($next)
                                    <a href="{{ route('events.show', $next) }}" class="secondary-more fts-14 fw-5">{{ $next->title }} &rarr;</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="common-border-btn fts-14">&larr; Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
