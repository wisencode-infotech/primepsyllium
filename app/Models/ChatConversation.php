<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatConversation extends Model
{
    protected $fillable = [
        'session_id',
        'ip_address',
        'user_agent',
        'escalated',
        'escalated_contact_inquiry_id',
    ];

    protected $casts = [
        'escalated' => 'boolean',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class)->orderBy('created_at');
    }

    public function contactInquiry(): BelongsTo
    {
        return $this->belongsTo(ContactInquiry::class, 'escalated_contact_inquiry_id');
    }
}
