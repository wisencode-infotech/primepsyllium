<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    public function rules(): array
    {
        $isCreating = $this->route('blog') === null;

        return [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'featured_image' => [$isCreating ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'published_at' => ['nullable', 'date'],
            'is_active' => ['boolean'],
            'attachments' => ['nullable', 'array'],
            'attachments.*' => ['file', 'mimes:jpeg,png,jpg,webp,pdf,doc,docx,xls,xlsx,csv,zip', 'max:10240'],
        ];
    }
}
