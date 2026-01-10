<section id="about" class="py-10 md:py-16 bg-impost-fifth overflow-hidden" data-aos="fade-up">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div x-data="{
        currentSlide: 0,
        totalSlides: 6,
        startX: 0,
        isDragging: false,
    
        goToSlide(i) { this.currentSlide = i },
        nextSlide() { this.currentSlide = (this.currentSlide + 1) % this.totalSlides },
        prevSlide() { this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides },
        handleTouchStart(e) {
            this.startX = e.touches[0].clientX;
            this.isDragging = true
        },
        handleTouchEnd(e) {
            if (!this.isDragging) return
            const diff = this.startX - e.changedTouches[0].clientX
            if (Math.abs(diff) > 50) diff > 0 ? this.nextSlide() : this.prevSlide()
            this.isDragging = false
        },
        handleMouseDown(e) {
            this.startX = e.clientX;
            this.isDragging = true
        },
        handleMouseUp(e) {
            if (!this.isDragging) return
            const diff = this.startX - e.clientX
            if (Math.abs(diff) > 50) diff > 0 ? this.nextSlide() : this.prevSlide()
            this.isDragging = false
        }
    }">

      <div class="text-center max-w-2xl mx-auto mb-8 md:mb-12 px-2">
        <div
          class="inline-flex items-center mb-4 px-4 py-1.5 rounded-full border border-impost-primary/30 bg-impost-fourth/30">
          <span class="text-impost-primary font-bold tracking-widest uppercase text-[10px] md:text-xs">WHY US ?</span>
        </div>
        <h2 data-aos="fade-up" class="font-header text-xl md:text-3xl font-bold text-white leading-tight">
          Kami bukan hanya sekadar <span class="text-impost-primary">Agensi Media Sosial</span>
        </h2>
        <p data-aos="fade-up" class="mt-3 text-xs md:text-base font-medium text-gray-400">
          Fokus utama kami adalah meningkatkan profit dan pendapatan bisnis anda.
        </p>
      </div>

      <div class="md:hidden overflow-hidden" data-aos="fade-up">
        <div class="flex transition-transform duration-500 ease-out select-none cursor-grab active:cursor-grabbing"
          :style="`transform: translateX(-${currentSlide * 100}%)`" @touchstart="handleTouchStart($event)"
          @touchend="handleTouchEnd($event)" @mousedown="handleMouseDown($event)" @mouseup="handleMouseUp($event)"
          @mouseleave="isDragging = false">

          <template
            x-for="(card, index) in [
            { title: 'Data-Driven Approach', desc: 'Strategi pemasaran berbasis data terukur dan analisis mendalam.' },
            { title: 'Terbukti & Fleksibel', desc: 'Solusi teruji berhasil, hemat biaya, dan mudah disesuaikan.' },
            { title: 'All-in-One Digital', desc: 'Semua layanan branding dan pemasaran digital terintegrasi.' },
            { title: 'Team Ahli Professional', desc: 'Akses ke tim profesional tanpa biaya rekrutmen internal.' },
            { title: 'Efisiensi Biaya & Waktu', desc: 'Memangkas biaya operasional dan mempercepat eksekusi.' },
            { title: 'Performance Based', desc: 'Pembayaran dikaitkan langsung dengan hasil nyata.' }
          ]"
            :key="index">

            <div class="w-full shrink-0 px-4">
              <div class="bg-impost-fourth/40 border border-impost-third/20 rounded-xl p-5 h-full">
                <h3 class="text-sm font-bold text-impost-primary mb-2" x-text="card.title"></h3>
                <p class="text-[11px] text-white leading-relaxed" x-text="card.desc"></p>
              </div>
            </div>
          </template>
        </div>

        <div class="flex justify-center gap-1.5 mt-6">
          <template x-for="i in totalSlides" :key="i">
            <button @click="goToSlide(i - 1)" class="rounded-full transition-all duration-300"
              :class="currentSlide === i - 1 ? 'bg-impost-primary w-6 h-1' : 'bg-impost-third/30 w-1 h-1'">
            </button>
          </template>
        </div>
      </div>

      <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
        <template
          x-for="(card, index) in [
            { title: 'Data-Driven Approach', desc: 'Strategi pemasaran yang sepenuhnya berbasis pada data terukur dan analisis mendalam.' },
            { title: 'Terbukti, Terjangkau, & Fleksibel', desc: 'Solusi yang telah teruji berhasil, hemat biaya, dan mudah disesuaikan.' },
            { title: 'All-in-One Digital Marketing', desc: 'Semua layanan branding dan pemasaran digital terintegrasi.' },
            { title: 'Team Ahli dan Berpengalaman', desc: 'Akses ke tim profesional tanpa biaya rekrutmen internal.' },
            { title: 'Solusi Hemat Biaya & Waktu', desc: 'Memangkas biaya operasional dan mempercepat eksekusi.' },
            { title: 'Hasil Dibayar Berdasarkan Kinerja', desc: 'Pembayaran dikaitkan langsung dengan hasil nyata.' }
          ]"
          :key="index">

          <div data-aos="fade-up" :data-aos-delay="index * 100"
            class="group bg-impost-fourth/30 border border-impost-third/10 rounded-xl p-6 shadow-md hover:border-impost-primary/40 transition-all duration-300 transform hover:-translate-y-1">
            <h3 class="text-base font-bold text-white mb-2 group-hover:text-impost-primary" x-text="card.title"></h3>
            <p class="text-white text-xs lg:text-sm leading-relaxed" x-text="card.desc"></p>
          </div>
        </template>
      </div>
    </div>
  </div>
