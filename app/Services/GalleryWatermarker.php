<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Throwable;

class GalleryWatermarker
{
    // the watermark spans this fraction of the image width; thumbnails are
    // generated from the watermarked original, so the mark stays proportional
    // on the grid too
    private const WIDTH_RATIO = 0.07;

    private const MIN_WIDTH = 28;

    private const QUALITY = 85;

    // both live on the non-public "local" disk so they are never web-accessible
    private const MANIFEST = 'gallery-watermarked.json';

    private const BACKUP_DIR = 'gallery-originals';

    /**
     * Stamp the site favicon on the top-right corner of a stored gallery
     * image, saving it in place. A pristine copy of the original is kept on
     * the local disk first. Returns false if the source image or the favicon
     * is missing/unreadable — callers keep the unmarked image in that case.
     */
    public static function apply(string $storagePath): bool
    {
        $disk = Storage::disk('public');

        if (! $disk->exists($storagePath)) {
            return false;
        }

        // never stamp the same file twice — re-running the bulk command (or
        // re-saving an item) must not stack watermarks
        if (self::isWatermarked($storagePath)) {
            return true;
        }

        $faviconPath = self::faviconPath();

        if ($faviconPath === null) {
            Log::warning("GalleryWatermarker: no favicon available to watermark {$storagePath}");

            return false;
        }

        try {
            GalleryThumbnailer::withMemoryHeadroom(function () use ($disk, $storagePath, $faviconPath) {
                $manager = new ImageManager(GalleryThumbnailer::driver());
                $image = $manager->read($disk->path($storagePath));

                $mark = $manager->read($faviconPath);
                $markWidth = max(self::MIN_WIDTH, (int) round($image->width() * self::WIDTH_RATIO));
                $mark->scale(width: $markWidth);

                $padding = (int) round($markWidth * 0.3);

                self::backupOriginal($storagePath);

                $image->place($mark, 'top-right', $padding, $padding);
                $image->save($disk->path($storagePath), quality: self::QUALITY);
            });

            self::markWatermarked($storagePath);
        } catch (Throwable $e) {
            Log::warning("GalleryWatermarker: failed to watermark {$storagePath}: {$e->getMessage()}");

            return false;
        }

        return true;
    }

    public static function isWatermarked(string $storagePath): bool
    {
        return in_array($storagePath, self::manifest(), true);
    }

    /**
     * The uploaded favicon from site settings, falling back to the bundled
     * frontend favicon, as an absolute filesystem path.
     */
    private static function faviconPath(): ?string
    {
        $favicon = Setting::current()->favicon;

        if ($favicon && Storage::disk('public')->exists($favicon)) {
            return Storage::disk('public')->path($favicon);
        }

        $fallback = public_path('assets/frontend/icons/favicon.png');

        return is_file($fallback) ? $fallback : null;
    }

    private static function backupOriginal(string $storagePath): void
    {
        $backupPath = self::BACKUP_DIR.'/'.basename($storagePath);
        $local = Storage::disk('local');

        if (! $local->exists($backupPath)) {
            $local->writeStream($backupPath, Storage::disk('public')->readStream($storagePath));
        }
    }

    private static function markWatermarked(string $storagePath): void
    {
        $paths = self::manifest();
        $paths[] = $storagePath;

        Storage::disk('local')->put(
            self::MANIFEST,
            json_encode(array_values(array_unique($paths)), JSON_PRETTY_PRINT)
        );
    }

    private static function manifest(): array
    {
        $disk = Storage::disk('local');

        if (! $disk->exists(self::MANIFEST)) {
            return [];
        }

        return json_decode($disk->get(self::MANIFEST), true) ?: [];
    }
}
