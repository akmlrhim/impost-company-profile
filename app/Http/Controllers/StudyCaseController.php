<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyCaseRequest;
use App\Models\StudyCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class StudyCaseController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Study Case';

		return view('admin.study-case.index', [
			'title' => $title,
			'studyCases' => StudyCase::paginate(8)
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.study-case.create', [
			'title' => 'Tambah Study Case'
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StudyCaseRequest $request)
	{
		DB::beginTransaction();

		try {
			$manager = new ImageManager(new Driver());

			$cover_path = null;

			if ($request->hasFile('cover_path')) {
				$img = $manager->read($request->file('cover_path'))->toWebp(quality: 60);

				$filename = Str::uuid() . '.webp';
				$path = 'study_case/' . $filename;

				Storage::disk('public')->put($path, $img);
				$cover_path = $path;
			}

			$studyCase = StudyCase::create([
				'name' => $request->name,
				'slug' => Str::slug($request->name),
				'situation' => $request->situation,
				'solution' => $request->solution,
				'result' => $request->result,
				'cover_path' => $cover_path
			]);

			if ($request->hasFile('photos')) {
				foreach ($request->file('photos') as $photoFile) {
					$img = $manager
						->read($photoFile)
						->toWebp(quality: 60);

					$filename = Str::uuid() . '.webp';
					$path = 'study_case/photos/' . $filename;

					Storage::disk('public')->put($path, $img);

					$studyCase->photos()->create([
						'photo_path' => $path
					]);
				}
			}

			DB::commit();

			return redirect()->route('study-case.index')->with('success', 'Study case berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();

			// Hapus file yang sudah terupload jika error
			if (isset($cover_path) && Storage::disk('public')->exists($cover_path)) {
				Storage::disk('public')->delete($cover_path);
			}

			return redirect()
				->back()
				->withInput()
				->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(StudyCase $studyCase)
	{
		$title = 'Edit Portfolio';

		return view('admin.study-case.edit', [
			'title' => $title,
			'studyCase' => $studyCase->load('photos')
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(StudyCaseRequest $request, StudyCase $studyCase)
	{
		DB::beginTransaction();

		try {
			$manager = new ImageManager(new Driver());

			// ===== COVER =====
			$cover_path = $studyCase->cover_path;

			if ($request->hasFile('cover_path')) {

				// hapus cover lama
				if ($cover_path && Storage::disk('public')->exists($cover_path)) {
					Storage::disk('public')->delete($cover_path);
				}

				$img = $manager
					->read($request->file('cover_path'))
					->toWebp(quality: 60);

				$filename = Str::uuid() . '.webp';
				$cover_path = 'study_case/' . $filename;

				Storage::disk('public')->put($cover_path, $img);
			}

			// ===== UPDATE DATA =====
			$studyCase->update([
				'name' => $request->name,
				'slug' => Str::slug($request->name),
				'situation' => $request->situation,
				'solution' => $request->solution,
				'result' => $request->result,
				'cover_path' => $cover_path,
			]);

			// ===== PHOTOS (optional replace) =====
			if ($request->hasFile('photos')) {

				// hapus foto lama
				foreach ($studyCase->photos as $photo) {
					if (Storage::disk('public')->exists($photo->photo_path)) {
						Storage::disk('public')->delete($photo->photo_path);
					}
				}
				$studyCase->photos()->delete();

				// simpan foto baru
				foreach ($request->file('photos') as $photoFile) {
					$img = $manager
						->read($photoFile)
						->toWebp(quality: 60);

					$filename = Str::uuid() . '.webp';
					$path = 'study_case/photos/' . $filename;

					Storage::disk('public')->put($path, $img);

					$studyCase->photos()->create([
						'photo_path' => $path
					]);
				}
			}

			DB::commit();

			return redirect()
				->route('study-case.index')
				->with('success', 'Study case berhasil diperbarui.');
		} catch (\Throwable $e) {

			DB::rollBack();

			return back()
				->withInput()
				->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
		}
	}


	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