</section>

<section class="py-4 md:py-12 bg-impost-fifth text-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="max-w-3xl mb-12 md:mb-16" data-aos="fade-right">
      <p class="text-xl md:text-2xl lg:text-3xl font-bold leading-tight font-header">
        Kami Bukan Agency yang jual konten atau iklan. <br>
        <span class="text-impost-secondary font-header">Kami Pionir & Market Leader Digital Marketing di
          Kalimantan.</span>
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

      <div class="space-y-6" data-aos="fade-up">
        <div class="bg-impost-fourth/20 border-l-4 border-impost-secondary p-6 rounded-r-xl">
          <h3 class="text-lg font-bold mb-4 text-white">Kami hadir karena terlalu banyak bisnis:</h3>
          <ul class="space-y-4">

            <li class="flex items-baseline gap-3">
              <span class="text-impost-primary text-base inline-block shrink-0">•</span>
              <p class="text-sm md:text-base text-gray-300">Sudah habis uang untuk iklan,</p>
            </li>

            <li class="flex items-baseline gap-3">
              <span class="text-impost-primary text-base inline-block shrink-0">•</span>
              <p class="text-sm md:text-base text-gray-300">
                Konten jalan tapi brandingan masih terlihat
                <span class="italic text-white">"brand murah"</span>
              </p>
            </li>

            <li class="flex items-baseline gap-3">
              <span class="text-impost-primary text-base inline-block shrink-0">•</span>
              <p class="text-sm md:text-base text-gray-300">Trauma pakai agency tanpa ada hasil yang jelas</p>
            </li>

            <li class="flex items-baseline gap-3">
              <span class="text-impost-primary text-base inline-block shrink-0">•</span>
              <p
                class="text-sm md:text-base text-gray-300 underline decoration-impost-primary/40 text-white font-medium">
                Tapi tidak pernah tahu apa yang salah.
              </p>
            </li>

          </ul>
        </div>
      </div>

      <div class="flex flex-col gap-6" data-aos="fade-up" data-aos-delay="200">
        <div class="bg-impost-fourth/10 border border-impost-third/20 p-6 rounded-2xl">
          <p class="text-sm md:text-base leading-relaxed text-gray-300">
            <span class="text-impost-primary font-bold">Hasilnya?</span> Penjualan kebanyakan hanya mengandalkan promo
            dengan customer yang tidak loyal.
          </p>
          <div class="my-4 h-px bg-gradient-to-r from-impost-third/50 to-transparent"></div>
          <p class="text-sm md:text-base leading-relaxed text-gray-300">
            Ini disebabkan oleh branding yang belum terbangun ke persepsi publik.
          </p>
        </div>

        <div
          class="bg-gradient-to-br from-impost-fourth to-impost-fifth border border-impost-primary/30 p-8 rounded-2xl shadow-2xl">
          <p class="text-impost-primary font-bold text-sm uppercase tracking-widest mb-2">Our Core Action</p>
          <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">Kami benahi funnel marketingnya</h3>
          <p class="text-xs md:text-sm text-gray-400">
            Membangun sistem pemasaran yang berkelanjutan, bukan sekadar posting konten.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

