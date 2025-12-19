<style>
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }

  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

<section id="services">
  <div class="py-6 px-4 mx-auto max-w-7xl sm:py-12 lg:px-6">

    <div class="mb-8 lg:mb-12 text-center">
      <h2
        class="mb-4 text-xl sm:text-2xl lg:text-3xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
        Layanan Kami
      </h2>
      <p class="text-white text-xs sm:text-sm lg:text-base max-w-3xl mx-auto">
        Kami menyediakan layanan digital end-to-end yang berfokus pada peningkatan omset, visibilitas merek, dan
        efisiensi pemasaran.
      </p>
    </div>

    <div x-data="{
        active: 0,
        total: {{ $services->count() }},
    
        nextUrl: '{{ $services->nextPageUrl() }}',
        prevUrl: '{{ $services->previousPageUrl() }}',
        isLoading: false,
    
        async loadPage(url) {
            if (!url || this.isLoading) return;
            this.isLoading = true;
    
            try {
                const res = await fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
    
                const html = await res.text();
                const doc = new DOMParser().parseFromString(html, 'text/html');
    
                const newGrid = doc.querySelector('#services-desktop');
                const oldGrid = document.querySelector('#services-desktop');
    
                if (newGrid && oldGrid) {
                    oldGrid.innerHTML = newGrid.innerHTML;
                }
    
                const nextLink = doc.querySelector('[data-next-url]');
                const prevLink = doc.querySelector('[data-prev-url]');
    
                this.nextUrl = nextLink?.getAttribute('data-next-url') || null;
                this.prevUrl = prevLink?.getAttribute('data-prev-url') || null;
    
            } catch (error) {
                console.error('Error loading page:', error);
            } finally {
                this.isLoading = false;
            }
        }
    }" data-next-url="{{ $services->nextPageUrl() }}"
      data-prev-url="{{ $services->previousPageUrl() }}">

      {{-- mobile slide --}}
      <div class="md:hidden">

        <div x-ref="slider" class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar gap-4 pb-2 scroll-smooth"
          @scroll.debounce.100ms="
            active = Math.round($el.scrollLeft / $el.offsetWidth)
          ">
          @foreach ($services as $s)
            <div class="w-full shrink-0 snap-center px-2">
              <div
                class="border-2 border-impost-fourth bg-linear-to-b from-impost-primary via-impost-secondary to-impost-fourth rounded-xl overflow-hidden">
                <div class="h-48 overflow-hidden">
                  @if ($s->cover_path)
                    <img src="{{ asset('storage/' . $s->cover_path) }}" class="w-full h-full object-cover">
                  @else
                    <div class="w-full h-full flex items-center justify-center">
                      <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                    </div>
                  @endif
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
        </div>

        {{-- dots indicator --}}
        <div class="flex justify-center gap-2 mt-4">
          <template x-for="i in total" :key="i">
            <button
              @click="
                active = i - 1;
                $refs.slider.scrollTo({
                  left: (i - 1) * $refs.slider.offsetWidth,
                  behavior: 'smooth'
                });
              "
              class="h-2 rounded-full transition-all"
              :class="active === i - 1 ? 'w-6 bg-impost-primary' : 'w-2 bg-white/40'"></button>
          </template>
        </div>

      </div>

      {{-- desktop grid --}}
      <div class="hidden md:block">

        <div class="flex justify-end gap-2 mb-4">
          <button @click="loadPage(prevUrl)" :disabled="!prevUrl || isLoading"
            class="px-4 py-2 bg-impost-primary text-white rounded-md disabled:opacity-50 disabled:cursor-not-allowed hover:bg-impost-secondary transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <button @click="loadPage(nextUrl)" :disabled="!nextUrl || isLoading"
            class="px-4 py-2 bg-impost-primary text-white rounded-md disabled:opacity-50 disabled:cursor-not-allowed hover:bg-impost-secondary transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>

        {{-- loading indicator --}}
        <div x-show="isLoading" class="flex justify-center py-8">
          <div class="animate-spin rounded-full h-10 w-10 border-t-2 border-b-2 border-impost-primary"></div>
        </div>

        {{-- grid --}}
        <div id="services-desktop" x-show="!isLoading" class="grid grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach ($services as $s)
            <div
              class="border-2 border-impost-fourth bg-linear-to-b from-impost-primary via-impost-secondary to-impost-fourth rounded-md overflow-hidden">
              <div class="h-48 overflow-hidden">
                @if ($s->cover_path)
                  <img src="{{ asset('storage/' . $s->cover_path) }}" class="w-full h-full object-cover">
                @else
                  <div class="w-full h-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                  </div>
                @endif
              </div>
              <div class="p-6">
                <h3 class="text-sm md:text-base font-bold text-white mb-1.5">
                  {{ $s->service_name }}
                </h3>
                <p class="text-xs md:text-sm text-white leading-snug md:leading-relaxed">
                  {{ $s->description }}
                </p>
              </div>
            </div>
          @endforeach
        </div>

      </div>

    </div>
  </div>
</section>
