<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\Cache;

class ClientService
{
	private const PREFIX = 'clients';
	private const TTL = 600;
	private const VERSION_KEY = 'clients_version';

	public static function all()
	{
		$currentVersion = Cache::get(self::VERSION_KEY, 'init');

		return Cache::remember(
			self::PREFIX . '.all.v' . $currentVersion,
			self::TTL,
			fn() => Client::query()->latest()->get()
		);
	}

	public static function paginate($perPage)
	{
		$page = request()->get('page', 1);
		$currentVersion = Cache::get(self::VERSION_KEY, 'init');
		$cacheKey = self::PREFIX . ".page.$page.v" . $currentVersion;

		return Cache::remember(
			$cacheKey,
			self::TTL,
			fn() => Client::query()->latest()->paginate($perPage)->onEachSide(1)->withQueryString()
		);
	}
}
