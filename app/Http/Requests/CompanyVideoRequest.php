<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyVideoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_video_title' => ['nullable', 'string', 'max:255'],
            'company_video' => ['nullable', 'mimes:mp4,mov,webm,ogg'],
            'company_video_thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
    }
}
