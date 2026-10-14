<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Leads;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ContactController extends Controller
{
    public function index(Request $request): InertiaResponse
    {
        return Inertia::render('Contact', [
            'status' => $request->session()->get('status'),
        ]);
    }

    public function store(StoreLeadRequest $request)
    {
        Leads::create($request->validated());

        return redirect()->route('contact.index')->with('status', 'success');
    }
}
