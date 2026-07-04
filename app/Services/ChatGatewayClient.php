<?php

namespace App\Services;

use App\Exceptions\ChatGatewayException;
use App\Models\Setting;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class ChatGatewayClient
{
    public function chat(array $payload): array
    {
        return $this->post('/chat', $payload);
    }

    public function ingest(array $payload): array
    {
        return $this->post('/ingest', $payload);
    }

    public function purgeCache(): array
    {
        return $this->post('/cache/purge', []);
    }

    /**
     * Admin-configured values (Settings > AI Chatbot) take priority over
     * .env, so the client can rotate the Worker URL/secret without needing
     * a code deploy. Falls back to .env for backward compatibility.
     */
    private function resolveConfig(): array
    {
        $setting = Setting::current();

        return [
            'url' => $setting->chat_gateway_url ?: config('services.chat_gateway.url'),
            'secret' => $setting->chat_gateway_secret ?: config('services.chat_gateway.secret'),
            'timeout' => $setting->chat_gateway_timeout ?: config('services.chat_gateway.timeout'),
        ];
    }

    private function post(string $path, array $payload): array
    {
        $config = $this->resolveConfig();

        if (! $config['url']) {
            throw new ChatGatewayException('Chat gateway URL is not configured. Set it under Settings > AI Chatbot.');
        }

        try {
            $response = Http::withHeaders(['X-Gateway-Secret' => $config['secret']])
                ->timeout((int) $config['timeout'])
                ->post(rtrim($config['url'], '/').$path, $payload);
        } catch (ConnectionException $e) {
            throw new ChatGatewayException("Chat gateway request to {$path} could not connect: ".$e->getMessage());
        }

        if ($response->failed()) {
            throw new ChatGatewayException(
                "Chat gateway request to {$path} failed with status {$response->status()}: {$response->body()}"
            );
        }

        return $response->json() ?? [];
    }
}
