<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\JobPosting;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\StudyCase;
use App\Models\Team;
use App\Models\Testimonial;

class DashboardController extends Controller
{
	public function index()
	{
		$title = 'Dashboard';

		$article = Article::all();
		$service = Service::all();
		$client = Client::all();
		$testimoni = Testimonial::all();
		$portfolio = Portfolio::all();
		$studyCase = StudyCase::all();
		$jobs = JobPosting::all();
		$team = Team::all();

		return view('admin.dashboard', compact(
			'title',
			'article',
			'service',
			'client',
			'testimoni',
			'portfolio',
			'studyCase',
			'jobs',
			'team'
		));
	}
}
