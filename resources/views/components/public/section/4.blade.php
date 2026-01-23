@php
  $studyCases = \App\Models\StudyCase::select('slug', 'name', 'cover_path', 'category', 'result')->latest()->get();
@endphp

<section class="py-12 md:py-16 relative overflow-hidden" id="study-cases">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center max-w-5xl mx-auto mb-8 md:mb-10 lg:mb-12">
      <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold leading-tight text-white mb-4 md:mb-6">
        Hasil Nyata, <span class="text-impost-primary">Bukan Janji Kosong.</span>
      </h2>
      <p class="text-sm sm:text-base md:text-lg text-white mb-6">
        Kami tidak bicara potensi, kami bicara apa yang sudah terjadi melalui strategi, disiplin, dan sistem yang benar
      </p>
    </div>

    @if ($studyCases->isNotEmpty())
      <div class="relative group/slider">
        <div class="studycase-slider relative">
          <div class="overflow-hidden">
            <div class="studycase-track flex transition-transform duration-500 ease-out will-change-transform">
              @foreach ($studyCases as $index => $case)
                <div class="studycase-slide flex-shrink-0 w-full sm:w-1/2 lg:w-1/3 px-2">
                  <div
                    class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-lg p-3 sm:p-4 border border-white/10 shadow-xl h-full flex flex-col group hover:border-white/20 transition-all duration-300">

                    <div class="mb-4">
                      <div class="relative w-full aspect-video rounded-md overflow-hidden bg-black shadow-lg">
                        @if ($case->cover_path)
                          <img data-src="{{ asset('storage/' . $case->cover_path) }}"
                            src="{{ $index < 3 ? asset('storage/' . $case->cover_path) : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' }}"
                            alt="{{ $case->name }}"
                            class="{{ $index >= 3 ? 'lazy-img' : '' }} w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                          <div
                            class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-800 to-gray-900">
                            <span class="text-white/20 text-xs">No Image</span>
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="flex-1 flex flex-col">
                      <h3
                        class="text-sm sm:text-base font-bold text-white mb-1 line-clamp-2 group-hover:text-impost-primary transition-colors">
                        {{ $case->name }}
                      </h3>

                      <div class="mb-3">
                        <span
                          class="inline-block text-[10px] sm:text-xs font-bold uppercase tracking-wider text-impost-primary/90 bg-impost-primary/10 px-2 py-0.5 rounded border border-impost-primary/20">
                          {{ $case->category ?? 'Case Study' }}
                        </span>
                      </div>

                      <div class="text-xs sm:text-sm text-white/80 leading-relaxed mb-3 flex-1">
                        <p class="line-clamp-4">
                          {{ strip_tags($case->result) }}
                        </p>
                      </div>

                      <div class="pt-2 border-t border-white/10 mt-auto">
                        <a href="{{ route('detail-study-case', $case->slug) }}"
                          class="study-case-link inline-flex items-center text-xs sm:text-sm font-semibold text-impost-primary hover:text-impost-primary/80 transition-colors">
                          Lihat Detail
                          <svg class="w-3 h-3 sm:w-4 sm:h-4 ml-1 transition-transform group-hover:translate-x-1"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <button type="button" aria-label="Previous"
            class="studycase-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 sm:-translate-x-4 z-20 bg-impost-primary hover:bg-impost-primary/80 text-white p-2 rounded-full shadow-lg transition-all opacity-0 group-hover/slider:opacity-100 focus:opacity-100 translate-x-4 group-hover/slider:translate-x-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <button type="button" aria-label="Next"
            class="studycase-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 sm:translate-x-4 z-20 bg-impost-primary hover:bg-impost-primary/80 text-white p-2 rounded-full shadow-lg transition-all opacity-0 group-hover/slider:opacity-100 focus:opacity-100 -translate-x-4 group-hover/slider:translate-x-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>

      <div class="mt-8 md:mt-10 text-center">
        <a href="{{ route('study-case') }}"
          class="bg-impost-primary inline-flex items-center justify-center px-6 py-2.5 sm:px-8 sm:py-3 text-sm sm:text-md font-medium text-black border border-impost-primary rounded-full hover:scale-105 transition-all duration-300">
          Lihat Semua Study Case
        </a>
      </div>
    @else
      <div
        class="w-full max-w-4xl mx-auto text-center py-12 px-4 border border-white/10 rounded-2xl bg-white/5 backdrop-blur-sm">
        <svg class="w-16 h-16 mx-auto text-white/30 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
        </svg>
        <h3 class="text-lg font-medium text-white mb-2">Belum Ada Data</h3>
        <p class="text-white/60 text-sm">Studi kasus belum ditambahkan. Silakan kembali lagi nanti.</p>
      </div>
    @endif
  </div>
</section>

