<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyCaseRequest;
use App\Models\StudyCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class StudyCaseController extends Controller
{
	public function index()
	{
		$title = 'Study Case';
		$search = request()->string('search')->trim();

		$studyCases = StudyCase::when($search, function ($query) use ($search) {
			$query->where('name', 'like', '%' . $search . '%')
				->orWhere('situation', 'like', '%' . $search . '%')
				->orWhere('solution', 'like', '%' . $search . '%');
		})
			->latest()
			->simplePaginate(8)
			->withQueryString();

		return view('admin.study-cases.index', [
			'title' => $title,
			'studyCases' => $studyCases,
			'search' => $search
		]);
	}

	public function create()
	{
		return view('admin.study-cases.create', [
			'title' => 'Tambah Study Case',
			'categories' => StudyCase::select('category')
				->distinct()
				->orderBy('category')
				->pluck('category')
		]);
	}

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

			StudyCase::create([
				'name' => $request->name,
				'slug' => Str::slug($request->name . '-' . $request->category),
				'category' => $request->category,
				'situation' => $request->situation,
				'solution' => $request->solution,
				'result' => $request->result,
				'cover_path' => $cover_path,
			]);

			DB::commit();

			return redirect()->route('study-case.index')->with('success', 'Study Case berhasil ditambahkan.');
		} catch (\Throwable $e) {
			DB::rollBack();
			return back()->withInput()->withErrors(['upload' => 'Gagal menyimpan study case: ' . $e->getMessage()]);
		}
	}

	public function edit(StudyCase $studyCase)
	{
		return view('admin.study-cases.edit', [
			'title' => 'Edit Study Case',
			'studyCase' => $studyCase,
			'categories' => StudyCase::select('category')
				->distinct()
				->orderBy('category')
				->pluck('category')
		]);
	}

	public function update(StudyCaseRequest $request, StudyCase $studyCase)
	{
		try {
			DB::beginTransaction();

			$manager = new ImageManager(new Driver());

			$coverPath = $studyCase->cover_path;

			if ($request->hasFile('cover_path')) {
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

			$studyCase->update([
				'name' => $request->name,
				'slug' => Str::slug($request->name . '-' . $request->category),
				'category' => $request->category,
				'situation' => $request->situation,
				'solution' => $request->solution,
				'result' => $request->result,
				'cover_path' => $coverPath,
			]);

			DB::commit();

			return redirect()->route('study-case.index')->with('success', 'Study Case berhasil diperbarui.');
		} catch (\Throwable $e) {
			DB::rollBack();
			return back()->withInput()->withErrors(['upload' => 'Gagal memperbarui study case: ' . $e->getMessage()]);
		}
	}

	public function destroy(StudyCase $studyCase)
	{
		try {
			DB::beginTransaction();

			if ($studyCase->cover_path && Storage::disk('public')->exists($studyCase->cover_path)) {
				Storage::disk('public')->delete($studyCase->cover_path);
			}

			$studyCase->delete();

			DB::commit();

			return redirect()->route('study-case.index')->with('success', 'Study Case berhasil dihapus.');
		} catch (\Throwable $e) {
			DB::rollBack();
			return back()->with('error', 'Gagal menghapus study case: ' . $e->getMessage());
		}
	}
}
