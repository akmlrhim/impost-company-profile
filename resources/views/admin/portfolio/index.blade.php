@extends('layouts.admin')

@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('portfolio.index') }}" add-route="{{ route('portfolio.create') }}"
    add-label="Tambah Portfolio" />

  <div class="bg-neutral-primary-soft rounded-base border border-default">
    <div class="p-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($portfolios as $portfolio)
          <div class="bg-white rounded-sm shadow-sm overflow-hidden flex flex-col h-full">

            <div class="relative h-48 bg-gray-100">

              @if ($portfolio->cover_path)
                <img src="{{ asset('storage/' . $portfolio->cover_path) }}" alt="{{ $portfolio->name }}" loading="lazy"
                  class="w-full h-full object-cover">
              @else
                <div class="w-full h-full flex items-center justify-center">
                  <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
              @endif
            </div>

            <div class="p-5 flex flex-col flex-1">
              <h3 class="text-md font-medium text-gray-900 mb-2">
                {{ $portfolio->name }}
              </h3>

              <div class="mt-auto flex items-center gap-2">
                <a href="{{ route('portfolio.edit', $portfolio) }}"
                  class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-yellow-600 rounded-sm hover:bg-yellow-500 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600">
                  Edit
                </a>

                <x-confirm-delete :action="route('portfolio.destroy', $portfolio)" label="Hapus" />
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-full bg-white p-12">
            <div class="flex flex-col items-center justify-center text-center">
              <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <p class="text-gray-500 text-md font-medium">Tidak ada portfolio ditemukan</p>
              <p class="text-gray-400 text-sm mt-1">Mulai dengan menambahkan portfolio baru</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>

    <div class="p-4 border-t border-gray-200">
      {{ $portfolios->links() }}
    </div>
  </div>
@endsection
