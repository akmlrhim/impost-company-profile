<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ArticleController extends Controller
{
    public function index(Request $request): InertiaResponse
    {
        $categorySlug = $request->input('category');
        $search = trim((string) $request->input('search', ''));

        $articles = Article::query()
            ->with('category:id,name,slug')
            ->where('status', 'published')
            ->when($categorySlug, function ($query) use ($categorySlug) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
            })
            ->when($search !== '', function ($query) use ($search) {
                $query->where(fn ($q) => $q
                    ->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%"));
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return Inertia::render('Articles/Index', [
            'categories' => ArticleCategory::query()->get(['name', 'slug']),
            'articles' => $articles,
            'filters' => ['category' => $categorySlug, 'search' => $search],
        ]);
    }

    public function show(Article $article): InertiaResponse
    {
        abort_unless($article->status === 'published', 404);

        $article->load('category:id,name,slug');

        $related = Article::query()
            ->with('category:id,name,slug')
            ->where('status', 'published')
            ->whereKeyNot($article->getKey())
            ->orderByRaw('category_id = ? desc', [$article->category_id])
            ->latest()
            ->take(5)
            ->get(['title', 'slug', 'excerpt', 'cover_path', 'written_by', 'created_at', 'category_id']);

        return Inertia::render('Articles/Show', [
            'article' => $article->only(
                'title',
                'slug',
                'content',
                'cover_path',
                'excerpt',
                'written_by',
                'created_at',
                'category'
            ),
            'related' => $related,
            'categories' => ArticleCategory::query()->get(['name', 'slug']),
        ]);
    }
}
