<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'category_id' => 'required|exists:portfolio_categories,id',
			'media_path' => $this->isMethod('POST')
				? 'required|file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,wmv|max:51200'
				: 'nullable|file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,wmv|max:51200',
		];
	}

	public function messages(): array
	{
		return [
			'category_id.required' => 'Kategori wajib dipilih.',
			'category_id.exists' => 'Kategori yang dipilih tidak valid.',
			'media_path.required' => 'File media wajib diupload.',
			'media_path.file' => 'File tidak valid.',
			'media_path.mimes' => 'Format file harus jpeg, png, jpg, webp, mp4, mov, avi, atau wmv.',
			'media_path.max' => 'Ukuran file maksimal 50 MB.',
		];
	}
}
