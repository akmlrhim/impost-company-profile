{{-- kenapa harus kami --}}
<section class="py-4 md:py-12 overflow-hidden" data-aos="fade-up">

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
        <h2 data-aos="fade-up" class="font-header text-3xl md:text-5xl font-bold leading-tight text-impost-primary">
          Kenapa Harus Kami ?
        </h2>

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
{{-- end --}}
