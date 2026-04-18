<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class VerifyIdController extends Controller
{
	public function verify(Employee $employee)
	{
		return view('verify-id', [
			'title' => 'Verifikasi ID Karyawan',
			'employee' => $employee,
		]);
	}
}
