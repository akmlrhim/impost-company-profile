<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleService
{
	private const PREFIX = 'articles';
	private const VERSION_KEY = 'articles_version';
	private const TTL = 600;

	public static function paginate($perPage, $search = null)
	{
		if ($search) {
			return Article::query()
				->where(function ($query) use ($search) {
					$query->where('title', 'like', '%' . $search . '%');
				})
				->orderBy('created_at', 'DESC')
				->paginate($perPage)
				->withQueryString();
		}

		$page = request()->get('page', 1);
		$currentVersion = Cache::get(self::VERSION_KEY, 'init');
		$cacheKey = self::PREFIX . ".page.$page.v" . $currentVersion;

		return Cache::remember(
			$cacheKey,
			self::TTL,
			fn() => Article::query()->orderBy('created_at', 'DESC')->paginate($perPage)->onEachSide(1)->withQueryString()
		);
	}
}
