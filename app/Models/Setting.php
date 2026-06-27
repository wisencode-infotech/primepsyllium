<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    public const DEFAULT_PRIMARY_COLOR = '#17494b';

    public const DEFAULT_SECONDARY_COLOR = '#496727';

    public const DEFAULT_PRIMARY_LIGHT_COLOR = '#a3c1b5';

    protected $fillable = [
        'phone',
        'email',
        'address',
        'logo',
        'global_presence_image',
        'favicon',
        'primary_color',
        'secondary_color',
        'primary_light_color',
    ];

    protected $appends = [
        'logo_url',
        'global_presence_image_url',
        'favicon_url',
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

    public function getFaviconUrlAttribute(): ?string
    {
        return $this->favicon ? Storage::disk('public')->url($this->favicon) : null;
    }

    public function getPrimaryColorAttribute(?string $value): string
    {
        return $value ?: self::DEFAULT_PRIMARY_COLOR;
    }

    public function getSecondaryColorAttribute(?string $value): string
    {
        return $value ?: self::DEFAULT_SECONDARY_COLOR;
    }

    public function getPrimaryLightColorAttribute(?string $value): string
    {
        return $value ?: self::DEFAULT_PRIMARY_LIGHT_COLOR;
    }

    /**
     * The CSS custom property overrides used to theme the public site.
     *
     * @return array<string, string>
     */
    public function themeVariables(): array
    {
        return [
            '--primary-color' => $this->primary_color,
            '--secondary-color' => $this->secondary_color,
            '--primary-light-color' => $this->primary_light_color,
        ];
    }
}
