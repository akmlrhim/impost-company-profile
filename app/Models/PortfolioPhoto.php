<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioPhoto extends Model
{
	protected $table = 'portfolio_photo';
	protected $fillable = ['portfolio_id', 'photo_path'];

	public function portfolio()
	{
		return $this->belongsTo(Portfolio::class);
	}
}
