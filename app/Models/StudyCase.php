<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyCase extends Model
{
	protected $fillable = [
		'slug',
		'name',
		'situation',
		'solution',
		'result',
		'cover_path'
	];

	public function getRouteKeyName()
	{
		return "slug";
	}

	public function photos()
	{
		return $this->hasMany(StudyCasePhoto::class);
	}
}
