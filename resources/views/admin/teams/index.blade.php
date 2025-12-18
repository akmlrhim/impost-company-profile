@extends('layouts.admin')
@section('content')
  <x-flash></x-flash>

  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <form method="GET" action="{{ route('teams.index') }}" class="w-full sm:max-w-sm">
      <div class="relative">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama..." autocomplete="off"
          class="w-full rounded-md border border-gray-300 bg-white  px-4 py-2.5 pr-10 text-sm text-gray-700 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition">
        <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m21 21-4.35-4.35m1.6-5.15a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
          </svg>
        </span>
      </div>
    </form>

    <a href="{{ route('teams.create') }}"
      class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-indigo-700 transition">
      Tambah Team
    </a>
  </div>

  <div class="overflow-x-auto bg-white border border-gray-200 rounded-md shadow-sm">
    <table class="min-w-full text-sm text-gray-700">
      <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
        <tr>
          <th class="px-6 py-4 text-left">#</th>
          <th class="px-6 py-4 text-left">Nama</th>
          <th class="px-6 py-4 text-left">Posisi</th>
          <th class="px-6 py-4 text-center">Urutan</th>
          <th class="px-6 py-4 text-center">Sosial Media</th>
          <th class="px-6 py-4 text-right">Aksi</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-200">
        @forelse ($teams as $index => $team)
          <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4 font-medium">
              {{ $index + 1 }}
            </td>

            <td class="px-6 py-4">
              <div class="flex items-center gap-4">
                <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->fullname }}"
                  class="w-12 h-12 rounded-full object-cover border border-gray-300">
                <div>
                  <p class="font-semibold text-gray-900">
                    {{ $team->fullname }}
                  </p>
                  <p class="text-xs text-gray-500">
                    {{ $team->position }}
                  </p>
                </div>
              </div>
            </td>

            <td class="px-6 py-4">
              <span
                class="inline-flex items-center px-3 py-1 rounded-full
              bg-indigo-50 text-indigo-600 text-xs font-medium">
                {{ $team->position }}
              </span>
            </td>

            <td class="px-6 py-4 text-center font-medium text-gray-800">
              {{ $team->sort_order }}
            </td>

            <td class="px-6 py-4 text-center">
              <div class="flex items-center justify-center gap-3">
                @if ($team->instagram_link)
                  <a href="{{ $team->instagram_link }}" target="_blank"
                    class="text-gray-400 hover:text-pink-500 transition">
                    Instagram
                  </a>
                @endif

                @if ($team->linkedin_link)
                  <a href="{{ $team->linkedin_link }}" target="_blank"
                    class="text-gray-400 hover:text-blue-600 transition">
                    LinkedIn
                  </a>
                @endif
              </div>
            </td>

            <td class="px-6 py-4 text-right">
              <div class="flex justify-end gap-2">
                <a href="{{ route('teams.edit', $team) }}"
                  class="px-3 py-1.5 rounded-lg text-xs font-medium text-indigo-600 bg-indigo-50 hover:bg-indigo-100 transition">
                  Edit
                </a>

                <form action="{{ route('teams.destroy', $team) }}" method="POST"
                  onsubmit="return confirm('Hapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button
                    class="px-3 py-1.5 rounded-lg text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 transition">
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
              Data team kosong
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
