<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class ArticleObserver
{
	public function created()
	{
		Cache::flush();
	}
	public function updated()
	{
		Cache::flush();
	}
	public function deleted()
	{
		Cache::flush();
	}
}
