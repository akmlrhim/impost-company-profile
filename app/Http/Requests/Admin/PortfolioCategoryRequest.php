<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PortfolioCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        $id = $this->route('portfolio_category')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('portfolio_categories', 'slug')->ignore($id),
            ],
        ];
    }
}
