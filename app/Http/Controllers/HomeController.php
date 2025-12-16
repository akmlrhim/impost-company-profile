<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Home';
		$services = Service::simplePaginate(6)->fragment('services');

		return view('public.home', compact('title', 'services'));
	}
}
