@extends('layouts.admin')
@section('content')
  <x-flash />

  <div class="bg-neutral-primary-soft rounded-base border border-default mb-4">

    <div class="p-4 flex items-center justify-between gap-4">
      <div class="relative flex-1 max-w-md">

        <form action="{{ route('articles.index') }}" method="GET" class="flex items-center gap-2">

          <div class="relative flex-1">
            <input type="text" name="search" value="{{ request('search') }}"
              class="block w-full pr-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
              placeholder="Masukkan kata kunci, lalu tekan Enter" autocomplete="off" />
          </div>

          @if (request('search'))
            <a href="{{ route('articles.index') }}"
              class="px-4 py-2 text-sm rounded-sm bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
              Reset
            </a>
          @endif
        </form>

      </div>

      <a href="{{ route('articles.create') }}"
        class="px-4 py-2 bg-brand text-white rounded-sm shadow-xs text-sm font-medium hover:bg-brand-dark transition whitespace-nowrap">
        Tambah Layanan
      </a>
    </div>

    <div class="p-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        @forelse ($articles as $article)
          <div class="bg-white rounded-sm shadow-sm overflow-hidden flex flex-col h-full"> {{-- flex-col + h-full --}}

            <div class="relative h-48 bg-gray-100">
              @if ($article->cover_path)
                <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}" loading="lazy"
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
              <h3 class="text-lg font-semibold text-gray-900 mb-2">
                {{ $article->title }}
              </h3>

              <div class="mt-auto flex items-center gap-2">
                <a href="{{ route('articles.edit', $article) }}"
                  class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-yellow-600 rounded-sm hover:bg-yellow-500 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600">
                  Edit
                </a>
                <a href="{{ route('articles.comments', $article) }}"
                  class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-gray-700 rounded-sm hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                  Lihat Komentar
                </a>
                <x-confirm-delete :action="route('articles.destroy', $article)" label="Hapus" />
              </div>
            </div>

          </div>

        @empty
          <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white p-12">
            <div class="flex flex-col items-center justify-center text-center">
              <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <p class="text-gray-500 text-md font-medium">Tidak ada artikel ditemukan</p>
              <p class="text-gray-400 text-sm mt-1">Mulai dengan menambahkan artikel baru</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>

    <div class="p-4 border-t border-gray-200">
      {{ $articles->links() }}
    </div>
  </div>
@endsection
