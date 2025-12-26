<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
		$serviceId = $this->route('service')?->id;

		return [
			'service_name' => 'required|string|max:255|unique:services,service_name,' . $serviceId,
			'description'  => 'required|string',
			'cover_path'   => $this->isMethod('POST')
				? 'required|image|mimes:jpeg,png,jpg'
				: 'nullable|image|mimes:jpeg,png,jpg',
			'sort' => 'required|unique:services,sort,' . $serviceId
		];
	}
}
