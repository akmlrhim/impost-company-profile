@extends('layouts.public')

@section('content')
  <div class="pt-20 md:pt-16">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-16">
      <div class="max-w-3xl mx-auto text-center mb-8 md:mb-14">

        <span class="text-sm sm:text-base md:text-lg font-semibold tracking-widest text-impost-primary uppercase">
          Tentang Kami
        </span>
        <h1 class="mt-2 md:mt-3 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
          Impost Media Indonesia
        </h1>
        <div class="mt-4 md:mt-6 mx-auto w-12 md:w-16 h-1 bg-impost-primary rounded-full"></div>
      </div>

      <div class="max-w-4xl mx-auto text-center">
        <p class="text-gray-300 text-xs sm:text-sm md:text-base leading-relaxed">
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

        <p class="mt-4 md:mt-6 text-gray-400 text-xs sm:text-sm md:text-base leading-relaxed">
          Melalui pendekatan
          <span class="text-white font-medium">performance-based advertising</span>
          yang terintegrasi, setiap kampanye dirancang untuk memberikan hasil yang nyata,
          efisien, dan berorientasi pada konversi, dengan
          <span class="text-impost-primary font-medium">
            jaminan uang kembali (money-back guarantee)
          </span>.
        </p>
      </div>

      <div class="mt-10 md:mt-16 max-w-5xl mx-auto">
        <div class="text-center mb-6 md:mb-10">
          <span class="text-sm sm:text-base md:text-lg font-semibold tracking-widest text-impost-primary uppercase">
            Visi dan Misi
          </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10">
          <div class="bg-gray-900/60 border border-gray-800 rounded-xl md:rounded-2xl p-5 md:p-8">
            <h3
              class="text-lg sm:text-xl md:text-2xl font-semibold text-impost-primary mb-3 md:mb-4 flex items-center gap-2">
              Visi
            </h3>
            <p class="text-gray-300 leading-relaxed text-xs sm:text-sm">
              Menjadi mitra multiservice terpercaya di Indonesia melalui layanan
              bisnis, event, dan pengadaan yang profesional serta berorientasi pada hasil.
            </p>
          </div>

          <div class="bg-gray-900/60 border border-gray-800 rounded-xl md:rounded-2xl p-5 md:p-8">
            <h3
              class="text-lg sm:text-xl md:text-2xl font-semibold text-impost-primary mb-3 md:mb-4 flex items-center gap-2">
              Misi
            </h3>
            <ol
              class="space-y-2 md:space-y-3 text-xs sm:text-sm text-gray-300 leading-relaxed list-decimal list-outside pl-4 md:pl-5">
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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
      <div class="text-center mb-6 md:mb-10">
        <span class="text-sm sm:text-base md:text-lg font-semibold tracking-widest text-impost-primary uppercase">
          our team
        </span>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 md:mb-16">

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        <div
          class="bg-linear-to-b from-impost-primary via-impost-secondary to-impost-fourth rounded-md shadow-sm border overflow-hidden">
          <div class="p-4 md:p-6">
            <div
              class="w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 mx-auto mb-3 md:mb-4 rounded-full overflow-hidden border-2 border-white">
              <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&h=200&fit=crop"
                alt="Sarah Johnson" class="w-full h-full object-cover">
            </div>
            <div class="text-center">
              <h3 class="text-base sm:text-lg font-bold text-white">Sarah Johnson</h3>
              <p class="text-xs text-white font-medium mb-2 md:mb-3">Chief Executive Officer</p>
              <div class="flex justify-center gap-2">
                <a href="#"
                  class="text-impost-fourth px-2 py-2 rounded-full hover:text-impost-third bg-white transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="sm:w-4.5 sm:h-4.5">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                    <rect width="4" height="12" x="2" y="9" />
                    <circle cx="4" cy="4" r="2" />
                  </svg>
                </a>
                <a href="#"
                  class="text-impost-fourth px-2 py-2 rounded-full hover:text-impost-third bg-white transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="sm:w-4.5 sm:h-4.5">
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
