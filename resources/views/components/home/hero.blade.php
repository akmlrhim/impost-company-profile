<section id="home" class="relative min-h-screen pt-28 sm:pt-36 pb-16 flex items-center overflow-hidden">

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

      <!-- Left Content: Headline -->
      <div class="space-y-6 sm:space-y-8 text-center sm:text-left">

        <!-- Main Headline -->
        <h1
          class="font-bold text-4xl sm:text-5xl lg:text-6xl xl:text-7xl leading-[1.05] tracking-tight animate-fade-in-up animate-delay-1">
          <span
            class="font-header block mt-2 leading-[1.05] bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
            Naikkan Omzet Bisnis Anda 2–3x dalam 90 Hari dengan Digital Marketing
          </span>
        </h1>

        <!-- Description -->
        <p
          class="text-sm sm:text-lg text-gray-300 leading-relaxed max-w-xl mx-auto sm:mx-0 animate-fade-in-up animate-delay-2">
          Bukan sekadar konten atau iklan, tapi sistem pertumbuhan terukur yang bisa diaudit dan dipertanggungjawabkan.
        </p>


        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center sm:justify-start">

          <button onclick="window.location.href='{{ route('contact') }}'"
            class="w-full sm:w-auto cursor-pointer px-8 py-3
									bg-impost-primary hover:bg-impost-secondary
									text-black font-semibold rounded-lg
									transition-all duration-300
									hover:scale-105 hover:shadow-lg hover:shadow-impost-primary/50">
            Ajukan diskusi strategis sekarang
          </button>

        </div>
      </div>

      <!-- Right Content: Image/Asset -->
      <div class="relative lg:block hidden">

        <!-- Main Image Container -->
        <div class="relative z-10 animate-float overflow-hidden rounded-2xl">

          <!-- Glow Background -->
          <div
            class="absolute -inset-4 bg-gradient-to-r from-impost-primary/20 to-impost-secondary/20 rounded-2xl blur-2xl">
          </div>

          <!-- IMAGE -->
          <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&h=1000&fit=crop"
            alt="Impost Media Hero" class="relative w-full h-auto object-cover rounded-2xl">

          <!-- OVERLAY -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent">
          </div>

        </div>
      </div>

      <!-- Mobile Image -->
      <div class="lg:hidden relative">

        <div class="relative overflow-hidden rounded-xl">

          <!-- Glow -->
          <div
            class="absolute -inset-2 bg-gradient-to-r from-impost-primary/20 to-impost-secondary/20 rounded-2xl blur-xl">
          </div>

          <!-- IMAGE -->
          <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600&h=700&fit=crop"
            alt="Impost Media Hero" class="relative w-full h-auto object-cover rounded-xl">

          <!-- OVERLAY -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
          </div>

        </div>

      </div>
    </div>
  </div>

</section>