{{--  --}}
<section class="py-4 md:py-12 relative overflow-hidden">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">

    <div class="text-center max-w-2xl mx-auto mb-12">
      <div class="inline-block h-1 w-10 bg-impost-primary mb-4 rounded-full"></div>
      <h2 class="font-header text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-4 leading-tight">
        Kenapa Banyak Bisnis <br>
        <span
          class="font-header text-transparent bg-clip-text bg-gradient-to-r from-impost-primary to-impost-secondary">
          Gagal Naik Omzet?
        </span>
      </h2>
      <p class="text-sm md:text-base text-white italic opacity-80">
        "Dari ratusan bisnis yang kami tangani, polanya selalu sama:"
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

      <div data-aos="fade-right" class="group">
        <div
          class="h-full bg-white/[0.02] border border-white/10 backdrop-blur-sm rounded-2xl p-6 md:p-8 transition hover:border-red-500/30">
          <ul class="space-y-5">
            <li class="flex gap-4">
              <span class="text-red-500 text-sm mt-1">✕</span>
              <p class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Konten jalan, tapi tidak berdampak apa-apa
              </p>
            </li>
            <li class="flex gap-4">
              <span class="text-red-500 text-sm mt-1">✕</span>
              <p class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Iklan nyala, tapi boncos
              </p>
            </li>
            <li class="flex gap-4">
              <span class="text-red-500 text-sm mt-1">✕</span>
              <p class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Tidak ada KPI yang jelas & terukur
              </p>
            </li>
            <li class="flex gap-4">
              <span class="text-red-500 text-sm mt-1">✕</span>
              <p class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Laporan membingungkan & tidak valid
              </p>
            </li>
          </ul>
        </div>
      </div>

      <div data-aos="fade-left" class="group">
        <div
          class="h-full bg-white/[0.02] border border-white/10 backdrop-blur-sm rounded-2xl p-6 md:p-8 transition hover:border-red-500/30">
          <ul class="space-y-5">
            <li class="flex gap-4">
              <span class="text-red-500 text-sm mt-1">✕</span>
              <p class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Owner terjebak operasional
              </p>
            </li>
            <li class="flex gap-4">
              <span class="text-red-500 text-sm mt-1">✕</span>
              <p class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Biaya tim mahal tapi nihil hasil
              </p>
            </li>
            <li class="flex gap-4">
              <span class="text-red-500 text-sm mt-1">✕</span>
              <p class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Trauma janji manis agency
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mt-14 text-center" data-aos="zoom-in">
      <div class="bg-gradient-to-b from-impost-fourth/50 to-transparent border border-white/5 rounded-2xl p-8 md:p-10">
        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold text-white leading-snug font-header">
          Masalahnya bukan kurang usaha. <br>
          <span class="italic text-gray-400 font-light">Tapi</span>
          <span class="relative text-white font-header">
            tidak ada sistem yang benar.
          </span>
        </h3>
      </div>
    </div>
  </div>
</section>
{{--  --}}


