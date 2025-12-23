<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Support\Facades\Cache;

class TeamService
{
	private const PREFIX = 'teams';
	private const TTL = 600;

	public static function all()
	{
		return Cache::remember(
			self::PREFIX . '.all',
			self::TTL,
			fn() => Team::query()->orderBy('created_at', 'DESC')->get()
		);
	}

	public static function paginate($perPage)
	{
		$page = request()->get('page', 1);

		return Cache::remember(
			self::PREFIX . ".page.$page",
			self::TTL,
			fn() => Team::query()->orderBy('created_at', 'DESC')->paginate($perPage)
		);
	}
}
