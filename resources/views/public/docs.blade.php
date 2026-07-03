@extends('layouts.public')

@section('title', 'Company Profile & Portfolio | Impost Media')
@section('meta_description',
  'Eksplorasi company profile dan portfolio terbaik Impost Media. Pelajari identitas
  perusahaan, layanan, dan karya nyata yang telah kami hasilkan untuk klien di Kalimantan Selatan.')

@section('content')
  <section class="relative w-full h-[400px] md:h-[560px] overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('img/pages/docs.webp') }}');">
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-impost-fifth/80 via-impost-fifth/40 to-transparent"></div>
    <div class="absolute inset-0 z-10 bg-impost-fifth/30"></div>

    <div
      class="relative z-20 h-full flex flex-col justify-end max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-6 sm:pb-8 md:pb-14">

      <div class="max-w-2xl flex flex-col gap-2 sm:gap-3">

        <nav class="flex mb-1" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="/"
                class="inline-flex items-center text-[9px] sm:text-[10px] md:text-[11px] font-medium text-white/70 hover:text-white transition-colors duration-200">
                Home
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center text-white">
                <svg class="rtl:rotate-180 w-2.5 h-2.5 sm:w-3 sm:h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-[9px] sm:text-[10px] md:text-[11px] font-medium md:ms-2">Media Resources</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-xl md:text-5xl font-bold text-white leading-tight">
          Dokumen
        </h1>
        <p class="text-white text-xs md:text-base leading-relaxed max-w-xl text-justify">
          Eksplorasi visi, misi, dan karya terbaik IMPOST MEDIA melalui dokumen interaktif di bawah ini.
        </p>
      </div>
    </div>
  </section>

  <div class="antialiased bg-impost-fifth">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">
      <div class="mb-8 sm:mb-10 md:mb-12 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">

          <div class="bg-impost-dark-850 rounded-xl overflow-hidden flex flex-col h-full border border-white/5">
            <div class="px-5 py-3.5 bg-impost-dark-700 border-b border-white/5">
              <h3 class="text-xs md:text-sm lg:text-base font-bold text-impost-primary tracking-wide">Company Profile</h3>
            </div>

            <div class="relative w-full aspect-[16/9] bg-black">
              <iframe allowfullscreen="allowfullscreen" scrolling="no" class="absolute inset-0 w-full h-full border-0"
                src="https://heyzine.com/flip-book/70b2ce8250.html">
              </iframe>
            </div>

            <div class="p-5 flex-1 flex flex-col justify-between">
              <p class="text-white text-xs md:text-base mb-4 leading-relaxed">
                Pelajari identitas perusahaan, struktur tim, serta layanan profesional yang kami tawarkan secara mendalam.
              </p>
              <a href="https://heyzine.com/flip-book/70b2ce8250.html" target="_blank"
                class="block w-full text-center py-2 text-sm md:text-base font-bold text-black bg-impost-primary rounded hover:bg-opacity-90 transition-opacity">
                Buka Layar Penuh
              </a>
            </div>
          </div>

          <div class="bg-impost-dark-850 rounded-xl overflow-hidden flex flex-col h-full border border-white/5">
            <div class="px-5 py-3.5 bg-impost-dark-700 border-b border-white/5">
              <h3 class="text-xs md:text-sm lg:text-base font-bold text-impost-primary tracking-wide">Portfolio</h3>
            </div>

            <div class="relative w-full aspect-[16/9] bg-black">
              <iframe allowfullscreen="allowfullscreen" scrolling="no" class="absolute inset-0 w-full h-full border-0"
                src="https://heyzine.com/flip-book/caea1a35c5.html">
              </iframe>
            </div>

            <div class="p-5 flex-1 flex flex-col justify-between">
              <p class="text-white text-xs md:text-base mb-4 leading-relaxed">
                Lihat koleksi proyek terbaik yang telah kami selesaikan dan bagaimana kami membantu klien berkembang.
              </p>
              <a href="https://heyzine.com/flip-book/caea1a35c5.html" target="_blank"
                class="block w-full text-center py-2 text-sm md:text-base font-bold text-black bg-impost-primary rounded hover:bg-opacity-90 transition-opacity">
                Buka Layar Penuh
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
