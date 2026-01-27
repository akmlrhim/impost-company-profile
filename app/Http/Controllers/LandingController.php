<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
	public function web()
	{
		return view('landing.web');
	}

	public function promo()
	{
		return view('landing.promo');
	}
}
