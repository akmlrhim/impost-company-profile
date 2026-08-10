@php
  $features = [
      [
          'icon' =>
              'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
          'title' => 'Data-Driven Approach',
          'desc' => 'Keputusan pemasaran berdasarkan data terukur dan analisis mendalam, bukan asumsi.',
      ],
      [
          'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
          'title' => 'Terbukti & Fleksibel',
          'desc' => 'Solusi yang teruji, hemat biaya, dan sangat mudah disesuaikan dengan kebutuhan bisnis Anda.',
      ],
      [
          'icon' =>
              'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
          'title' => 'All-in-One Service',
          'desc' => 'Layanan branding, web, dan digital marketing terintegrasi dalam satu ekosistem.',
      ],
      [
          'icon' =>
              'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
          'title' => 'Team Ahli',
          'desc' => 'Akses instan ke tim profesional berpengalaman tanpa kerumitan rekrutmen internal.',
      ],
      [
          'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
          'title' => 'Efisiensi Waktu',
          'desc' => 'Memangkas biaya operasional dan mempercepat eksekusi campaign secara signifikan.',
      ],
      [
          'icon' => 'M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z',
          'title' => 'Performance Based',
          'desc' => 'Pembayaran dikaitkan dengan hasil performa yang transparan dan bisa dipertanggungjawabkan.',
      ],
  ];

  $leftItems = array_slice($features, 0, 3);
  $rightItems = array_slice($features, 3, 3);
  $desktopConnectors = [
      [
          'svg' =>
              '<path d="M0 10 C 60 10, 80 80, 120 100" stroke="#d4ac3c" stroke-opacity="0.3" stroke-width="1.5" stroke-dasharray="5 5" fill="none"/><circle cx="0" cy="10" r="2.5" fill="#d4ac3c" fill-opacity="0.5"/>',
          'box' => 'w-[120px] h-[100px]',
          'vb' => '0 0 120 100',
          'side_cls' => '-right-[120px] top-1/2',
      ],
      [
          'svg' =>
              '<path d="M0 20 C 40 20, 60 20, 100 20" stroke="#d4ac3c" stroke-opacity="0.3" stroke-width="1.5" stroke-dasharray="5 5" fill="none"/><circle cx="0" cy="20" r="2.5" fill="#d4ac3c" fill-opacity="0.5"/>',
          'box' => 'w-[100px] h-[40px]',
          'vb' => '0 0 100 40',
          'side_cls' => '-right-[100px] top-1/2 -translate-y-1/2',
      ],
      [
          'svg' =>
              '<path d="M0 90 C 60 90, 80 20, 120 0" stroke="#d4ac3c" stroke-opacity="0.3" stroke-width="1.5" stroke-dasharray="5 5" fill="none"/><circle cx="0" cy="90" r="2.5" fill="#d4ac3c" fill-opacity="0.5"/>',
          'box' => 'w-[120px] h-[100px]',
          'vb' => '0 0 120 100',
          'side_cls' => '-right-[120px] bottom-1/2',
      ],
      [
          'svg' =>
              '<path d="M120 10 C 60 10, 40 80, 0 100" stroke="#d4ac3c" stroke-opacity="0.3" stroke-width="1.5" stroke-dasharray="5 5" fill="none"/><circle cx="120" cy="10" r="2.5" fill="#d4ac3c" fill-opacity="0.5"/>',
          'box' => 'w-[120px] h-[100px]',
          'vb' => '0 0 120 100',
          'side_cls' => '-left-[120px] top-1/2',
      ],
      [
          'svg' =>
              '<path d="M100 20 C 60 20, 40 20, 0 20" stroke="#d4ac3c" stroke-opacity="0.3" stroke-width="1.5" stroke-dasharray="5 5" fill="none"/><circle cx="100" cy="20" r="2.5" fill="#d4ac3c" fill-opacity="0.5"/>',
          'box' => 'w-[100px] h-[40px]',
          'vb' => '0 0 100 40',
          'side_cls' => '-left-[100px] top-1/2 -translate-y-1/2',
      ],
      [
          'svg' =>
              '<path d="M120 90 C 60 90, 40 20, 0 0" stroke="#d4ac3c" stroke-opacity="0.3" stroke-width="1.5" stroke-dasharray="5 5" fill="none"/><circle cx="120" cy="90" r="2.5" fill="#d4ac3c" fill-opacity="0.5"/>',
          'box' => 'w-[120px] h-[100px]',
          'vb' => '0 0 120 100',
          'side_cls' => '-left-[120px] bottom-1/2',
      ],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24 bg-impost-fifth">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="max-w-3xl mx-auto text-center mb-14 sm:mb-20">
      <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold leading-tight text-white mb-4">
        Kenapa Harus <br><span class="text-impost-primary">Impost Media?</span>
      </h2>
      <p class="text-xs md:text-base font-medium leading-relaxed text-white max-w-xl mx-auto">
        Kami bukan sekadar vendor jasa. Kami partner pertumbuhan bisnis Anda jangka panjang.
      </p>
    </div>

    {{-- Desktop radial --}}
    <div class="relative hidden lg:block w-full min-h-[780px]">
      {{-- Orbital rings --}}
      <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
        <div class="w-[480px] h-[480px] border border-impost-primary/8 rounded-full absolute"></div>
        <div class="w-[780px] h-[780px] border border-impost-primary/4 rounded-full absolute"></div>
      </div>

      {{-- Center image --}}
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20">
        <img src="{{ asset('img/why_us.jpeg') }}" alt="Why Choose Impost Media"
          class="w-[260px] h-auto rounded-[2rem] border border-white/8 object-cover shadow-[0_40px_80px_rgba(0,0,0,0.7)]"
          loading="lazy">
      </div>

      {{-- Feature cards around --}}
      @foreach (array_merge(array_map(fn($f, $i) => array_merge($f, ['_side' => 'left', '_idx' => $i]), $leftItems, array_keys($leftItems)), array_map(fn($f, $i) => array_merge($f, ['_side' => 'right', '_idx' => $i]), $rightItems, array_keys($rightItems))) as $item)
        @php
          $isLeft = $item['_side'] === 'left';
          $idx = $item['_idx'];
          $pos = ['top-[8%]', 'top-1/2 -translate-y-1/2 ' . ($isLeft ? 'left-[-2%]' : 'right-[-2%]'), 'bottom-[8%]'][
              $idx
          ];
          $conn = $desktopConnectors[$isLeft ? $idx : $idx + 3];
        @endphp
        <div class="absolute {{ $pos }} {{ $isLeft ? 'left-0' : 'right-0' }} w-[21rem] group z-30">
          <div
            class="relative flex items-start gap-3.5 p-5 bg-white/[0.04] border border-white/[0.08] rounded-2xl hover:border-white/[0.15] transition-colors duration-200 hover:border-impost-primary/30 transition-all duration-300">
            <div class="absolute {{ $conn['side_cls'] }} {{ $conn['box'] }} pointer-events-none">
              <svg width="100%" height="100%" viewBox="{{ $conn['vb'] }}"
                fill="none">{!! $conn['svg'] !!}</svg>
            </div>
            <div
              class="flex items-center justify-center shrink-0 bg-impost-primary/10 border border-impost-primary/20 rounded-xl text-impost-primary w-10 h-10 group-hover:scale-110 transition-transform duration-300">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
              </svg>
            </div>
            <div>
              <h4 class="font-bold text-white text-sm mb-1 group-hover:text-impost-primary transition-colors">
                {{ $item['title'] }}</h4>
              <p class="text-xs md:text-base font-normal text-white leading-relaxed">{{ $item['desc'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Mobile / tablet --}}
    <div class="lg:hidden">
      <div class="flex justify-center mb-10">
        <img src="{{ asset('img/why_us.jpeg') }}" alt="Why Choose Impost Media"
          class="w-[180px] sm:w-[220px] h-auto rounded-[2rem] border border-white/8 object-cover shadow-[0_24px_60px_rgba(0,0,0,0.6)]"
          loading="lazy">
      </div>
      <div class="grid sm:grid-cols-2 gap-4">
        @foreach ($features as $item)
          <div
            class="flex items-start gap-3 p-4 sm:p-5 bg-white/[0.04] border border-white/[0.08] rounded-2xl hover:border-white/[0.15] transition-colors duration-200">
            <div
              class="flex items-center justify-center shrink-0 bg-impost-primary/10 border border-impost-primary/20 rounded-xl text-impost-primary w-10 h-10">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
              </svg>
            </div>
            <div>
              <h4 class="font-bold text-white text-md mb-1">{{ $item['title'] }}</h4>
              <p class="text-xs md:text-base font-normal text-white leading-relaxed">{{ $item['desc'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>
