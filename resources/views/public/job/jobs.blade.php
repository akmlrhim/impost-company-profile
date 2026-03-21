@extends('layouts.public')

@section('title', 'Karir | Impost Media')
@section('meta_description',
  'Bergabunglah bersama tim Impost Media. Lihat lowongan karir terbaru dan jadilah bagian
  dari agensi digital marketing terkemuka di Kalimantan Selatan.')

@section('content')
  <main class="pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 antialiased bg-impost-fifth min-h-screen">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

      <div class="text-center mb-8 sm:mb-16">
        <h1 class="text-2xl sm:text-4xl md:text-5xl font-bold text-white mb-3 sm:mb-4">
          Bergabung Bersama <span class="text-impost-primary">Kami</span>
        </h1>
        <p class="text-gray-400 max-w-2xl mx-auto text-xs sm:text-base">
          Temukan peran yang tepat untuk mengembangkan potensi Anda. Kami mencari talenta terbaik untuk tumbuh bersama.
        </p>
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
