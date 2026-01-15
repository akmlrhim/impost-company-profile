<?php

namespace App\Http\Controllers;

use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		$title = 'Portfolio Categories';
		$search = $request->input('search');

		$portfolioCategories = PortfolioCategory::when($search, function ($query) use ($search) {
			return $query->where('name', 'like', '%' . $search . '%')
				->orWhere('slug', 'like', '%' . $search . '%');
		})
			->latest()
			->orderByDesc('created_at')
			->simplePaginate(10)
			->onEachSide(1)
			->withQueryString();

		return view('admin.portfolio-category.index', compact('title', 'portfolioCategories', 'search'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255|unique:article_categories,name',
		]);

		try {
			DB::beginTransaction();

			PortfolioCategory::create([
				'name' => $request->name,
				'slug' => Str::slug($request->name),
			]);

			DB::commit();
			return redirect()->back()->with('success', 'Kategori portfolio berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput();
		}
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, PortfolioCategory $portfolioCategory)
	{
		$request->validate([
			'name' => 'required|string|max:255|unique:portfolio_categories,name,' . $portfolioCategory->id,
		]);

		try {
			DB::beginTransaction();

			$portfolioCategory->update([
				'name' => $request->name,
				'slug' => Str::slug($request->name),
			]);

			DB::commit();
			return redirect()->back()->with('success', 'Kategori portfolio berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(PortfolioCategory $portfolioCategory)
	{
		try {
			DB::beginTransaction();

			$portfolioCategory->delete();

			DB::commit();
			return redirect()->back()->with('success', 'Kategori portfolio berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput();
		}
	}
}
