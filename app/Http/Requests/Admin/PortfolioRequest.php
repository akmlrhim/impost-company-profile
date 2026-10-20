<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PortfolioRequest extends FormRequest
{
    public function rules(): array
    {
        $id = $this->route('portfolio')?->id;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('portfolio', 'slug')->ignore($id),
            ],
            'category_id' => ['nullable', 'exists:portfolio_categories,id'],
            'media_path' => ['nullable', 'string', 'max:255'],
            'media_file' => ['nullable', 'image', 'max:8192'],
            'remove_image' => ['nullable', 'boolean'],
            'media_type' => ['nullable', 'string', 'max:255'],
        ];
    }
}
