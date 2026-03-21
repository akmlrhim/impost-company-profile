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
                class="inline-flex items-center text-xs sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200">
                Home
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Careers</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-tight">
          Careers
        </h1>
        <p class="text-white/80 text-xs sm:text-sm md:text-base leading-relaxed max-w-xl text-justify">
          Temukan peran yang tepat untuk mengembangkan potensi Anda. Kami mencari talenta terbaik untuk tumbuh bersama.
        </p>
      </div>

    </div>

  </section>

  <div class="py-8 sm:py-12 md:py-14 antialiased bg-impost-fifth min-h-screen">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

      {{-- Search & Filter Section --}}
      <div
        class="mb-8 p-3.5 sm:p-6 bg-gradient-to-b from-[#111111] to-[#0a0a0a] border border-white/10 rounded-2xl shadow-2xl relative overflow-hidden backdrop-blur-sm">

        <form action="{{ route('careers') }}" method="GET"
          class="relative z-10 flex flex-col lg:flex-row gap-3 sm:gap-4 items-center" x-data>

          {{-- Search Group --}}
          <div class="w-full lg:flex-1 flex relative shadow-sm">
            <div class="relative w-full flex items-center">
              <svg class="absolute left-3.5 sm:left-4 w-4 h-4 sm:w-5 sm:h-5 text-gray-500" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
              <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari posisi pekerjaan..."
                class="w-full bg-[#151515] text-white placeholder-gray-500 border border-white/10 rounded-l-xl py-2.5 sm:py-3 pl-10 sm:pl-11 pr-3 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all text-xs sm:text-sm font-medium">
            </div>
            <button type="submit"
              class="bg-impost-primary text-black font-bold uppercase tracking-wide text-[10px] sm:text-xs px-4 sm:px-6 py-2.5 sm:py-3 rounded-r-xl hover:bg-impost-secondary transition-colors focus:ring-2 focus:ring-inset focus:ring-white shrink-0">
              Cari
            </button>
          </div>

          {{-- Filters Wrapper --}}
          <div class="w-full lg:w-auto flex flex-col sm:flex-row gap-3 shrink-0">

            {{-- Type Filter --}}
            <div class="relative w-full sm:w-44 lg:w-48 group">
              <select name="type" @change="$el.closest('form').submit()"
                class="w-full appearance-none bg-[#151515] text-gray-300 border border-white/10 rounded-xl py-2.5 sm:py-3 px-3.5 sm:px-4 pr-10 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all text-xs sm:text-sm font-medium cursor-pointer group-hover:border-white/25 shadow-sm">
                <option value="">Semua Tipe</option>
                @foreach ($employmentTypes as $optType)
                  <option value="{{ $optType }}" {{ request('type') == $optType ? 'selected' : '' }}>
                    {{ $optType }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Arrangement Filter --}}
            <div class="relative w-full sm:w-44 lg:w-48 group">
              <select name="arrangement" @change="$el.closest('form').submit()"
                class="w-full appearance-none bg-[#151515] text-gray-300 border border-white/10 rounded-xl py-2.5 sm:py-3 px-3.5 sm:px-4 pr-10 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all text-xs sm:text-sm font-medium cursor-pointer group-hover:border-white/25 shadow-sm">
                <option value="">Semua Sistem</option>
                @foreach ($workArrangements as $optArr)
                  <option value="{{ $optArr }}" {{ request('arrangement') == $optArr ? 'selected' : '' }}>
                    {{ $optArr }}
                  </option>
                @endforeach
              </select>
            </div>

          </div>

          {{-- Clear Filter --}}
          @if (request()->filled('search') || request()->filled('type') || request()->filled('arrangement'))
            <div class="w-full lg:w-auto flex justify-center lg:justify-end pl-0 lg:pl-1 shrink-0 mt-1 lg:mt-0">
              <a href="{{ route('careers') }}"
                class="text-[10px] sm:text-xs font-bold flex items-center gap-1.5 py-2 px-3 rounded-md text-white bg-red-600 hover:bg-red-700"
                title="Hapus Filter">
                <span>Reset</span>
              </a>
            </div>
          @endif

        </form>
      </div>

      @if ($job->count() > 0)
        {{-- Skeleton --}}
        <div id="jobs-skeleton" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 animate-pulse">
          @for ($i = 0; $i < 6; $i++)
            <div class="w-full bg-impost-fifth rounded-lg h-[280px] sm:h-[300px] border border-impost-fourth"></div>
          @endfor
        </div>

        {{-- Content --}}
        <div id="jobs-content"
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 opacity-0 transition-opacity duration-500">
          @foreach ($job as $vacancy)
            <div
              class="group relative flex flex-col bg-impost-fifth border border-impost-fourth rounded-lg overflow-hidden">

              <div class="h-32 sm:h-36 w-full overflow-hidden relative bg-[#1a1a1a]">
                @if ($vacancy->poster)
                  <img src="{{ asset('storage/' . $vacancy->poster) }}" alt="{{ $vacancy->title }}"
                    class="w-full h-full object-cover object-top opacity-80 group-hover:opacity-100 group-hover:scale-105 transition duration-500"
                    loading="lazy">
                  <div class="absolute inset-0 bg-gradient-to-t from-impost-fifth to-transparent"></div>
                @else
                  <div class="w-full h-full flex items-center justify-center bg-impost-fourth/20">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-impost-third opacity-50" fill="none"
                      stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                      </path>
                    </svg>
                  </div>
                @endif

                <div class="absolute top-3 right-3">
                  <span
                    class="px-2 py-1 text-[10px] font-semibold tracking-wide uppercase rounded bg-impost-primary text-impost-fifth">
                    {{ $vacancy->employment_type }}
                  </span>
                </div>
              </div>

              <div class="p-4 sm:p-5 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-impost-third text-[10px] sm:text-xs mb-2">
                  <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  <span>{{ $vacancy->created_at->format('d M Y') }}</span>
                </div>

                <h3
                  class="text-lg sm:text-xl font-bold text-white mb-2 sm:mb-3 group-hover:text-impost-primary transition-colors line-clamp-2">
                  {{ $vacancy->title }}
                </h3>

                <div class="flex flex-wrap gap-1.5 sm:gap-2 mb-4 sm:mb-6">
                  @if (!empty($vacancy->work_arrangements))
                    @foreach ($vacancy->work_arrangements as $arrangement)
                      <span
                        class="inline-flex items-center px-2 py-0.5 rounded text-[10px] sm:text-xs font-medium border border-impost-fourth text-impost-secondary bg-impost-fourth/10">
                        {{ $arrangement }}
                      </span>
                    @endforeach
                  @endif
                </div>

                <div class="mt-auto pt-3 sm:pt-4 border-t border-impost-fourth">
                  <a href="{{ route('job.details', $vacancy) }}"
                    class="mt-auto inline-flex items-center text-xs sm:text-sm font-bold text-impost-primary hover:text-white transition-colors group/link">
                    <span class="uppercase">Lihat Detail</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-chevron-right-icon lucide-chevron-right w-3 h-3 sm:w-4 sm:h-4 ml-1.5 sm:ml-2">
                      <path d="m9 18 6-6-6-6" />
                    </svg>
                  </a>
                </div>
              </div>

            </div>
          @endforeach
        </div>

        <div class="mt-8 sm:mt-16 flex justify-center">
          <x-custom-pagination :items="$job" />
        </div>

        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const skeleton = document.getElementById('jobs-skeleton');
            const content = document.getElementById('jobs-content');
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

            setTimeout(reveal, 1000);
          });
        </script>
      @else
        <div
          class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
          <x-empty-card item="Lowongan pekerjaan" />
        </div>
      @endif

    </div>
    </main>
  @endsection
