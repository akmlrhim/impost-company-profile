<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyCaseMedia extends Model
{
	protected $table = 'study_case_medias';
	protected $fillable = [
		'study_case_id',
		'file_path',
		'media_type',
		'filename'
	];

	public function studyCase()
	{
		return $this->belongsTo(StudyCase::class, 'study_case_id', 'id');
	}
}
