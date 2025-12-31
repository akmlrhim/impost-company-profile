<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyCaseRequest extends FormRequest
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
		$studyCaseId = $this->route('study_case')?->id;

		return [
			'name' => 'required|string|max:255|unique:study_cases,name,' . $studyCaseId,
			'cover_path' => $this->isMethod('POST')
				? 'required|image|mimes:jpg,jpeg,png,webp|max:5120'
				: 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
			'situation' => 'required|string',
			'solution' => 'required|string',
			'result' => 'required|string',

			'photos.*' => $this->isMethod('POST')
				? 'required|image|mimes:jpeg,png,jpg|max:5120'
				: 'nullable|image|mimes:jpeg,png,jpg|max:5120',
		];
	}
}