@push('scripts')
  <script>
    (function() {
      'use strict';

      document.addEventListener('DOMContentLoaded', function() {
        const studyCaseLinks = document.querySelectorAll('a[href*="study-case/"], .study-case-link');
        studyCaseLinks.forEach(link => {
          link.addEventListener('click', function() {
            sessionStorage.setItem('studyCaseSource', 'home');
          });
        });

        const sliderContainer = document.querySelector('.studycase-slider');
        if (!sliderContainer) return;

        const track = sliderContainer.querySelector('.studycase-track');
        const allSlides = Array.from(sliderContainer.querySelectorAll('.studycase-slide'));
        const prevBtn = sliderContainer.querySelector('.studycase-prev');
        const nextBtn = sliderContainer.querySelector('.studycase-next');

        let currentIndex = 0;
        let autoplayInterval = null;
        let slidesToShow = 1;
        let isUserInteracting = false;
        let touchStartX = 0;
        let touchEndX = 0;

        function getSlidesToShow() {
          if (window.innerWidth >= 1024) return 3;
          if (window.innerWidth >= 640) return 2;
          return 1;
        }

        function updateSlidesToShow() {
          slidesToShow = getSlidesToShow();
          updateSliderUI();
        }

        function getMaxIndex() {
          return Math.max(0, allSlides.length - slidesToShow);
        }

        function updateSliderUI() {
          const maxIndex = getMaxIndex();

          if (currentIndex > maxIndex) currentIndex = maxIndex;
          if (currentIndex < 0) currentIndex = 0;

          const slidePercent = 100 / slidesToShow;
          if (track) {
            track.style.transform = `translateX(-${currentIndex * slidePercent}%)`;
          }

          loadVisibleImages();
          updateButtonsState();
        }

        function updateButtonsState() {
          const maxIndex = getMaxIndex();
          if (prevBtn) prevBtn.style.opacity = currentIndex <= 0 ? '0.5' : '1';
          if (nextBtn) nextBtn.style.opacity = currentIndex >= maxIndex ? '0.5' : '1';

          if (prevBtn) prevBtn.disabled = currentIndex <= 0;
          if (nextBtn) nextBtn.disabled = currentIndex >= maxIndex;
        }

        function loadVisibleImages() {
          const end = Math.min(currentIndex + slidesToShow + 1, allSlides.length);
          for (let i = currentIndex; i < end; i++) {
            if (allSlides[i]) {
              const img = allSlides[i].querySelector('img[data-src]');
              if (img && img.dataset.src) {
                img.src = img.dataset.src;
                img.onload = () => {
                  img.classList.remove('lazy-img');
                  delete img.dataset.src;
                };
              }
            }
          }
        }

        function nextSlide() {
          const maxIndex = getMaxIndex();
          if (currentIndex < maxIndex) {
            currentIndex++;
          } else {
            currentIndex = 0;
          }
          updateSliderUI();
        }

        function prevSlide() {
          const maxIndex = getMaxIndex();
          if (currentIndex > 0) {
            currentIndex--;
          } else {
            currentIndex = maxIndex;
          }
          updateSliderUI();
        }

        function startAutoplay() {
          if (autoplayInterval || isUserInteracting || allSlides.length <= slidesToShow) return;
          autoplayInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoplay() {
          if (autoplayInterval) {
            clearInterval(autoplayInterval);
            autoplayInterval = null;
          }
        }

        function resetAutoplay() {
          stopAutoplay();
          startAutoplay();
        }

        window.addEventListener('resize', updateSlidesToShow);

        document.addEventListener('visibilitychange', () => {
          document.hidden ? stopAutoplay() : startAutoplay();
        });

        sliderContainer.addEventListener('mouseenter', () => {
          isUserInteracting = true;
          stopAutoplay();
        });

        sliderContainer.addEventListener('mouseleave', () => {
          isUserInteracting = false;
          startAutoplay();
        });

        if (prevBtn) {
          prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            prevSlide();
            resetAutoplay();
          });
        }

        if (nextBtn) {
          nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            nextSlide();
            resetAutoplay();
          });
        }

        sliderContainer.addEventListener('touchstart', (e) => {
          touchStartX = e.touches[0].clientX;
          isUserInteracting = true;
          stopAutoplay();
        }, {
          passive: true
        });

        sliderContainer.addEventListener('touchmove', (e) => {
          touchEndX = e.touches[0].clientX;
        }, {
          passive: true
        });

        sliderContainer.addEventListener('touchend', () => {
          if (!touchStartX || !touchEndX) {
            isUserInteracting = false;
            startAutoplay();
            return;
          }

          const diff = touchStartX - touchEndX;
          if (Math.abs(diff) > 50) {
            diff > 0 ? nextSlide() : prevSlide();
          }

          touchStartX = 0;
          touchEndX = 0;

          setTimeout(() => {
            isUserInteracting = false;
            resetAutoplay();
          }, 500);
        });

        updateSlidesToShow();
        startAutoplay();
      });
    })();
  </script>
@endpush
