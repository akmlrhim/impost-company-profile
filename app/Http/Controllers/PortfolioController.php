<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\ArticleCategory;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
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

		$categories = PortfolioCategory::select('name', 'slug')->orderBy('name')->get();

		$search = request()->string('search')->trim();

		$portfolios = Portfolio::query()
			->when($search, function ($query) use ($search) {
				$query->where('title', 'like', "%{$search}%");
			})
			->when(request()->filled('category'), function ($query) {
				$query->whereHas('category', function ($q) {
					$q->where('slug', request('category'));
				});
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
				'search' => $search,
				'categories' => $categories
			]
		);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$title = 'Tambah Portfolio';
		$category = PortfolioCategory::pluck('name', 'id');

		return view('admin.portfolio.create', [
			'title' => $title,
			'category' => $category
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(PortfolioRequest $request)
	{
		try {
			DB::beginTransaction();

			$media_path = null;
			$media_type = null;

			if ($request->hasFile('media_path')) {
				$file = $request->file('media_path');
				$mimeType = $file->getMimeType();

				if (str_starts_with($mimeType, 'image/')) {
					$manager = new ImageManager(new Driver());
					$img = $manager->read($file)->toWebp(quality: 50);

					$filename = Str::uuid() . '.webp';
					$path = 'portfolio/' . $filename;

					Storage::disk('public')->put($path, $img);
					$media_path = $path;
					$media_type = 'image';
				} elseif (str_starts_with($mimeType, 'video/')) {
					$filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
					$path = 'portfolio/' . $filename;

					Storage::disk('public')->put($path, file_get_contents($file));
					$media_path = $path;
					$media_type = 'video';
				}
			}

			Portfolio::create([
				'title' => time(),
				'slug' => Str::uuid(),
				'category_id' => $request->category_id,
				'media_path' => $media_path,
				'media_type' => $media_type
			]);

			DB::commit();
			return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			dd($e->getMessage());
			return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
			'portfolio' => $portfolio,
			'category' => PortfolioCategory::pluck('name', 'id')
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(PortfolioRequest $request, Portfolio $portfolio)
	{
		try {
			DB::beginTransaction();

			if ($request->hasFile('media_path')) {
				if ($portfolio->media_path && Storage::disk('public')->exists($portfolio->media_path)) {
					Storage::disk('public')->delete($portfolio->media_path);
				}

				$file = $request->file('media_path');
				$mimeType = $file->getMimeType();

				if (str_starts_with($mimeType, 'image/')) {
					$manager = new ImageManager(new Driver());
					$img = $manager->read($file)->toWebp(quality: 60);

					$filename = Str::uuid() . '.webp';
					$path = 'portfolio/' . $filename;

					Storage::disk('public')->put($path, $img);
					$portfolio->media_path = $path;
					$portfolio->media_type = 'image';
				} elseif (str_starts_with($mimeType, 'video/')) {
					$filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
					$path = 'portfolio/' . $filename;

					Storage::disk('public')->put($path, file_get_contents($file));
					$portfolio->media_path = $path;
					$portfolio->media_type = 'video';
				}
			}

			$portfolio->update([
				'category_id' => $request->category_id,
			]);

			DB::commit();
			return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Portfolio $portfolio)
	{
		try {
			DB::beginTransaction();

			if ($portfolio->media_path && Storage::disk('public')->exists($portfolio->media_path)) {
				Storage::disk('public')->delete($portfolio->media_path);
			}

			$portfolio->delete();

			DB::commit();
			return redirect()->route('portfolio.index')->with('success', 'Portfolio berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
		}
	}
}
