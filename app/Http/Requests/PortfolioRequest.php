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
			'name' => 'required|string|unique:portfolio,name,' . $portfolioId,
			'cover_path' => $this->isMethod('POST')
				? 'required|image|mimes:jpeg,png,jpg|max:5120'
				: 'nullable|image|mimes:jpeg,png,jpg|max:5120',

			'photos.*' => $this->isMethod('POST')
				? 'required|image|mimes:jpeg,png,jpg|max:5120'
				: 'nullable|image|mimes:jpeg,png,jpg|max:5120',
		];
	}
}
