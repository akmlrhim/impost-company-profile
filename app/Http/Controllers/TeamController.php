<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Tim';

		$search = request()->string('search')->trim();

		$teams = Team::query()
			->when($search, function ($query) use ($search) {
				$query->where('fullname', 'like', "%{$search}%");
			})
			->orderByDesc('created_at')
			->paginate(8)
			->onEachSide(1)
			->withQueryString();

		return view('admin.teams.index', compact('title', 'search', 'teams'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view(
			'admin.teams.create',
			['title' => 'Tambah Team']
		);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(TeamRequest $request)
	{
		try {
			DB::beginTransaction();

			$data = [
				'fullname' => $request->fullname,
				'slug' => Str::slug($request->fullname),
				'position' => Str::title($request->position),
				'instagram_link' => $request->instagram_link,
				'linkedin_link' => $request->linkedin_link,
				'sort_order' => $request->sort_order
			];

			if ($request->hasFile('photo')) {
				$data['photo'] = $request->file('photo')->store('team_photos', 'public');
			}

			Team::create($data);

			DB::commit();
			return redirect()->route('teams.index')->with('success', 'Team berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Team $team)
	{
		return view('admin.teams.edit', [
			'title' => 'Edit Team',
			'team' => $team
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(TeamRequest $request, Team $team)
	{
		try {
			DB::beginTransaction();

			$team->fullname = $request->fullname;
			$team->slug = Str::slug($request->fullname);
			$team->position = $request->position;
			$team->instagram_link = $request->instagram_link;
			$team->linkedin_link = $request->linkedin_link;
			$team->sort_order = $request->sort_order;

			if ($request->hasFile('photo')) {
				if ($team->photo && Storage::disk('public')->exists($team->photo)) {
					Storage::disk('public')->delete($team->photo);
				}
				$team->photo = $request->file('photo')->store('team_photos', 'public');
			}

			$team->save();
			DB::commit();
			return redirect()->route('teams.index')->with('success', 'Teams berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Team $team)
	{
		try {
			DB::beginTransaction();

			if ($team->photo) {
				Storage::disk('public')->delete($team->photo);
			}

			$team->delete();
			DB::commit();
			return back()->with('success', 'Team berhasil dihapus.');
		} catch (\Exception $e) {
			return back()->with('error', 'Terjadi kesalahan.');
		}
	}
}
