<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ThemeSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'primary_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'secondary_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'primary_light_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'primary_color.regex' => 'The primary color must be a valid hex color (e.g. #17494b).',
            'secondary_color.regex' => 'The secondary color must be a valid hex color (e.g. #496727).',
            'primary_light_color.regex' => 'The primary light color must be a valid hex color (e.g. #a3c1b5).',
        ];
    }
}
