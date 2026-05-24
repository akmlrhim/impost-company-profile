<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		$serviceId = $this->route('service')?->id;

		return [
			'service_name' => 'required|string|max:255|unique:services,service_name,' . $serviceId,
			'description'  => 'required|string',
			'category'     => 'required',
			'cover_path'   => $this->isMethod('POST')
				? 'required|image|mimes:jpeg,png,jpg,webp'
				: 'nullable|image|mimes:jpeg,png,jpg,webp',
			'sort' => 'required|unique:services,sort,' . $serviceId . ',id',
		];
	}

	public function messages(): array
	{
		return [
			'service_name.required' => 'Nama layanan wajib diisi.',
			'service_name.max'      => 'Nama layanan maksimal 255 karakter.',
			'service_name.unique'   => 'Nama layanan sudah digunakan.',
			'description.required'  => 'Deskripsi wajib diisi.',
			'category.required'     => 'Kategori wajib dipilih.',
			'cover_path.required'   => 'Cover wajib diupload.',
			'cover_path.image'      => 'File cover harus berupa gambar.',
			'cover_path.mimes'      => 'Format cover harus jpeg, png, jpg, atau webp.',
			'sort.required'         => 'Urutan tampil wajib diisi.',
			'sort.unique'           => 'Urutan ini sudah dipakai layanan lain, pilih nomor lain.',
		];
	}
}
