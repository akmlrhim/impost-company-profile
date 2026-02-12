@extends('layouts.public')

@section('content')
  <main class="pt-32 pb-20 antialiased bg-[#0a0a0a] min-h-screen">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

      <div class="mb-16 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-6 text-impost-primary font-header tracking-tight">
          Legalitas Perusahaan
        </h1>
        <p class="text-white text-sm md:text-base max-w-2xl mx-auto font-light leading-relaxed">
          Integritas dan transparansi adalah fondasi kami. Berikut adalah data legalitas resmi CV. Impost Media Indonesia
          yang terdaftar di sistem pemerintahan Republik Indonesia.
        </p>
      </div>

      <div class="bg-[#111] rounded-xl overflow-hidden mb-12">
        <div
          class="px-8 py-6 bg-[#161616] border-b border-white/5 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
          <div>
            <h2 class="text-2xl font-bold text-white">CV. IMPOST MEDIA INDONESIA</h2>
            <p class="text-white text-sm mt-1">Badan Usaha Resmi Terdaftar</p>
          </div>
        </div>

        <div class="p-8">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">

            <div>
              <h3 class="text-impost-primary font-bold text-sm uppercase mb-2">Nomor Induk Berusaha (NIB)</h3>
              <p class="text-xl md:text-2xl font-mono font-bold text-white tracking-wide">0303250028303</p>
              <p class="text-sm text-green-500 mt-2 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"></path>
                </svg>
                Terbit: OSS Indonesia
              </p>
            </div>

            <div>
              <h3 class="text-impost-primary font-bold text-sm uppercase mb-2">NPWP Badan</h3>
              <p class="text-xl md:text-2xl text-white font-mono font-bold tracking-wide">1000 0000 0040 7829</p>
              <p class="text-sm text-white mt-2">KPP Pratama Balikpapan Timur</p>
            </div>

            <div class="md:col-span-2 pt-6 border-t border-white/5">
              <h3 class="text-impost-primary text-sm font-bold uppercase mb-2">Alamat Terdaftar</h3>
              <p class="text-white text-md leading-tight font-medium">
                Jalan Sei Wain No.01 RT. 036, Kel. Karang Joang, <br class="hidden md:block">
                Kec. Balikpapan Utara, Kota Balikpapan, <br class="hidden md:block">
                Kalimantan Timur 76127
              </p>
            </div>
          </div>
        </div>
      </div>

      {{-- KBLI Section (Bidang Usaha) --}}
      <div>
        <h3 class="text-xl font-bold text-white mb-6 pl-2 border-l-4 border-impost-primary">Klasifikasi Baku Lapangan
          Usaha Indonesia (KBLI)</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

          <div class="bg-[#111] p-6 rounded-lg">
            <span
              class="text-impost-primary font-mono text-sm font-bold bg-[#1a1a1a] px-2 py-1 rounded mb-3 inline-block">74130</span>
            <h4 class="text-white font-medium mb-2">Desain Komunikasi Visual</h4>
            <p class="text-white text-sm leading-relaxed">
              Aktivitas desain grafis, identitas visual, dan komunikasi digital.
            </p>
          </div>

          <div class="bg-[#111] p-6 rounded-lg">
            <span
              class="text-impost-primary font-mono text-sm font-bold bg-[#1a1a1a] px-2 py-1 rounded mb-3 inline-block">82302</span>
            <h4 class="text-white font-medium mb-2">Event Organizer (Special Event)</h4>
            <p class="text-white text-sm leading-relaxed">
              Penyelenggaraan event khusus, festival, dan acara korporat.
            </p>
          </div>

          <div class="bg-[#111] p-6 rounded-lg">
            <span
              class="text-impost-primary font-mono text-sm font-bold bg-[#1a1a1a] px-2 py-1 rounded mb-3 inline-block">74149</span>
            <h4 class="text-white font-medium mb-2">Aktivitas Desain Konten Kreatif</h4>
            <p class="text-white text-sm leading-relaxed">
              Perencanaan dan pembuatan konten kreatif digital dan multimedia.
            </p>
          </div>

          <div class="bg-[#111] p-6 rounded-lg">
            <span
              class="text-impost-primary font-mono text-sm font-bold bg-[#1a1a1a] px-2 py-1 rounded mb-3 inline-block">74142</span>
            <h4 class="text-white font-medium mb-2">Aktivitas Desain Konten Game</h4>
            <p class="text-white text-sm leading-relaxed">
              Perancangan elemen visual, logika, dan aset permainan digital.
            </p>
          </div>

          <div class="bg-[#111] p-6 rounded-lg">
            <span
              class="text-impost-primary font-mono text-sm font-bold bg-[#1a1a1a] px-2 py-1 rounded mb-3 inline-block">46511</span>
            <h4 class="text-white font-medium mb-2">Perdagangan Besar Komputer</h4>
            <p class="text-white text-sm leading-relaxed">
              Distribusi perangkat keras komputer dan perlengkapannya.
            </p>
          </div>

          <div class="bg-[#111] p-6 rounded-lg">
            <span
              class="text-impost-primary font-mono text-sm font-bold bg-[#1a1a1a] px-2 py-1 rounded mb-3 inline-block">56210</span>
            <h4 class="text-white font-medium mb-2">Jasa Boga Event (Catering)</h4>
            <p class="text-white text-sm leading-relaxed">
              Penyediaan layanan konsumsi untuk event tertentu.
            </p>
          </div>

        </div>
      </div>

    </div>
  </main>
@endsection
