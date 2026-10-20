<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioCategoryRequest;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PortfolioCategoryController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Admin/PortfolioCategories/Index', [
            'categories' => PortfolioCategory::query()
                ->orderBy('name')
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/PortfolioCategories/Create');
    }

    public function store(PortfolioCategoryRequest $request)
    {
        PortfolioCategory::create($request->validated());

        return redirect()->route('admin.portfolio-categories.index')->with('success', 'Category created.');
    }

    public function edit(PortfolioCategory $portfolioCategory): Response
    {
        return Inertia::render('Admin/PortfolioCategories/Edit', [
            'category' => $portfolioCategory,
        ]);
    }

    public function update(PortfolioCategoryRequest $request, PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->update($request->validated());

        return redirect()->route('admin.portfolio-categories.index')->with('success', 'Category updated.');
    }

    public function destroy(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->delete();

        return redirect()->route('admin.portfolio-categories.index')->with('success', 'Category deleted.');
    }
}
