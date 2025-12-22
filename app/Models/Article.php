<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Article extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'slug',
		'content',
		'cover_path',
		'excerpt',
		'meta_title',
		'meta_description',
		'status',
	];

	protected $casts = [
		'created_at' => 'datetime'
	];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	protected static function booted()
	{
		static::saved(fn() => Cache::flush());
		static::deleted(fn() => Cache::flush());
	}
}
