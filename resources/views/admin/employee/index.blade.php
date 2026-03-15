@extends('layouts.admin')
@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('employees.index') }}" add-route="{{ route('employees.create') }}"
    add-label="Tambah Karyawan" />

  <div class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden mb-4">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse whitespace-nowrap">
        <thead>
          <tr class="bg-gray-100 border-b border-gray-200 text-xs text-gray-600 uppercase tracking-wider">
            <th class="py-3 px-4 font-semibold">Foto</th>
            <th class="py-3 px-4 font-semibold">ID Karyawan</th>
            <th class="py-3 px-4 font-semibold">Nama Lengkap</th>
            <th class="py-3 px-4 font-semibold">Posisi</th>
            <th class="py-3 px-4 font-semibold">Tanggal Bergabung</th>
            <th class="py-3 px-4 font-semibold text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse ($employees as $employee)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4">
                <div class="flex items-center space-x-2">
                  @if ($employee->photo)
                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="{{ $employee->fullname }}"
                      class="w-10 h-10 rounded-full object-cover border border-gray-200" />
                  @else
                    <span
                      class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-600 font-semibold border border-gray-200 text-sm uppercase">
                      {{ Str::substr($employee->fullname, 0, 1) }}
                    </span>
                  @endif
                </div>
              </td>

              <td class="py-3 px-4 text-sm text-gray-800 font-medium">
                {{ $employee->employee_id }}
              </td>

              <td class="py-3 px-4 text-sm text-gray-800">
                {{ $employee->fullname }}
              </td>

              <td class="py-3 px-4 text-sm text-gray-600">
                {{ $employee->position }}
              </td>

              <td class="py-3 px-4 text-sm text-gray-600">
                {{ $employee->join_date ? \Carbon\Carbon::parse($employee->join_date)->format('d M Y') : '-' }}
              </td>

              <td class="py-3 px-4 text-center space-x-1">
                <a href="{{ route('employees.downloadQr', $employee) }}"
                  class="cursor-pointer inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-black rounded-sm hover:bg-gray-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                  QR Code
                </a>
                <a href="{{ route('employees.edit', $employee) }}"
                  class="cursor-pointer inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-yellow-600 rounded-sm hover:bg-yellow-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                  Edit
                </a>
                <x-confirm-delete :action="route('employees.destroy', $employee)" label="Hapus" />
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="py-8 text-center text-sm text-gray-500">
                Empty <br>
                Mulai dengan menambahkan karyawan baru dengan klik tombol "Tambah Karyawan" di atas.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="p-3 border-t border-gray-100 text-xs">
      {{ $employees->links() }}
    </div>
  </div>
@endsection
