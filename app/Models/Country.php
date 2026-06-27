<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Country extends Model
{
    protected $fillable = [
        'name',
        'flag',
        'sort_order',
        'is_active',
        'show_in_footer',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'show_in_footer' => 'boolean',
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

    public function scopeInFooter($query)
    {
        return $query->where('show_in_footer', true);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->flag ? Storage::disk('public')->url($this->flag) : null;
    }
}
