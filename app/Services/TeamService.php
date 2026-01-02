<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Support\Facades\Cache;

class TeamService
{
	private const PREFIX = 'teams';
	private const TTL = 3600;
	private const VERSION_KEY = "teams_version";

	public static function paginate($perPage, $search = null)
	{
		$page = request()->get('page', 1);
		$currentVersion = Cache::get(self::VERSION_KEY, 'init');
		$cacheKey = self::PREFIX . ".page.$page.v" . $currentVersion;

		return Cache::remember(
			$cacheKey,
			self::TTL,
			fn() => Team::query()->orderBy('created_at', 'DESC')->paginate($perPage)->onEachSide(1)->withQueryString()
		);
	}

	public static function allCached()
	{
		$version = Cache::get(self::VERSION_KEY, 1);
		$cacheKey = self::PREFIX . ".all.v$version";

		return Cache::remember(
			$cacheKey,
			self::TTL,
			fn() => Team::orderByDesc('created_at')->get()
		);
	}
}
