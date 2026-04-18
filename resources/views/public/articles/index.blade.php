@extends('layouts.public')

@section('title', 'Artikel | Impost Media')
@section('meta_description',
  'Jelajahi artikel seputar strategi digital marketing, data, dan pertumbuhan bisnis dari tim
  Impost Media — agensi digital marketing terpercaya di Kalimantan Selatan.')

@section('content')
  <section class="relative w-full h-[400px] md:h-[560px] overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('img/pages/article.webp') }}');">
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-impost-fifth/80 via-impost-fifth/40 to-transparent"></div>
    <div class="absolute inset-0 z-10 bg-impost-fifth/30"></div>

    <div
      class="relative z-20 h-full flex flex-col justify-end max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-6 sm:pb-8 md:pb-14">

      <div class="max-w-2xl flex flex-col gap-2 sm:gap-3">

        <nav class="flex mb-1" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="/"
                class="inline-flex items-center text-sm lg:text-base font-medium text-white/70 hover:text-white transition-colors duration-200">
                Home
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-2.5 h-2.5 sm:w-3 sm:h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-sm lg:text-base font-medium text-white md:ms-2">Artikel</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight">
          Artikel
        </h1>
        <p class="text-white/80 text-sm lg:text-base leading-relaxed max-w-xl text-justify">
          Jelajahi koleksi artikel kami tentang berbagai topik menarik seputar strategi, data, dan pertumbuhan bisnis.
        </p>
      </div>

    </div>

  </section>


  <div class="antialiased bg-impost-fifth">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">

      {{-- Filter --}}
      <div class="mb-8 sm:mb-10 md:mb-12 max-w-4xl mx-auto">

        {{-- Mobile Dropdown --}}
        <div class="md:hidden w-full relative">
          <select onchange="window.location.href=this.value"
            class="w-full appearance-none bg-[#121212] text-white border border-white/10 rounded-lg sm:rounded-xl py-2.5 px-4 pr-10 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all cursor-pointer text-sm lg:text-base font-medium shadow-lg">
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
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>

        {{-- Desktop Pills --}}
        <div class="hidden md:flex flex-wrap justify-center gap-2.5">
          <a href="{{ route('article.all') }}"
            class="px-4 py-2 rounded-full text-xs font-bold border transition-all duration-300
            {{ empty($activeCategory)
                ? 'bg-impost-primary text-black border-impost-primary shadow-[0_0_15px_rgba(var(--impost-primary),0.4)]'
                : 'border-white/10 text-white hover:border-impost-primary/50 hover:text-white bg-white/5 hover:bg-white/10' }}">
            Semua
          </a>
          @foreach ($category as $cat)
            <a href="{{ route('article.all', ['category' => $cat->slug]) }}"
              class="px-4 py-2 rounded-full text-xs font-bold border transition-all duration-300
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
            class="w-full flex items-center justify-center py-10 sm:py-14 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
            <x-empty-card item="Artikel" />
          </div>
        @else
          {{-- Skeleton --}}
          <div id="articles-skeleton"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-10 sm:mb-12 animate-pulse">
            @for ($i = 0; $i < 6; $i++)
              <div class="w-full bg-[#121212] rounded-xl sm:rounded-2xl h-[280px] sm:h-[320px] border border-white/5">
              </div>
            @endfor
          </div>

          {{-- Content --}}
          <div id="articles-content"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-10 sm:mb-12 opacity-0 transition-opacity duration-500">
            @foreach ($articles as $article)
              <article
                class="group rounded-xl sm:rounded-2xl bg-[#121212] border border-white/5 shadow-sm overflow-hidden hover:border-impost-primary/30 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">

                <div class="relative h-36 sm:h-44 md:h-48 overflow-hidden">
                  @if ($article->cover_path)
                    <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
                      class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                      loading="lazy">
                  @else
                    <div class="w-full h-full bg-gradient-to-br from-gray-800 to-black flex items-center justify-center">
                      <svg class="w-10 h-10 sm:w-14 sm:h-14 text-white/10" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                      </svg>
                    </div>
                  @endif

                  @if ($article->category)
                    <span
                      class="absolute top-3 left-3 sm:top-4 sm:left-4 z-10 inline-flex items-center rounded-full bg-black/60 backdrop-blur-md border border-white/10 text-impost-primary text-[8px] sm:text-[9px] uppercase font-bold tracking-wider px-2 py-0.5 sm:px-2.5 sm:py-1">
                      {{ $article->category->name }}
                    </span>
                  @endif

                  <div class="absolute inset-0 bg-gradient-to-t from-[#121212] via-transparent to-transparent opacity-60">
                  </div>
                </div>

                <div class="p-4 sm:p-5 flex flex-col flex-1 border-t border-white/5">

                  <div
                    class="flex items-center gap-2 sm:gap-2.5 text-sm lg:text-base font-medium text-white/70 mb-2 sm:mb-3">
                    <div class="flex items-center gap-1 sm:gap-1.5">
                      <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 text-impost-primary" fill="none" stroke="currentColor"
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
                    class="text-base lg:text-lg font-bold text-white mb-2 line-clamp-2 leading-snug group-hover:text-impost-primary transition-colors">
                    <a href="{{ route('article.detail', $article->slug) }}">
                      {{ $article->title }}
                    </a>
                  </h3>

                  <p class="text-sm lg:text-base text-white/80 line-clamp-3 mb-4 sm:mb-5 flex-1 leading-relaxed">
                    {{ Str::limit(strip_tags($article->content), 100) }}
                  </p>

                  <a href="{{ route('article.detail', $article->slug) }}"
                    class="mt-auto inline-flex items-center text-sm lg:text-base font-bold text-impost-primary hover:text-white transition-colors group/link">
                    <span class="uppercase tracking-wider text-xs lg:text-sm">Baca Selengkapnya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-chevron-right-icon lucide-chevron-right w-3 h-3 sm:w-3.5 sm:h-3.5 ml-1.5">
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
  </div>
@endsection
