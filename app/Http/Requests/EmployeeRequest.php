<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		$employeesId = $this->route('employee')?->id;

		return [
			'fullname'    => 'required|string|max:255',
			'position'    => 'required|string|max:255',
			'photo'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
			'join_date'   => 'nullable|date',
			'employee_id' => 'required|string|max:255|unique:employees,employee_id,' . $employeesId,
		];
	}

	public function messages(): array
	{
		return [
			'fullname.required'    => 'Nama lengkap wajib diisi.',
			'fullname.max'         => 'Nama lengkap maksimal 255 karakter.',
			'position.required'    => 'Jabatan wajib diisi.',
			'position.max'         => 'Jabatan maksimal 255 karakter.',
			'photo.image'          => 'File foto harus berupa gambar.',
			'photo.mimes'          => 'Format foto harus jpeg, png, atau jpg.',
			'photo.max'            => 'Ukuran foto maksimal 2 MB.',
			'join_date.date'       => 'Format tanggal bergabung tidak valid.',
			'employee_id.required' => 'ID karyawan wajib diisi.',
			'employee_id.max'      => 'ID karyawan maksimal 255 karakter.',
			'employee_id.unique'   => 'ID karyawan sudah digunakan.',
		];
	}
}
