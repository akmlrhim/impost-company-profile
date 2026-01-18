<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	public function index()
	{
		return view('admin.profile', [
			'title' => 'My Profile'
		]);
	}

	public function saveProfile(Request $request)
	{
		$user = User::findOrFail(Auth::id());

		$request->validate([
			'email' => 'email:dns|required|unique:users,email,' . $user->id,
			'name' => 'required'
		]);

		try {
			DB::beginTransaction();

			$user->name = $request->name;
			$user->email = $request->email;
			$user->save();

			DB::commit();
			return back()->with('success', 'Profile berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	public function savePassword(Request $request)
	{
		$user = User::findOrFail(Auth::id());

		$request->validate([
			'current_password' => 'required',
			'new_password' => 'required|min:8|confirmed'
		]);

		try {
			DB::beginTransaction();

			if (!Hash::check($request->current_password, $user->password)) {
				return back()->withErrors([
					'current_password' => 'Current password is not valid.'
				])->withInput();
			}

			if ($request->current_password === $request->new_password) {
				return back()->withErrors([
					'new_password' => 'The new password must not be the same as the current password.'
				])->withInput();
			}

			$user->update([
				'password' => Hash::make($request->new_password)
			]);

			DB::commit();
			return back()->with('success', 'Password berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput()->fragment('password-form');
		}
	}
}
