<?php

namespace App\Models;

use App\Models\Concerns\HasRichContent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MediaCenterItem extends Model
{
    use HasRichContent;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'event_date',
        'image',
        'link',
        'sort_order',
        'is_active',
        'show_on_homepage',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_active' => 'boolean',
        'show_on_homepage' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $appends = [
        'image_url',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeOnHomepage($query)
    {
        return $query->where('show_on_homepage', true);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
    }

    public function getFormattedDateAttribute(): ?string
    {
        return $this->event_date?->format('F j, Y');
    }
}
