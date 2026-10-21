<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'fullname',
        'employee_id',
        'position',
        'photo',
        'join_date',
        'qr_code_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
