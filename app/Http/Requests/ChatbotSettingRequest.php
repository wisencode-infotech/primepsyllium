<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ChatbotSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'chat_gateway_url' => ['nullable', 'url', 'max:255'],
            'chat_gateway_secret' => ['nullable', 'string', 'max:255'],
            'chat_gateway_timeout' => ['nullable', 'integer', 'min:1', 'max:120'],
        ];
    }
}
