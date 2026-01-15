<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'slug',
		'description',
		'requirements',
		'responsibilities',
		'type',
		'status',
		'closing_date',
	];

	public function getRouteKeyName()
	{
		return 'slug';
	}
}
