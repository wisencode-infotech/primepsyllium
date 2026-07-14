<?php

namespace App\Models;

use App\Services\GalleryThumbnailer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class GalleryItem extends Model
{
    /**
     * Items dated before this year — and items with no memory date at all —
     * are grouped under the "Before {year}" filter on the public gallery.
     */
    public const LEGACY_CUTOFF_YEAR = 2026;

    protected $fillable = [
        'title',
        'gallery_category_id',
        'memory_date',
        'type',
        'image',
        'video',
        'video_thumbnail',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'memory_date' => 'date',
    ];

    protected $appends = [
        'image_url',
        'video_url',
        'video_thumbnail_url',
        'image_thumb_url',
        'video_thumbnail_thumb_url',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    public function scopeCategory($query, ?int $categoryId)
    {
        return $query->when($categoryId, fn ($q) => $q->where('gallery_category_id', $categoryId));
    }

    /**
     * Filter by a memory period key: "before" (no date, or dated before the
     * legacy cutoff year) or a month key like "2026-05". Null means no filter.
     */
    public function scopeMemoryPeriod($query, ?string $period)
    {
        if (! $period) {
            return $query;
        }

        if ($period === 'before') {
            return $query->where(fn ($q) => $q
                ->whereNull('memory_date')
                ->orWhereDate('memory_date', '<', self::LEGACY_CUTOFF_YEAR.'-01-01'));
        }

        if (preg_match('/^(\d{4})-(\d{2})$/', $period, $matches)) {
            return $query
                ->whereYear('memory_date', (int) $matches[1])
                ->whereMonth('memory_date', (int) $matches[2]);
        }

        return $query;
    }

    public static function legacyPeriodLabel(): string
    {
        return 'Before '.self::LEGACY_CUTOFF_YEAR;
    }

    /**
     * The memory period filters available on the public gallery: "Before 2026"
     * (shown when legacy/undated items exist) followed by one entry per month
     * that has dated items, oldest first — e.g. May 2026, June 2026, ...
     *
     * @return array<int, array{key: string, label: string}>
     */
    public static function memoryPeriods(): array
    {
        $periods = [];

        $hasLegacyItems = self::query()
            ->active()
            ->where(fn ($q) => $q
                ->whereNull('memory_date')
                ->orWhereDate('memory_date', '<', self::LEGACY_CUTOFF_YEAR.'-01-01'))
            ->exists();

        if ($hasLegacyItems) {
            $periods[] = ['key' => 'before', 'label' => self::legacyPeriodLabel()];
        }

        $months = self::query()
            ->active()
            ->whereDate('memory_date', '>=', self::LEGACY_CUTOFF_YEAR.'-01-01')
            ->pluck('memory_date')
            ->map(fn ($date) => $date->format('Y-m'))
            ->unique()
            ->sort()
            ->values();

        foreach ($months as $month) {
            $periods[] = [
                'key' => $month,
                'label' => Carbon::createFromFormat('Y-m', $month)->format('F Y'),
            ];
        }

        return $periods;
    }

    public function getMemoryDateLabelAttribute(): ?string
    {
        return $this->memory_date?->format('j M Y');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
    }

    public function getVideoUrlAttribute(): ?string
    {
        return $this->video ? Storage::disk('public')->url($this->video) : null;
    }

    public function getVideoThumbnailUrlAttribute(): ?string
    {
        return $this->video_thumbnail ? Storage::disk('public')->url($this->video_thumbnail) : null;
    }

    /**
     * Resized/compressed version of the image for the gallery grid. Falls back
     * to the original if a thumbnail hasn't been generated yet.
     */
    public function getImageThumbUrlAttribute(): ?string
    {
        return $this->thumbUrlFor($this->image);
    }

    public function getVideoThumbnailThumbUrlAttribute(): ?string
    {
        return $this->thumbUrlFor($this->video_thumbnail);
    }

    private function thumbUrlFor(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        $thumbPath = GalleryThumbnailer::thumbPath($path);

        return Storage::disk('public')->exists($thumbPath)
            ? Storage::disk('public')->url($thumbPath)
            : Storage::disk('public')->url($path);
    }
}
