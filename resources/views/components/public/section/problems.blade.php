@php
  $problems = [
      [
          'icon' =>
              'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
          'title' => 'Konten Jalan, Sepi',
          'desc' => 'Traffic tinggi tapi penjualan tetap nol. Funnel bocor di mana-mana.',
      ],
      [
          'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
          'title' => 'Iklan Boncos',
          'desc' => 'Budget habis tanpa hasil. Setiap rupiah yang keluar tidak balik.',
      ],
      [
          'icon' =>
              'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
          'title' => 'Buta Data',
          'desc' => 'Tidak tahu metrik mana yang penting. Keputusan berbasis feeling.',
      ],
      [
          'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
          'title' => 'Terjebak Operasional',
          'desc' => 'Sibuk di hal teknis hingga tak punya waktu untuk berpikir strategis.',
      ],
      [
          'icon' =>
              'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
          'title' => 'Tim Tidak Efektif',
          'desc' => 'Tim internal belum siap menghadapi lanskap digital yang terus berubah.',
      ],
      [
          'icon' => 'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636',
          'title' => 'Trauma Agency',
          'desc' => 'Pernah kecewa dengan agency sebelumnya. Ragu untuk mencoba lagi.',
      ],
  ];
@endphp

<section class="py-20 sm:py-28 relative overflow-hidden">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <div class="max-w-3xl mx-auto text-center mb-14 sm:mb-20">
      <h2 class="text-2xl sm:text-3xl md:text-5xl font-header tracking-tight leading-tight mb-5 sm:mb-6 text-white">
        Mengapa Omzet
        <br>
        <span class="italic text-red-500">Sulit Bertumbuh?</span>
      </h2>
      <p class="text-white/50 text-xs sm:text-base md:text-lg leading-relaxed max-w-xl mx-auto">
        Banyak bisnis terjebak di masalah yang sama berulang-ulang tanpa pernah menyentuh akar persoalannya.
      </p>
    </div>

    {{-- Mobile --}}
    <div class="md:hidden space-y-3">
      @foreach ($problems as $index => $item)
        <div class="bg-white/5 border border-white/10 rounded-2xl p-4 flex items-start gap-4">
          <div class="w-10 h-10 rounded-xl bg-red-500/10 flex items-center justify-center shrink-0 mt-0.5">
            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
            </svg>
          </div>
          <div class="flex-1 min-w-0">
            <h3 class="font-bold text-sm text-white mb-1">{{ $item['title'] }}</h3>
            <p class="text-xs text-white/40 leading-relaxed">{{ $item['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Desktop --}}
    <div class="hidden md:block">
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">

        @foreach ($problems as $index => $item)
          <div class="group bg-white/5 border border-white/10 rounded-2xl p-6 lg:p-7">

            <div class="flex items-center gap-4 mb-4">
              <div
                class="w-12 h-12 rounded-xl bg-red-500/10 flex items-center justify-center shrink-0 group-hover:bg-red-500/15 transition-colors duration-300">
                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                </svg>
              </div>
              <div>
                <h3
                  class="text-white text-base self-center lg:text-lg font-bold group-hover:text-red-300 transition-colors duration-300">
                  {{ $item['title'] }}
                </h3>
              </div>
            </div>

            <p class="text-white/40 text-sm leading-relaxed">
              {{ $item['desc'] }}
            </p>

          </div>
        @endforeach

      </div>

      {{-- Bottom callout --}}
      <div class="mt-12 lg:mt-16">
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 lg:p-8 text-center">
          <p class="text-white/60 text-sm lg:text-base leading-relaxed max-w-2xl mx-auto">
            Jika bisnis Anda mengalami <span class="text-red-400 font-semibold">salah satu</span> dari masalah di atas,
            berarti Anda membutuhkan <span class="text-white font-semibold">sistem marketing yang benar</span> — bukan
            sekadar konten atau iklan.
          </p>
        </div>
      </div>
    </div>

  </div>

</section>
