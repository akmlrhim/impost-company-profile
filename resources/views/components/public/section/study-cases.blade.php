@php
  $studyCases = \App\Models\StudyCase::select('slug', 'name', 'cover_path', 'category', 'result')->latest()->get();
@endphp

<section class="py-16 sm:py-20 lg:py-24 bg-impost-fifth overflow-hidden" id="study-cases">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header + nav arrows --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 mb-10 sm:mb-14">
      <div>
        <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-3">Hasil Nyata</p>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white">
          Bukan Janji<br><span class="text-impost-primary">Kosong.</span>
        </h2>
      </div>

      @if ($studyCases->isNotEmpty())
        <div class="flex gap-2 items-center">
          <button type="button" aria-label="Previous"
            class="studycase-prev inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/[0.06] text-white border border-white/10 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-150 cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button type="button" aria-label="Next"
            class="studycase-next inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/[0.06] text-white border border-white/10 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-150 cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      @endif
    </div>

    @if ($studyCases->isNotEmpty())
      {{-- Skeleton --}}
      <div id="studycases-carousel-skeleton" class="flex gap-4 overflow-hidden animate-pulse mb-6">
        @for ($i = 0; $i < 3; $i++)
          <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0">
            <div class="h-[300px] sm:h-[340px] rounded-[1.5rem] bg-white/[0.04] border border-white/[0.08]"></div>
          </div>
        @endfor
      </div>

      {{-- Slider --}}
      <div id="studycases-carousel-content"
        class="studycase-slider relative w-full overflow-hidden opacity-0 transition-opacity duration-500">
        <div class="studycase-track flex gap-4">
          @foreach ($studyCases as $case)
            <div class="studycase-slide flex-shrink-0 w-full md:w-[calc(50%-0.5rem)] lg:w-[calc(33.333%-0.667rem)]">
              <a href="{{ route('detail-study-case', $case->slug) }}"
                class="group flex flex-col h-full bg-white/[0.04] border border-white/[0.08] rounded-2xl hover:border-impost-primary/30 p-4 sm:p-5 transition-all duration-300 hover:-translate-y-1">

                {{-- Cover --}}
                <div class="relative w-full aspect-video mb-4 overflow-hidden rounded-xl bg-black/20 flex-shrink-0">
                  @if ($case->cover_path)
                    <img src="{{ asset('storage/' . $case->cover_path) }}" alt="{{ $case->name }}"
                      class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                      loading="lazy">
                  @else
                    <div class="w-full h-full flex items-center justify-center">
                      <span class="text-xs font-medium text-white/20">No Preview</span>
                    </div>
                  @endif
                </div>

                {{-- Content --}}
                <div class="flex flex-col flex-1">
                  <div class="mb-3">
                    <span
                      class="inline-flex items-center gap-1 px-3.5 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-[#d4ac3c] text-[#040404]">{{ $case->category ?? 'CASE STUDY' }}</span>
                  </div>
                  <h3
                    class="font-bold text-white group-hover:text-impost-primary text-sm mb-2 leading-snug transition-colors">
                    {{ $case->name }}
                  </h3>
                  <p class="text-sm font-medium leading-relaxed text-white line-clamp-3 flex-1">
                    {{ strip_tags($case->result) }}
                  </p>
                  <div
                    class="mt-4 pt-3 border-t border-white/6 flex items-center text-sm font-bold leading-relaxed text-white group-hover:text-impost-primary transition-colors">
                    Lihat Detail
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>

      </div>

      <div class="mt-5 flex justify-center">
        <a href="{{ route('study-case') }}"
          class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5 bg-[#d4ac3c] text-[#040404] hover:bg-[#d09738] transition-colors duration-150 cursor-pointer whitespace-nowrap">
          Lihat Semua
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
        </a>
      </div>
    @else
      <div class="flex items-center justify-center py-20 border border-white/6 rounded-[2rem] bg-white/2">
        <x-empty-card item="Study Case" />
      </div>
    @endif

  </div>
</section>

@push('scripts')
  <script>
    (function() {
      const track = document.querySelector('.studycase-track');
      const slides = document.querySelectorAll('.studycase-slide');
      const prevBtn = document.querySelector('.studycase-prev');
      const nextBtn = document.querySelector('.studycase-next');
      const skeleton = document.getElementById('studycases-carousel-skeleton');
      const content = document.getElementById('studycases-carousel-content');
      if (!track || !slides.length) return;

      let current = 0,
        perPage = 1;

      function getPerPage() {
        const w = window.innerWidth;
        return w >= 1024 ? 3 : w >= 768 ? 2 : 1;
      }

      function maxIdx() {
        return Math.max(0, slides.length - perPage);
      }

      function move() {
        const slideW = slides[0].offsetWidth;
        const gap = 16; /* gap-4 */
        track.style.transition = 'transform .5s cubic-bezier(.23,1,.32,1)';
        track.style.transform = `translateX(-${current * (slideW + gap)}px)`;
      }

      if (prevBtn) prevBtn.addEventListener('click', () => {
        if (current > 0) {
          current--;
          move();
        }
      });
      if (nextBtn) nextBtn.addEventListener('click', () => {
        if (current < maxIdx()) {
          current++;
          move();
        }
      });

      window.addEventListener('resize', () => {
        perPage = getPerPage();
        current = Math.min(current, maxIdx());
        move();
      }, {
        passive: true
      });

      const imgs = track.querySelectorAll('img');
      let loaded = 0;

      function reveal() {
        if (skeleton) skeleton.style.display = 'none';
        if (content) content.style.opacity = '1';
      }
      if (!imgs.length) {
        reveal();
      } else {
        imgs.forEach(img => {
          if (img.complete) {
            if (++loaded >= imgs.length) reveal();
          } else {
            img.addEventListener('load', () => {
              if (++loaded >= imgs.length) reveal();
            }, {
              once: true
            });
            img.addEventListener('error', () => {
              if (++loaded >= imgs.length) reveal();
            }, {
              once: true
            });
          }
        });
        setTimeout(reveal, 1500);
      }
      perPage = getPerPage();
    })();
  </script>
@endpush
