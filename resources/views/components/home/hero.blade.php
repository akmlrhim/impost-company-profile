@push('head')
  <link rel="preload" as="image" href="{{ asset('img/Front_Cover_IM.webp') }}" fetchpriority="high">
@endpush

<section id="home"
  class="relative min-h-[70vh] sm:min-h-[75vh] md:min-h-[80vh] pt-24 sm:pt-28 md:pt-32 pb-12 sm:pb-16 flex items-center overflow-hidden">

  <img src="{{ asset('img/Front_Cover_IM.webp') }}" alt="Impost Media Hero" fetchpriority="high" decoding="async"
    class="absolute inset-0 w-full h-full object-cover object-top">

  <div class="absolute inset-0 bg-linear-to-b from-black/70 via-black/60 to-black/80"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 text-center w-full">
    <h1
      class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold leading-snug sm:leading-tight tracking-tight mb-3 sm:mb-4 md:mb-6 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
      Your Expert Partner in Digital, Event, and Business Solutions
    </h1>

    <p class="text-sm sm:text-base md:text-lg text-gray-200 max-w-xl md:max-w-2xl mx-auto mb-6 sm:mb-8 leading-relaxed">
      Kami menyediakan solusi digital inovatif untuk membantu bisnis anda tumbuh lebih cepat di era modern. Mulai
      transformasi anda hari ini.
    </p>

    <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4">
      <a href="#"
        class="inline-flex items-center justify-center px-5 sm:px-7 py-2.5 sm:py-3 text-sm sm:text-base rounded-md sm:rounded-lg font-medium text-white bg-linear-to-r from-impost-primary via-impost-third to-impost-fourth transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
        Mulai Sekarang
      </a>

      <a href="#"
        class="inline-flex items-center justify-center px-5 sm:px-7 py-2.5 sm:py-3 text-sm sm:text-base rounded-md sm:rounded-lg font-medium border border-white/80 text-white transition-all duration-300 hover:bg-white hover:text-gray-900">
        Pelajari Lebih Lanjut
      </a>
    </div>
  </div>
</section>


<section id="clients" class="py-6 sm:py-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <p
      class="text-xs sm:text-sm bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent mb-10 tracking-widest uppercase font-bold">
      Klien yang telah bekerja sama dengan kami
    </p>

    <section x-data="{
        loaded: 0,
        total: {{ count($clients) * 2 }},
        ready() { this.loaded++ },
        init() {
            setTimeout(() => {
                if (this.loaded < this.total) {
                    this.loaded = this.total
                }
            }, 800)
        }
    }" class="overflow-hidden relative" x-cloak>

      <div x-show="loaded < total" x-transition.opacity.duration.300ms>
        <div class="flex gap-4 sm:gap-8 px-4 animate-pulse justify-center">
          @for ($i = 0; $i < 8; $i++)
            <div
              class="h-6 sm:h-8 md:h-10 lg:h-16 xl:h-20
                     w-20 sm:w-24 md:w-28
                     rounded-md bg-linear-to-r from-gray-700 via-gray-600 to-gray-700">
            </div>
          @endfor
        </div>
      </div>

      <div x-show="loaded >= total" x-transition.opacity.duration.500ms class="marquee-wrapper">
        <div class="flex w-max animate-marquee marquee-track">

          <div class="flex items-center gap-6 sm:gap-12 px-4 shrink-0 marquee-content">
            @foreach ($clients as $client)
              <img src="{{ asset('storage/' . $client->client_logo) }}"
                class="h-10 sm:h-12 md:h-14 lg:h-20 xl:h-24 w-auto" alt="{{ $client->filename }}" decoding="async"
                @load="ready" />
            @endforeach
          </div>

          <div class="flex items-center gap-6 sm:gap-12 px-4 shrink-0 marquee-content">
            @foreach ($clients as $client)
              <img src="{{ asset('storage/' . $client->client_logo) }}"
                class="h-10 sm:h-12 md:h-14 lg:h-20 xl:h-24 w-auto" alt="{{ $client->filename }}" decoding="async"
                @load="ready" />
            @endforeach
          </div>

        </div>
      </div>

    </section>
  </div>
</section>
