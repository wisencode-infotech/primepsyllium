<?php

namespace App\Rules;

use App\Services\Turnstile\TurnstileVerifier;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Turnstile implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $verified = app(TurnstileVerifier::class)->verify(
            is_string($value) ? $value : null,
            request()->ip()
        );

        if (! $verified) {
            $fail('Please complete the security check before submitting the form.');
        }
    }
}
