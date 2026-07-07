<?php

namespace App\Console\Commands;

use App\Models\GalleryItem;
use App\Services\GalleryThumbnailer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateGalleryThumbnails extends Command
{
    protected $signature = 'gallery:generate-thumbnails {--force : Regenerate thumbnails that already exist}';

    protected $description = 'Generate resized/compressed thumbnails for gallery images and video posters that are missing one';

    public function handle(): int
    {
        $force = $this->option('force');
        $disk = Storage::disk('public');

        $paths = GalleryItem::query()
            ->get(['image', 'video_thumbnail'])
            ->flatMap(fn (GalleryItem $item) => [$item->image, $item->video_thumbnail])
            ->filter()
            ->unique()
            ->values();

        $pending = $force
            ? $paths
            : $paths->reject(fn (string $path) => $disk->exists(GalleryThumbnailer::thumbPath($path)));

        if ($pending->isEmpty()) {
            $this->info('Nothing to do — every gallery image already has a thumbnail.');

            return self::SUCCESS;
        }

        $this->info("Generating thumbnails for {$pending->count()} file(s)...");
        $bar = $this->output->createProgressBar($pending->count());
        $failed = [];

        foreach ($pending as $path) {
            if (GalleryThumbnailer::generate($path) === null) {
                $failed[] = $path;
            }
            $bar->advance();
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
