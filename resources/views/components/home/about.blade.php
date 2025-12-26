<section id="about" class="py-8 md:py-12 lg:py-16 overflow-hidden" data-aos="fade-up" data-aos-duration="800">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl mx-auto text-center">
      <h2 data-aos="fade-up" data-aos-delay="100" data-aos-duration="700"
        class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent leading-tight pb-2">
        Tentang Kami
      </h2>
      <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="700"
        class="mt-3 md:mt-4 lg:mt-6 text-[11px] sm:text-xs md:text-sm lg:text-base text-white leading-relaxed">
        Impost Media adalah Agensi Pemasaran Digital dan Branding All-in-One pertama di Banjarbaru dan Banjarmasin.
        Kami menawarkan solusi yang fleksibel dan berorientasi pada hasil.
      </p>
    </div>

    {{-- konten  --}}
    <div x-data="{
        currentSlide: 0,
        totalSlides: 6,
        startX: 0,
        isDragging: false,
    
        goToSlide(i) {
            this.currentSlide = i
        },
    
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides
        },
    
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides
        },
    
        handleTouchStart(e) {
            this.startX = e.touches[0].clientX
            this.isDragging = true
        },
    
        handleTouchEnd(e) {
            if (!this.isDragging) return
            const diff = this.startX - e.changedTouches[0].clientX
            if (Math.abs(diff) > 50) diff > 0 ? this.nextSlide() : this.prevSlide()
            this.isDragging = false
        },
    
        handleMouseDown(e) {
            this.startX = e.clientX
            this.isDragging = true
        },
    
        handleMouseUp(e) {
            if (!this.isDragging) return
            const diff = this.startX - e.clientX
            if (Math.abs(diff) > 50) diff > 0 ? this.nextSlide() : this.prevSlide()
            this.isDragging = false
        }
    }" class="pt-8 md:pt-12">

      <div class="text-center max-w-3xl mx-auto mb-6 md:mb-8">
        <p data-aos="zoom-in" data-aos-delay="150" data-aos-duration="600"
          class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          Kami bukan hanya sekadar Agensi Media Sosial
        </p>
        <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="700"
          class="mt-2 text-[11px] sm:text-xs md:text-sm lg:text-base font-medium text-white">
          Fokus utama kami adalah meningkatkan profit dan pendapatan bisnis anda.
        </p>
      </div>

      <div class="md:hidden overflow-hidden" data-aos="fade-up" data-aos-duration="800">
        <div class="flex transition-transform duration-300 ease-in-out select-none cursor-grab active:cursor-grabbing"
          :style="`transform: translateX(-${currentSlide * 100}%)`" @touchstart="handleTouchStart($event)"
          @touchend="handleTouchEnd($event)" @mousedown="handleMouseDown($event)" @mouseup="handleMouseUp($event)"
          @mouseleave="isDragging = false">

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

            <div class="w-full shrink-0 px-3">
              <div
                class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-xl p-4 h-full">
                <h3 class="text-sm font-bold text-white mb-2" x-text="card.title"></h3>
                <p class="text-xs text-white leading-relaxed" x-text="card.desc"></p>
              </div>
            </div>

          </template>
        </div>

        <div class="flex justify-center gap-2 mt-4">
          <template x-for="i in totalSlides" :key="i">
            <button @click="goToSlide(i - 1)" class="rounded-full transition-all duration-300"
              :class="currentSlide === i - 1 ? 'bg-impost-primary w-6 h-2' : 'bg-gray-500 w-2 h-2'">
            </button>
          </template>
        </div>
      </div>

      <div class="hidden md:grid grid-cols-3 gap-4 mt-6">

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

          <div data-aos="fade-up" :data-aos-delay="index * 120" data-aos-duration="700"
            class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-2xl p-4">
            <h3 class="text-md font-bold text-white mb-3" x-text="card.title"></h3>
            <p class="text-white text-sm leading-relaxed" x-text="card.desc"></p>
          </div>

        </template>

      </div>

    </div>


    <div class="text-center mt-8 md:mt-12" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">
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
