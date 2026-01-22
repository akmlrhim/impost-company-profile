@extends('layouts.public')

@section('content')
  <div class="pt-20 sm:pt-24 md:pt-28 antialiased bg-[#0a0a0a]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12 md:py-14">
      <div class="max-w-3xl mx-auto text-center mb-10 sm:mb-12 md:mb-14">

        <span class="text-xs sm:text-sm md:text-base font-semibold tracking-widest text-impost-primary uppercase">
          Tentang Kami
        </span>
        <h1 class="mt-3 md:mt-4 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
          CV. Impost Media Indonesia
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
              class="font-header text-xl sm:text-xl md:text-2xl font-semibold text-impost-primary mb-3 sm:mb-4 flex items-center gap-2">
              Visi
            </h3>
            <p class="text-gray-300 leading-relaxed text-sm sm:text-base">
              Menjadi mitra multiservice terpercaya di Indonesia melalui layanan
              bisnis, event, dan pengadaan yang profesional serta berorientasi pada hasil.
            </p>
          </div>

          <div class="bg-gray-900/60 border border-gray-800 rounded-xl md:rounded-2xl p-6 sm:p-7 md:p-8">
            <h3
              class="font-header text-xl sm:text-xl md:text-2xl font-semibold text-impost-primary mb-3 sm:mb-4 flex items-center gap-2">
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
      <div class="text-center mb-4 sm:mb-6 md:mb-8">
        <span
          class="text-sm sm:text-md md:text-lg lg:text-xl font-semibold tracking-widest text-impost-primary uppercase">
          our team
        </span>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    function teamSlider(totalItems) {
      return {
        page: 0,
        perPage: 1,
        totalItems,
        maxPage: 0,
        itemWidth: 'w-full',

        init() {
          this.calculate()
        },

        onResize() {
          this.calculate()
        },

        calculate() {
          const width = window.innerWidth

          if (width >= 1024) {
            this.perPage = 4
            this.itemWidth = 'w-1/4'
          } else if (width >= 640) {
            this.perPage = 2
            this.itemWidth = 'w-1/2'
          } else {
            this.perPage = 1
            this.itemWidth = 'w-full'
          }

          this.maxPage = Math.max(
            Math.ceil(this.totalItems / this.perPage) - 1,
            0
          )

          if (this.page > this.maxPage) {
            this.page = this.maxPage
          }
        },

        next() {
          if (this.page < this.maxPage) this.page++
        },

        prev() {
          if (this.page > 0) this.page--
        }
      }
    }
  </script>
@endpush
