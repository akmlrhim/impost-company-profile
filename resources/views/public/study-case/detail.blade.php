@extends('layouts.public')

@section('content')
  <main class="pt-24 sm:pt-28 antialiased">

    <div class="px-4 mx-auto max-w-7xl py-8 sm:py-12">
      <nav class="flex mb-8" aria-label="Breadcrumb" data-aos="fade-down">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ url('/') }}#study-case"
              class="inline-flex items-center text-xs sm:text-sm font-medium text-gray-300 hover:text-impost-primary transition-colors duration-300">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
              </svg>
              Study Case
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd" />
              </svg>
              <span class="ml-1 text-xs sm:text-sm font-medium text-gray-400 md:ml-2">Detail</span>
            </div>
          </li>
        </ol>
      </nav>

      <div class="mb-12 text-center" data-aos="fade-up">
        <h1 class="text-lg sm:text-xl font-bold text-impost-primary uppercase mb-4 leading-tight">
          {{ $studyCase->name }}
        </h1>
      </div>

      <div class="px-4 mx-auto max-w-6xl pb-16">

        @if ($studyCase->media && $studyCase->media->count() > 0)
          <div class="mb-16" data-aos="fade-up">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              @foreach ($studyCase->media as $media)
                <div
                  class="group relative overflow-hidden rounded-xl border border-slate-700/50 bg-slate-800/50 backdrop-blur-sm hover:border-impost-primary/50 transition-all duration-300">
                  @if ($media->media_type === 'image')
                    <div class="aspect-video relative overflow-hidden cursor-pointer"
                      onclick="openMedia({{ $loop->index }})">


                      <img src="{{ asset('storage/' . $media->file_path) }}" alt="{{ $media->filename }}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                        loading="lazy">

                      <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent
														 opacity-0 group-hover:opacity-100 transition-opacity duration-300
														 pointer-events-none">
                      </div>

                      <div
                        class="absolute top-3 right-3 w-8 h-8 bg-slate-900/80 rounded-full
														 flex items-center justify-center pointer-events-none">
                        <svg class="w-4 h-4 text-impost-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                      </div>

                    </div>
                  @elseif ($media->media_type === 'video')
                    <div class="aspect-video relative overflow-hidden cursor-pointer"
                      onclick="openMedia({{ $loop->index }})">

                      <video class="w-full h-full object-cover rounded-t-xl pointer-events-none" preload="metadata">
                        <source src="{{ asset('storage/' . $media->file_path) }}" type="video/mp4">
                      </video>

                      <div
                        class="absolute top-3 right-3 w-8 h-8 bg-slate-900/80 rounded-full flex items-center justify-center pointer-events-none">
                        <svg class="w-4 h-4 text-impost-secondary" fill="none" stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </div>

                    </div>
                  @endif

                </div>
              @endforeach
            </div>
          </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

          @if ($studyCase->situation)
            <div data-aos="fade-up"
              class="bg-gradient-to-br from-slate-800/60 to-slate-900/60 backdrop-blur-sm
										 rounded-xl p-6 border border-impost-primary/20 shadow-lg">

              <div class="flex items-center gap-3 mb-4">
                <div
                  class="w-9 h-9 rounded-lg bg-gradient-to-br from-red-500 to-orange-500
												 flex items-center justify-center shadow-md">
                  <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-white tracking-tight">
                  Situation
                </h3>
              </div>

              <div class="h-px bg-gradient-to-r from-impost-primary/40 to-transparent mb-4"></div>

              <div
                class="prose prose-invert prose-sm max-w-none
													prose-p:text-gray-300 prose-p:leading-relaxed
													prose-li:marker:text-impost-primary">
                {!! $studyCase->situation !!}
              </div>
            </div>
          @endif

          @if ($studyCase->solution)
            <div data-aos="fade-up"
              class="bg-gradient-to-br from-slate-800/60 to-slate-900/60 backdrop-blur-sm
										 rounded-xl p-6 border border-impost-secondary/20 shadow-lg">

              <div class="flex items-center gap-3 mb-4">
                <div
                  class="w-9 h-9 rounded-lg bg-gradient-to-br from-blue-500 to-cyan-500
												 flex items-center justify-center shadow-md">
                  <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0z" />
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-white tracking-tight">
                  Solution
                </h3>
              </div>

              <div class="h-px bg-gradient-to-r from-impost-secondary/40 to-transparent mb-4"></div>

              <div
                class="prose prose-invert prose-sm max-w-none
													prose-p:text-gray-300 prose-p:leading-relaxed
													prose-li:marker:text-impost-secondary">
                {!! $studyCase->solution !!}
              </div>
            </div>
          @endif

          @if ($studyCase->result)
            <div data-aos="fade-up"
              class="bg-gradient-to-br from-slate-800/60 to-slate-900/60 backdrop-blur-sm
										 rounded-xl p-6 border border-impost-fourth/20 shadow-lg">

              <div class="flex items-center gap-3 mb-4">
                <div
                  class="w-9 h-9 rounded-lg bg-gradient-to-br from-green-500 to-emerald-500
												 flex items-center justify-center shadow-md">
                  <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0z" />
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-white tracking-tight">
                  Result
                </h3>
              </div>

              <div class="h-px bg-gradient-to-r from-impost-fourth/40 to-transparent mb-4"></div>

              <div
                class="prose prose-invert prose-sm max-w-none
													prose-p:text-white prose-p:leading-relaxed
													prose-li:marker:text-white">
                {!! $studyCase->result !!}
              </div>
            </div>
          @endif
        </div>

        <div class="text-center mt-16" data-aos="fade-up">
          <div
            class="bg-gradient-to-r from-impost-primary/10 via-impost-secondary/10 to-impost-fourth/10 rounded-2xl p-8 md:p-12 border border-impost-primary/30">
            <h3 class="text-xl md:text-2xl font-bold text-white mb-3">Tertarik Mendapatkan Hasil Serupa?</h3>
            <p class="text-gray-400 mb-6 text-sm md:text-base">Mari kita diskusikan bagaimana kami dapat membantu bisnis
              Anda berkembang</p>
            <a href="{{ route('contact') }}"
              class="inline-flex items-center px-6 py-3 md:px-8 md:py-4 bg-gradient-to-r from-impost-primary to-impost-secondary text-white font-semibold rounded-full hover:shadow-2xl hover:scale-105 transition-all duration-300 text-sm md:text-base">
              Hubungi Kami
              <svg class="w-4 h-4 md:w-5 md:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
              </svg>
            </a>
          </div>
        </div>

      </div>
    </div>
  </main>

  <div id="mediaLightbox"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 backdrop-blur-sm p-4">

    <button onclick="closeLightbox()" class="absolute top-5 right-5 text-white hover:text-impost-primary transition">
      ✕
    </button>

    <div id="lightboxContent" class="max-w-6xl w-full max-h-[90vh] flex items-center justify-center"></div>

    <!-- Left -->
    <button onclick="prevMedia()" class="absolute left-5 text-white text-4xl z-50 hover:text-impost-primary transition">
      ‹
    </button>

    <!-- Right -->
    <button onclick="nextMedia()"
      class="absolute right-5 text-white text-4xl z-50 hover:text-impost-primary transition">
      ›
    </button>

  </div>

