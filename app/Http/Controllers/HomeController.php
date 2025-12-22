<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Home';

		$page = request('page', 1);

		$services = Cache::remember(
			"landing_services_page_{$page}",
			600,
			function () {
				return Service::cursorPaginate(6)->fragment('services');
			}
		);

		$articles = Cache::remember(
			'landing_articles_latest_3',
			600,
			function () {
				return Article::latest()->take(3)->get();
			}
		);

		$clients = Cache::remember(
			'landing_clients_all',
			600,
			function () {
				return Client::get();
			}
		);

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
		$page = request()->get('page', 1);

		$articles = Cache::remember(
			"articles_all_page_{$page}",
			now()->addMinutes(15),
			function () {
				return Article::latest()->paginate(9);
			}
		);

		return view('public.article-all', compact('title', 'articles'));
	}

	public function about()
	{
		$title = 'About';
		$page = request()->get('page', 1);

		$team = Cache::remember(
			"team_pages_{$page}",
			now()->addMinutes(15),
			function () {
				return Team::get();
			}
		);

		return view('public.about', compact('title', 'team'));
	}

	public function contact()
	{
		$title = 'Kontak';
		return view('public.contact', compact('title'));
	}
}
