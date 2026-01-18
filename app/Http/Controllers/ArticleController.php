<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Mews\Purifier\Facades\Purifier;

class ArticleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$categories = ArticleCategory::select('name', 'slug')->orderBy('name')->get();

		$search = request()->string('search')->trim();

		$articles = Article::query()
			->when($search, function ($query) use ($search) {
				$query->where('title', 'like', "%{$search}%");
			})
			->when(request()->filled('category'), function ($query) {
				$query->whereHas('category', function ($q) {
					$q->where('slug', request('category'));
				});
			})
			->orderByDesc('created_at')
			->paginate(8)
			->onEachSide(1)
			->withQueryString();

		return view('admin.articles.index', [
			'title' => 'Artikel',
			'articles' => $articles,
			'search' => $search,
			'categories' => $categories
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.articles.create', [
			'title' => 'Tambah Artikel',
			'category' => ArticleCategory::pluck('name', 'id')
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(ArticleRequest $request)
	{
		try {
			DB::beginTransaction();

			if ($request->hasFile('cover_path')) {
				$manager = new ImageManager(new Driver());

				$img = $manager->read($request->file('cover_path'))->toWebp(quality: 60);

				$filename = time() . '.webp';
				$path = 'articles/' . $filename;

				Storage::disk('public')->put($path, $img);
				$cover_path = $path;
			}

			$data = [
				'title' => $request->title,
				'slug' => Str::slug($request->title),
				'category_id' => $request->category_id,
				'content' => Purifier::clean($request->content),
				'cover_path' => $cover_path,
				'excerpt' => Str::limit(strip_tags($request->content), 150, '...'),
				'meta_title' => $request->title,
				'meta_description' => Str::limit(strip_tags($request->content), 160, '...'),
				'status' => $request->status,
				'written_by' => $request->written_by
			];

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
		$category = ArticleCategory::pluck('name', 'id');
		return view('admin.articles.edit', compact('title', 'article', 'category'));
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

				$manager = new ImageManager(new Driver());

				$img = $manager->read($request->file('cover_path'))->toWebp(quality: 60);

				$filename = time() . '.webp';
				$path = 'articles/' . $filename;

				Storage::disk('public')->put($path, $img->toString());
				$article->cover_path = $path;
			}

			$article->title = $request->title;
			$article->slug = Str::slug($request->title);
			$article->content = Purifier::clean($request->content);
			$article->category_id = $request->category_id;
			$article->excerpt = Str::limit(strip_tags($request->content), 150);
			$article->meta_title = $request->title;
			$article->meta_description = Str::limit(strip_tags($request->content), 160);
			$article->status = $request->status ?? $article->status;
			$article->written_by = $request->written_by;
			$article->save();

			DB::commit();
			return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->with('error:' . $e->getMessage())->withInput();
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
			'title'    => 'Komentar',
			'article'  => $article,
			'comments' => $article->comments()->latest()->paginate(9),
		]);
	}
}
