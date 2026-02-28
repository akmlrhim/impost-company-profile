@extends('layouts.public')

section('title', 'Company Profile & Portfolio | Impost Media')
@section('meta_description',
  'Eksplorasi company profile dan portfolio terbaik Impost Media. Pelajari identitas
  perusahaan, layanan, dan karya nyata yang telah kami hasilkan untuk klien di Kalimantan Selatan.')

@section('content')
  <main class="pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 antialiased min-h-screen">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

      <div class="mb-10 text-center">
        <h1 class="text-2xl md:text-5xl font-bold mb-4 text-impost-primary tracking-tight">
          {{ $title }}
        </h1>
        <p class="text-white text-xs md:text-base max-w-2xl mx-auto font-light leading-relaxed">
          Eksplorasi visi, misi, dan karya terbaik IMPOST MEDIA melalui dokumen interaktif di bawah ini.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <div class="bg-[#111] rounded-xl overflow-hidden flex flex-col h-full">
          <div class="px-6 py-4 bg-[#161616] border-b border-white/5">
            <h3 class="text-base md:text-lg font-medium text-impost-primary tracking-wide">Company Profile</h3>
          </div>

          <div class="relative w-full aspect-[16/9] bg-black">
            <iframe allowfullscreen="allowfullscreen" scrolling="no" class="absolute inset-0 w-full h-full border-0"
              src="https://heyzine.com/flip-book/caea1a35c5.html">
            </iframe>
          </div>

          <div class="p-6 flex-1 flex flex-col justify-between">
            <p class="text-white text-xs md:text-sm mb-5 leading-relaxed">
              Pelajari identitas perusahaan, struktur tim, serta layanan profesional yang kami tawarkan secara mendalam.
            </p>
            <a href="https://heyzine.com/flip-book/caea1a35c5.html" target="_blank"
              class="block w-full text-center py-3 text-xs md:text-sm font-bold text-black bg-impost-primary rounded hover:bg-opacity-90 transition-opacity">
              Buka Layar Penuh
            </a>
          </div>
        </div>

        <div class="bg-[#111] rounded-xl overflow-hidden flex flex-col h-full">
          <div class="px-6 py-4 bg-[#161616] border-b border-white/5">
            <h3 class="text-base md:text-lg font-medium text-impost-primary tracking-wide">Portfolio</h3>
          </div>

          <div class="relative w-full aspect-[16/9] bg-black">
            <iframe allowfullscreen="allowfullscreen" scrolling="no" class="absolute inset-0 w-full h-full border-0"
              src="https://heyzine.com/flip-book/70b2ce8250.html">
            </iframe>
          </div>

          <div class="p-6 flex-1 flex flex-col justify-between">
            <p class="text-white text-xs md:text-sm mb-5 leading-relaxed">
              Lihat koleksi proyek terbaik yang telah kami selesaikan dan bagaimana kami membantu klien berkembang.
            </p>
            <a href="https://heyzine.com/flip-book/70b2ce8250.html" target="_blank"
              class="block w-full text-center py-3 text-xs md:text-sm font-bold text-black bg-impost-primary rounded hover:bg-opacity-90 transition-opacity">
              Buka Layar Penuh
            </a>
          </div>
        </div>

      </div>

    </div>
  </main>
@endsection
