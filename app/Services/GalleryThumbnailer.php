<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;
use Intervention\Image\Interfaces\DriverInterface;
use Intervention\Image\ImageManager;
use RuntimeException;
use Throwable;

class GalleryThumbnailer
{
    // grid tiles never render wider than ~350px; 900px covers retina without
    // shipping the multi-MB originals straight to the browser
    private const MAX_WIDTH = 900;

    private const QUALITY = 75;

    /**
     * Generate (or refresh) the thumbnail for a stored gallery image and
     * return its storage path, or null if the source file is missing/unreadable.
     */
    public static function generate(string $storagePath): ?string
    {
        $disk = Storage::disk('public');

        if (! $disk->exists($storagePath)) {
            return null;
        }

        $thumbPath = self::thumbPath($storagePath);

        try {
            $manager = new ImageManager(self::driver());
            $image = $manager->read($disk->path($storagePath));
            $image->scaleDown(width: self::MAX_WIDTH);

            $disk->makeDirectory(dirname($thumbPath));
            $image->save($disk->path($thumbPath), quality: self::QUALITY);
        } catch (Throwable $e) {
            Log::warning("GalleryThumbnailer: failed to generate thumbnail for {$storagePath}: {$e->getMessage()}");

            return null;
        }

        return $thumbPath;
    }

    public static function thumbPath(string $storagePath): string
    {
        return 'gallery/thumbs/'.basename($storagePath);
    }

    /**
     * Some hosts only enable one of GD / Imagick (or neither) depending on
     * the PHP handler in use, independently of what's available locally.
     */
    private static function driver(): DriverInterface
    {
        if (extension_loaded('gd')) {
            return new GdDriver();
        }

        if (extension_loaded('imagick')) {
            return new ImagickDriver();
        }

        throw new RuntimeException('Neither the GD nor Imagick PHP extension is enabled — ask your host to enable one.');
    }

    public static function delete(string $storagePath): void
    {
        Storage::disk('public')->delete(self::thumbPath($storagePath));
    }
}
