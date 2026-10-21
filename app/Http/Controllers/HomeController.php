<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Service;
use App\Models\Testimonial;
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

        $testimonials = Testimonial::query()
            ->orderBy('id')
            ->get(['type', 'name', 'company_name', 'content', 'media_path', 'media_type']);

        $articles = Article::query()
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get(['title', 'slug', 'excerpt', 'cover_path', 'written_by', 'created_at']);

        return Inertia::render('Home', [
            'services' => $services,
            'clients' => $clients,
            'testimonials' => $testimonials,
            'articles' => $articles,
        ]);
    }
}
