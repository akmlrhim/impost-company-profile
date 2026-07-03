@php
  $rows = [
      ['text' => 'Melihat marketing sebagai investasi, bukan beban biaya', 'ideal' => true],
      ['text' => 'Menginginkan data & hasil yang bisa dipertanggungjawabkan', 'ideal' => true],
      ['text' => 'Bisnis sudah berjalan dan siap naik ke level berikutnya', 'ideal' => true],
      ['text' => 'Realistis, paham bahwa pertumbuhan butuh proses terstruktur', 'ideal' => true],
      ['text' => 'Terbuka pada data, kritik, dan strategi berbasis riset', 'ideal' => true],
      ['text' => 'Mengutamakan kualitas & konsistensi branding jangka panjang', 'ideal' => true],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24 im-section-alt">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="text-center mb-10 sm:mb-14">
      <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold leading-tight text-white mb-4">
        Kami Tidak Mencari Klien,<br>Kami Mencari
        <span class="text-impost-primary"> Partner</span>
      </h2>
      <p class="text-xs md:text-base font-normal leading-relaxed text-white max-w-xl mx-auto">
        Sinergi terbaik lahir dari visi yang sama. Mari cari tahu apakah kita cocok bekerja sama.
      </p>
    </div>

    {{-- Comparison table --}}
    <div class="rounded-2xl border border-white/[0.08] overflow-hidden">

      {{-- Column headers --}}
      <div
        class="grid grid-cols-[1fr_72px_72px] sm:grid-cols-[1fr_120px_120px] border-b border-white/[0.08] bg-white/[0.03]">

        {{-- Left header --}}
        <div class="px-4 sm:px-6 py-4 sm:py-5 flex flex-col justify-center">
          <p class="text-[10px] font-bold text-impost-primary uppercase tracking-[0.12em] mb-1 hidden sm:block">Kriteria
            Kolaborasi</p>
          <p class="text-xs sm:text-sm font-semibold text-white leading-snug">Apakah kita cocok<br class="sm:hidden">
            bekerja sama?</p>
        </div>

        {{-- Partner Ideal --}}
        <div
          class="flex flex-col items-center justify-center gap-1.5 py-4 sm:py-5 border-l border-white/[0.08] px-1 sm:px-3 bg-emerald-500/[0.04]">
          <div
            class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-emerald-500/15 border border-emerald-500/25 flex items-center justify-center">
            <svg class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-emerald-400" fill="none" stroke="currentColor"
              viewBox="0 0 24 24" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <span
            class="text-[9px] sm:text-[11px] font-bold text-emerald-400 text-center leading-tight">Partner<br>Ideal</span>
        </div>

        {{-- Belum Cocok --}}
        <div
          class="flex flex-col items-center justify-center gap-1.5 py-4 sm:py-5 border-l border-white/[0.08] px-1 sm:px-3 bg-red-500/[0.03]">
          <div
            class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-red-500/15 border border-red-500/25 flex items-center justify-center">
            <svg class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
          <span
            class="text-[9px] sm:text-[11px] font-bold text-red-400/70 text-center leading-tight">Belum<br>Cocok</span>
        </div>
      </div>

      {{-- Rows --}}
      @foreach ($rows as $row)
        <div
          class="grid grid-cols-[1fr_72px_72px] sm:grid-cols-[1fr_120px_120px] border-b border-white/[0.05] last:border-0 hover:bg-white/[0.02] transition-colors duration-150">

          {{-- Trait text --}}
          <div class="px-4 sm:px-6 py-3.5 sm:py-4 flex items-center">
            <span class="text-xs sm:text-sm font-medium text-white leading-snug">{{ $row['text'] }}</span>
          </div>

          {{-- Partner Ideal cell --}}
          <div
            class="flex items-center justify-center py-3.5 sm:py-4 border-l border-white/[0.05] bg-emerald-500/[0.02]">
            <span class="inline-flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-emerald-500/15">
              <svg class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
            </span>
          </div>

          {{-- Belum Cocok cell --}}
          <div class="flex items-center justify-center py-3.5 sm:py-4 border-l border-white/[0.05] bg-red-500/[0.02]">
            <span class="inline-flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-red-500/10">
              <svg class="w-3 h-3 sm:w-4 sm:h-4 text-red-400/80" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </span>
          </div>

        </div>
      @endforeach


    </div>

  </div>
</section>
