@extends('layouts.public')

@section('title', $studyCase->name . ' | Impost Media')
@section('meta_description', 'Studi kasus ' . $studyCase->name . ' — lihat bagaimana Impost Media memberikan solusi ' .
  $studyCase->category . ' yang berdampak nyata bagi klien.')

@section('content')
  <section class="relative w-full h-[400px] md:h-[560px] overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('storage/' . $studyCase->cover_path) }}');">
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-impost-fifth/80 via-impost-fifth/40 to-transparent"></div>
    <div class="absolute inset-0 z-10 bg-impost-fifth/30"></div>

    <div
      class="relative z-20 h-full flex flex-col justify-end max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-6 sm:pb-8 md:pb-14">

      <div class="max-w-4xl flex flex-col gap-3 sm:gap-4">

        <nav class="flex mb-1" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="/"
                class="inline-flex items-center text-xs sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200">
                Home
              </a>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <button id="backButton"
                  class="inline-flex items-center text-xs sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200 cursor-pointer">
                  Study Case
                </button>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2 line-clamp-1">Detail</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-tight">
          {{ $studyCase->name }}
        </h1>

        <div>
          <span
            class="inline-flex items-center gap-2 px-3 py-1 sm:px-4 sm:py-1.5 rounded-full border border-impost-primary/30 bg-impost-primary/10 backdrop-blur-sm">
            <span class="text-[10px] sm:text-xs font-bold text-impost-primary uppercase tracking-wide">
              {{ $studyCase->category }}
            </span>
          </span>
        </div>

      </div>
    </div>
  </section>

  <div class="antialiased bg-impost-fifth">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">
      <div class="max-w-7xl mx-auto">

        <section
          class="relative w-full h-auto mb-12 sm:mb-20 group cursor-pointer overflow-hidden flex justify-center bg-[#111] rounded-2xl border border-white/5"
          x-data="{ showLightbox: false }" @click="showLightbox = true; document.body.style.overflow = 'hidden'">

          <div
            class="absolute top-3 right-3 sm:top-6 sm:right-6 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="bg-black/50 backdrop-blur-sm p-1.5 sm:p-3 rounded-full border border-white/10 shadow-lg">
              <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
              </svg>
            </div>
          </div>

          <template x-teleport="body">
            <div x-show="showLightbox" x-cloak @click.self="showLightbox = false; document.body.style.overflow = 'auto'"
              @keydown.escape.window="showLightbox = false; document.body.style.overflow = 'auto'"
              x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
              x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
              class="fixed inset-0 z-[99999] flex items-center justify-center bg-black/98 backdrop-blur-md"
              style="margin: 0 !important; padding: 0 !important;">

              <button @click="showLightbox = false; document.body.style.overflow = 'auto'"
                class="fixed top-4 right-4 sm:top-6 sm:right-6 z-[100000] p-2 sm:p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all hover:scale-110 active:scale-95">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>

              <div class="relative w-full h-full flex items-center justify-center p-4 sm:p-8">
                <div @click.stop x-transition:enter="transition ease-out duration-300 delay-100"
                  x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                  x-transition:leave-end="opacity-0 scale-90" class="relative max-w-[95vw] max-h-[90vh]">
                  <img src="{{ asset('storage/' . $studyCase->cover_path) }}" alt="{{ $studyCase->name }}"
                    class="w-auto h-auto max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl ring-1 ring-white/10">
                </div>
              </div>
            </div>
          </template>
        </section>

        <div class="mx-auto max-w-7xl space-y-8 sm:space-y-16">

          <div class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-8">
            <div class="flex items-center gap-2 sm:gap-3">
              <div class="relative">
                <span class="relative block w-1.5 h-8 sm:h-10 bg-impost-primary rounded-full"></span>
              </div>
              <div>
                <h2 class="text-lg sm:text-2xl font-bold text-white tracking-tight">Situation</h2>
              </div>
            </div>
          </div>

          <div class="relative pl-0 sm:pl-8">
            <x-article-content>
              {!! $studyCase->situation !!}
            </x-article-content>
          </div>

          <div class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-8 mt-8 sm:mt-0">
            <div class="flex items-center gap-2 sm:gap-3">
              <div class="relative">
                <span class="relative block w-1.5 h-8 sm:h-10 bg-impost-primary rounded-full"></span>
              </div>
              <div>
                <h2 class="text-lg sm:text-2xl font-bold text-white tracking-tight">Solution</h2>
              </div>
            </div>
          </div>

          <div class="relative pl-0 sm:pl-8">
            <x-article-content>
              {!! $studyCase->solution !!}
            </x-article-content>
          </div>

          <div class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-8 mt-8 sm:mt-0">
            <div class="flex items-center gap-2 sm:gap-3">
              <div class="relative">
                <span class="relative block w-1.5 h-8 sm:h-10 bg-impost-primary rounded-full"></span>
              </div>
              <div>
                <h2 class="text-lg sm:text-2xl font-bold text-white tracking-tight">Result</h2>
              </div>
            </div>
          </div>

          <div class="relative pl-0 sm:pl-8">
            <x-article-content>
              {!! $studyCase->result !!}
            </x-article-content>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-16 sm:mt-24 mb-8">
    <div class="relative mx-auto w-full bg-impost-primary overflow-hidden">

      <div
        class="relative p-6 sm:p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-6 sm:gap-8 max-w-7xl mx-auto">

        <div class="text-center md:text-left space-y-2 sm:space-y-3 flex-1">
          <h3 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight tracking-tight">
            Ingin bisnis anda tumbuh seperti mereka?
          </h3>
          <p class="text-gray-800 text-xs sm:text-sm md:text-base font-medium max-w-xl mx-auto md:mx-0 leading-relaxed">
            Anda sudah melihat buktinya. Sekarang giliran anda untuk mendapatkan solusi digital yang berdampak nyata.
          </p>
        </div>

        <div class="flex flex-col w-full sm:flex-row md:w-auto items-center gap-3 sm:gap-4 shrink-0 z-10">

          <a href="{{ route('vsl-form') }}"
            class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 sm:px-6 sm:py-3.5 bg-transparent border-2 border-gray-900 text-gray-900 rounded-xl font-bold text-xs sm:text-sm transition-all duration-300 hover:bg-gray-900 hover:text-white focus:ring-4 focus:ring-gray-900/20">
            <span>Daftar Sekarang</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
              class="w-4 h-4 sm:w-[18px] sm:h-[18px] transition-transform group-hover:translate-x-1">
              <path d="M5 12h14" />
              <path d="m12 5 7 7-7 7" />
            </svg>
          </a>

          <a href="{{ route('contact') }}"
            class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 sm:px-8 sm:py-3.5 bg-gray-900 text-white rounded-xl font-bold text-xs sm:text-sm tracking-wide shadow-xl transition-all duration-300 hover:bg-gray-800 hover:shadow-2xl hover:-translate-y-1 focus:ring-4 focus:ring-gray-900/30">
            <span>Kontak Kami</span>
          </a>

        </div>

      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    (function() {
      const backButton = document.getElementById('backButton');

      const studyCaseFullRoute = '{{ route('study-case') }}';
      const homePageStudyCaseSection = '{{ url('/') }}#study-cases';

      backButton.addEventListener('click', function(e) {
        e.preventDefault();

        const sourcePage = sessionStorage.getItem('studyCaseSource');

        if (sourcePage === 'home') {
          window.location.href = homePageStudyCaseSection;
        } else if (sourcePage === 'full') {
          window.location.href = studyCaseFullRoute;
        } else {
          const referrer = document.referrer;
          const currentHost = window.location.origin;

          if (referrer && referrer.startsWith(currentHost)) {
            const referrerPath = new URL(referrer).pathname;

            if (referrerPath === '/' || referrerPath.includes('home')) {
              window.location.href = homePageStudyCaseSection;
            } else {
              window.location.href = studyCaseFullRoute;
            }
          } else {
            window.location.href = studyCaseFullRoute;
          }
        }

        sessionStorage.removeItem('studyCaseSource');
      });
    })();
  </script>
@endpush
