<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EmailBrandSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email_brand_name' => ['required', 'string', 'max:255'],
            'email_website_url' => ['required', 'url', 'max:255'],
            'email_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'email_primary_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'email_secondary_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'email_accent_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'email_text_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'email_background_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'email_button_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'email_button_text_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'email_website_url.url' => 'The website URL must be a valid URL (e.g. https://example.com).',
            'email_primary_color.regex' => 'The primary color must be a valid hex color (e.g. #8C7A73).',
            'email_secondary_color.regex' => 'The secondary color must be a valid hex color (e.g. #A18D85).',
            'email_accent_color.regex' => 'The accent color must be a valid hex color (e.g. #C9A58F).',
            'email_text_color.regex' => 'The text color must be a valid hex color (e.g. #2F2724).',
            'email_background_color.regex' => 'The background color must be a valid hex color (e.g. #F7F2F0).',
            'email_button_color.regex' => 'The button color must be a valid hex color (e.g. #8C7A73).',
            'email_button_text_color.regex' => 'The button text color must be a valid hex color (e.g. #FFFFFF).',
        ];
    }
}
