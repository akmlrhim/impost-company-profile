<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$search = request()->string('search')->trim();

		$users = User::query()
			->select('name', 'email', 'created_at', 'id')
			->when($search, function ($query) use ($search) {
				$query->where('name', 'like', "%{$search}%");
			})
			->orderByDesc('created_at')
			->paginate(10)
			->onEachSide(1)
			->withQueryString();

		return view('admin.users.index', [
			'title' => 'Users',
			'users' => $users,
			'search' => $search
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.users.create', [
			'title' => 'Tambah User'
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UserRequest $request)
	{
		try {
			DB::beginTransaction();

			User::create([
				'email' => $request->email,
				'name' => $request->name,
				'password' => Hash::make($request->password)
			]);

			DB::commit();
			return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(User $user)
	{
		return view('admin.users.edit', [
			'title' => 'Edit User',
			'user' => $user
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UserRequest $request, User $user)
	{
		try {
			DB::beginTransaction();

			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = Hash::make($request->password);
			$user->save();

			DB::commit();
			return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user)
	{
		try {
			DB::beginTransaction();

			$user->delete();

			DB::commit();
			return back()->with('success', 'User berhasil dihapus');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}
}
