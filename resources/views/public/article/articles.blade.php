@extends('layouts.public')
@section('content')
  <main class="pt-18 sm:pt-32 py-8 sm:py-16 antialiased">
    <div class="mx-auto max-w-7xl">

      <div class="mb-12 text-center px-6">
        <h1
          class="text-3xl md:text-4xl font-bold mb-4 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          Semua Artikel
        </h1>
        <p class="text-white text-sm md:text-base max-w-2xl mx-auto">
          Jelajahi koleksi artikel kami tentang berbagai topik menarik dari kami
        </p>
      </div>

      <section class="mx-auto w-full max-w-7xl px-2">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-10 md:mb-12">
          @forelse ($articles as $article)
            <article class="rounded-2xl shadow-sm overflow-hidden border border-impost-fourth flex flex-col">

              <div class="relative h-40 md:h-48 overflow-hidden">
                @if ($article->cover_path)
                  <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                @else
                  <img src="{{ asset('img/article_default.webp') }}" alt="default" class="w-full h-full object-cover">
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-[#111] to-transparent"></div>
              </div>

              <div class="p-5 md:p-6 flex flex-col flex-1">
                <div
                  class="flex items-center gap-2 text-[10px] uppercase tracking-wider font-bold text-impost-primary mb-3">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                  </svg>
                  <span class="text-white">{{ $article->created_at->translatedFormat('d F Y') }}</span>
                  <span class="text-white">•</span>
                  <span class="text-white">{{ $article->created_at->diffForHumans() }}</span>
                </div>

                <h3
                  class="text-lg md:text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-impost-primary transition-colors">
                  {{ $article->title }}
                </h3>

                <p class="text-sm text-white line-clamp-3 mb-6 flex-1 leading-relaxed">
                  {{ Str::limit(strip_tags($article->content), 120) }}
                </p>

                <a href="{{ route('article.detail', $article) }}"
                  class="mt-auto inline-flex items-center justify-center gap-2 text-xs md:text-sm font-bold bg-impost-fourth/30 text-impost-primary border border-impost-fourth rounded-xl px-5 py-3 hover:bg-impost-primary hover:text-impost-fifth transition-all duration-300">
                  BACA SELENGKAPNYA
                </a>
              </div>
            </article>
          @empty
            <x-empty-card item="articles"></x-empty-card>
          @endforelse
        </div>

        <x-custom-pagination :items="$articles" />
      </section>

    </div>
  </main>
@endsection
