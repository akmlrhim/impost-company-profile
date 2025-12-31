@extends('layouts.public')

@section('content')
  <div class="pt-24 sm:pt-28 md:pt-32">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16">
      <div class="max-w-3xl mx-auto text-center mb-10 sm:mb-12 md:mb-14">

        <span class="text-xs sm:text-sm md:text-base font-semibold tracking-widest text-impost-primary uppercase">
          Tentang Kami
        </span>
        <h1 class="mt-3 md:mt-4 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
          Impost Media Indonesia
        </h1>
        <div class="mt-4 md:mt-6 mx-auto w-12 md:w-16 h-1 bg-impost-primary rounded-full"></div>
      </div>

      <div class="max-w-4xl mx-auto text-center px-2">
        <p class="text-gray-300 text-sm sm:text-base md:text-lg leading-relaxed">
          <span class="font-semibold text-white">CV Impost Media Indonesia</span>, atau dikenal sebagai
          <span class="font-semibold text-white">Impost Media</span>, adalah perusahaan multiservice dengan
          fokus sebagai
          <span class="text-impost-primary font-medium">
            All in One Integrated Digital Marketing Agency
          </span>.
          Berpusat di Banjarbaru, Kalimantan Selatan, kami mengedepankan pemasaran berbasis konten,
          storytelling, serta strategi iklan digital yang terukur untuk membantu bisnis membangun identitas
          merek yang kuat, meningkatkan visibilitas, dan mendorong pertumbuhan omset secara berkelanjutan.
        </p>

        <p class="mt-5 sm:mt-6 md:mt-8 text-gray-400 text-sm sm:text-base md:text-lg leading-relaxed">
          Melalui pendekatan
          <span class="text-white font-medium">performance-based advertising</span>
          yang terintegrasi, setiap kampanye dirancang untuk memberikan hasil yang nyata,
          efisien, dan berorientasi pada konversi, dengan
          <span class="text-impost-primary font-medium">
            jaminan uang kembali (money-back guarantee)
          </span>.
        </p>
      </div>

      <div class="mt-12 sm:mt-16 md:mt-20 max-w-5xl mx-auto">
        <div class="text-center mb-8 sm:mb-10 md:mb-12">
          <span class="text-xs sm:text-sm md:text-base font-semibold tracking-widest text-impost-primary uppercase">
            Visi dan Misi
          </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 md:gap-8 lg:gap-10">
          <div class="bg-gray-900/60 border border-gray-800 rounded-xl md:rounded-2xl p-6 sm:p-7 md:p-8">
            <h3
              class="text-xl sm:text-xl md:text-2xl font-semibold text-impost-primary mb-3 sm:mb-4 flex items-center gap-2">
              Visi
            </h3>
            <p class="text-gray-300 leading-relaxed text-sm sm:text-base">
              Menjadi mitra multiservice terpercaya di Indonesia melalui layanan
              bisnis, event, dan pengadaan yang profesional serta berorientasi pada hasil.
            </p>
          </div>

          <div class="bg-gray-900/60 border border-gray-800 rounded-xl md:rounded-2xl p-6 sm:p-7 md:p-8">
            <h3
              class="text-xl sm:text-xl md:text-2xl font-semibold text-impost-primary mb-3 sm:mb-4 flex items-center gap-2">
              Misi
            </h3>
            <ol
              class="space-y-2.5 sm:space-y-3 md:space-y-3.5 text-sm sm:text-base text-gray-300 leading-relaxed list-decimal list-outside pl-4 md:pl-5">
              <li>
                Memberikan layanan digital marketing berbasis data yang membantu brand
                tumbuh, dikenal luas, dan meningkatkan konversi secara nyata.
              </li>
              <li>
                Menyediakan solusi event organizer, hiburan profesional, hingga music
                performance & production untuk mendukung berbagai kebutuhan klien.
              </li>
              <li>
                Mendukung kebutuhan acara dan instansi melalui layanan pengadaan barang
                dan jasa, seperti katering, alat tulis kantor, serta perlengkapan
                pendukung lainnya dengan kualitas yang terjamin dan tepat guna.
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10 md:py-12">
      <div class="text-center mb-8 sm:mb-10 md:mb-12">
        <span class="text-xs sm:text-sm md:text-base font-semibold tracking-widest text-impost-primary uppercase">
          our team
        </span>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 sm:pb-16 md:pb-20">

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">
        <div
          class="bg-gradient-to-b from-impost-primary via-impost-secondary to-impost-fourth rounded-xl shadow-lg border border-white/10 overflow-hidden hover:shadow-xl hover:scale-105 transition-all duration-300">
          <div class="p-5 sm:p-6 md:p-7">
            <div
              class="w-32 h-32 sm:w-36 sm:h-36 md:w-40 md:h-40 mx-auto mb-4 md:mb-5 rounded-full overflow-hidden border-4 border-white shadow-lg">
              <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&h=200&fit=crop"
                alt="Sarah Johnson" class="w-full h-full object-cover">
            </div>
            <div class="text-center">
              <h3 class="text-lg sm:text-xl font-bold text-white">Sarah Johnson</h3>
              <p class="text-xs sm:text-sm text-white/90 font-medium mb-3 md:mb-4">Chief Executive Officer</p>
              <div class="flex justify-center gap-2.5">
                <a href="#"
                  class="text-impost-fourth p-2.5 rounded-full hover:text-impost-third bg-white transition-all duration-300 hover:scale-110 shadow-md">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                    <rect width="4" height="12" x="2" y="9" />
                    <circle cx="4" cy="4" r="2" />
                  </svg>
                </a>
                <a href="#"
                  class="text-impost-fourth p-2.5 rounded-full hover:text-impost-third bg-white transition-all duration-300 hover:scale-110 shadow-md">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
