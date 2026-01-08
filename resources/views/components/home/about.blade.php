<section id="about" class="py-8 md:py-12 overflow-hidden" data-aos="fade-up">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

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
    }">

      <div class="text-center max-w-2xl mx-auto mb-6 md:mb-8 px-2">
        <div class="inline-flex items-center mb-4 px-5 py-2.5 rounded-lg bg-impost-primary">
          <span class="text-black font-semibold tracking-wide uppercase text-sm">WHY US ?</span>
        </div>
        <p data-aos="fade-up"
          class="font-header text-xl md:text-2xl lg:text-3xl font-bold text-impost-primary leading-tight">
          Kami bukan hanya sekadar Agensi Media Sosial
        </p>
        <p data-aos="fade-up" class="mt-2 text-sm md:text-base font-medium text-white">
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

            <div class="w-full shrink-0 px-2">
              <div class="bg-impost-fourth rounded-lg p-4 h-full shadow-lg">
                <h3 class="text-sm font-bold text-white mb-2" x-text="card.title"></h3>
                <p class="text-xs text-white/90 leading-relaxed" x-text="card.desc"></p>
              </div>
            </div>

          </template>
        </div>

        <div class="flex justify-center gap-1.5 mt-4">
          <template x-for="i in totalSlides" :key="i">
            <button @click="goToSlide(i - 1)" class="rounded-full transition-all duration-300"
              :class="currentSlide === i - 1 ? 'bg-impost-primary w-8 h-2' : 'bg-gray-500/50 w-2 h-2'">
            </button>
          </template>
        </div>
      </div>

      <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-5">

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
            class="bg-impost-fourth rounded-lg lg:rounded-xl p-4 lg:p-5 shadow-lg hover:shadow-xl hover:scale-105 transition duration-300">
            <h3 class="text-base lg:text-lg font-bold text-white mb-2" x-text="card.title"></h3>
            <p class="text-white/90 text-sm lg:text-base leading-relaxed" x-text="card.desc"></p>
          </div>

        </template>

      </div>

    </div>

  </div>

</section>
