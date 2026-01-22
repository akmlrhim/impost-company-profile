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

      {{-- Brand Story  --}}
      <div class="py-16 sm:py-24 bg-[#0a0a0a] overflow-hidden min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

          <div class="max-w-3xl mx-auto text-center mb-16 sm:mb-24">
            <span
              class="inline-block py-1 px-3 rounded-full bg-white/5 border border-white/10 text-xs sm:text-sm font-semibold tracking-widest text-impost-primary uppercase mb-4">
              Our Journey
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-tight">
              The Impost Way
            </h1>
            <div
              class="mt-6 mx-auto w-16 h-1 bg-impost-primary rounded-full shadow-[0_0_15px_rgba(var(--impost-primary-rgb),0.5)]">
            </div>
            <p class="mt-6 text-gray-400 text-sm sm:text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
              Sebuah perjalanan dari menetapkan arah hingga menciptakan dampak nyata.
            </p>
          </div>

          <div class="relative max-w-6xl mx-auto">

            <div
              class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-gray-800 via-gray-700 to-gray-800 transform -translate-x-1/2">
            </div>

            <div class="space-y-12 md:space-y-0">

              <div class="relative group md:grid md:grid-cols-2 md:items-center md:gap-12">
                <div
                  class="absolute left-8 md:left-1/2 w-4 h-4 bg-[#0a0a0a] border-2 border-impost-primary rounded-full transform -translate-x-1/2 z-10 shadow-[0_0_15px_rgba(var(--impost-primary-rgb),0.6)] md:group-hover:scale-125 transition-transform duration-300">
                  <div class="absolute inset-0 bg-impost-primary rounded-full opacity-50 animate-ping"></div>
                </div>

                <div class="pl-20 md:pl-0 md:pr-12 md:text-right">
                  <div
                    class="p-6 rounded-2xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors duration-300">
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-impost-primary transition-colors">One
                      Direction</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                      Impost Media lahir dari satu arah yang jelas: <span
                        class="text-impost-primary font-medium">Pertumbuhan yang dibentuk</span>.
                      Kami tidak bergerak reaktif atau tergoda tren sesaat. Fokus kami adalah membantu bisnis melangkah
                      lebih jauh dengan tujuan terstruktur.
                    </p>
                  </div>
                </div>
                <div class="hidden md:block"></div>
              </div>

              <div class="relative group md:grid md:grid-cols-2 md:items-center md:gap-12">
                <div
                  class="absolute left-8 md:left-1/2 w-4 h-4 bg-[#0a0a0a] border-2 border-gray-600 group-hover:border-impost-primary rounded-full transform -translate-x-1/2 z-10 transition-colors duration-300 md:group-hover:scale-125">
                </div>

                <div class="hidden md:block"></div>

                <div class="pl-20 md:pl-12 md:text-left">
                  <div
                    class="p-6 rounded-2xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors duration-300">
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-impost-primary transition-colors">Built
                      as a System</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                      Kami tidak bekerja sebagai individu, tetapi sebagai <span
                        class="text-white font-medium">sistem</span>.
                      Alat yang menghubungkan riset, strategi, dan eksekusi dalam satu alur kerja rapi untuk meminimalisir
                      <em>trial-error</em> yang membebani bisnis.
                    </p>
                  </div>
                </div>
              </div>

              <div class="relative group md:grid md:grid-cols-2 md:items-center md:gap-12">
                <div
                  class="absolute left-8 md:left-1/2 w-4 h-4 bg-[#0a0a0a] border-2 border-gray-600 group-hover:border-impost-primary rounded-full transform -translate-x-1/2 z-10 transition-colors duration-300 md:group-hover:scale-125">
                </div>

                <div class="pl-20 md:pl-0 md:pr-12 md:text-right">
                  <div
                    class="p-6 rounded-2xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors duration-300">
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-impost-primary transition-colors">
                      Consistent Positioning</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                      Brand kuat dibangun dari posisi yang konsisten. Framework kami menjaga pesan Anda tetap <span
                        class="text-white font-medium">jelas dan relevan</span>.
                      Setiap output memperkuat persepsi, setiap campaign memiliki arah.
                    </p>
                  </div>
                </div>
                <div class="hidden md:block"></div>
              </div>

              <div class="relative group md:grid md:grid-cols-2 md:items-center md:gap-12">
                <div
                  class="absolute left-8 md:left-1/2 w-4 h-4 bg-[#0a0a0a] border-2 border-gray-600 group-hover:border-impost-primary rounded-full transform -translate-x-1/2 z-10 transition-colors duration-300 md:group-hover:scale-125">
                </div>

                <div class="hidden md:block"></div>

                <div class="pl-20 md:pl-12 md:text-left">
                  <div
                    class="p-6 rounded-2xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors duration-300">
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-impost-primary transition-colors">
                      Data-Driven Approach</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                      Bukan asumsi, tapi data. Kami menggunakan data sebagai <span class="text-white font-medium">bahasa
                        bisnis</span>
                      untuk membaca perilaku market dan mengukur performa. Setiap langkah dapat dipertanggungjawabkan.
                    </p>
                  </div>
                </div>
              </div>

              <div class="relative group md:grid md:grid-cols-2 md:items-center md:gap-12">
                <div
                  class="absolute left-8 md:left-1/2 w-4 h-4 bg-[#0a0a0a] border-2 border-gray-600 group-hover:border-impost-primary rounded-full transform -translate-x-1/2 z-10 transition-colors duration-300 md:group-hover:scale-125">
                </div>

                <div class="pl-20 md:pl-0 md:pr-12 md:text-right">
                  <div
                    class="p-6 rounded-2xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors duration-300">
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-impost-primary transition-colors">Your
                      Expert Partner</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                      Lebih dari sekadar pembuat konten, kami adalah <span class="text-white font-medium">partner
                        ahli</span>.
                      Kami bekerja secara kolaboratif, adaptif, dan siap berbagi risiko karena kami percaya pada sistem
                      yang kami bangun.
                    </p>
                  </div>
                </div>
                <div class="hidden md:block"></div>
              </div>

            </div>

            <div class="relative mt-20 md:mt-32 bg-[#0a0a0a] p-6 rounded-md shadow-lg border border-white/5">
              <div class="flex flex-col items-center justify-center text-center relative z-10 px-4">
                <div
                  class="w-16 h-16 rounded-full bg-impost-primary flex items-center justify-center shadow-[0_0_20px_rgba(var(--impost-primary-rgb),0.5)] mb-6 border-8 border-[#0a0a0a] transform hover:scale-110 transition-transform duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#0a0a0a]" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                      d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
                <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">Insight to Impact</h3>
                <p class="text-gray-300 text-sm md:text-base leading-relaxed max-w-2xl mx-auto">
                  Muara dari semuanya adalah dampak. Insight diolah menjadi strategi, strategi menjadi aksi,
                  dan aksi menghasilkan <span class="text-impost-primary font-bold">pertumbuhan bisnis yang nyata</span>.
                </p>
              </div>
            </div>

          </div>
        </div>
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
