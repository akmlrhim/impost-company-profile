@php
  $idealItems = [
      [
          'title' => 'Visioner & Serius',
          'desc' => 'Anda melihat marketing sebagai investasi, bukan pengeluaran yang harus dipangkas.',
      ],
      [
          'title' => 'Butuh Kepastian',
          'desc' => 'Lelah dengan "bakar uang" iklan tanpa hasil. Anda ingin data yang bisa dipertanggungjawabkan.',
      ],
      [
          'title' => 'Siap Scale-Up',
          'desc' => 'Bisnis Anda sudah berjalan, tapi stuck di level tertentu dan butuh sistem untuk naik kelas.',
      ],
  ];

  $notItems = [
      [
          'title' => 'Ingin Hasil "Sulap"',
          'desc' => 'Berharap omzet meledak dalam semalam tanpa pondasi yang kuat.',
      ],
      [
          'title' => 'Anti Kritik & Data',
          'desc' => 'Lebih percaya "feeling" pribadi daripada data riil di lapangan.',
      ],
      [
          'title' => 'Kuantitas > Kualitas',
          'desc' => 'Hanya ingin postingan banyak asal jadi, tanpa strategi branding.',
      ],
  ];
@endphp

<section class="py-16 sm:py-20 md:py-24 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="max-w-3xl mx-auto text-center mb-14 sm:mb-20">
      <h2 class="text-2xl sm:text-3xl md:text-5xl font-header text-white leading-tight mb-4 sm:mb-5">
        Kami Tidak Mencari Klien
        <br class="hidden md:block">Kami Mencari <span class="italic text-impost-primary">Partner</span>
      </h2>
      <p class="text-white/50 text-sm lg:text-base leading-relaxed max-w-xl mx-auto">
        Sinergi terbaik lahir dari visi yang sama. Apakah kita cocok?
      </p>
    </div>

    {{-- Two Columns --}}
    <div class="grid lg:grid-cols-2 gap-5 lg:gap-6 items-start">

      {{-- Left: Ideal Partner --}}
      <div class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden">

        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/10">
          <div class="w-9 h-9 rounded-xl bg-emerald-500/10 flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <h3 class="text-base lg:text-lg font-bold text-white">Anda Adalah Partner Ideal Jika:</h3>
        </div>

        <div class="divide-y divide-white/5">
          @foreach ($idealItems as $item)
            <div class="px-6 py-5">
              <div class="flex items-start gap-3">
                <div class="w-1.5 h-1.5 rounded-full bg-emerald-400 mt-2 shrink-0"></div>
                <div>
                  <h4 class="text-white font-bold text-base lg:text-lg mb-1">{{ $item['title'] }}</h4>
                  <p class="text-white/40 text-sm lg:text-base leading-relaxed">{{ $item['desc'] }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>

      </div>

      {{-- Right: Not a Fit --}}
      <div class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden">

        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/10">
          <div class="w-9 h-9 rounded-xl bg-red-500/10 flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
          <h3 class="text-base lg:text-lg font-bold text-white">Mungkin Kita Tidak Cocok Jika:</h3>
        </div>

        <div class="divide-y divide-white/5">
          @foreach ($notItems as $item)
            <div class="px-6 py-5">
              <div class="flex items-start gap-3">
                <div class="w-1.5 h-1.5 rounded-full bg-red-400 mt-2 shrink-0"></div>
                <div>
                  <h4 class="text-white font-bold text-base lg:text-lg mb-1">{{ $item['title'] }}</h4>
                  <p class="text-white/40 text-sm lg:text-base leading-relaxed">{{ $item['desc'] }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>

      </div>

    </div>

  </div>
</section>
