@extends('layouts.public')

@section('content')
  <main class="pt-24 sm:pt-42 py-8 sm:py-16 antialiased bg-[#0a0a0a]">
    <div class="mx-auto max-w-7xl">

      <div class="mb-8 md:mb-12 text-center px-6">
        <h1
          class="text-3xl md:text-4xl uppercase font-bold mb-4 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          {{ $title }}
        </h1>
      </div>

      <div class="mb-10 px-4">

        <div class="md:hidden w-full max-w-sm mx-auto relative">
          <select onchange="window.location.href=this.value"
            class="w-full appearance-none bg-[#121212] text-white border border-white/10 rounded-xl py-3.5 px-5 pr-12 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all cursor-pointer text-sm font-medium shadow-lg">

            <option value="{{ route('portfolio') }}" {{ empty($activeCategory) ? 'selected' : '' }}>
              Semua Kategori
            </option>

            @foreach ($category as $cat)
              <option value="{{ route('portfolio', ['category' => $cat->slug]) }}"
                {{ ($activeCategory ?? '') === $cat->slug ? 'selected' : '' }}>
                {{ $cat->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="hidden md:flex flex-wrap justify-center gap-2">
          <a href="{{ route('portfolio') }}"
            class="px-4 py-2 rounded-full text-sm font-bold border transition
            {{ empty($activeCategory)
                ? 'bg-impost-primary text-impost-fifth border-impost-primary'
                : 'border-impost-fourth text-white hover:bg-impost-fourth/40' }}">
            Semua
          </a>

          @foreach ($category as $cat)
            <a href="{{ route('portfolio', ['category' => $cat->slug]) }}"
              class="px-4 py-2 rounded-full text-sm font-bold border transition
              {{ ($activeCategory ?? '') === $cat->slug
                  ? 'bg-impost-primary text-impost-fifth border-impost-primary'
                  : 'border-impost-fourth text-white hover:bg-impost-fourth/40' }}">
              {{ $cat->name }}
            </a>
          @endforeach
        </div>
      </div>

      <section class="mx-auto w-full max-w-7xl px-3">

        @if ($portfolios->isEmpty())
          <div class="w-full flex items-center justify-center">
            <x-empty-card item="Portfolio" />
          </div>
        @else
          <div class="columns-2 sm:columns-3 lg:columns-4 gap-3 md:gap-4 mb-10 md:mb-12 space-y-3 md:space-y-4">

            @foreach ($portfolios as $portfolio)
              <article
                class="group relative rounded-2xl overflow-hidden border border-impost-fourth bg-[#0f0f0f] shadow-md cursor-pointer break-inside-avoid mb-3 md:mb-4"
                data-media="{{ $portfolio->media_path ? asset('storage/' . $portfolio->media_path) : '' }}"
                data-type="{{ $portfolio->media_type ?? 'image' }}" data-index="{{ $loop->index }}"
                onclick="openMedia({{ $loop->index }}, '{{ $portfolio->media_type ?? 'image' }}')">

                <div class="relative w-full overflow-hidden bg-[#151515] flex items-center justify-center">
                  @if ($portfolio->media_path)
                    @if ($portfolio->media_type === 'image')
                      <img src="{{ asset('storage/' . $portfolio->media_path) }}" alt="{{ $portfolio->title }}"
                        class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                    @elseif ($portfolio->media_type === 'video')
                      <video class="w-full h-auto object-cover" muted>
                        <source src="{{ asset('storage/' . $portfolio->media_path) }}" type="video/mp4">
                      </video>
                      <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div
                          class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center group-hover:scale-110 transition-transform">
                          <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                          </svg>
                        </div>
                      </div>
                    @endif
                  @else
                    <div class="w-full aspect-[9/16] flex items-center justify-center">
                      <svg class="w-24 h-24 text-impost-fourth opacity-70" viewBox="0 0 24 24" fill="none">
                        <rect x="3" y="3" width="18" height="18" rx="3" stroke="currentColor"
                          stroke-width="1.5" />
                        <circle cx="9" cy="9" r="2" stroke="currentColor" stroke-width="1.5" />
                        <path d="M21 15L16 10L5 21" stroke="currentColor" stroke-width="1.5" />
                      </svg>
                    </div>
                  @endif

                  <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                  @if ($portfolio->category)
                    <span
                      class="absolute top-3 left-3 z-10 rounded-full bg-impost-primary/90 text-impost-fifth text-[10px] md:text-xs font-bold uppercase px-3 py-1 shadow">
                      {{ $portfolio->category->name }}
                    </span>
                  @endif
                </div>
              </article>
            @endforeach
          </div>

          <x-custom-pagination :items="$portfolios" />
        @endif
      </section>
    </div>
  </main>

  <div id="mediaModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/95 backdrop-blur-sm"
    style="position: fixed; top: 0; left: 0; right: 0; bottom: 0;" onclick="closeMedia()">

    <button onclick="closeMedia()"
      class="fixed top-4 right-4 sm:top-6 sm:right-6 z-[101] w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white text-2xl font-bold transition-all duration-200 backdrop-blur-md border border-white/20 hover:scale-110"
      aria-label="Close">
      <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <button id="prevBtn" onclick="event.stopPropagation(); previousMedia();"
      class="fixed left-2 sm:left-4 top-1/2 -translate-y-1/2 z-[101] w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-all duration-200 backdrop-blur-md border border-white/20 hover:scale-110 disabled:opacity-30 disabled:cursor-not-allowed"
      aria-label="Previous">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
      </svg>
    </button>

    <button id="nextBtn" onclick="event.stopPropagation(); nextMedia();"
      class="fixed right-2 sm:right-4 top-1/2 -translate-y-1/2 z-[101] w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-all duration-200 backdrop-blur-md border border-white/20 hover:scale-110 disabled:opacity-30 disabled:cursor-not-allowed"
      aria-label="Next">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
      </svg>
    </button>

    <div class="relative w-full h-full flex items-center justify-center py-24 sm:py-28 px-14 sm:px-20"
      onclick="event.stopPropagation()">
      <img id="modalImage"
        class="hidden max-w-full max-h-full object-contain rounded-lg shadow-2xl transition-opacity duration-300"
        alt="Portfolio Image">

      <video id="modalVideo" class="hidden max-w-full max-h-full object-contain rounded-lg shadow-2xl" controls>
        <source id="videoSource" src="" type="video/mp4">
      </video>
    </div>

    <div
      class="fixed top-4 left-1/2 -translate-x-1/2 z-[101] text-white text-sm px-4 py-2 bg-black/50 rounded-full backdrop-blur-md border border-white/20">
      <span id="currentIndex">1</span> / <span id="totalMedia">1</span>
    </div>

    <div
      class="fixed bottom-4 left-1/2 -translate-x-1/2 text-white/60 text-xs sm:text-sm px-4 py-2 bg-black/30 rounded-full backdrop-blur-sm">
      Klik disini untuk menutup atau ESC
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    let currentMediaIndex = 0;
    let mediaItems = [];

    document.addEventListener('DOMContentLoaded', function() {
      const articles = document.querySelectorAll('article[data-media]');
      mediaItems = Array.from(articles).map(article => ({
        src: article.dataset.media,
        type: article.dataset.type
      })).filter(item => item.src);
    });

    function openMedia(index, type) {
      if (!mediaItems[index]) return;

      currentMediaIndex = index;
      const modal = document.getElementById('mediaModal');
      const img = document.getElementById('modalImage');
      const video = document.getElementById('modalVideo');
      const videoSource = document.getElementById('videoSource');
      const currentItem = mediaItems[currentMediaIndex];

      if (currentItem.type === 'video') {
        img.classList.add('hidden');
        video.classList.remove('hidden');
        videoSource.src = currentItem.src;
        video.load();
      } else {
        video.classList.add('hidden');
        img.classList.remove('hidden');
        img.style.opacity = '0';
        setTimeout(() => {
          img.src = currentItem.src;
          img.style.opacity = '1';
        }, 150);
      }

      modal.classList.remove('hidden');
      modal.classList.add('flex');
      document.body.style.overflow = 'hidden';

      updateNavigation();
    }

    function closeMedia() {
      const modal = document.getElementById('mediaModal');
      const video = document.getElementById('modalVideo');

      modal.classList.add('hidden');
      modal.classList.remove('flex');
      document.body.style.overflow = '';

      video.pause();
      video.currentTime = 0;
    }

    function nextMedia() {
      if (currentMediaIndex < mediaItems.length - 1) {
        currentMediaIndex++;
        updateMedia();
        updateNavigation();
      }
    }

    function previousMedia() {
      if (currentMediaIndex > 0) {
        currentMediaIndex--;
        updateMedia();
        updateNavigation();
      }
    }

    function updateMedia() {
      const img = document.getElementById('modalImage');
      const video = document.getElementById('modalVideo');
      const videoSource = document.getElementById('videoSource');
      const currentItem = mediaItems[currentMediaIndex];

      if (currentItem.type === 'video') {
        img.classList.add('hidden');
        video.classList.remove('hidden');
        videoSource.src = currentItem.src;
        video.load();
      } else {
        video.pause();
        video.classList.add('hidden');
        img.classList.remove('hidden');
        img.style.opacity = '0';
        setTimeout(() => {
          img.src = currentItem.src;
          img.style.opacity = '1';
        }, 150);
      }
    }

    function updateNavigation() {
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');
      const currentIndexEl = document.getElementById('currentIndex');
      const totalMediaEl = document.getElementById('totalMedia');

      currentIndexEl.textContent = currentMediaIndex + 1;
      totalMediaEl.textContent = mediaItems.length;

      prevBtn.disabled = currentMediaIndex === 0;
      nextBtn.disabled = currentMediaIndex === mediaItems.length - 1;
    }

    document.addEventListener('keydown', function(e) {
      const modal = document.getElementById('mediaModal');
      if (modal.classList.contains('hidden')) return;

      switch (e.key) {
        case 'Escape':
          closeMedia();
          break;
        case 'ArrowLeft':
          previousMedia();
          break;
        case 'ArrowRight':
          nextMedia();
          break;
      }
    });
  </script>
@endpush
