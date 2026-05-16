<section id="services" class="py-16 sm:py-20 lg:py-24">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Section header --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12 sm:mb-16">
      <div>
        <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-3">Apa yang Kami Kerjakan</p>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white">
          Layanan <span class="text-impost-primary">Kami</span>
        </h2>
      </div>
      <p class="text-base font-medium leading-relaxed text-white max-w-sm md:text-right">
        End-to-end digital solutions berfokus pada peningkatan omset, visibilitas, dan efisiensi.
      </p>
    </div>

    @if ($services->isEmpty())
      <div class="flex items-center justify-center py-20 border border-white/6 rounded-[2rem] bg-white/2">
        <x-empty-card item="Layanan" />
      </div>
    @else

      {{-- Mobile: single-item swipe slider --}}
      <div class="block sm:hidden"
        x-data="mobileSlider()" x-init="init()"
        @touchstart.passive="dragStart($event)"
        @touchmove.passive="dragMove($event)"
        @touchend="dragEnd($event)">

        <div class="overflow-hidden select-none">
          <div class="flex" :style="`transform:translateX(-${currentIndex*100}%);transition:${isDragging?'none':'transform 480ms cubic-bezier(0.23,1,0.32,1)'}`">
            @foreach ($services as $service)
              <div class="min-w-full px-1"><x-service-card :service="$service" /></div>
            @endforeach
          </div>
        </div>

        {{-- Dot indicators --}}
        <div class="flex justify-center gap-1.5 mt-4">
          @foreach ($services as $i => $service)
            <button @click="currentIndex={{ $i }};stopAutoplay()" type="button"
              class="rounded-full transition-all duration-300"
              :class="currentIndex==={{ $i }} ? 'w-5 h-1.5 bg-impost-primary' : 'w-1.5 h-1.5 bg-white/20'">
            </button>
          @endforeach
        </div>
      </div>

      {{-- Desktop: paginated 3-column grid --}}
      <div x-data="{
        page:0, pages:{{ ceil($services->count()/6) }}, transitioning:false,
        next(){ if(this.page<this.pages-1&&!this.transitioning){this.transitioning=true;this.page++;setTimeout(()=>this.transitioning=false,400);} },
        prev(){ if(this.page>0&&!this.transitioning){this.transitioning=true;this.page--;setTimeout(()=>this.transitioning=false,400);} }
      }" class="hidden sm:block">

        <div class="overflow-hidden">
          <div class="flex transition-transform duration-400 ease-in-out"
            :style="'transform:translateX(-'+(page*100)+'%)'">
            @foreach ($services->chunk(6) as $chunk)
              <div class="min-w-full grid sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 px-0.5">
                @foreach ($chunk as $service)
                  <x-service-card :service="$service" />
                @endforeach
              </div>
            @endforeach
          </div>
        </div>

        {{-- Pagination arrows --}}
        @if (ceil($services->count()/6) > 1)
          <div class="flex items-center justify-center gap-4 mt-10">
            <button @click="prev" :disabled="page===0"
              :class="page===0?'opacity-25 cursor-not-allowed':'hover:border-white/30'"
              class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full cursor-pointer inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-4 py-2 bg-white/[0.06] text-white border border-white/10 hover:bg-white/10 transition-all duration-150 cursor-pointer whitespace-nowrap w-10 h-10 p-0">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <span class="text-sm font-medium leading-relaxed text-white/50">
              <span x-text="page+1"></span> / {{ ceil($services->count()/6) }}
            </span>
            <button @click="next" :disabled="page===pages-1"
              :class="page===pages-1?'opacity-25 cursor-not-allowed':'hover:border-white/30'"
              class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full cursor-pointer inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-4 py-2 bg-white/[0.06] text-white border border-white/10 hover:bg-white/10 transition-all duration-150 cursor-pointer whitespace-nowrap w-10 h-10 p-0">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
            </button>
          </div>
        @endif

      </div>

    @endif
  </div>
</section>

<script>
  function mobileSlider() {
    return {
      currentIndex: 0, total: {{ $services->count() }},
      isDragging: false, startX: 0, threshold: 50,
      autoplayTimer: null, autoplayDelay: 3500,
      init() { this.startAutoplay(); },
      startAutoplay() {
        this.stopAutoplay();
        this.autoplayTimer = setInterval(() => {
          this.currentIndex = this.currentIndex >= this.total-1 ? 0 : this.currentIndex+1;
        }, this.autoplayDelay);
      },
      stopAutoplay() { if(this.autoplayTimer){ clearInterval(this.autoplayTimer); this.autoplayTimer=null; } },
      dragStart(e) { this.isDragging=true; this.startX=e.touches?e.touches[0].clientX:e.clientX; this.stopAutoplay(); },
      dragMove()   {},
      dragEnd(e)   {
        if(!this.isDragging) return; this.isDragging=false;
        const endX = e?.changedTouches ? e.changedTouches[0].clientX : (e?.clientX ?? this.startX);
        const diff = this.startX - endX;
        if (Math.abs(diff) > this.threshold) {
          this.currentIndex = diff>0 ? Math.min(this.currentIndex+1, this.total-1) : Math.max(this.currentIndex-1, 0);
        }
        this.startAutoplay();
      }
    };
  }
</script>
