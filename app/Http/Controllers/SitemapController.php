<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\JobVacancy;
use App\Models\Portfolio;
use App\Models\StudyCase;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'published')->latest()->get(['id', 'slug', 'updated_at']);
        $portfolios = Portfolio::latest()->get(['id', 'slug', 'updated_at']);
        $studyCase = StudyCase::latest()->get(['id', 'slug', 'updated_at']);
        $jobVacancies = JobVacancy::where('status', 'Active')->latest()->get(['id', 'slug', 'updated_at']);

        return Response::view('sitemap', [
            'articles' => $articles,
            'portfolios' => $portfolios,
            'studyCases' => $studyCase,
            'jobVacancies' => $jobVacancies,
        ])->header('Content-Type', 'text/xml');
    }
}
