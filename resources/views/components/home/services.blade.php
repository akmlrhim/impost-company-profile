<section id="services" class="py-16 sm:py-20 lg:py-24 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Section header --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10 sm:mb-14 text-center md:text-left">
      <div>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white">
          Layanan <span class="text-impost-primary">Kami</span>
        </h2>
      </div>
      <p class="text-base font-normal leading-relaxed text-white max-w-sm md:text-right mx-auto md:mx-0">
        End-to-end digital solutions berfokus pada peningkatan omset, visibilitas, dan efisiensi.
      </p>
    </div>

    @if ($services->isEmpty())
      <div class="flex items-center justify-center py-20 border border-white/6 rounded-[2rem] bg-white/2">
        <x-empty-card item="Layanan" />
      </div>
    @else
      @php $serviceList = $services->values(); @endphp

      <div x-data="{
          active: 0,
          total: {{ $serviceList->count() }},
          timer: null,
          progress: false,
          delay: 4500,
          init() { this.startAuto(); },
          go(idx) {
              this.active = idx;
              this.startAuto();
          },
          startAuto() {
              clearInterval(this.timer);
              this.progress = false;
              this.$nextTick(() => { this.progress = true; });
              this.timer = setInterval(() => {
                  this.active = (this.active + 1) % this.total;
                  this.progress = false;
                  this.$nextTick(() => { this.progress = true; });
              }, this.delay);
          }
      }" x-init="init()">

        {{-- Large image panel --}}
        <div
          class="relative w-full rounded-2xl overflow-hidden mb-8 sm:mb-10
                    aspect-[16/9] sm:aspect-[16/7] lg:aspect-[16/6]
                    border border-white/[0.08] bg-black/30">

          @foreach ($serviceList as $i => $service)
            <div x-show="active === {{ $i }}"
              x-transition:enter="transition-opacity duration-500 ease-in-out" x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-300 ease-in-out"
              x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0"
              style="display:none">
              @if ($service->cover_path)
                <img src="{{ asset('storage/' . $service->cover_path) }}" alt="{{ $service->service_name }}"
                  class="w-full h-full object-cover" loading="{{ $i === 0 ? 'eager' : 'lazy' }}">
              @else
                <div class="w-full h-full flex items-center justify-center bg-white/[0.03]">
                  <svg class="w-16 h-16 text-white/10" fill="none" stroke="currentColor" stroke-width="1"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                  </svg>
                </div>
              @endif

              {{-- Gradient overlay bottom --}}
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent pointer-events-none">
              </div>

              {{-- Category badge --}}
              @if ($service->category === 'Utama')
                <div class="absolute top-4 left-4 z-10">
                  <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-impost-primary text-[#040404]">Utama</span>
                </div>
              @elseif ($service->category === 'Tambahan')
                <div class="absolute top-4 left-4 z-10">
                  <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider border border-white/30 text-white backdrop-blur-sm">Tambahan</span>
                </div>
              @endif

              {{-- Service name overlay on image --}}
              <div class="absolute bottom-5 left-5 right-5 z-10 sm:hidden">
                <h3 class="font-bold text-white text-lg leading-tight drop-shadow-lg">{{ $service->service_name }}</h3>
              </div>
            </div>
          @endforeach

          {{-- Progress bar --}}
          <div class="hidden sm:block absolute bottom-0 left-0 right-0 z-30 h-[3px] bg-white/10">
            <div :style="progress ? `transition:width ${delay}ms linear; width:100%` : 'width:0%; transition:none'"
              class="h-full bg-impost-primary"></div>
          </div>

        </div>

        {{-- Service tabs grid --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 hidden sm:grid">
          @foreach ($serviceList as $i => $service)
            <button type="button" @click="go({{ $i }})"
              class="group relative text-left px-6 py-5 transition-colors duration-200 cursor-pointer bg-[#040404]">

              <h3 :class="active === {{ $i }} ? 'text-white' : 'text-white/30 group-hover:text-white/55'"
                class="font-bold text-sm sm:text-base leading-snug mb-2 transition-colors duration-200">
                {{ $service->service_name }}
              </h3>

              <p :class="active === {{ $i }} ? 'text-white/55' : 'text-white/18 group-hover:text-white/35'"
                class="text-xs sm:text-sm font-medium leading-relaxed transition-colors duration-200 line-clamp-3">
                {{ $service->description }}
              </p>
            </button>
          @endforeach
        </div>

        {{-- Mobile: vertical list --}}
        <div class="sm:hidden mt-4 relative space-y-1">
          @foreach ($serviceList as $i => $service)
            <button
              type="button"
              @click="go({{ $i }})"
              :class="active === {{ $i }}
                ? 'bg-white/[0.07] border-impost-primary/30'
                : 'bg-white/[0.02] border-white/[0.06] hover:bg-white/[0.04]'"
              :style="active < {{ $i }}
                ? 'filter:blur(' + Math.min(({{ $i }} - active) * 1.5, 4) + 'px);opacity:' + Math.max(0.15, 0.6 - ({{ $i }} - active) * 0.18)
                : ''"
              class="w-full text-left px-4 py-3.5 rounded-xl border transition-all duration-300 flex items-start gap-3 cursor-pointer"
            >
              {{-- Active indicator dot --}}
              <div class="mt-1.5 flex-shrink-0">
                <div
                  :class="active === {{ $i }} ? 'bg-impost-primary' : 'bg-white/20'"
                  class="w-1.5 h-1.5 rounded-full transition-colors duration-300"
                ></div>
              </div>
              <div class="min-w-0">
                <h3
                  :class="active === {{ $i }} ? 'text-white' : 'text-white/60'"
                  class="font-bold text-sm leading-snug mb-0.5 transition-colors duration-200"
                >{{ $service->service_name }}</h3>
                <p
                  :class="active === {{ $i }} ? 'text-white/70' : 'text-white/40'"
                  class="text-xs leading-relaxed line-clamp-2 transition-colors duration-200"
                >{{ $service->description }}</p>
              </div>
            </button>
          @endforeach

          {{-- Gradient fade at bottom --}}
          <div class="absolute bottom-0 left-0 right-0 h-16 pointer-events-none"
               style="background:linear-gradient(to bottom, transparent, rgba(4,4,4,0.9))"></div>
        </div>

      </div>

    @endif
  </div>
</section>
