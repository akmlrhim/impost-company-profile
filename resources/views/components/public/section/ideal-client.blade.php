@php
  $idealItems = [
    ['title'=>'Visioner & Serius','desc'=>'Anda melihat marketing sebagai investasi, bukan pengeluaran yang harus dipangkas saat tekanan datang.'],
    ['title'=>'Butuh Kepastian','desc'=>'Lelah dengan "bakar uang" iklan tanpa hasil. Anda ingin data yang bisa dipertanggungjawabkan secara nyata.'],
    ['title'=>'Siap Scale-Up','desc'=>'Bisnis Anda sudah berjalan, tapi stuck di level tertentu dan butuh sistem untuk naik kelas lebih tinggi.'],
  ];
  $notItems = [
    ['title'=>'Ingin Hasil "Sulap"','desc'=>'Berharap omzet meledak dalam semalam tanpa pondasi yang kuat dan proses yang terstruktur.'],
    ['title'=>'Anti Kritik & Data','desc'=>'Lebih percaya "feeling" pribadi daripada data riil di lapangan yang terukur dan bisa dibuktikan.'],
    ['title'=>'Kuantitas > Kualitas','desc'=>'Hanya ingin postingan banyak asal jadi, tanpa strategi branding jangka panjang yang konsisten.'],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24 im-section-alt">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="max-w-3xl mx-auto text-center mb-14 sm:mb-20">
      <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-3">Cocok atau Tidak?</p>
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4">
        Kami Tidak Mencari Klien,<br>Kami Mencari
        <span class="text-impost-primary"> Partner</span>
      </h2>
      <p class="text-base font-medium leading-relaxed text-white max-w-xl mx-auto">
        Sinergi terbaik lahir dari visi yang sama. Mari cari tahu apakah kita cocok bekerja sama.
      </p>
    </div>

    {{-- Two cards side by side --}}
    <div class="grid lg:grid-cols-2 gap-5 lg:gap-6">

      {{-- Ideal --}}
      <div class="bg-white/[0.04] border border-white/[0.08] rounded-2xl hover:border-white/[0.15] transition-colors duration-200 overflow-hidden">
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/8 bg-emerald-500/5">
          <div class="w-9 h-9 rounded-xl bg-emerald-500/15 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <h3 class="font-bold text-white text-sm">Anda Partner Ideal Kami Jika:</h3>
        </div>
        <div class="divide-y divide-white/6">
          @foreach ($idealItems as $item)
            <div class="px-6 py-5 flex items-start gap-3">
              <div class="w-1.5 h-1.5 rounded-full bg-emerald-400 mt-2.5 flex-shrink-0"></div>
              <div>
                <h4 class="font-bold text-white text-sm mb-1">{{ $item['title'] }}</h4>
                <p class="text-sm font-medium leading-relaxed text-white leading-relaxed">{{ $item['desc'] }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <div class="px-6 py-5 border-t border-white/8">
          <a href="{{ route('vsl-form') }}" class="inline-flex items-center justify-center gap-2 font-bold rounded-full cursor-pointer bg-[#d4ac3c] text-[#040404] hover:bg-[#d09738] transition-colors whitespace-nowrap text-xs px-5 py-2.5">
            Daftar Konsultasi Gratis
          </a>
        </div>
      </div>

      {{-- Not ideal --}}
      <div class="bg-white/[0.04] border border-white/[0.08] rounded-2xl hover:border-white/[0.15] transition-colors duration-200 overflow-hidden">
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/8 bg-red-500/5">
          <div class="w-9 h-9 rounded-xl bg-red-500/15 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </div>
          <h3 class="font-bold text-white text-sm">Mungkin Kita Belum Cocok Jika:</h3>
        </div>
        <div class="divide-y divide-white/6">
          @foreach ($notItems as $item)
            <div class="px-6 py-5 flex items-start gap-3">
              <div class="w-1.5 h-1.5 rounded-full bg-red-400/60 mt-2.5 flex-shrink-0"></div>
              <div>
                <h4 class="font-bold text-white text-sm mb-1">{{ $item['title'] }}</h4>
                <p class="text-sm font-medium leading-relaxed text-white/50 leading-relaxed">{{ $item['desc'] }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <div class="px-6 py-5 border-t border-white/8">
          <p class="text-xs font-medium text-white/50">Kami hanya bekerja sama dengan klien yang berkomitmen pada pertumbuhan jangka panjang.</p>
        </div>
      </div>

    </div>
  </div>
</section>
