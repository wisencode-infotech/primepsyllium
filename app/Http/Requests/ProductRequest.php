<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isCreating = $this->route('product') === null;

        return [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:psyllium,other'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => [$isCreating ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg'],
            'is_active' => ['boolean'],
        ];
    }
}
