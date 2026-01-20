<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobPostingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Job Posting';
		$search = request('search');

		$jobPostings = JobPosting::query()
			->when($search, function ($query) use ($search) {
				return $query->where('title', 'like', '%' . $search . '%')
					->orWhere('type', 'like', '%' . $search . '%');
			})
			->latest()
			->simplePaginate(10);

		return view('admin.jobpostings.index', compact('title', 'jobPostings', 'search'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$title = 'Create Job Posting';
		return view('admin.jobpostings.create', compact('title'));
	}

	/**
	 * Show the form for showing the specified resource.
	 */
	public function show(string $slug)
	{
		$title = 'Detail Job Posting';
		$jobPosting = JobPosting::where('slug', $slug)->firstOrFail();
		return view('admin.jobpostings.detail', compact('title', 'jobPosting'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required|string|max:255|unique:job_postings,title',
			'type' => 'required|string|max:255',
			'description' => 'required|string',
			'requirements' => 'required|string',
			'responsibilities' => 'required|string',
			'status' => 'required|string|max:255',
			'closing_date' => 'required|date',
			'apply_link' => 'required|url'
		]);

		try {
			DB::beginTransaction();

			JobPosting::create([
				'title' => $request->title,
				'slug' => Str::slug($request->title),
				'type' => $request->type,
				'description' => $request->description,
				'requirements'     => $request->requirements,
				'responsibilities' => $request->responsibilities,
				'status' => $request->status,
				'closing_date' => $request->closing_date,
				'apply_link' => $request->apply_link
			]);

			DB::commit();
			return redirect()->route('jobpostings.index')->with('success', 'Lowongan kerja berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $slug)
	{
		$title = 'Edit Job Posting';
		$jobPosting = JobPosting::where('slug', $slug)->firstOrFail();
		return view('admin.jobpostings.edit', compact('title', 'jobPosting'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $slug)
	{

		$jobPosting = JobPosting::where('slug', $slug)->firstOrFail();
		$request->validate([
			'title' => 'required|string|max:255|unique:job_postings,title,' . $jobPosting->id,
			'type' => 'required|string|max:255',
			'description' => 'required|string',
			'requirements' => 'required|string',
			'responsibilities' => 'required|string',
			'status' => 'required|string|max:255',
			'closing_date' => 'required|date',
			'apply_link' => 'required|url'
		]);

		try {
			DB::beginTransaction();

			$jobPosting->update([
				'title' => $request->title,
				'slug' => Str::slug($request->title),
				'type' => $request->type,
				'description' => $request->description,
				'requirements'     => $request->requirements,
				'responsibilities' => $request->responsibilities,
				'status' => $request->status,
				'closing_date' => $request->closing_date,
				'apply_link' => $request->apply_link
			]);

			DB::commit();
			return redirect()->route('jobpostings.index')->with('success', 'Lowongan kerja berhasil diubah.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(int $id)
	{
		try {
			DB::beginTransaction();

			$jobPosting = JobPosting::findOrFail($id);
			$jobPosting->delete();

			DB::commit();
			return back()->with('success', 'Lowongan kerja berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}
}
