<section id="services" class="relative max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8 md:py-10 overflow-hidden">

  <div class="relative mb-8 sm:mb-10 md:mb-12 text-center">
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
    {{-- Mobile Slider - Lazy Init --}}
    <div x-data="{
        active: 0,
        total: {{ $servicesForDesktop->count() }},
        observer: null,
        initialized: false,
    
        init() {
            // Delay initialization until user scrolls near section
            if ('IntersectionObserver' in window) {
                const sectionObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !this.initialized) {
                            this.initSlider();
                            this.initialized = true;
                            sectionObserver.disconnect();
                        }
                    });
                }, { rootMargin: '50px' });
    
                sectionObserver.observe(this.$el);
            } else {
                this.initSlider();
            }
        },
    
        initSlider() {
            const slider = this.$refs.slider;
            if (!slider) return;
    
            const items = Array.from(slider.children);
    
            this.observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            this.active = items.indexOf(entry.target);
                        }
                    });
                }, {
                    root: slider,
                    threshold: 0.6
                }
            );
            items.forEach((el) => this.observer.observe(el));
        },
    
        destroy() {
            if (this.observer) {
                this.observer.disconnect();
            }
        }
    }" x-init="init()" @destroy="destroy()" class="block sm:hidden">

      <div class="relative">
        <div x-ref="slider"
          class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth gap-5 px-4 py-6"
          style="scrollbar-width: none; -ms-overflow-style: none;">
          @foreach ($servicesForMobile as $service)
            <div class="w-[85%] shrink-0 snap-center">
              <x-service-card :service="$service" />
            </div>
          @endforeach
        </div>
      </div>
    </div>

    {{-- Desktop Pagination - Optimized --}}
    <div x-data="{
        page: 0,
        perPage: 6,
        total: {{ $servicesForDesktop->count() }},
        transitioning: false,
    
        get pages() {
            return Math.ceil(this.total / this.perPage);
        },
    
        next() {
            if (this.page < this.pages - 1 && !this.transitioning) {
                this.transitioning = true;
                this.page++;
                setTimeout(() => { this.transitioning = false; }, 500);
            }
        },
    
        prev() {
            if (this.page > 0 && !this.transitioning) {
                this.transitioning = true;
                this.page--;
                setTimeout(() => { this.transitioning = false; }, 500);
            }
        }
    }" class="hidden sm:block relative">

      <div class="overflow-hidden">
        <div class="flex transition-transform duration-500 ease-in-out will-change-transform"
          :style="`transform: translateX(-${page * 100}%)`">

          @foreach ($servicesForDesktop->chunk(6) as $chunkIndex => $chunk)
            <div class="min-w-full grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 px-1">
              @foreach ($chunk as $index => $service)
                <div>
                  <x-service-card :service="$service" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <div class="flex justify-center gap-4 mt-8">
        <button @click="prev" :disabled="page === 0"
          :class="{ 'opacity-30 cursor-not-allowed': page === 0, 'cursor-pointer': page > 0 }"
          class="text-white transition-opacity" type="button" aria-label="Previous page">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevron-left" aria-hidden="true">
            <path d="m15 18-6-6 6-6" />
          </svg>
        </button>

        <button @click="next" :disabled="page === pages - 1"
          :class="{ 'opacity-30 cursor-not-allowed': page === pages - 1, 'cursor-pointer': page < pages - 1 }"
          class="text-white transition-opacity" type="button" aria-label="Next page">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevron-right" aria-hidden="true">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </button>
      </div>
    </div>
  @endif
</section>
