<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	protected $table = 'portfolio';
	protected $fillable = ['slug', 'name', 'cover_path'];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function photos()
	{
		return $this->hasMany(PortfolioPhoto::class);
	}
}
