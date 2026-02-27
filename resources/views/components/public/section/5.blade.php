@php
  $features = [
      [
          'icon' =>
              'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
          'title' => 'Data-Driven Approach',
          'desc' => 'Keputusan pemasaran berdasarkan data terukur dan analisis mendalam.',
      ],
      [
          'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
          'title' => 'Terbukti & Fleksibel',
          'desc' => 'Solusi yang teruji, hemat biaya, dan sangat mudah disesuaikan.',
      ],
      [
          'icon' =>
              'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
          'title' => 'All-in-One Service',
          'desc' => 'Layanan branding, web, dan digital marketing terintegrasi.',
      ],
      [
          'icon' =>
              'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
          'title' => 'Team Ahli',
          'desc' => 'Akses instan ke tim profesional tanpa kerumitan rekrutmen.',
      ],
      [
          'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
          'title' => 'Efisiensi Waktu',
          'desc' => 'Memangkas biaya operasional dan mempercepat eksekusi campaign.',
      ],
      [
          'icon' => 'M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z',
          'title' => 'Performance Based',
          'desc' => 'Pembayaran yang transparan dan dikaitkan dengan hasil performa.',
      ],
  ];

  $leftItems = array_slice($features, 0, 3);
  $rightItems = array_slice($features, 3, 3);

  $desktopConnectors = [
      // left side [svgPath, circleOrigin]
      [
          'side' => 'left',
          'pos' => 'top-[8%]',
          'svg' =>
              '<path d="M0 10 C 60 10, 80 80, 120 100" stroke="#fbbf24" stroke-opacity="0.4" stroke-width="2" stroke-dasharray="6 6" fill="none"/><circle cx="0" cy="10" r="3" fill="#fbbf24"/>',
          'box' => 'w-[120px] h-[100px]',
          'vb' => '0 0 120 100',
          'side_cls' => '-right-[120px] top-1/2',
      ],
      [
          'side' => 'left',
          'pos' => 'top-1/2 -translate-y-1/2 left-[-2%]',
          'svg' =>
              '<path d="M0 20 C 40 20, 60 20, 100 20" stroke="#fbbf24" stroke-opacity="0.4" stroke-width="2" stroke-dasharray="6 6" fill="none"/><circle cx="0" cy="20" r="3" fill="#fbbf24"/>',
          'box' => 'w-[100px] h-[40px]',
          'vb' => '0 0 100 40',
          'side_cls' => '-right-[100px] top-1/2 -translate-y-1/2',
      ],
      [
          'side' => 'left',
          'pos' => 'bottom-[8%]',
          'svg' =>
              '<path d="M0 90 C 60 90, 80 20, 120 0" stroke="#fbbf24" stroke-opacity="0.4" stroke-width="2" stroke-dasharray="6 6" fill="none"/><circle cx="0" cy="90" r="3" fill="#fbbf24"/>',
          'box' => 'w-[120px] h-[100px]',
          'vb' => '0 0 120 100',
          'side_cls' => '-right-[120px] bottom-1/2',
      ],
      // right side
      [
          'side' => 'right',
          'pos' => 'top-[8%]',
          'svg' =>
              '<path d="M120 10 C 60 10, 40 80, 0 100" stroke="#fbbf24" stroke-opacity="0.4" stroke-width="2" stroke-dasharray="6 6" fill="none"/><circle cx="120" cy="10" r="3" fill="#fbbf24"/>',
          'box' => 'w-[120px] h-[100px]',
          'vb' => '0 0 120 100',
          'side_cls' => '-left-[120px] top-1/2',
      ],
      [
          'side' => 'right',
          'pos' => 'top-1/2 -translate-y-1/2 right-[-2%]',
          'svg' =>
              '<path d="M100 20 C 60 20, 40 20, 0 20" stroke="#fbbf24" stroke-opacity="0.4" stroke-width="2" stroke-dasharray="6 6" fill="none"/><circle cx="100" cy="20" r="3" fill="#fbbf24"/>',
          'box' => 'w-[100px] h-[40px]',
          'vb' => '0 0 100 40',
          'side_cls' => '-left-[100px] top-1/2 -translate-y-1/2',
      ],
      [
          'side' => 'right',
          'pos' => 'bottom-[8%]',
          'svg' =>
              '<path d="M120 90 C 60 90, 40 20, 0 0" stroke="#fbbf24" stroke-opacity="0.4" stroke-width="2" stroke-dasharray="6 6" fill="none"/><circle cx="120" cy="90" r="3" fill="#fbbf24"/>',
          'box' => 'w-[120px] h-[100px]',
          'vb' => '0 0 120 100',
          'side_cls' => '-left-[120px] bottom-1/2',
      ],
  ];
