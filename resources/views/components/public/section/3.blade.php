@php
  $items = [
      [
          'num' => '01',
          'title' => 'Omzet Stagnan',
          'desc' => 'Memecah kebuntuan pertumbuhan pendapatan dengan strategi yang terukur dan berbasis data.',
          'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6',
      ],
      [
          'num' => '02',
          'title' => 'Iklan Tidak Efisien',
          'desc' => 'Menghentikan pemborosan budget iklan yang tidak menghasilkan konversi nyata.',
          'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
      ],
      [
          'num' => '03',
          'title' => 'Branding Terlihat Murah',
          'desc' => 'Meningkatkan persepsi nilai brand Anda secara signifikan di mata pelanggan.',
          'icon' =>
              'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
      ],
      [
          'num' => '04',
          'title' => 'Tidak Ada Penjualan',
          'desc' => 'Membangun sistem funnel otomatis yang mengubah prospek menjadi pembeli loyal.',
          'icon' =>
              'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z',
      ],
      [
          'num' => '05',
          'title' => 'Bisnis Sulit Scale-Up',
          'desc' => 'Menyiapkan infrastruktur digital yang siap menampung pertumbuhan besar.',
          'icon' =>
              'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
      ],
      [
          'num' => '06',
          'title' => 'Buta Data',
          'desc' => 'Mengambil keputusan bisnis berdasarkan data riil, bukan sekadar asumsi belaka.',
          'icon' =>
              'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
      ],
  ];
@endphp

