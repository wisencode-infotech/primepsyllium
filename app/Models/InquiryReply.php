<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InquiryReply extends Model
{
    protected $fillable = [
        'contact_inquiry_id',
        'user_id',
        'message',
    ];

    public function inquiry(): BelongsTo
    {
        return $this->belongsTo(ContactInquiry::class, 'contact_inquiry_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(InquiryReplyAttachment::class);
    }
}
