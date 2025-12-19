<style>
  :root {
    --marquee-speed: 26s;
  }

  @keyframes marquee {
    from {
      transform: translate3d(0, 0, 0);
    }

    to {
      transform: translate3d(-50%, 0, 0);
    }
  }

  .animate-marquee {
    animation: marquee var(--marquee-speed) linear infinite;
    will-change: transform;
    backface-visibility: hidden;
    transform: translateZ(0);
  }

  .animate-marquee:hover {
    animation-play-state: paused;
  }

  .marquee-wrapper {
    width: 100%;
    overflow: hidden;
    position: relative;
  }

  .marquee-track {
    justify-content: center;
  }

  .marquee-content {
    min-width: max-content;
  }

  @media(max-width:640px) {
    :root {
      --marquee-speed: 45s;
    }
  }
</style>

<section id="home"
  class="relative min-h-[70vh] sm:min-h-[75vh] md:min-h-[80vh] pt-24 sm:pt-28 md:pt-32 pb-12 sm:pb-16 flex items-center bg-cover bg-top bg-no-repeat"
  style="background-image:url('{{ asset('img/Front_Cover_IM.png') }}');">
  <div class="absolute inset-0 bg-linear-to-b from-black/70 via-black/60 to-black/80"></div>
  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 text-center w-full">
    <h1
      class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold leading-snug sm:leading-tight tracking-tight mb-3 sm:mb-4 md:mb-6 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
      Your Expert Partner in Digital, Event, and Business Solutions
    </h1>

    <p class="text-sm sm:text-base md:text-lg text-gray-200 max-w-xl md:max-w-2xl mx-auto mb-6 sm:mb-8 leading-relaxed">
      Kami menyediakan solusi digital inovatif untuk membantu bisnis Anda tumbuh lebih cepat di era modern. Mulai
      transformasi Anda hari ini.
    </p>

    <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4">
      <a href="#"
        class="inline-flex items-center justify-center px-5 sm:px-7 py-2.5 sm:py-3 text-sm sm:text-base rounded-md sm:rounded-lg font-medium text-white bg-linear-to-r from-impost-primary via-impost-third to-impost-fourth transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
        Mulai Sekarang
      </a>
      <a href="#"
        class="inline-flex items-center justify-center px-5 sm:px-7 py-2.5 sm:py-3 text-sm sm:text-base rounded-md sm:rounded-lg font-medium border border-white/80 text-white transition-all duration-300 hover:bg-white hover:text-gray-900">Pelajari
        Lebih Lanjut</a>
    </div>
  </div>
</section>


<section id="clients" class="bg-gray-950 py-6 sm:py-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <p
      class="text-xs sm:text-sm bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent mb-12 tracking-widest uppercase font-bold">
      Klien yang Mempercayai Kami
    </p>
    <div class="marquee-wrapper">
      <div class="flex w-max animate-marquee marquee-track">
        <div class="flex items-center gap-10 sm:gap-16 px-4 shrink-0 marquee-content">
          @foreach ($clients as $client)
            <img src="{{ asset('storage/' . $client->client_logo) }}"
              class="h-10 sm:h-12 md:h-14 lg:h-20 xl:h-24 w-auto transition" alt="{{ $client->filename }}"
              loading="lazy" />
          @endforeach
        </div>
        <div class="flex items-center gap-10 sm:gap-16 px-4 shrink-0 marquee-content">
          @foreach ($clients as $client)
            <img src="{{ asset('storage/' . $client->client_logo) }}"
              class="h-10 sm:h-12 md:h-14 lg:h-20 xl:h-24 w-auto transition" alt="{{ $client->filename }}"
              loading="lazy" />
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
