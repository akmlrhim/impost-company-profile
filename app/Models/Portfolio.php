<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	use HasFactory;

	protected $table = 'portfolio';
	protected $fillable = ['slug', 'title', 'description', 'cover_path'];

	public function getRouteKeyName()
	{
		return 'slug';
	}
}
