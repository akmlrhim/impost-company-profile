<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
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

		if (Auth::guard('web')->attempt($credentials)) {
			$req->session()->regenerate();

			return redirect()->intended('dashboard');
		}

		return back()->withErrors([
			'email' => 'Email tidak ditemukan atau password salah.',
		])->onlyInput('email');
	}

	public function logout(AuthRequest $req)
	{
		Auth::guard('web')->logout();
		$req->session()->invalidate();
		$req->session()->regenerateToken();

		return redirect();
	}
}
