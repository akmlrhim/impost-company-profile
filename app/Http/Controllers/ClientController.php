<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ClientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Klien';

		$search = request('search');

		$clients = Client::query()
			->when($search, function ($query) use ($search) {
				$query->where('filename', 'like', "%{$search}%");
			})
			->orderByDesc('created_at')
			->cursorPaginate(8)
			->withQueryString();

		return view('admin.clients.index', compact('title', 'search', 'clients'));
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

			$manager = new ImageManager(new Driver());

			foreach ($request->file('client_logo') as $logo) {

				$name = pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME);
				$filename = time() . '-' . Str::slug($name) . '.webp';

				$path = storage_path('app/public/client_logo/' . $filename);

				$image = $manager->read($logo);
				$image->scale(width: 200);
				$image->toWebp(80)->save($path);

				Client::create([
					'filename' => $filename,
					'client_logo' => 'client_logo/' . $filename,
				]);
			}

			DB::commit();
			return redirect()
				->route('clients.index')
				->with('success', 'Klien berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()
				->withInput()
				->withErrors($e->getMessage());
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
