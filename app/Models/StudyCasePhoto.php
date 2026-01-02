<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyCasePhoto extends Model
{
	protected $fillable = ['study_case_id', 'media_path'];

	public function studyCase()
	{
		return $this->belongsTo(StudyCase::class, 'study_case_id', 'id');
	}
}
