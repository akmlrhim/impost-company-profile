<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		$articleId = $this->route('article')?->id;

		return [
			'title' => 'required|string|unique:articles,title,' . $articleId . '|max:255',
			'status' => 'required|string',
			'content' => [
				'required',
				function ($attribute, $value, $fail) {
					$cleanedContent = trim(strip_tags($value));
					if (empty($cleanedContent)) {
						$fail('The ' . $attribute . ' field must not be empty.');
					}
				}
			],
			'cover_path' => $this->isMethod('POST')
				? 'required|image|mimes:jpeg,png,jpg|max:2048'
				: 'nullable|image|mimes:jpeg,png,jpg|max:2048',
		];
	}
}
