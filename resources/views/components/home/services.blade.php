<section id="services" class="max-w-7xl mx-auto px-4 mb-12 sm:mb-24">

  <div class="mb-6 sm:mb-10 text-center">
    <h2
      class="text-xl sm:text-2xl lg:text-4xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent mb-2">
      Layanan Kami
    </h2>
    <p class="text-white text-sm sm:text-md lg:text-base max-w-3xl mx-auto">
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
      <div class="px-6">
        <div x-ref="slider" class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth gap-6">
          @foreach ($servicesForMobile as $service)
            <div class="w-full shrink-0 snap-center">
              <x-service-card :service="$service" />
            </div>
          @endforeach
        </div>
      </div>

      {{-- Indicator --}}
      <div class="flex justify-center gap-2 mt-4">
        <template x-for="i in total" :key="i">
          <span class="h-2 rounded-full transition-all"
            :class="active === i - 1 ?
                'w-6 bg-impost-primary' :
                'w-2 bg-white/40'"></span>
        </template>
      </div>
    </div>

    <div class="hidden sm:grid lg:grid-cols-3 gap-6">
      @foreach ($servicesForDesktop as $service)
        <x-service-card :service="$service" />
      @endforeach
    </div>

    <div class="hidden sm:flex justify-center mt-8">
      <x-custom-pagination :items="$servicesForDesktop" />
    </div>

  @endif
</section>
