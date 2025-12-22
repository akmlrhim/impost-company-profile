<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RecaptchaService
{
	public static function verify(string $token)
	{
		$res = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
			'secret' => config('services.recaptcha.secret_key'),
			'response' => $token
		]);

		return $res->json();
	}
}
