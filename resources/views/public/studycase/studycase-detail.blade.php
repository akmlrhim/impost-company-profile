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

      <section
        class="relative h-[60vh] sm:h-[70vh] md:h-[80vh] overflow-hidden rounded-2xl sm:rounded-3xl mb-16 sm:mb-20 group cursor-pointer"
        x-data="{ showLightbox: false }" @click="showLightbox = true; document.body.style.overflow = 'hidden'">

        <img src="{{ asset('storage/' . $studyCase->cover_path) }}" alt="{{ $studyCase->name }}"
          class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          loading="eager">

        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

        <div
          class="absolute top-4 right-4 sm:top-6 sm:right-6 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <div class="bg-black/50 backdrop-blur-sm p-2 sm:p-3 rounded-full">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
            </svg>
          </div>
        </div>

        <div class="relative z-10 flex items-end h-full px-6 sm:px-12 pb-10">
          <h1 class="text-white text-sm sm:text-xl font-bold max-w-4xl leading-tight drop-shadow-2xl">
            {{ $studyCase->name }}
          </h1>
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

            <div
              class="fixed top-6 left-1/2 -translate-x-1/2 z-[100000] text-white/70 text-sm hidden sm:block pointer-events-none">
              <p
                class="flex items-center gap-2 bg-black/60 px-4 py-2 rounded-full backdrop-blur-sm border border-white/10">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span>Klik di luar gambar atau tekan ESC untuk menutup</span>
              </p>
            </div>

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

      <div class="mx-auto max-w-7xl space-y-16 sm:space-y-20">

        <section>
          <h2 class="text-lg sm:text-xl font-semibold mb-6 text-impost-primary flex items-center gap-3">
            <span class="w-1 h-8 bg-impost-primary rounded-full"></span>
            Situation
          </h2>
          <div
            class="prose prose-sm md:prose-base prose-invert max-w-none prose-headings:text-white prose-p:text-white prose-li:text-white prose-li:marker:text-white prose-ol:text-white prose-ul:text-white prose-a:text-yellow-400 hover:prose-a:text-yellow-300 prose-strong:text-white">
            {!! $studyCase->situation !!}
          </div>
        </section>

        <section>
          <h2 class="text-lg sm:text-xl font-semibold mb-6 text-impost-primary flex items-center gap-3">
            <span class="w-1 h-8 bg-impost-primary rounded-full"></span>
            Solution
          </h2>
          <div
            class="prose prose-sm md:prose-base prose-invert max-w-none prose-headings:font-semibold prose-headings:text-white prose-p:text-white prose-li:text-white prose-li:marker:text-white prose-ol:text-white prose-ul:text-white prose-p:leading-relaxed prose-a:text-blue-400 hover:prose-a:text-blue-300 prose-strong:text-white">
            {!! $studyCase->solution !!}
          </div>
        </section>

        <section>
          <h2 class="text-lg sm:text-xl font-semibold mb-6 text-impost-primary flex items-center gap-3">
            <span class="w-1 h-8 bg-impost-primary rounded-full"></span>
            Result
          </h2>
          <div
            class="prose prose-sm md:prose-base prose-invert max-w-none prose-headings:font-semibold prose-headings:text-white prose-p:text-white prose-li:text-white prose-li:marker:text-white prose-ol:text-white prose-ul:text-white prose-p:leading-relaxed prose-a:text-green-400 hover:prose-a:text-green-300 prose-strong:text-white">
            {!! $studyCase->result !!}
          </div>
        </section>

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
