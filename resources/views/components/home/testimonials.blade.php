<section class="relative w-full py-6 sm:py-8 md:py-10" id="testimonials">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-impost-primary text-center mb-4 sm:mb-6 md:mb-8">
      Apa Kata Mereka?
    </h2>

    @if (isset($testimonials) && $testimonials->isNotEmpty())
      <div class="relative max-w-7xl mx-auto">
        <div class="testimonial-slider relative">
          <div class="overflow-hidden">
            <div class="testimonial-track flex transition-transform duration-500 ease-out">
              @foreach ($testimonials as $index => $t)
                <div class="testimonial-slide flex-shrink-0 w-full sm:w-1/2 lg:w-1/3 px-1.5 md:px-2">
                  <div
                    class="bg-gradient-to-br from-gray-900/50 to-gray-800/50 backdrop-blur-sm rounded-lg p-3 sm:p-4 border border-white/10 shadow-xl h-full flex flex-col">

                    <div class="mb-3">
                      <div class="relative w-full aspect-video rounded-md overflow-hidden bg-black shadow-lg">
                        @if ($t->media_type === 'video')
                          <video controls preload="metadata" playsinline
                            class="w-full h-full object-contain testimonial-video" data-index="{{ $index }}"
                            @if ($index >= 3) data-src="{{ asset('storage/' . $t->media_path) }}" @endif>
                            @if ($index < 3)
                              <source src="{{ asset('storage/' . $t->media_path) }}" type="video/mp4">
                            @endif
                            Browser Anda tidak mendukung video.
                          </video>
                        @else
                          @if ($index < 3 && $t->media_path)
                            <img src="{{ asset('storage/' . $t->media_path) }}" alt="Testimoni {{ $t->name }}"
                              class="w-full h-full object-cover">
                          @elseif ($t->media_path)
                            <img data-src="{{ asset('storage/' . $t->media_path) }}" alt="Testimoni {{ $t->name }}"
                              loading="lazy" class="w-full h-full object-cover lazy-img"
                              style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                          @else
                            <div
                              class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-800 to-gray-900">
                              <svg class="w-8 h-8 sm:w-10 sm:h-10 text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                              </svg>
                            </div>
                          @endif
                        @endif
                      </div>
                    </div>

                    <div class="text-center space-y-2 flex-1 flex flex-col justify-between">
                      <blockquote>
                        <p class="text-xs sm:text-sm text-white/90 leading-relaxed italic line-clamp-3">
                          "{{ $t->content }}"
                        </p>
                      </blockquote>

                      <div class="pt-2 border-t border-white/10 mt-auto">
                        <p class="text-xs sm:text-sm font-bold text-white truncate">{{ $t->name }}</p>
                        <p class="text-xs text-gray-400 mt-0.5 truncate">{{ $t->company_name }}</p>
                      </div>
                    </div>

                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <button type="button" aria-label="Previous"
            class="testimonial-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 sm:-translate-x-3 lg:-translate-x-6 z-20 bg-impost-primary hover:bg-impost-primary/80 text-white p-2 rounded-full shadow-lg transition-all disabled:opacity-40 disabled:cursor-not-allowed">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <button type="button" aria-label="Next"
            class="testimonial-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 sm:translate-x-3 lg:translate-x-6 z-20 bg-impost-primary hover:bg-impost-primary/80 text-white p-2 rounded-full shadow-lg transition-all disabled:opacity-40 disabled:cursor-not-allowed">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>

        </div>
      </div>
    @else
      <div
        class="w-full max-w-4xl mx-auto text-center py-12 px-4 border border-white/10 rounded-2xl bg-white/5 backdrop-blur-sm">
        <svg class="w-16 h-16 mx-auto text-white/30 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <h3 class="text-lg font-medium text-white mb-2">Belum Ada Testimoni</h3>
        <p class="text-white/60 text-sm">Pendapat klien kami akan ditampilkan di sini segera.</p>
      </div>
    @endif
  </div>
</section>