<section class="py-20 sm:py-28 relative overflow-hidden">

  <div class="max-w-7xl mx-auto px-5 sm:px-6 relative z-10">

    {{-- Section Header --}}
    <div class="max-w-3xl mx-auto text-center mb-16 sm:mb-20 relative z-20">
      <h2 class="text-2xl sm:text-3xl md:text-5xl text-white leading-tight mb-5 sm:mb-6 font-header">
        Apa yang Sebenarnya <br class="hidden md:block"> Kami <span class="italic text-impost-primary">Selesaikan?</span>
      </h2>
      <p class="text-white/60 text-xs sm:text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
        Kami menolak menjadi sekadar vendor yang menjual "jasa digital marketing". Kami hadir memberikan kepastian
        data, pertumbuhan omzet, dan profit nyata.
      </p>
    </div>

    {{-- Mobile Slider --}}
    <div class="lg:hidden">
      <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-6 px-1 no-scrollbar">

        @foreach ($items as $index => $item)
          <div
            class="shrink-0 snap-center w-[78vw] sm:w-[55vw] group relative bg-gradient-to-br from-white/[0.07] to-white/[0.02] border border-white/[0.08] rounded-2xl p-5 sm:p-6 flex flex-col justify-between gap-4 hover:border-impost-primary/30 transition-all duration-500">

            {{-- Number badge --}}
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-3">
                <div
                  class="w-10 h-10 rounded-xl bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center group-hover:bg-impost-primary/20 transition-colors duration-300">
                  <svg class="w-5 h-5 text-impost-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                  </svg>
                </div>
              </div>
            </div>

            <div>
              <h3
                class="text-white text-sm sm:text-base font-bold mb-2 group-hover:text-impost-primary transition-colors duration-300">
                {{ $item['title'] }}</h3>
              <p class="text-white/50 text-xs sm:text-sm leading-relaxed">{{ $item['desc'] }}</p>
            </div>

          </div>
        @endforeach

      </div>
    </div>

    {{-- Desktop Bento Grid --}}
    <div class="hidden lg:grid grid-cols-12 gap-5 items-start relative">

      {{-- Left column: cards 1-3 --}}
      <div class="col-span-4 flex flex-col gap-5">
        @foreach (array_slice($items, 0, 3) as $index => $item)
          <div
            class="group relative bg-gradient-to-br from-white/[0.07] to-white/[0.02] backdrop-blur-md border border-white/[0.08] rounded-2xl p-6 hover:border-impost-primary/30 transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_20px_60px_-15px_rgba(212,172,60,0.15)]"
            style="animation: fadeSlideUp 0.6s ease-out {{ $index * 0.1 }}s both;">

            {{-- Gradient accent --}}
            <div
              class="absolute top-0 left-6 right-6 h-px bg-gradient-to-r from-transparent via-impost-primary/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            </div>

            <div class="flex items-start gap-4">
              <div
                class="w-11 h-11 rounded-xl bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center shrink-0 group-hover:bg-impost-primary/20 group-hover:border-impost-primary/40 transition-all duration-300">
                <svg class="w-5 h-5 text-impost-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex items-center gap-3 mb-2">
                  <h3
                    class="text-white text-base font-bold group-hover:text-impost-primary transition-colors duration-300">
                    {{ $item['title'] }}</h3>
                </div>
                <p class="text-white/50 text-sm leading-relaxed">{{ $item['desc'] }}</p>
              </div>
            </div>

          </div>
        @endforeach
      </div>

      {{-- Center: ROI Orb --}}
      <div class="col-span-4 relative flex justify-center items-center" style="min-height: 460px;">

        {{-- Ambient glow --}}
        <div
          class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[350px] h-[350px] bg-impost-primary/[0.12] blur-[100px] rounded-full">
        </div>

        {{-- Outer orbital ring --}}
        <div
          class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[340px] h-[340px] rounded-full border border-white/[0.04]"
          style="animation: spin-slow 30s linear infinite;"></div>

        {{-- Middle orbital ring --}}
        <div
          class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[270px] h-[270px] rounded-full border border-impost-primary/10"
          style="animation: spin-slow 20s linear infinite reverse;"></div>

        {{-- Orbital dots --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[340px] h-[340px]"
          style="animation: spin-slow 30s linear infinite;">
          <div
            class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-2.5 h-2.5 rounded-full bg-impost-primary/60 shadow-[0_0_12px_rgba(212,172,60,0.4)]">
          </div>
          <div
            class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 w-2 h-2 rounded-full bg-impost-primary/40">
          </div>
        </div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[270px] h-[270px]"
          style="animation: spin-slow 20s linear infinite reverse;">
          <div
            class="absolute top-1/2 right-0 translate-x-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-impost-primary/50 shadow-[0_0_8px_rgba(212,172,60,0.3)]">
          </div>
          <div
            class="absolute top-1/2 left-0 -translate-x-1/2 -translate-y-1/2 w-1.5 h-1.5 rounded-full bg-impost-primary/30">
          </div>
        </div>

        {{-- Main orb --}}
        <div class="relative animate-float-slow">
          <div
            class="w-52 h-52 rounded-full bg-gradient-to-br from-impost-primary/20 via-impost-primary/10 to-transparent border border-impost-primary/20 backdrop-blur-sm flex items-center justify-center shadow-[0_0_80px_rgba(212,172,60,0.15)]">
            <div class="absolute inset-3 rounded-full border border-impost-primary/10"></div>
            <div
              class="absolute inset-8 rounded-full border border-white/[0.04] bg-black/50 flex items-center justify-center">
              <div class="text-center">
                <span class="block text-4xl font-bold text-impost-primary mb-1 tracking-tight">ROI</span>
                <span class="text-[11px] text-white/60 uppercase tracking-[0.25em] font-semibold">Focused</span>
              </div>
            </div>
          </div>
        </div>

        {{-- Connection lines svg --}}
        <svg class="absolute inset-0 w-full h-full pointer-events-none opacity-20" viewBox="0 0 400 460">
          <line x1="50" y1="80" x2="145" y2="180" stroke="url(#line-grad)" stroke-width="1"
            stroke-dasharray="4 4" />
          <line x1="50" y1="230" x2="140" y2="230" stroke="url(#line-grad)" stroke-width="1"
            stroke-dasharray="4 4" />
          <line x1="50" y1="380" x2="145" y2="280" stroke="url(#line-grad)" stroke-width="1"
            stroke-dasharray="4 4" />
          <line x1="350" y1="80" x2="255" y2="180" stroke="url(#line-grad)" stroke-width="1"
            stroke-dasharray="4 4" />
          <line x1="350" y1="230" x2="260" y2="230" stroke="url(#line-grad)" stroke-width="1"
            stroke-dasharray="4 4" />
          <line x1="350" y1="380" x2="255" y2="280" stroke="url(#line-grad)"
            stroke-width="1" stroke-dasharray="4 4" />
          <defs>
            <linearGradient id="line-grad" x1="0%" y1="0%" x2="100%" y2="0%">
              <stop offset="0%" stop-color="#d4ac3c" stop-opacity="0.6" />
              <stop offset="100%" stop-color="#d4ac3c" stop-opacity="0" />
            </linearGradient>
          </defs>
        </svg>

      </div>

      {{-- Right column: cards 4-6 --}}
      <div class="col-span-4 flex flex-col gap-5">
        @foreach (array_slice($items, 3, 3) as $index => $item)
          <div
            class="group relative bg-gradient-to-br from-white/[0.07] to-white/[0.02] backdrop-blur-md border border-white/[0.08] rounded-2xl p-6 hover:border-impost-primary/30 transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_20px_60px_-15px_rgba(212,172,60,0.15)]"
            style="animation: fadeSlideUp 0.6s ease-out {{ ($index + 3) * 0.1 }}s both;">

            {{-- Gradient accent --}}
            <div
              class="absolute top-0 left-6 right-6 h-px bg-gradient-to-r from-transparent via-impost-primary/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            </div>

            <div class="flex items-start gap-4">
              <div
                class="w-11 h-11 rounded-xl bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center shrink-0 group-hover:bg-impost-primary/20 group-hover:border-impost-primary/40 transition-all duration-300">
                <svg class="w-5 h-5 text-impost-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex items-center gap-3 mb-2">
                  <h3
                    class="text-white text-base font-bold group-hover:text-impost-primary transition-colors duration-300">
                    {{ $item['title'] }}</h3>
                </div>
                <p class="text-white/50 text-sm leading-relaxed">{{ $item['desc'] }}</p>
              </div>
            </div>

          </div>
        @endforeach
      </div>

    </div>

  </div>

</section>

<style>
  @keyframes spin-slow {
    from {
      transform: translate(-50%, -50%) rotate(0deg);
    }

    to {
      transform: translate(-50%, -50%) rotate(360deg);
    }
  }

  @keyframes fadeSlideUp {
    from {
      opacity: 0;
      transform: translateY(24px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
