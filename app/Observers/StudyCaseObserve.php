<?php

namespace App\Observers;

use App\Models\StudyCase;
use Illuminate\Support\Facades\Cache;

class StudyCaseObserve
{
	private const VERSION_KEY = 'study_cases_version';

	private function updateVersion()
	{
		Cache::forever(self::VERSION_KEY, now()->timestamp);
	}

	public function created(StudyCase $studyCas)
	{
		$this->updateVersion();
	}

	public function updated(StudyCase $studyCas)
	{
		$this->updateVersion();
	}

	public function deleted(StudyCase $studyCas)
	{
		$this->updateVersion();
	}
}
