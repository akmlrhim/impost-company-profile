<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Http\Request;

class LeadController extends Controller
{
	public function index()
	{
		$title = 'Leads';
		$leads = Leads::select('fullname', 'email', 'phone', 'business_name', 'income', 'note', 'created_at')
			->latest()
			->orderByDesc('created_at')
			->paginate(10)
			->onEachSide(1)
			->withQueryString();

		return view('admin.leads.index', compact('title', 'leads'));
	}
}
