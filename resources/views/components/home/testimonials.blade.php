<section class="relative w-full max-w-7xl py-8 sm:py-10 md:py-12 lg:py-16 mx-auto overflow-hidden" id="testimonials">
  <div class="relative text-center">
    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-3 text-impost-primary">
      Apa Kata Mereka?
    </h2>

    <div class="relative max-w-screen-xl mx-auto testimonial-slider overflow-hidden">
      <div class="testimonial-track flex transition-transform duration-500 ease-in-out">

        @foreach ($testimonials as $t)
          <div class="testimonial-slide min-w-full px-4 py-10 lg:py-16">
            <figure class="max-w-screen-md mx-auto text-center" data-aos="zoom-in" data-aos-duration="600">

              <div class="mb-6">
                <div class="relative w-full h-64 rounded-xl overflow-hidden border border-white/10 shadow-xl mx-auto">
                  <img
                    src="{{ $t->photo ? asset('storage/' . $t->photo) : 'https://images.unsplash.com/photo-1619658535018-5a55d32e4628' }}"
                    loading="lazy" decoding="async" alt="Bukti Testimoni {{ $t->name }}"
                    class="w-full h-full object-cover">

                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                </div>
              </div>

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

      <button type="button"
        class="hidden md:flex testimonial-prev absolute left-3 top-1/2 -translate-y-1/2 z-10 bg-impost-primary/80 hover:bg-impost-primary text-white p-3 rounded-full shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m15 18-6-6 6-6" />
        </svg>
      </button>

      <button type="button"
        class="hidden md:flex testimonial-next absolute right-3 top-1/2 -translate-y-1/2 z-10 bg-impost-primary/80 hover:bg-impost-primary text-white p-3 rounded-full shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
