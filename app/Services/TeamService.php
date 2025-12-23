<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Support\Facades\Cache;

class TeamService
{
	private const PREFIX = 'teams';
	private const TTL = 600;
	private const VERSION_KEY = "teams_version";

	public static function paginate($perPage, $search = null)
	{
		if ($search) {
			return Team::query()
				->where(function ($query) use ($search) {
					$query->where('fullname', 'like', '%' . $search . '%');
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
			fn() => Team::query()->orderBy('created_at', 'DESC')->paginate($perPage)->onEachSide(1)->withQueryString()
		);
	}
}
