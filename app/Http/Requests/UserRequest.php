<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
		$userId = $this->route('user')?->id;

		return [
			'name' => 'required|string|unique:users,name,' . $userId,
			'email' => 'email:dns|required|string|unique:users,email,' . $userId,
			'password' => $this->isMethod('POST')
				? 'required|min:8|string'
				: 'nullable|min:8|string'
		];
	}
}
