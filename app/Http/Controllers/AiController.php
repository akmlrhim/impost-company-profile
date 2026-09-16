<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Response;

class AiController extends Controller
{
    public function llmsTxt()
    {
        $articles = Article::where('status', 'published')
            ->latest()
            ->limit(10)
            ->get(['id', 'title', 'slug']);

        return Response::view('llms-txt', ['articles' => $articles])
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }
}
