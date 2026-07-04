<?php

namespace App\Http\Controllers;

use App\Exceptions\ChatGatewayException;
use App\Http\Requests\ChatMessageRequest;
use App\Models\ChatConversation;
use App\Models\ChatMessage;
use App\Services\ChatGatewayClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    private const HISTORY_TURNS = 6;

    public function send(ChatMessageRequest $request, ChatGatewayClient $gateway): JsonResponse
    {
        $sessionId = $request->string('session_id')->value() ?: (string) Str::uuid();

        $conversation = ChatConversation::firstOrCreate(
            ['session_id' => $sessionId],
            [
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]
        );

        $history = $conversation->messages()
            ->latest()
            ->limit(self::HISTORY_TURNS)
            ->get()
            ->reverse()
            ->map(fn (ChatMessage $message) => [
                'role' => $message->role,
                'content' => $message->content,
            ])
            ->values()
            ->all();

        $conversation->messages()->create([
            'role' => 'user',
            'content' => $request->string('message')->value(),
        ]);

        try {
            $result = $gateway->chat([
                'session_id' => $sessionId,
                'message' => $request->string('message')->value(),
                'history' => $history,
            ]);
        } catch (ChatGatewayException $e) {
            Log::error('Chat gateway request failed: '.$e->getMessage());

            $result = [
                'answer' => "I'm having trouble reaching our assistant right now — please try again shortly, or reach out through our contact form.",
                'sources' => [],
                'suggested_follow_ups' => [],
                'escalate' => true,
                'cache_hit' => 'none',
                'confidence' => 0,
            ];
        }

        $conversation->messages()->create([
            'role' => 'assistant',
            'content' => $result['answer'] ?? '',
            'sources' => $result['sources'] ?? [],
            'cache_hit' => $result['cache_hit'] ?? null,
            'meta' => ['confidence' => $result['confidence'] ?? null],
        ]);

        return response()->json([
            'session_id' => $sessionId,
            'answer' => $result['answer'] ?? '',
            'sources' => $result['sources'] ?? [],
            'suggested_follow_ups' => $result['suggested_follow_ups'] ?? [],
            'escalate' => $result['escalate'] ?? false,
        ]);
    }
}
