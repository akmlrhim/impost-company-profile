<section id="clients" class="py-10 sm:py-12 md:py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <p data-aos="fade-up" data-aos-duration="700" data-aos-offset="120" data-aos-easing="ease-out-cubic"
      class="mb-8 sm:mb-10 md:mb-12 text-impost-primary font-extrabold tracking-wide text-xs sm:text-sm uppercase">
      Klien yang telah bekerja sama dengan kami
    </p>

    <div x-data="{
        loaded: 0,
        total: {{ count($clients) * 2 }},
        markLoaded() { this.loaded++ },
    }" x-init="$nextTick(() => {
        setTimeout(() => {
            if (loaded < total) loaded = total
        }, 1000)
    })" class="relative overflow-hidden" x-cloak data-aos="fade-up"
      data-aos-delay="150" data-aos-duration="800" data-aos-offset="120" data-aos-easing="ease-out-cubic">

      <div x-show="loaded < total" x-transition.opacity.duration.300ms
        class="flex gap-4 sm:gap-6 md:gap-8 px-4 justify-center animate-pulse">

        @for ($i = 0; $i < 8; $i++)
          <div
            class="h-8 sm:h-10 md:h-12 lg:h-14 w-16 sm:w-20 md:w-24 lg:w-28 rounded-md bg-gradient-to-r from-gray-700 via-gray-600 to-gray-700">
          </div>
        @endfor
      </div>

      <div x-show="loaded >= total" x-transition.opacity.duration.500ms class="marquee-wrapper">
        <div class="flex w-max animate-marquee marquee-track">

          <div
            class="flex items-center gap-4 sm:gap-6 md:gap-8 lg:gap-10 xl:gap-12 px-3 sm:px-4 shrink-0 marquee-content">
            @foreach ($clients as $client)
              <img src="{{ asset('storage/' . $client->client_logo) }}" alt="{{ $client->filename }}"
                class="h-8 sm:h-10 md:h-12 lg:h-16 xl:h-20 w-auto object-contain" decoding="async" loading="lazy"
                x-init="markLoaded()">
            @endforeach
          </div>

          <div
            class="flex items-center gap-4 sm:gap-6 md:gap-8 lg:gap-10 xl:gap-12 px-3 sm:px-4 shrink-0 marquee-content">
            @foreach ($clients as $client)
              <img src="{{ asset('storage/' . $client->client_logo) }}" alt="{{ $client->filename }}"
                class="h-8 sm:h-10 md:h-12 lg:h-16 xl:h-20 w-auto object-contain" decoding="async" loading="lazy"
                x-init="markLoaded()">
            @endforeach
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
