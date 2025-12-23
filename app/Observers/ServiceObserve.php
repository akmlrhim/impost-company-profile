<?php

namespace App\Observers;

use Illuminate\Support\Facades\File;

class ServiceObserve
{
	private const PREFIX = 'services';

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
