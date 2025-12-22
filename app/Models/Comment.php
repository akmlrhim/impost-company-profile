<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/** @use HasFactory<\Database\Factories\CommentFactory> */
	use HasFactory;

	protected $fillable = [
		'article_id',
		'email',
		'fullname',
		'comment',
		'status'
	];

	public function article()
	{
		return $this->belongsTo(Article::class);
	}
}
