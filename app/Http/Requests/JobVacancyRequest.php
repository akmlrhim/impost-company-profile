<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobVacancyRequest extends FormRequest
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
		return [
			'title' => 'required|string|max:255',
			'employment_type' => 'required|in:Full-time,Part-time,Internship,Contract',
			'duration' => 'nullable|string|max:100',
			'work_arrangements' => 'required|array',
			'apply_email' => 'required|email|max:255',
			'apply_subject' => 'required|string|max:255',
			'status' => 'required|in:Active,Draft,Closed',

			'poster' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',

			'details' => 'required|array|min:1',
			'details.*.section' => 'required|in:Tanggung Jawab,Kualifikasi,Benefit',
			'details.*.content' => 'required|string',
		];
	}

	public function messages(): array
	{
		return [
			'title.required'   => 'Judul posisi wajib diisi.',
			'title.max' => 'Judul posisi tidak boleh lebih dari 255 karakter.',

			'employment_type.required'  => 'Tipe kerja wajib dipilih.',
			'employment_type.in' => 'Pilihan tipe kerja tidak valid.',

			'duration.max' => 'Durasi magang terlalu panjang (maks. 100 karakter).',

			'work_arrangements.required' => 'Minimal pilih satu sistem kerja (Onsite/WFA/Remote).',

			'apply_email.required' => 'Email tujuan lamaran wajib diisi.',
			'apply_email.email' => 'Format email tidak valid. Gunakan format @gmail.com dsb.',
			'apply_email.max'  => 'Email terlalu panjang (maks. 255 karakter).',

			'apply_subject.required' => 'Subjek email wajib diisi sebagai format lamaran.',
			'apply_subject.max' => 'Subjek email tidak boleh lebih dari 255 karakter.',

			'status.required'  => 'Status publikasi wajib dipilih.',
			'status.in' => 'Status tidak valid.',

			'poster.image' => 'File poster harus berupa gambar.',
			'poster.mimes' => 'Format poster harus berupa: jpeg, png, jpg, atau webp.',
			'poster.max' => 'Ukuran file poster maksimal 2MB.',

			'details.required' => 'Minimal harus ada satu baris detail poin.',
			'details.min' => 'Minimal harus ada satu baris detail poin.',
			'details.*.section.required' => 'Bagian kategori (Tanggung Jawab/Kualifikasi/Benefit) wajib dipilih.',
			'details.*.section.in' => 'Pilihan kategori detail tidak valid.',
			'details.*.content.required' => 'Isi poin detail wajib diisi.',
		];
	}
}
