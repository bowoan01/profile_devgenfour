<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoMetadataRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        if ($this->has('extras') && blank($this->input('extras'))) {
            $this->merge(['extras' => null]);
        }
    }

    public function authorize(): bool
    {
        return $this->user()?->can('manage seo') ?? false;
    }

    public function rules(): array
    {
        return [
            'route_name' => ['nullable', 'string', 'max:190'],
            'seoable_type' => ['nullable', 'string', 'max:190'],
            'seoable_id' => ['nullable', 'integer'],
            'title' => ['nullable', 'string', 'max:180'],
            'description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string', 'max:255'],
            'og_image' => ['nullable', 'image', 'max:5120'],
            'extras' => ['nullable', 'json'],
        ];
    }
}
