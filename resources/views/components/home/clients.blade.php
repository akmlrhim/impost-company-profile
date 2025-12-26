<section id="clients" class="py-6 sm:py-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <p data-aos="fade-up" data-aos-duration="700" data-aos-offset="120" data-aos-easing="ease-out-cubic"
      class="mb-10 text-impost-primary font-extrabold tracking-wide text-sm uppercase sm:text-md">
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
        class="flex gap-4 sm:gap-8 px-4 justify-center animate-pulse">

        @for ($i = 0; $i < 8; $i++)
          <div
            class="h-6 sm:h-8 md:h-10 lg:h-16 xl:h-20 w-20 sm:w-24 md:w-28 rounded-md bg-linear-to-r from-gray-700 via-gray-600 to-gray-700">
          </div>
        @endfor
      </div>

      <div x-show="loaded >= total" x-transition.opacity.duration.500ms class="marquee-wrapper">
        <div class="flex w-max animate-marquee marquee-track">

          <div class="flex items-center gap-6 sm:gap-12 px-4 shrink-0 marquee-content">
            @foreach ($clients as $client)
              <img src="{{ asset('storage/' . $client->client_logo) }}" alt="{{ $client->filename }}"
                class="h-10 sm:h-12 md:h-14 lg:h-20 xl:h-24 w-auto" decoding="async" loading="lazy"
                x-init="markLoaded()">
            @endforeach
          </div>

          <div class="flex items-center gap-6 sm:gap-12 px-4 shrink-0 marquee-content">
            @foreach ($clients as $client)
              <img src="{{ asset('storage/' . $client->client_logo) }}" alt="{{ $client->filename }}"
                class="h-10 sm:h-12 md:h-14 lg:h-20 xl:h-24 w-auto" decoding="async" loading="lazy"
                x-init="markLoaded()">
            @endforeach
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
