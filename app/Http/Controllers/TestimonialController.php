<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Testimonials';
		$search = request('search');
		$testimonials = Testimonial::select('id', 'name', 'company_name', 'content', 'media_path', 'media_type')
			->when($search, function ($query) use ($search) {
				$query->where('name', 'like', "%{$search}%")
					->orWhere('company_name', 'like', "%{$search}%")
					->orWhere('content', 'like', "%{$search}%");
			})
			->latest()
			->paginate(6);
		return view('admin.testimonials.index', compact('title', 'testimonials', 'search'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$title = 'Create Testimonial';
		return view('admin.testimonials.create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'company_name' => 'required|string|max:255',
			'content' => 'required|string',
			'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,webm|max:20480',
		]);

		try {
			DB::beginTransaction();

			$mediaPath = null;
			$mediaType = null;

			// Cek apakah user mengupload file
			if ($request->hasFile('media')) {
				$file = $request->file('media');
				$mimeType = $file->getMimeType();

				// Tentukan tipe media berdasarkan mime type
				if (Str::startsWith($mimeType, 'image/')) {
					$mediaType = 'image';
				} elseif (Str::startsWith($mimeType, 'video/')) {
					$mediaType = 'video';
				}

				$mediaPath = $file->store('testimonials', 'public');
			}

			Testimonial::create([
				'name' => $request->name,
				'company_name' => $request->company_name,
				'content' => $request->content,
				'media_path' => $mediaPath,
				'media_type' => $mediaType,
			]);

			DB::commit();
			return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();

			if ($mediaPath && Storage::disk('public')->exists($mediaPath)) {
				Storage::disk('public')->delete($mediaPath);
			}

			return back()->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Testimonial $testimonial)
	{
		$title = 'Edit Testimonial';
		return view('admin.testimonials.edit', compact('title', 'testimonial'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Testimonial $testimonial)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'company_name' => 'required|string|max:255',
			'content' => 'required|string',
			'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,webm|max:20480',
			'remove_media' => 'nullable|boolean',
		]);

		try {
			DB::beginTransaction();

			$mediaPath = $testimonial->media_path;
			$mediaType = $testimonial->media_type;

			if ($request->boolean('remove_media')) {
				if ($mediaPath && Storage::disk('public')->exists($mediaPath)) {
					Storage::disk('public')->delete($mediaPath);
				}
				$mediaPath = null;
				$mediaType = null;
			}

			if ($request->hasFile('media')) {
				if ($testimonial->media_path && Storage::disk('public')->exists($testimonial->media_path)) {
					Storage::disk('public')->delete($testimonial->media_path);
				}

				$file = $request->file('media');
				$mimeType = $file->getMimeType();

				if (Str::startsWith($mimeType, 'image/')) {
					$mediaType = 'image';
				} elseif (Str::startsWith($mimeType, 'video/')) {
					$mediaType = 'video';
				} else {
					$mediaType = 'image';
				}

				$mediaPath = $file->store('testimonials', 'public');
			}

			$testimonial->update([
				'name' => $request->name,
				'company_name' => $request->company_name,
				'content' => $request->content,
				'media_path' => $mediaPath,
				'media_type' => $mediaType,
			]);

			DB::commit();
			return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();

			if ($request->hasFile('media') && isset($mediaPath) && Storage::disk('public')->exists($mediaPath)) {
				Storage::disk('public')->delete($mediaPath);
			}

			return back()->withInput()->withErrors(['error' => 'Gagal memperbarui: ' . $e->getMessage()]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Testimonial $testimonial)
	{
		try {

			$mediaPath = $testimonial->media_path;

			DB::beginTransaction();

			$testimonial->delete();

			if ($mediaPath && Storage::disk('public')->exists($mediaPath)) {
				Storage::disk('public')->delete($mediaPath);
			}

			DB::commit();
			return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}
}
