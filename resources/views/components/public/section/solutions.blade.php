@php
  $items = [
    ['title'=>'Omzet Stagnan','desc'=>'Memecah kebuntuan pertumbuhan pendapatan dengan strategi terukur berbasis data nyata.','icon'=>'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'],
    ['title'=>'Iklan Tidak Efisien','desc'=>'Menghentikan pemborosan budget iklan yang tidak menghasilkan konversi nyata.','icon'=>'M13 10V3L4 14h7v7l9-11h-7z'],
    ['title'=>'Branding Terlihat Murah','desc'=>'Meningkatkan persepsi nilai brand Anda secara signifikan di mata pelanggan.','icon'=>'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
    ['title'=>'Tidak Ada Penjualan','desc'=>'Membangun sistem funnel otomatis yang mengubah prospek menjadi pembeli loyal.','icon'=>'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z'],
    ['title'=>'Bisnis Sulit Scale-Up','desc'=>'Menyiapkan infrastruktur digital yang siap menampung pertumbuhan besar.','icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
    ['title'=>'Buta Data','desc'=>'Mengambil keputusan bisnis berdasarkan data riil, bukan sekadar asumsi belaka.','icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24 im-section-alt">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="max-w-3xl mx-auto text-center mb-14 sm:mb-20">
      <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-3">Yang Kami Selesaikan</p>
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-5">
        Apa yang Sebenarnya <br>Kami <span class="text-impost-primary">Selesaikan?</span>
      </h2>
      <p class="text-base font-medium leading-relaxed text-white max-w-2xl mx-auto">
        Kami menolak menjadi sekadar vendor "jasa digital marketing". Kami hadir memberikan
        kepastian data, pertumbuhan omzet, dan profit nyata.
      </p>
    </div>

    {{-- Horizontal feature strips --}}
    <div class="border-y border-white/[0.07] divide-y divide-white/[0.07]">
      @foreach ($items as $item)
        <div class="group flex items-center gap-6 md:gap-10 py-7 md:py-9 px-4 sm:px-6
          hover:bg-white/[0.025] rounded-xl
          transition-colors duration-200">

          {{-- Large icon box --}}
          <div class="flex-shrink-0">
            <div class="w-14 h-14 md:w-16 md:h-16 rounded-2xl
              bg-impost-primary/10 border border-impost-primary/20
              flex items-center justify-center
              group-hover:bg-impost-primary/18 group-hover:border-impost-primary/45
              transition-all duration-300">
              <svg class="w-7 h-7 md:w-8 md:h-8 text-impost-primary"
                fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
              </svg>
            </div>
          </div>

          {{-- Content --}}
          <div class="flex-1 min-w-0">
            <h3 class="text-lg font-bold leading-relaxed text-white mb-1.5 group-hover:text-impost-primary transition-colors duration-300">
              {{ $item['title'] }}
            </h3>
            <p class="text-sm font-medium leading-relaxed text-white leading-relaxed max-w-2xl">{{ $item['desc'] }}</p>
          </div>

        </div>
      @endforeach
    </div>

  </div>
</section>
