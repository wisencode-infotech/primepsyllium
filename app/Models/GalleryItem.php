<?php

namespace App\Models;

use App\Services\GalleryThumbnailer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class GalleryItem extends Model
{
    protected $fillable = [
        'title',
        'gallery_category_id',
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
