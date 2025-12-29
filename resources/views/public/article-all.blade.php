@extends('layouts.public')
@section('content')
  <main class="pt-24 sm:pt-28 py-8 sm:py-16 bg-impost-fifth antialiased">
    <div class="px-4 mx-auto max-w-7xl">

      <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ url('/') }}" class="inline-flex items-center text-xs sm:text-sm font-medium text-white">
              <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                </path>
              </svg>
              Home
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
              <a href="{{ url('/') }}#blog"
                class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2">Articles</a>
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
              <span class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2">Semua Artikel</span>
            </div>
          </li>
        </ol>
      </nav>

      <div class="mb-12 text-center px-6">
        <h1
          class="text-3xl md:text-4xl font-bold mb-4 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          Semua Artikel
        </h1>
        <p class="text-white text-sm md:text-base max-w-2xl mx-auto">
          Jelajahi koleksi artikel kami tentang berbagai topik menarik dari kami
        </p>
      </div>

      <section class="mx-auto w-full max-w-7xl px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-10 md:mb-12">

          @forelse ($articles as $article)
            <article
              class="bg-linear-to-br from-impost-primary via-impost-secondary to-impost-fourth rounded-xl border-2 border-impost-fourth overflow-hidden flex flex-col">

              <div class="relative h-40 md:h-48 overflow-hidden">
                @if ($article->cover_path)
                  <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
                    class="w-full h-full object-cover">
                @else
                  <img src="{{ asset('img/article_default.webp') }}" alt="default" class="w-full h-full object-cover">
                @endif
                <div class="absolute inset-0 bg-linear-to-t from-black/60 to-transparent"></div>
              </div>

              <div class="p-4 md:p-5 flex flex-col flex-1">
                <div class="flex items-center gap-1.5 md:gap-2 text-xs text-white mb-2 md:mb-3">
                  <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                  </svg>
                  <span class="font-semibold text-xs text-white">
                    {{ $article->created_at->translatedFormat('d F Y') }}
                  </span>
                  <span>•</span>
                  <span class="text-xs text-white">{{ $article->created_at->diffForHumans() }}</span>
                </div>

                <h3 class="text-base md:text-lg font-bold text-white mb-2 md:mb-3 line-clamp-2">
                  {{ $article->title }}
                </h3>

                <p class="text-xs md:text-sm text-white line-clamp-3 mb-3 md:mb-4 flex-1">
                  {{ Str::limit(strip_tags($article->content), 120) }}
                </p>

                <a href="{{ route('article.detail', $article) }}"
                  class="mt-auto inline-flex items-center justify-center gap-1.5 md:gap-2 text-xs md:text-sm font-semibold bg-white text-impost-third rounded-lg px-4 md:px-5 py-2 md:py-2.5 hover:bg-impost-third hover:text-white transition-all duration-300">
                  Baca Selengkapnya
                  <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </article>
          @empty
            <div class="col-span-full text-center py-12">
              <svg class="w-16 h-16 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
              </svg>
              <p class="text-gray-400 text-lg">Belum ada artikel tersedia</p>
            </div>
          @endforelse
        </div>

        <x-custom-pagination :items="$articles" />
      </section>

    </div>
  </main>
@endsection
