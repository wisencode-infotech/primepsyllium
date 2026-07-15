<?php

namespace App\Models;

use App\Casts\SafeEncrypted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    public const DEFAULT_PRIMARY_COLOR = '#17494b';

    public const DEFAULT_SECONDARY_COLOR = '#496727';

    public const DEFAULT_PRIMARY_LIGHT_COLOR = '#a3c1b5';

    public const DEFAULT_EMAIL_SECONDARY_COLOR = '#2e5557';

    public const DEFAULT_EMAIL_TEXT_COLOR = '#2F2724';

    public const DEFAULT_EMAIL_BACKGROUND_COLOR = '#F7F2F0';

    public const DEFAULT_EMAIL_BUTTON_TEXT_COLOR = '#FFFFFF';

    protected $fillable = [
        'phone',
        'email',
        'address',
        'logo',
        'global_presence_image',
        'company_video',
        'company_video_thumbnail',
        'company_video_title',
        'favicon',
        'facebook_url',
        'instagram_url',
        'whatsapp_url',
        'twitter_url',
        'linkedin_url',
        'teams_url',
        'primary_color',
        'secondary_color',
        'primary_light_color',
        'email_brand_name',
        'email_website_url',
        'email_logo',
        'email_primary_color',
        'email_secondary_color',
        'email_accent_color',
        'email_text_color',
        'email_background_color',
        'email_button_color',
        'email_button_text_color',
        'chat_gateway_url',
        'chat_gateway_secret',
        'chat_gateway_timeout',
        'default_gallery_category_id',
    ];

    protected $casts = [
        'chat_gateway_secret' => SafeEncrypted::class,
        'default_gallery_category_id' => 'integer',
    ];

    protected $hidden = [
        'chat_gateway_secret',
    ];

    protected $appends = [
        'logo_url',
        'global_presence_image_url',
        'company_video_url',
        'company_video_thumbnail_url',
        'favicon_url',
        'email_logo_url',
    ];

    public static function current(): self
    {
        return static::query()->first() ?? new static();
    }

    public function defaultGalleryCategory(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'default_gallery_category_id');
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? Storage::disk('public')->url($this->logo) : null;
    }

    public function getGlobalPresenceImageUrlAttribute(): ?string
    {
        return $this->global_presence_image ? Storage::disk('public')->url($this->global_presence_image) : null;
    }

    public function getCompanyVideoUrlAttribute(): ?string
    {
        return $this->company_video ? Storage::disk('public')->url($this->company_video) : null;
    }

    public function getCompanyVideoThumbnailUrlAttribute(): ?string
    {
        return $this->company_video_thumbnail ? Storage::disk('public')->url($this->company_video_thumbnail) : null;
    }

    public function getFaviconUrlAttribute(): ?string
    {
        return $this->favicon ? Storage::disk('public')->url($this->favicon) : null;
    }

    public function getEmailLogoUrlAttribute(): ?string
    {
        return $this->email_logo ? Storage::disk('public')->url($this->email_logo) : $this->logo_url;
    }

    public function getEmailBrandNameAttribute(?string $value): string
    {
        return $value ?: config('app.name');
    }

    public function getEmailWebsiteUrlAttribute(?string $value): string
    {
        return $value ?: config('app.url');
    }

    public function getEmailPrimaryColorAttribute(?string $value): string
    {
        return $value ?: $this->primary_color;
    }

    public function getEmailSecondaryColorAttribute(?string $value): string
    {
        return $value ?: self::DEFAULT_EMAIL_SECONDARY_COLOR;
    }

    public function getEmailAccentColorAttribute(?string $value): string
    {
        return $value ?: $this->primary_light_color;
    }

    public function getEmailTextColorAttribute(?string $value): string
    {
        return $value ?: self::DEFAULT_EMAIL_TEXT_COLOR;
    }

    public function getEmailBackgroundColorAttribute(?string $value): string
    {
        return $value ?: self::DEFAULT_EMAIL_BACKGROUND_COLOR;
    }

    public function getEmailButtonColorAttribute(?string $value): string
    {
        return $value ?: $this->primary_color;
    }

    public function getEmailButtonTextColorAttribute(?string $value): string
    {
        return $value ?: self::DEFAULT_EMAIL_BUTTON_TEXT_COLOR;
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
     * The configured social media links, keyed by platform, excluding any that are empty.
     *
     * @return array<string, array{label: string, icon: string, class: string, url: string}>
     */
    public function socialLinks(): array
    {
        return array_filter([
            'facebook' => ['label' => 'Facebook', 'icon' => 'ri:facebook-fill', 'class' => 'fb', 'url' => $this->facebook_url],
            'instagram' => ['label' => 'Instagram', 'icon' => 'ri:instagram-line', 'class' => 'insta', 'url' => $this->instagram_url],
            'whatsapp' => ['label' => 'WhatsApp', 'icon' => 'mingcute:whatsapp-fill', 'class' => 'lnk', 'url' => $this->whatsapp_url],
            'twitter' => ['label' => 'Twitter', 'icon' => 'bxl:twitter-x', 'class' => 'twi', 'url' => $this->twitter_url],
            'linkedin' => ['label' => 'LinkedIn', 'icon' => 'flowbite:linkedin-solid', 'class' => 'lnk', 'url' => $this->linkedin_url],
            'teams' => ['label' => 'Teams', 'icon' => 'bi:microsoft-teams', 'class' => 'lnk', 'url' => $this->teams_url],
        ], fn (array $link): bool => filled($link['url']));
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
