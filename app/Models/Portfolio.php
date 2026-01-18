<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	use HasFactory;

	protected $table = 'portfolio';
	protected $fillable = [
		'slug',
		'title',
		'media_path',
		'media_type',
		'category_id',
	];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function category()
	{
		return $this->belongsTo(PortfolioCategory::class);
	}
}
