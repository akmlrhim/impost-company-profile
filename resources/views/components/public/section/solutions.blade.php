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

<section class="py-20 md:py-28 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <div class="max-w-3xl mx-auto text-center mb-16 md:mb-20">
      <h2 class="text-xl md:text-3xl lg:text-5xl text-white leading-tight mb-6 font-header">
        Apa yang Sebenarnya <br class="hidden md:block"> Kami <span class="italic text-impost-primary">Selesaikan?</span>
      </h2>
      <p class="text-white text-sm md:text-base leading-relaxed max-w-2xl mx-auto">
        Kami menolak menjadi sekadar vendor yang menjual "jasa digital marketing". Kami hadir memberikan kepastian data,
        pertumbuhan omzet, dan profit nyata.
      </p>
    </div>

    <div
      class="flex overflow-x-auto pb-8 -mx-4 px-4 sm:mx-0 sm:px-0 sm:pb-0 snap-x snap-mandatory sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 hide-scrollbar">
      @foreach ($items as $item)
        <div class="min-w-[85vw] sm:min-w-0 snap-center animate-fade-in-up"
          style="animation-delay: {{ $loop->index * 100 }}ms; animation-fill-mode: both;">
          <div
            class="group h-full bg-white/[0.03] border border-white/[0.08] hover:border-impost-primary/40 hover:bg-white/[0.05] rounded-2xl p-6 md:p-8 transition-all duration-300">

            <div class="flex items-center justify-between mb-6">
              <div
                class="w-12 h-12 rounded-xl bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6 text-impost-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                </svg>
              </div>
            </div>

            <div>
              <h3
                class="text-lg lg:text-xl font-semibold text-white mb-3 group-hover:text-impost-primary transition-colors duration-300">
                {{ $item['title'] }}
              </h3>
              <p class="text-white text-sm md:text-base leading-relaxed">
                {{ $item['desc'] }}
              </p>
            </div>

          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<style>
  .hide-scrollbar::-webkit-scrollbar {
    display: none;
  }

  .hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out forwards;
  }
</style>
