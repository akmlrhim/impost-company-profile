<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
		$employeesId = $this->route('employee')?->id;

		return [
			'fullname' => 'required|string|max:255|unique:employees,fullname,' . $employeesId,
			'position' => 'required|string|max:255|unique:employees,position,' . $employeesId,
			'photo' => 'nullable|image|mimes:jpeg,png,jpg',
			'join_date' => 'nullable|date',
			'employee_id' => 'required|string|max:255|unique:employees,employee_id,' . $employeesId,
		];
	}
}
