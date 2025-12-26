<section id="services" class="max-w-7xl mx-auto px-4 py-4">

  <div class="mb-4 sm:mb-8 text-center">
    <h2
      class="text-xl sm:text-2xl lg:text-4xl font-bold pb-1 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent sm:mb-3 mb-1">
      Layanan Kami
    </h2>
    <p class="text-white text-xs sm:text-sm lg:text-base max-w-3xl mx-auto">
      Kami menyediakan layanan digital end-to-end yang berfokus pada peningkatan omset, visibilitas merek, dan efisiensi
      pemasaran.
    </p>
  </div>

  <div x-data="{
      active: 0,
      total: {{ $servicesForMobile->count() }},
  }">

    <div class="md:hidden">

      <div x-ref="slider" class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar gap-3 pb-2 scroll-smooth"
        @scroll.debounce.100ms="
            active = Math.round($el.scrollLeft / $el.offsetWidth)
          ">
        @forelse ($servicesForMobile as $s)
          <div class="w-full shrink-0 snap-center px-3">
            <div
              class="border-2 border-impost-fourth bg-linear-to-b from-impost-primary via-impost-secondary to-impost-fourth rounded-lg overflow-hidden">
              <div class="h-48 overflow-hidden">
                <img src="{{ $s->cover_path ? asset('storage/' . $s->cover_path) : asset('img/service_default.webp') }}"
                  class="w-full h-full object-cover" loading="lazy" decoding="async" />
              </div>
              <div class="p-4">
                <h3 class="text-sm md:text-base font-bold text-white mb-1.5">
                  {{ $s->service_name }}
                </h3>
                <p class="text-xs md:text-sm text-white leading-snug md:leading-relaxed">
                  {{ $s->description }}
                </p>
              </div>
            </div>
          </div>
        @endforeach

        @if ($servicesForMobile->count() == 0)
          <x-empty-card item="layanan" />
        @endif
      </div>

      {{-- indicator  --}}
      <div class="flex justify-center gap-2 mt-4">
        <template x-for="i in total" :key="i">
          <button
            @click="
                active = i - 1;
                $refs.slider.scrollTo({
                  left: (i - 1) * $refs.slider.offsetWidth,
                  behavior: 'smooth'
                })
              "
            class="h-2 rounded-full transition-all"
            :class="active === i - 1 ? 'w-6 bg-impost-primary' : 'w-2 bg-white/40'"></button>
        </template>
      </div>

    </div>

    <div id="services-desktop" class="hidden md:grid md:grid-cols-3 lg:grid-cols-3 gap-6 w-full">
      @forelse ($servicesForDesktop as $s)
        <div
          class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth overflow-hidden rounded-lg">
          <div class="h-48 overflow-hidden">
            <img src="{{ $s->cover_path ? asset('storage/' . $s->cover_path) : asset('img/service_default.webp') }}"
              class="w-full h-full object-cover" loading="lazy" decoding="async" />
          </div>
          <div class="p-4">
            <h3 class="text-sm md:text-base font-bold text-white mb-1.5">
              {{ $s->service_name }}
            </h3>
            <p class="text-xs md:text-sm text-white leading-snug md:leading-relaxed">
              {{ $s->description }}
            </p>
          </div>
        </div>
      @empty
        <div class="col-span-full flex justify-center items-center">
          <x-empty-card item="layanan" class="w-full" />
        </div>
      @endforelse

      <div class="py-5">
        <x-custom-pagination :items="$servicesForDesktop" />
      </div>

    </div>

  </div>
</section>
