<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ServiceController extends Controller
{
    public function index(Request $request): InertiaResponse
    {
        return Inertia::render('Services/Index', [
            'services' => Service::query()
                ->orderBy('sort')
                ->get(['service_name', 'slug', 'description', 'cover_path']),
        ]);
    }

    public function show(Request $request, Service $service): InertiaResponse
    {
        return Inertia::render('Services/Show', [
            'service' => $service->only('service_name', 'slug', 'description', 'cover_path', 'category'),
        ]);
    }
}
