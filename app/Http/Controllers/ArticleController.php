<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$search = request('search');

		$articles = Article::query()
			->when($search, function ($query) use ($search) {
				$query->where('title', 'like', "%{$search}%");
			})
			->orderByDesc('created_at')
			->cursorPaginate(8)
			->withQueryString();

		return view('admin.articles.index', [
			'title' => 'Artikel',
			'articles' => $articles,
			'search' => $search,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.articles.create', [
			'title' => 'Tambah Artikel'
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(ArticleRequest $request)
	{
		try {
			DB::beginTransaction();

			$data = [
				'title' => $request->title,
				'slug' => Str::slug($request->title),
				'content' => $request->content,
				'excerpt' => Str::limit(strip_tags($request->content), 150, '...'),
				'meta_title' => $request->title,
				'meta_description' => Str::limit(strip_tags($request->content), 160, '...'),
				'status' => $request->status ?? 'draft',
			];

			if ($request->hasFile('cover_path')) {
				$data['cover_path'] = $request->file('cover_path')->store('articles', 'public');
			}

			Article::create($data);

			DB::commit();
			return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Article $article)
	{
		$title = 'Edit Artikel';
		return view('admin.articles.edit', compact('title', 'article'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Article $article)
	{
		try {
			DB::beginTransaction();

			if ($request->hasFile('cover_path')) {
				if ($article->cover_path && Storage::disk('public')->exists($article->cover_path)) {
					Storage::disk('public')->delete($article->cover_path);
				}
				$article->cover_path = $request->file('cover_path')->store('public', 'articles');
			}

			$article->title = $request->title;
			$article->slug = Str::slug($request->title);
			$article->content = $request->content;
			$article->excerpt = Str::limit(strip_tags($request->content), 150);
			$article->meta_title = $request->title;
			$article->meta_description = Str::limit(strip_tags($request->content), 160);
			$article->status = $request->status ?? $article->status;
			$article->save();

			DB::commit();
			return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Article $article)
	{
		try {
			DB::beginTransaction();

			if ($article->cover_path) {
				Storage::disk('public')->delete($article->cover_path);
			}

			$article->delete();

			DB::commit();
			return back()->with('success', 'Artikel berhasil dihapus');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput()->with('error', 'Gagal menghapus artikel' . $e->getMessage());
		}
	}

	public function comments(Article $article)
	{
		return view('admin.articles.comments', [
			'title' => 'Komentar',
			'article' => $article->comments()->simplePaginate(10)
		]);
	}
}
