<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioRequest;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PortfolioController extends Controller
{
    use HandlesUploads;

    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Portfolios/Index', [
            'portfolios' => Portfolio::query()
                ->with('category:id,name')
                ->latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Portfolios/Create', [
            'categories' => PortfolioCategory::orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function store(PortfolioRequest $request)
    {
        $validated = $request->validated();
        $data = $this->stripUploadKeys($validated, 'media_file');
        $data['media_path'] = $this->resolveImagePath($validated, 'media_file', 'media_path', null);

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio created.');
    }

    public function edit(Portfolio $portfolio): Response
    {
        return Inertia::render('Admin/Portfolios/Edit', [
            'portfolio' => $portfolio->load('category'),
            'categories' => PortfolioCategory::orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $validated = $request->validated();
        $data = $this->stripUploadKeys($validated, 'media_file');
        $data['media_path'] = $this->resolveImagePath($validated, 'media_file', 'media_path', $portfolio->media_path);

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio updated.');
    }

    public function destroy(Portfolio $portfolio)
    {
        $this->deleteImage($portfolio->media_path);

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio deleted.');
    }
}
