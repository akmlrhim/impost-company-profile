@extends('layouts.public')

@section('title', 'Artikel | Impost Media')
@section('meta_description',
  'Jelajahi artikel seputar strategi digital marketing, data, dan pertumbuhan bisnis dari tim
  Impost Media — agensi digital marketing terpercaya di Kalimantan Selatan.')

@section('content')
  <main class="pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 antialiased bg-[#0a0a0a]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

      {{-- Header --}}
      <div class="mb-8 sm:mb-10 md:mb-14 text-center">
        <h1 class="text-xl sm:text-3xl md:text-4xl lg:text-5xl text-impost-primary font-bold mb-3 sm:mb-4">
          {{ $title }}
        </h1>
        <p class="text-gray-300 text-xs sm:text-sm md:text-base max-w-4xl mx-auto font-light leading-relaxed px-2">
          Jelajahi koleksi artikel kami tentang berbagai topik menarik seputar strategi, data, dan pertumbuhan bisnis.
        </p>
      </div>

      {{-- Filter --}}
      <div class="mb-8 sm:mb-10 md:mb-12 max-w-4xl mx-auto">

        {{-- Mobile Dropdown --}}
        <div class="md:hidden w-full relative">
          <select onchange="window.location.href=this.value"
            class="w-full appearance-none bg-[#121212] text-white border border-white/10 rounded-lg sm:rounded-xl py-3 px-4 pr-10 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all cursor-pointer text-xs sm:text-sm font-medium shadow-lg">
            <option value="{{ route('article.all') }}" {{ empty($activeCategory) ? 'selected' : '' }}>
              Semua Kategori
            </option>
            @foreach ($category as $cat)
              <option value="{{ route('article.all', ['category' => $cat->slug]) }}"
                {{ ($activeCategory ?? '') === $cat->slug ? 'selected' : '' }}>
                {{ $cat->name }}
              </option>
            @endforeach
          </select>
          <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-white">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>

        {{-- Desktop Pills --}}
        <div class="hidden md:flex flex-wrap justify-center gap-3">
          <a href="{{ route('article.all') }}"
            class="px-5 py-2.5 rounded-full text-sm font-bold border transition-all duration-300
            {{ empty($activeCategory)
                ? 'bg-impost-primary text-black border-impost-primary shadow-[0_0_15px_rgba(var(--impost-primary),0.4)]'
                : 'border-white/10 text-white hover:border-impost-primary/50 hover:text-white bg-white/5 hover:bg-white/10' }}">
            Semua
          </a>
          @foreach ($category as $cat)
            <a href="{{ route('article.all', ['category' => $cat->slug]) }}"
              class="px-5 py-2.5 rounded-full text-sm font-bold border transition-all duration-300
              {{ ($activeCategory ?? '') === $cat->slug
                  ? 'bg-impost-primary text-black border-impost-primary shadow-[0_0_15px_rgba(var(--impost-primary),0.4)]'
                  : 'border-white/10 text-white hover:border-impost-primary/50 hover:text-white bg-white/5 hover:bg-white/10' }}">
              {{ $cat->name }}
            </a>
          @endforeach
        </div>
      </div>

      {{-- Articles Grid --}}
      <section class="w-full" id="articles-container">
        @if ($articles->isEmpty())
          <div
            class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
            <x-empty-card item="Artikel" />
          </div>
        @else
          {{-- Skeleton --}}
          <div id="articles-skeleton"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-10 sm:mb-12 animate-pulse">
            @for ($i = 0; $i < 6; $i++)
              <div class="w-full bg-[#121212] rounded-xl sm:rounded-2xl h-[300px] sm:h-[350px] border border-white/5">
              </div>
            @endfor
          </div>

          {{-- Content --}}
          <div id="articles-content"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-10 sm:mb-12 opacity-0 transition-opacity duration-500">
            @foreach ($articles as $article)
              <article
                class="group rounded-xl sm:rounded-2xl bg-[#121212] border border-white/5 shadow-sm overflow-hidden hover:border-impost-primary/30 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">

                <div class="relative h-40 sm:h-48 md:h-52 overflow-hidden">
                  @if ($article->cover_path)
                    <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
                      class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                      loading="lazy">
                  @else
                    <div class="w-full h-full bg-gradient-to-br from-gray-800 to-black flex items-center justify-center">
                      <svg class="w-12 h-12 sm:w-16 sm:h-16 text-white/10" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                      </svg>
                    </div>
                  @endif

                  @if ($article->category)
                    <span
                      class="absolute top-3 left-3 sm:top-4 sm:left-4 z-10 inline-flex items-center rounded-full bg-black/60 backdrop-blur-md border border-white/10 text-impost-primary text-[9px] sm:text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 sm:px-3 sm:py-1">
                      {{ $article->category->name }}
                    </span>
                  @endif

                  <div class="absolute inset-0 bg-gradient-to-t from-[#121212] via-transparent to-transparent opacity-60">
                  </div>
                </div>

                <div class="p-4 sm:p-6 flex flex-col flex-1 border-t border-white/5">

                  <div
                    class="flex items-center gap-2 sm:gap-3 text-[10px] sm:text-xs font-medium text-white mb-3 sm:mb-4">
                    <div class="flex items-center gap-1 sm:gap-1.5">
                      <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 text-impost-primary" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                      </svg>
                      <span>{{ $article->created_at->translatedFormat('d M Y') }}</span>
                    </div>
                    <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                    <span>{{ $article->created_at->diffForHumans() }}</span>
                  </div>

                  <h3
                    class="text-base sm:text-lg md:text-xl font-bold text-white mb-2 sm:mb-3 line-clamp-2 leading-tight group-hover:text-impost-primary transition-colors">
                    <a href="{{ route('article.detail', $article->slug) }}">
                      {{ $article->title }}
                    </a>
                  </h3>

                  <p class="text-xs sm:text-sm text-white line-clamp-3 mb-4 sm:mb-6 flex-1 leading-relaxed">
                    {{ Str::limit(strip_tags($article->content), 100) }}
                  </p>

                  <a href="{{ route('article.detail', $article->slug) }}"
                    class="mt-auto inline-flex items-center text-xs sm:text-sm font-bold text-impost-primary hover:text-white transition-colors group/link">
                    <span class="uppercase">Baca Selengkapnya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-chevron-right-icon lucide-chevron-right w-3.5 h-3.5 sm:w-4 sm:h-4 ml-1.5 sm:ml-2">
                      <path d="m9 18 6-6-6-6" />
                    </svg>
                  </a>
                </div>
              </article>
            @endforeach
          </div>

          {{-- Pagination --}}
          <div class="mt-6 sm:mt-8">
            <x-custom-pagination :items="$articles" />
          </div>

          <script>
            document.addEventListener('DOMContentLoaded', function() {
              const skeleton = document.getElementById('articles-skeleton');
              const content = document.getElementById('articles-content');
              if (!skeleton || !content) return;

              const imgs = content.querySelectorAll('img');
              let loaded = 0;

              function reveal() {
                skeleton.style.display = 'none';
                content.style.opacity = '1';
              }

              if (!imgs.length) {
                reveal();
                return;
              }

              function onLoad() {
                if (++loaded >= imgs.length) reveal();
              }

              imgs.forEach(img => {
                if (img.complete) {
                  onLoad();
                } else {
                  img.addEventListener('load', onLoad, {
                    once: true
                  });
                  img.addEventListener('error', onLoad, {
                    once: true
                  });
                }
              });

              setTimeout(reveal, 1500);
            });
          </script>
        @endif
      </section>

    </div>
  </main>
@endsection
