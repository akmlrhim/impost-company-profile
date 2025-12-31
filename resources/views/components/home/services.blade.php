<section id="services" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-20">

  <div class="mb-10 sm:mb-12 md:mb-16 text-center" data-aos="fade-up">
    <h2
      class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent mb-3 sm:mb-4">
      Layanan Kami
    </h2>
    <p class="text-white text-sm sm:text-base md:text-lg max-w-2xl lg:max-w-3xl mx-auto leading-relaxed px-2">
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
          class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth gap-4 px-1 py-2">
          @foreach ($servicesForMobile as $service)
            <div class="w-[calc(100%-2rem)] shrink-0 snap-center">
              <x-service-card :service="$service" />
            </div>
          @endforeach
        </div>
      </div>

      {{-- Indicator --}}
      <div class="flex justify-center gap-2 mt-6">
        <template x-for="i in total" :key="i">
          <span class="h-2 rounded-full transition-all duration-300"
            :class="active === i - 1 ?
                'w-8 bg-impost-primary' :
                'w-2 bg-white/30'"></span>
        </template>
      </div>
    </div>

    <div class="hidden sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-7 lg:gap-8" data-aos="fade-up">
      @foreach ($servicesForDesktop as $service)
        <x-service-card :service="$service" />
      @endforeach
    </div>

    <div class="hidden sm:flex justify-center mt-10 sm:mt-12 md:mt-14" data-aos="fade-up">
      <x-custom-pagination :items="$servicesForDesktop" />
    </div>

  @endif
</section>
