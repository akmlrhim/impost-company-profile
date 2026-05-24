<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		$articleId = $this->route('article')?->id;

		return [
			'title'       => 'required|string|unique:articles,title,' . $articleId . '|max:255',
			'status'      => 'required|string',
			'category_id' => 'required',
			'written_by'  => 'required',
			'content'     => [
				'required',
				function ($attribute, $value, $fail) {
					if (empty(trim(strip_tags($value)))) {
						$fail('Konten artikel wajib diisi.');
					}
				},
			],
			'cover_path' => $this->isMethod('POST')
				? 'required|image|mimes:jpeg,png,jpg'
				: 'nullable|image|mimes:jpeg,png,jpg',
		];
	}

	public function messages(): array
	{
		return [
			'title.required'       => 'Judul artikel wajib diisi.',
			'title.unique'         => 'Judul artikel sudah digunakan.',
			'title.max'            => 'Judul artikel maksimal 255 karakter.',
			'status.required'      => 'Status wajib dipilih.',
			'category_id.required' => 'Kategori wajib dipilih.',
			'written_by.required'  => 'Nama penulis wajib diisi.',
			'content.required'     => 'Konten artikel wajib diisi.',
			'cover_path.required'  => 'Cover artikel wajib diupload.',
			'cover_path.image'     => 'File cover harus berupa gambar.',
			'cover_path.mimes'     => 'Format cover harus jpeg, png, atau jpg.',
		];
	}
}
