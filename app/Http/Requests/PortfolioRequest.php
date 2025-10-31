<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage portfolios') ?? false;
    }

    public function rules(): array
    {
        $portfolio = $this->route('portfolio');

        return [
            'title' => ['required', 'string', 'max:160'],
            'slug' => ['nullable', 'string', 'max:160', Rule::unique('portfolios', 'slug')->ignore($portfolio)],
            'client_name' => ['nullable', 'string', 'max:160'],
            'project_date' => ['nullable', 'date'],
            'featured_image' => ['nullable', 'image', 'max:5120'],
            'location' => ['nullable', 'string', 'max:160'],
            'industry' => ['nullable', 'string', 'max:160'],
            'summary' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'is_featured' => ['boolean'],
            'is_published' => ['boolean'],
            'service_ids' => ['nullable', 'array'],
            'service_ids.*' => ['exists:services,id'],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'max:5120'],
        ];
    }
}
