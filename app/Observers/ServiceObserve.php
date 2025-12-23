<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceObserve
{
	private const VERSION_KEY = 'services_version';

	private function updateVersion()
	{
		Cache::forever(self::VERSION_KEY, now()->timestamp);
	}

	public function created(Service $service)
	{
		$this->updateVersion();
	}

	public function updated(Service $service)
	{
		$this->updateVersion();
	}

	public function deleted(Service $service)
	{
		$this->updateVersion();
	}
}
