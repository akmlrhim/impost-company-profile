<section id="study-case" class="relative max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8 md:py-10 overflow-hidden">

  <div class="relative mb-8 sm:mb-10 md:mb-12 text-center" data-aos="fade-up">
    <h2 class="font-header text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-5 sm:mb-6 text-impost-primary">
      Studi Kasus
    </h2>

    <p class="text-white/80 text-sm sm:text-md md:text-lg max-w-5xl mx-auto leading-relaxed px-4">
      Lihat bagaimana kami telah membantu berbagai bisnis mencapai tujuan digital mereka melalui solusi yang
      disesuaikan dan strategi yang efektif.
    </p>
  </div>

  @if ($studyCaseForDesktop->isEmpty())
    <div class="flex justify-center">
      <x-empty-card item="studi kasus" />
    </div>
  @else
    <div x-data="{
        active: 0,
        total: {{ $studyCaseForMobile->count() }},
        isAnimating: false,
        autoPlayInterval: null,
    
        init() {
            this.startAutoPlay();
    
            this.$refs.container.addEventListener('mouseenter', () => this.stopAutoPlay());
            this.$refs.container.addEventListener('mouseleave', () => this.startAutoPlay());
        },
    
        startAutoPlay() {
            this.autoPlayInterval = setInterval(() => {
                this.next();
            }, 4000);
        },
    
        stopAutoPlay() {
            if (this.autoPlayInterval) {
                clearInterval(this.autoPlayInterval);
            }
        },
    
        next() {
            if (!this.isAnimating) {
                this.isAnimating = true;
                this.active = (this.active + 1) % this.total;
                setTimeout(() => { this.isAnimating = false; }, 600);
            }
        },
    
        prev() {
            if (!this.isAnimating) {
                this.isAnimating = true;
                this.active = (this.active - 1 + this.total) % this.total;
                setTimeout(() => { this.isAnimating = false; }, 600);
            }
        },
    
        goTo(index) {
            if (!this.isAnimating && index !== this.active) {
                this.isAnimating = true;
                this.active = index;
                setTimeout(() => { this.isAnimating = false; }, 600);
            }
        },
    
        getClass(index) {
            const diff = (index - this.active + this.total) % this.total;
    
            if (diff === 0) return 'active';
            if (diff === 1 || diff === -this.total + 1) return 'next';
            if (diff === this.total - 1 || diff === -1) return 'prev';
            if (diff === 2 || diff === -this.total + 2) return 'hidden-right';
            if (diff === this.total - 2 || diff === -2) return 'hidden-left';
    
            return 'far-hidden';
        }
    }" class="block sm:hidden overflow-hidden">

      <style>
        .carousel-3d-wrapper {
          perspective: 1200px;
          perspective-origin: center;
        }

        .carousel-3d-item {
          transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
          transform-style: preserve-3d;
        }

        .carousel-3d-item.active {
          transform: translateX(0) translateZ(0) scale(1);
          z-index: 30;
          opacity: 1;
        }

        .carousel-3d-item.prev {
          transform: translateX(-50%) translateZ(-50px) rotateY(15deg) scale(0.8);
          z-index: 20;
          opacity: 0.5;
          pointer-events: none;
        }

        .carousel-3d-item.next {
          transform: translateX(50%) translateZ(-50px) rotateY(-15deg) scale(0.8);
          z-index: 20;
          opacity: 0.5;
          pointer-events: none;
        }

        .carousel-3d-item.hidden-left,
        .carousel-3d-item.hidden-right,
        .carousel-3d-item.far-hidden {
          transform: translateX(0) translateZ(-100px) scale(0.6);
          z-index: 10;
          opacity: 0;
          pointer-events: none;
        }
      </style>

      <div x-ref="container" class="carousel-3d-wrapper relative h-96 mb-8 px-4">

        <div class="relative w-full h-full flex items-center justify-center overflow-visible">
          @foreach ($studyCaseForMobile as $index => $studyCase)
            <div :class="getClass({{ $index }})"
              class="carousel-3d-item absolute w-[90%] max-w-[320px] left-1/2 -translate-x-1/2">
              <x-study-case-card :studyCase="$studyCase" />
            </div>
          @endforeach
        </div>

        <button @click="prev()"
          class="absolute left-0 top-1/2 -translate-y-1/2 z-40 bg-impost-primary hover:bg-impost-secondary rounded-full p-3 shadow-xl transition-all duration-300 hover:scale-110">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>

        <button @click="next()"
          class="absolute right-0 top-1/2 -translate-y-1/2 z-40 bg-impost-primary hover:bg-impost-secondary rounded-full p-3 shadow-xl transition-all duration-300 hover:scale-110">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>

      <div class="flex justify-center gap-2 mt-4">
        <template x-for="(item, index) in total" :key="index">
          <button @click="goTo(index)" :class="active === index ? 'w-8 bg-impost-primary' : 'w-3 bg-impost-third'"
            class="h-3 rounded-full transition-all duration-300"></button>
        </template>
      </div>
    </div>

    <div class="hidden sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 auto-rows-fr" data-aos="fade-up"
      data-aos-stagger="100">
      @foreach ($studyCaseForDesktop as $studyCase)
        <div data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}"
          class="h-full transform transition-all duration-300 hover:-translate-y-2">
          <x-study-case-card :studyCase="$studyCase" />
        </div>
      @endforeach
    </div>

    <div class="hidden sm:flex justify-center mt-8 sm:mt-12 md:mt-16" data-aos="fade-up">
      <x-custom-pagination :items="$studyCaseForDesktop" />
    </div>

  @endif
</section>
