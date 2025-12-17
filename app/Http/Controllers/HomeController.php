<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Service;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Home';
		$services = Service::simplePaginate(6)->fragment('services');
		$articles = Article::latest()->take(3)->get();

		return view('public.home', compact('title', 'services', 'articles'));
	}

	public function article(Article $article)
	{
		$title = 'Artikel';
		return view('public.article', compact('title', 'article'));
	}
}
