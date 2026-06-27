<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'address',
        'logo',
        'global_presence_image',
    ];

    protected $appends = [
        'logo_url',
        'global_presence_image_url',
    ];

    public static function current(): self
    {
        return static::query()->first() ?? new static();
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? Storage::disk('public')->url($this->logo) : null;
    }

    public function getGlobalPresenceImageUrlAttribute(): ?string
    {
        return $this->global_presence_image ? Storage::disk('public')->url($this->global_presence_image) : null;
    }
}
