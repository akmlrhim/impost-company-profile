@extends('layouts.public')

@section('content')
  <div class="pt-24 sm:pt-28 md:pt-32">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12 md:py-14">
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
      <div class="text-center mb-4 sm:mb-6 md:mb-8">
        <span
          class="text-sm sm:text-md md:text-lg lg:text-xl font-semibold tracking-widest text-impost-primary uppercase">
          our team
        </span>
      </div>
    </div>


    <div x-data="teamSlider({{ $team->count() }})" x-init="init()" @resize.window="onResize"
      class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">

      <div class="flex justify-between items-center mb-6">
        <button @click="prev" :disabled="page === 0"
          class="px-4 py-2 rounded-lg bg-white/10 text-white disabled:opacity-30 hover:bg-white/20 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
          </svg>

        </button>

        <button @click="next" :disabled="page >= maxPage"
          class="px-4 py-2 rounded-lg bg-white/10 text-white disabled:opacity-30 hover:bg-white/20 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
          </svg>
        </button>
      </div>

      <div class="overflow-hidden">
        <div class="flex transition-transform duration-500 ease-out" :style="`transform: translateX(-${page * 100}%)`">
          @foreach ($team as $t)
            <div class="shrink-0 px-2" :class="itemWidth">
              <div
                class="bg-linear-to-b from-slate-800 via-slate-900 to-black rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 h-full">
                <div class="p-6 sm:p-7 md:p-8">

                  <div
                    class="w-32 h-32 sm:w-36 sm:h-36 md:w-40 md:h-40 mx-auto mb-5 md:mb-6 rounded-full overflow-hidden border-4 border-white/20 shadow-xl">
                    @if ($t->photo)
                      <img src="{{ asset('storage/' . $t->photo) }}" alt="{{ $t->fullname }}" loading="lazy"
                        decoding="async" class="w-full h-full object-cover" />
                    @else
                      <img src="{{ asset('img/picture_profile_default.webp') }}" alt="{{ $t->fullname }}" loading="lazy"
                        decoding="async" class="w-full h-full object-cover" />
                    @endif
                  </div>

                  <div class="text-center">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-1">
                      {{ $t->fullname }}
                    </h3>

                    <p class="text-sm text-gray-300 font-medium mb-5">
                      {{ $t->position }}
                    </p>

                    <div class="flex justify-center gap-3">

                      <a href="{{ $t->linkedin_link ?? '#' }}"
                        @if ($t->linkedin_link) target="_blank" rel="noopener noreferrer" @endif
                        class="w-10 h-10 rounded-lg bg-linear-to-br from-blue-500 to-blue-600 flex items-center justify-center hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-md hover:shadow-lg hover:scale-110 {{ !$t->linkedin_link ? 'opacity-50 cursor-not-allowed' : '' }}"
                        aria-label="LinkedIn" @if (!$t->linkedin_link) onclick="return false;" @endif>
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                          <path
                            d="M20.447 20.452H16.89v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zM7.119 20.452H3.555V9h3.564v11.452z" />
                        </svg>
                      </a>


                      <a href="{{ $t->instagram_link ?? '#' }}"
                        @if ($t->instagram_link) target="_blank" rel="noopener noreferrer" @endif
                        class="w-10 h-10 rounded-lg bg-linear-to-br from-pink-500 to-rose-600 flex items-center justify-center hover:from-pink-600 hover:to-rose-700 transition-all duration-300 shadow-md hover:shadow-lg hover:scale-110 {{ !$t->instagram_link ? 'opacity-50 cursor-not-allowed' : '' }}"
                        aria-label="Instagram" @if (!$t->instagram_link) onclick="return false;" @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="text-white">
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
          @endforeach

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
