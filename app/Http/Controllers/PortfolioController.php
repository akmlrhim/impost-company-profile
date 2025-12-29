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

		return view(
			'admin.portfolio.index',
			[
				'title' => $title,
				'portfolios' => Portfolio::paginate()
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
					$filename = time() . '-' . '.webp';
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
	 * Display the specified resource.
	 */
	public function show(Portfolio $portfolio)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Portfolio $portfolio)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update($request, Portfolio $portfolio)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Portfolio $portfolio)
	{
		//
	}
}