{{--  --}}
<section class="py-4 md:py-12 relative overflow-hidden border-t border-impost-third/10">
  <div class="absolute top-1/2 left-0 w-64 h-64 bg-impost-primary/5 blur-[90px] rounded-full -translate-y-1/2"></div>

  <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

      <div data-aos="fade-right">
        <div
          class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-impost-fourth/40 border border-impost-primary/20 mb-5">
          <span class="relative flex h-2 w-2">
            <span
              class="animate-ping absolute inline-flex h-full w-full rounded-full bg-impost-primary opacity-70"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-impost-primary"></span>
          </span>
          <span class="text-[11px] font-bold text-impost-primary uppercase tracking-[0.25em]">
            Our Mission
          </span>
        </div>

        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white leading-tight font-header mb-5">
          Apa yang Kami <span class="text-impost-primary">Selesaikan?</span>
        </h2>

        <div class="space-y-4 text-gray-400">
          <p class="text-sm md:text-base leading-relaxed">
            Kami tidak menjual
            <span class="text-white italic font-medium">
              “jasa digital marketing, konten, atau iklan”.
            </span>
          </p>

          <p class="text-sm md:text-base leading-relaxed">
            Kami menjual
            <span class="text-impost-primary font-semibold">
              kepercayaan, data, hasil, pertumbuhan, omzet, dan profit.
            </span>
          </p>
        </div>
      </div>

      <div data-aos="fade-left">
        <div
          class="bg-impost-fourth/20 border border-impost-third/10 rounded-2xl p-6 md:p-8 backdrop-blur-sm shadow-xl">

          <p class="pb-4 text-xs font-bold uppercase tracking-widest text-gray-300">
            Masalah inti yang kami selesaikan:
          </p>

          <ul class="space-y-4">
            <li class="flex items-start gap-4 group">
              <div
                class="w-7 h-7 rounded-lg bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center group-hover:bg-impost-primary transition">
                <svg class="w-4 h-4 text-impost-primary group-hover:text-impost-fifth" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <span class="text-sm md:text-base text-gray-300 group-hover:text-white transition">
                Omzet stagnan
              </span>
            </li>

            <li class="flex items-start gap-4 group">
              <div
                class="w-7 h-7 rounded-lg bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center group-hover:bg-impost-primary transition">
                <svg class="w-4 h-4 text-impost-primary group-hover:text-impost-fifth" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <span
                class="text-sm md:text-base text-gray-300 group-hover:text-white font-medium underline decoration-impost-primary/30">
                Iklan tidak efisien
              </span>
            </li>

            <li class="flex items-start gap-4 group">
              <div
                class="w-7 h-7 rounded-lg bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center group-hover:bg-impost-primary transition">
                <svg class="w-4 h-4 text-impost-primary group-hover:text-impost-fifth" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <span class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Branding lemah & terlihat murah
              </span>
            </li>

            <li class="flex items-start gap-4 group">
              <div
                class="w-7 h-7 rounded-lg bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center group-hover:bg-impost-primary transition">
                <svg class="w-4 h-4 text-impost-primary group-hover:text-impost-fifth" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <span class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Tidak ada funnel penjualan
              </span>
            </li>

            <li class="flex items-start gap-4 group">
              <div
                class="w-7 h-7 rounded-lg bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center group-hover:bg-impost-primary transition">
                <svg class="w-4 h-4 text-impost-primary group-hover:text-impost-fifth" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <span class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Tidak siap scale
              </span>
            </li>

            <li class="flex items-start gap-4 group">
              <div
                class="w-7 h-7 rounded-lg bg-impost-primary/10 border border-impost-primary/20 flex items-center justify-center group-hover:bg-impost-primary transition">
                <svg class="w-4 h-4 text-impost-primary group-hover:text-impost-fifth" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <span class="text-sm md:text-base text-gray-300 group-hover:text-white">
                Tidak ada data untuk keputusan
              </span>
            </li>
          </ul>

          <div class="mt-8 pt-6 border-t border-impost-third/20">
            <p class="text-xs md:text-sm text-gray-400 italic leading-relaxed">
              Impost Media hadir
              <span class="text-white font-semibold">bukan sebagai vendor</span>,
              tetapi sebagai
              <span class="text-impost-primary font-semibold uppercase tracking-wide">
                partner pertumbuhan bisnis.
              </span>
            </p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
{{--  --}}



