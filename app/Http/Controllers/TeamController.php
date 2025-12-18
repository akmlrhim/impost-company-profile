<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view(
			'admin.teams.index',
			[
				'title' => 'Team',
				'teams' => Team::orderBy('sort_order', 'ASC')
					->latest()
					->simplePaginate()
			]
		);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view(
			'admin.teams.create',
			['title' => 'Tambah Teams']
		);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(TeamRequest $request)
	{
		try {
			DB::beginTransaction();

			Team::create([
				'fullname' => $request->fullname,
				'slug' => Str::slug($request->fullname),
				'position' => Str::title($request->position),
				'instagram_link' => $request->instagram_link,
				'linkedin_link' => $request->linkedin_link,
				'photo' => $request->file('photo')->store('team_photos', 'public'),
				'sort_order' => $request->sort_order
			]);

			DB::commit();
			return redirect()->route('teams.index')->with('success', 'Team berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Team $team)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Team $team)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Team $team)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Team $team)
	{
		//
	}
}
