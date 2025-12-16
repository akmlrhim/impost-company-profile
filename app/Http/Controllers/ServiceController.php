<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$search = request()->query('search');

		$services = Service::when($search, function ($query, $search) {
			$query->where('service_name', 'like', '%' . $search . '%');
		})
			->paginate(6)
			->onEachSide(1)
			->withQueryString();

		return view(
			'admin.services.index',
			[
				'title' => 'Layanan',
				'services' => $services,
				'search' => $search,
			]
		);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view(
			'admin.services.create',
			['title' => 'Tambah Layanan']
		);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(ServiceRequest $request)
	{
		try {
			DB::beginTransaction();

			Service::create([
				'service_name' => $request->service_name,
				'slug' => Str::slug($request->service_name),
				'description' => $request->description,
				'cover_path' => $request->file('cover_path')->store('services', 'public'),
			]);

			DB::commit();
			return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan layanan');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Service $service)
	{
		return view(
			'admin.services.edit',
			[
				'title' => 'Edit Layanan',
				'service' => $service,
			]
		);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(ServiceRequest $request, Service $service)
	{
		try {
			DB::beginTransaction();

			$service->service_name = $request->service_name;
			$service->slug = Str::slug($request->service_name);
			$service->description = $request->description;

			if ($request->hasFile('cover_path')) {
				if ($service->cover_path) {
					Storage::disk('public')->delete($service->cover_path);
				}
				$service->cover_path = $request->file('cover_path')->store('services', 'public');
			}

			$service->save();
			DB::commit();
			return redirect()->route('services.index')->with('success', 'Layanan berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui layanan.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Service $service)
	{
		try {
			DB::beginTransaction();

			if ($service->cover_path) {
				Storage::disk('public')->delete($service->cover_path);
			}

			$service->delete();
			DB::commit();
			return redirect()->route('services.index')->with('success', 'Layanan berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput()->with('error', 'Terjadi kesalahan saat menghapus layanan.');
		}
	}
}
