@extends('layouts.public')

@section('title', 'Legalitas Perusahaan | Impost Media')
@section('meta_description',
  'Informasi legalitas resmi CV. Impost Media Indonesia, NIB, NPWP, dan KBLI terdaftar di
  sistem OSS Republik Indonesia. Transparan, terpercaya, dan profesional.')

@section('content')
  <section class="relative w-full h-[400px] md:h-[560px] overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('img/pages/legal.webp') }}');">
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-impost-fifth/80 via-impost-fifth/40 to-transparent"></div>
    <div class="absolute inset-0 z-10 bg-impost-fifth/30"></div>

    <div
      class="relative z-20 h-full flex flex-col justify-end max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-6 sm:pb-8 md:pb-14">

      <div class="max-w-2xl flex flex-col gap-3 sm:gap-4">

        <nav class="flex mb-1" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="/"
                class="inline-flex items-center text-xs sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200">
                Home
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Legalitas Perusahaan</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
          Legalitas Perusahaan
        </h1>
        <p class="text-white/80 text-sm md:text-base lg:text-lg leading-relaxed max-w-xl text-justify">
          Integritas dan transparansi adalah fondasi kami. Berikut adalah data legalitas resmi CV. Impost Media Indonesia
          yang terdaftar di sistem pemerintahan Republik Indonesia.
        </p>
      </div>

    </div>

  </section>


  <div class="antialiased bg-impost-fifth">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">

      <div class="mb-8 sm:mb-10 md:mb-12 max-w-7xl mx-auto">

        <div class="bg-[#111] rounded-lg sm:rounded-xl overflow-hidden mb-8 sm:mb-12">
          <div class="px-4 sm:px-6 md:px-8 py-4 sm:py-6 bg-[#161616] border-b border-white/5">
            <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-white uppercase">CV. IMPOST MEDIA INDONESIA</h2>
            <p class="text-gray-400 text-xs md:text-sm mt-1">Badan Usaha Resmi Terdaftar</p>
          </div>

          <div class="p-4 sm:p-6 md:p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 sm:gap-y-8 gap-x-8 sm:gap-x-12">

              <div>
                <h3 class="text-impost-primary font-bold text-[10px] md:text-xs uppercase mb-1 sm:mb-2">Nomor Induk
                  Berusaha (NIB)</h3>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl font-mono font-bold text-white tracking-wide">
                  0303250028303</p>
                <p class="text-xs text-green-500 mt-1 sm:mt-2 flex items-center">
                  <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                      clip-rule="evenodd"></path>
                  </svg>
                  Terbit: OSS Indonesia
                </p>
              </div>

              <div>
                <h3 class="text-impost-primary font-bold text-[10px] md:text-xs uppercase mb-1 sm:mb-2">NPWP Badan</h3>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-white font-mono font-bold tracking-wide">1000
                  0000 0040 7829</p>
                <p class="text-xs text-gray-400 mt-1 sm:mt-2">KPP Pratama Balikpapan Timur</p>
              </div>

              <div class="md:col-span-2 pt-4 sm:pt-6 border-t border-white/5">
                <h3 class="text-impost-primary text-[10px] md:text-xs font-bold uppercase mb-1 sm:mb-2">Alamat Terdaftar
                </h3>
                <p class="text-gray-300 text-xs md:text-sm lg:text-base leading-relaxed font-medium">
                  Jalan Sei Wain No.01 RT. 036, Kel. Karang Joang,
                  Kec. Balikpapan Utara, Kota Balikpapan,
                  Kalimantan Timur 76127
                </p>
              </div>
            </div>
          </div>
        </div>

        <div>
          <h3
            class="text-xl md:text-2xl lg:text-3xl font-bold text-white mb-4 sm:mb-6 pl-2 sm:pl-3 border-l-2 sm:border-l-4 border-impost-primary leading-tight">
            Klasifikasi Baku Lapangan Usaha Indonesia (KBLI)
          </h3>

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">

            <div class="bg-[#111] p-4 sm:p-5 md:p-6 rounded-lg">
              <span
                class="text-impost-primary font-mono text-xs font-bold bg-[#1a1a1a] px-2 py-0.5 sm:py-1 rounded mb-2 sm:mb-3 inline-block">74130</span>
              <h4 class="text-white font-medium text-sm md:text-base lg:text-lg mb-1 sm:mb-2 leading-tight">Desain
                Komunikasi Visual</h4>
              <p class="text-gray-400 text-xs md:text-sm leading-relaxed">
                Aktivitas desain grafis, identitas visual, dan komunikasi digital.
              </p>
            </div>

            <div class="bg-[#111] p-4 sm:p-5 md:p-6 rounded-lg">
              <span
                class="text-impost-primary font-mono text-xs font-bold bg-[#1a1a1a] px-2 py-0.5 sm:py-1 rounded mb-2 sm:mb-3 inline-block">82302</span>
              <h4 class="text-white font-medium text-sm md:text-base lg:text-lg mb-1 sm:mb-2 leading-tight">Event
                Organizer (Special Event)</h4>
              <p class="text-gray-400 text-xs md:text-sm leading-relaxed">
                Penyelenggaraan event khusus, festival, dan acara korporat.
              </p>
            </div>

            <div class="bg-[#111] p-4 sm:p-5 md:p-6 rounded-lg">
              <span
                class="text-impost-primary font-mono text-xs font-bold bg-[#1a1a1a] px-2 py-0.5 sm:py-1 rounded mb-2 sm:mb-3 inline-block">74149</span>
              <h4 class="text-white font-medium text-sm md:text-base lg:text-lg mb-1 sm:mb-2 leading-tight">Aktivitas
                Desain Konten Kreatif</h4>
              <p class="text-gray-400 text-xs md:text-sm leading-relaxed">
                Perencanaan dan pembuatan konten kreatif digital dan multimedia.
              </p>
            </div>

            <div class="bg-[#111] p-4 sm:p-5 md:p-6 rounded-lg">
              <span
                class="text-impost-primary font-mono text-xs font-bold bg-[#1a1a1a] px-2 py-0.5 sm:py-1 rounded mb-2 sm:mb-3 inline-block">74142</span>
              <h4 class="text-white font-medium text-sm md:text-base lg:text-lg mb-1 sm:mb-2 leading-tight">Aktivitas
                Desain Konten Game</h4>
              <p class="text-gray-400 text-xs md:text-sm leading-relaxed">
                Perancangan elemen visual, logika, dan aset permainan digital.
              </p>
            </div>

            <div class="bg-[#111] p-4 sm:p-5 md:p-6 rounded-lg">
              <span
                class="text-impost-primary font-mono text-xs font-bold bg-[#1a1a1a] px-2 py-0.5 sm:py-1 rounded mb-2 sm:mb-3 inline-block">46511</span>
              <h4 class="text-white font-medium text-sm md:text-base lg:text-lg mb-1 sm:mb-2 leading-tight">Perdagangan
                Besar Komputer</h4>
              <p class="text-gray-400 text-xs md:text-sm leading-relaxed">
                Distribus perangkat keras komputer dan perlengkapannya.
              </p>
            </div>

            <div class="bg-[#111] p-4 sm:p-5 md:p-6 rounded-lg">
              <span
                class="text-impost-primary font-mono text-xs font-bold bg-[#1a1a1a] px-2 py-0.5 sm:py-1 rounded mb-2 sm:mb-3 inline-block">56210</span>
              <h4 class="text-white font-medium text-sm md:text-base lg:text-lg mb-1 sm:mb-2 leading-tight">Jasa Boga
                Event (Catering)</h4>
              <p class="text-gray-400 text-xs md:text-sm leading-relaxed">
                Penyediaan layanan konsumsi untuk event tertentu.
              </p>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
