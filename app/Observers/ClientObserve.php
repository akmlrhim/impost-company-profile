<?php

namespace App\Observers;

use App\Models\Client;
use Illuminate\Support\Facades\File;

class ClientObserve
{
	private const PREFIX = 'client';

	private function clearCache()
	{
		$path = storage_path('framework/cache/data');

		collect(File::allFiles($path))
			->filter(fn($file) => str_contains($file->getFilename(), self::PREFIX))
			->each(fn($file) => File::delete($file));
	}

	public function created()
	{
		$this->clearCache();
	}

	public function updated()
	{
		$this->clearCache();
	}

	public function deleted()
	{
		$this->clearCache();
	}
}
