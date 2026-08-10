@extends('layouts.public')

@section('title', 'Study Case | Impost Media')
@section('meta_description',
  'Lihat studi kasus nyata klien Impost Media, bagaimana kami membantu bisnis tumbuh melalui
  strategi digital marketing yang terukur dan berorientasi hasil di Kalimantan Selatan.')

@section('content')
  <section class="relative w-full h-[400px] md:h-[560px] overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('img/pages/study_case.webp') }}');">
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
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Study Case</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-xl md:text-5xl font-bold text-white leading-tight">
          Study Case
        </h1>
        <p class="text-white text-xs md:text-base leading-relaxed max-w-xl">
          Bukti autentik dari strategi yang terukur untuk pertumbuhan bisnis Anda.
        </p>
      </div>

    </div>

  </section>


  <div class="antialiased bg-impost-fifth">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14" id="studycase-wrapper">

      {{-- Filter --}}
      <div class="mb-8 sm:mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-lg sm:text-xl font-bold text-white">Filter</h2>

        <form id="studycase-filter-form" action="{{ route('study-case') }}" method="GET"
          class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4 w-full sm:w-auto">
          <div class="relative w-full sm:w-72">
            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-white/40 pointer-events-none"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
            </svg>
            <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
              placeholder="Masukkan kata kunci.."
              class="w-full bg-impost-dark-800 border border-white/10 rounded-sm py-2.5 pl-10 pr-4 text-sm text-white placeholder:text-white/40 focus:outline-none focus:border-impost-primary transition-colors">
          </div>

          <div class="relative w-full sm:w-48">
            <select name="category"
              class="w-full appearance-none bg-impost-dark-800 border border-white/10 rounded-sm py-2.5 pl-4 pr-9 text-sm text-white focus:outline-none focus:border-impost-primary transition-colors">
              <option value="">Semua Kategori</option>
              @foreach ($categories as $category)
                <option value="{{ $category }}"
                  {{ ($filters['category'] ?? '') === $category ? 'selected' : '' }}>
                  {{ $category }}
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

      {{-- Study Case Grid --}}
      <section class="w-full" id="studycase-container">
        @if ($studyCase->isEmpty())
          <div class="w-full flex items-center justify-center py-10 sm:py-14 mt-6 sm:mt-10">
            <x-empty-card item="Study Case" />
          </div>
        @else
          {{-- Skeleton --}}
          <div id="studycase-skeleton"
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
          <div id="studycase-content"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 mb-10 sm:mb-12 opacity-0 transition-opacity duration-500 motion-reduce:transition-none">
            @foreach ($studyCase as $s)
              <a href="{{ route('detail-study-case', $s->slug) }}" class="group block">
                <div class="relative rounded-lg overflow-hidden aspect-[16/10] bg-impost-dark-800 border border-white/5">
                  @if ($s->cover_path)
                    <img src="{{ asset('storage/' . $s->cover_path) }}" alt="Study case {{ $s->name }}"
                      class="w-full h-full object-cover transition-transform duration-700 motion-safe:group-hover:scale-105"
                      loading="lazy">
                  @else
                    <div
                      class="w-full h-full bg-gradient-to-br from-impost-dark-700 to-impost-dark-900 flex items-center justify-center">
                      <svg class="w-10 h-10 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                        <rect width="20" height="14" x="2" y="6" rx="2" />
                      </svg>
                    </div>
                  @endif
                </div>

                <div class="mt-4">
                  <h3
                    class="text-base sm:text-lg font-bold text-white line-clamp-2 leading-snug group-hover:text-impost-primary transition-colors mb-2">
                    {{ $s->name }}
                  </h3>
                  <div class="flex items-center gap-1.5 text-xs text-white/50">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span>{{ $s->category }}</span>
                  </div>
                </div>
              </a>
            @endforeach
          </div>

          {{-- Pagination --}}
          <div class="mt-6 sm:mt-8" id="studycase-pagination">
            <x-custom-pagination :items="$studyCase" />
          </div>
        @endif
      </section>
    </div>
  </div>

  <section class="py-16 sm:py-20 border-t border-white/[0.07]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
        Ingin Bisnis Anda Tumbuh <span class="text-impost-primary">Seperti Mereka?</span>
      </h2>
      <p class="text-xs md:text-base font-medium text-white max-w-xl mx-auto mb-8">
        Anda sudah melihat buktinya. Sekarang giliran Anda untuk mendapatkan solusi digital yang berdampak nyata.
      </p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
        <a href="{{ route('vsl-form') }}"
          class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5
            bg-impost-primary text-impost-fifth hover:bg-impost-secondary transition-colors duration-150 whitespace-nowrap">
          Konsultasi Sekarang
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
          </svg>
        </a>
        <a href="{{ route('contact') }}"
          class="inline-flex items-center justify-center text-sm font-bold rounded-full px-7 py-3.5
            text-white border-2 border-white/30 hover:border-white/70 transition-colors duration-150 whitespace-nowrap">
          Kontak Kami
        </a>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    (function() {
      'use strict';

      document.addEventListener('click', (e) => {
        const link = e.target.closest('a[href*="studycase/"]');
        if (link) sessionStorage.setItem('studyCaseSource', 'full');
      });

      function revealStudyCases() {
        const skeleton = document.getElementById('studycase-skeleton');
        const content = document.getElementById('studycase-content');
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

      revealStudyCases();

      const wrapper = document.getElementById('studycase-wrapper');
      if (!wrapper) return;

      async function loadStudyCases(url, push) {
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
          const newWrapper = newDoc.getElementById('studycase-wrapper');
          if (!newWrapper) throw new Error('Wrapper missing');

          wrapper.innerHTML = newWrapper.innerHTML;

          if (push) history.pushState({
            studyCaseUrl: url
          }, '', url);

          const newTitle = newDoc.querySelector('title');
          if (newTitle) document.title = newTitle.textContent;

          revealStudyCases();
        } catch (e) {
          window.location.href = url;
          return;
        } finally {
          wrapper.style.opacity = '1';
          wrapper.style.pointerEvents = '';
        }
      }

      document.addEventListener('click', (e) => {
        const link = e.target.closest('#studycase-pagination a[href]');
        if (!link) return;

        const url = new URL(link.href, window.location.href);
        if (url.origin !== window.location.origin) return;

        e.preventDefault();
        loadStudyCases(link.href, true);
      });

      document.addEventListener('submit', (e) => {
        const form = e.target.closest('#studycase-filter-form');
        if (!form) return;

        e.preventDefault();

        const params = new URLSearchParams(new FormData(form));
        [...params.keys()].forEach((key) => {
          if (!params.get(key)) params.delete(key);
        });

        const query = params.toString();
        loadStudyCases(form.action + (query ? '?' + query : ''), true);
      });

      document.addEventListener('change', (e) => {
        const select = e.target.closest('#studycase-filter-form select[name="category"]');
        if (!select) return;

        select.form.requestSubmit();
      });

      window.addEventListener('popstate', () => {
        loadStudyCases(window.location.href, false);
      });
    })();
  </script>
@endpush
