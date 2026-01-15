<section id="home" class="relative min-h-[80vh] md:min-h-screen flex items-center overflow-hidden">

  <div class="absolute inset-0 z-0">
    <img src="{{ asset('img/hero.webp') }}" alt="Impost Media Background" loading="lazy"
      class="w-full h-full object-cover object-center">

    <div class="absolute inset-0 bg-black/40"></div>
    <div class="absolute inset-0 bg-gradient-to-b md:bg-gradient-to-r from-black via-black/40 to-transparent"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
  </div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 w-full py-20 md:py-0">

    <div class="text-center max-w-4xl mx-auto">

      <div class="space-y-6 md:space-y-8">

        <h1
          class="font-bold text-2xl sm:text-3xl lg:text-4xl xl:text-5xl leading-tight tracking-tight animate-fade-in-up">
          <span
            class="inline-block py-2 bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
            Naikkan Omzet Bisnis Anda 2–3x dalam 90 Hari dengan Digital Marketing
          </span>
        </h1>

        <p
          class="text-base sm:text-lg text-gray-300 leading-relaxed max-w-xl mx-auto animate-fade-in-up animate-delay-2">
          Bukan sekadar konten atau iklan, tapi sistem pertumbuhan terukur yang bisa diaudit dan dipertanggungjawabkan.
        </p>

        <div class="pt-4 flex justify-center animate-fade-in-up animate-delay-3">
          <button onclick="window.location.href='{{ route('vsl-form') }}'"
            class="w-full sm:w-auto px-8 py-4 bg-impost-primary hover:bg-impost-secondary text-black font-bold rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-impost-primary/40">
            Ajukan diskusi strategis sekarang
          </button>
        </div>

      </div>

    </div>
  </div>

</section>
