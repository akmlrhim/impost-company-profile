@extends('layouts.public')

@section('title', 'Karir | Impost Media')
@section('meta_description',
  'Bergabunglah bersama tim Impost Media. Lihat lowongan karir terbaru dan jadilah bagian
  dari agensi digital marketing terkemuka di Kalimantan Selatan.')

@section('content')
  <main class="pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 antialiased bg-impost-fifth min-h-screen">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

      <div class="text-center mb-10 sm:mb-16">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4">
          Bergabung Bersama <span class="text-impost-primary">Kami</span>
        </h1>
        <p class="text-gray-400 max-w-2xl mx-auto text-sm sm:text-base">
          Temukan peran yang tepat untuk mengembangkan potensi Anda. Kami mencari talenta terbaik untuk tumbuh bersama.
        </p>
      </div>

      @if ($job->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach ($job as $vacancy)
            <div
              class="group relative flex flex-col bg-impost-fifth border border-impost-fourth rounded-lg overflow-hidden">

              <div class="h-36 w-full overflow-hidden relative bg-[#1a1a1a]">
                @if ($vacancy->poster)
                  <img src="{{ asset('storage/' . $vacancy->poster) }}" alt="{{ $vacancy->title }}"
                    class="w-full h-full object-cover object-top opacity-80 group-hover:opacity-100 group-hover:scale-105 transition duration-500">

                  <div class="absolute inset-0 bg-gradient-to-t from-impost-fifth to-transparent"></div>
                @else
                  <div class="w-full h-full flex items-center justify-center bg-impost-fourth/20">
                    <svg class="w-12 h-12 text-impost-third opacity-50" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
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

              <div class="p-5 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-impost-third text-xs mb-2">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  <span>{{ $vacancy->created_at->format('d M Y') }}</span>
                </div>

                <h3
                  class="text-xl font-bold text-white mb-3 group-hover:text-impost-primary transition-colors line-clamp-2">
                  {{ $vacancy->title }}
                </h3>

                <div class="flex flex-wrap gap-2 mb-6">
                  @if (!empty($vacancy->work_arrangements))
                    @foreach ($vacancy->work_arrangements as $arrangement)
                      <span
                        class="inline-flex items-center px-2 py-0.5 rounded text-[10px] sm:text-xs font-medium border border-impost-fourth text-impost-secondary bg-impost-fourth/10">
                        {{ $arrangement }}
                      </span>
                    @endforeach
                  @endif
                </div>

                <div class="mt-auto pt-4 border-t border-impost-fourth">
                  <a href="{{ route('job.details', $vacancy) }}"
                    class="mt-auto inline-flex items-center text-xs sm:text-sm font-bold text-impost-primary hover:text-white transition-colors group/link">
                    <span class="uppercase">Lihat Detail</span>
                    <svg
                      class="w-3.5 h-3.5 sm:w-4 sm:h-4 ml-1.5 sm:ml-2 transform transition-transform group-hover/link:translate-x-1"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                      </path>
                    </svg>
                  </a>
                </div>
              </div>

            </div>
          @endforeach
        </div>

        <div class="mt-10 sm:mt-16 flex justify-center">
          <x-custom-pagination :items="$job" />
        </div>
      @else
        <div class="text-center py-20 border border-impost-fourth border-dashed rounded-xl bg-impost-fifth/50">
          <svg class="mx-auto h-12 w-12 text-impost-third" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
          <h3 class="mt-2 text-sm font-medium text-white">Belum ada lowongan</h3>
        </div>
      @endif

    </div>
  </main>
@endsection
