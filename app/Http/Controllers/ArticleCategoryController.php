<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleCategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		$title = 'Article Categories';
		$search = $request->input('search');

		$articleCategories = ArticleCategory::when($search, function ($query) use ($search) {
			return $query->where('name', 'like', '%' . $search . '%')
				->orWhere('slug', 'like', '%' . $search . '%');
		})
			->latest()
			->orderByDesc('created_at')
			->simplePaginate(10)
			->onEachSide(1)
			->withQueryString();

		return view('admin.article-category.index', compact('title', 'articleCategories', 'search'));
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

			ArticleCategory::create([
				'name' => $request->name,
				'slug' => Str::slug($request->name),
			]);

			DB::commit();
			return redirect()->back()->with('success', 'Kategori artikel berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput();
		}
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, ArticleCategory $articleCategory)
	{
		try {
			DB::beginTransaction();

			$request->validate([
				'name' => 'required|string|max:255|unique:article_categories,name,' . $articleCategory->id,
			]);

			$articleCategory->update([
				'name' => $request->name,
				'slug' => Str::slug($request->name),
			]);

			DB::commit();
			return redirect()->back()->with('success', 'Kategori artikel berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(ArticleCategory $articleCategory)
	{
		try {
			DB::beginTransaction();

			$articleCategory->delete();

			DB::commit();
			return redirect()->back()->with('success', 'Kategori artikel berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}
}
