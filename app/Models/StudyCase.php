<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyCase extends Model
{
	use HasFactory;

	protected $fillable = [
		'slug',
		'name',
		'situation',
		'solution',
		'result',
		'cover_path',
		'category'
	];

	public function getRouteKeyName()
	{
		return "slug";
	}
}
