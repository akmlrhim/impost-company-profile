@props(['portfolios', 'portfolioCategories' => []])

@php
  $firstCategoryId = $portfolioCategories[0]->id ?? null;
@endphp

<section class="py-8 md:py-16 lg:py-20 relative overflow-hidden" id="portfolios">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    {{-- Header --}}
    <div class="text-center max-w-5xl mx-auto mb-10 md:mb-14 lg:mb-16">
      <h2 class="text-3xl md:text-5xl font-medium font-header leading-tight text-impost-primary mb-4 md:mb-6">
        Portfolio
      </h2>
      <p class="text-sm sm:text-base text-gray-300 font-light leading-relaxed mx-auto">
        Bukan sekadar janji manis, melainkan <span class="text-white font-medium">bukti nyata</span> yang lahir dari
        strategi terukur dan eksekusi presisi.
      </p>
    </div>

    {{-- Filter Kategori Portfolio - Moved to top --}}
    @if (!empty($portfolioCategories) && count($portfolioCategories))
      {{-- Desktop version: Pills --}}
      <div class="hidden md:flex flex-wrap justify-center gap-3 mb-8 md:mb-10">
        @foreach ($portfolioCategories as $index => $category)
          <button type="button"
            class="portfolio-category-pill rounded-full px-5 py-2 text-sm border font-bold cursor-pointer inline-flex items-center gap-2 transition-all duration-250 backdrop-blur-sm hover:border-yellow-400 hover:bg-yellow-500 hover:-translate-y-0.5 {{ $index === 0 ? 'border-yellow-400 bg-orange-500 shadow-lg text-black' : 'border-impost-primary bg-impost-primary text-black' }}"
            data-portfolio-category="{{ $category->id }}">
            <span class="uppercase tracking-wide text-xs opacity-80">
              {{ $category->name ?? ($category->title ?? 'Kategori') }}
            </span>
          </button>
        @endforeach
      </div>

      {{-- Mobile version: Dropdown --}}
      <div class="block md:hidden mb-12 md:mb-8">
        <select id="portfolioMobileSelect"
          class="w-full appearance-none bg-[#121212] text-white border border-white/10 rounded-xl py-3.5 px-5 pr-12 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all cursor-pointer text-sm font-medium shadow-lg">
          @foreach ($portfolioCategories as $category)
            <option value="{{ $category->id }}" class="bg-black text-white">
              {{ $category->name ?? ($category->title ?? 'Kategori') }}
            </option>
          @endforeach
        </select>
      </div>
    @endif

    {{-- Carousel Container --}}
    <div class="relative w-full h-[400px] md:h-[450px] lg:h-[550px] overflow-visible mb-8 md:mb-12 py-4 md:py-8"
      style="perspective: 2000px;">

      {{-- Previous Button --}}
      <button
        class="carousel-nav-prev absolute top-1/2 -translate-y-1/2 left-2 md:left-4 z-20 w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 bg-impost-primary/10 border border-impost-primary/30 backdrop-blur-sm hover:bg-impost-primary/25 hover:border-impost-primary/60 hover:scale-110 text-impost-primary"
        aria-label="Previous portfolio">
        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 18-6-6 6-6" />
        </svg>
      </button>

      <div class="relative w-full h-full"
        style="transform-style: preserve-3d; transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1);"
        id="portfolioCarouselContainer">
      </div>

      <div class="hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center z-10"
        id="portfolioEmptyMessage">
        <h3 class="text-impost-primary text-xl md:text-2xl font-bold mb-3">Belum Ada Portfolio</h3>
        <p class="text-white/80 text-sm md:text-base">Kategori ini belum memiliki portfolio tersedia.</p>
      </div>

      <button
        class="carousel-nav-next absolute top-1/2 -translate-y-1/2 right-2 md:right-4 z-20 w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 bg-impost-primary/10 border border-impost-primary/30 backdrop-blur-sm hover:bg-impost-primary/25 hover:border-impost-primary/60 hover:scale-110 text-impost-primary"
        aria-label="Next portfolio">
        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6" />
        </svg>
      </button>
    </div>

    <div class="text-center mt-12 md:mt-16">
      <a href="{{ route('portfolio') ?? '#portfolios' }}"
        class="bg-impost-primary inline-flex items-center justify-center px-6 py-2.5 sm:px-8 sm:py-3 text-sm sm:text-md font-medium text-black border border-impost-primary rounded-full hover:scale-105 transition-all duration-300">
        Lihat Portfolio Selengkapnya
      </a>
    </div>

  </div>
</section>

