@props(['portfolios', 'portfolioCategories' => []])

@php
  $firstCategoryId = $portfolioCategories[0]->id ?? null;
@endphp

<section class="py-8 md:py-16 lg:py-20 relative overflow-hidden" id="portfolios">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <div class="text-center max-w-5xl mx-auto mb-8 md:mb-14 lg:mb-16">
      <h2
        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-medium font-header leading-tight text-impost-primary mb-3 md:mb-6">
        Portfolio
      </h2>
      <p class="text-sm sm:text-base md:text-lg text-gray-300 font-light leading-relaxed mx-auto">
        Bukan sekadar janji manis, melainkan <span class="text-white font-medium">bukti nyata</span> yang lahir dari
        strategi terukur dan eksekusi presisi.
      </p>
    </div>

    @if (!empty($portfolios) && count($portfolios) > 0)
      @if (!empty($portfolioCategories) && count($portfolioCategories))
        <div class="hidden md:flex flex-wrap justify-center gap-3 mb-8 md:mb-10">
          @foreach ($portfolioCategories as $index => $category)
            <button type="button"
              class="portfolio-category-pill rounded-full px-4 py-1.5 text-xs border font-bold cursor-pointer inline-flex items-center gap-2 transition-all duration-250 hover:border-yellow-400 hover:bg-yellow-500 hover:-translate-y-0.5 {{ $index === 0 ? 'border-yellow-400 bg-orange-500 shadow-lg text-black' : 'border-impost-primary bg-impost-primary text-black' }}"
              data-portfolio-category="{{ $category->id }}">
              <span class="uppercase tracking-wide text-[10px] opacity-80">
                {{ $category->name ?? ($category->title ?? 'Kategori') }}
              </span>
            </button>
          @endforeach
        </div>

        <div class="block md:hidden mb-8">
          <select id="portfolioMobileSelect"
            class="w-full appearance-none bg-[#121212] text-white border border-white/10 rounded-xl py-3 px-4 focus:outline-none focus:border-impost-primary focus:ring-1 focus:ring-impost-primary transition-all cursor-pointer text-xs font-medium shadow-lg">
            @foreach ($portfolioCategories as $category)
              <option value="{{ $category->id }}" class="bg-black text-white">
                {{ $category->name ?? ($category->title ?? 'Kategori') }}
              </option>
            @endforeach
          </select>
        </div>
      @endif

      <div
        class="relative w-full h-[340px] sm:h-[400px] md:h-[450px] lg:h-[550px] overflow-visible mb-6 md:mb-12 py-4 md:py-8"
        style="perspective: 2000px;">

        <button
          class="carousel-nav-prev absolute top-1/2 -translate-y-1/2 left-1 sm:left-2 md:left-4 z-40 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 bg-impost-primary/10 border border-impost-primary/30 hover:bg-impost-primary/25 hover:border-impost-primary/60 hover:scale-110 text-impost-primary"
          aria-label="Previous portfolio">
          <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 18-6-6 6-6" />
          </svg>
        </button>

        {{-- Skeleton --}}
        <div id="portfolio-carousel-skeleton"
          class="absolute inset-0 z-30 flex items-center justify-center transition-opacity duration-500">
          <div
            class="w-[200px] sm:w-[240px] md:w-[300px] lg:w-[320px] aspect-[4/5] bg-[#151515] rounded-2xl border border-impost-fourth animate-pulse">
          </div>
        </div>

        <div class="relative w-full h-full" id="portfolioCarouselContainer"
          style="transform-style: preserve-3d; transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.5s ease; opacity: 0;">
        </div>

        <div class="hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center z-10"
          id="portfolioEmptyMessage">
          <h3 class="text-impost-primary text-xl sm:text-2xl md:text-3xl font-bold mb-2">Belum Ada Portfolio</h3>
          <p class="text-white/80 text-sm sm:text-base md:text-lg">Kategori ini belum memiliki portfolio tersedia.</p>
        </div>

        <button
          class="carousel-nav-next absolute top-1/2 -translate-y-1/2 right-1 sm:right-2 md:right-4 z-20 w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 bg-impost-primary/10 border border-impost-primary/30 hover:bg-impost-primary/25 hover:border-impost-primary/60 hover:scale-110 text-impost-primary"
          aria-label="Next portfolio">
          <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6" />
          </svg>
        </button>
      </div>

      <div class="text-center mt-8 md:mt-16">

        <a href="{{ route('portfolio') ?? '#portfolios' }}"
          class="inline-flex items-center text-xs font-bold uppercase text-white hover:text-impost-primary transition-colors tracking-wider border-b border-transparent hover:border-impost-primary pb-1">
          Lihat Semua Portfolio
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-4 ml-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
          </svg>

        </a>
      </div>
    @else
      <div
        class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
        <x-empty-card item="Portfolio" />
      </div>
    @endif

  </div>
