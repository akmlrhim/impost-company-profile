<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\JobVacancy;
use App\Models\Portfolio;
use App\Models\StudyCase;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
	public function index()
	{
		$articles = Article::where('status', 'published')->latest()->get(['id', 'slug', 'updated_at']);
		$portfolios = Portfolio::latest()->get(['id', 'slug', 'updated_at']);
		$studyCase = StudyCase::latest()->get(['id', 'slug', 'updated_at']);
		$articleCategories = \App\Models\ArticleCategory::all(['id', 'slug', 'updated_at']);
		$jobVacancies = JobVacancy::where('status', 'Active')->latest()->get(['id', 'slug', 'updated_at']);

		return Response::view('sitemap', [
			'articles' => $articles,
			'portfolios' => $portfolios,
			'studyCases' => $studyCase,
			'articleCategories' => $articleCategories,
			'jobVacancies' => $jobVacancies,
			'now' => Carbon::now(),
		])->header('Content-Type', 'text/xml');
	}
}
