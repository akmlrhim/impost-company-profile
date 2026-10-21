<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ServiceController extends Controller
{
    public function show(Request $request, Service $service): InertiaResponse
    {
        return Inertia::render('Services/Show', [
            'service' => $service->only('service_name', 'slug', 'description', 'cover_path', 'category'),
        ]);
    }
}
