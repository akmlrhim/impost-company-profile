<?php

namespace App\Services;

use App\Models\StudyCase;
use Illuminate\Support\Facades\Cache;

class StudyCaseService
{
	private const PREFIX = 'study_cases';
	private const TTL = 3600;
	private const VERSION_KEY = 'study_cases_version';

	public static function all()
	{
		$currentVersion = Cache::get(self::VERSION_KEY, 'init');

		return Cache::remember(
			self::PREFIX . '.all.v' . $currentVersion,
			self::TTL,
			fn() => StudyCase::query()->latest()->get()
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
			fn() => StudyCase::query()->latest()
				->paginate($perPage)
				->onEachSide(1)
				->withQueryString()
				->fragment('study-cases')
		);
	}
}
