<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;

class CareerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Lowongan Kerja';
		$search = request('search');

		$jobPostings = JobPosting::select('id', 'title', 'type', 'status', 'closing_date')
			->when($search, function ($query) use ($search) {
				return $query->where('title', 'like', '%' . $search . '%')
					->orWhere('type', 'like', '%' . $search . '%');
			})
			->orderBy('created_at', 'DESC')
			->get();

		return view('admin.careers.index', compact('title', 'jobPostings', 'search'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