<script>
  (function() {
    'use strict';

    const originalPortfolios = @json($portfolios);
    const firstCategoryId = @json($firstCategoryId);

    // Early exit if no portfolios
    if (!originalPortfolios || originalPortfolios.length === 0) return;

    let currentIndex = 0;
    let autoRotateTimer = null;
    let rafId = null;
    let isAnimating = false;

    const container = document.getElementById('portfolioCarouselContainer');
    const emptyMessage = document.getElementById('portfolioEmptyMessage');
    const prevButton = document.querySelector('.carousel-nav-prev');
    const nextButton = document.querySelector('.carousel-nav-next');
    const mobileSelect = document.getElementById('portfolioMobileSelect');

    let portfoliosData = [];
    let visibleCards = [];

    // Constants
    const CARD_VISIBLE_RANGE = 3;
    const AUTO_ROTATE_DELAY = 1500;
    const ANIMATION_THROTTLE = 16; // ~60fps
    const RESIZE_DEBOUNCE = 200;

    let cachedParams = {
      totalCards: 0,
      angleStep: 0,
      radius: 0,
      windowWidth: window.innerWidth
    };

    const transformCache = new Map();

    function getResponsiveRadius() {
      const w = cachedParams.windowWidth;
      return w <= 480 ? 300 : w <= 768 ? 450 : 600;
    }

    function calculateCarouselParams() {
      const totalCards = portfoliosData.length;
      if (!totalCards) return;

      const minAngleStep = 30;
      const angleStep = Math.max(minAngleStep, 360 / totalCards);
      const baseRadius = getResponsiveRadius();
      const radius = baseRadius + Math.max(0, (totalCards - 5) * 20);

      cachedParams = {
        totalCards,
        angleStep,
        radius,
        windowWidth: window.innerWidth
      };

      transformCache.clear();
    }

    function getTransform(offset) {
      const cacheKey = `${offset}_${cachedParams.radius}_${cachedParams.angleStep}`;

      if (transformCache.has(cacheKey)) {
        return transformCache.get(cacheKey);
      }

      const {
        angleStep,
        radius
      } = cachedParams;
      const angle = angleStep * offset;
      const rad = (angle * Math.PI) / 180;
      const x = Math.sin(rad) * radius;
      const z = Math.cos(rad) * radius - radius;
      const rotateY = -angle;

      const transform = {
        style: `translate(-50%, -50%) translate3d(${x}px, 0, ${z}px) rotateY(${rotateY}deg)`,
        isVisible: Math.abs(offset) <= CARD_VISIBLE_RANGE,
        isActive: offset === 0,
        opacity: Math.abs(offset) <= CARD_VISIBLE_RANGE ? (offset === 0 ? 1 : 0.4) : 0
      };

      transformCache.set(cacheKey, transform);
      return transform;
    }

    function createCard(portfolio, index) {
      const card = document.createElement('div');
      card.className =
        'portfolio-card absolute left-1/2 top-1/2 w-[250px] sm:w-[280px] md:w-[320px] transition-all duration-600 opacity-0';
      card.style.cssText =
        'transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; pointer-events: none;';
      card.dataset.index = index;

      const imageUrl = portfolio.media_path ?
        `{{ asset('storage/') }}/${portfolio.media_path}` :
        'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=500&h=600&fit=crop';

      card.innerHTML = `
        <div class="relative overflow-hidden rounded-3xl">
          <img src="${imageUrl}" alt="${portfolio.title || ''}" class="w-full h-auto object-contain block" loading="lazy" decoding="async">
        </div>
      `;

      let clickTimeout = null;
      card.addEventListener('click', () => {
        if (clickTimeout || isAnimating) return;

        const cardIndex = parseInt(card.dataset.index);
        if (cardIndex !== currentIndex) {
          clickTimeout = setTimeout(() => clickTimeout = null, 300);
          currentIndex = cardIndex;
          updateCarousel();
          restartAutoRotate();
        }
      }, {
        passive: true
      });

      return card;
    }

    function updateCarousel() {
      if (isAnimating) {
        if (rafId) cancelAnimationFrame(rafId);
      }

      isAnimating = true;

      rafId = requestAnimationFrame(() => {
        const {
          totalCards
        } = cachedParams;
        const fragment = document.createDocumentFragment();

        visibleCards.forEach((card, index) => {
          let offset = index - currentIndex;
          if (offset > totalCards / 2) offset -= totalCards;
          if (offset < -totalCards / 2) offset += totalCards;

          const transform = getTransform(offset);

          card.style.transform = transform.style;
          card.style.opacity = transform.opacity;
          card.style.pointerEvents = transform.isVisible ? 'auto' : 'none';

          if (transform.isActive) {
            card.style.filter = 'brightness(1.1)';
            card.classList.add('z-10', 'opacity-100');
            card.classList.remove('cursor-pointer');
          } else {
            card.style.filter = 'brightness(0.6)';
            card.classList.remove('z-10', 'opacity-100');
            card.classList.add('cursor-pointer');
          }
        });

        isAnimating = false;
      });
    }

    function navigate(direction) {
      if (isAnimating) return;

      const {
        totalCards
      } = cachedParams;
      currentIndex = (currentIndex + direction + totalCards) % totalCards;
      updateCarousel();
      restartAutoRotate();
    }

    function startAutoRotate() {
      if (!portfoliosData.length || autoRotateTimer) return;

      autoRotateTimer = setInterval(() => {
        const {
          totalCards
        } = cachedParams;
        currentIndex = (currentIndex + 1) % totalCards;
        updateCarousel();
      }, AUTO_ROTATE_DELAY);
    }

    function stopAutoRotate() {
      if (autoRotateTimer) {
        clearInterval(autoRotateTimer);
        autoRotateTimer = null;
      }
    }

    function restartAutoRotate() {
      stopAutoRotate();
      startAutoRotate();
    }

    function renderCards() {
      container.innerHTML = '';
      visibleCards = [];
      transformCache.clear();

      if (!portfoliosData.length) {
        emptyMessage?.classList.remove('hidden');
        prevButton?.classList.add('hidden');
        nextButton?.classList.add('hidden');
        stopAutoRotate();
        return;
      }

      emptyMessage?.classList.add('hidden');
      prevButton?.classList.remove('hidden');
      nextButton?.classList.remove('hidden');

      const fragment = document.createDocumentFragment();

      portfoliosData.forEach((portfolio, index) => {
        const card = createCard(portfolio, index);
        visibleCards.push(card);
        fragment.appendChild(card);
      });

      container.appendChild(fragment);
      calculateCarouselParams();

      requestAnimationFrame(() => {
        updateCarousel();
      });
    }

    function setActiveCategoryPill(categoryId) {
      const pills = document.querySelectorAll('[data-portfolio-category]');
      const categoryStr = String(categoryId);

      pills.forEach(pill => {
        const isActive = pill.dataset.portfolioCategory === categoryStr;

        pill.classList.toggle('border-yellow-400', isActive);
        pill.classList.toggle('bg-orange-500', isActive);
        pill.classList.toggle('shadow-lg', isActive);
        pill.classList.toggle('border-impost-primary', !isActive);
        pill.classList.toggle('bg-impost-primary', !isActive);
      });
    }

    function filterByCategory(categoryId) {
      const catId = Number(categoryId);

      portfoliosData = originalPortfolios.filter(p =>
        Number(p.category_id) === catId || Number(p.category?.id) === catId
      );

      currentIndex = 0;
      renderCards();
      restartAutoRotate();
      setActiveCategoryPill(categoryId);

      if (mobileSelect) mobileSelect.value = categoryId;
    }

    let resizeTimeout = null;
    const handleResize = () => {
      if (resizeTimeout) clearTimeout(resizeTimeout);

      resizeTimeout = setTimeout(() => {
        const newWidth = window.innerWidth;
        if (Math.abs(newWidth - cachedParams.windowWidth) > 50) {
          calculateCarouselParams();
          updateCarousel();
        }
      }, RESIZE_DEBOUNCE);
    };

    function handlePillClick(e) {
      const pill = e.target.closest('[data-portfolio-category]');
      if (pill && !isAnimating) {
        const categoryId = parseInt(pill.dataset.portfolioCategory);
        filterByCategory(categoryId);
      }
    }

    function init() {
      if (firstCategoryId) {
        filterByCategory(firstCategoryId);
      } else {
        portfoliosData = [...originalPortfolios];
        renderCards();
        startAutoRotate();
      }

      document.addEventListener('click', handlePillClick);

      prevButton?.addEventListener('click', () => navigate(-1));
      nextButton?.addEventListener('click', () => navigate(1));

      mobileSelect?.addEventListener('change', (e) => {
        filterByCategory(parseInt(e.target.value));
      });

      if (cachedParams.windowWidth > 768) {
        container.addEventListener('mouseenter', stopAutoRotate, {
          passive: true
        });
        container.addEventListener('mouseleave', startAutoRotate, {
          passive: true
        });
      }

      window.addEventListener('resize', handleResize, {
        passive: true
      });

      window.addEventListener('beforeunload', () => {
        stopAutoRotate();
        if (rafId) cancelAnimationFrame(rafId);
        if (resizeTimeout) clearTimeout(resizeTimeout);
        document.removeEventListener('click', handlePillClick);
      }, {
        once: true
      });
    }

    if ('requestIdleCallback' in window) {
      requestIdleCallback(init, {
        timeout: 1000
      });
    } else {
      setTimeout(init, 0);
    }
  })();
</script>
