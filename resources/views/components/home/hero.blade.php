<section id="home" class="relative min-h-[75vh] md:min-h-screen flex items-center overflow-hidden">

  <!-- Background Image -->
  <div class="absolute inset-0 z-0">
    <img src="{{ asset('img/Front_Cover_IM.webp') }}" alt="Impost Media Background" loading="lazy" decoding="async"
      class="w-full h-full object-cover object-center">
    <div class="absolute inset-0 bg-black/60"></div>
  </div>

  <!-- Decorative Elements -->
  <div class="absolute inset-0 z-[1] overflow-hidden pointer-events-none">
    <!-- Gradient Orbs -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-impost-primary/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-impost-secondary/10 rounded-full blur-3xl"></div>

    <!-- Subtle Grid -->
    <div class="absolute inset-0 opacity-[0.03]"
      style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 60px 60px;">
    </div>

    <!-- Floating Dots -->
    <div class="absolute top-1/4 right-1/4 w-2 h-2 bg-impost-primary/40 rounded-full animate-pulse"></div>
    <div class="absolute bottom-1/3 left-1/4 w-1.5 h-1.5 bg-white/30 rounded-full animate-pulse"
      style="animation-delay: 1s;"></div>
  </div>

  <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 w-full py-16 md:py-0">
    <div class="text-center max-w-4xl mx-auto space-y-4 sm:space-y-6 md:space-y-8">

      <h1 class="font-medium text-xl sm:text-3xl lg:text-4xl xl:text-5xl">
        <span class="inline-block py-1.5 sm:py-2 text-impost-primary font-header leading-snug">
          Naikkan Omzet Bisnis Anda 2–3x dalam 90 Hari dengan Digital Marketing
        </span>
      </h1>

      <p class="text-xs sm:text-sm md:text-base text-white max-w-xl mx-auto leading-relaxed">
        Bukan sekadar konten atau iklan, tapi sistem pertumbuhan terukur yang bisa diaudit dan dipertanggungjawabkan.
      </p>

      <div class="pt-2 sm:pt-4 flex justify-center">
        <button onclick="window.location.href='{{ route('vsl-form') }}'"
          class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:w-auto px-5 sm:px-8 py-2.5 sm:py-4 bg-impost-primary hover:bg-impost-secondary text-black text-sm sm:text-base md:text-lg font-bold rounded-xl cursor-pointer whitespace-nowrap transition-colors duration-300">
          Konsultasi Sekarang
        </button>
      </div>

    </div>
  </div>

</section>
