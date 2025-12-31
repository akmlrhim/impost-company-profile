<section id="about" class="py-12 sm:py-16 md:py-20 lg:py-24 overflow-hidden" data-aos="fade-up">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl mx-auto text-center">
      <h2 data-aos="fade-up"
        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent leading-tight pb-2">
        Tentang Kami
      </h2>
      <p data-aos="fade-up"
        class="mt-4 sm:mt-5 md:mt-6 lg:mt-7 text-sm sm:text-base md:text-lg text-white leading-relaxed px-2">
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
    }" class="pt-10 sm:pt-12 md:pt-14 lg:pt-16">

      <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-10 md:mb-12 px-2">
        <p data-aos="fade-up"
          class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent leading-tight">
          Kami bukan hanya sekadar Agensi Media Sosial
        </p>
        <p data-aos="fade-up" class="mt-3 sm:mt-4 text-sm sm:text-base md:text-lg font-medium text-white">
          Fokus utama kami adalah meningkatkan profit dan pendapatan bisnis anda.
        </p>
      </div>

      <div class="md:hidden overflow-hidden" data-aos="fade-up">
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
                class="bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-xl p-5 sm:p-6 h-full shadow-lg">
                <h3 class="text-base sm:text-lg font-bold text-white mb-2.5 sm:mb-3" x-text="card.title"></h3>
                <p class="text-sm sm:text-base text-white/90 leading-relaxed" x-text="card.desc"></p>
              </div>
            </div>

          </template>
        </div>

        <div class="flex justify-center gap-2 mt-6">
          <template x-for="i in totalSlides" :key="i">
            <button @click="goToSlide(i - 1)" class="rounded-full transition-all duration-300"
              :class="currentSlide === i - 1 ? 'bg-impost-primary w-8 h-2' : 'bg-gray-500/50 w-2 h-2'">
            </button>
          </template>
        </div>
      </div>

      <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 lg:gap-7 mt-8">

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

          <div data-aos="fade-up"
            class="bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-xl md:rounded-2xl p-5 md:p-6 lg:p-7 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
            <h3 class="text-base md:text-lg lg:text-xl font-bold text-white mb-3 md:mb-4" x-text="card.title"></h3>
            <p class="text-white/90 text-sm md:text-base leading-relaxed" x-text="card.desc"></p>
          </div>

        </template>

      </div>

    </div>


    <div class="text-center mt-10 sm:mt-12 md:mt-14 lg:mt-16" data-aos="fade-up">
      <a href="{{ route('about') }}"
        class="inline-flex items-center gap-2 px-6 py-3 sm:px-7 sm:py-3.5 md:px-8 md:py-4 text-sm sm:text-base md:text-lg font-bold bg-gradient-to-r from-impost-primary via-impost-third to-impost-fourth text-white rounded-lg hover:opacity-90 hover:scale-105 transition-all duration-300 shadow-lg shadow-impost-primary/30">
        Selengkapnya tentang kami
        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>

  </div>

</section>
