<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class PortfolioController extends Controller
{
    public function index(Request $request): InertiaResponse
    {
        $categorySlug = $request->input('category');

        $portfolios = Portfolio::query()
            ->with('category:id,name,slug')
            ->when($categorySlug, function ($query, $slug) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $slug));
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return Inertia::render('Portfolio/Index', [
            'categories' => PortfolioCategory::query()->get(['id', 'name', 'slug']),
            'portfolios' => $portfolios,
            'filters' => ['category' => $categorySlug],
        ]);
    }

    public function show(Request $request, Portfolio $portfolio): InertiaResponse
    {
        $portfolio->load('category:id,name,slug');

        return Inertia::render('Portfolio/Show', [
            'portfolio' => $portfolio->only('slug', 'title', 'media_path', 'media_type', 'category'),
        ]);
    }
}
