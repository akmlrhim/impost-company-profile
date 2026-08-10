@extends('layouts.public')

@section('title', 'Portfolio | Impost Media')
@section('meta_description',
  'Lihat hasil kerja nyata Impost Media, koleksi portfolio digital marketing, konten
  kreatif, dan iklan performa untuk berbagai klien di Kalimantan Selatan.')

@section('content')
  <section class="relative w-full h-[400px] md:h-[560px] overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('img/pages/portfolio.webp') }}');">
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-impost-fifth/80 via-impost-fifth/40 to-transparent"></div>
    <div class="absolute inset-0 z-10 bg-impost-fifth/30"></div>

    <div
      class="relative z-20 h-full flex flex-col justify-end max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-6 sm:pb-8 md:pb-14">

      <div class="max-w-2xl flex flex-col gap-3 sm:gap-4">

        <nav class="flex mb-1" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="/"
                class="inline-flex items-center text-xs sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200">
                Home
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Portfolio</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-xl md:text-5xl font-bold text-white leading-tight">
          Portfolio
        </h1>
        <p class="text-white text-xs md:text-base leading-relaxed max-w-xl">
          Bukan sekadar janji manis, melainkan bukti nyata yang lahir dari strategi terukur dan eksekusi presisi.
        </p>
      </div>
    </div>
  </section>

  <div class="antialiased bg-impost-fifth">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">
      <div class="mb-8 sm:mb-10 md:mb-12 max-w-7xl mx-auto" id="portfolio-wrapper">

        @if ($portfolios->isNotEmpty() || !empty($activeCategory))
          <div class="mb-10">
            <div class="flex justify-center border-b border-white/[0.07] overflow-x-auto">
              <a href="{{ route('portfolio') }}"
                class="relative shrink-0 px-5 sm:px-7 py-3 text-sm font-normal transition-colors duration-200 whitespace-nowrap {{ empty($activeCategory) ? 'text-white' : 'text-white/40 hover:text-white/70' }}">
                Semua
                @if (empty($activeCategory))
                  <span class="absolute bottom-0 left-0 right-0 h-0.5 bg-impost-primary rounded-full"></span>
                @endif
              </a>
              @foreach ($category as $cat)
                <a href="{{ route('portfolio', ['category' => $cat->slug]) }}"
                  class="relative shrink-0 px-5 sm:px-7 py-3 text-sm font-normal transition-colors duration-200 whitespace-nowrap {{ ($activeCategory ?? '') === $cat->slug ? 'text-white' : 'text-white/40 hover:text-white/70' }}">
                  {{ $cat->name }}
                  @if (($activeCategory ?? '') === $cat->slug)
                    <span class="absolute bottom-0 left-0 right-0 h-0.5 bg-impost-primary rounded-full"></span>
                  @endif
                </a>
              @endforeach
            </div>
          </div>
        @endif

        <section class="mx-auto w-full max-w-7xl px-3 relative" id="portfolio-container" x-data="portfolioGallery()">
          @if ($portfolios->isEmpty())
            <div
              class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
              <x-empty-card item="Portfolio" />
            </div>
          @else
            <div id="portfolio-skeleton"
              class="columns-2 sm:columns-3 lg:columns-4 gap-3 md:gap-4 mb-10 md:mb-12 space-y-3 md:space-y-4 animate-pulse">
              @for ($i = 0; $i < 8; $i++)
                <div class="w-full bg-impost-dark-750 rounded-2xl aspect-[3/4] border border-impost-fourth mb-3 md:mb-4"></div>
              @endfor
            </div>

            <div id="portfolio-content"
              class="columns-2 sm:columns-3 lg:columns-4 gap-3 md:gap-4 mb-10 md:mb-12 space-y-3 md:space-y-4 opacity-0 transition-opacity duration-500">
              @foreach ($portfolios as $portfolio)
                <article
                  class="group relative rounded-2xl overflow-hidden border border-impost-fourth bg-impost-dark-900 shadow-md cursor-pointer break-inside-avoid mb-3 md:mb-4"
                  data-media="{{ asset('storage/' . $portfolio->media_path) }}"
                  data-type="{{ $portfolio->media_type ?? 'image' }}" @click="openMedia({{ $loop->index }})">

                  <div class="relative w-full overflow-hidden bg-impost-dark-750">
                    @if ($portfolio->media_path)
                      @if ($portfolio->media_type === 'video')
                        <div class="relative">
                          <video class="w-full h-auto object-cover" muted>
                            <source src="{{ asset('storage/' . $portfolio->media_path) }}" type="video/mp4">
                          </video>
                          <div class="absolute inset-0 flex items-center justify-center">
                            <div
                              class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center group-hover:scale-110 transition-transform">
                              <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                              </svg>
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
                      <span
                        class="absolute top-2 left-2 z-10 rounded-full bg-impost-primary/90 text-impost-fifth text-[10px] font-bold uppercase px-2 py-0.5 shadow">
                        {{ $portfolio->category->name }}
                      </span>
                    @endif
                  </div>
                </article>
              @endforeach
            </div>
            <x-custom-pagination :items="$portfolios" />

            <template x-teleport="body">
              <div id="portfolio-lightbox" x-show="isOpen" x-cloak @click.self="closeMedia()" @keydown.escape.window="closeMedia()"
                @keydown.arrow-right.window="nextMedia()" @keydown.arrow-left.window="previousMedia()"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-[99999] flex items-center justify-center bg-black/98 backdrop-blur-md"
                style="margin: 0 !important; padding: 0 !important;">

                <button @click="closeMedia()"
                  class="fixed top-4 right-4 sm:top-6 sm:right-6 z-[100000] p-2 sm:p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all hover:scale-110 active:scale-95">
                  <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>

                <div
                  class="absolute top-6 left-1/2 -translate-x-1/2 z-[100000] px-4 py-1.5 bg-white/10 rounded-full border border-white/10 text-white text-sm font-medium">
                  <span x-text="currentIdx + 1"></span> / <span x-text="items.length"></span>
                </div>

                <button @click.stop="previousMedia()" :disabled="currentIdx === 0"
                  class="absolute left-4 sm:left-6 z-[100000] p-3 text-white/50 hover:text-white disabled:opacity-0 transition-all hover:scale-110 active:scale-95">
                  <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                  </svg>
                </button>

                <div class="relative w-full h-full flex items-center justify-center p-4 sm:p-16">
                  <div @click.stop x-show="isOpen" x-transition:enter="transition ease-out duration-300 delay-100"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="relative max-w-[95vw] max-h-[90vh] flex items-center justify-center">

                    <img x-show="items[currentIdx]?.type !== 'video'" :src="items[currentIdx]?.src"
                      class="w-auto h-auto max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl ring-1 ring-white/10"
                      alt="Portfolio Preview">

                    <video x-ref="videoPlayer" x-show="items[currentIdx]?.type === 'video'"
                      :src="items[currentIdx]?.src"
                      class="w-auto h-auto max-w-full max-h-[85vh] rounded-lg shadow-2xl ring-1 ring-white/10"
                      controls></video>
                  </div>
                </div>

                <button @click.stop="nextMedia()" :disabled="currentIdx === items.length - 1"
                  class="absolute right-4 sm:right-6 z-[100000] p-3 text-white/50 hover:text-white disabled:opacity-0 transition-all hover:scale-110 active:scale-95">
                  <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                  </svg>
                </button>

              </div>
            </template>
          @endif
        </section>
      </div>

    </div>

    <section class="mt-16 sm:mt-20 py-16 sm:py-20 border-t border-white/[0.07]">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
          Punya Ide untuk <span class="text-impost-primary">Bisnis Anda?</span>
        </h2>
        <p class="text-xs md:text-base font-medium text-white max-w-xl mx-auto mb-8">
          Lihat bagaimana kami menyelesaikan masalah klien, atau langsung konsultasikan kebutuhan bisnis Anda.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
          <a href="{{ route('study-case') }}"
            class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5
              bg-impost-primary text-impost-fifth hover:bg-impost-secondary transition-colors duration-150 whitespace-nowrap">
            Lihat Studi Kasus
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
          </a>
          <a href="{{ route('contact') }}"
            class="inline-flex items-center justify-center text-sm font-bold rounded-full px-7 py-3.5
              text-white border-2 border-white/30 hover:border-white/70 transition-colors duration-150 whitespace-nowrap">
            Hubungi Kami
          </a>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('portfolioGallery', () => ({
        isOpen: false,
        currentIdx: 0,
        items: [],
        init() {
          this.items = Array.from(document.querySelectorAll('article[data-media]')).map(el => ({
            src: el.dataset.media,
            type: el.dataset.type
          }));

          const skeleton = document.getElementById('portfolio-skeleton');
          const content = document.getElementById('portfolio-content');
          if (!skeleton || !content) return;

          const imgs = content.querySelectorAll('img');
          let loaded = 0;

          const reveal = () => {
            skeleton.style.display = 'none';
            content.style.opacity = '1';
          };

          if (!imgs.length) return reveal();

          const onLoad = () => {
            if (++loaded >= imgs.length) reveal();
          };

          imgs.forEach(img => {
            if (img.complete) onLoad();
            else {
              img.addEventListener('load', onLoad, {
                once: true
              });
              img.addEventListener('error', onLoad, {
                once: true
              });
            }
          });

          setTimeout(reveal, 1500);
        },
        openMedia(index) {
          this.currentIdx = index;
          this.isOpen = true;
          document.body.style.overflow = 'hidden';
        },
        closeMedia() {
          this.isOpen = false;
          document.body.style.overflow = '';
          this.pauseVideo();
        },
        nextMedia() {
          if (this.currentIdx < this.items.length - 1) {
            this.currentIdx++;
            this.pauseVideo();
          }
        },
        previousMedia() {
          if (this.currentIdx > 0) {
            this.currentIdx--;
            this.pauseVideo();
          }
        },
        pauseVideo() {
          if (this.$refs.videoPlayer) {
            this.$refs.videoPlayer.pause();
          }
        }
      }));
    });

    (function() {
      'use strict';

      const wrapper = document.getElementById('portfolio-wrapper');
      if (!wrapper) return;

      async function loadPortfolio(url, push) {
        wrapper.style.transition = 'opacity .2s ease';
        wrapper.style.opacity = '0.4';
        wrapper.style.pointerEvents = 'none';

        try {
          const res = await fetch(url, {
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            }
          });
          if (!res.ok) throw new Error('Request failed');

          const html = await res.text();
          const newDoc = new DOMParser().parseFromString(html, 'text/html');
          const newWrapper = newDoc.getElementById('portfolio-wrapper');
          if (!newWrapper) throw new Error('Wrapper missing');

          document.getElementById('portfolio-lightbox')?.remove();
          wrapper.innerHTML = newWrapper.innerHTML;

          if (push) history.pushState({
            portfolioUrl: url
          }, '', url);

          const newTitle = newDoc.querySelector('title');
          if (newTitle) document.title = newTitle.textContent;
        } catch (e) {
          window.location.href = url;
          return;
        } finally {
          wrapper.style.opacity = '1';
          wrapper.style.pointerEvents = '';
        }
      }

      document.addEventListener('click', (e) => {
        const link = e.target.closest('#portfolio-wrapper a[href]');
        if (!link) return;

        const url = new URL(link.href, window.location.href);
        if (url.origin !== window.location.origin) return;

        e.preventDefault();
        loadPortfolio(link.href, true);
      });

      window.addEventListener('popstate', () => {
        loadPortfolio(window.location.href, false);
      });
    })();
  </script>
@endpush
