<?php

namespace App\Http\Requests;

use App\Rules\Turnstile;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactInquiryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'product_interest' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'source' => ['nullable', 'string', 'in:website_form,chatbot'],
            'session_id' => ['nullable', 'string', 'max:255'],
            'cf-turnstile-response' => ['required', 'string', new Turnstile()],
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'cf-turnstile-response' => 'security check',
        ];
    }
}
