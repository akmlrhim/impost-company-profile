<section id="home" class="relative min-h-screen pt-28 sm:pt-36 pb-16 flex items-center overflow-hidden">

  <div class="absolute inset-0 z-0">
    <img src="{{ asset('img/hero.webp') }}" alt="Impost Media Background" loading="lazy" encoding="async"
      class="w-full h-full object-cover">

    <div class="absolute inset-0 bg-black/70"></div>

    <div class="absolute inset-0 bg-gradient-to-r from-black via-black/80 to-transparent"></div>

    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
  </div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

      <div class="space-y-6 sm:space-y-8 text-center sm:text-left">

        <h1
          class="font-bold text-4xl sm:text-5xl lg:text-6xl xl:text-7xl leading-[1.05] tracking-tight animate-fade-in-up animate-delay-1">
          <span
            class="font-header block mt-2 leading-[1.05] bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
            Naikkan Omzet Bisnis Anda 2–3x dalam 90 Hari dengan Digital Marketing
          </span>
        </h1>

        <p
          class="text-sm sm:text-lg text-gray-300 leading-relaxed max-w-xl mx-auto sm:mx-0 animate-fade-in-up animate-delay-2">
          Bukan sekadar konten atau iklan, tapi sistem pertumbuhan terukur yang bisa diaudit dan dipertanggungjawabkan.
        </p>


        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center sm:justify-start">

          <button onclick="window.location.href='{{ route('vsl-form') }}'"
            class="w-full sm:w-auto cursor-pointer px-8 py-3
									bg-impost-primary hover:bg-impost-secondary
									text-black font-semibold rounded-lg
									transition-all duration-300
									hover:scale-105 hover:shadow-lg hover:shadow-impost-primary/50">
            Ajukan diskusi strategis sekarang
          </button>

        </div>
      </div>

      <!-- Decorative elements on right side for desktop -->
      <div class="lg:block hidden">
        <div class="relative z-10 space-y-6">

          <!-- Floating Cards -->
          <div class="space-y-4 animate-float">

            <!-- Card 1: Stats -->
            <div
              class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl p-6 shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
              <div class="flex items-center gap-4">
                <div
                  class="w-12 h-12 rounded-lg bg-gradient-to-br from-impost-primary to-impost-secondary flex items-center justify-center">
                  <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                  </svg>
                </div>
                <div>
                  <p class="text-2xl font-bold text-white">2-3x</p>
                  <p class="text-sm text-gray-300">ROI Growth</p>
                </div>
              </div>
            </div>

            <!-- Card 2: Time -->
            <div
              class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl p-6 shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105 ml-8">
              <div class="flex items-center gap-4">
                <div
                  class="w-12 h-12 rounded-lg bg-gradient-to-br from-impost-secondary to-impost-fourth flex items-center justify-center">
                  <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </div>
                <div>
                  <p class="text-2xl font-bold text-white">90 Hari</p>
                  <p class="text-sm text-gray-300">Hasil Terukur</p>
                </div>
              </div>
            </div>

            <div
              class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl p-6 shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
              <div class="flex items-center gap-4">
                <div
                  class="w-12 h-12 rounded-lg bg-gradient-to-br from-impost-fourth to-impost-primary flex items-center justify-center">
                  <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                  </svg>
                </div>
                <div>
                  <p class="text-2xl font-bold text-white">20+</p>
                  <p class="text-sm text-gray-300">Klien Puas</p>
                </div>
              </div>
            </div>

          </div>

          <div class="absolute -top-20 -right-20 w-64 h-64 bg-impost-primary/20 rounded-full blur-3xl animate-pulse">
          </div>
          <div
            class="absolute top-40 -right-10 w-48 h-48 bg-impost-secondary/20 rounded-full blur-3xl animate-pulse animation-delay-1000">
          </div>

        </div>
      </div>

    </div>
  </div>

</section>
