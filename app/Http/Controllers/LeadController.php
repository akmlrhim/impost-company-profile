<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Http\Request;

class LeadController extends Controller
{
	public function index()
	{
		$title = 'Leads';
		$search = request('search');

		$leads = Leads::select('fullname', 'email', 'phone', 'business_name', 'objective', 'income', 'note', 'created_at')
			->when($search, function ($query) use ($search) {
				$query->where('fullname', 'like', "%{$search}%")
					->orWhere('email', 'like', "%{$search}%")
					->orWhere('business_name', 'like', "%{$search}%");
			})
			->latest()
			->orderByDesc('created_at')
			->simplePaginate(10)
			->onEachSide(1)
			->withQueryString();

		return view('admin.leads.index', compact('title', 'leads'));
	}
}
