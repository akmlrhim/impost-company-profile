<section id="home" class="relative min-h-[80vh] md:min-h-screen flex items-center overflow-hidden">

  <div class="absolute inset-0 z-0">
    <img src="{{ asset('img/Front_Cover_IM.webp') }}" alt="Impost Media Background" loading="lazy" decoding="async"
      class="w-full h-full object-cover object-center">

    <div class="absolute inset-0 bg-black/60"></div>
  </div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 w-full py-20 md:py-0">

    <div class="text-center max-w-4xl mx-auto">

      <div class="space-y-6 md:space-y-8">

        <h1 class="font-medium text-2xl sm:text-3xl lg:text-4xl xl:text-5xl">
          <span class="inline-block py-2 text-impost-primary font-header ">
            Naikkan Omzet Bisnis Anda 2–3x dalam 90 Hari dengan Digital Marketing
          </span>
        </h1>

        <p class="text-md text-white max-w-xl mx-auto">
          Bukan sekadar konten atau iklan, tapi sistem pertumbuhan terukur yang bisa diaudit dan dipertanggungjawabkan.
        </p>

        <div class="pt-4 flex justify-center">
          <button onclick="window.location.href='{{ route('vsl-form') }}'"
            class="tracking-tight capitalize w-full max-w-xs sm:max-w-sm md:max-w-md lg:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-impost-primary hover:bg-impost-secondary text-black text-md sm:text-lg font-bold rounded-xl cursor-pointer whitespace-nowrap">
            Konsultasi Sekarang
          </button>
        </div>

      </div>

    </div>
  </div>

</section>
