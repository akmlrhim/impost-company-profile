<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PortfolioController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = "Portfolio";

		$search = request()->string('search')->trim();

		$portfolios = Portfolio::query()
			->when($search, function ($query) use ($search) {
				$query->where('name', 'like', "%{$search}%");
			})
			->latest()
			->paginate(8)
			->onEachSide(1)
			->withQueryString();

		return view(
			'admin.portfolio.index',
			[
				'title' => $title,
				'portfolios' => $portfolios,
				'search' => $search
			]
		);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$title = 'Tambah Portfolio';

		return view('admin.portfolio.create', [
			'title' => $title
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(PortfolioRequest $request)
	{
		try {
			DB::beginTransaction();

			if ($request->hasFile('cover_path')) {
				$manager = new ImageManager(new Driver());

				$img = $manager->read($request->file('cover_path'))->toWebp(quality: 60);

				$filename = time() . '.webp';
				$path = 'portfolio/' . $filename;

				Storage::disk('public')->put($path, $img);
				$cover_path = $path;
			}

			$portfolio = Portfolio::create([
				'name' => $request->name,
				'slug' => Str::slug($request->name),
				'cover_path' => $cover_path
			]);

			if ($request->hasFile('photos')) {
				foreach ($request->file('photos') as $photoFile) {
					$img = $manager->read($photoFile)->toWebp(quality: 60);
					$filename = time() . '.webp';
					$path = 'portfolio/photos/' . $filename;

					Storage::disk('public')->put($path, $img);

					$portfolio->photos()->create([
						'photo_path' => $path
					]);
				}
			}

			DB::commit();
			return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Portfolio $portfolio)
	{
		$title = 'Edit Portfolio';

		return view('admin.portfolio.edit', [
			'title' => $title,
			'portfolio' => $portfolio->load('photos')
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(PortfolioRequest $request, Portfolio $portfolio)
	{
		try {
			DB::beginTransaction();

			if ($request->hasFile('cover_path')) {

				$manager = new ImageManager(new Driver());

				if ($portfolio->cover_path && Storage::disk('public')->exists($portfolio->cover_path)) {
					Storage::disk('public')->delete($portfolio->cover_path);
				}

				$img = $manager->read($request->file('cover_path'))->toWebp(quality: 60);
				$filename = time() . '.webp';
				$path = 'portfolio/' . $filename;

				Storage::disk('public')->put($path, $img);

				$portfolio->cover_path = $path;
			}

			// update data portfolio 
			$portfolio->update([
				'name' => $request->name,
				'slug' => Str::slug($request->name)
			]);

			// hapus foto lama 
			if ($request->filled('delete_photos')) {
				$photos = $portfolio->photos()
					->whereIn('id', $request->delete_photos)
					->get();

				foreach ($photos as $photo) {
					if (Storage::disk('public')->exists($photo->photo_path)) {
						Storage::disk('public')->delete($photo->photo_path);
					}
					$photo->delete();
				}
			}

			// tambah portfolio 
			if ($request->hasFile('photos')) {
				foreach ($request->file('photos') as $photoFile) {
					$img = $manager->read($photoFile)->toWebp(quality: 60);
					$filename = time() . '.webp';
					$path = 'portfolio/photos/' . $filename;

					Storage::disk('public')->put($path, $img);

					$portfolio->photos()->create([
						'photo_path' => $path
					]);
				}
			}

			DB::commit();
			return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Portfolio $portfolio)
	{
		try {
			DB::beginTransaction();

			// hapus cover portfolio 
			if ($portfolio->cover_path && Storage::disk('public')->exists($portfolio->cover_path)) {
				Storage::disk('public')->delete($portfolio->cover_path);
			}

			// hapus semua foto portfolio 
			foreach ($portfolio->photos as $photo) {
				if ($photo->photo_path && Storage::disk('public')->exists($photo->photo_path)) {
					Storage::disk('public')->delete($photo->photo_path);
				}
			}

			// hapus foto portfolio 
			$portfolio->photos()->delete();

			// hapus portfolio 
			$portfolio->delete();

			DB::commit();
			return back()->with('success', 'Portfolio berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}
}
