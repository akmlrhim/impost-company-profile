@php
  $studyCases = \App\Models\StudyCase::select('slug', 'name', 'cover_path', 'category', 'result')
      ->latest()
      ->take(6)
      ->get();
@endphp

<section class="py-16 sm:py-20 lg:py-24 bg-impost-fifth overflow-hidden" id="study-cases">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header + nav --}}
    <div class="mb-10 sm:mb-14 text-center md:text-left">
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white">
        Bukan Janji<br><span class="text-impost-primary">Kosong.</span>
      </h2>
      <p class="text-base font-medium text-white mt-3 max-w-lg leading-relaxed mx-auto md:mx-0">
        Lihat bagaimana bisnis nyata bertumbuh bersama Impost Media dengan strategi yang terukur.
      </p>
    </div>

    @if ($studyCases->isNotEmpty())

      {{-- Skeleton --}}
      <div id="studycases-skeleton" class="grid grid-cols-1 lg:grid-cols-3 gap-px bg-white/[0.08] animate-pulse">
        @for ($i = 0; $i < 3; $i++)
          <div class="bg-impost-fifth p-4 sm:p-5">
            <div class="aspect-video bg-white/[0.04] mb-4"></div>
            <div class="h-3.5 bg-white/[0.04] rounded w-3/4 mb-2"></div>
            <div class="h-3 bg-white/[0.04] rounded w-full mb-1.5"></div>
            <div class="h-3 bg-white/[0.04] rounded w-5/6"></div>
          </div>
        @endfor
      </div>

      {{-- Slider --}}
      <div id="studycases-content" class="opacity-0 transition-opacity duration-500">
        <div class="studycase-slider overflow-hidden lg:overflow-visible bg-white/[0.02] rounded-md">
          <div class="studycase-track flex lg:flex-wrap">
            @foreach ($studyCases as $case)
              <div class="studycase-slide flex-shrink-0 w-full md:w-1/2 lg:w-1/3">
                <a href="{{ route('detail-study-case', $case->slug) }}" class="block p-4 sm:p-5">

                  {{-- Thumbnail --}}
                  <div class="relative aspect-video overflow-hidden bg-black/30 mb-4">

                    @if ($case->cover_path)
                      <img src="{{ asset('storage/' . $case->cover_path) }}" alt="{{ $case->name }}"
                        class="w-full h-full object-cover" loading="lazy">
                    @else
                      <div class="w-full h-full bg-white/[0.04] flex items-center justify-center">
                        <svg class="w-10 h-10 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                      </div>
                    @endif

                    {{-- Gradient overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/10 to-black/70"></div>

                    {{-- Category badge --}}
                    @if ($case->category)
                      <div class="absolute top-3 left-3">
                        <span
                          class="text-[9px] font-black uppercase tracking-wider bg-impost-primary text-[#040404] px-2.5 py-1 rounded-full leading-none">
                          {{ $case->category }}
                        </span>
                      </div>
                    @endif

                  </div>

                  {{-- Case name + result --}}
                  <h3 class="font-bold text-white text-sm leading-snug mb-1.5">{{ $case->name }}</h3>
                  @if ($case->result)
                    <p class="text-xs text-white/55 leading-relaxed line-clamp-3">{{ strip_tags($case->result) }}</p>
                  @endif

                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      {{-- Slider nav (below content, mobile & tablet only) --}}
      <div class="flex gap-2 items-center justify-center mt-6 lg:hidden">
        <button type="button" aria-label="Previous"
          class="studycase-prev inline-flex items-center justify-center w-10 h-10 bg-white/[0.06] text-white border border-white/10 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-150 cursor-pointer rounded-full">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button type="button" aria-label="Next"
          class="studycase-next inline-flex items-center justify-center w-10 h-10 bg-white/[0.06] text-white border border-white/10 hover:bg-white/10 hover:border-impost-primary/40 transition-all duration-150 cursor-pointer rounded-full">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </button>
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
      const skeleton = document.getElementById('studycases-skeleton');
      const content = document.getElementById('studycases-content');
      if (!track || !slides.length) return;

      let current = 0;

      function perPage() {
        const w = window.innerWidth;
        return w >= 1024 ? 3 : w >= 768 ? 2 : 1;
      }

      function maxIdx() {
        return Math.max(0, slides.length - perPage());
      }

      function move() {
        if (window.innerWidth >= 1024) {
          track.style.transform = 'none';
          return;
        }
        const w = slides[0].offsetWidth;
        track.style.transition = 'transform .45s cubic-bezier(.23,1,.32,1)';
        track.style.transform = `translateX(-${current * w}px)`;
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

      let touchStartX = 0;
      track.addEventListener('touchstart', e => {
        touchStartX = e.touches[0].clientX;
      }, {
        passive: true
      });
      track.addEventListener('touchend', e => {
        const diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) {
          if (diff > 0 && current < maxIdx()) {
            current++;
            move();
          }
          if (diff < 0 && current > 0) {
            current--;
            move();
          }
        }
      });

      window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
          current = 0;
          track.style.transform = 'none';
        } else {
          current = Math.min(current, maxIdx());
          move();
        }
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
    })();
  </script>
@endpush