</section>

<script>
  (function() {
    'use strict';

    const originalPortfolios = @json($portfolios);
    const firstCategoryId = @json($firstCategoryId);

    if (!originalPortfolios?.length) return;

    const container = document.getElementById('portfolioCarouselContainer');
    const emptyMessage = document.getElementById('portfolioEmptyMessage');
    const prevButton = document.querySelector('.carousel-nav-prev');
    const nextButton = document.querySelector('.carousel-nav-next');
    const mobileSelect = document.getElementById('portfolioMobileSelect');

    let portfoliosData = [];
    let visibleCards = [];
    let currentIndex = 0;
    let autoRotateTimer = null;
    let rafId = null;
    let isAnimating = false;
    let resizeTimeout = null;

    const CARD_VISIBLE_RANGE = 3;
    const AUTO_ROTATE_DELAY = 1500;
    const transformCache = new Map();

    let params = {
      totalCards: 0,
      angleStep: 0,
      radius: 0,
      windowWidth: window.innerWidth
    };

    function getRadius() {
      const w = params.windowWidth;
      return w <= 480 ? 260 : w <= 768 ? 400 : 600;
    }

    function calcParams() {
      const total = portfoliosData.length;
      if (!total) return;
      params = {
        totalCards: total,
        angleStep: Math.max(30, 360 / total),
        radius: getRadius() + Math.max(0, (total - 5) * 20),
        windowWidth: window.innerWidth
      };
      transformCache.clear();
    }

    function getTransform(offset) {
      const key = `${offset}_${params.radius}_${params.angleStep}`;
      if (transformCache.has(key)) return transformCache.get(key);

      const rad = (params.angleStep * offset * Math.PI) / 180;
      const x = Math.sin(rad) * params.radius;
      const z = Math.cos(rad) * params.radius - params.radius;
      const rotateY = -(params.angleStep * offset);
      const absOff = Math.abs(offset);
      const result = {
        style: `translate(-50%, -50%) translate3d(${x}px,0,${z}px) rotateY(${rotateY}deg)`,
        isVisible: absOff <= CARD_VISIBLE_RANGE,
        isActive: offset === 0,
        opacity: absOff <= CARD_VISIBLE_RANGE ? (offset === 0 ? 1 : 0.4) : 0
      };

      transformCache.set(key, result);
      return result;
    }

    function createCard(portfolio, index) {
      const card = document.createElement('div');
      card.className =
        'portfolio-card absolute left-1/2 top-1/2 w-[200px] sm:w-[240px] md:w-[300px] lg:w-[320px] transition-all duration-600 opacity-0';
      card.style.cssText =
        'transform-style:preserve-3d;backface-visibility:hidden;will-change:transform,opacity;pointer-events:none;';
      card.dataset.index = index;

      const src = portfolio.media_path ?
        `{{ asset('storage/') }}/${portfolio.media_path}` :
        'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=500&h=600&fit=crop';

      card.innerHTML =
        `<div class="relative overflow-hidden rounded-2xl sm:rounded-3xl"><img src="${src}" alt="${portfolio.title || ''}" class="w-full h-auto object-contain block" loading="lazy" decoding="async"></div>`;

      let clickTimeout = null;
      card.addEventListener('click', () => {
        if (clickTimeout || isAnimating) return;
        const idx = parseInt(card.dataset.index);
        if (idx !== currentIndex) {
          clickTimeout = setTimeout(() => clickTimeout = null, 300);
          currentIndex = idx;
          updateCarousel();
          restartAutoRotate();
        }
      }, {
        passive: true
      });

      return card;
    }

    function updateCarousel() {
      if (isAnimating && rafId) cancelAnimationFrame(rafId);
      isAnimating = true;

      rafId = requestAnimationFrame(() => {
        visibleCards.forEach((card, index) => {
          let offset = index - currentIndex;
          if (offset > params.totalCards / 2) offset -= params.totalCards;
          if (offset < -params.totalCards / 2) offset += params.totalCards;

          const t = getTransform(offset);
          card.style.transform = t.style;
          card.style.opacity = t.opacity;
          card.style.pointerEvents = t.isVisible ? 'auto' : 'none';

          if (t.isActive) {
            card.style.filter = 'brightness(1.1)';
            card.classList.add('z-10');
            card.classList.remove('cursor-pointer');
          } else {
            card.style.filter = 'brightness(0.6)';
            card.classList.remove('z-10');
            card.classList.add('cursor-pointer');
          }
        });
        isAnimating = false;
      });
    }

    function navigate(dir) {
      if (isAnimating) return;
      currentIndex = (currentIndex + dir + params.totalCards) % params.totalCards;
      updateCarousel();
      restartAutoRotate();
    }

    function startAutoRotate() {
      if (!portfoliosData.length || autoRotateTimer) return;
      autoRotateTimer = setInterval(() => {
        currentIndex = (currentIndex + 1) % params.totalCards;
        updateCarousel();
      }, AUTO_ROTATE_DELAY);
    }

    function stopAutoRotate() {
      clearInterval(autoRotateTimer);
      autoRotateTimer = null;
    }

    function restartAutoRotate() {
      stopAutoRotate();
      startAutoRotate();
    }

    function renderCards() {
      container.innerHTML = '';
      visibleCards = [];
      transformCache.clear();

      const isEmpty = !portfoliosData.length;
      emptyMessage?.classList.toggle('hidden', !isEmpty);
      prevButton?.classList.toggle('hidden', isEmpty);
      nextButton?.classList.toggle('hidden', isEmpty);
      if (isEmpty) {
        stopAutoRotate();
        return;
      }

      const frag = document.createDocumentFragment();
      portfoliosData.forEach((p, i) => {
        const card = createCard(p, i);
        visibleCards.push(card);
        frag.appendChild(card);
      });

      container.appendChild(frag);
      calcParams();
      requestAnimationFrame(updateCarousel);

      const skeleton = document.getElementById('portfolio-carousel-skeleton');
      if (skeleton && skeleton.style.display !== 'none') {
        const imgs = container.querySelectorAll('img');
        let loaded = 0;

        function reveal() {
          skeleton.style.opacity = '0';
          setTimeout(() => skeleton.style.display = 'none', 500);
          container.style.opacity = '1';
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
    }

    function setActivePill(categoryId) {
      const str = String(categoryId);
      document.querySelectorAll('[data-portfolio-category]').forEach(pill => {
        const active = pill.dataset.portfolioCategory === str;
        pill.classList.toggle('border-yellow-400', active);
        pill.classList.toggle('bg-orange-500', active);
        pill.classList.toggle('shadow-lg', active);
        pill.classList.toggle('border-impost-primary', !active);
        pill.classList.toggle('bg-impost-primary', !active);
      });
    }

    function filterByCategory(categoryId) {
      const id = Number(categoryId);
      portfoliosData = originalPortfolios.filter(p =>
        Number(p.category_id) === id || Number(p.category?.id) === id
      );
      currentIndex = 0;
      renderCards();
      restartAutoRotate();
      setActivePill(categoryId);
      if (mobileSelect) mobileSelect.value = categoryId;
    }

    function handlePillClick(e) {
      const pill = e.target.closest('[data-portfolio-category]');
      if (pill && !isAnimating) filterByCategory(parseInt(pill.dataset.portfolioCategory));
    }

    function init() {
      firstCategoryId ? filterByCategory(firstCategoryId) : (portfoliosData = [...originalPortfolios], renderCards(),
        startAutoRotate());

      document.addEventListener('click', handlePillClick);
      prevButton?.addEventListener('click', () => navigate(-1));
      nextButton?.addEventListener('click', () => navigate(1));
      mobileSelect?.addEventListener('change', e => filterByCategory(parseInt(e.target.value)));

      if (params.windowWidth > 768) {
        container.addEventListener('mouseenter', stopAutoRotate, {
          passive: true
        });
        container.addEventListener('mouseleave', startAutoRotate, {
          passive: true
        });
      }

      window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
          const newW = window.innerWidth;
          if (Math.abs(newW - params.windowWidth) > 50) {
            params.windowWidth = newW;
            calcParams();
            updateCarousel();
          }
        }, 200);
      }, {
        passive: true
      });

      window.addEventListener('beforeunload', () => {
        stopAutoRotate();
        if (rafId) cancelAnimationFrame(rafId);
        clearTimeout(resizeTimeout);
        document.removeEventListener('click', handlePillClick);
      }, {
        once: true
      });
    }

    'requestIdleCallback' in window
      ?
      requestIdleCallback(init, {
        timeout: 1000
      }) :
      setTimeout(init, 0);

  })();
</script>
