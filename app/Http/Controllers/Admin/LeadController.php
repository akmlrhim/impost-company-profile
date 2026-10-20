<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leads;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LeadController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Leads/Index', [
            'leads' => Leads::query()
                ->latest()
                ->paginate(15)
                ->withQueryString(),
        ]);
    }

    public function show(Leads $lead): Response
    {
        return Inertia::render('Admin/Leads/Show', [
            'lead' => $lead,
        ]);
    }

    public function destroy(Leads $lead)
    {
        $lead->delete();

        return redirect()->route('admin.leads.index')->with('success', 'Lead deleted.');
    }
}
