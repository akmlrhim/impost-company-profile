<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
		$teamId = $this->route('team')?->id;

		return [
			'fullname' => 'required|string|max:255|unique:teams,fullname,' . $teamId,
			'position' => 'required|string|max:255|unique:teams,position,' . $teamId,
			'sort_order' => 'required|integer|unique:teams,sort_order,' . $teamId,
			'photo' => 'nullable|image|mimes:jpeg,png,jpg',
			'instagram_link' => 'required|active_url|string:255|unique:teams,instagram_link,' . $teamId,
			'linkedin_link' => 'required|active_url|string:255|unique:teams,linkedin_link,' . $teamId,
		];
	}
}
