@extends('layouts.public')

@section('content')
  <main class="antialiased pt-24 sm:pt-42 pb-20 bg-[#0a0a0a]">

    <div class="mx-auto max-w-7xl px-4 sm:px-6">

      <div class="mx-auto mb-10">
        <button id="backButton"
          class="group inline-flex items-center gap-2 text-sm sm:text-base text-white transition-all duration-300 hover:text-impost-primary cursor-pointer">
          <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:-translate-x-0.5" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          Kembali
        </button>
      </div>

      <h1 class="text-impost-primary text-xl sm:text-3xl font-bold mb-4 text-center">
        {{ $studyCase->name }}
      </h1>

      <div class="flex justify-center mb-8">
        <span
          class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-impost-primary/30 bg-impost-primary/10 backdrop-blur-sm">
          <span class="text-xs font-bold text-impost-primary uppercase tracking-wide">
            {{ $studyCase->category }}
          </span>
        </span>
      </div>

      <section
        class="relative w-full h-auto mb-16 sm:mb-20 group cursor-pointer overflow-hidden flex justify-center bg-[#0a0a0a]"
        x-data="{ showLightbox: false }" @click="showLightbox = true; document.body.style.overflow = 'hidden'">

        <img src="{{ asset('storage/' . $studyCase->cover_path) }}" alt="{{ $studyCase->name }}"
          class="w-full h-auto sm:w-auto sm:max-w-full sm:max-h-[85vh] object-contain transition-transform duration-500 group-hover:scale-105 block"
          loading="lazy">

        <div
          class="absolute top-4 right-4 sm:top-6 sm:right-6 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <div class="bg-black/50 backdrop-blur-sm p-2 sm:p-3 rounded-full border border-white/10 shadow-lg">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
              class="fixed top-6 right-6 z-[100000] p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all hover:scale-110 active:scale-95">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
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

      <div class="mx-auto max-w-7xl space-y-12 sm:space-y-16">


        <div class="flex items-center gap-4 mb-8">
          <div class="flex items-center gap-3">
            <div class="relative">

              <span class="relative block w-1.5 h-10 bg-impost-primary rounded-full"></span>
            </div>
            <div>
              <span class="text-xs uppercase tracking-wider text-impost-primary/60 font-medium">01</span>
              <h2 class="text-xl sm:text-2xl font-bold text-white tracking-tight">Situation</h2>
            </div>
          </div>

        </div>

        <div class="relative pl-0 sm:pl-8">
          <div class="prose prose-sm md:prose-base prose-invert max-w-none text-white leading-relaxed">
            {!! $studyCase->situation !!}
          </div>
        </div>

        <div class="flex items-center gap-4 mb-8">
          <div class="flex items-center gap-3">
            <div class="relative">
              <span class="relative block w-1.5 h-10 bg-impost-primary rounded-full"></span>
            </div>
            <div>
              <span class="text-xs uppercase tracking-wider text-impost-primary/60 font-medium">02</span>
              <h2 class="text-xl sm:text-2xl font-bold text-white tracking-tight">Solution</h2>
            </div>
          </div>

        </div>

        <div class="relative pl-0 sm:pl-8">
          <div class="prose prose-sm md:prose-base prose-invert max-w-none text-white leading-relaxed">
            {!! $studyCase->solution !!}
          </div>
        </div>



        <div class="flex items-center gap-4 mb-8">
          <div class="flex items-center gap-3">
            <div class="relative">

              <span class="relative block w-1.5 h-10 bg-impost-primary rounded-full"></span>
            </div>
            <div>
              <span class="text-xs uppercase tracking-wider text-impost-primary/60 font-medium">03</span>
              <h2 class="text-xl sm:text-2xl font-bold text-white tracking-tight">Result</h2>
            </div>
          </div>

        </div>

        <div class="relative pl-0 sm:pl-8">
          <div class="prose prose-sm md:prose-base prose-invert max-w-none text-white leading-relaxed">
            {!! $studyCase->result !!}
          </div>
        </div>
      </div>


    </div>

    <div class="mt-24 mb-8">
      <div class="relative mx-auto w-full bg-impost-primary overflow-hidden">

        <div class="absolute inset-0 opacity-10 pointer-events-none"
          style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 20px 20px;">
        </div>

        <div class="relative p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8 max-w-7xl mx-auto">

          <div class="text-center md:text-left space-y-3 flex-1">
            <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight tracking-tight">
              Ingin bisnis anda tumbuh seperti mereka?
            </h3>
            <p class="text-gray-800 text-sm md:text-base font-medium max-w-xl mx-auto md:mx-0 leading-relaxed">
              Anda sudah melihat buktinya. Sekarang giliran anda untuk mendapatkan solusi digital yang berdampak nyata.
            </p>
          </div>

          <div class="flex flex-col sm:flex-row w-full md:w-auto items-center gap-4 shrink-0 z-10">

            <a href="{{ route('vsl-form') }}"
              class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-transparent border-2 border-gray-900 text-gray-900 rounded-xl font-bold text-sm transition-all duration-300 hover:bg-gray-900 hover:text-white focus:ring-4 focus:ring-gray-900/20">
              <span>Daftar Sekarang</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                stroke-linejoin="round" class="transition-transform group-hover:translate-x-1">
                <path d="M5 12h14" />
                <path d="m12 5 7 7-7 7" />
              </svg>
            </a>

            <a href="{{ route('contact') }}"
              class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gray-900 text-white rounded-xl font-bold text-sm tracking-wide shadow-xl transition-all duration-300 hover:bg-gray-800 hover:shadow-2xl hover:-translate-y-1 focus:ring-4 focus:ring-gray-900/30">
              <span>Kontak Kami</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                stroke-linejoin="round" class="transition-transform group-hover:rotate-12 text-impost-primary">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
              </svg>
            </a>

          </div>

        </div>
      </div>
    </div>
  </main>
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
