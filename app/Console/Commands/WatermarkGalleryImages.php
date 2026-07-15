<?php

namespace App\Console\Commands;

use App\Models\GalleryItem;
use App\Services\GalleryThumbnailer;
use App\Services\GalleryWatermarker;
use Illuminate\Console\Command;

class WatermarkGalleryImages extends Command
{
    protected $signature = 'gallery:watermark {--path=* : Only process these storage paths (e.g. gallery/abc.jpg)}';

    protected $description = 'Stamp the site favicon on gallery images and video posters that are not watermarked yet, then refresh their thumbnails';

    public function handle(): int
    {
        $only = $this->option('path');

        $paths = GalleryItem::query()
            ->get(['image', 'video_thumbnail'])
            ->flatMap(fn (GalleryItem $item) => [$item->image, $item->video_thumbnail])
            ->filter()
            ->unique()
            ->when($only, fn ($paths) => $paths->intersect($only))
            ->values();

        $pending = $paths->reject(fn (string $path) => GalleryWatermarker::isWatermarked($path));

        if ($pending->isEmpty()) {
            $this->info('Nothing to do — every matching gallery image is already watermarked.');

            return self::SUCCESS;
        }

        $this->info("Watermarking {$pending->count()} file(s)... pristine originals are kept in storage/app/private/gallery-originals.");
        $bar = $this->output->createProgressBar($pending->count());
        $failed = [];

        foreach ($pending as $path) {
            if (GalleryWatermarker::apply($path)) {
                // rebuild the thumbnail from the now-watermarked original
                GalleryThumbnailer::generate($path);
            } else {
                $failed[] = $path;
            }
            $bar->advance();
            // large GD bitmaps can linger between iterations; without this a
            // long run slowly accumulates memory and eventually hits the limit
            gc_collect_cycles();
        }
        $bar->finish();
        $this->newLine();

        if ($failed) {
            $this->warn(count($failed).' file(s) failed (missing or unreadable) — see log for details:');
            foreach ($failed as $path) {
                $this->line(" - {$path}");
            }
        }

        $this->info('Done.');

        return self::SUCCESS;
    }
}
