<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage blog') ?? false;
    }

    public function rules(): array
    {
        $post = $this->route('blog_post');

        return [
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', Rule::unique('blog_posts', 'slug')->ignore($post)],
            'thumbnail' => ['nullable', 'image', 'max:5120'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ];
    }
}
