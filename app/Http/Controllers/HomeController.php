<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Portfolio;
use App\Services\ArticleService;
use App\Services\ClientService;
use App\Services\ServiceService;
use App\Services\TeamService;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Home';

		$servicesForDesktop = ServiceService::paginate(6);
		$servicesForMobile = ServiceService::all();
		$articles = ArticleService::paginateHome(3);
		$clients = ClientService::all();

		$comproUrl = base64_encode(config('app.compro_video_url'));

		return view('public.home', compact(
			'title',
			'servicesForDesktop',
			'servicesForMobile',
			'articles',
			'clients',
			'comproUrl'
		));
	}

	public function article(Article $article)
	{
		$title = 'Artikel';
		$latestArticle = $article->where('id', '!=', $article->id)
			->latest()
			->take(4)
			->get();

		return view('public.article', compact('title', 'article', 'latestArticle'));
	}

	public function articleAll()
	{
		$title = 'Semua Artikel';
		$articles = ArticleService::paginateAll(6);

		return view('public.article-all', compact('title', 'articles'));
	}

	public function about()
	{
		$title = 'About';

		$team = TeamService::allCached();

		return view('public.about', compact('title', 'team'));
	}

	public function contact()
	{
		$title = 'Kontak';
		return view('public.contact', compact('title'));
	}

	public function portfolio()
	{
		$title = 'Portfolio';
		$portfolio = Portfolio::paginate(8);

		return view('public.portfolio.index', compact('title', 'portfolio'));
	}

	public function portfolioDetail(Portfolio $portfolio)
	{
		$title = 'Portfolio';

		return view('public.portfolio.detail', compact('title', 'portfolio'));
	}

	public function studyCase() {}

	public function optIn()
	{

		$title = 'OPT-IN';
		$optUrl = '';

		return view('public.opt-in', compact('title', 'optUrl'));
	}
}
