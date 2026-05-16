@props(['portfolios', 'portfolioCategories' => []])

@php $firstCategoryId = $portfolioCategories[0]->id ?? null; @endphp

<section class="py-16 sm:py-20 lg:py-24 im-section-alt overflow-hidden" id="portfolios">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
      <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-3">Hasil Kerja Nyata</p>
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4">
        Port<span class="text-impost-primary">folio</span>
      </h2>
      <p class="text-base font-medium leading-relaxed text-white">
        Bukan sekadar janji — <span class="text-white font-semibold">bukti nyata</span> dari strategi terukur dan eksekusi presisi.
      </p>
    </div>

    @if (!empty($portfolios) && count($portfolios) > 0)

      {{-- Category pills — desktop --}}
      @if (!empty($portfolioCategories) && count($portfolioCategories))
        <div class="hidden md:flex flex-wrap justify-center gap-2 mb-10">
          @foreach ($portfolioCategories as $index => $category)
            <button type="button"
              class="portfolio-category-pill inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full cursor-pointer text-xs px-4 py-2 border border-white/12 transition-all duration-200
                {{ $index === 0 ? 'bg-impost-primary text-black border-impost-primary' : 'bg-transparent text-white hover:text-white hover:border-white/30' }}"
              data-portfolio-category="{{ $category->id }}">
              {{ $category->name ?? ($category->title ?? 'Kategori') }}
            </button>
          @endforeach
        </div>

        {{-- Mobile select --}}
        <div class="block md:hidden mb-8">
          <select id="portfolioMobileSelect"
            class="w-full bg-impost-fifth text-white border border-white/12 rounded-full py-3 px-5 focus:outline-none focus:border-impost-primary transition-all text-sm font-medium">
            @foreach ($portfolioCategories as $category)
              <option value="{{ $category->id }}" class="bg-impost-fifth text-white">
                {{ $category->name ?? ($category->title ?? 'Kategori') }}
              </option>
            @endforeach
          </select>
        </div>
      @endif

      {{-- 3D Carousel --}}
      <div class="relative w-full h-[340px] sm:h-[400px] md:h-[480px] lg:h-[560px] mb-8 md:mb-12 py-4 md:py-8"
        style="perspective: 2000px;">

        <button class="carousel-nav-prev absolute top-1/2 -translate-y-1/2 left-1 sm:left-3 md:left-6 z-40
          w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full flex items-center justify-center cursor-pointer
          transition-all duration-200 bg-white/[0.04] border border-white/[0.08] hover:border-impost-primary/50 hover:bg-impost-primary/10 text-white hover:text-impost-primary"
          aria-label="Previous">
          <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path d="m15 18-6-6 6-6"/>
          </svg>
        </button>

        <div id="portfolio-carousel-skeleton"
          class="absolute inset-0 z-30 flex items-center justify-center transition-opacity duration-500">
          <div class="w-[200px] sm:w-[240px] md:w-[280px] lg:w-[320px] aspect-[4/5] rounded-[2rem] bg-white/[0.04] border border-white/[0.08] animate-pulse"></div>
        </div>

        <div class="relative w-full h-full" id="portfolioCarouselContainer"
          style="transform-style:preserve-3d;transition:transform .7s cubic-bezier(.23,1,.32,1),opacity .5s ease;opacity:0;"></div>

        <div class="hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center z-10"
          id="portfolioEmptyMessage">
          <h3 class="text-2xl font-bold leading-tight text-impost-primary font-bold mb-2">Belum Ada Portfolio</h3>
          <p class="text-sm font-medium leading-relaxed text-white">Kategori ini belum memiliki portfolio tersedia.</p>
        </div>

        <button class="carousel-nav-next absolute top-1/2 -translate-y-1/2 right-1 sm:right-3 md:right-6 z-20
          w-9 h-9 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full flex items-center justify-center cursor-pointer
          transition-all duration-200 bg-white/[0.04] border border-white/[0.08] hover:border-impost-primary/50 hover:bg-impost-primary/10 text-white hover:text-impost-primary"
          aria-label="Next">
          <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path d="m9 18 6-6-6-6"/>
          </svg>
        </button>
      </div>

      {{-- CTA --}}
      <div class="text-center">
        <a href="{{ route('portfolio') }}" class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5 bg-[#d4ac3c] text-[#040404] hover:bg-[#d09738] transition-colors duration-150 cursor-pointer whitespace-nowrap">
          Lihat Semua Portfolio
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
          </svg>
        </a>
      </div>

    @else
      <div class="flex items-center justify-center py-20 border border-white/6 rounded-[2rem] bg-white/2">
        <x-empty-card item="Portfolio" />
      </div>
    @endif

  </div>
</section>

<script>
  (function() {
    'use strict';
    const originalPortfolios = @json($portfolios);
    const firstCategoryId    = @json($firstCategoryId);
    if (!originalPortfolios?.length) return;

    const container   = document.getElementById('portfolioCarouselContainer');
    const emptyMsg    = document.getElementById('portfolioEmptyMessage');
    const prevBtn     = document.querySelector('.carousel-nav-prev');
    const nextBtn     = document.querySelector('.carousel-nav-next');
    const mobileSelect = document.getElementById('portfolioMobileSelect');

    let portfoliosData = [], visibleCards = [], currentIndex = 0;
    let autoRotateTimer = null, rafId = null, isAnimating = false, resizeTimeout = null;
    const AUTO_ROTATE_DELAY = 1800;
    function getVisibleRange() { return params.windowWidth <= 480 ? 1 : 3; }
    const transformCache = new Map();
    let params = { totalCards:0, angleStep:0, radius:0, windowWidth: window.innerWidth };

    function getRadius() {
      const w = params.windowWidth;
      // Keep side cards within viewport bounds on each screen size
      return w <= 480 ? 90 : w <= 768 ? 210 : 420;
    }
    function calcParams() {
      const total = portfoliosData.length;
      if (!total) return;
      // On mobile, don't expand radius for many cards — keep it fixed
      const baseRadius = getRadius();
      const extraRadius = params.windowWidth <= 480 ? 0 : Math.max(0, (total - 5) * 15);
      params = { totalCards:total, angleStep: Math.max(28, 360/total), radius: baseRadius + extraRadius, windowWidth: window.innerWidth };
      transformCache.clear();
    }
    function getTransform(offset) {
      const key = `${offset}_${params.radius}_${params.angleStep}`;
      if (transformCache.has(key)) return transformCache.get(key);
      const rad = (params.angleStep * offset * Math.PI) / 180;
      const x   = Math.sin(rad) * params.radius;
      const z   = Math.cos(rad) * params.radius - params.radius;
      const absOff = Math.abs(offset);
      const visRange = getVisibleRange();
      const result = {
        style: `translate(-50%,-50%) translate3d(${x}px,0,${z}px) rotateY(${-(params.angleStep*offset)}deg)`,
        isVisible: absOff <= visRange,
        isActive:  offset === 0,
        opacity:   absOff <= visRange ? (offset===0 ? 1 : 0.4) : 0
      };
      transformCache.set(key, result);
      return result;
    }
    function createCard(portfolio, index) {
      const card = document.createElement('div');
      card.className = 'portfolio-card absolute left-1/2 top-1/2 w-[200px] sm:w-[240px] md:w-[280px] lg:w-[320px] transition-all duration-600 opacity-0';
      card.style.cssText = 'transform-style:preserve-3d;backface-visibility:hidden;will-change:transform,opacity;pointer-events:none;';
      card.dataset.index = index;
      const src = portfolio.media_path ? `{{ asset('storage/') }}/${portfolio.media_path}` : 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=500&h=600&fit=crop';
      card.innerHTML = `<div class="relative overflow-hidden rounded-[2rem]"><img src="${src}" alt="${portfolio.title||''}" class="w-full h-auto object-contain block" loading="lazy" decoding="async"></div>`;
      card.addEventListener('click', () => {
        if (isAnimating) return;
        const idx = parseInt(card.dataset.index);
        if (idx !== currentIndex) { currentIndex=idx; updateCarousel(); restartAutoRotate(); }
      }, { passive:true });
      return card;
    }
    function updateCarousel() {
      if (isAnimating && rafId) cancelAnimationFrame(rafId);
      isAnimating = true;
      rafId = requestAnimationFrame(() => {
        visibleCards.forEach((card, index) => {
          let offset = index - currentIndex;
          if (offset >  params.totalCards/2) offset -= params.totalCards;
          if (offset < -params.totalCards/2) offset += params.totalCards;
          const t = getTransform(offset);
          card.style.transform    = t.style;
          card.style.opacity      = t.opacity;
          card.style.pointerEvents = t.isVisible ? 'auto' : 'none';
          if (t.isActive) { card.style.filter='brightness(1.1)'; card.classList.add('z-10'); card.classList.remove('cursor-pointer'); }
          else            { card.style.filter='brightness(0.55)'; card.classList.remove('z-10'); card.classList.add('cursor-pointer'); }
        });
        isAnimating = false;
      });
    }
    function navigate(dir) {
      if (isAnimating) return;
      currentIndex = (currentIndex + dir + params.totalCards) % params.totalCards;
      updateCarousel(); restartAutoRotate();
    }
    function startAutoRotate() {
      if (!portfoliosData.length || autoRotateTimer) return;
      autoRotateTimer = setInterval(() => { currentIndex=(currentIndex+1)%params.totalCards; updateCarousel(); }, AUTO_ROTATE_DELAY);
    }
    function stopAutoRotate()    { clearInterval(autoRotateTimer); autoRotateTimer=null; }
    function restartAutoRotate() { stopAutoRotate(); startAutoRotate(); }
    function renderCards() {
      container.innerHTML = ''; visibleCards = []; transformCache.clear();
      const isEmpty = !portfoliosData.length;
      emptyMsg?.classList.toggle('hidden', !isEmpty);
      prevBtn?.classList.toggle('hidden', isEmpty);
      nextBtn?.classList.toggle('hidden', isEmpty);
      if (isEmpty) { stopAutoRotate(); return; }
      const frag = document.createDocumentFragment();
      portfoliosData.forEach((p,i) => { const c=createCard(p,i); visibleCards.push(c); frag.appendChild(c); });
      container.appendChild(frag);
      calcParams();
      requestAnimationFrame(updateCarousel);
      const skeleton = document.getElementById('portfolio-carousel-skeleton');
      if (skeleton && skeleton.style.display !== 'none') {
        const imgs = container.querySelectorAll('img'); let loaded=0;
        function reveal() { skeleton.style.opacity='0'; setTimeout(()=>skeleton.style.display='none',500); container.style.opacity='1'; }
        if (!imgs.length) { reveal(); }
        else { imgs.forEach(img => { if(img.complete){loaded++;if(loaded>=imgs.length)reveal();} else { img.addEventListener('load',()=>{loaded++;if(loaded>=imgs.length)reveal();},{once:true}); img.addEventListener('error',()=>{loaded++;if(loaded>=imgs.length)reveal();},{once:true}); } }); setTimeout(reveal,1500); }
      }
    }
    function setActivePill(categoryId) {
      document.querySelectorAll('[data-portfolio-category]').forEach(pill => {
        const active = pill.dataset.portfolioCategory === String(categoryId);
        pill.classList.toggle('bg-impost-primary',active); pill.classList.toggle('text-black',active);
        pill.classList.toggle('border-impost-primary',active);
        pill.classList.toggle('bg-transparent',!active); pill.classList.toggle('text-white',!active);
        pill.classList.toggle('border-white/12',!active);
      });
    }
    function filterByCategory(categoryId) {
      const id = Number(categoryId);
      portfoliosData = originalPortfolios.filter(p => Number(p.category_id)===id || Number(p.category?.id)===id);
      currentIndex = 0; renderCards(); restartAutoRotate(); setActivePill(categoryId);
      if (mobileSelect) mobileSelect.value = categoryId;
    }
    function init() {
      firstCategoryId ? filterByCategory(firstCategoryId) : (portfoliosData=[...originalPortfolios], renderCards(), startAutoRotate());
      document.addEventListener('click', e => { const pill=e.target.closest('[data-portfolio-category]'); if(pill&&!isAnimating) filterByCategory(parseInt(pill.dataset.portfolioCategory)); });
      prevBtn?.addEventListener('click', ()=>navigate(-1));
      nextBtn?.addEventListener('click', ()=>navigate(1));
      mobileSelect?.addEventListener('change', e=>filterByCategory(parseInt(e.target.value)));
      if (params.windowWidth > 768) {
        container.addEventListener('mouseenter', stopAutoRotate, {passive:true});
        container.addEventListener('mouseleave', startAutoRotate, {passive:true});
      }
      window.addEventListener('resize', ()=>{
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(()=>{ const nw=window.innerWidth; if(Math.abs(nw-params.windowWidth)>50){params.windowWidth=nw;calcParams();updateCarousel();} },200);
      }, {passive:true});
    }
    'requestIdleCallback' in window ? requestIdleCallback(init,{timeout:1000}) : setTimeout(init,0);
  })();
</script>
