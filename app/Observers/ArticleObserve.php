<?php

namespace App\Observers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;


class ArticleObserve
{
	private const VERSION_KEY = 'articles_version';

	private function updateVersion()
	{
		Cache::forever(self::VERSION_KEY, now()->timestamp);
	}

	public function created(Article $article)
	{
		$this->updateVersion();
	}

	public function updated(Article $article)
	{
		$this->updateVersion();
	}

	public function deleted(Article $article)
	{
		$this->updateVersion();
	}
}