@endsection

@push('scripts')
  <script>
    window.mediaGallery = @json(
        $studyCase->media->values()->map(fn($m) => [
                'type' => $m->media_type,
                'src' => asset('storage/' . $m->file_path),
            ]));
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {

      const lightbox = document.getElementById('mediaLightbox');
      const content = document.getElementById('lightboxContent');
      let currentIndex = 0;

      function renderMedia(index) {
        const media = window.mediaGallery[index];
        if (!media) return;

        if (media.type === 'image') {
          content.innerHTML = `
        <img src="${media.src}"
          class="max-h-[90vh] max-w-full rounded-xl shadow-2xl">
      `;
        } else {
          content.innerHTML = `
        <video src="${media.src}"
          controls autoplay
          class="max-h-[90vh] max-w-full rounded-xl shadow-2xl">
        </video>
      `;
        }
      }

      window.openMedia = function(index) {
        currentIndex = index;
        renderMedia(currentIndex);
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
      };

      window.closeLightbox = function() {
        content.innerHTML = '';
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
      };

      window.prevMedia = function() {
        currentIndex =
          (currentIndex - 1 + window.mediaGallery.length) % window.mediaGallery.length;
        renderMedia(currentIndex);
      };

      window.nextMedia = function() {
        currentIndex =
          (currentIndex + 1) % window.mediaGallery.length;
        renderMedia(currentIndex);
      };

      lightbox.addEventListener('click', e => {
        if (e.target === lightbox) closeLightbox();
      });

      document.addEventListener('keydown', e => {
        if (e.key === 'ArrowLeft') prevMedia();
        if (e.key === 'ArrowRight') nextMedia();
        if (e.key === 'Escape') closeLightbox();
      });

    });
  </script>
@endpush
