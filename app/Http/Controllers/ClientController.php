<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view(
			'admin.clients.index',
			[
				'title' => 'Klien',
				'clients' => Client::paginate(6)
			]
		);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'client_logo' => 'required',
			'client_logo.*' => 'image|mimes:jpg,jpeg,png|max:2048',
		]);

		try {
			DB::beginTransaction();

			foreach ($request->file('client_logo') as $logo) {
				$filename = time() . '-' . $logo->getClientOriginalName();

				$path = $logo->storeAs('client_logo', $filename, 'public');

				Client::create([
					'filename' => $filename,
					'client_logo' => $path
				]);
			}

			DB::commit();
			return redirect()->back()->with('success', 'Klien berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput()->with('error:', $e->getMessage());
		}
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Client $client)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Client $client)
	{
		//
	}
}
