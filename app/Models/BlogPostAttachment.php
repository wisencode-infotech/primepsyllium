<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class BlogPostAttachment extends Model
{
    protected $fillable = [
        'blog_post_id',
        'original_name',
        'path',
        'mime_type',
        'size',
    ];

    protected $casts = [
        'size' => 'integer',
    ];

    protected $appends = ['url', 'formatted_size', 'icon'];

    public function blogPost(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class);
    }

    public function getUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->path);
    }

    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->size;
        if ($bytes >= 1048576) return round($bytes / 1048576, 1).' MB';
        if ($bytes >= 1024) return round($bytes / 1024, 1).' KB';
        return $bytes.' B';
    }

    public function getIconAttribute(): string
    {
        return match (true) {
            str_starts_with($this->mime_type ?? '', 'image/') => 'ph:image',
            in_array($this->mime_type, ['application/pdf']) => 'ph:file-pdf',
            in_array($this->mime_type, ['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']) => 'ph:file-doc',
            in_array($this->mime_type, ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']) => 'ph:file-xls',
            default => 'ph:file',
        };
    }
}
