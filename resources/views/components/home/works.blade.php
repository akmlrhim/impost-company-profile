@php
  $steps = [
    ['num'=>'01','icon'=>'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z','title'=>'Onboarding & Meeting','desc'=>'Diskusi mendalam tentang detail proyek, kondisi ideal yang ingin dicapai, serta masalah yang dihadapi bisnis Anda.'],
    ['num'=>'02','icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z','title'=>'Analisis & Penawaran','desc'=>'Tim melakukan analisis mendalam untuk menyusun Project Brief dan skema harga yang tepat sasaran.'],
    ['num'=>'03','icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z','title'=>'Deal & Invoicing','desc'=>'Negosiasi hingga sepakat (Harga & KPI), tanda tangan kontrak, dan pembayaran awal sebagai tanda komitmen.'],
    ['num'=>'04','icon'=>'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z','title'=>'Finalisasi Brief','desc'=>'Tim menyempurnakan strategi internal, lalu dikembalikan untuk Anda tinjau. Masa review maksimal 2 minggu.'],
    ['num'=>'05','icon'=>'M13 10V3L4 14h7v7l9-11h-7z','title'=>'Produksi & Eksekusi','desc'=>'Mulai produksi konten dan menjalankan proyek, termasuk fase testing & optimasi untuk hasil terbaik.'],
    ['num'=>'06','icon'=>'M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z','title'=>'Reporting & Evaluasi','desc'=>'Laporan data & KPI dikirim setiap akhir bulan. Anda memegang kontrol penuh atas kelanjutan kontrak.'],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16 lg:mb-20">
      <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-3">Cara Kami Bekerja</p>
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4">
        Alur <span class="text-impost-primary">Layanan</span>
      </h2>
      <p class="text-base font-medium leading-relaxed text-white">
        Dari konsultasi hingga evaluasi hasil — setiap langkah dirancang transparan dan terukur.
      </p>
    </div>

    {{-- Vertical Steps --}}
    <div class="max-w-3xl mx-auto">
      @foreach ($steps as $step)
        <div class="flex items-stretch gap-5 md:gap-7">

          {{-- Left: circle + connector --}}
          <div class="flex flex-col items-center flex-shrink-0 w-12">
            <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0 border-2
              {{ $loop->last
                ? 'bg-impost-primary border-impost-primary'
                : 'bg-impost-primary/10 border-impost-primary/40' }}">
              @if ($loop->last)
                <svg class="w-5 h-5 text-impost-fourth" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
              @else
                <span class="text-sm font-bold text-impost-primary leading-none">{{ $step['num'] }}</span>
              @endif
            </div>
            @unless ($loop->last)
              <div class="flex-1 w-px bg-gradient-to-b from-impost-primary/40 to-impost-primary/10 my-1.5 min-h-[1.5rem]"></div>
            @endunless
          </div>

          {{-- Right: card --}}
          <div class="flex-1 {{ $loop->last ? 'pb-0' : 'pb-4' }}">
            <div class="group bg-white/[0.04] border border-white/[0.08] rounded-2xl hover:border-white/[0.15] transition-colors duration-200 p-5 md:p-6 hover:-translate-y-0.5 transition-all duration-300
              {{ $loop->last ? 'border-impost-primary/25 bg-impost-primary/5' : '' }}">

              <div class="flex items-start gap-4 mb-3">
                <div class="flex items-center justify-center shrink-0 bg-[#d4ac3c]/10 border border-[#d4ac3c]/20 rounded-xl text-[#d4ac3c] w-9 h-9 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}"/>
                  </svg>
                </div>
                <h3 class="text-lg font-bold leading-relaxed text-white group-hover:text-impost-primary transition-colors duration-300 leading-snug pt-0.5">
                  {{ $step['title'] }}
                </h3>
              </div>

              <p class="text-sm font-medium leading-relaxed text-white leading-relaxed pl-10 sm:pl-[3.25rem]">{{ $step['desc'] }}</p>

              @if ($loop->last)
                <div class="mt-4 pt-4 border-t border-impost-primary/15 pl-10 sm:pl-[3.25rem]">
                  <a href="{{ route('vsl-form') }}" class="inline-flex items-center justify-center gap-2 font-bold rounded-full cursor-pointer bg-[#d4ac3c] text-[#040404] hover:bg-[#d09738] transition-colors whitespace-nowrap text-xs px-5 py-2.5">
                    Mulai Sekarang
                  </a>
                </div>
              @endif
            </div>
          </div>

        </div>
      @endforeach
    </div>

  </div>
</section>
