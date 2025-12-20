<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
				'clients' => Client::simplePaginate(8)
			]
		);
	}

	public function create()
	{
		return view('admin.clients.create', [
			'title' => 'Tambah Klien'
		]);
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
					'name' => '',
					'filename' => $filename,
					'client_logo' => $path
				]);
			}

			DB::commit();
			return redirect()->route('clients.index')->with('success', 'Klien berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	public function edit(Client $client)
	{
		return view(
			'admin.clients.edit',
			[
				'title' => 'Edit Klien',
				'client' => $client
			]
		);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Client $client)
	{
		$request->validate([
			'filename' => ''
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Client $client)
	{
		try {
			DB::beginTransaction();

			if ($client->cover_path) {
				Storage::disk('public')->delete($client->client_logo);
			}

			$client->delete();
			DB::commit();
			return back()->with('success', 'Klien berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back();
		}
	}

	public function truncate()
	{
		try {
			DB::beginTransaction();

			$clients = Client::whereNotNull('client_logo')->get();

			foreach ($clients as $client) {
				if (Storage::disk('public')->exists($client->client_logo)) {
					Storage::disk('public')->delete($client->client_logo);
				}
			}

			Client::query()->delete();
			DB::commit();
			return back()->with('success', 'Semua data klien berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back();
		}
	}
}
