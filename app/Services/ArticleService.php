<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleService
{
	private const PREFIX = 'articles';
	private const TTL = 600;

	public static function all()
	{
		return Cache::remember(
			self::PREFIX . '.all',
			self::TTL,
			fn() => Article::query()->orderBy('created_at', 'DESC')->get()
		);
	}

	public static function paginate($perPage)
	{
		$page = request()->get('page', 1);

		return Cache::remember(
			self::PREFIX . ".page.$page",
			self::TTL,
			fn() => Article::query()->orderBy('created_at', 'DESC')->paginate($perPage)
		);
	}
}
