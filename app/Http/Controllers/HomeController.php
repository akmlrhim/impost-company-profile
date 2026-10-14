<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class HomeController extends Controller
{
    public function index(Request $request): InertiaResponse
    {
        $services = Service::query()
            ->orderBy('sort')
            ->get(['service_name', 'slug', 'description']);

        $portfolios = Portfolio::query()
            ->with('category:id,name')
            ->latest()
            ->limit(6)
            ->get(['slug', 'title', 'media_path', 'category_id']);

        return Inertia::render('Home', [
            'services' => $services,
            'portfolios' => $portfolios,
        ]);
    }
}
