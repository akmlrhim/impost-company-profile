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
			'title' => 'required|string|unique:portfolio,title,' . $portfolioId,
			'description' => 'required|string',
			'category_id' => 'required',
			'cover_path' => $this->isMethod('POST')
				? 'required|image|mimes:jpeg,png,jpg|max:5120'
				: 'nullable|image|mimes:jpeg,png,jpg|max:5120',

			'photos.*' => $this->isMethod('POST')
				? 'required|image|mimes:jpeg,png,jpg|max:5120'
				: 'nullable|image|mimes:jpeg,png,jpg|max:5120',
		];
	}
}
