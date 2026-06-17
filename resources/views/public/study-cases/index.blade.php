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
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Study Case</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
          Study Case
        </h1>
        <p class="text-white/80 text-sm md:text-base lg:text-lg leading-relaxed max-w-xl text-justify">
          Bukti autentik dari strategi yang terukur untuk pertumbuhan bisnis Anda.
        </p>
      </div>
    </div>
  </section>

  <div class="antialiased bg-impost-fifth">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">
      <div class="mb-8 sm:mb-10 md:mb-12 max-w-7xl mx-auto">

        <div class="w-full relative" id="studycase-container">
          @if ($studyCase->isEmpty())
            <div
              class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
              <x-empty-card item="Study Case" />
            </div>
          @else
            {{-- Skeleton --}}
            <div id="studycase-skeleton"
              class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 py-6 mb-8 animate-pulse">
              @for ($i = 0; $i < 6; $i++)
                <div class="w-full bg-[#121212] rounded-2xl aspect-[4/3] border border-white/10"></div>
              @endfor
            </div>

            {{-- Content --}}
            <div id="studycase-content"
              class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 py-6 mb-8 opacity-0 transition-opacity duration-500">

              @foreach ($studyCase as $s)
                <a href="{{ route('detail-study-case', $s->slug) }}"
                  class="group block h-full transition-all duration-500">

                  <div
                    class="relative h-full overflow-hidden rounded-2xl border border-white/10 bg-[#121212] transition-all duration-500 hover:border-impost-primary/50 hover:shadow-[0_0_30px_rgba(var(--impost-primary),0.15)] hover:-translate-y-2">

                    <div class="relative aspect-[4/3] overflow-hidden">

                      @if ($s->cover_path)
                        <img src="{{ asset('storage/' . $s->cover_path) }}" alt="{{ $s->name }}"
                          class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                      @else
                        <div
                          class="w-full h-full bg-[#1a1a1a] flex items-center justify-center group-hover:bg-[#222] transition-colors">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="w-12 h-12 sm:w-16 sm:h-16 text-white/10 group-hover:text-impost-primary/50 transition-colors">
                            <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                            <rect width="20" height="14" x="2" y="6" rx="2" />
                          </svg>
                        </div>
                      @endif

                      <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300">
                      </div>

                    </div>

                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-6 z-20">
                      <h3
                        class="text-white text-base md:text-lg lg:text-xl font-bold leading-tight mb-1.5 sm:mb-2 group-hover:text-impost-primary transition-colors duration-300 line-clamp-2">
                        {{ $s->name }}
                      </h3>

                      <div class="flex items-center gap-2 mb-1 sm:mb-3">
                        <p
                          class="text-[10px] md:text-xs font-bold text-white uppercase tracking-wide group-hover:text-white transition-colors">
                          {{ $s->category }}
                        </p>
                      </div>

                    </div>

                  </div>
                </a>
              @endforeach
            </div>

            <div class="mt-8">
              <x-custom-pagination :items="$studyCase" />
            </div>

          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="mt-16 sm:mt-24 mb-8">
    <div class="relative mx-auto w-full bg-impost-primary overflow-hidden">

      <div
        class="relative p-6 sm:p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-6 sm:gap-8 max-w-7xl mx-auto">

        <div class="text-center md:text-left space-y-2 sm:space-y-3 flex-1">
          <h3 class="text-xl md:text-2xl lg:text-3xl font-extrabold text-gray-900 leading-tight tracking-tight">
            Ingin bisnis anda tumbuh seperti mereka?
          </h3>
          <p class="text-gray-800 text-xs md:text-sm lg:text-base font-medium max-w-xl mx-auto md:mx-0 leading-relaxed">
            Anda sudah melihat buktinya. Sekarang giliran anda untuk mendapatkan solusi digital yang berdampak nyata.
          </p>
        </div>

        <div class="flex flex-col sm:flex-row w-full md:w-auto items-center gap-3 sm:gap-4 shrink-0 z-10">

          <a href="{{ url('/') }}#services"
            class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 sm:px-6 sm:py-3.5 bg-transparent border-2 border-gray-900 text-gray-900 rounded-xl font-bold text-xs md:text-sm lg:text-base transition-all duration-300 hover:bg-gray-900 hover:text-white focus:ring-4 focus:ring-gray-900/20">
            <span>Lihat Layanan</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
              class="w-4 h-4 sm:w-[18px] sm:h-[18px] transition-transform group-hover:translate-x-1">
              <path d="M5 12h14" />
              <path d="m12 5 7 7-7 7" />
            </svg>
          </a>

          <a href="{{ route('contact') }}"
            class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 sm:px-8 sm:py-3.5 bg-gray-900 text-white rounded-xl font-bold text-xs md:text-sm lg:text-base tracking-wide shadow-xl transition-all duration-300 hover:bg-gray-800 hover:shadow-2xl hover:-translate-y-1 focus:ring-4 focus:ring-gray-900/30">
            <span>Kontak Kami</span>
          </a>

        </div>

      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const studyCaseLinks = document.querySelectorAll('a[href*="study-case/"]');
      studyCaseLinks.forEach(link => {
        link.addEventListener('click', function() {
          sessionStorage.setItem('studyCaseSource', 'full');
        });
      });
    });

    (function() {
      const skeleton = document.getElementById('studycase-skeleton');
      const content = document.getElementById('studycase-content');
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
    })();
  </script>
@endpush
