@props(['portfolios', 'portfolioCategories' => []])

@php
  $firstCategoryId = $portfolioCategories[0]->id ?? null;
@endphp

<section class="py-8 md:py-16 lg:py-20 relative overflow-hidden">

  {{-- Background Effect --}}
  <div class="absolute inset-0 opacity-5">
    <div
      class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-impost-primary rounded-full blur-3xl">
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    {{-- Header --}}
    <div class="text-center max-w-3xl mx-auto mb-10 md:mb-14 lg:mb-16" data-aos="fade-up">
      <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold leading-tight text-impost-primary mb-4 md:mb-6">
        Hasil Nyata, Bukan Janji Kosong
      </h2>
      <p class="text-sm sm:text-base md:text-lg text-white">
        Kami tidak bicara potensi, kami bicara apa yang sudah terjadi melalui strategi, disiplin, dan sistem yang benar
      </p>
    </div>

    {{-- Carousel Container --}}
    <div class="relative w-full h-[400px] md:h-[450px] lg:h-[550px] overflow-visible mb-8 md:mb-12 py-4 md:py-8"
      style="perspective: 2000px;">

      {{-- Previous Button --}}
      <button
        class="carousel-nav-prev absolute top-1/2 -translate-y-1/2 left-2 md:left-4 z-20 w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 bg-impost-primary/10 border border-impost-primary/30 backdrop-blur-sm hover:bg-impost-primary/25 hover:border-impost-primary/60 hover:scale-110 text-impost-primary"
        onclick="portfolioCarousel.navigate(-1)">
        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 18-6-6 6-6" />
        </svg>
      </button>

      {{-- Carousel Container --}}
      <div class="relative w-full h-full"
        style="transform-style: preserve-3d; transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1);"
        id="portfolioCarouselContainer">
      </div>

      {{-- Empty Message --}}
      <div class="hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center z-10"
        id="portfolioEmptyMessage">
        <h3 class="text-impost-primary text-xl md:text-2xl font-bold mb-3">Belum Ada Portfolio</h3>
        <p class="text-white/80 text-sm md:text-base">Kategori ini belum memiliki portfolio tersedia.</p>
      </div>

      {{-- Next Button --}}
      <button
        class="carousel-nav-next absolute top-1/2 -translate-y-1/2 right-2 md:right-4 z-20 w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 bg-impost-primary/10 border border-impost-primary/30 backdrop-blur-sm hover:bg-impost-primary/25 hover:border-impost-primary/60 hover:scale-110 text-impost-primary"
        onclick="portfolioCarousel.navigate(1)">
        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6" />
        </svg>
      </button>
    </div>

    {{-- Filter Kategori Portfolio --}}
    @if (!empty($portfolioCategories) && count($portfolioCategories))
      {{-- Desktop version: Pills --}}
      <div class="hidden md:flex flex-wrap justify-center gap-3 mt-8" data-aos="fade-up" data-aos-delay="100">
        <button type="button"
          class="portfolio-category-pill rounded-full px-5 py-2 text-sm border border-impost-primary text-black font-bold bg-impost-primary cursor-pointer inline-flex items-center gap-2 transition-all duration-250 backdrop-blur-sm hover:border-yellow-400 hover:bg-yellow-500 hover:-translate-y-0.5"
          data-portfolio-category="all" onclick="portfolioCarousel.filterByCategory(null)">
          <span class="uppercase tracking-wide text-xs opacity-80">Semua</span>
        </button>

        @foreach ($portfolioCategories as $category)
          <button type="button"
            class="portfolio-category-pill rounded-full px-5 py-2 text-sm border border-impost-primary text-black font-bold bg-impost-primary cursor-pointer inline-flex items-center gap-2 transition-all duration-250 backdrop-blur-sm hover:border-yellow-400 hover:bg-yellow-500 hover:-translate-y-0.5"
            data-portfolio-category="{{ $category->id }}"
            onclick="portfolioCarousel.filterByCategory({{ $category->id }})">
            <span class="uppercase tracking-wide text-xs opacity-80">
              {{ $category->name ?? ($category->title ?? 'Kategori') }}
            </span>
          </button>
        @endforeach
      </div>

      {{-- Mobile version: Dropdown --}}
      <div class="block md:hidden mt-6 sm:mt-8" data-aos="fade-up" data-aos-delay="100">
        <select id="portfolioMobileSelect"
          class="w-full px-4 py-3 pr-10 border-2 border-impost-primary rounded-lg focus:outline-none focus:ring-2 focus:ring-impost-primary focus:border-transparent bg-black/50 backdrop-blur-sm text-white text-sm font-medium appearance-none cursor-pointer transition-all duration-200 hover:bg-black/60"
          style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%23d4ac3c%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3e%3cpolyline points=%276 9 12 15 18 9%27%3e%3c/polyline%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 0.75rem center; background-size: 1.25rem;"
          onchange="portfolioCarousel.filterByCategory(this.value === 'all' ? null : parseInt(this.value)); portfolioCarousel.setActiveMobileOption(this.value);">
          <option value="all" class="bg-black text-white">Semua Kategori</option>
          @foreach ($portfolioCategories as $category)
            <option value="{{ $category->id }}" class="bg-black text-white">
              {{ $category->name ?? ($category->title ?? 'Kategori') }}
            </option>
          @endforeach
        </select>
      </div>
    @endif

  </div>
</section>

