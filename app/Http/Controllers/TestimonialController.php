<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Testimonials';
		$testimonials = Testimonial::select('id', 'name', 'company_name', 'content')->latest()->paginate(4);
		return view('admin.testimonials.index', compact('title', 'testimonials'));
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
		]);

		try {
			DB::beginTransaction();

			Testimonial::create([
				'name' => $request->name,
				'company_name' => $request->company_name,
				'content' => $request->content,
			]);
			DB::commit();
			return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
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
		try {
			DB::beginTransaction();

			$testimonial->update([
				'name' => $request->name,
				'company_name' => $request->company_name,
				'content' => $request->content
			]);

			DB::commit();
			return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Testimonial $testimonial)
	{
		try {
			DB::beginTransaction();

			$testimonial->delete();

			DB::commit();
			return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}
}
