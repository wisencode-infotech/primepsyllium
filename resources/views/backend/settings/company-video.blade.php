<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Company Video
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        @if (session('status'))
            <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-md text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.company-video.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
                <h3 class="font-semibold text-text mb-1">Homepage Company Video</h3>
                <p class="text-sm text-text-muted mb-4">Shown on the homepage between the "About Us" and "Products" sections, with a poster image and a play button that opens the video in a lightbox.</p>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <x-video-upload name="company_video" label="Video File" :value="$setting->company_video_url" />
                        <x-input-error class="mt-2" :messages="$errors->get('company_video')" />
                    </div>

                    <div>
                        <x-image-upload name="company_video_thumbnail" label="Poster / Thumbnail Image" :value="$setting->company_video_thumbnail_url" hint="PNG, JPG or WEBP" />
                        <p class="mt-1 text-xs text-text-muted">Shown before the video plays. Falls back to the video's first frame if left blank.</p>
                        <x-input-error class="mt-2" :messages="$errors->get('company_video_thumbnail')" />
                    </div>
                </div>

                <div class="mt-4">
                    <x-input-label for="company_video_title" value="Caption (optional)" />
                    <x-text-input id="company_video_title" name="company_video_title" type="text" class="mt-1 block w-full" :value="old('company_video_title', $setting->company_video_title)" placeholder="See how we process our psyllium" />
                    <x-input-error class="mt-2" :messages="$errors->get('company_video_title')" />
                </div>

                <p class="mt-4 text-xs text-text-muted">The video section only appears on the homepage once a video file has been uploaded here. Large files may take a while to upload depending on your connection.</p>
            </div>

            <div>
                <x-primary-button>Save Video</x-primary-button>
            </div>
        </form>
    </div>
</x-backend-layout>
