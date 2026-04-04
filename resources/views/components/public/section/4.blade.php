@php
  $studyCases = \App\Models\StudyCase::select('slug', 'name', 'cover_path', 'category', 'result')->latest()->get();
@endphp

<section class="py-16 sm:py-20 text-white overflow-hidden" id="study-cases">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="relative mb-10 sm:mb-12 flex items-center justify-center">
      <div class="max-w-3xl mx-auto text-center z-10 px-4">
        <h2
          class="text-2xl sm:text-3xl md:text-5xl font-medium font-header tracking-tight text-white mb-3 sm:mb-4 leading-tight">
          Hasil Nyata, <br class="hidden md:block" />
          <span class="text-impost-primary italic">Bukan Janji Kosong.</span>
        </h2>
        <p class="text-white text-xs sm:text-sm md:text-base leading-relaxed max-w-xl mx-auto">
          Bukti autentik dari strategi yang terukur untuk pertumbuhan bisnis Anda.
        </p>
      </div>

      @if ($studyCases->isNotEmpty())
        <div class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 gap-3 z-20">
          <button type="button" aria-label="Previous"
            class="studycase-prev group flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 hover:bg-impost-primary hover:text-black hover:border-impost-primary transition-all duration-300">
            <svg class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button type="button" aria-label="Next"
            class="studycase-next group flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 hover:bg-impost-primary hover:text-black hover:border-impost-primary transition-all duration-300">
            <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      @endif
    </div>

    @if ($studyCases->isNotEmpty())
      <div class="relative">
        {{-- Skeleton --}}
        <div id="studycases-carousel-skeleton" class="flex flex-nowrap overflow-hidden animate-pulse mb-6">
          @for ($i = 0; $i < 3; $i++)
            <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-3 box-border">
              <div class="h-[280px] sm:h-[320px] rounded-xl border border-white/10 bg-white/5"></div>
            </div>
          @endfor
        </div>

        {{-- Content --}}
        <div id="studycases-carousel-content"
          class="studycase-slider relative w-full overflow-hidden opacity-0 transition-opacity duration-500">
          <div class="studycase-track flex">
            @foreach ($studyCases as $case)
              <div class="studycase-slide flex-shrink-0 w-full md:w-1/2 lg:w-1/3 px-3 box-border">
                <a href="{{ route('detail-study-case', $case->slug) }}"
                  class="group flex flex-col h-full border border-white/10 bg-white/5 hover:border-impost-primary/50 hover:bg-white/10 rounded-xl p-4 sm:p-5 transition-all duration-300">
                  <div class="relative w-full aspect-video mb-4 overflow-hidden rounded-lg bg-gray-900">
                    @if ($case->cover_path)
                      <img src="{{ asset('storage/' . $case->cover_path) }}" alt="{{ $case->name }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        loading="lazy">
                    @else
                      <div class="w-full h-full flex items-center justify-center bg-gray-800">
                        <span class="text-gray-600 text-xs">No Preview</span>
                      </div>
                    @endif
                  </div>

                  <div class="flex flex-col flex-1">
                    <div class="mb-2.5">
                      <span
                        class="inline-block px-2 py-1 bg-impost-primary/10 rounded text-[9px] sm:text-[10px] font-bold tracking-widest uppercase text-impost-primary border border-impost-primary/20">
                        {{ $case->category ?? 'CASE STUDY' }}
                      </span>
                    </div>
                    <h3
                      class="text-sm sm:text-base md:text-lg font-bold text-white group-hover:text-impost-primary mb-2 leading-tight transition-colors">
                      {{ $case->name }}
                    </h3>
                    <div class="text-xs sm:text-sm text-white/70 leading-relaxed line-clamp-3 mb-4">
                      <div class="[&>ul]:list-disc [&>ul]:ml-4 [&>ol]:list-decimal [&>ol]:ml-4">
                        {!! strip_tags($case->result, '<ul><ol><li><p><br><strong><em>') !!}
                      </div>
                    </div>
                    <div class="mt-auto pt-3 border-t border-white/10">
                      <div
                        class="flex items-center text-xs sm:text-sm font-medium text-white group-hover:text-impost-primary transition-colors">
                        Lihat Detail
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="size-4 ml-2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
          <div class="mt-8 sm:mt-10 text-center">
            <a href="{{ route('study-case') }}"
              class="inline-flex items-center text-xs font-bold uppercase text-white hover:text-impost-primary transition-colors tracking-wider border-b border-transparent hover:border-impost-primary pb-1">
              Lihat Semua Study Case
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>

            </a>
          </div>
        </div>
      @else
        <div
          class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
          <x-empty-card item="Study Case" />
        </div>
    @endif


  </div>
