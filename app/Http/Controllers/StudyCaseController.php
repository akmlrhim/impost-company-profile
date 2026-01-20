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
		$search = request('search');

		$studyCases = StudyCase::when($search, function ($query) use ($search) {
			$query->where('name', 'like', '%' . $search . '%')
				->orWhere('situation', 'like', '%' . $search . '%')
				->orWhere('solution', 'like', '%' . $search . '%');
		})
			->latest()
			->paginate(8)
			->appends(request()->query());

		return view('admin.study-case.index', [
			'title' => $title,
			'studyCases' => $studyCases,
			'search' => $search
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
		try {
			DB::beginTransaction();

			$manager = new ImageManager(new Driver());

			$cover_path = null;

			if ($request->hasFile('cover_path')) {
				$img = $manager
					->read($request->file('cover_path'))
					->toWebp(quality: 60);

				$filename = Str::uuid() . '.webp';
				$cover_path = 'study_case/' . $filename;

				Storage::disk('public')->put($cover_path, $img);
			}

			// save study case
			$studyCase = StudyCase::create([
				'name' => $request->name,
				'slug' => Str::slug($request->name),
				'situation' => $request->situation,
				'solution' => $request->solution,
				'result' => $request->result,
				'cover_path' => $cover_path,
			]);

			DB::commit();

			return redirect()->route('study-case.index')->with('success', 'Study Case berhasil ditambahkan.');
		} catch (\Throwable $e) {
			DB::rollBack();
			// dd($e->getMessage());
			return back()->withInput();
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
			'studyCase' => $studyCase
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

			// cover
			$coverPath = $studyCase->cover_path;

			if ($request->hasFile('cover_path')) {

				// hapus cover lama
				if ($coverPath && Storage::disk('public')->exists($coverPath)) {
					Storage::disk('public')->delete($coverPath);
				}

				$img = $manager
					->read($request->file('cover_path'))
					->toWebp(quality: 60);

				$filename  = Str::uuid() . '.webp';
				$coverPath = 'study_case/' . $filename;

				Storage::disk('public')->put($coverPath, $img);
			}

			// update study case
			$studyCase->update([
				'name' => $request->name,
				'slug' => Str::slug($request->name),
				'situation' => $request->situation,
				'solution' => $request->solution,
				'result' => $request->result,
				'cover_path' => $coverPath,
			]);

			// image

			DB::commit();

			return redirect()->route('study-case.index')->with('success', 'Study Case berhasil diperbarui.');
		} catch (\Throwable $e) {
			DB::rollBack();

			// dd($e->getMessage());
			return back()->withInput();
		}
	}



	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(StudyCase $studyCase)
	{

		try {
			DB::beginTransaction();
			// delete cover
			if ($studyCase->cover_path && Storage::disk('public')->exists($studyCase->cover_path)) {
				Storage::disk('public')->delete($studyCase->cover_path);
			}

			$studyCase->delete();

			DB::commit();

			return redirect()->route('study-case.index')->with('success', 'Study Case berhasil dihapus.');
		} catch (\Throwable $e) {
			DB::rollBack();
			// dd($e->getMessage());
			return back()->with('error', 'Terjadi kesalahan saat menghapus Study Case.');
		}
	}
}
