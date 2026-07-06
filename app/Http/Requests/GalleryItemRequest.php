<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GalleryItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isCreating = $this->route('gallery') === null;
        $isVideo = $this->input('type') === 'video';

        return [
            'title' => ['nullable', 'string', 'max:255'],
            'gallery_category_id' => ['required', 'exists:gallery_categories,id'],
            'type' => ['required', 'in:image,video'],
            'image' => [$isCreating && ! $isVideo ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'video' => [$isCreating && $isVideo ? 'required' : 'nullable', 'mimes:mp4,mov,webm,ogg'],
            'video_thumbnail' => [$isCreating && $isVideo ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'is_active' => ['boolean'],
        ];
    }
}
