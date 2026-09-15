@props(['portfolios', 'portfolioCategories' => []])

@php
  $flipbookUrl = 'https://heyzine.com/flip-book/caea1a35c5.html';
  $thumbnail = asset('img/pages/portfolio.webp');
@endphp

<section
  class="py-16 sm:py-20 lg:py-24 im-section-alt relative [content-visibility:auto] [contain-intrinsic-size:auto_700px]"
  id="portfolios" x-data="{
      openFlipbook: false,
      flipbookUrl: @js($flipbookUrl)
  }" x-effect="document.body.style.overflow = openFlipbook ? 'hidden' : ''">

  {{-- Cheap gradient accents (radial-gradient, no blur filter) --}}
  <div class="absolute inset-0 pointer-events-none" aria-hidden="true"
    style="background:
      radial-gradient(36rem 36rem at 100% 0%, rgba(212, 172, 60, 0.08), transparent 62%),
      radial-gradient(36rem 36rem at 0% 100%, rgba(208, 151, 56, 0.06), transparent 62%);">
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="text-center max-w-3xl mx-auto">
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-impost-primary mb-4">
        Portfolio
      </h2>
      <p class="text-xs sm:text-sm font-medium leading-relaxed text-white">
        Koleksi proyek terbaik yang telah kami selesaikan dan bagaimana kami membantu klien berkembang.
      </p>
    </div>

    {{-- Featured flip-book (static poster; heavy iframe loads only when lightbox opens) --}}
    <div class="mt-10 sm:mt-12 max-w-5xl mx-auto">
      <button type="button" @click="openFlipbook = true" aria-label="Buka portfolio company profile"
        class="group relative block w-full aspect-video overflow-hidden rounded-2xl border border-white/10 bg-impost-dark-900 shadow-[0_12px_30px_rgba(0,0,0,0.35)] focus:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary cursor-pointer text-left">
        <img src="{{ $thumbnail }}" alt="Portfolio Company Profile" loading="lazy" decoding="async"
          class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.03]">

        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>

        <span class="absolute top-3 sm:top-4 right-3 sm:right-4 opacity-90">
          <img src="{{ asset('img/logo_original.webp') }}" alt="Impost Media" class="h-6 sm:h-8 w-auto object-contain">
        </span>

        <span class="absolute left-4 sm:left-6 bottom-4 sm:bottom-5 pr-4">
          <span class="block text-white text-sm sm:text-lg font-bold leading-tight">Portfolio Company Profile</span>
          <span class="block text-white/60 text-[10px] sm:text-xs mt-0.5">Konsep, desain & eksekusi oleh Impost
            Media</span>
        </span>

        <span class="absolute inset-0 flex items-center justify-center">
          <span
            class="relative flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-white text-impost-fifth shadow-[0_8px_30px_rgba(0,0,0,0.5)] transition-transform duration-300 group-hover:scale-110">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 ml-1" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M8 5v14l11-7z" />
            </svg>
          </span>
        </span>
      </button>
    </div>

  </div>

  {{-- Flip-book lightbox (teleported to body so it sits above the navbar; iframe mounts only when opened) --}}
  <template x-teleport="body">
    <div x-show="openFlipbook" x-cloak @keydown.escape.window="openFlipbook = false" @click.self="openFlipbook = false"
      x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-[999999] flex items-center justify-center bg-black/95 backdrop-blur-md p-4 sm:p-8">

      <div class="relative w-full max-w-6xl h-[85vh]">
        <button type="button" @click="openFlipbook = false"
          class="absolute -top-12 right-0 sm:-top-13 sm:right-0 z-10 p-2 sm:p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all hover:scale-110 active:scale-95 focus:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary"
          aria-label="Tutup">
          <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <template x-if="openFlipbook">
          <iframe :src="flipbookUrl" title="Portfolio Company Profile — Layar Penuh" scrolling="no" allowfullscreen
            class="w-full h-full rounded-xl border border-white/10 bg-white"></iframe>
        </template>
      </div>

    </div>
  </template>

</section>