@push('scripts')
  <script>
    (function() {
      'use strict';

      document.addEventListener('DOMContentLoaded', function() {
        const slider = document.querySelector('.testimonial-slider');
        if (!slider) return;

        const track = slider.querySelector('.testimonial-track');
        const slides = slider.querySelectorAll('.testimonial-slide');
        const prevBtn = slider.querySelector('.testimonial-prev');
        const nextBtn = slider.querySelector('.testimonial-next');
        const videos = slider.querySelectorAll('.testimonial-video');

        let currentIndex = 0;
        const totalSlides = slides.length;
        let autoplayInterval = null;
        let isVideoPlaying = false;
        let isAnimating = false;
        let slidesToShow = 1;
        let isUserInteracting = false; // Flag untuk tracking interaksi user

        const loadedMedia = new Set([0, 1, 2]);

        function getSlidesToShow() {
          if (window.innerWidth >= 1024) return 3;
          if (window.innerWidth >= 640) return 2;
          return 1;
        }

        function updateSlidesToShow() {
          slidesToShow = getSlidesToShow();
        }

        function lazyLoadMedia(index) {
          if (index < 0 || index >= totalSlides || loadedMedia.has(index)) return;

          const slide = slides[index];
          const video = slide.querySelector('video[data-src]');
          const img = slide.querySelector('img[data-src]');

          if (video?.dataset.src) {
            const source = document.createElement('source');
            source.src = video.dataset.src;
            source.type = 'video/mp4';
            video.appendChild(source);
            video.load();
            delete video.dataset.src;
          }

          if (img?.dataset.src) {
            img.src = img.dataset.src;
            img.onload = () => img.style.background = '';
            delete img.dataset.src;
          }

          loadedMedia.add(index);
        }

        function pauseAllVideos() {
          videos.forEach(video => {
            if (!video.paused) video.pause();
          });
        }

        function getMaxIndex() {
          return Math.max(0, totalSlides - slidesToShow);
        }

        function updateSlider() {
          if (isAnimating) return;
          isAnimating = true;

          pauseAllVideos();
          isVideoPlaying = false;

          const maxIndex = getMaxIndex();
          currentIndex = Math.min(currentIndex, maxIndex);

          const slideWidth = 100 / slidesToShow;
          if (track) track.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

          for (let i = currentIndex; i < currentIndex + slidesToShow + 1; i++) {
            lazyLoadMedia(i);
          }

          setTimeout(() => {
            isAnimating = false;
          }, 500);
        }

        function nextSlide() {
          if (isVideoPlaying || isAnimating) return;
          const maxIndex = getMaxIndex();
          if (currentIndex < maxIndex) {
            currentIndex++;
          } else {
            currentIndex = 0;
          }
          updateSlider();
        }

        function prevSlide() {
          if (isAnimating) return;
          const maxIndex = getMaxIndex();
          if (currentIndex > 0) {
            currentIndex--;
          } else {
            currentIndex = maxIndex;
          }
          updateSlider();
        }

        function goToSlide(index) {
          if (isAnimating || index === currentIndex) return;
          currentIndex = Math.min(index, getMaxIndex());
          updateSlider();
        }

        function startAutoplay() {
          // Jangan start autoplay jika video sedang play atau user sedang berinteraksi
          if (autoplayInterval || isVideoPlaying || isUserInteracting) return;
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
          slider.addEventListener('mouseenter', () => {
            isUserInteracting = true;
            stopAutoplay();
          });

          slider.addEventListener('mouseleave', () => {
            isUserInteracting = false;
            // Hanya start autoplay jika video tidak sedang playing
            if (!isVideoPlaying) {
              startAutoplay();
            }
          });
        }

        // Video event listeners
        videos.forEach(video => {
          video.addEventListener('play', () => {
            isVideoPlaying = true;
            stopAutoplay();
          });

          video.addEventListener('pause', () => {
            isVideoPlaying = false;
            // Hanya start autoplay jika user tidak sedang hover
            if (!isUserInteracting) {
              startAutoplay();
            }
          });

          video.addEventListener('ended', () => {
            isVideoPlaying = false;
            if (!isUserInteracting) {
              startAutoplay();
            }
          });
        });

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

        // Touch events
        let touchStartX = 0;
        let touchEndX = 0;

        slider.addEventListener('touchstart', (e) => {
          touchStartX = e.touches[0].clientX;
          isUserInteracting = true; // Set flag saat mulai touch
          stopAutoplay();
        }, {
          passive: true
        });

        slider.addEventListener('touchmove', (e) => {
          touchEndX = e.touches[0].clientX;
        }, {
          passive: true
        });

        slider.addEventListener('touchend', () => {
          if (!touchEndX) {
            isUserInteracting = false;
            // Hanya start autoplay jika video tidak sedang playing
            if (!isVideoPlaying) {
              startAutoplay();
            }
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
            if (!isVideoPlaying) {
              resetAutoplay();
            }
          }, 300);
        }, {
          passive: true
        });

        // Handle touchcancel
        slider.addEventListener('touchcancel', () => {
          touchStartX = 0;
          touchEndX = 0;
          isUserInteracting = false;
          if (!isVideoPlaying) {
            startAutoplay();
          }
        }, {
          passive: true
        });

        window.addEventListener('resize', () => {
          updateSlidesToShow();
          updateSlider();
        });

        // Initialize
        setupHoverEvents();
        updateSlidesToShow();
        updateSlider();
        startAutoplay();

        document.addEventListener('visibilitychange', () => {
          if (document.hidden) {
            stopAutoplay();
            pauseAllVideos();
          } else if (!isVideoPlaying && !isUserInteracting) {
            startAutoplay();
          }
        });
      });
    })();
  </script>
@endpush
