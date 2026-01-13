<section class="relative max-w-7xl mx-auto px-4 sm:px-6 py-12 md:py-16 overflow-hidden" id="testimonials">

  <div class="relative mb-10 text-center" data-aos="fade-up">
    <h2 class="font-header text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-impost-primary">
      Apa Kata Mereka?
    </h2>

    <!-- Slider -->
    <div class="relative max-w-screen-xl mx-auto testimonial-slider overflow-hidden">

      <!-- Track -->
      <div class="testimonial-track flex transition-transform duration-500 ease-in-out">

        @foreach ($testimonials as $t)
          <div class="testimonial-slide min-w-full px-4 py-10 lg:py-16">
            <figure class="max-w-screen-md mx-auto text-center">
              <svg class="h-12 mx-auto mb-4 text-impost-primary" viewBox="0 0 24 27" fill="currentColor">
                <path
                  d="M14.017 18V10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983V18H0Z" />
              </svg>

              <blockquote>
                <p class="text-sm sm:text-md font-medium text-white leading-relaxed">
                  “{{ $t->content }}”
                </p>
              </blockquote>

              <figcaption class="mt-6">
                <p class="font-semibold text-white">{{ $t->name }}</p>
                <p class="text-sm text-gray-400">{{ $t->company_name }}</p>
              </figcaption>
            </figure>
          </div>
        @endforeach

      </div>

      <!-- Navigation -->
      <button type="button"
        class="hidden md:flex testimonial-prev absolute left-3 top-1/2 -translate-y-1/2 z-10 bg-impost-primary/80 hover:bg-impost-primary text-white p-3 rounded-full shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-chevron-left-icon lucide-chevron-left">
          <path d="m15 18-6-6 6-6" />
        </svg>
      </button>

      <button type="button"
        class="hidden md:flex testimonial-next absolute right-3 top-1/2 -translate-y-1/2 z-10 bg-impost-primary/80 hover:bg-impost-primary text-white p-3 rounded-full shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-chevron-right-icon lucide-chevron-right">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </button>

    </div>
  </div>
</section>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const slider = document.querySelector('.testimonial-slider');
      const track = slider.querySelector('.testimonial-track');
      const slides = slider.querySelectorAll('.testimonial-slide');
      const prev = slider.querySelector('.testimonial-prev');
      const next = slider.querySelector('.testimonial-next');

      let index = 0;
      const total = slides.length;
      let autoplay;

      function update() {
        track.style.transform = `translateX(-${index * 100}%)`;
      }

      function nextSlide() {
        index = (index + 1) % total;
        update();
      }

      function prevSlide() {
        index = (index - 1 + total) % total;
        update();
      }

      /* ======================
         DESKTOP NAVIGATION
      ====================== */
      if (next && prev) {
        next.addEventListener('click', () => {
          nextSlide();
          resetAutoplay();
        });

        prev.addEventListener('click', () => {
          prevSlide();
          resetAutoplay();
        });
      }

      /* ======================
         AUTOPLAY (DESKTOP)
      ====================== */
      function startAutoplay() {
        autoplay = setInterval(nextSlide, 4000);
      }

      function resetAutoplay() {
        clearInterval(autoplay);
        startAutoplay();
      }

      slider.addEventListener('mouseenter', () => {
        if (window.innerWidth >= 768) clearInterval(autoplay);
      });

      slider.addEventListener('mouseleave', () => {
        if (window.innerWidth >= 768) startAutoplay();
      });

      if (window.innerWidth >= 768) {
        startAutoplay();
      }

      /* ======================
         SWIPE (MOBILE)
      ====================== */
      let startX = 0;
      let endX = 0;

      slider.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
      });

      slider.addEventListener('touchmove', (e) => {
        endX = e.touches[0].clientX;
      });

      slider.addEventListener('touchend', () => {
        const diff = startX - endX;

        if (Math.abs(diff) > 50) {
          diff > 0 ? nextSlide() : prevSlide();
        }

        startX = 0;
        endX = 0;
      });
    });
  </script>
@endpush
