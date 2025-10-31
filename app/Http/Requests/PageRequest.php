<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage pages') ?? false;
    }

    public function rules(): array
    {
        $page = $this->route('page');

        return [
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', Rule::unique('pages', 'slug')->ignore($page)],
            'template' => ['required', 'string', 'max:60'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'content' => ['nullable', 'string'],
            'meta' => ['nullable', 'json'],
        ];
    }
}
