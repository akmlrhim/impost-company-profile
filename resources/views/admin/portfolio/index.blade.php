@extends('layouts.admin')

@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('portfolio.index') }}" add-route="{{ route('portfolio.create') }}"
    add-label="Tambah Portfolio" />

  {{-- Filtering --}}
  <form method="GET" action="{{ route('portfolio.index') }}" class="mb-6">
    <div class="flex flex-wrap gap-2">

      @if (request('search'))
        <input type="hidden" name="search" value="{{ request('search') }}">
      @endif

      <a href="{{ route('portfolio.index') }}"
        class="px-3 py-1 text-xs font-medium rounded-full
					{{ request('category') ? 'bg-white text-gray-700 border border-gray-700' : 'bg-blue-600 text-white' }}">
        Semua
      </a>

      @foreach ($categories as $category)
        <button type="submit" name="category" value="{{ $category->slug }}"
          class="cursor-pointer px-3 py-1 text-xs font-medium rounded-full border transition capitalize
					{{ request('category') === $category->slug
         ? 'bg-blue-600 text-white border-blue-600'
         : 'bg-white text-gray-700 hover:bg-gray-100' }}">
          {{ $category->name }}
        </button>
      @endforeach
    </div>
  </form>

  <div class="bg-neutral-primary-soft rounded-base border border-default">
    <div class="p-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($portfolios as $portfolio)
          <div class="bg-white rounded-sm shadow-sm overflow-hidden flex flex-col h-full">

            <div class="relative aspect-[9/16] bg-gray-100">

              <span
                class="absolute top-3 left-3 px-3 py-1 text-xs font-semibold uppercase rounded-full bg-blue-600 text-white z-10">
                {{ $portfolio->category->name }}
              </span>

              @if ($portfolio->media_path)
                @if ($portfolio->media_type === 'image')
                  <img src="{{ asset('storage/' . $portfolio->media_path) }}" alt="{{ $portfolio->title }}"
                    loading="lazy" class="w-full h-full object-cover">
                @elseif ($portfolio->media_type === 'video')
                  <video class="w-full h-full object-cover" controls>
                    <source src="{{ asset('storage/' . $portfolio->media_path) }}" type="video/mp4">
                    <source src="{{ asset('storage/' . $portfolio->media_path) }}" type="video/webm">
                    Browser Anda tidak mendukung tag video.
                  </video>
                @else
                  <div class="w-full h-full flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                  </div>
                @endif
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
              <div class="mt-auto flex items-center gap-2">
                <a href="{{ route('portfolio.edit', $portfolio) }}"
                  class="flex-1 inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-yellow-600 rounded-sm hover:bg-yellow-500 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600">
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
