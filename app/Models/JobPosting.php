<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
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
}
