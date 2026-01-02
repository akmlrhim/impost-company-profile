@extends('layouts.admin')
@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('teams.index') }}" add-route="{{ route('teams.create') }}" add-label="Tambah Team" />

  <div class="bg-neutral-primary-soft rounded-base border border-default mb-4">
    <div class="p-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($teams as $team)
          <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 flex flex-col h-full">

            <div class="bg-linear-to-br from-indigo-50 to-purple-50 p-6 pb-8">
              <div class="flex flex-col items-center text-center">
                @if ($team->photo)
                  <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->fullname }}" loading="lazy"
                    decoding="async" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg mb-3" />
                @else
                  <img src="{{ asset('img/picture_profile_default.webp') }}" alt="{{ $team->fullname }}" loading="lazy"
                    decoding="async" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg mb-3" />
                @endif

                <h3 class="font-bold text-gray-900 text-lg">
                  {{ $team->fullname }}
                </h3>
                <span class="text-gray-700 font-medium text-sm">
                  {{ $team->position }}
                </span>
              </div>
            </div>

            <div class="p-5 flex flex-col flex-1">

              <ul class="grid grid-cols-2 gap-3">
                <li
                  class="group relative overflow-hidden rounded-lg bg-linear-to-br from-pink-50 to-purple-50 p-4 shadow-sm transition-all duration-300 hover:shadow-md">
                  <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                      <span class="text-sm font-semibold text-gray-700">Instagram</span>
                    </div>

                    @if ($team->instagram_link)
                      <a href="{{ $team->instagram_link }}" target="_blank" rel="noopener noreferrer"
                        class="flex h-7 w-7 items-center justify-center rounded-full bg-green-100 transition-all duration-300 hover:bg-green-200 hover:scale-110">
                        <svg class="h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                        </svg>
                      </a>
                    @else
                      <div class="flex h-7 w-7 items-center justify-center rounded-full bg-red-100">
                        <svg class="h-4 w-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                        </svg>
                      </div>
                    @endif
                  </div>
                </li>

                <li
                  class="group relative overflow-hidden rounded-lg bg-linear-to-br from-blue-50 to-cyan-50 p-4 shadow-sm transition-all duration-300 hover:shadow-md">
                  <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                      <span class="text-sm font-semibold text-gray-700">LinkedIn</span>
                    </div>

                    @if ($team->linkedin_link)
                      <a href="{{ $team->linkedin_link }}" target="_blank" rel="noopener noreferrer"
                        class="flex h-7 w-7 items-center justify-center rounded-full bg-green-100 transition-all duration-300 hover:bg-green-200 hover:scale-110">
                        <svg class="h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                        </svg>
                      </a>
                    @else
                      <div class="flex h-7 w-7 items-center justify-center rounded-full bg-red-100">
                        <svg class="h-4 w-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                        </svg>
                      </div>
                    @endif
                  </div>
                </li>
              </ul>


              <div class="flex gap-2 pt-4 mt-auto">
                <a href="{{ route('teams.edit', $team) }}"
                  class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-yellow-600 rounded-sm hover:bg-yellow-700 transition">
                  Edit
                </a>

                <x-confirm-delete :action="route('teams.destroy', $team)" label="Hapus" />
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
