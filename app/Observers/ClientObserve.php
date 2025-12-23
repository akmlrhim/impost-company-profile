<?php

namespace App\Observers;

use App\Models\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class ClientObserve
{
	private const VERSION_KEY = 'clients_version';

	private function updateVersion()
	{
		Cache::forever(self::VERSION_KEY, now()->timestamp);
	}

	public function created(Client $client)
	{
		$this->updateVersion();
	}

	public function updated(Client $client)
	{
		$this->updateVersion();
	}

	public function deleted(Client $client)
	{
		$this->updateVersion();
	}
}
