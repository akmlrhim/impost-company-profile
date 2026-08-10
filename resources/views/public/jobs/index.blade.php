@extends('layouts.public')

@section('title', 'Karir | Impost Media')
@section('meta_description',
  'Bergabunglah bersama tim Impost Media. Lihat lowongan karir terbaru dan jadilah bagian
  dari agensi digital marketing terkemuka di Kalimantan Selatan.')

@section('content')

  <section class="relative w-full h-[400px] md:h-[560px] overflow-hidden">

    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('img/pages/careers.webp') }}');">
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
                class="inline-flex items-center text-xs sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200">Home</a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-2.5 h-2.5 sm:w-3 sm:h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Karir</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-xl md:text-5xl font-bold text-white leading-tight">Karir</h1>
        <p class="text-white text-xs md:text-base leading-relaxed max-w-xl">
          Temukan peran yang tepat untuk mengembangkan potensi Anda. Kami mencari talenta terbaik untuk tumbuh bersama.
        </p>
      </div>
    </div>
  </section>


  <div class="antialiased bg-impost-fifth">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14" id="jobs-wrapper">

      {{-- Filter --}}
      <div class="mb-8 sm:mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-lg sm:text-xl font-bold text-white">Filter</h2>

        <form id="jobs-filter-form" action="{{ route('careers') }}" method="GET"
          class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4 w-full sm:w-auto">
          <div class="relative w-full sm:w-72">
            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-white/40 pointer-events-none"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
            </svg>
            <input type="text" name="search" value="{{ $search ?? '' }}"
              placeholder="Cari posisi pekerjaan.."
              class="w-full bg-impost-dark-800 border border-white/10 rounded-sm py-2.5 pl-10 pr-4 text-sm text-white placeholder:text-white/40 focus:outline-none focus:border-impost-primary transition-colors">
          </div>

          <div class="relative w-full sm:w-44">
            <select name="type"
              class="w-full appearance-none bg-impost-dark-800 border border-white/10 rounded-sm py-2.5 pl-4 pr-9 text-sm text-white focus:outline-none focus:border-impost-primary transition-colors">
              <option value="">Semua Tipe</option>
              @foreach ($employmentTypes as $optType)
                <option value="{{ $optType }}" {{ ($type ?? '') === $optType ? 'selected' : '' }}>
                  {{ $optType }}
                </option>
              @endforeach
            </select>
            <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-white/40 pointer-events-none"
              fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </div>

          <div class="relative w-full sm:w-44">
            <select name="arrangement"
              class="w-full appearance-none bg-impost-dark-800 border border-white/10 rounded-sm py-2.5 pl-4 pr-9 text-sm text-white focus:outline-none focus:border-impost-primary transition-colors">
              <option value="">Semua Sistem</option>
              @foreach ($workArrangements as $optArr)
                <option value="{{ $optArr }}" {{ ($arrangement ?? '') === $optArr ? 'selected' : '' }}>
                  {{ $optArr }}
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

      {{-- Jobs Grid --}}
      <section class="w-full" id="jobs-container">
        @if ($job->isEmpty())
          <div class="w-full flex items-center justify-center py-10 sm:py-14 mt-6 sm:mt-10">
            <x-empty-card item="Lowongan pekerjaan" />
          </div>
        @else
          {{-- Skeleton --}}
          <div id="jobs-skeleton"
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
          <div id="jobs-content"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 mb-10 sm:mb-12 opacity-0 transition-opacity duration-500 motion-reduce:transition-none">
            @foreach ($job as $vacancy)
              <a href="{{ route('job.details', $vacancy) }}" class="group block">
                <div class="relative rounded-lg overflow-hidden aspect-[16/10] bg-impost-dark-800 border border-white/5">
                  @if ($vacancy->poster)
                    <img src="{{ asset('storage/' . $vacancy->poster) }}" alt="Lowongan {{ $vacancy->title }}"
                      class="w-full h-full object-cover object-top transition-transform duration-700 motion-safe:group-hover:scale-105"
                      loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                  @else
                    <div
                      class="w-full h-full bg-gradient-to-br from-impost-dark-700 to-impost-dark-900 flex items-center justify-center">
                      <svg class="w-10 h-10 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </div>
                  @endif

                  <div class="absolute top-3 left-3">
                    <span
                      class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide bg-impost-primary text-impost-fifth">
                      {{ $vacancy->employment_type }}
                    </span>
                  </div>
                </div>

                <div class="mt-4">
                  <h3
                    class="text-base sm:text-lg font-bold text-white line-clamp-2 leading-snug group-hover:text-impost-primary transition-colors mb-2">
                    {{ $vacancy->title }}
                  </h3>
                  <div class="flex flex-wrap items-center gap-x-3 gap-y-1.5 text-xs text-white/50">
                    <span class="inline-flex items-center gap-1.5">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      {{ $vacancy->created_at->translatedFormat('d M Y') }}
                    </span>

                    @if (!empty($vacancy->work_arrangements))
                      <span class="inline-flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ implode(' · ', $vacancy->work_arrangements) }}
                      </span>
                    @endif
                  </div>
                </div>
              </a>
            @endforeach
          </div>

          {{-- Pagination --}}
          <div class="mt-6 sm:mt-8" id="jobs-pagination">
            <x-custom-pagination :items="$job" />
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

      function revealJobs() {
        const skeleton = document.getElementById('jobs-skeleton');
        const content = document.getElementById('jobs-content');
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

      revealJobs();

      const wrapper = document.getElementById('jobs-wrapper');
      if (!wrapper) return;

      async function loadJobs(url, push) {
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
          const newWrapper = newDoc.getElementById('jobs-wrapper');
          if (!newWrapper) throw new Error('Wrapper missing');

          wrapper.innerHTML = newWrapper.innerHTML;

          if (push) history.pushState({
            jobsUrl: url
          }, '', url);

          const newTitle = newDoc.querySelector('title');
          if (newTitle) document.title = newTitle.textContent;

          revealJobs();
        } catch (e) {
          window.location.href = url;
          return;
        } finally {
          wrapper.style.opacity = '1';
          wrapper.style.pointerEvents = '';
        }
      }

      document.addEventListener('click', (e) => {
        const link = e.target.closest('#jobs-pagination a[href]');
        if (!link) return;

        const url = new URL(link.href, window.location.href);
        if (url.origin !== window.location.origin) return;

        e.preventDefault();
        loadJobs(link.href, true);
      });

      document.addEventListener('submit', (e) => {
        const form = e.target.closest('#jobs-filter-form');
        if (!form) return;

        e.preventDefault();

        const params = new URLSearchParams(new FormData(form));
        [...params.keys()].forEach((key) => {
          if (!params.get(key)) params.delete(key);
        });

        const query = params.toString();
        loadJobs(form.action + (query ? '?' + query : ''), true);
      });

      document.addEventListener('change', (e) => {
        const select = e.target.closest(
          '#jobs-filter-form select[name="type"], #jobs-filter-form select[name="arrangement"]');
        if (!select) return;

        select.form.requestSubmit();
      });

      window.addEventListener('popstate', () => {
        loadJobs(window.location.href, false);
      });
    })();
  </script>
@endpush
