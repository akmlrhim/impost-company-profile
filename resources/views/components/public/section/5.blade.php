<section class="py-12 sm:py-10 md:py-12 overflow-hidden relative">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">

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

      <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-tight text-white mb-4">
          Kenapa Harus <span class="text-impost-primary">Kami?</span>
        </h2>
      </div>

      <div class="md:hidden overflow-hidden touch-pan-y">
        <div class="flex transition-transform duration-500 ease-out select-none"
          :style="`transform: translateX(-${currentSlide * 100}%)`" @touchstart="handleTouchStart($event)"
          @touchend="handleTouchEnd($event)" @mousedown="handleMouseDown($event)" @mouseup="handleMouseUp($event)"
          @mouseleave="isDragging = false">

          <template
            x-for="(card, index) in [
            { title: 'Data-Driven Approach', icon: 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', desc: 'Strategi pemasaran berbasis data terukur & analisis mendalam.' },
            { title: 'Terbukti & Fleksibel', icon: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', desc: 'Solusi teruji berhasil, hemat biaya, & mudah disesuaikan.' },
            { title: 'All-in-One Digital', icon: 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', desc: 'Layanan branding & pemasaran digital terintegrasi.' },
            { title: 'Team Ahli Professional', icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', desc: 'Akses tim profesional tanpa biaya rekrutmen internal.' },
            { title: 'Efisiensi Biaya & Waktu', icon: 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', desc: 'Memangkas biaya operasional & mempercepat eksekusi.' },
            { title: 'Performance Based', icon: 'M13 10V3L4 14h7v7l9-11h-7z', desc: 'Pembayaran dikaitkan langsung dengan hasil nyata.' }
          ]"
            :key="index">

            <div class="w-full shrink-0 px-3">
              <div
                class="bg-white/[0.03] border border-white/10 rounded-xl p-6 h-full backdrop-blur-sm flex flex-col items-center text-center shadow-lg">
                <div class="mb-4 p-2.5 rounded-lg bg-white/5 text-impost-primary">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="card.icon">
                    </path>
                  </svg>
                </div>
                <h3 class="text-sm font-semibold text-white mb-2" x-text="card.title"></h3>
                <p class="text-xs text-white leading-relaxed" x-text="card.desc"></p>
              </div>
            </div>
          </template>
        </div>
        <div class="flex justify-center gap-1.5 mt-6">
          <template x-for="i in totalSlides" :key="i">
            <button @click="goToSlide(i - 1)" class="rounded-full transition-all duration-300"
              :class="currentSlide === i - 1 ? 'bg-impost-primary w-6 h-1' : 'bg-white/10 w-1 h-1 hover:bg-white/30'">
            </button>
          </template>
        </div>
      </div>

      <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        <template
          x-for="(card, index) in [
            { title: 'Data-Driven Approach', icon: 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', desc: 'Keputusan pemasaran berdasarkan data terukur dan analisis mendalam untuk ROI maksimal.' },
            { title: 'Terbukti & Fleksibel', icon: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', desc: 'Solusi yang teruji, hemat biaya, dan sangat mudah disesuaikan dengan skala bisnis Anda.' },
            { title: 'All-in-One Service', icon: 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', desc: 'Ekosistem penuh layanan branding, pengembangan web, dan pemasaran digital terintegrasi.' },
            { title: 'Team Ahli', icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', desc: 'Akses instan ke tim profesional berpengalaman tanpa kerumitan rekrutmen internal.' },
            { title: 'Efisiensi Waktu', icon: 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', desc: 'Memangkas biaya operasional dan mempercepat eksekusi campaign ke pasar.' },
            { title: 'Performance Based', icon: 'M13 10V3L4 14h7v7l9-11h-7z', desc: 'Pembayaran yang transparan dan dikaitkan dengan hasil performa nyata di lapangan.' }
          ]"
          :key="index">

          <div
            class="group relative bg-white/[0.02] hover:bg-white/[0.04] border border-white/[0.08] hover:border-impost-primary/30 rounded-2xl p-7 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl backdrop-blur-sm">
            <div class="flex items-start space-x-5">

              <div
                class="shrink-0 p-3 rounded-xl bg-white/5 group-hover:bg-impost-primary/10 text-white group-hover:text-impost-primary transition-colors duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="card.icon"></path>
                </svg>
              </div>

              <div>
                <h3 class="text-base font-semibold text-white mb-2 group-hover:text-impost-primary transition-colors"
                  x-text="card.title"></h3>
                <p class="text-sm text-white font-light leading-relaxed group-hover:text-gray-300 transition-colors"
                  x-text="card.desc"></p>
              </div>
            </div>
          </div>
        </template>
      </div>

    </div>
  </div>
</section>
