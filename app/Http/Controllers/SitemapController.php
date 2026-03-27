<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\JobPosting;
use App\Models\Portfolio;
use App\Models\StudyCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
	public function index()
	{
		$articles = Article::latest()->get(['slug', 'updated_at']);
		$portfolios = Portfolio::latest()->get(['slug', 'updated_at']);
		$studyCase = StudyCase::latest()->get(['slug', 'updated_at']);
		$articleCategories = \App\Models\ArticleCategory::all(['slug', 'updated_at']);

		return Response::view('sitemap', [
			'articles' => $articles,
			'portfolios' => $portfolios,
			'studyCases' => $studyCase,
			'articleCategories' => $articleCategories,
		])->header('Content-Type', 'text/xml');
	}
}
