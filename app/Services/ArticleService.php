<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleService
{
	private const PREFIX = 'articles';
	private const VERSION_KEY = 'articles_version';
	private const TTL = 600;

	public static function paginateHome($perPage)
	{
		$page = request()->get('page', 1);
		$currentVersion = Cache::get(self::VERSION_KEY, 'init');
		$cacheKey = self::PREFIX . ".page.$page.v" . $currentVersion;

		return Cache::remember(
			$cacheKey,
			self::TTL,
			fn() => Article::query()->orderBy('created_at', 'DESC')->paginate($perPage)->onEachSide(1)->withQueryString()
		);
	}

	public static function paginateAll($perPage)
	{
		$page = request()->get('page', 1);
		$currentVersion = Cache::get(self::VERSION_KEY, 'init');
		$cacheKey = self::PREFIX . ".page.$page.all.v" . $currentVersion;

		return Cache::remember(
			$cacheKey,
			self::TTL,
			fn() => Article::query()->orderBy('created_at', 'DESC')->paginate($perPage)->onEachSide(1)->withQueryString()
		);
	}
}
