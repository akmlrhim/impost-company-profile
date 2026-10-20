<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leads;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Dashboard', [
            'counts' => [
                'services' => Service::count(),
                'portfolios' => Portfolio::count(),
                'leads' => Leads::count(),
                'testimonials' => Testimonial::count(),
            ],
            'recent_leads' => Leads::query()
                ->latest()
                ->limit(5)
                ->get(),
        ]);
    }
}
