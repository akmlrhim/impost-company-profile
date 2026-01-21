<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
		$portfolioId = $this->route('portfolio')?->id;

		return [
			'title' => 'required|string',
			'category_id' => 'required|exists:portfolio_categories,id',
			'media_path' => $this->isMethod('POST')
				? 'required|file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,wmv|max:51200'
				: 'nullable|file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,wmv|max:51200',
		];
	}
}
