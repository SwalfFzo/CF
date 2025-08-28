<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
{
    // السماح باستخدام هذا الـRequest (true للجميع)
    public function authorize(): bool
    {
        return true;
    }

    // القواعد
    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255'],
            'excerpt'      => ['nullable', 'string', 'max:500'],
            'content'      => ['nullable', 'string'],
            'status'       => ['required', Rule::in(['Draft', 'Published'])],
            'published_at' => ['nullable', 'date'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
