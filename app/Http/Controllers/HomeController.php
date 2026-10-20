<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
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
            ->get(['service_name', 'slug', 'description', 'cover_path']);

        $clients = Client::query()
            ->get(['filename', 'client_logo']);

        $articles = Article::query()
            ->where('status', 'published')
            ->latest()
            ->take(7)
            ->get(['title', 'slug', 'excerpt', 'cover_path', 'written_by', 'created_at']);

        return Inertia::render('Home', [
            'services' => $services,
            'clients' => $clients,
            'articles' => $articles,
        ]);
    }
}
