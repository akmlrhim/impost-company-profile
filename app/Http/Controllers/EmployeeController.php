<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EmployeeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Employee';

		$search = request()->string('search')->trim();

		$employees = Employee::query()
			->when($search, function ($query) use ($search) {
				$query->where('fullname', 'like', "%{$search}%");
			})
			->latest()
			->paginate(8)
			->onEachSide(1)
			->withQueryString();

		return view('admin.employees.index', compact('title', 'search', 'employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view(
			'admin.employees.create',
			['title' => 'Tambah Employee']
		);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(EmployeeRequest $request)
	{
		try {
			DB::beginTransaction();

			$data = [
				'fullname' => $request->fullname,
				'slug' => Str::slug($request->fullname),
				'position' => $request->position,
				'employee_id' => $request->employee_id,
				'join_date'   => $request->filled('join_date') ? $request->join_date : null,
			];

			if ($request->hasFile('photo')) {
				$data['photo'] = $request->file('photo')->store('employee_photos', 'public');
			}

			// Generate Qr  
			$url = route('verify-id', $data['slug']);
			$qrCodeFileName = 'employee_qrcodes/' . $request->employee_id . '-' . time() . '.svg';
			$qrCodeImg = QrCode::format('svg')->size(300)->margin(1)->generate($url);
			Storage::disk('public')->put($qrCodeFileName, $qrCodeImg);
			$data['qr_code_id'] = $qrCodeFileName;

			Employee::create($data);

			DB::commit();
			return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Employee $employee)
	{
		return view('admin.employees.edit', [
			'title' => 'Edit Employee',
			'employee' => $employee
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(EmployeeRequest $request, Employee $employee)
	{
		try {
			DB::beginTransaction();

			$data = [
				'fullname' => $request->fullname,
				'slug' => Str::slug($request->fullname),
				'position' => $request->position,
				'employee_id' => $request->employee_id,
				'join_date' => $request->join_date,
			];

			if ($request->hasFile('photo')) {
				if ($employee->photo && Storage::disk('public')->exists($employee->photo)) {
					Storage::disk('public')->delete($employee->photo);
				}
				$data['photo'] = $request->file('photo')->store('employee_photos', 'public');
			}

			if (
				$employee->employee_id !== $request->employee_id ||
				$employee->fullname !== $request->fullname
			) {
				if ($employee->qr_code_id && Storage::disk('public')->exists($employee->qr_code_id)) {
					Storage::disk('public')->delete($employee->qr_code_id);
				}
				$url = route('verify-id', $data['slug']);
				$qrCodeFileName = 'employee_qrcodes/' . $request->employee_id . '-' . time() . '.svg';
				$qrCodeImg = QrCode::format('svg')->size(300)->margin(1)->generate($url);
				Storage::disk('public')->put($qrCodeFileName, $qrCodeImg);
				$data['qr_code_id'] = $qrCodeFileName;
			}

			$employee->update($data);

			DB::commit();
			return redirect()->route('employees.index')->with('success', 'Karyawan berhasil diperbarui.');
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Employee $employee)
	{
		try {
			DB::beginTransaction();

			if ($employee->photo) {
				Storage::disk('public')->delete($employee->photo);
			}

			if ($employee->qr_code_id) {
				Storage::disk('public')->delete($employee->qr_code_id);
			}

			$employee->delete();
			DB::commit();
			return back()->with('success', 'Karyawan berhasil dihapus.');
		} catch (\Exception $e) {
			return back()->with('error', 'Terjadi kesalahan.');
		}
	}

	public function downloadQrCode(Employee $employee)
	{
		if (!$employee->qr_code_id || !Storage::disk('public')->exists($employee->qr_code_id)) {
			return back()->with('error', 'QR Code tidak ditemukan.');
		}

		return Storage::disk('public')->download($employee->qr_code_id, $employee->employee_id . '-qrcode.svg');
	}
}
