<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Country extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'flag',
        'banner_image',
        'cities',
        'intro_content',
        'market_demand_content',
        'export_capability_content',
        'quality_standards_content',
        'export_logistics_content',
        'faqs',
        'seo_title',
        'seo_description',
        'sort_order',
        'is_active',
        'show_in_footer',
        'has_page',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'show_in_footer' => 'boolean',
        'has_page' => 'boolean',
        'cities' => 'array',
        'faqs' => 'array',
    ];

    protected $appends = [
        'image_url',
        'banner_image_url',
        'url',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeInFooter($query)
    {
        return $query->where('show_in_footer', true);
    }

    public function scopeWithPage($query)
    {
        return $query->where('has_page', true);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->flag ? Storage::disk('public')->url($this->flag) : null;
    }

    public function getBannerImageUrlAttribute(): ?string
    {
        return $this->banner_image ? Storage::disk('public')->url($this->banner_image) : null;
    }

    public function getUrlAttribute(): ?string
    {
        return $this->slug ? url($this->slug) : null;
    }
}
