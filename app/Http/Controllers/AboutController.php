<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class AboutController extends Controller
{
    public function index(): InertiaResponse
    {
        return Inertia::render('About');
    }
}
