<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{
	public function store(Request $r)
	{
		$r->validate([
			'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,bmp,webp|max:5120',
		]);

		if ($r->hasFile('image')) {
			$path = $r->file('image')->store('editor', 'public');
			$url = Storage::url($path);

			return response()->json(['url' => $url], 200);
		}

		return response()->json(['error' => 'No file uploaded'], 400);
	}
}
