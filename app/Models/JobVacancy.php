<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    /** @use HasFactory<\Database\Factories\JobVacancyFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'employment_type',
        'work_arrangements',
        'duration',
        'apply_email',
        'apply_subject',
        'status',
        'poster',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $casts = [
        'work_arrangements' => 'array',
    ];

    public function details()
    {
        return $this->hasMany(JobVacancyDetail::class, 'job_id')->orderBy('sort_order', 'asc');
    }
}
