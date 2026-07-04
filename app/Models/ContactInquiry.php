<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactInquiry extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'product_interest',
        'message',
        'email_sent',
        'source',
    ];

    protected $casts = [
        'email_sent' => 'boolean',
    ];

    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('created_at');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(InquiryReply::class)->latest();
    }
}
