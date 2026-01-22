@php
  $studyCases = \App\Models\StudyCase::select('slug', 'name', 'cover_path', 'category', 'result')->latest()->get();
  $categories = $studyCases->pluck('category')->unique()->values();
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

      @if ($studyCases->isNotEmpty())
        <div class="w-full mx-auto relative z-20">
          {{-- Mobile version: Dropdown --}}
          <div class="block md:hidden">
            <div class="relative">
              <select id="mobile-filter"
                class="w-full appearance-none bg-[#121212] text-white border border-white/10 rounded-xl py-3.5 px-5 pr-12 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all cursor-pointer text-sm font-medium shadow-lg">
                <option value="all" class="bg-black text-white">Semua Kategori</option>
                @foreach ($categories as $cat)
                  <option value="{{ $cat }}" class="bg-black text-white">{{ $cat }}</option>
                @endforeach
              </select>
            </div>
          </div>

          {{-- Desktop version: Pills --}}
          <div class="hidden md:flex flex-wrap justify-center gap-3" id="desktop-filter">
            <button type="button" data-filter="all"
              class="filter-pill rounded-full px-5 py-2 text-sm border font-bold cursor-pointer inline-flex items-center gap-2 transition-all duration-250 backdrop-blur-sm hover:border-yellow-400 hover:bg-yellow-500 hover:-translate-y-0.5 border-yellow-400 bg-orange-500 shadow-lg text-black">
              <span class="uppercase tracking-wide text-xs opacity-80">Semua</span>
            </button>

            @foreach ($categories as $cat)
              <button type="button" data-filter="{{ $cat }}"
                class="filter-pill rounded-full px-5 py-2 text-sm border font-bold cursor-pointer inline-flex items-center gap-2 transition-all duration-250 backdrop-blur-sm hover:border-yellow-400 hover:bg-yellow-500 hover:-translate-y-0.5 border-impost-primary bg-impost-primary text-black">
                <span class="uppercase tracking-wide text-xs opacity-80">{{ $cat }}</span>
              </button>
            @endforeach
          </div>
        </div>
      @endif

    </div>

    @if ($studyCases->isNotEmpty())
      <div class="relative">
        <div class="studycase-slider relative">
          <div class="overflow-hidden">
            <div class="studycase-track flex transition-transform duration-500 ease-out">
              @foreach ($studyCases as $index => $case)
                <div class="studycase-slide flex-shrink-0 w-full sm:w-1/2 lg:w-1/3 px-1.5 md:px-2"
                  data-category="{{ $case->category }}">

                  <div
                    class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-lg p-3 sm:p-4 border border-white/10 shadow-xl h-full flex flex-col">

                    <div class="mb-3">
                      <div class="relative w-full aspect-video rounded-md overflow-hidden bg-black shadow-lg">
                        @if ($case->cover_path)
                          <img data-src="{{ asset('storage/' . $case->cover_path) }}"
                            src="{{ $index < 3 ? asset('storage/' . $case->cover_path) : '' }}"
                            alt="{{ $case->name }}"
                            class="{{ $index >= 3 ? 'lazy-img' : '' }} w-full h-full object-cover">
                        @else
                          <div
                            class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-800 to-gray-900">
                            <span class="text-white/20 text-xs">No Image</span>
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="flex-1 flex flex-col">
                      <div class="mb-2">
                        <span
                          class="inline-block px-2.5 py-1 text-[10px] sm:text-xs font-bold uppercase tracking-wider text-black bg-impost-primary rounded-full">
                          {{ $case->category ?? 'Case Study' }}
                        </span>
                      </div>

                      <h3 class="text-sm sm:text-base font-bold text-white mb-2 line-clamp-2">
                        {{ $case->name }}
                      </h3>

                      <div class="text-xs sm:text-sm text-white/80 leading-relaxed mb-3 flex-1">
                        <p class="line-clamp-4">
                          {{ strip_tags($case->result) }}
                        </p>
                      </div>

                      <div class="pt-2 border-t border-white/10 mt-auto">
                        <a href="{{ route('detail-study-case', $case->slug) }}"
                          class="inline-flex items-center text-xs sm:text-sm font-semibold text-impost-primary hover:text-impost-primary/80 transition-colors">
                          Lihat Detail
                          <svg class="w-3 h-3 sm:w-4 sm:h-4 ml-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
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
            class="studycase-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 sm:-translate-x-3 lg:-translate-x-6 z-20 bg-impost-primary hover:bg-impost-primary/80 text-white p-2 rounded-full shadow-lg transition-all disabled:opacity-0 disabled:invisible">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <button type="button" aria-label="Next"
            class="studycase-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 sm:translate-x-3 lg:translate-x-6 z-20 bg-impost-primary hover:bg-impost-primary/80 text-white p-2 rounded-full shadow-lg transition-all disabled:opacity-0 disabled:invisible">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

        // Detect study case source for back button
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
        const filterPills = document.querySelectorAll('.filter-pill');
        const mobileSelect = document.getElementById('mobile-filter');

        let visibleSlides = [];
        let currentIndex = 0;
        let autoplayInterval = null;
        let isAnimating = false;
        let slidesToShow = 1;
        let isUserInteracting = false; // Flag untuk tracking interaksi user

        function init() {
          setupFilters();
          applyFilter('all');
          setupHoverEvents(); // Setup hover events
          setupTouchEvents();

          window.addEventListener('resize', () => {
            updateSlidesToShow();
            updateSliderUI();
          });

          document.addEventListener('visibilitychange', () => {
            document.hidden ? stopAutoplay() : startAutoplay();
          });
        }

        function setupFilters() {
          filterPills.forEach(btn => {
            btn.addEventListener('click', (e) => {
              const category = e.target.closest('[data-filter]').getAttribute('data-filter');
              syncFilters(category);
              applyFilter(category);
            });
          });

          if (mobileSelect) {
            mobileSelect.addEventListener('change', (e) => {
              const category = e.target.value;
              syncFilters(category);
              applyFilter(category);
            });
          }
        }

        function syncFilters(category) {
          filterPills.forEach(btn => {
            const isMatch = btn.getAttribute('data-filter') === category;

            if (isMatch) {
              btn.classList.add('border-yellow-400', 'bg-orange-500', 'shadow-lg');
              btn.classList.remove('border-impost-primary', 'bg-impost-primary');
            } else {
              btn.classList.remove('border-yellow-400', 'bg-orange-500', 'shadow-lg');
              btn.classList.add('border-impost-primary', 'bg-impost-primary');
            }
          });

          if (mobileSelect) mobileSelect.value = category;
        }

        function applyFilter(category) {
          stopAutoplay();
          currentIndex = 0;
          visibleSlides = [];

          allSlides.forEach(slide => {
            const slideCat = slide.getAttribute('data-category');
            const shouldShow = category === 'all' || slideCat === category;

            if (shouldShow) {
              slide.style.display = '';
              visibleSlides.push(slide);
            } else {
              slide.style.display = 'none';
            }
          });

          updateSlidesToShow();
          updateSliderUI();
          startAutoplay();
        }

        function getSlidesToShow() {
          if (window.innerWidth >= 1024) return 3;
          if (window.innerWidth >= 640) return 2;
          return 1;
        }

        function updateSlidesToShow() {
          slidesToShow = getSlidesToShow();
        }

        function getMaxIndex() {
          return Math.max(0, visibleSlides.length - slidesToShow);
        }

        function updateSliderUI() {
          if (isAnimating && visibleSlides.length > 0) return;

          const maxIndex = getMaxIndex();
          if (currentIndex > maxIndex) currentIndex = maxIndex;
          if (currentIndex < 0) currentIndex = 0;

          const slidePercent = 100 / slidesToShow;
          if (track) track.style.transform = `translateX(-${currentIndex * slidePercent}%)`;

          loadVisibleImages();
        }

        function loadVisibleImages() {
          for (let i = currentIndex; i < currentIndex + slidesToShow + 1; i++) {
            if (visibleSlides[i]) {
              const img = visibleSlides[i].querySelector('img[data-src]');
              if (img && img.dataset.src) {
                img.src = img.dataset.src;
                img.onload = () => img.classList.remove('lazy-img');
                delete img.dataset.src;
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
          // Jangan start autoplay jika user sedang berinteraksi
          if (autoplayInterval || visibleSlides.length <= slidesToShow || isUserInteracting) return;
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

        // Setup hover events untuk desktop
        function setupHoverEvents() {
          sliderContainer.addEventListener('mouseenter', () => {
            isUserInteracting = true;
            stopAutoplay();
          });

          sliderContainer.addEventListener('mouseleave', () => {
            isUserInteracting = false;
            startAutoplay();
          });
        }

        if (prevBtn) {
          prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoplay();
          });
        }

        if (nextBtn) {
          nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoplay();
          });
        }

        function setupTouchEvents() {
          let touchStartX = 0;
          let touchEndX = 0;

          sliderContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].clientX;
            isUserInteracting = true; // Set flag saat mulai touch
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
            if (!touchEndX) {
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

            // Delay sebentar sebelum start autoplay lagi setelah touch
            setTimeout(() => {
              isUserInteracting = false;
              resetAutoplay();
            }, 300);
          }, {
            passive: true
          });

          // Handle touchcancel
          sliderContainer.addEventListener('touchcancel', () => {
            touchStartX = 0;
            touchEndX = 0;
            isUserInteracting = false;
            startAutoplay();
          }, {
            passive: true
          });
        }

        init();
      });
    })();
  </script>
@endpush
