<style>
  @keyframes marquee {
    from {
      transform: translate3d(0, 0, 0);
    }

    to {
      transform: translate3d(-50%, 0, 0);
    }
  }

  .animate-marquee {
    animation: marquee 60s linear infinite;
    will-change: transform;
    backface-visibility: hidden;
    transform: translateZ(0);
  }

  .animate-marquee:hover {
    animation-play-state: paused;
  }

  @media (max-width: 640px) {
    .animate-marquee {
      animation-duration: 90s;
    }
  }

  .marquee-wrapper {
    width: 100%;
    overflow: hidden;
    position: relative;
  }
</style>

<section id="home" class="relative min-h-screen flex items-center bg-cover bg-center bg-no-repeat"
  style="background-image: url('{{ asset('img/Front_Cover_IM.png') }}');">

  <div class="absolute inset-0 bg-linear-to-b from-black/70 via-black/60 to-black/80"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 text-center w-full">

    <h1
      class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold leading-snug sm:leading-tight tracking-tight mb-4 sm:mb-6 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
      Your Expert Partner in Digital, Event, and Business Solutions
    </h1>

    <p class="text-sm sm:text-base md:text-lg text-gray-200 max-w-xl md:max-w-2xl mx-auto mb-6 sm:mb-10 leading-relaxed">
      Kami menyediakan solusi digital inovatif untuk membantu bisnis Anda tumbuh
      lebih cepat di era modern. Mulai transformasi Anda hari ini.
    </p>

    <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4 mb-14">
      <a href="#"
        class="inline-flex items-center justify-center px-5 sm:px-8 py-2.5 sm:py-3 text-sm sm:text-base rounded-md sm:rounded-lg font-medium text-white bg-linear-to-r from-impost-primary via-impost-third to-impost-fourth transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
        Mulai Sekarang
      </a>

      <a href="#"
        class="inline-flex items-center justify-center px-5 sm:px-8 py-2.5 sm:py-3 text-sm sm:text-base rounded-md sm:rounded-lg font-medium border border-white/80 text-white transition-all duration-300 hover:bg-white hover:text-gray-900">
        Pelajari Lebih Lanjut
      </a>
    </div>

    <div class="w-full">
      <p class="text-xs sm:text-sm text-gray-300 mb-4 tracking-widest uppercase">
        Mitra yang Telah Bekerja Sama
      </p>

      <div class="marquee-wrapper">
        <div class="flex w-max animate-marquee">

          <div class="flex items-center gap-8 sm:gap-12 px-4 sm:px-6 shrink-0">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
          </div>

          <div class="flex items-center gap-8 sm:gap-12 px-4 sm:px-6 shrink-0">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
            <img src="{{ asset('img/logo_impost_putih.png') }}"
              class="h-8 sm:h-10 md:h-12 w-auto opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition shrink-0"
              alt="">
          </div>

        </div>
      </div>
    </div>

  </div>
</section>
