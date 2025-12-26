<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ServiceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Layanan';

		$search = request('search');

		$services = Service::query()
			->when($search, function ($query) use ($search) {
				$query->where('service_name', 'like', "%{$search}%");
			})
			->orderByDesc('created_at')
			->cursorPaginate(8)
			->withQueryString();

		return view('admin.services.index', compact('title', 'services', 'search'));
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

			if ($request->hasFile('cover_path')) {
				$manager = new ImageManager(new Driver());

				$img = $manager->read($request->file('cover_path'))
					->scale(width: 1200)
					->toWebp(quality: 70);

				$filename = time() . '.webp';
				$path = 'services/' . $filename;

				Storage::disk('public')->put($path, $img);
				$cover_path = $path;
			}

			$data = [
				'service_name' => $request->service_name,
				'slug' => Str::slug($request->service_name),
				'description' => $request->description,
				'cover_path' => $cover_path
			];

			Service::create($data);
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
				if ($service->cover_path && Storage::disk('public')->exists($service->cover_path)) {
					Storage::disk('public')->delete($service->cover_path);
				}

				$manager = new ImageManager(new Driver());

				$img = $manager->read($request->file('cover_path'))
					->scale(width: 1200)
					->toWebp(quality: 70);

				$filename = time() . '.webp';
				$path = 'services/' . $filename;

				Storage::disk('public')->put($path, $img);
				$service->cover_path = $path;
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
			return back()->with('success', 'Layanan berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->with('error', 'Terjadi kesalahan saat menghapus layanan.');
		}
	}
}
