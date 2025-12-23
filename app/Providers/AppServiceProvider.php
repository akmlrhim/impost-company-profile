<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Service;
use App\Models\Team;
use App\Observers\ArticleObserve;
use App\Observers\ArticleObserver;
use App\Observers\ClientObserve;
use App\Observers\ClientObserver;
use App\Observers\ServiceObserve;
use App\Observers\TeamObserve;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		if (str_contains(request()->header('host'), 'ngrok')) {
			URL::forceScheme('https');
		}

		Service::observe(ServiceObserve::class);
		Article::observe(ArticleObserve::class);
		Client::observe(ClientObserve::class);
		Team::observe(TeamObserve::class);
	}
}
