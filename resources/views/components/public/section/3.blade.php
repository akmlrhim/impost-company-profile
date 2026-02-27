<section class="py-16 sm:py-20 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-5 sm:px-6 relative z-10">

    <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-16 relative z-20">
      <h2 class="text-2xl sm:text-3xl md:text-5xl text-white leading-tight mb-4 sm:mb-6 font-header">
        Apa yang Sebenarnya <br class="hidden md:block"> Kami <span class="italic text-impost-primary">Selesaikan?</span>
      </h2>
      <div class="text-white font-medium text-xs sm:text-base md:text-lg leading-relaxed font-light space-y-2">
        <p>Kami menolak menjadi sekadar vendor yang menjual "jasa digital marketing". Kami hadir memberikan kepastian
          data, pertumbuhan omzet, dan profit nyata.</p>
      </div>
    </div>

    {{-- Mobile Slider --}}
    <div class="lg:hidden">
      <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 px-1"
        style="scrollbar-width: none; -ms-overflow-style: none;">

        @php
          $items = [
              [
                  'title' => 'Omzet Stagnan',
                  'desc' => 'Memecah kebuntuan pertumbuhan pendapatan dengan strategi yang terukur.',
              ],
              [
                  'title' => 'Iklan Tidak Efisien',
                  'desc' => 'Menghentikan pemborosan budget iklan yang tidak menghasilkan konversi.',
              ],
              [
                  'title' => 'Branding Terlihat Murah',
                  'desc' => 'Meningkatkan persepsi nilai brand Anda di mata pelanggan.',
              ],
              [
                  'title' => 'Tidak Ada Penjualan',
                  'desc' => 'Membangun sistem funnel otomatis yang mengubah prospek menjadi pembeli.',
              ],
              [
                  'title' => 'Bisnis Sulit Scale-Up',
                  'desc' => 'Menyiapkan infrastruktur digital yang siap menampung pertumbuhan besar.',
              ],
              [
                  'title' => 'Buta Data',
                  'desc' => 'Mengambil keputusan bisnis berdasarkan data riil, bukan sekadar asumsi.',
              ],
          ];
        @endphp

        @foreach ($items as $item)
          <div
            class="shrink-0 snap-center w-[75vw] sm:w-[55vw] bg-white/5 border border-white/10 rounded-2xl p-5 flex flex-col justify-between gap-4">
            <div>
              <h3 class="text-white text-sm font-bold mb-2">{{ $item['title'] }}</h3>
              <p class="text-white/60 text-xs leading-relaxed">{{ $item['desc'] }}</p>
            </div>

          </div>
        @endforeach

      </div>
    </div>

    {{-- Desktop Grid --}}
    <div class="hidden lg:grid grid-cols-3 gap-6 items-center relative">

      <div class="flex flex-col gap-5">

        <div
          class="group bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-300 hover:-translate-y-1">
          <h3 class="text-white text-lg font-bold mb-2 group-hover:text-impost-primary transition-colors">Omzet Stagnan
          </h3>
          <p class="text-white/70 text-sm leading-relaxed mb-4">Memecah kebuntuan pertumbuhan pendapatan dengan strategi
            yang terukur.</p>
        </div>

        <div
          class="group bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-300 hover:-translate-y-1">
          <h3 class="text-white text-lg font-bold mb-2 group-hover:text-impost-primary transition-colors">Iklan Tidak
            Efisien</h3>
          <p class="text-white/70 text-sm leading-relaxed mb-4">Menghentikan pemborosan budget iklan yang tidak
            menghasilkan konversi.</p>
        </div>

        <div
          class="group bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-300 hover:-translate-y-1">
          <h3 class="text-white text-lg font-bold mb-2 group-hover:text-impost-primary transition-colors">Branding
            Terlihat Murah</h3>
          <p class="text-white/70 text-sm leading-relaxed mb-4">Meningkatkan persepsi nilai brand Anda di mata
            pelanggan.</p>
        </div>

      </div>

      <div class="relative flex justify-center py-10 lg:py-0">
        <div
          class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-impost-primary/20 blur-[100px] rounded-full -z-10">
        </div>
        <div class="relative w-full max-w-[320px] lg:max-w-full aspect-square flex items-center justify-center">
          <div
            class="relative w-64 h-64 lg:w-80 lg:h-80 rounded-full border border-white/10 bg-gradient-to-br from-white/10 to-transparent backdrop-blur-sm flex items-center justify-center shadow-2xl animate-float-slow">
            <div class="absolute inset-4 rounded-full border border-impost-primary/20"></div>
            <div
              class="absolute inset-12 rounded-full border border-white/5 bg-black/40 flex items-center justify-center text-center p-6">
              <div>
                <span class="block text-4xl font-bold text-impost-primary mb-1">ROI</span>
                <span class="text-sm text-white uppercase tracking-widest">Focused</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col gap-5">

        <div
          class="group bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-300 hover:-translate-y-1">
          <h3 class="text-white text-lg font-bold mb-2 group-hover:text-impost-primary transition-colors">Tidak Ada
            Penjualan</h3>
          <p class="text-white/70 text-sm leading-relaxed mb-4">Membangun sistem funnel otomatis yang mengubah prospek
            menjadi pembeli.</p>
        </div>

        <div
          class="group bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-300 hover:-translate-y-1">
          <h3 class="text-white text-lg font-bold mb-2 group-hover:text-impost-primary transition-colors">Bisnis Sulit
            Scale-Up</h3>
          <p class="text-white/70 text-sm leading-relaxed mb-4">Menyiapkan infrastruktur digital yang siap menampung
            pertumbuhan besar.</p>
        </div>

        <div
          class="group bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-300 hover:-translate-y-1">
          <h3 class="text-white text-lg font-bold mb-2 group-hover:text-impost-primary transition-colors">Buta Data (No
            Analytics)</h3>
          <p class="text-white/70 text-sm leading-relaxed mb-4">Mengambil keputusan bisnis berdasarkan data riil, bukan
            sekadar asumsi.</p>
        </div>

      </div>

    </div>

  </div>
</section>