</section>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const track = document.querySelector('.studycase-track');
      if (!track) return;

      const slides = Array.from(document.querySelectorAll('.studycase-slide'));
      if (!slides.length) return;

      const prevBtns = document.querySelectorAll('.studycase-prev');
      const nextBtns = document.querySelectorAll('.studycase-next');
      const CLONE_COUNT = 3;

      let currentIndex = CLONE_COUNT;
      let isTransitioning = false;
      let slideWidth = 0;
      let autoPlayTimer = null;

      function getSlideWidth() {
        return slides[0].getBoundingClientRect().width;
      }

      function buildClones() {
        slides.slice(0, CLONE_COUNT).forEach(s => track.appendChild(s.cloneNode(true)));
        slides.slice(-CLONE_COUNT).reverse().forEach(s => track.insertBefore(s.cloneNode(true), track
          .firstChild));
      }

      function setPosition(withTransition) {
        track.style.transition = withTransition ? 'transform 0.45s cubic-bezier(0.25, 1, 0.5, 1)' : 'none';
        track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
      }

      function next() {
        if (isTransitioning) return;
        isTransitioning = true;
        currentIndex++;
        setPosition(true);
        resetAutoPlay();
      }

      function prev() {
        if (isTransitioning) return;
        isTransitioning = true;
        currentIndex--;
        setPosition(true);
        resetAutoPlay();
      }

      track.addEventListener('transitionend', () => {
        isTransitioning = false;
        const total = slides.length;
        if (currentIndex >= total + CLONE_COUNT) {
          currentIndex = CLONE_COUNT;
          setPosition(false);
        } else if (currentIndex < CLONE_COUNT) {
          currentIndex = total + CLONE_COUNT - 1;
          setPosition(false);
        }
      });

      function startAutoPlay() {
        autoPlayTimer = setInterval(next, 4000);
      }

      function stopAutoPlay() {
        clearInterval(autoPlayTimer);
      }

      function resetAutoPlay() {
        stopAutoPlay();
        startAutoPlay();
      }

      let resizeTimer;
      window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
          slideWidth = getSlideWidth();
          setPosition(false);
        }, 150);
      });

      track.addEventListener('mouseenter', stopAutoPlay);
      track.addEventListener('mouseleave', startAutoPlay);

      let touchStartX = 0;
      track.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
        stopAutoPlay();
      }, {
        passive: true
      });

      track.addEventListener('touchend', e => {
        const diff = touchStartX - e.changedTouches[0].screenX;
        if (Math.abs(diff) > 40) diff > 0 ? next() : prev();
        startAutoPlay();
      }, {
        passive: true
      });

      nextBtns.forEach(btn => btn.addEventListener('click', next));
      prevBtns.forEach(btn => btn.addEventListener('click', prev));

      buildClones();
      slideWidth = getSlideWidth();
      setPosition(false);
      startAutoPlay();

      const skeleton = document.getElementById('studycases-carousel-skeleton');
      const content = document.getElementById('studycases-carousel-content');
      if (skeleton && content) {
        const imgs = content.querySelectorAll('img');
        let loaded = 0;

        function reveal() {
          skeleton.style.display = 'none';
          content.style.opacity = '1';
        }

        if (!imgs.length) {
          reveal();
        } else {
          imgs.forEach(img => {
            if (img.complete) {
              loaded++;
              if (loaded >= imgs.length) reveal();
            } else {
              img.addEventListener('load', () => {
                loaded++;
                if (loaded >= imgs.length) reveal();
              }, {
                once: true
              });
              img.addEventListener('error', () => {
                loaded++;
                if (loaded >= imgs.length) reveal();
              }, {
                once: true
              });
            }
          });
          setTimeout(reveal, 1500);
        }
      }
    });
  </script>
@endpush
