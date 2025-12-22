<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\RecaptchaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function index()
	{
		return view('login', [
			'title' => 'Login'
		]);
	}

	public function login(AuthRequest $req)
	{
		$credentials = $req->only('email', 'password');

		$captcha = RecaptchaService::verify($req->input('g-recaptcha-response'));

		if (!($captcha['success'] ?? false)) {
			return back()->with('error', 'Verifikasi Recaptcha gagal, coba lagi.')->withInput();
		}

		if (($captcha['score'] ?? 0) < 0.3) {
			return back()->withInput()->with('error', 'Aktivitas mencurigaka terdeteksi, matikan VPN.');
		}

		if (Auth::guard('web')->attempt($credentials)) {
			$req->session()->regenerate();

			return redirect()->intended(route('dashboard'));
		}

		return back()
			->withInput($req->only('email'))
			->with('error', 'Email atau password salah.');
	}

	public function logout(Request $req)
	{
		Auth::guard('web')->logout();
		$req->session()->invalidate();
		$req->session()->regenerateToken();

		return redirect()->route('login')->with('info', 'Anda telah logout.');
	}
}
