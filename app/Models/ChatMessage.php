<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    protected $fillable = [
        'chat_conversation_id',
        'role',
        'content',
        'sources',
        'cache_hit',
        'meta',
    ];

    protected $casts = [
        'sources' => 'array',
        'meta' => 'array',
    ];

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(ChatConversation::class);
    }
}
