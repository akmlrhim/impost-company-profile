<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceService
{
	private const PREFIX = 'services';
	private const TTL = 3600;
	private const VERSION_KEY = 'services_version';

	public static function all()
	{
		$currentVersion = Cache::get(self::VERSION_KEY, 'init');

		return Cache::remember(
			self::PREFIX . '.all.v' . $currentVersion,
			self::TTL,
			fn() => Service::query()->orderBy('sort', 'ASC')->get()
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
			fn() => Service::query()->orderBy('sort', 'ASC')
				->paginate($perPage)
				->onEachSide(1)
				->withQueryString()
				->fragment('services')
		);
	}
}
