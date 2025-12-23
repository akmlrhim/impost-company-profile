<?php

namespace App\Observers;

use App\Models\Team;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class TeamObserve
{
	private const VERSION_KEY = 'teams_version';

	private function updateVersion()
	{
		Cache::forever(self::VERSION_KEY, now()->timestamp);
	}

	public function created(Team $team)
	{
		$this->updateVersion();
	}

	public function updated(Team $team)
	{
		$this->updateVersion();
	}

	public function deleted(Team $team)
	{
		$this->updateVersion();
	}
}
