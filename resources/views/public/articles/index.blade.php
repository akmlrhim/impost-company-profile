@extends('layouts.public')

@section('title', 'Artikel | Impost Media')
@section('meta_description',
  'Jelajahi artikel seputar strategi digital marketing, data, dan pertumbuhan bisnis dari tim
  Impost Media, agensi digital marketing terpercaya di Kalimantan Selatan.')

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
                class="inline-flex items-center text-xs sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200">
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
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Artikel</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-xl md:text-5xl font-bold text-white leading-tight">
          Artikel
        </h1>
        <p class="text-white text-xs md:text-base leading-relaxed max-w-xl">
          Jelajahi koleksi artikel kami tentang berbagai topik menarik seputar strategi, data, dan pertumbuhan bisnis.
        </p>
      </div>

    </div>

  </section>


  <div class="antialiased bg-impost-fifth">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14" id="articles-wrapper">

      {{-- Filter --}}
      <div class="mb-8 sm:mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-lg sm:text-xl font-bold text-white">Filter</h2>

        <form id="articles-filter-form" action="{{ route('article.all') }}" method="GET"
          class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4 w-full sm:w-auto">
          <div class="relative w-full sm:w-72">
            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-white/30 pointer-events-none"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
            </svg>
            <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
              placeholder="Masukkan kata kunci.."
              class="w-full bg-impost-dark-800 border border-white/10 rounded-sm py-2.5 pl-10 pr-4 text-sm text-white placeholder:text-white/30 focus:outline-none focus:border-impost-primary transition-colors">
          </div>

          <div class="relative w-full sm:w-40">
            <select name="month"
              class="w-full appearance-none bg-impost-dark-800 border border-white/10 rounded-sm py-2.5 pl-4 pr-9 text-sm text-white focus:outline-none focus:border-impost-primary transition-colors">
              <option value="">Bulan</option>
              @foreach ($months as $num => $name)
                <option value="{{ $num }}"
                  {{ (string) ($filters['month'] ?? '') === (string) $num ? 'selected' : '' }}>
                  {{ $name }}
                </option>
              @endforeach
            </select>
            <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-white/40 pointer-events-none"
              fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </div>

          <div class="relative w-full sm:w-32">
            <select name="year"
              class="w-full appearance-none bg-impost-dark-800 border border-white/10 rounded-sm py-2.5 pl-4 pr-9 text-sm text-white focus:outline-none focus:border-impost-primary transition-colors">
              <option value="">Tahun</option>
              @foreach ($years as $year)
                <option value="{{ $year }}"
                  {{ (string) ($filters['year'] ?? '') === (string) $year ? 'selected' : '' }}>
                  {{ $year }}
                </option>
              @endforeach
            </select>
            <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-white/40 pointer-events-none"
              fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </form>
      </div>

      {{-- Articles Grid --}}
      <section class="w-full" id="articles-container">
        @if ($articles->isEmpty())
          <div class="w-full flex items-center justify-center py-10 sm:py-14 mt-6 sm:mt-10">
            <x-empty-card item="Artikel" />
          </div>
        @else
          {{-- Skeleton --}}
          <div id="articles-skeleton"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 mb-10 sm:mb-12 animate-pulse">
            @for ($i = 0; $i < 6; $i++)
              <div>
                <div class="w-full aspect-[16/10] rounded-lg bg-impost-dark-800 border border-white/5"></div>
                <div class="h-4 w-3/4 bg-impost-dark-800 rounded mt-4"></div>
                <div class="h-3 w-1/3 bg-impost-dark-800 rounded mt-2"></div>
              </div>
            @endfor
          </div>

          {{-- Content --}}
          <div id="articles-content"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 mb-10 sm:mb-12 opacity-0 transition-opacity duration-500">
            @foreach ($articles as $article)
              <a href="{{ route('article.detail', $article->slug) }}" class="group block">
                <div class="relative rounded-lg overflow-hidden aspect-[16/10] bg-impost-dark-800 border border-white/5">
                  @if ($article->cover_path)
                    <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
                      class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                      loading="lazy">
                  @else
                    <div
                      class="w-full h-full bg-gradient-to-br from-impost-dark-700 to-impost-dark-900 flex items-center justify-center">
                      <svg class="w-10 h-10 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                      </svg>
                    </div>
                  @endif
                </div>

                <div class="mt-4">
                  <h3
                    class="text-base sm:text-lg font-bold text-white line-clamp-2 leading-snug group-hover:text-impost-primary transition-colors mb-2">
                    {{ $article->title }}
                  </h3>
                  <div class="flex items-center gap-1.5 text-xs text-white/40">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                      </path>
                    </svg>
                    <span>{{ $article->created_at->translatedFormat('d M Y') }}</span>
                  </div>
                </div>
              </a>
            @endforeach
          </div>

          {{-- Pagination --}}
          <div class="mt-6 sm:mt-8" id="articles-pagination">
            <x-custom-pagination :items="$articles" />
          </div>
        @endif
      </section>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    (function() {
      'use strict';

      function revealArticles() {
        const skeleton = document.getElementById('articles-skeleton');
        const content = document.getElementById('articles-content');
        if (!skeleton || !content) return;

        const imgs = content.querySelectorAll('img');
        let loaded = 0;

        const reveal = () => {
          skeleton.style.display = 'none';
          content.style.opacity = '1';
        };

        if (!imgs.length) return reveal();

        const onLoad = () => {
          if (++loaded >= imgs.length) reveal();
        };

        imgs.forEach(img => {
          if (img.complete) onLoad();
          else {
            img.addEventListener('load', onLoad, {
              once: true
            });
            img.addEventListener('error', onLoad, {
              once: true
            });
          }
        });

        setTimeout(reveal, 1500);
      }

      revealArticles();

      const wrapper = document.getElementById('articles-wrapper');
      if (!wrapper) return;

      async function loadArticles(url, push) {
        wrapper.style.transition = 'opacity .2s ease';
        wrapper.style.opacity = '0.4';
        wrapper.style.pointerEvents = 'none';

        try {
          const res = await fetch(url, {
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            }
          });
          if (!res.ok) throw new Error('Request failed');

          const html = await res.text();
          const newDoc = new DOMParser().parseFromString(html, 'text/html');
          const newWrapper = newDoc.getElementById('articles-wrapper');
          if (!newWrapper) throw new Error('Wrapper missing');

          wrapper.innerHTML = newWrapper.innerHTML;

          if (push) history.pushState({
            articlesUrl: url
          }, '', url);

          const newTitle = newDoc.querySelector('title');
          if (newTitle) document.title = newTitle.textContent;

          revealArticles();
        } catch (e) {
          window.location.href = url;
          return;
        } finally {
          wrapper.style.opacity = '1';
          wrapper.style.pointerEvents = '';
        }
      }

      document.addEventListener('click', (e) => {
        const link = e.target.closest('#articles-pagination a[href]');
        if (!link) return;

        const url = new URL(link.href, window.location.href);
        if (url.origin !== window.location.origin) return;

        e.preventDefault();
        loadArticles(link.href, true);
      });

      document.addEventListener('submit', (e) => {
        const form = e.target.closest('#articles-filter-form');
        if (!form) return;

        e.preventDefault();

        const params = new URLSearchParams(new FormData(form));
        [...params.keys()].forEach((key) => {
          if (!params.get(key)) params.delete(key);
        });

        const query = params.toString();
        loadArticles(form.action + (query ? '?' + query : ''), true);
      });

      document.addEventListener('change', (e) => {
        const select = e.target.closest(
          '#articles-filter-form select[name="month"], #articles-filter-form select[name="year"]');
        if (!select) return;

        select.form.requestSubmit();
      });

      window.addEventListener('popstate', () => {
        loadArticles(window.location.href, false);
      });
    })();
  </script>
@endpush
