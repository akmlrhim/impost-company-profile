@extends('layouts.admin')
@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('jobpostings.index') }}" add-route="{{ route('jobpostings.create') }}"
    add-label="Tambah Lowongan" />

  <div class="bg-white p-3 sm:p-4 rounded-md shadow-sm">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y-2 divide-gray-200 text-xs sm:text-sm">
        <thead class="uppercase tracking-wide text-left">
          <tr class="*:font-bold *:text-gray-900">
            <th class="px-3 py-2 whitespace-nowrap">Posisi</th>
            <th class="px-3 py-2 whitespace-nowrap">Deskripsi</th>
            <th class="px-3 py-2 whitespace-nowrap">Tipe</th>
            <th class="px-3 py-2 whitespace-nowrap">Status</th>
            <th class="px-3 py-2 whitespace-nowrap">Batas Akhir</th>
            <th class="px-3 py-2 whitespace-nowrap text-center">Aksi</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
          @forelse ($jobPostings as $job)
            <tr class="*:text-gray-900 align-top">
              <td class="px-3 py-2 font-medium whitespace-nowrap bg-white">
                {{ $job->title }}
              </td>

              <td class="px-3 py-2 max-w-xs truncate">
                {{ Str::limit($job->description, 80) }}
              </td>

              <td class="px-3 py-2 whitespace-nowrap">
                {{ ucfirst($job->type) }}
              </td>

              <td class="px-3 py-2 whitespace-nowrap">
                <span
                  class="px-2 py-1 text-xs font-semibold rounded-md
									{{ $job->status === 'Open' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                  {{ $job->status }}
                </span>
              </td>

              <td class="px-3 py-2 whitespace-nowrap">
                {{ \Carbon\Carbon::parse($job->closing_date)->translatedFormat('d F Y') }}
              </td>

              <td class="px-3 py-2 whitespace-nowrap text-center">
                <button type="button" onclick="window.location.href='{{ route('jobpostings.show', $job->slug) }}'"
                  class="cursor-pointer inline-flex items-center gap-1 px-3 py-1.5 bg-blue-700 hover:bg-blue-800 text-white text-xs font-semibold rounded-md transition">
                  Lihat
                </button>

                <button type="button" onclick="window.location.href='{{ route('jobpostings.edit', $job->slug) }}'"
                  class="cursor-pointer inline-flex items-center gap-1 px-3 py-1.5 bg-impost-primary hover:bg-impost-primary/90 text-black text-xs font-semibold rounded-md transition">
                  Edit
                </button>

                <x-confirm-delete :action="route('jobpostings.destroy', $job->id)" />
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="text-center px-4 py-6 text-gray-500">
                Data lowongan belum tersedia
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="p-2 border-t border-gray-200">
      {{ $jobPostings->links() }}
    </div>
  </div>
@endsection
