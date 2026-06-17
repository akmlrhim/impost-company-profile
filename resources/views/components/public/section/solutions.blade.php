@php
  $items = [
      [
          'title' => 'Omzet Stagnan',
          'desc' => 'Memecah kebuntuan pertumbuhan pendapatan dengan strategi terukur berbasis data nyata.',
          'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6',
      ],
      [
          'title' => 'Iklan Tidak Efisien',
          'desc' => 'Menghentikan pemborosan budget iklan yang tidak menghasilkan konversi nyata.',
          'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
      ],
      [
          'title' => 'Branding Terlihat Murah',
          'desc' => 'Meningkatkan persepsi nilai brand Anda secara signifikan di mata pelanggan.',
          'icon' =>
              'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
      ],
      [
          'title' => 'Tidak Ada Penjualan',
          'desc' => 'Membangun sistem funnel otomatis yang mengubah prospek menjadi pembeli loyal.',
          'icon' =>
              'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z',
      ],
      [
          'title' => 'Bisnis Sulit Scale-Up',
          'desc' => 'Menyiapkan infrastruktur digital yang siap menampung pertumbuhan besar.',
          'icon' =>
              'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
      ],
      [
          'title' => 'Buta Data',
          'desc' => 'Mengambil keputusan bisnis berdasarkan data riil, bukan sekadar asumsi belaka.',
          'icon' =>
              'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
      ],
  ];

  $metrics = [
      ['label' => 'ROAS Rata-rata', 'value' => '4.8×', 'change' => '+23%', 'up' => true],
      ['label' => 'Konversi Lead', 'value' => '18.4%', 'change' => '+9%', 'up' => true],
      ['label' => 'Cost per Lead', 'value' => 'Rp 12rb', 'change' => '-31%', 'up' => false],
      ['label' => 'Total Omzet', 'value' => '2.1M+', 'change' => '+47%', 'up' => true],
  ];

  $bars = [
      ['v' => 35, 'label' => 'Jan'],
      ['v' => 52, 'label' => 'Feb'],
      ['v' => 48, 'label' => 'Mar'],
      ['v' => 63, 'label' => 'Apr'],
      ['v' => 58, 'label' => 'Mei'],
      ['v' => 72, 'label' => 'Jun'],
      ['v' => 68, 'label' => 'Jul'],
      ['v' => 85, 'label' => 'Agu'],
      ['v' => 78, 'label' => 'Sep'],
      ['v' => 91, 'label' => 'Okt'],
      ['v' => 88, 'label' => 'Nov'],
      ['v' => 100, 'label' => 'Des'],
  ];

  $channels = [
      ['label' => 'Meta Ads', 'pct' => 42, 'color' => '#d4ac3c'],
      ['label' => 'Google Ads', 'pct' => 28, 'color' => '#60a5fa'],
      ['label' => 'Organic SEO', 'pct' => 18, 'color' => '#a78bfa'],
      ['label' => 'TikTok Ads', 'pct' => 12, 'color' => '#f472b6'],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24 im-section-alt">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Heading --}}
    <div class="mb-10 sm:mb-14 text-center sm:text-left">
      <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4">
        Apa yang Sebenarnya<br>
        Kami <span class="text-impost-primary">Selesaikan?</span>
      </h2>
      <p class="text-sm sm:text-base leading-relaxed text-white max-w-2xl mx-auto sm:mx-0">
        Kami menolak menjadi sekadar vendor "jasa digital marketing". Kami hadir memberikan
        kepastian data, pertumbuhan omzet, dan profit nyata.
      </p>
    </div>

    {{-- Dashboard mockup --}}
    <div class="rounded-2xl overflow-hidden mb-12 sm:mb-16 bg-[#0a0a0a] border border-white/[0.07]">

      {{-- Browser bar --}}
      <div class="flex items-center gap-1.5 px-5 py-3 border-b border-white/[0.05] bg-white/[0.02]">
        <span class="w-2.5 h-2.5 rounded-full bg-red-500/60"></span>
        <span class="w-2.5 h-2.5 rounded-full bg-yellow-500/60"></span>
        <span class="w-2.5 h-2.5 rounded-full bg-green-500/60"></span>
        <span class="ml-4 text-[11px] text-white/25 font-mono">impost-media / performance-dashboard</span>
      </div>

      <div class="p-5 md:p-7 lg:p-9 space-y-4 md:space-y-5">

        {{-- Metric cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
          @foreach ($metrics as $m)
            <div class="bg-white/[0.03] border border-white/[0.06] rounded-xl p-4 md:p-5">
              <p class="text-[10px] md:text-[11px] text-white/35 uppercase tracking-wider mb-2.5">{{ $m['label'] }}
              </p>
              <p class="text-xl md:text-2xl lg:text-[1.75rem] font-bold text-white mb-2">{{ $m['value'] }}</p>
              <span
                class="inline-flex items-center gap-1 text-[11px] font-semibold {{ $m['up'] ? 'text-green-400' : 'text-green-400' }}">
                <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  stroke-width="2.5">
                  @if ($m['up'])
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                  @else
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                  @endif
                </svg>
                {{ $m['change'] }} vs tahun lalu
              </span>
            </div>
          @endforeach
        </div>

        {{-- Charts row --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 md:gap-4">

          {{-- Bar chart: monthly growth --}}
          <div class="lg:col-span-2 bg-white/[0.02] border border-white/[0.05] rounded-xl p-5 md:p-6">
            <div class="flex items-center justify-between mb-5">
              <div>
                <p class="text-xs text-white/50 uppercase tracking-wider">Pertumbuhan Omzet Klien</p>
                <p class="text-sm font-semibold text-white mt-0.5">Januari - Desember 2024</p>
              </div>
              <span class="text-[11px] font-semibold text-green-400 bg-green-400/10 px-2.5 py-1 rounded-full">+47%
                YoY</span>
            </div>

            {{-- Y-axis gridlines + bars --}}
            <div class="relative">
              {{-- Horizontal gridlines --}}
              <div class="absolute inset-0 flex flex-col justify-between pb-6 pointer-events-none">
                @foreach ([100, 75, 50, 25] as $line)
                  <div class="border-t border-white/[0.04] w-full relative">
                    <span class="absolute -top-2 -left-1 text-[9px] text-white/20">{{ $line }}%</span>
                  </div>
                @endforeach
              </div>

              {{-- Bars --}}
              <div class="flex items-end gap-1 md:gap-1.5 h-36 md:h-44 pl-6">
                @foreach ($bars as $b)
                  <div class="flex-1 flex flex-col items-center gap-1 justify-end h-full">
                    <div class="w-full rounded-t"
                      style="height: {{ $b['v'] }}%; background: linear-gradient(to top, rgba(212,172,60,0.85), rgba(212,172,60,0.2));">
                    </div>
                  </div>
                @endforeach
              </div>

              {{-- X-axis labels --}}
              <div class="flex justify-between pl-6 mt-2">
                @foreach ($bars as $b)
                  <span class="flex-1 text-center text-[8px] md:text-[10px] text-white/25">{{ $b['label'] }}</span>
                @endforeach
              </div>
            </div>
          </div>

          {{-- Channel breakdown --}}
          <div class="lg:col-span-1 bg-white/[0.02] border border-white/[0.05] rounded-xl p-5 md:p-6 flex flex-col">
            <div class="mb-5">
              <p class="text-xs text-white/50 uppercase tracking-wider">Sumber Traffic</p>
              <p class="text-sm font-semibold text-white mt-0.5">Distribusi per Channel</p>
            </div>

            {{-- Stacked bar --}}
            <div class="flex h-2 rounded-full overflow-hidden mb-5">
              @foreach ($channels as $ch)
                <div class="h-full" style="width: {{ $ch['pct'] }}%; background-color: {{ $ch['color'] }};"></div>
              @endforeach
            </div>

            {{-- Channel list --}}
            <div class="space-y-3.5 flex-1">
              @foreach ($channels as $ch)
                <div class="flex items-center gap-3">
                  <span class="w-2.5 h-2.5 rounded-full flex-shrink-0"
                    style="background-color: {{ $ch['color'] }};"></span>
                  <span class="flex-1 text-xs md:text-sm text-white/70">{{ $ch['label'] }}</span>
                  <div class="flex items-center gap-2 flex-shrink-0">
                    <div class="w-16 md:w-20 h-1.5 bg-white/[0.06] rounded-full overflow-hidden">
                      <div class="h-full rounded-full"
                        style="width: {{ $ch['pct'] }}%; background-color: {{ $ch['color'] }};"></div>
                    </div>
                    <span class="text-[11px] font-semibold text-white/60 w-8 text-right">{{ $ch['pct'] }}%</span>
                  </div>
                </div>
              @endforeach
            </div>

            {{-- Bottom summary --}}
            <div class="mt-5 pt-4 border-t border-white/[0.05] grid grid-cols-2 gap-3">
              <div>
                <p class="text-[10px] text-white/30 uppercase tracking-wider mb-1">Total Sesi</p>
                <p class="text-base font-bold text-white">84.2K</p>
              </div>
              <div>
                <p class="text-[10px] text-white/30 uppercase tracking-wider mb-1">Bounce Rate</p>
                <p class="text-base font-bold text-white">32.1%</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    {{-- 6-item grid with thin borders --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 border-t border-l border-white/[0.07]">
      @foreach ($items as $item)
        <div class="border-b border-r border-white/[0.07] p-7 md:p-8 flex gap-4 items-start">
          <div class="flex-shrink-0 mt-0.5">
            <svg class="w-5 h-5 text-impost-primary/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
            </svg>
          </div>
          <div>
            <h3 class="text-sm md:text-base font-bold text-white mb-1.5">{{ $item['title'] }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-white">{{ $item['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
