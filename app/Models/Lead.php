<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
	protected $fillable = [
		'fullname',
		'email',
		'phone',
		'business_name',
		'income',
		'note',
		'objective'
	];
}
