<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'product_interest',
        'message',
        'email_sent',
    ];

    protected $casts = [
        'email_sent' => 'boolean',
    ];

    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('created_at');
    }
}
