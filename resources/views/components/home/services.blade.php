<section id="services" class="relative max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-24 overflow-hidden">

  <div class="relative mb-6 sm:mb-10 md:mb-12 text-center">
    <h2 class="text-2xl sm:text-3xl md:text-5xl font-medium font-header mb-3 sm:mb-5 md:mb-6">
      <span class="text-impost-primary">Layanan Kami</span>
    </h2>
    <p class="text-white text-sm lg:text-base max-w-3xl mx-auto leading-relaxed px-4">
      Kami menyediakan layanan digital end-to-end yang berfokus pada peningkatan omset, visibilitas merek, dan efisiensi
      pemasaran.
    </p>
  </div>

  @if ($services->isEmpty())
    <div class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
      <x-empty-card item="Layanan" />
    </div>
  @else
    <div class="block sm:hidden">
      <div class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth gap-4 px-4 py-4"
        style="scrollbar-width: none; -ms-overflow-style: none;">
        @foreach ($services as $service)
          <div class="w-[80%] shrink-0 snap-center">
            <x-service-card :service="$service" />
          </div>
        @endforeach
      </div>
    </div>

    <div x-data="{
        page: 0,
        pages: {{ ceil($services->count() / 6) }},
        transitioning: false,
        next() {
            if (this.page < this.pages - 1 && !this.transitioning) {
                this.transitioning = true;
                this.page++;
                setTimeout(() => this.transitioning = false, 400);
            }
        },
        prev() {
            if (this.page > 0 && !this.transitioning) {
                this.transitioning = true;
                this.page--;
                setTimeout(() => this.transitioning = false, 400);
            }
        }
    }" class="hidden sm:block relative">

      <div class="overflow-hidden">
        <div class="flex transition-transform duration-400 ease-in-out"
          :style="'transform: translateX(-' + (page * 100) + '%)'">

          @foreach ($services->chunk(6) as $chunk)
            <div class="min-w-full grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 px-1"
              style="content-visibility: auto; contain-intrinsic-size: 0 600px;">
              @foreach ($chunk as $service)
                <x-service-card :service="$service" />
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <div class="flex justify-center gap-4 mt-6 sm:mt-8">
        <button @click="prev" :disabled="page === 0"
          :class="page === 0 ? 'opacity-30 cursor-not-allowed' : 'cursor-pointer'" class="text-white transition-opacity"
          type="button" aria-label="Previous page">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="m15 18-6-6 6-6" />
          </svg>
        </button>

        <button @click="next" :disabled="page === pages - 1"
          :class="page === pages - 1 ? 'opacity-30 cursor-not-allowed' : 'cursor-pointer'"
          class="text-white transition-opacity" type="button" aria-label="Next page">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </button>
      </div>
    </div>
  @endif
</section>
