<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\Cache;

class ClientService
{
	private const PREFIX = 'clients';
	private const TTL = 600;

	public static function all()
	{
		return Cache::remember(
			'clients.all',
			self::TTL,
			fn() => Client::query()->orderBy('created_at', 'DESC')->get()
		);
	}

	public static function paginate($perPage)
	{
		$page = request()->get('page', 1);

		return Cache::remember(
			self::PREFIX . ".page.$page",
			self::TTL,
			fn() => Client::query()->orderBy('created_at', 'DESC')->paginate($perPage)
		);
	}
}
