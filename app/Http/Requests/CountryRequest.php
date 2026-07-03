<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isCreating = $this->route('country') === null;

        return [
            'name' => ['required', 'string', 'max:255'],
            'flag' => [$isCreating ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['boolean'],
            'show_in_footer' => ['boolean'],
            'has_page' => ['boolean'],
            'cities' => ['nullable', 'string'],
            'intro_content' => ['nullable', 'string'],
            'market_demand_content' => ['nullable', 'string'],
            'export_capability_content' => ['nullable', 'string'],
            'quality_standards_content' => ['nullable', 'string'],
            'export_logistics_content' => ['nullable', 'string'],
            'faqs' => ['nullable', 'array'],
            'faqs.*.question' => ['nullable', 'string'],
            'faqs.*.answer' => ['nullable', 'string'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
        ];
    }
}
