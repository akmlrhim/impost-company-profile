@extends('layouts.public')

@section('title', 'Tentang Kami | Impost Media')
@section('meta_description',
  'CV Impost Media Indonesia adalah All in One Integrated Digital Marketing Agency berpusat
  di Banjarbaru, Kalimantan Selatan. Kami hadir dengan pendekatan data-driven dan jaminan uang kembali.')

@section('content')
  <div class="pt-16 sm:pt-20 md:pt-24 antialiased bg-[#0a0a0a]">

    {{-- Hero Section --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">
      <div class="max-w-3xl mx-auto text-center mb-8 sm:mb-10 md:mb-12">
        <span class="text-[10px] sm:text-xs md:text-sm font-semibold tracking-widest text-impost-primary uppercase">
          Tentang Kami
        </span>
        <h1 class="mt-2 sm:mt-3 text-xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
          CV. Impost Media Indonesia
        </h1>
      </div>

      {{-- Video --}}
      <div class="mb-10 sm:mb-14 md:mb-16 max-w-4xl mx-auto">
        <div
          class="relative w-full aspect-video rounded-lg sm:rounded-xl md:rounded-2xl overflow-hidden border border-gray-800 shadow-lg">
          <script src="https://fast.wistia.com/player.js" async></script>
          <script src="https://fast.wistia.com/embed/59ntht7a1b.js" async type="module"></script>
          <style>wistia-player[media-id='59ntht7a1b']:not(:defined) { background: center / contain no-repeat
          url('https://fast.wistia.com/embed/medias/59ntht7a1b/swatch'); display: block; filter: blur(5px);
          padding-top:56.25%; }</style>
          <wistia-player media-id="59ntht7a1b" aspect="1.7777777777777777"></wistia-player>
        </div>
      </div>

      {{-- Intro Text --}}
      <div class="max-w-4xl mx-auto text-center px-2 sm:px-4">
        <p class="text-white text-xs sm:text-sm md:text-base lg:text-lg leading-relaxed">
          CV Impost Media Indonesia, atau dikenal sebagai Impost Media, adalah perusahaan multiservice dengan fokus
          sebagai All in One Integrated Digital Marketing Agency. Berpusat di Banjarbaru, Kalimantan Selatan, kami
          mengedepankan pemasaran berbasis konten, storytelling, serta strategi iklan digital yang terukur untuk membantu
          bisnis membangun identitas merek yang kuat, meningkatkan visibilitas, dan mendorong pertumbuhan omset secara
          berkelanjutan.

        </p>

        <p class="mt-4 sm:mt-5 md:mt-6 text-white text-xs sm:text-sm md:text-base lg:text-lg leading-relaxed">
          Melalui pendekatan performance-based advertising yang terintegrasi, setiap kampanye dirancang untuk memberikan
          hasil yang nyata,
          efisien, dan berorientasi pada konversi, dengan jaminan uang kembali (money-back guarantee). Dengan layanan yang
          mencakup digital marketing, event organizer, hiburan profesional, hingga pengadaan barang dan jasa, kami
          berkomitmen untuk menjadi mitra terpercaya dalam mendukung berbagai kebutuhan bisnis dan acara di Indonesia.
        </p>

        </p>
      </div>

      {{-- Visi Misi --}}
      <div class="mt-10 sm:mt-14 md:mt-16 max-w-5xl mx-auto">
        <div class="text-center mb-6 sm:mb-8 md:mb-10">
          <span class="text-[10px] sm:text-xs md:text-sm font-semibold tracking-widest text-impost-primary uppercase">
            Visi dan Misi
          </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
          <div class="bg-gray-900/60 border border-gray-800 rounded-lg sm:rounded-xl md:rounded-2xl p-4 sm:p-6 md:p-8">
            <h3 class="text-base sm:text-lg md:text-xl font-semibold text-impost-primary mb-2 sm:mb-3">
              Visi
            </h3>
            <p class="text-white leading-relaxed text-xs sm:text-sm md:text-base">
              Menjadi mitra multiservice terpercaya di Indonesia melalui layanan
              bisnis, event, dan pengadaan yang profesional serta berorientasi pada hasil.
            </p>
          </div>

          <div class="bg-gray-900/60 border border-gray-800 rounded-lg sm:rounded-xl md:rounded-2xl p-4 sm:p-6 md:p-8">
            <h3 class="text-base sm:text-lg md:text-xl font-semibold text-impost-primary mb-2 sm:mb-3">
              Misi
            </h3>
            <ol
              class="space-y-2 text-xs sm:text-sm md:text-base text-white leading-relaxed list-decimal list-outside pl-4">
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

    {{-- Brand Story / Timeline --}}
    <div class="py-12 sm:py-16 md:py-20 bg-[#0a0a0a] overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="max-w-3xl mx-auto text-center mb-10 sm:mb-14 md:mb-16">
          <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-impost-primary font-bold leading-tight">
            The Impost Way
          </h2>
          <p class="mt-4 sm:mt-5 text-white text-xs sm:text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
            Sebuah perjalanan dari menetapkan arah hingga menciptakan dampak nyata.
          </p>
        </div>

        <div class="relative max-w-6xl mx-auto">
          {{-- Timeline Line --}}
          <div
            class="absolute left-4 sm:left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-gray-800 via-gray-700 to-gray-800 md:-translate-x-1/2">
          </div>

          <div class="space-y-8 sm:space-y-10 md:space-y-0">

            <div class="relative md:grid md:grid-cols-2 md:items-center md:gap-8 lg:gap-12">
              <div
                class="absolute left-4 sm:left-8 md:left-1/2 w-3 h-3 sm:w-4 sm:h-4 bg-[#0a0a0a] border-2 border-impost-primary rounded-full -translate-x-1/2 z-10 shadow-[0_0_10px_rgba(var(--impost-primary-rgb),0.6)]">
                <div class="absolute inset-0 bg-impost-primary rounded-full opacity-50 animate-ping"></div>
              </div>
              <div class="pl-10 sm:pl-20 md:pl-0 md:pr-8 lg:pr-12 md:text-right">
                <div
                  class="p-4 sm:p-5 md:p-6 rounded-xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors">
                  <h3
                    class="text-sm sm:text-base md:text-lg font-bold text-white mb-2 group-hover:text-impost-primary transition-colors">
                    One Direction</h3>
                  <p class="text-white text-[11px] sm:text-xs md:text-sm leading-relaxed">
                    Impost Media lahir dari suatu arah yang jelas: Pertumbuhan yang dibentuk. Kami tidak bergerak reaktif
                    atau tergoda tren sesaat. Fokus kami adalah membantu bisnis melangkah lebih jauh dengan tujuan
                    terstruktur.

                  </p>
                </div>
              </div>
              <div class="hidden md:block"></div>
            </div>

            <div class="relative md:grid md:grid-cols-2 md:items-center md:gap-8 lg:gap-12 group">
              <div
                class="absolute left-4 sm:left-8 md:left-1/2 w-3 h-3 sm:w-4 sm:h-4 bg-[#0a0a0a] border-2 border-gray-600 group-hover:border-impost-primary rounded-full -translate-x-1/2 z-10 transition-colors duration-300">
              </div>
              <div class="hidden md:block"></div>
              <div class="pl-10 sm:pl-20 md:pl-8 lg:pl-12 md:text-left">
                <div
                  class="p-4 sm:p-5 md:p-6 rounded-xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors">
                  <h3
                    class="text-sm sm:text-base md:text-lg font-bold text-white mb-2 group-hover:text-impost-primary transition-colors">
                    Built as a System</h3>
                  <p class="text-white text-[11px] sm:text-xs md:text-sm leading-relaxed">
                    Kami tidak bekerja sebagai individu, tetapi sebagai <span class="text-white font-medium">sistem</span>
                    yang menghubungkan riset, strategi, dan eksekusi dalam satu alur kerja rapi untuk meminimalisir
                    <em>trial-error</em> yang membebani bisnis.
                  </p>
                </div>
              </div>
            </div>

            <div class="relative md:grid md:grid-cols-2 md:items-center md:gap-8 lg:gap-12 group">
              <div
                class="absolute left-4 sm:left-8 md:left-1/2 w-3 h-3 sm:w-4 sm:h-4 bg-[#0a0a0a] border-2 border-gray-600 group-hover:border-impost-primary rounded-full -translate-x-1/2 z-10 transition-colors duration-300">
              </div>
              <div class="pl-10 sm:pl-20 md:pl-0 md:pr-8 lg:pr-12 md:text-right">
                <div
                  class="p-4 sm:p-5 md:p-6 rounded-xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors">
                  <h3
                    class="text-sm sm:text-base md:text-lg font-bold text-white mb-2 group-hover:text-impost-primary transition-colors">
                    Consistent Positioning</h3>
                  <p class="text-white text-[11px] sm:text-xs md:text-sm leading-relaxed">
                    Brand kuat dibangun dari posisi yang konsisten. Framework kami menjaga pesan Anda tetap jelas dan
                    relevan.
                    Setiap output memperkuat persepsi, setiap campaign memiliki arah.
                  </p>
                </div>
              </div>
              <div class="hidden md:block"></div>
            </div>

            <div class="relative md:grid md:grid-cols-2 md:items-center md:gap-8 lg:gap-12 group">
              <div
                class="absolute left-4 sm:left-8 md:left-1/2 w-3 h-3 sm:w-4 sm:h-4 bg-[#0a0a0a] border-2 border-gray-600 group-hover:border-impost-primary rounded-full -translate-x-1/2 z-10 transition-colors duration-300">
              </div>
              <div class="hidden md:block"></div>
              <div class="pl-10 sm:pl-20 md:pl-8 lg:pl-12 md:text-left">
                <div
                  class="p-4 sm:p-5 md:p-6 rounded-xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors">
                  <h3
                    class="text-sm sm:text-base md:text-lg font-bold text-white mb-2 group-hover:text-impost-primary transition-colors">
                    Data-Driven Approach</h3>
                  <p class="text-white text-[11px] sm:text-xs md:text-sm leading-relaxed">
                    Bukan asumsi, tapi data. Kami menggunakan data sebagai <span class="text-white font-medium">bahasa
                      bisnis</span>
                    untuk membaca perilaku market dan mengukur performa. Setiap langkah dapat dipertanggungjawabkan.
                  </p>
                </div>
              </div>
            </div>

            <div class="relative md:grid md:grid-cols-2 md:items-center md:gap-8 lg:gap-12 group">
              <div
                class="absolute left-4 sm:left-8 md:left-1/2 w-3 h-3 sm:w-4 sm:h-4 bg-[#0a0a0a] border-2 border-gray-600 group-hover:border-impost-primary rounded-full -translate-x-1/2 z-10 transition-colors duration-300">
              </div>
              <div class="pl-10 sm:pl-20 md:pl-0 md:pr-8 lg:pr-12 md:text-right">
                <div
                  class="p-4 sm:p-5 md:p-6 rounded-xl bg-white/5 border border-white/5 hover:border-white/10 transition-colors">
                  <h3
                    class="text-sm sm:text-base md:text-lg font-bold text-white mb-2 group-hover:text-impost-primary transition-colors">
                    Your Expert Partner</h3>
                  <p class="text-white text-[11px] sm:text-xs md:text-sm leading-relaxed">
                    Lebih dari sekadar pembuat konten, kami adalah <span class="font-medium">partner
                      ahli</span>.
                    Kami bekerja secara kolaboratif, adaptif, dan siap berbagi risiko karena kami percaya pada sistem yang
                    kami bangun.
                  </p>
                </div>
              </div>
              <div class="hidden md:block"></div>
            </div>

          </div>

          <div
            class="relative mt-12 sm:mt-16 md:mt-20 bg-[#0a0a0a] p-4 sm:p-6 md:p-8 rounded-lg sm:rounded-xl border border-white/5">
            <div class="flex flex-col items-center justify-center text-center relative z-10">
              <div
                class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-full bg-impost-primary flex items-center justify-center shadow-[0_0_15px_rgba(var(--impost-primary-rgb),0.5)] mb-4 border-4 sm:border-6 md:border-8 border-[#0a0a0a]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 md:h-8 md:w-8 text-[#0a0a0a]"
                  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-white mb-2 sm:mb-3">Insight to Impact</h3>
              <p class="text-white text-xs sm:text-sm md:text-base leading-relaxed max-w-2xl mx-auto">
                Muara dari semuanya adalah dampak. Insight diolah menjadi strategi, strategi menjadi aksi,
                dan aksi menghasilkan <span class="text-impost-primary font-bold">pertumbuhan bisnis yang nyata</span>.
              </p>
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

          this.maxPage = Math.max(Math.ceil(this.totalItems / this.perPage) - 1, 0)

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
