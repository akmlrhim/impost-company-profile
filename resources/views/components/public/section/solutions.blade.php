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
    <div class="mb-10 sm:mb-14 text-center">
      <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold leading-tight text-white mb-4">
        Apa yang Sebenarnya<br>
        Kami <span class="text-impost-primary">Selesaikan?</span>
      </h2>
      <p class="text-xs md:text-base leading-relaxed text-center text-white max-w-2xl mx-auto">
        Kami menolak menjadi sekadar vendor "jasa digital marketing". Kami hadir memberikan
        kepastian data, pertumbuhan omzet, dan profit nyata.
      </p>
    </div>

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
            <p class="text-xs md:text-base leading-relaxed text-white">{{ $item['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
