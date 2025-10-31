<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage messages') ?? false;
    }

    public function rules(): array
    {
        return [
            'is_read' => ['required', 'boolean'],
        ];
    }
}
