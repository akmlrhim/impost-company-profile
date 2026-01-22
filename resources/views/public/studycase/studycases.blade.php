@extends('layouts.public')

@section('content')
  <main class="pt-24 sm:pt-42 py-8 sm:py-16 antialiased bg-[#0a0a0a]">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

      <div class="mb-12 md:mb-16 text-center">
        <h1
          class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent uppercase tracking-tight">
          {{ $title }}
        </h1>
      </div>

      <section class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 py-6 mb-8">

          @forelse ($studyCase as $s)
            <a href="{{ route('detail-study-case', $s->slug) }}" class="group block h-full">
              <div
                class="relative h-full overflow-hidden rounded-2xl border border-white/10 bg-[#121212] transition-all duration-500 hover:border-impost-primary/50 hover:shadow-[0_0_30px_rgba(var(--impost-primary),0.15)] hover:-translate-y-2">

                <div class="relative aspect-[4/3] overflow-hidden">
                  @if ($s->cover_path)
                    <img src="{{ asset('storage/' . $s->cover_path) }}" alt="{{ $s->name }}"
                      class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 filter grayscale group-hover:grayscale-0">
                  @else
                    <div
                      class="w-full h-full bg-[#1a1a1a] flex items-center justify-center group-hover:bg-[#222] transition-colors">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="w-16 h-16 text-white/10 group-hover:text-impost-primary/50 transition-colors">
                        <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                        <rect width="20" height="14" x="2" y="6" rx="2" />
                      </svg>
                    </div>
                  @endif

                  {{-- Overlay Gradient --}}
                  <div
                    class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300">
                  </div>

                  {{-- Hover Icon Center --}}
                  <div
                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform scale-75 group-hover:scale-100">
                    <div
                      class="w-12 h-12 rounded-full bg-impost-primary/90 backdrop-blur-sm flex items-center justify-center text-black shadow-lg">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                      </svg>
                    </div>
                  </div>
                </div>

                {{-- Content (Title) --}}
                <div class="absolute bottom-0 left-0 right-0 p-6 z-20">
                  <h3
                    class="text-white text-lg md:text-xl font-bold leading-tight mb-1 group-hover:text-impost-primary transition-colors duration-300 line-clamp-2">
                    {{ $s->name }}
                  </h3>
                  <div class="h-0.5 w-0 bg-impost-primary group-hover:w-16 transition-all duration-500 ease-out"></div>
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
  </main>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const studyCaseLinks = document.querySelectorAll('a[href*="study-case/"], .study-case-link');

      studyCaseLinks.forEach(link => {
        link.addEventListener('click', function() {
          sessionStorage.setItem('studyCaseSource', 'full');
        });
      });
    });
  </script>
@endpush
