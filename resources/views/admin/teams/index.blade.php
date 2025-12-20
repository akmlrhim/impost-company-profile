@extends('layouts.admin')
@section('content')
  <x-flash></x-flash>

  <x-search-bar search-route="{{ route('teams.index') }}" add-route="{{ route('teams.create') }}" add-label="Tambah Team" />

  <div class="bg-neutral-primary-soft rounded-base border border-default mb-4">
    <div class="p-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($teams as $team)
          <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 flex flex-col h-full">

            <div class="bg-linear-to-br from-indigo-50 to-purple-50 p-6 pb-8">
              <div class="flex flex-col items-center text-center">
                <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->fullname }}"
                  class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg mb-3">

                <h3 class="font-bold text-gray-900 text-lg">
                  {{ $team->fullname }}
                </h3>
                <span class="text-gray-700 font-medium text-sm">
                  {{ $team->position }}
                </span>
              </div>
            </div>

            <div class="p-5 flex flex-col flex-1">

              <ul class="list-none space-y-2 min-h-8 text-center">
                <li class="px-3 py-1.5 rounded-md bg-red-300 text-red-800 text-xs font-medium shadow-sm">
                  Instagram : {{ $team->instagram_link ?? '-' }}
                </li>

                <li>
                <li class="px-3 py-1.5 rounded-md bg-blue-300 text-blue-800 text-xs font-medium shadow-sm">
                  LinkedIn : {{ $team->linkedin_link ?? '-' }}
                </li>
                </li>
              </ul>


              <div class="flex gap-2 pt-4 mt-auto">
                <a href="{{ route('teams.edit', $team) }}"
                  class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-yellow-600 rounded-sm hover:bg-yellow-700 transition">
                  Edit
                </a>

                <x-confirm-delete :action="route('teams.destroy', $team)" label="Hapus" class="flex-1" />
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-1 md:col-span-2 lg:col-span-4 bg-white p-12">
            <div class="flex flex-col items-center justify-center text-center">
              <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <p class="text-gray-500 text-md font-medium">Tidak ada anggota team ditemukan</p>
              <p class="text-gray-400 text-sm mt-1">Mulai dengan menambahkan anggota team baru</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>
    <div class="p-4 border-t border-gray-200">
      {{ $teams->links() }}
    </div>
  </div>
@endsection
