<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyCaseRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'name' => 'required|string|max:255',
			'category' => 'required',
			'cover_path' => $this->isMethod('POST')
				? 'required|image|mimes:jpg,jpeg,png,webp|max:5120'
				: 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
			'situation' => 'required|string',
			'solution' => 'required|string',
			'result' => 'required|string',
			'images.*' => $this->isMethod('POST')
				? 'required|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:5120'
				: 'nullable|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:5120',
			'videos.*' => 'nullable|mimes:mp4,mov,avi|max:20480',
		];
	}

	public function messages(): array
	{
		return [
			'name.required' => 'Nama study case wajib diisi.',
			'name.max' => 'Nama study case maksimal 255 karakter.',
			'category.required' => 'Kategori wajib dipilih.',
			'cover_path.required' => 'Cover wajib diupload.',
			'cover_path.image' => 'File cover harus berupa gambar.',
			'cover_path.mimes' => 'Format cover harus jpg, jpeg, png, atau webp.',
			'cover_path.max' => 'Ukuran cover maksimal 5 MB.',
			'situation.required' => 'Situasi wajib diisi.',
			'solution.required' => 'Solusi wajib diisi.',
			'result.required' => 'Hasil wajib diisi.',
			'images.*.mimes' => 'Format gambar/video harus jpg, jpeg, png, webp, mp4, mov, atau avi.',
			'images.*.max' => 'Ukuran file maksimal 5 MB.',
			'videos.*.mimes' => 'Format video harus mp4, mov, atau avi.',
			'videos.*.max' => 'Ukuran video maksimal 20 MB.',
		];
	}
}
