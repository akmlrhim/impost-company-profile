@php
  $painPoints = [
    ['icon'=>'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z','text'=>'Kehabisan uang karena terlalu banyak untuk iklan.'],
    ['icon'=>'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z','text'=>'Konten jalan tapi branding terlihat "brand murah".'],
    ['icon'=>'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636','text'=>'Trauma pakai agency tanpa ada hasil yang jelas.'],
    ['icon'=>'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z','text'=>'Tidak pernah tahu metrik mana yang sebenarnya penting.'],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24 im-section-alt">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Full-width headline - no card, no center-align --}}
    <div class="mb-12 sm:mb-16">
      <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-4">Masalah yang Sering Terjadi</p>
      <h2 class="text-3xl sm:text-5xl lg:text-6xl font-bold leading-tight text-white mb-5 max-w-3xl">
        Kami Bukan Agency<br>
        yang Jual Konten<br>
        atau <span class="text-impost-primary">Iklan</span>
      </h2>
      <p class="text-xs md:text-base font-medium leading-relaxed text-white max-w-lg">
        Kami Pionir &amp; Market Leader Digital Marketing di Kalimantan
      </p>
    </div>

    {{-- 2×2 pain point cards with large centered icons --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-5 mb-4">
      @foreach ($painPoints as $point)
        <div class="group relative bg-white/[0.04] border border-white/[0.08] rounded-2xl hover:border-white/[0.15] transition-colors duration-200 p-8 md:p-10 overflow-hidden
          hover:-translate-y-1.5 transition-all duration-300">

          {{-- Red glow blob --}}
          <div class="absolute top-8 left-8 w-20 h-20 rounded-full bg-red-500/10
            blur-2xl group-hover:bg-red-500/20 transition-colors duration-500 pointer-events-none"></div>

          {{-- Large icon --}}
          <div class="relative z-10 mb-6">
            <svg class="w-12 h-12 text-red-400/70 group-hover:text-red-400 transition-colors duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.3">
              <path stroke-linecap="round" stroke-linejoin="round" d="{{ $point['icon'] }}"/>
            </svg>
          </div>

          {{-- Bold statement --}}
          <p class="text-lg font-bold leading-relaxed text-white leading-relaxed group-hover:text-white transition-colors duration-300">
            {{ $point['text'] }}
          </p>

          {{-- Bottom accent --}}
          <div class="absolute bottom-0 left-0 right-0 h-px
            bg-gradient-to-r from-red-500/0 via-red-500/40 to-red-500/0
            opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>
      @endforeach
    </div>

    {{-- Verdict + gold CTA strip --}}
    <div class="bg-impost-primary rounded-2xl text-impost-fifth p-7 md:p-9 flex flex-col sm:flex-row sm:items-center gap-6 sm:gap-10">
      <div class="flex-1 min-w-0">
        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-snug text-black mb-2">Kami benahi funnel marketingnya.</h3>
        <p class="text-xs md:text-base font-medium leading-relaxed text-black max-w-xl">
          Membangun sistem pemasaran yang berkelanjutan, bukan sekadar posting konten atau pasang iklan.
        </p>
      </div>
      <a href="{{ route('vsl-form') }}" class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5 bg-impost-fifth text-white border border-white/20 hover:border-white/45 transition-colors duration-150 cursor-pointer whitespace-nowrap flex-shrink-0 self-start sm:self-center">
        Lihat Caranya
      </a>
    </div>

  </div>
</section>
