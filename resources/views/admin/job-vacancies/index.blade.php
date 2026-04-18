@extends('layouts.admin')

@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('jobvacancies.index') }}" add-route="{{ route('jobvacancies.create') }}"
    add-label="Tambah Loker" />

  <div class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse whitespace-nowrap">
        <thead>
          <tr class="bg-gray-100 border-b border-gray-200 text-xs text-gray-600 uppercase tracking-wider">
            <th class="py-3 px-4 font-semibold">Posisi</th>
            <th class="py-3 px-4 font-semibold">Tipe & Durasi</th>
            <th class="py-3 px-4 font-semibold">Sistem Kerja</th>
            <th class="py-3 px-4 font-semibold">Status</th>
            <th class="py-3 px-4 font-semibold text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse ($jobs as $job)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4 text-sm">
                {{ $job->title }}
              </td>

              <td class="py-3 px-4">
                <span
                  class="inline-block px-2 py-0.5 text-[11px] font-semibold rounded {{ $job->employment_type == 'Internship' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                  {{ $job->employment_type }}
                </span>
                @if ($job->duration)
                  <div class="flex items-center gap-1 mt-1 text-[11px] text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5">
                      <line x1="10" x2="14" y1="2" y2="2" />
                      <line x1="12" x2="15" y1="14" y2="11" />
                      <circle cx="12" cy="14" r="8" />
                    </svg>
                    <span>{{ $job->duration ?? '-' }}</span>
                  </div>
                @endif
              </td>

              <td class="py-3 px-4 text-xs text-gray-600">
                {{ implode(', ', $job->work_arrangements ?? []) }}
              </td>

              <td class="py-3 px-4">
                <span
                  class="px-2 py-0.5 text-[11px] font-medium rounded-full {{ $job->status == 'Active' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                  {{ $job->status }}
                </span>
              </td>

              <td class="py-3 px-4 text-center space-x-1">
                <a href="{{ route('jobvacancies.show', $job) }}"
                  class="cursor-pointer flex-1 inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-sm hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                  Detail
                </a>

                <a href="{{ route('jobvacancies.edit', $job) }}"
                  class="cursor-pointer flex-1 inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-yellow-600 rounded-sm hover:bg-yellow-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                  Edit
                </a>

                <x-confirm-delete :action="route('jobvacancies.destroy', $job)" label="Hapus" />
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="py-6 text-center text-xs text-gray-500">
                Belum ada data lowongan.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if (method_exists($jobs, 'links'))
      <div class="p-3 border-t border-gray-100 text-xs">
        {{ $jobs->links() }}
      </div>
    @endif
  </div>
@endsection
