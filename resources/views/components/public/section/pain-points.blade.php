@php
  $painPoints = [
      [
          'icon' =>
              'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
          'text' => 'Sudah habis uang untuk iklan',
      ],
      [
          'icon' =>
              'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
          'text' => 'Konten jalan tapi branding masih terlihat "brand murah"',
      ],
      [
          'icon' => 'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636',
          'text' => 'Trauma pakai agency tanpa ada hasil yang jelas',
      ],
      [
          'icon' =>
              'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
          'text' => 'Tapi tidak pernah tahu apa yang salah',
      ],
  ];
@endphp

<section class="py-16 sm:py-20 md:py-24 relative overflow-hidden">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    {{-- Header --}}
    <div class="text-center mb-12 md:mb-16">
      <h2 class="text-2xl sm:text-3xl md:text-5xl font-header leading-tight text-white mb-3 md:mb-4">
        Kami Bukan Agency yang <br class="hidden md:block">Jual Konten atau
        <span class="italic text-impost-primary">Iklan</span>
      </h2>
      <p class="text-sm sm:text-base md:text-lg text-white/50 max-w-2xl mx-auto">
        Kami Pionir & Market Leader Digital Marketing di Kalimantan
      </p>
    </div>

    {{-- Pain Points Grid --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5 mb-6 md:mb-8">
      @foreach ($painPoints as $index => $point)
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 md:p-6">
          <div class="w-10 h-10 rounded-xl bg-red-500/10 flex items-center justify-center mb-4">
            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="{{ $point['icon'] }}" />
            </svg>
          </div>
          <p class="text-xs sm:text-sm md:text-base text-white/70 leading-relaxed">
            {{ $point['text'] }}
          </p>
        </div>
      @endforeach
    </div>

    {{-- Bottom Row: Result + Solution --}}
    <div class="grid md:grid-cols-2 gap-4 md:gap-5">

      {{-- Result --}}
      <div class="bg-white/5 border border-white/10 rounded-2xl p-6 md:p-7 flex flex-col justify-center">
        <p class="text-xs sm:text-sm md:text-base leading-relaxed text-white/70 mb-3">
          <span class="text-impost-primary font-semibold">Hasilnya?</span> Penjualan kebanyakan hanya mengandalkan
          promo dengan customer yang tidak loyal.
        </p>
        <div class="h-px bg-white/5 my-3"></div>
        <p class="text-xs sm:text-sm md:text-base leading-relaxed text-white/70">
          Ini disebabkan oleh branding yang belum terbangun ke persepsi publik.
        </p>
      </div>

      {{-- Solution --}}
      <div class="bg-impost-secondary rounded-2xl p-6 md:p-7 flex flex-col justify-center">
        <h3 class="text-base sm:text-lg md:text-xl font-header text-white mb-3 leading-tight">
          Kami benahi funnel marketingnya
        </h3>
        <p class="text-xs sm:text-sm md:text-base text-white/80 leading-relaxed">
          Membangun sistem pemasaran yang berkelanjutan, bukan sekadar posting konten.
        </p>
      </div>

    </div>

  </div>

</section>
