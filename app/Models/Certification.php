<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Certification extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'sort_order',
        'is_active',
        'show_on_home',
    ];

    protected $casts = [
        'is_active'    => 'boolean',
        'show_on_home' => 'boolean',
        'sort_order'   => 'integer',
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

    public function scopeOnHome($query)
    {
        return $query->where('show_on_home', true);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->logo ? Storage::disk('public')->url($this->logo) : null;
    }
}
