<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobVacancyRequest;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JobVacancyController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Loker';
		$jobs = JobVacancy::paginate(10);

		return view('admin.job-vacancies.index', compact('title', 'jobs'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$title = 'Tambah Loker';

		return view('admin.job-vacancies.create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(JobVacancyRequest $request)
	{
		$validated = $request->validated();

		$posterPath = null;

		if ($request->hasFile('poster')) {
			$posterPath = $request->file('poster')->store('posters', 'public');
		}

		try {
			DB::beginTransaction();

			$job = JobVacancy::create([
				'title' => $validated['title'],
				'slug' => Str::slug($validated['title']) . uniqid(),
				'employment_type' => $validated['employment_type'],
				'duration' => $validated['duration'],
				'work_arrangements' => $validated['work_arrangements'],
				'apply_email' => $validated['apply_email'],
				'apply_subject' => $validated['apply_subject'],
				'poster' => $posterPath,
				'status' => $validated['status']
			]);

			$detailsData = [];

			foreach ($validated['details'] as $index => $detail) {
				$detailsData[] = [
					'section' => $detail['section'],
					'content' => $detail['content'],
					'sort_order' => $index + 1
				];
			}


			$job->details()->createMany($detailsData);

			DB::commit();

			return redirect()->route('jobvacancies.index')->with('success', 'Lowongan Pekerjaan berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			if ($posterPath && Storage::disk('public')->exists($posterPath)) {
				Storage::disk('public')->delete($posterPath);
			}
			// return back()->withInput()->with('error', $e->getMessage());
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(JobVacancy $jobvacancy)
	{
		$jobvacancy->load('details');
		$title = 'Detail Loker';

		return view('admin.job-vacancies.show', compact('title', 'jobvacancy'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(JobVacancy $jobvacancy)
	{
		$jobvacancy->load('details');
		$title = 'Edit Loker';
		return view('admin.job-vacancies.edit', compact('jobvacancy', 'title'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(JobVacancyRequest $request, JobVacancy $jobvacancy)
	{
		$validated = $request->validated();
		$oldPosterPath = $jobvacancy->poster;
		$newPosterPath = null;

		if ($request->file('poster')) {
			$newPosterPath = $request->file('poster')->store('posters', 'public');
		}

		try {
			DB::beginTransaction();

			$jobvacancy->update([
				'title' => $validated['title'],
				'slug' => Str::slug($validated['title']) . uniqid(),
				'employment_type' => $validated['employment_type'],
				'duration' => $validated['duration'],
				'work_arrangements' => $validated['work_arrangements'],
				'apply_email' => $validated['apply_email'],
				'apply_subject' => $validated['apply_subject'],
				'poster' => $newPosterPath ? $newPosterPath : $oldPosterPath,
				'status' => $validated['status']
			]);

			$jobvacancy->details()->delete();

			$detailsData = [];
			foreach ($validated['details'] as $index => $detail) {
				$detailsData[] = [
					'section' => $detail['section'],
					'content' => $detail['content'],
					'sort_order' => $index + 1
				];
			}

			$jobvacancy->details()->createMany($detailsData);

			DB::commit();
			return redirect()->route('jobvacancies.index')->with('success', 'Loker berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			dd($e->getMessage(), $e->getTraceAsString());
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(JobVacancy $jobvacancy)
	{
		try {
			$posterPath = $jobvacancy->poster;

			DB::beginTransaction();

			$jobvacancy->details()->delete();
			$jobvacancy->delete();

			DB::commit();

			if ($posterPath && Storage::disk('public')->exists($posterPath)) {
				Storage::disk('public')->delete($posterPath);
			}

			return redirect()->back()->with('success', 'Loker berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back();
		}
	}
}
