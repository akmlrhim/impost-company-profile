<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use App\Services\ClientService;
use App\Services\ServiceService;
use App\Services\TeamService;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Home';
		$page = request('page', 1);
		$services = ServiceService::paginate(6);
		$articles = ArticleService::paginate(6);
		$clients = ClientService::all();

		return view('public.home', compact(
			'title',
			'services',
			'articles',
			'clients'
		));
	}

	public function article(Article $article)
	{
		$title = 'Artikel';
		$latestArticle = $article->where('id', '!=', $article->id)->latest()->take(4)->get();

		return view('public.article', compact('title', 'article', 'latestArticle'));
	}

	public function articleAll()
	{
		$title = 'Semua Artikel';
		$articles = ArticleService::paginate(9);

		$articles->setPath(request()->url());

		return view('public.article-all', compact('title', 'articles'));
	}

	public function about()
	{
		$title = 'About';
		$page = request()->get('page', 1);

		$team = TeamService::paginate(4);
		$team->setPath(request()->url());

		return view('public.about', compact('title', 'team'));
	}

	public function contact()
	{
		$title = 'Kontak';
		return view('public.contact', compact('title'));
	}
}
