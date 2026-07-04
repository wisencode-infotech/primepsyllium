<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class KnowledgeDocument extends Model
{
    protected $fillable = [
        'title',
        'original_filename',
        'disk',
        'path',
        'mime_type',
        'size',
        'status',
        'synced_at',
        'error_message',
        'uploaded_by',
    ];

    protected $casts = [
        'synced_at' => 'datetime',
        'size' => 'integer',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderByDesc('created_at');
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->path ? Storage::disk($this->disk)->url($this->path) : null;
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
