@extends('layouts.public')

@section('title', 'Study Case | Impost Media')
@section('meta_description',
  'Lihat studi kasus nyata klien Impost Media — bagaimana kami membantu bisnis tumbuh melalui
  strategi digital marketing yang terukur dan berorientasi hasil di Kalimantan Selatan.')

@section('content')
  <main class="pt-24 sm:pt-42 py-8 sm:py-16 antialiased bg-[#0a0a0a] min-h-screen">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

      <div class="mb-10 md:mb-16 text-center">
        <h1 class="text-2xl md:text-4xl capitalize font-bold mb-3 md:mb-4 text-impost-primary">
          {{ $title }}
        </h1>
      </div>

      <section class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 py-6 mb-8">

          @forelse ($studyCase as $s)
            <a href="{{ route('detail-study-case', $s->slug) }}" class="group block h-full transition-all duration-500">

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
                    class="text-white text-base sm:text-lg md:text-xl font-bold leading-tight mb-1.5 sm:mb-2 group-hover:text-impost-primary transition-colors duration-300 line-clamp-2">
                    {{ $s->name }}
                  </h3>

                  <div class="flex items-center gap-2 mb-1 sm:mb-3">
                    <p
                      class="text-[10px] sm:text-xs font-bold text-white uppercase tracking-wide group-hover:text-white transition-colors">
                      {{ $s->category }}
                    </p>
                  </div>

                </div>

              </div>
            </a>
          @empty
            <div class="col-span-full py-12">
              <x-empty-card item="Study Case" />
            </div>
          @endforelse

        </div>

        <div class="mt-8">
          <x-custom-pagination :items="$studyCase" />
        </div>
      </section>
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

          <div class="flex flex-col sm:flex-row w-full md:w-auto items-center gap-3 sm:gap-4 shrink-0 z-10">

            <a href="{{ url('/') }}#services"
              class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 sm:px-6 sm:py-3.5 bg-transparent border-2 border-gray-900 text-gray-900 rounded-xl font-bold text-xs sm:text-sm transition-all duration-300 hover:bg-gray-900 hover:text-white focus:ring-4 focus:ring-gray-900/20">
              <span>Lihat Layanan</span>
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
  </main>
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
  </script>
@endpush
