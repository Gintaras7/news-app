<?php

declare(strict_types=1);

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|min:1000',
            'content' => 'required|string',
        ];
    }
}
