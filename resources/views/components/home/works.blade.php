@php
  $steps = [
      [
          'num' => '1',
          'side' => 'left',
          'last' => false,
          'icon' =>
              'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z',
          'title' => 'Onboarding & Meeting Awal',
          'desc' =>
              'Diskusi mendalam mengenai detail proyek, kondisi ideal yang ingin dicapai, serta masalah yang dihadapi.',
      ],
      [
          'num' => '2',
          'side' => 'right',
          'last' => false,
          'icon' =>
              'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
          'title' => 'Analisis & Penawaran',
          'desc' => 'Tim melakukan analisis mendalam untuk menyusun Project Brief dan skema harga yang tepat.',
      ],
      [
          'num' => '3',
          'side' => 'left',
          'last' => false,
          'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
          'title' => 'Deal & Invoicing',
          'desc' => 'Negosiasi hingga sepakat (Harga & KPI), dilanjutkan tanda tangan kontrak dan pembayaran awal.',
      ],
      [
          'num' => '4',
          'side' => 'right',
          'last' => false,
          'icon' =>
              'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
          'title' => 'Finalisasi Project Brief',
          'desc' =>
              'Tim menyempurnakan strategi internal, lalu dikembalikan ke Anda untuk ditinjau (Masa review maks. 2 minggu).',
      ],
      [
          'num' => '5',
          'side' => 'left',
          'last' => false,
          'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
          'title' => 'Produksi & Eksekusi',
          'desc' => 'Mulai produksi konten dan menjalankan proyek, termasuk fase trial and error untuk hasil optimal.',
      ],
      [
          'num' => '✓',
          'side' => 'right',
          'last' => true,
          'icon' =>
              'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
          'title' => 'Reporting & Evaluasi',
          'desc' =>
              'Laporan data & KPI dikirimkan di akhir bulan. Anda memiliki kontrol penuh untuk memutuskan kelanjutan kontrak.',
      ],
  ];
@endphp

<section class="py-14 sm:py-20 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14 md:mb-20">
      <h2
        class="text-2xl sm:text-3xl md:text-5xl font-medium font-header leading-tight text-impost-primary mb-3 md:mb-6">
        Alur <span class="text-impost-primary">Layanan</span>
      </h2>
      <p class="text-xs sm:text-sm md:text-lg text-white font-light max-w-2xl mx-auto leading-relaxed">
        Dari konsultasi hingga evaluasi hasil. Setiap langkah dirancang transparan untuk memastikan kesuksesan proyek
        Anda.
      </p>
    </div>

    <div class="relative">

      <div
        class="absolute left-6 md:left-1/2 md:-translate-x-1/2 w-px h-full bg-gradient-to-b from-transparent via-impost-primary/30 to-transparent z-0">
      </div>

      <div class="space-y-6 sm:space-y-8 md:space-y-12">

        @foreach ($steps as $step)
          <div class="relative flex items-center">

            {{-- Mobile dot --}}
            <div class="md:hidden absolute left-6 -translate-x-1/2 z-10">
              @if ($step['last'])
                <div
                  class="w-7 h-7 bg-impost-primary rounded-full flex items-center justify-center shadow-[0_0_15px_rgba(var(--impost-primary),0.5)]">
                  <svg class="w-3.5 h-3.5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
              @else
                <div
                  class="w-7 h-7 bg-[#0f0f0f] border border-impost-primary/50 rounded-full flex items-center justify-center">
                  <span class="text-[10px] font-bold text-impost-primary">{{ $step['num'] }}</span>
                </div>
              @endif
            </div>

            <div class="flex-1 md:flex md:items-center md:gap-10">

              @if ($step['side'] === 'left')
                {{-- Card left --}}
                <div class="md:w-[45%] md:text-right pl-12 sm:pl-14 md:pl-0">
                  <div
                    class="group {{ $step['last'] ? 'bg-gradient-to-br from-impost-primary/[0.05] to-transparent border-impost-primary/20' : 'bg-white/[0.02] border-white/10 hover:border-impost-primary/30 hover:bg-white/[0.04]' }} border rounded-xl p-4 sm:p-5 md:p-8 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex flex-col md:flex-row-reverse items-start md:items-center gap-3 md:gap-4">
                      <div
                        class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 {{ $step['last'] ? 'bg-impost-primary/20' : 'bg-impost-primary/10' }} rounded-lg flex items-center justify-center text-impost-primary group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="{{ $step['icon'] }}" />
                        </svg>
                      </div>
                      <div class="flex-1">
                        <h3 class="text-sm sm:text-base md:text-xl font-semibold text-white mb-1 sm:mb-2">
                          {{ $step['title'] }}</h3>
                        <p class="text-[11px] sm:text-xs md:text-sm text-white font-light leading-relaxed">
                          {{ $step['desc'] }}</p>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Desktop dot --}}
                <div class="hidden md:flex md:w-[10%] justify-center relative z-10">
                  @if ($step['last'])
                    <div
                      class="w-12 h-12 bg-impost-primary rounded-full flex items-center justify-center shadow-[0_0_25px_rgba(var(--impost-primary),0.5)] hover:scale-110 transition-transform">
                      <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                      </svg>
                    </div>
                  @else
                    <div
                      class="w-12 h-12 bg-[#0f0f0f] border border-impost-primary/50 rounded-full flex items-center justify-center text-impost-primary font-bold text-lg shadow-[0_0_20px_rgba(var(--impost-primary),0.2)]">
                      {{ $step['num'] }}
                    </div>
                  @endif
                </div>

                <div class="hidden md:block md:w-[45%]"></div>
              @else
                <div class="hidden md:block md:w-[45%]"></div>

                {{-- Desktop dot --}}
                <div class="hidden md:flex md:w-[10%] justify-center relative z-10">
                  @if ($step['last'])
                    <div
                      class="w-12 h-12 bg-impost-primary rounded-full flex items-center justify-center shadow-[0_0_25px_rgba(var(--impost-primary),0.5)] hover:scale-110 transition-transform">
                      <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                      </svg>
                    </div>
                  @else
                    <div
                      class="w-12 h-12 bg-[#0f0f0f] border border-impost-primary/50 rounded-full flex items-center justify-center text-impost-primary font-bold text-lg shadow-[0_0_20px_rgba(var(--impost-primary),0.2)]">
                      {{ $step['num'] }}
                    </div>
                  @endif
                </div>

                {{-- Card right --}}
                <div class="md:w-[45%] md:text-left pl-12 sm:pl-14 md:pl-0">
                  <div
                    class="group {{ $step['last'] ? 'bg-gradient-to-br from-impost-primary/[0.05] to-transparent border-impost-primary/20' : 'bg-white/[0.02] border-white/10 hover:border-impost-primary/30 hover:bg-white/[0.04]' }} border rounded-xl p-4 sm:p-5 md:p-8 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-3 md:gap-4">
                      <div
                        class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 {{ $step['last'] ? 'bg-impost-primary/20' : 'bg-impost-primary/10' }} rounded-lg flex items-center justify-center text-impost-primary group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor"
                          viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="{{ $step['icon'] }}" />
                        </svg>
                      </div>
                      <div class="flex-1">
                        <h3 class="text-sm sm:text-base md:text-xl font-semibold text-white mb-1 sm:mb-2">
                          {{ $step['title'] }}</h3>
                        <p class="text-[11px] sm:text-xs md:text-sm text-white font-light leading-relaxed">
                          {{ $step['desc'] }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @endif

            </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</section>
