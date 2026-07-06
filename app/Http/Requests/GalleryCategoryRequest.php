<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GalleryCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categoryId = $this->route('gallery_category')?->id;

        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('gallery_categories', 'name')->ignore($categoryId)],
        ];
    }
}