{{-- Apa yang kami lakukan --}}
<section class="py-4 md:py-12 bg-impost-fifth border-t border-impost-third/10 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">

    <div class="max-w-3xl mb-16 md:mb-20">
      <h2 class="text-impost-primary font-bold tracking-[0.3em] uppercase text-sm mb-4">Apa yang kami lakukan ?</h2>
      <h3 class="text-3xl md:text-5xl font-bold text-white leading-tight font-header">
        Strategi Komprehensif untuk <br>
        <span
          class="text-transparent bg-clip-text bg-gradient-to-r from-impost-primary to-impost-secondary font-header">Pertumbuhan
          Bisnis Anda.</span>
      </h3>
    </div>

    <div class="lg:hidden" x-data="{ currentSlide: 0, totalSlides: 5 }">
      <div class="relative">
        <div x-ref="slider" class="slider-container flex gap-4 overflow-x-auto pb-4"
          @scroll.debounce.100ms="currentSlide = Math.round($el.scrollLeft / $el.offsetWidth)">
          <div class="slider-item w-[85%] sm:w-[70%]">
            <div class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 h-full">
              <div class="flex justify-between items-start mb-6">
                <span class="text-4xl font-bold text-impost-primary">01</span>
                <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                    </path>
                  </svg>
                </div>
              </div>
              <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Awareness Strategy</h4>
              <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
                <li class="flex gap-2"><span>•</span> Aktivasi & Manajemen Sosial Media</li>
                <li class="flex gap-2"><span>•</span> Pembuatan Konten & KOL Activation</li>
                <li class="flex gap-2"><span>•</span> Website & Profile Company</li>
                <li class="flex gap-2"><span>•</span> Ads Awareness & Strategi Launching</li>
              </ul>
            </div>
          </div>

          <div class="slider-item w-[85%] sm:w-[70%]">
            <div class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 h-full">
              <div class="flex justify-between items-start mb-6">
                <span class="text-4xl font-bold text-impost-primary">02</span>
                <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                  </svg>
                </div>
              </div>
              <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Consideration</h4>
              <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
                <li class="flex gap-2"><span>•</span> Community Activation & Review</li>
                <li class="flex gap-2"><span>•</span> KOL Management & CS Support</li>
                <li class="flex gap-2"><span>•</span> UGC Content & Brand Storytelling</li>
              </ul>
            </div>
          </div>

          <div class="slider-item w-[85%] sm:w-[70%]">
            <div class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 h-full">
              <div class="flex justify-between items-start mb-6">
                <span class="text-4xl font-bold text-impost-primary">03</span>
                <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                  </svg>
                </div>
              </div>
              <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Conversion</h4>
              <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
                <li class="flex gap-2"><span>•</span> Sales Ads & High Converting LP</li>
                <li class="flex gap-2"><span>•</span> Offer & Pricing Strategy</li>
                <li class="flex gap-2"><span>•</span> Sales Funnel & Pipeline Development</li>
              </ul>
            </div>
          </div>

          <div class="slider-item w-[85%] sm:w-[70%]">
            <div class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 h-full">
              <div class="flex justify-between items-start mb-6">
                <span class="text-4xl font-bold text-impost-primary">04</span>
                <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                  </svg>
                </div>
              </div>
              <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Loyalty</h4>
              <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
                <li class="flex gap-2"><span>•</span> Brand Foundation & Identity</li>
                <li class="flex gap-2"><span>•</span> CRM & Loyalty Program</li>
                <li class="flex gap-2"><span>•</span> Brand Storytelling</li>
              </ul>
            </div>
          </div>

          <div class="slider-item w-[85%] sm:w-[70%]">
            <div class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 h-full">
              <div class="flex justify-between items-start mb-6">
                <span class="text-4xl font-bold text-impost-primary">05</span>
                <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                  </svg>
                </div>
              </div>
              <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Advocacy & Scale</h4>
              <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
                <li class="flex gap-2"><span>•</span> AI Integrated Marketing System</li>
                <li class="flex gap-2"><span>•</span> Konten Testimoni & UGC</li>
                <li class="flex gap-2"><span>•</span> Reporting & Rekomendasi</li>
                <li class="flex gap-2"><span>•</span> Campaign Advocacy Strategy</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden lg:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
      <div
        class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 transition-all duration-500 hover:border-impost-primary/40 hover:-translate-y-2">
        <div class="flex justify-between items-start mb-6">
          <span class="text-4xl font-bold text-impost-primary">01</span>
          <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
              </path>
            </svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Awareness Strategy</h4>
        <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
          <li class="flex gap-2"><span>•</span> Aktivasi & Manajemen Sosial Media</li>
          <li class="flex gap-2"><span>•</span> Pembuatan Konten & KOL Activation</li>
          <li class="flex gap-2"><span>•</span> Website & Profile Company</li>
          <li class="flex gap-2"><span>•</span> Ads Awareness & Strategi Launching</li>
        </ul>
      </div>

      <div
        class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 transition-all duration-500 hover:border-impost-primary/40 hover:-translate-y-2">
        <div class="flex justify-between items-start mb-6">
          <span class="text-4xl font-bold text-impost-primary">02</span>
          <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
              </path>
            </svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Consideration</h4>
        <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
          <li class="flex gap-2"><span>•</span> Community Activation & Review</li>
          <li class="flex gap-2"><span>•</span> KOL Management & CS Support</li>
          <li class="flex gap-2"><span>•</span> UGC Content & Brand Storytelling</li>
        </ul>
      </div>

      <div
        class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 transition-all duration-500 hover:border-impost-primary/40 hover:-translate-y-2">
        <div class="flex justify-between items-start mb-6">
          <span class="text-4xl font-bold text-impost-primary">03</span>
          <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
              </path>
            </svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Conversion</h4>
        <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
          <li class="flex gap-2"><span>•</span> Sales Ads & High Converting LP</li>
          <li class="flex gap-2"><span>•</span> Offer & Pricing Strategy</li>
          <li class="flex gap-2"><span>•</span> Sales Funnel & Pipeline Development</li>
        </ul>
      </div>

      <div
        class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 transition-all duration-500 hover:border-impost-primary/40 hover:-translate-y-2">
        <div class="flex justify-between items-start mb-6">
          <span class="text-4xl font-bold text-impost-primary">04</span>
          <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
              </path>
            </svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Loyalty</h4>
        <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
          <li class="flex gap-2"><span>•</span> Brand Foundation & Identity</li>
          <li class="flex gap-2"><span>•</span> CRM & Loyalty Program</li>
          <li class="flex gap-2"><span>•</span> Brand Storytelling</li>
        </ul>
      </div>

      <div
        class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 lg:col-span-2 transition-all duration-500 hover:border-impost-primary/40 hover:-translate-y-2">
        <div class="flex justify-between items-start mb-6">
          <span class="text-4xl font-bold text-impost-primary">05</span>
          <div class="p-3 bg-impost-primary/10 rounded-2xl text-impost-primary">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
              </path>
            </svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-white mb-4 uppercase tracking-wide">Advocacy & Scale</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
          <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
            <li class="flex gap-2"><span>•</span> AI Integrated Marketing System</li>
            <li class="flex gap-2"><span>•</span> Konten Testimoni & UGC</li>
          </ul>
          <ul class="space-y-3 text-sm text-gray-400 leading-relaxed text-white">
            <li class="flex gap-2"><span>•</span> Reporting & Rekomendasi</li>
            <li class="flex gap-2"><span>•</span> Campaign Advocacy Strategy</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
{{--  --}}
