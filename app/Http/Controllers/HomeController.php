<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Service;
use App\Models\Team;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Home';
		$services = Service::cursorPaginate(6)->fragment('services');
		$articles = Article::latest()->take(3)->get();
		$clients = Client::all();

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
		return view('public.article', compact('title', 'article'));
	}

	public function about()
	{
		return view('public.about', [
			'title' => 'About',
			'team' => Team::get()
		]);
	}
}
