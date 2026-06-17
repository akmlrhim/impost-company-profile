@php
  $problems = [
      [
          'icon' =>
              'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
          'title' => 'Konten Jalan, Sepi',
          'desc' => 'Traffic tinggi tapi penjualan nol. Funnel bocor di mana-mana.',
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
          'desc' => 'Sibuk hal teknis hingga tak punya waktu berpikir strategis.',
      ],
      [
          'icon' =>
              'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
          'title' => 'Tim Tidak Efektif',
          'desc' => 'Tim internal belum siap menghadapi lanskap digital yang berubah cepat.',
      ],
      [
          'icon' => 'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636',
          'title' => 'Trauma Agency',
          'desc' => 'Pernah kecewa dengan agency sebelumnya. Ragu untuk mencoba lagi.',
      ],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24 bg-impost-fifth">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="grid lg:grid-cols-[1fr_1.6fr] gap-12 lg:gap-16 items-center">

      {{-- Left: heading --}}
      <div>
        <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-4">Akar Masalah</p>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-5">
          Mengapa Omzet<br>
          <span class="text-red-400">Sulit Bertumbuh?</span>
        </h2>
        <p class="text-base font-normal leading-relaxed text-white mb-8">
          Banyak bisnis terjebak di masalah yang sama tanpa pernah menyentuh akar persoalannya.
        </p>
      </div>

      {{-- Right: 2-col grid with thin dividers --}}
      <div class="grid grid-cols-2 border border-white/[0.08]">
        @foreach ($problems as $item)
          <div
            class="flex flex-col items-center text-center p-7 md:p-10
            {{ $loop->index % 2 === 0 ? 'border-r border-white/[0.08]' : '' }}
            {{ $loop->index < 4 ? 'border-b border-white/[0.08]' : '' }}">

            <div class="mb-5">
              <svg class="w-10 h-10 text-red-400/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                stroke-width="1.3">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
              </svg>
            </div>

            <h3 class="text-md font-bold text-white mb-1.5">{{ $item['title'] }}</h3>
            <p class="text-sm font-normal leading-relaxed text-white">{{ $item['desc'] }}</p>

          </div>
        @endforeach
      </div>

    </div>
  </div>
</section>
