<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancyDetail extends Model
{
	/** @use HasFactory<\Database\Factories\JobVacancyDetailFactory> */
	use HasFactory;

	protected $fillable = [
		'job_id',
		'section',
		'content',
		'sort_order',
	];

	public function job()
	{
		return $this->belongsTo(JobVacancy::class);
	}
}
