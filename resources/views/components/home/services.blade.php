<section id="services" class="relative max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8 md:py-10 overflow-hidden">

  <div class="relative mb-8 sm:mb-10 md:mb-12 text-center" data-aos="fade-up">
    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-5 sm:mb-6">
      <span class="text-impost-primary">
        Layanan Kami
      </span>
    </h2>

    <p class="text-white text-sm sm:text-base max-w-3xl mx-auto leading-relaxed px-4">
      Kami menyediakan layanan digital end-to-end yang berfokus pada peningkatan omset, visibilitas merek, dan efisiensi
      pemasaran.
    </p>
  </div>

  @if ($servicesForDesktop->isEmpty())
    <div class="flex justify-center">
      <x-empty-card item="layanan" />
    </div>
  @else
    <div x-data="{
        active: 0,
        total: {{ $servicesForDesktop->count() }},
        observer: null,
    
        init: function() {
            const slider = this.$refs.slider
            const items = Array.from(slider.children)
    
            this.observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            this.active = items.indexOf(entry.target)
                        }
                    })
                }, {
                    root: slider,
                    threshold: 0.6
                }
            )
            items.forEach((el) => this.observer.observe(el))
        }
    }" x-init="init()" class="block sm:hidden">

      <div class="relative">
        <div x-ref="slider"
          class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth gap-5 px-4 py-6">
          @foreach ($servicesForMobile as $service)
            <div class="w-[85%] shrink-0 snap-center">
              <x-service-card :service="$service" />
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <div x-data="{
        page: 0,
        perPage: 6,
        total: {{ $servicesForDesktop->count() }},
        get pages() {
            return Math.ceil(this.total / this.perPage)
        },
        next() {
            if (this.page < this.pages - 1) this.page++
        },
        prev() {
            if (this.page > 0) this.page--
        }
    }" class="hidden sm:block relative">

      <div class="overflow-hidden">
        <div class="flex transition-transform duration-500 ease-in-out"
          :style="`transform: translateX(-${page * 100}%)`">

          @foreach ($servicesForDesktop->chunk(6) as $chunk)
            <div class="min-w-full grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 px-1" data-aos="fade-left"
              data-aos-duration="800" data-aos-easing="ease-out-cubic">
              @foreach ($chunk as $index => $service)
                <div data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}" data-aos-duration="600">
                  <x-service-card :service="$service" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <div class="flex justify-center gap-4 mt-8">
        <button @click="prev" :disabled="page === 0" class="cursor-pointer text-white disabled:opacity-30">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevron-left-icon lucide-chevron-left">
            <path d="m15 18-6-6 6-6" />
          </svg>
        </button>

        <button @click="next" :disabled="page === pages - 1" class="cursor-pointer text-white disabled:opacity-30">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevron-right-icon lucide-chevron-right">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </button>
      </div>
    </div>
  @endif
</section>
