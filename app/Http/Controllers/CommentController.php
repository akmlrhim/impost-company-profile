<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
	public function store(Request $request)
	{
		$request->validate([
			'article_id' => 'required|exists:articles,id',
			'email' => 'required|email:dns|string|max:120|unique:comments,email,except,id',
			'fullname' => 'required|string|max:120|unique:comments,fullname,except,id',
			'comment' => 'required|string'
		]);

		try {
			DB::beginTransaction();
			Comment::create([
				'article_id' => $request->article_id,
				'email' => $request->email,
				'fullname' => $request->fullname,
				'comment' => $request->comment
			]);

			DB::commit();
			return back()
				->with('success', 'Komentar anda berhasil dikirim, akan kami tinjau terlebih dahulu.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	public function status(Article $article, Comment $comment,  Request $request)
	{
		try {
			DB::beginTransaction();

			if ($comment->article_id !== $article->id) {
				abort(404);
			}

			$comment->status = $request->status;
			$comment->save();
			DB::commit();
			return back()->with('success', 'Status Komentar telah diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back();
		}
	}
}
