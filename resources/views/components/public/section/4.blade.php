@props(['portfolios'])

<style>
  .carousel-3d {
    perspective: 2000px;
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
  }

  .carousel-container {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1);
  }

  .carousel-card {
    position: absolute;
    width: 320px;
    left: 50%;
    top: 50%;
    transform-style: preserve-3d;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    backface-visibility: hidden;
  }

  .carousel-card.active {
    z-index: 10;
    opacity: 1;
    filter: brightness(1.1);
  }

  .carousel-card:not(.active) {
    opacity: 0.5;
    filter: brightness(0.6);
    cursor: pointer;
  }

  .carousel-card:not(.active):hover {
    opacity: 0.8;
    filter: brightness(0.8);
  }

  .card-image-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 1.5rem;
    aspect-ratio: 4/5;
    background: #000;
  }

  .card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  .card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.3) 50%, transparent 100%);
  }

  .card-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1.5rem;
  }

  .card-title {
    color: #d4ac3c;
    font-weight: 700;
    margin-bottom: 0.75rem;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  .card-description {
    color: #e5e5e5;
    font-size: 0.875rem;
    line-height: 1.6;
    margin: 0;
  }

  .carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 20;
    background: rgba(212, 172, 60, 0.1);
    border: 1px solid rgba(212, 172, 60, 0.3);
    backdrop-filter: blur(10px);
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    color: #d4ac3c;
  }

  .carousel-nav:hover {
    background: rgba(212, 172, 60, 0.25);
    border-color: rgba(212, 172, 60, 0.6);
    transform: translateY(-50%) scale(1.1);
  }

  .carousel-nav.prev {
    left: 1rem;
  }

  .carousel-nav.next {
    right: 1rem;
  }

  @media (max-width: 768px) {
    .carousel-3d {
      height: 400px;
    }

    .carousel-card {
      width: 280px;
    }

    .card-content {
      padding: 1.25rem;
    }

    .card-title {
      font-size: 0.875rem;
      margin-bottom: 0.5rem;
    }

    .card-description {
      font-size: 0.8125rem;
    }

    .carousel-nav {
      width: 40px;
      height: 40px;
    }

    .carousel-nav.prev {
      left: 0.5rem;
    }

    .carousel-nav.next {
      right: 0.5rem;
    }
  }

  @media (max-width: 480px) {
    .carousel-3d {
      height: 360px;
    }

    .carousel-card {
      width: 250px;
    }

    .card-content {
      padding: 1rem;
    }

    .card-title {
      font-size: 0.8125rem;
    }

    .card-description {
      font-size: 0.75rem;
    }
  }
</style>

<section class="py-12 md:py-20 lg:py-24 relative overflow-hidden">

  <div class="absolute inset-0 opacity-5">
    <div
      class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-impost-primary rounded-full blur-3xl">
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <div class="text-center max-w-3xl mx-auto mb-10 md:mb-14 lg:mb-16" data-aos="fade-up">
      <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4 md:mb-6">
        Hasil Nyata, Bukan Janji Kosong
      </h2>
      <p class="text-sm sm:text-base md:text-lg text-white">
        Kami tidak bicara potensi, kami bicara apa yang sudah terjadi melalui strategi, disiplin, dan sistem yang benar
      </p>
    </div>

    <div class="carousel-3d">
      <button class="carousel-nav prev" onclick="portfolioCarousel.navigate(-1)">
        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 18-6-6 6-6" />
        </svg>
      </button>

      <div class="carousel-container" id="portfolioCarouselContainer"></div>

      <button class="carousel-nav next" onclick="portfolioCarousel.navigate(1)">
        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6" />
        </svg>
      </button>
    </div>
  </div>
</section>

<script>
  const portfolioCarousel = (function() {
    const portfoliosData = @json($portfolios);

    let currentIndex = 0;
    let autoRotate;
    const container = document.getElementById('portfolioCarouselContainer');
    const totalCards = portfoliosData.length;

    function createCard(portfolio, index) {
      const card = document.createElement('div');
      card.className = 'carousel-card';

      const imageUrl = portfolio.cover_path ?
        `{{ asset('storage/') }}/${portfolio.cover_path}` :
        'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=500&h=600&fit=crop';

      card.innerHTML = `
        <div class="card-image-wrapper">
          <img src="${imageUrl}" alt="${portfolio.title}" class="card-image" loading="lazy">
          <div class="card-overlay"></div>
        </div>
      `;

      card.addEventListener('click', () => {
        if (!card.classList.contains('active')) {
          currentIndex = index;
          updateCarousel();
          restartAutoRotate();
        }
      });

      return card;
    }

    function updateCarousel() {
      const cards = container.querySelectorAll('.carousel-card');

      const minAngleStep = 30;
      const angleStep = Math.max(minAngleStep, 360 / totalCards);

      let baseRadius = (window.innerWidth <= 480) ? 300 : (window.innerWidth <= 768) ? 450 : 600;

      const radius = baseRadius + (totalCards > 5 ? (totalCards - 5) * 20 : 0);

      cards.forEach((card, index) => {
        let offset = index - currentIndex;

        if (offset > totalCards / 2) offset -= totalCards;
        if (offset < -totalCards / 2) offset += totalCards;

        const angle = angleStep * offset;
        const rad = (angle * Math.PI) / 180;

        const x = Math.sin(rad) * radius;
        const z = Math.cos(rad) * radius - radius;
        const rotateY = -angle;


        const isVisible = Math.abs(offset) <= 3;

        card.style.transform = `
				translate(-50%, -50%)
				translate3d(${x}px, 0, ${z}px)
				rotateY(${rotateY}deg)
			`;

        card.style.opacity = isVisible ? (index === currentIndex ? "1" : "0.4") : "0";
        card.style.pointerEvents = isVisible ? "auto" : "none";
        card.classList.toggle('active', index === currentIndex);
      });
    }

    function navigate(direction) {
      currentIndex = (currentIndex + direction + totalCards) % totalCards;
      updateCarousel();
      restartAutoRotate();
    }

    function startAutoRotate() {
      autoRotate = setInterval(() => {
        currentIndex = (currentIndex + 1) % totalCards;
        updateCarousel();
      }, 3500);
    }

    function stopAutoRotate() {
      if (autoRotate) {
        clearInterval(autoRotate);
        autoRotate = null;
      }
    }

    function restartAutoRotate() {
      stopAutoRotate();
      startAutoRotate();
    }

    function init() {
      portfoliosData.forEach((portfolio, index) => {
        const card = createCard(portfolio, index);
        container.appendChild(card);
      });

      updateCarousel();
      startAutoRotate();

      if (window.innerWidth > 768) {
        container.addEventListener('mouseenter', stopAutoRotate);
        container.addEventListener('mouseleave', startAutoRotate);
      }

      window.addEventListener('resize', updateCarousel);
    }

    init();

    return {
      navigate
    };
  })();
</script>
