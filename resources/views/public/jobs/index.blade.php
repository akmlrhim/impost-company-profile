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
      <div class="max-w-2xl flex flex-col gap-3 sm:gap-4">

        <nav class="flex mb-1" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="/"
                class="inline-flex items-center text-xs sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200">Home</a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-white/40 mx-1" aria-hidden="true"
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

  <div class="bg-impost-fifth min-h-screen py-10 sm:py-14" x-data="{
      search: '{{ addslashes(request('search', '')) }}',
      type: '{{ addslashes(request('type', '')) }}',
      typeLabel: '{{ addslashes(request('type') ?: 'Semua Tipe') }}',
      typeOpen: false,
      arrangement: '{{ addslashes(request('arrangement', '')) }}',
      arrangementLabel: '{{ addslashes(request('arrangement') ?: 'Semua Sistem') }}',
      arrangementOpen: false,
      loading: false,
  
      get hasFilter() { return this.search || this.type || this.arrangement; },
  
      async filter() {
          const url = new URL(window.location.href);
          this.search ? url.searchParams.set('search', this.search) : url.searchParams.delete('search');
          this.type ? url.searchParams.set('type', this.type) : url.searchParams.delete('type');
          this.arrangement ? url.searchParams.set('arrangement', this.arrangement) : url.searchParams.delete('arrangement');
          url.searchParams.delete('page');
          await this.loadPage(url.toString());
      },
  
      async loadPage(url) {
          this.loading = true;
          history.pushState({}, '', url);
          try {
              const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
              const html = await res.text();
              const doc = new DOMParser().parseFromString(html, 'text/html');
              const area = doc.getElementById('jobs-area');
              if (area) {
                  document.getElementById('jobs-area').innerHTML = area.innerHTML;
                  this.revealImages();
              }
          } catch (e) { console.error('filter fetch failed', e); } finally { this.loading = false; }
      },
  
      revealImages() {
          const skeleton = document.getElementById('jobs-skeleton');
          const content = document.getElementById('jobs-content');
          if (!skeleton || !content) return;
          const imgs = content.querySelectorAll('img');
          let loaded = 0;
          const reveal = () => {
              skeleton.style.display = 'none';
              content.style.opacity = '1';
          };
          if (!imgs.length) { reveal(); return; }
          const onLoad = () => { if (++loaded >= imgs.length) reveal(); };
          imgs.forEach(img => {
              if (img.complete) onLoad();
              else {
                  img.addEventListener('load', onLoad, { once: true });
                  img.addEventListener('error', onLoad, { once: true });
              }
          });
          setTimeout(reveal, 1000);
      },
  
      /* ── Dropdown helpers ── */
      setType(val, label) {
          this.type = val;
          this.typeLabel = label;
          this.typeOpen = false;
          this.filter();
      },
      setArrangement(val, label) {
          this.arrangement = val;
          this.arrangementLabel = label;
          this.arrangementOpen = false;
          this.filter();
      },
      reset() {
          this.search = '';
          this.type = '';
          this.typeLabel = 'Semua Tipe';
          this.arrangement = '';
          this.arrangementLabel = 'Semua Sistem';
          this.filter();
      },
  
      init() {
          window.addEventListener('popstate', () => this.loadPage(window.location.href));
          document.addEventListener('click', e => {
              const link = e.target.closest('#jobs-area a[href]');
              if (!link) return;
              const url = new URL(link.href, window.location.href);
              if (url.pathname === window.location.pathname) {
                  e.preventDefault();
                  this.loadPage(link.href);
              }
          });
      }
  }"
    @click.outside="typeOpen = false; arrangementOpen = false">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-8 sm:mb-10">
        <form @submit.prevent="filter()" class="flex flex-col sm:flex-row gap-3">

          {{-- Search --}}
          <div class="flex flex-1 min-w-0">
            <div class="relative flex-1">
              <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-white/30 pointer-events-none"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
              <input type="text" x-model="search" placeholder="Cari posisi pekerjaan..."
                @keydown.enter.prevent="filter()"
                class="w-full bg-white/[0.05] text-white placeholder-white/25 text-sm
                  border border-white/[0.08] rounded-l-xl pl-10 pr-3 py-2.5
                  focus:outline-none focus:border-impost-primary/60 focus:bg-white/[0.07]
                  transition-all duration-200">
            </div>
            <button type="button" @click="filter()" :disabled="loading"
              class="shrink-0 bg-impost-primary text-black text-xs font-bold
                px-5 py-2.5 rounded-r-xl hover:bg-impost-secondary transition-colors duration-150
                disabled:opacity-60 disabled:cursor-not-allowed">
              <span x-show="!loading">Cari</span>
              <svg x-show="loading" x-cloak class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
              </svg>
            </button>
          </div>

          {{-- Type dropdown --}}
          <div class="relative" @click.outside="typeOpen = false">
            <button type="button" @click="typeOpen = !typeOpen"
              class="w-full sm:w-40 flex items-center justify-between gap-2
                bg-white/[0.05] text-sm border border-white/[0.08] rounded-xl
                pl-3.5 pr-3 py-2.5 cursor-pointer hover:border-white/20 transition-all duration-200"
              :class="type ? 'text-white' : 'text-white/50'">
              <span x-text="typeLabel" class="truncate"></span>
              <svg class="w-3.5 h-3.5 text-white/30 shrink-0 transition-transform duration-200"
                :class="typeOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div x-show="typeOpen" x-cloak x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              class="absolute left-0 top-full mt-1.5 w-full sm:w-44 z-50
                bg-impost-dark-850 border border-white/10 rounded-xl overflow-hidden shadow-2xl">
              <button type="button" @click="setType('', 'Semua Tipe')"
                class="w-full text-left px-4 py-2.5 text-sm text-white/60 hover:bg-white/[0.07] hover:text-white transition-colors"
                :class="type === '' ? 'text-impost-primary bg-white/[0.04]' : ''">
                Semua Tipe
              </button>
              @foreach ($employmentTypes as $optType)
                <button type="button" @click="setType('{{ $optType }}', '{{ $optType }}')"
                  class="w-full text-left px-4 py-2.5 text-sm text-white/60 hover:bg-white/[0.07] hover:text-white transition-colors border-t border-white/[0.05]"
                  :class="type === '{{ $optType }}' ? 'text-impost-primary bg-white/[0.04]' : ''">
                  {{ $optType }}
                </button>
              @endforeach
            </div>
          </div>

          {{-- Arrangement dropdown --}}
          <div class="relative" @click.outside="arrangementOpen = false">
            <button type="button" @click="arrangementOpen = !arrangementOpen"
              class="w-full sm:w-44 flex items-center justify-between gap-2
                bg-white/[0.05] text-sm border border-white/[0.08] rounded-xl
                pl-3.5 pr-3 py-2.5 cursor-pointer hover:border-white/20 transition-all duration-200"
              :class="arrangement ? 'text-white' : 'text-white/50'">
              <span x-text="arrangementLabel" class="truncate"></span>
              <svg class="w-3.5 h-3.5 text-white/30 shrink-0 transition-transform duration-200"
                :class="arrangementOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div x-show="arrangementOpen" x-cloak x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              class="absolute left-0 top-full mt-1.5 w-full sm:w-48 z-50
                bg-impost-dark-850 border border-white/10 rounded-xl overflow-hidden shadow-2xl">
              <button type="button" @click="setArrangement('', 'Semua Sistem')"
                class="w-full text-left px-4 py-2.5 text-sm text-white/60 hover:bg-white/[0.07] hover:text-white transition-colors"
                :class="arrangement === '' ? 'text-impost-primary bg-white/[0.04]' : ''">
                Semua Sistem
              </button>
              @foreach ($workArrangements as $optArr)
                <button type="button" @click="setArrangement('{{ $optArr }}', '{{ $optArr }}')"
                  class="w-full text-left px-4 py-2.5 text-sm text-white/60 hover:bg-white/[0.07] hover:text-white transition-colors border-t border-white/[0.05]"
                  :class="arrangement === '{{ $optArr }}' ? 'text-impost-primary bg-white/[0.04]' : ''">
                  {{ $optArr }}
                </button>
              @endforeach
            </div>
          </div>

          {{-- Reset (reactive - shows when any filter active) --}}
          <button type="button" @click="reset()" x-show="hasFilter" x-cloak
            class="shrink-0 inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl
              text-xs font-bold text-white/60 hover:text-white
              border border-white/[0.08] hover:border-white/20
              transition-all duration-150">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Reset
          </button>

          {{-- Loading overlay indicator --}}
          <div x-show="loading" x-cloak class="absolute inset-0 rounded-2xl bg-black/10 pointer-events-none"></div>
        </form>
      </div>

      {{-- #jobs-area - this whole block gets swapped by fetch --}}
      <div id="jobs-area">

        @if ($job->count() > 0)

          {{-- Skeleton --}}
          <div id="jobs-skeleton" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 animate-pulse">
            @for ($i = 0; $i < 6; $i++)
              <div class="rounded-2xl border border-white/[0.06] bg-white/[0.03] h-[260px]"></div>
            @endfor
          </div>

          {{-- Job cards --}}
          <div id="jobs-content"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 opacity-0 transition-opacity duration-500">
            @foreach ($job as $vacancy)
              <article
                class="group relative flex flex-col bg-white/[0.04] border border-white/[0.08] rounded-2xl overflow-hidden
                hover:border-white/[0.18] hover:-translate-y-1 transition-all duration-300">

                {{-- Poster --}}
                <div class="relative h-36 w-full overflow-hidden bg-white/[0.03] flex-shrink-0">
                  @if ($vacancy->poster)
                    <img src="{{ asset('storage/' . $vacancy->poster) }}" alt="{{ $vacancy->title }}"
                      class="w-full h-full object-cover object-top opacity-75 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500"
                      loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                  @else
                    <div class="absolute inset-0 flex items-center justify-center">
                      <svg class="w-10 h-10 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </div>
                  @endif
                  <div class="absolute top-3 left-3">
                    <span
                      class="inline-flex items-center px-2.5 py-1 rounded-full
                      text-[10px] font-bold uppercase tracking-wide bg-impost-primary text-black">
                      {{ $vacancy->employment_type }}
                    </span>
                  </div>
                </div>

                {{-- Content --}}
                <div class="flex flex-col flex-1 p-5">
                  <div class="flex items-center gap-1.5 text-white/35 text-xs mb-3">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $vacancy->created_at->format('d M Y') }}
                  </div>

                  <h3
                    class="font-bold text-white mb-3 line-clamp-2
                    group-hover:text-impost-primary transition-colors duration-200">
                    {{ $vacancy->title }}
                  </h3>

                  @if (!empty($vacancy->work_arrangements))
                    <div class="flex flex-wrap gap-1.5 mb-4">
                      @foreach ($vacancy->work_arrangements as $arrangement)
                        <span
                          class="inline-flex items-center px-2.5 py-0.5 rounded-full
                          text-[10px] font-semibold border border-white/[0.12] text-white/60 bg-white/[0.04]">
                          {{ $arrangement }}
                        </span>
                      @endforeach
                    </div>
                  @endif

                  <div class="mt-auto pt-4 border-t border-white/[0.07]">
                    <a href="{{ route('job.details', $vacancy) }}"
                      class="inline-flex items-center gap-1.5 text-xs font-bold text-impost-primary hover:text-white transition-colors duration-150">
                      Lihat Detail
                      <svg class="w-3.5 h-3.5 transition-transform duration-150 group-hover:translate-x-0.5"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                      </svg>
                    </a>
                  </div>
                </div>
              </article>
            @endforeach
          </div>

          {{-- Pagination --}}
          <div class="mt-10 sm:mt-14 flex justify-center">
            <x-custom-pagination :items="$job" />
          </div>

          <script>
            (function() {
              const skeleton = document.getElementById('jobs-skeleton');
              const content = document.getElementById('jobs-content');
              if (!skeleton || !content) return;
              const imgs = content.querySelectorAll('img');
              let loaded = 0;
              const reveal = () => {
                skeleton.style.display = 'none';
                content.style.opacity = '1';
              };
              if (!imgs.length) {
                reveal();
                return;
              }
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
              setTimeout(reveal, 1000);
            })();
          </script>
        @else
          <div class="flex items-center justify-center py-16 border border-white/[0.07] rounded-2xl bg-white/[0.02]">
            <x-empty-card item="Lowongan pekerjaan" />
          </div>
        @endif

      </div>{{-- /#jobs-area --}}

    </div>
  </div>

@endsection
