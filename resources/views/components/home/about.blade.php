<style>
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }

  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

<section id="about" class="py-8 md:py-12 lg:py-16 overflow-hidden">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl mx-auto text-center">
      <h2
        class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent leading-tight pb-2">
        Sekilas tentang kami
      </h2>
      <p class="mt-3 md:mt-4 lg:mt-6 text-[11px] sm:text-xs md:text-sm lg:text-base text-white leading-relaxed">
        Impost Media adalah Agensi Pemasaran Digital dan Branding All-in-One pertama di Banjarbaru dan Banjarmasin.
        Kami menawarkan solusi yang fleksibel dan berorientasi pada hasil.
      </p>
    </div>

    {{-- konten  --}}
    <div x-data="{
        active: 0,
        cards: [
            { title: 'Data-Driven Approach', desc: 'Strategi pemasaran yang sepenuhnya berbasis pada data terukur dan analisis mendalam.' },
            { title: 'Terbukti, Terjangkau, & Fleksibel', desc: 'Solusi yang telah teruji berhasil, hemat biaya, dan mudah disesuaikan dengan kebutuhan anda.' },
            { title: 'All-in-One Digital Marketing', desc: 'Semua layanan branding dan pemasaran digital terintegrasi di bawah satu atap.' },
            { title: 'Team Ahli dan Berpengalaman', desc: 'Akses cepat ke tim profesional tanpa harus menanggung biaya rekrutmen internal.' },
            { title: 'Solusi Hemat Biaya & Waktu', desc: 'Memangkas biaya operasional dan mempercepat waktu eksekusi kampanye.' },
            { title: 'Hasil Dijamin Dibayar Berdasarkan Kinerja', desc: 'Pembayaran yang anda lakukan dikaitkan langsung dengan capaian dan hasil nyata.' }
        ]
    }" class="pt-8 md:pt-12">

      <div class="text-center max-w-3xl mx-auto mb-6 md:mb-8">
        <p
          class="mt-2 text-base sm:text-lg md:text-xl lg:text-2xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          Kami bukan hanya sekadar Agensi Media Sosial
        </p>
        <p class="mt-2 text-[11px] sm:text-xs md:text-sm lg:text-base font-medium text-white">
          Fokus utama kami adalah meningkatkan profit dan pendapatan bisnis anda.
        </p>
      </div>

      {{-- mobile sliders  --}}
      <div class="md:hidden">
        <div x-ref="slider" class="flex gap-4 overflow-x-auto no-scrollbar snap-x snap-mandatory scroll-smooth pb-2"
          @scroll.debounce.100ms="active = Math.round($el.scrollLeft / $el.offsetWidth)">
          <template x-for="(card, index) in cards" :key="index">
            <div class="w-full shrink-0 snap-center px-2">
              <div class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-xl p-4">
                <h3 class="text-sm sm:text-base font-bold text-white mb-2" x-text="card.title"></h3>
                <p class="text-white text-xs sm:text-sm leading-relaxed" x-text="card.desc"></p>
              </div>
            </div>
          </template>
        </div>

        {{-- indicator --}}
        <div class="flex justify-center gap-2 mt-4">
          <template x-for="(card, index) in cards" :key="index">
            <button
              @click="
                active = index;
                $refs.slider.scrollTo({ left: index * $refs.slider.offsetWidth, behavior: 'smooth' });
              "
              class="h-2 rounded-full transition-all"
              :class="active === index ? 'bg-impost-primary w-6' : 'bg-gray-400 w-2'">
            </button>
          </template>
        </div>

      </div>

      {{-- desktop grids --}}
      <div class="hidden md:grid grid-cols-3 gap-4">
        <template x-for="(card, index) in cards" :key="index">
          <div class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-2xl p-4">
            <h3 class="text-md font-bold text-white mb-3" x-text="card.title"></h3>
            <p class="text-white text-sm leading-relaxed" x-text="card.desc"></p>
          </div>
        </template>
      </div>
    </div>

    <div class="text-center mt-8 md:mt-12">
      <a href="{{ route('about') }}"
        class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-2.5 lg:px-6 lg:py-3 text-[11px] sm:text-xs md:text-sm font-bold bg-linear-to-r from-impost-primary via-impost-third to-impost-fourth text-white rounded-md hover:opacity-90 transition-opacity">
        Selengkapnya tentang kami
        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>

  </div>

</section>