<script>
  const portfolioCarousel = (function() {
    const originalPortfolios = @json($portfolios);

    let currentIndex = 0;
    let autoRotate;
    const container = document.getElementById('portfolioCarouselContainer');
    const emptyMessage = document.getElementById('portfolioEmptyMessage');
    const prevButton = document.querySelector('.carousel-nav-prev');
    const nextButton = document.querySelector('.carousel-nav-next');
    const mobileSelect = document.getElementById('portfolioMobileSelect');
    let portfoliosData = [...originalPortfolios];

    function createCard(portfolio, index) {
      const card = document.createElement('div');
      card.className =
        'portfolio-card absolute left-1/2 top-1/2 w-[250px] sm:w-[280px] md:w-[320px] transition-all duration-600 opacity-50';
      card.style.transformStyle = 'preserve-3d';
      card.style.backfaceVisibility = 'hidden';

      const imageUrl = portfolio.media_path ?
        `{{ asset('storage/') }}/${portfolio.media_path}` :
        'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=500&h=600&fit=crop';

      card.innerHTML = `
        <div class="relative overflow-hidden rounded-3xl">
          <img src="${imageUrl}" alt="${portfolio.title}" class="w-full h-auto object-contain block" loading="lazy">
          <div class="absolute inset-0"></div>
        </div>
      `;

      card.addEventListener('click', () => {
        if (!card.classList.contains('active-card')) {
          currentIndex = index;
          updateCarousel();
          restartAutoRotate();
        }
      });

      return card;
    }

    function updateCarousel() {
      const totalCards = portfoliosData.length || 1;
      const cards = container.querySelectorAll('.portfolio-card');

      const minAngleStep = 45;
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

        // Update classes based on active state
        if (index === currentIndex) {
          card.classList.add('active-card');
          card.classList.remove('opacity-50', 'cursor-pointer');
          card.classList.add('opacity-100', 'z-10');
          card.style.filter = 'brightness(1.1)';
        } else {
          card.classList.remove('active-card', 'opacity-100', 'z-10');
          card.classList.add('opacity-50', 'cursor-pointer');
          card.style.filter = 'brightness(0.6)';
        }

        card.style.opacity = isVisible ? (index === currentIndex ? "1" : "0.4") : "0";
        card.style.pointerEvents = isVisible ? "auto" : "none";
      });
    }

    function navigate(direction) {
      const totalCards = portfoliosData.length || 1;
      currentIndex = (currentIndex + direction + totalCards) % totalCards;
      updateCarousel();
      restartAutoRotate();
    }

    function startAutoRotate() {
      if (!portfoliosData.length) return;

      autoRotate = setInterval(() => {
        const totalCards = portfoliosData.length || 1;
        currentIndex = (currentIndex + 1) % totalCards;
        updateCarousel();
      }, 3000);
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

    function clearCards() {
      while (container.firstChild) {
        container.removeChild(container.firstChild);
      }
    }

    function renderCards() {
      clearCards();

      if (portfoliosData.length === 0) {
        if (emptyMessage) {
          emptyMessage.classList.remove('hidden');
          emptyMessage.classList.add('block');
        }
        if (prevButton) prevButton.classList.add('hidden');
        if (nextButton) nextButton.classList.add('hidden');
        stopAutoRotate();
        return;
      }

      if (emptyMessage) {
        emptyMessage.classList.add('hidden');
        emptyMessage.classList.remove('block');
      }
      if (prevButton) prevButton.classList.remove('hidden');
      if (nextButton) nextButton.classList.remove('hidden');

      portfoliosData.forEach((portfolio, index) => {
        const card = createCard(portfolio, index);
        container.appendChild(card);
      });

      updateCarousel();
    }

    function setActiveCategoryPill(categoryId) {
      const pills = document.querySelectorAll('[data-portfolio-category]');
      pills.forEach((pill) => {
        const value = pill.getAttribute('data-portfolio-category');
        const isAll = value === 'all' && (categoryId === null || categoryId === undefined);
        const isMatch = !isAll && value === String(categoryId);

        if (isAll || isMatch) {
          pill.classList.remove('border-impost-primary', 'bg-impost-primary');
          pill.classList.add('border-yellow-400', 'bg-orange-500', 'shadow-lg');
        } else {
          pill.classList.add('border-impost-primary', 'bg-impost-primary');
          pill.classList.remove('border-yellow-400', 'bg-orange-500', 'shadow-lg');
        }
      });
    }

    function setActiveMobileOption(value) {
      if (mobileSelect) {
        mobileSelect.value = value;
      }
    }

    function filterByCategory(categoryId) {
      if (!originalPortfolios || !originalPortfolios.length) return;

      if (categoryId === null || categoryId === undefined) {
        portfoliosData = [...originalPortfolios];
      } else {
        portfoliosData = originalPortfolios.filter((p) => {
          if (p.category_id && Number(p.category_id) === Number(categoryId)) return true;
          if (p.category && p.category.id && Number(p.category.id) === Number(categoryId)) return true;
          return false;
        });
      }

      currentIndex = 0;
      renderCards();
      restartAutoRotate();
      setActiveCategoryPill(categoryId);

      if (mobileSelect) {
        mobileSelect.value = categoryId === null ? 'all' : categoryId;
      }
    }

    function init() {
      portfoliosData = [...originalPortfolios];
      currentIndex = 0;
      renderCards();
      restartAutoRotate();

      setActiveCategoryPill(null);

      if (window.innerWidth > 768) {
        container.addEventListener('mouseenter', stopAutoRotate);
        container.addEventListener('mouseleave', startAutoRotate);
      }

      window.addEventListener('resize', updateCarousel);
    }

    init();

    return {
      navigate,
      filterByCategory,
      setActiveMobileOption
    };
  })();
</script>
