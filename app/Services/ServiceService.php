<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceService
{
	private const PREFIX = 'services';
	private const TTL = 600;
	private const VERSION_KEY = 'services_version';

	public static function paginate($perPage, $search = null)
	{
		if ($search) {
			return Service::query()
				->where(function ($query) use ($search) {
					$query->where('service_name', 'like', '%' . $search . '%');
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
			fn() => Service::query()->orderBy('created_at', 'DESC')->paginate($perPage)->onEachSide(1)->withQueryString()
		);
	}
}
