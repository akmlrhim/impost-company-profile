@extends('layouts.public')

@section('title', 'Portfolio | Impost Media')
@section('meta_description', 'Lihat hasil kerja nyata Impost Media — koleksi portfolio digital marketing, konten kreatif, dan iklan performa untuk berbagai klien di Kalimantan Selatan.')

@section('content')
  <main class="pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 antialiased bg-impost-fifth">
    <div class="mx-auto max-w-7xl">

      <div class="mb-8 md:mb-12 text-center px-6">
        <h1 class="text-2xl md:text-4xl capitalize font-bold mb-4 text-impost-primary">
          {{ $title }}
        </h1>
      </div>

      @if ($portfolios->isNotEmpty() || !empty($activeCategory))
        <div class="mb-10 px-4">
          <div class="md:hidden w-full max-w-sm mx-auto relative">
            <select onchange="window.location.href=this.value"
              class="w-full appearance-none bg-[#121212] text-white border border-white/10 rounded-xl py-3 px-4 pr-10 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all cursor-pointer text-xs sm:text-sm font-medium shadow-lg">
              <option value="{{ route('portfolio') }}" {{ empty($activeCategory) ? 'selected' : '' }}>Semua Kategori</option>
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
              class="px-4 py-2 rounded-full text-sm font-bold border transition {{ empty($activeCategory) ? 'bg-impost-primary text-impost-fifth border-impost-primary' : 'border-impost-fourth text-white hover:bg-impost-fourth/40' }}">
              Semua
            </a>
            @foreach ($category as $cat)
              <a href="{{ route('portfolio', ['category' => $cat->slug]) }}"
                class="px-4 py-2 rounded-full text-sm font-bold border transition {{ ($activeCategory ?? '') === $cat->slug ? 'bg-impost-primary text-impost-fifth border-impost-primary' : 'border-impost-fourth text-white hover:bg-impost-fourth/40' }}">
                {{ $cat->name }}
              </a>
            @endforeach
          </div>
        </div>
      @endif

      <section class="mx-auto w-full max-w-7xl px-3 relative" id="portfolio-container">
        @if ($portfolios->isEmpty())
          <div class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
            <x-empty-card item="Portfolio" />
          </div>
        @else
          {{-- Skeleton --}}
          <div id="portfolio-skeleton" class="columns-2 sm:columns-3 lg:columns-4 gap-3 md:gap-4 mb-10 md:mb-12 space-y-3 md:space-y-4 animate-pulse">
            @for ($i = 0; $i < 8; $i++)
              <div class="w-full bg-[#151515] rounded-2xl aspect-[3/4] border border-impost-fourth mb-3 md:mb-4"></div>
            @endfor
          </div>

          {{-- Content --}}
          <div id="portfolio-content" class="columns-2 sm:columns-3 lg:columns-4 gap-3 md:gap-4 mb-10 md:mb-12 space-y-3 md:space-y-4 opacity-0 transition-opacity duration-500">
            @foreach ($portfolios as $portfolio)
              <article
                class="group relative rounded-2xl overflow-hidden border border-impost-fourth bg-[#0f0f0f] shadow-md cursor-pointer break-inside-avoid mb-3 md:mb-4"
                data-media="{{ asset('storage/' . $portfolio->media_path) }}"
                data-type="{{ $portfolio->media_type ?? 'image' }}" 
                onclick="openMedia({{ $loop->index }})">

                <div class="relative w-full overflow-hidden bg-[#151515]">
                  @if ($portfolio->media_path)
                    @if ($portfolio->media_type === 'video')
                      <div class="relative">
                        <video class="w-full h-auto object-cover" muted>
                          <source src="{{ asset('storage/' . $portfolio->media_path) }}" type="video/mp4">
                        </video>
                        <div class="absolute inset-0 flex items-center justify-center">
                          <div class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z" /></svg>
                          </div>
                        </div>
                      </div>
                    @else
                      <img src="{{ asset('storage/' . $portfolio->media_path) }}" alt="{{ $portfolio->title }}"
                        class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                    @endif
                  @endif

                  <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                  @if ($portfolio->category)
                    <span class="absolute top-2 left-2 z-10 rounded-full bg-impost-primary/90 text-impost-fifth text-[10px] font-bold uppercase px-2 py-0.5 shadow">
                      {{ $portfolio->category->name }}
                    </span>
                  @endif
                </div>
              </article>
            @endforeach
          </div>
          <x-custom-pagination :items="$portfolios" />

          <script>
            (function() {
              const skeleton = document.getElementById('portfolio-skeleton');
              const content = document.getElementById('portfolio-content');
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
                  img.addEventListener('load', onLoad, { once: true });
                  img.addEventListener('error', onLoad, { once: true });
                }
              });

              setTimeout(reveal, 1500);
            })();
          </script>
        @endif
      </section>
    </div>

    <div class="mt-20 bg-impost-primary">
      <div class="max-w-7xl mx-auto p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="text-center md:text-left">
          <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">Punya ide brilian?</h3>
          <p class="text-gray-800 font-medium">Lihat bagaimana kami menyelesaikan masalah klien lain atau hubungi kami.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
          <a href="{{ route('study-case') }}" class="px-6 py-3 border-2 border-gray-900 text-gray-900 rounded-xl font-bold text-center hover:bg-gray-900 hover:text-white transition-all">Lihat Studi Kasus</a>
          <a href="{{ route('contact') }}" class="px-8 py-3 bg-gray-900 text-white rounded-xl font-bold text-center shadow-lg hover:bg-gray-800 transition-all">Hubungi Kami</a>
        </div>
      </div>
    </div>
  </main>

  <div id="mediaModal" class="fixed inset-0 z-[999] hidden flex-col items-center justify-center bg-black/95 backdrop-blur-md" onclick="closeMedia()">
    
    <button onclick="closeMedia()" class="absolute top-6 right-6 z-[1001] p-3 text-white/70 hover:text-white transition-colors" aria-label="Close">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>

    <div class="absolute top-6 left-1/2 -translate-x-1/2 z-[1001] px-4 py-1.5 bg-white/10 rounded-full border border-white/10 text-white text-sm font-medium">
      <span id="currentIndex">1</span> / <span id="totalMedia">1</span>
    </div>

    <div class="relative w-full h-full flex items-center justify-center p-4 sm:p-12" onclick="event.stopPropagation()">
      <button id="prevBtn" onclick="previousMedia()" class="absolute left-4 z-[1001] p-2 sm:p-4 text-white/50 hover:text-white disabled:opacity-0 transition-all">
        <svg class="w-8 h-8 sm:w-12 sm:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" /></svg>
      </button>

      <div class="max-w-5xl max-h-[85vh] flex items-center justify-center overflow-hidden rounded-lg">
        <img id="modalImage" class="hidden max-w-full max-h-full object-contain shadow-2xl" alt="Portfolio Preview">
        <video id="modalVideo" class="hidden max-w-full max-h-[80vh] shadow-2xl" controls><source id="videoSource" src="" type="video/mp4"></video>
      </div>

      <button id="nextBtn" onclick="nextMedia()" class="absolute right-4 z-[1001] p-2 sm:p-4 text-white/50 hover:text-white disabled:opacity-0 transition-all">
        <svg class="w-8 h-8 sm:w-12 sm:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" /></svg>
      </button>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    let currentIdx = 0;
    let items = [];

    document.addEventListener('DOMContentLoaded', () => {
      items = Array.from(document.querySelectorAll('article[data-media]')).map(el => ({
        src: el.dataset.media,
        type: el.dataset.type
      }));
    });

    function openMedia(index) {
      currentIdx = index;
      document.getElementById('mediaModal').classList.replace('hidden', 'flex');
      document.body.style.overflow = 'hidden';
      updateDisplay();
    }

    function closeMedia() {
      document.getElementById('mediaModal').classList.replace('flex', 'hidden');
      document.body.style.overflow = '';
      document.getElementById('modalVideo').pause();
    }

    function updateDisplay() {
      const item = items[currentIdx];
      const img = document.getElementById('modalImage');
      const vid = document.getElementById('modalVideo');
      const vSrc = document.getElementById('videoSource');

      img.classList.add('hidden');
      vid.classList.add('hidden');
      vid.pause();

      if (item.type === 'video') {
        vSrc.src = item.src;
        vid.load();
        vid.classList.remove('hidden');
      } else {
        img.src = item.src;
        img.classList.remove('hidden');
      }

      document.getElementById('currentIndex').textContent = currentIdx + 1;
      document.getElementById('totalMedia').textContent = items.length;
      document.getElementById('prevBtn').disabled = currentIdx === 0;
      document.getElementById('nextBtn').disabled = currentIdx === items.length - 1;
    }

    const nextMedia = () => { if(currentIdx < items.length - 1) { currentIdx++; updateDisplay(); } };
    const previousMedia = () => { if(currentIdx > 0) { currentIdx--; updateDisplay(); } };

    document.addEventListener('keydown', (e) => {
      if (document.getElementById('mediaModal').classList.contains('hidden')) return;
      if (e.key === 'Escape') closeMedia();
      if (e.key === 'ArrowRight') nextMedia();
      if (e.key === 'ArrowLeft') previousMedia();
    });
  </script>
@endpush