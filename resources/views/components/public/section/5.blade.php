<section class="py-12 md:py-20 lg:py-24 overflow-hidden" data-aos="fade-up">

  <div class="max-w-7xl mx-auto px-2">

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

      <div class="text-center max-w-3xl mx-auto mb-10 md:mb-14 lg:mb-16">
        <h2 data-aos="fade-up" class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight text-white">
          Kenapa Harus Kami?
        </h2>
      </div>

      <div class="md:hidden overflow-hidden" data-aos="fade-up">
        <div class="flex transition-transform duration-500 ease-out select-none cursor-grab active:cursor-grabbing"
          :style="`transform: translateX(-${currentSlide * 100}%)`" @touchstart="handleTouchStart($event)"
          @touchend="handleTouchEnd($event)" @mousedown="handleMouseDown($event)" @mouseup="handleMouseUp($event)"
          @mouseleave="isDragging = false">

          <template
            x-for="(card, index) in [
            { title: 'Data-Driven Approach', desc: 'Strategi pemasaran berbasis data terukur dan analisis mendalam' },
            { title: 'Terbukti & Fleksibel', desc: 'Solusi teruji berhasil, hemat biaya, dan mudah disesuaikan' },
            { title: 'All-in-One Digital', desc: 'Semua layanan branding dan pemasaran digital terintegrasi' },
            { title: 'Team Ahli Professional', desc: 'Akses ke tim profesional tanpa biaya rekrutmen internal' },
            { title: 'Efisiensi Biaya & Waktu', desc: 'Memangkas biaya operasional dan mempercepat eksekusi' },
            { title: 'Performance Based', desc: 'Pembayaran dikaitkan langsung dengan hasil nyata' }
          ]"
            :key="index">

            <div class="w-full shrink-0 px-2">
              <div
                class="bg-gradient-to-br from-white/[0.03] to-white/[0.01] border border-white/10 rounded-2xl p-6 h-full backdrop-blur-sm">
                <h3 class="text-base font-semibold text-impost-primary mb-3" x-text="card.title"></h3>
                <p class="text-sm text-gray-300 leading-relaxed" x-text="card.desc"></p>
              </div>
            </div>
          </template>
        </div>

        <div class="flex justify-center gap-2 mt-8">
          <template x-for="i in totalSlides" :key="i">
            <button @click="goToSlide(i - 1)" class="rounded-full transition-all duration-300"
              :class="currentSlide === i - 1 ? 'bg-impost-primary w-8 h-1.5' : 'bg-white/20 w-1.5 h-1.5'">
            </button>
          </template>
        </div>
      </div>

      <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 lg:gap-8">
        <template
          x-for="(card, index) in [
            { title: 'Data-Driven Approach', desc: 'Strategi pemasaran yang sepenuhnya berbasis pada data terukur dan analisis mendalam' },
            { title: 'Terbukti, Terjangkau, & Fleksibel', desc: 'Solusi yang telah teruji berhasil, hemat biaya, dan mudah disesuaikan' },
            { title: 'All-in-One Digital Marketing', desc: 'Semua layanan branding dan pemasaran digital terintegrasi' },
            { title: 'Team Ahli dan Berpengalaman', desc: 'Akses ke tim profesional tanpa biaya rekrutmen internal' },
            { title: 'Solusi Hemat Biaya & Waktu', desc: 'Memangkas biaya operasional dan mempercepat eksekusi' },
            { title: 'Hasil Dibayar Berdasarkan Kinerja', desc: 'Pembayaran dikaitkan langsung dengan hasil nyata' }
          ]"
          :key="index">

          <div data-aos="fade-up" :data-aos-delay="index * 100"
            class="bg-gradient-to-br from-white/[0.03] to-white/[0.01] border border-white/10 rounded-2xl md:rounded-3xl p-6 md:p-8 backdrop-blur-sm transition-all duration-300 hover:border-white/20">
            <h3 class="text-base sm:text-lg md:text-xl font-semibold text-white mb-3 md:mb-4" x-text="card.title"></h3>
            <p class="text-sm sm:text-base text-gray-300 leading-relaxed" x-text="card.desc"></p>
          </div>
        </template>
      </div>
    </div>
  </div>
</section>