@endphp

<section class="py-16 sm:py-20 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-5 sm:px-6 relative z-10">

    {{-- Desktop --}}
    <div class="relative hidden lg:block w-full min-h-[800px]">

      <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-30">
        <div class="w-[500px] h-[500px] border border-amber-500/20 rounded-full absolute"></div>
        <div class="w-[800px] h-[800px] border border-amber-500/10 rounded-full absolute"></div>
      </div>

      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20">
        <div class="relative">
          <div class="absolute inset-0 bg-amber-500/20 blur-3xl rounded-full -z-10"></div>
          <img src="{{ asset('img/why_us.jpeg') }}" alt="Why Us"
            class="w-[300px] h-auto rounded-[2.5rem] border-4 border-white/10 shadow-2xl shadow-amber-500/10 object-cover bg-[#0a0a0a]"
            loading="lazy">
        </div>
      </div>

      @foreach (array_merge(array_map(fn($f, $i) => array_merge($f, ['_side' => 'left', '_idx' => $i]), $leftItems, array_keys($leftItems)), array_map(fn($f, $i) => array_merge($f, ['_side' => 'right', '_idx' => $i]), $rightItems, array_keys($rightItems))) as $item)
        @php
          $isLeft = $item['_side'] === 'left';
          $idx = $item['_idx'];
          $pos = ['top-[8%]', 'top-1/2 -translate-y-1/2 ' . ($isLeft ? 'left-[-2%]' : 'right-[-2%]'), 'bottom-[8%]'][
              $idx
          ];
          $side = $isLeft ? 'left-0' : 'right-0';
          $connector = $desktopConnectors[$isLeft ? $idx : $idx + 3];
        @endphp
        <div class="absolute {{ $pos }} {{ $side }} w-[24rem] group z-30">
          <div
            class="relative flex items-start gap-4 p-5 rounded-xl border border-white/10 bg-black/40 backdrop-blur-md hover:border-amber-500/30 transition-all duration-300">
            <div class="absolute {{ $connector['side_cls'] }} {{ $connector['box'] }} pointer-events-none">
              <svg width="100%" height="100%" viewBox="{{ $connector['vb'] }}" fill="none"
                xmlns="http://www.w3.org/2000/svg ">
                {!! $connector['svg'] !!}
              </svg>
            </div>
            <div
              class="flex-shrink-0 w-12 h-12 rounded-xl bg-gray-900/50 flex items-center justify-center text-amber-400 border border-white/5">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
              </svg>
            </div>
            <div>
              <h4 class="text-white font-bold text-base mb-2 group-hover:text-amber-400 transition-colors">
                {{ $item['title'] }}</h4>
              <p class="text-white text-sm leading-relaxed">{{ $item['desc'] }}</p>
            </div>
          </div>
        </div>
      @endforeach

    </div>

    {{-- Mobile --}}
    <div class="lg:hidden flex flex-col gap-6">
      <div class="relative mx-auto mb-2">
        <div class="absolute inset-0 bg-amber-500/20 blur-2xl rounded-full -z-10"></div>
        <img src="{{ asset('img/why_us.jpeg') }}" alt="Why Us"
          class="w-[200px] sm:w-[240px] h-auto rounded-[2rem] border-4 border-white/10 shadow-xl mx-auto object-cover bg-[#0a0a0a]"
          loading="lazy">
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach ($features as $item)
          <div class="flex items-start gap-3 p-4 rounded-xl border border-white/10 bg-white/5">
            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-gray-950 flex items-center justify-center text-amber-400">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $item['icon'] }}" />
              </svg>
            </div>
            <div>
              <h4 class="text-white font-bold text-sm sm:text-base mb-1">{{ $item['title'] }}</h4>
              <p class="text-white/60 text-xs sm:text-sm leading-relaxed">{{ $item['desc'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>
