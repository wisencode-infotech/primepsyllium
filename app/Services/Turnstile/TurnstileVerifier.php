<?php

namespace App\Services\Turnstile;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class TurnstileVerifier
{
    private const VERIFY_URL = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

    /**
     * Verify a Cloudflare Turnstile response token with Cloudflare's siteverify endpoint.
     */
    public function verify(?string $token, ?string $ip = null): bool
    {
        if (blank($token)) {
            return false;
        }

        $secret = config('services.turnstile.secret_key');

        if (blank($secret)) {
            Log::error('Turnstile secret key is not configured.');

            return false;
        }

        try {
            $response = Http::asForm()
                ->timeout(10)
                ->post(self::VERIFY_URL, array_filter([
                    'secret' => $secret,
                    'response' => $token,
                    'remoteip' => $ip,
                ]));
        } catch (Throwable $e) {
            Log::warning('Turnstile verification request failed.', ['exception' => $e->getMessage()]);

            return false;
        }

        if (! $response->successful()) {
            Log::warning('Turnstile verification returned a non-successful HTTP status.', [
                'status' => $response->status(),
            ]);

            return false;
        }

        $result = $response->json();

        if (! ($result['success'] ?? false)) {
            Log::info('Turnstile verification failed.', [
                'error-codes' => $result['error-codes'] ?? [],
            ]);

            return false;
        }

        return true;
    }
}
