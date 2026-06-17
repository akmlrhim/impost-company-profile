@props(['portfolios', 'portfolioCategories' => []])

@php $firstCategoryId = $portfolioCategories[0]->id ?? null; @endphp

<section class="py-16 sm:py-20 lg:py-24 im-section-alt overflow-hidden" id="portfolios">

  {{-- Header --}}
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4">
        Port<span class="text-impost-primary">folio</span>
      </h2>
      <p class="text-base font-medium leading-relaxed text-white">
        Bukan sekadar janji <span class="text-impost-primary font-semibold">bukti nyata</span> dari strategi terukur
        dan eksekusi presisi.
      </p>
    </div>
  </div>

  @if (!empty($portfolios) && count($portfolios) > 0)

    {{-- Fan spread --}}
    <div class="relative w-full overflow-hidden h-[380px] sm:h-[440px] lg:h-[520px]">

      {{-- Skeleton --}}
      <div id="portfolio-skeleton"
        class="absolute inset-0 flex items-center justify-center gap-3 transition-opacity duration-500 pointer-events-none">
        @foreach ([-2, -1, 0, 1, 2] as $sk)
          @php
            $skAbs = abs($sk);
            $skOp = 1 - $skAbs * 0.22;
            $skRot = $sk * -18;
            $skTx = $sk * 130;
            $skSc = 1 - $skAbs * 0.1;
          @endphp
          <div
            class="absolute top-1/2 left-1/2 flex-shrink-0 rounded-3xl bg-white/[0.04] border border-white/[0.06] animate-pulse"
            style="width:200px;aspect-ratio:9/16;transform:translateX(calc(-50% + {{ $skTx }}px)) translateY(-50%) rotateY({{ $skRot }}deg) scale({{ $skSc }});opacity:{{ $skOp }};">
          </div>
        @endforeach
      </div>

      {{-- Fan --}}
      <div id="portfolio-fan" class="absolute inset-0 flex items-center justify-center" style="perspective:1400px;">
        <div id="portfolio-fan-track" class="relative w-full h-full" style="transform-style:preserve-3d;"></div>
      </div>

      {{-- Empty state --}}
      <div id="portfolioEmptyMessage" class="hidden absolute inset-0 flex items-center justify-center text-center">
        <div>
          <p class="text-lg font-bold text-white mb-1">Belum Ada Portfolio</p>
          <p class="text-sm font-medium text-white/50">Kategori ini belum memiliki portofolio.</p>
        </div>
      </div>

    </div>

    {{-- Category tabs + CTA --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      @if (!empty($portfolioCategories) && count($portfolioCategories))
        <div class="flex justify-center mt-10 sm:mt-12 border-b border-white/[0.07] overflow-x-auto">
          @foreach ($portfolioCategories as $index => $cat)
            <button type="button"
              class="portfolio-category-tab relative flex-shrink-0 px-5 sm:px-7 py-3 text-sm font-normal
                transition-colors duration-200 cursor-pointer
                {{ $index === 0 ? 'text-white' : 'text-white/40 hover:text-white/70' }}"
              data-portfolio-category="{{ $cat->id }}">
              {{ $cat->name ?? ($cat->title ?? 'Kategori') }}
              @if ($index === 0)
                <span
                  class="portfolio-tab-indicator absolute bottom-0 left-0 right-0 h-0.5 bg-impost-primary rounded-full"></span>
              @endif
            </button>
          @endforeach
        </div>
      @endif
    </div>
  @else
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-center py-20 border border-white/[0.06] rounded-[2rem] bg-white/[0.02]">
        <x-empty-card item="Portfolio" />
      </div>
    </div>
  @endif

</section>

<script>
  (function() {
    'use strict';

    const originalPortfolios = @json($portfolios);
    const firstCategoryId = @json($firstCategoryId);
    if (!originalPortfolios?.length) return;

    const track = document.getElementById('portfolio-fan-track');
    const emptyMsg = document.getElementById('portfolioEmptyMessage');
    const skeleton = document.getElementById('portfolio-skeleton');
    const fan = document.getElementById('portfolio-fan');

    let portfoliosData = [],
      cards = [],
      currentIndex = 0;
    let autoTimer = null,
      resizeTO = null;
    const AUTO_DELAY = 2400;

    /* --- responsive params --- */
    function cardWidth() {
      const w = window.innerWidth;
      return w >= 1280 ? 236 : w >= 768 ? 200 : 168;
    }

    function spread() {
      const w = window.innerWidth;
      return w >= 1280 ? 188 : w >= 768 ? 152 : 115;
    }

    function visRange() {
      return window.innerWidth >= 768 ? 3 : 2;
    }

    function rotateDeg() {
      return window.innerWidth >= 768 ? 22 : 17;
    }

    /* --- fan transform --- */
    function fanStyle(offset) {
      const abs = Math.abs(offset);
      if (abs > visRange()) return null;
      return {
        tx: offset * spread(),
        ry: offset * -rotateDeg(),
        sc: Math.pow(0.86, abs),
        op: abs === 0 ? 1 : abs === 1 ? 0.6 : abs === 2 ? 0.4 : 0.22,
        zi: 100 - abs * 10,
        br: abs === 0 ? 1.05 : Math.max(0.45, 0.75 - abs * 0.12),
      };
    }

    /* --- apply transforms --- */
    function applyStyles() {
      const total = portfoliosData.length;
      if (!total) return;
      cards.forEach((card, i) => {
        let off = i - currentIndex;
        if (off > total / 2) off -= total;
        if (off < -total / 2) off += total;
        const s = fanStyle(off);
        if (!s) {
          card.style.opacity = '0';
          card.style.pointerEvents = 'none';
          return;
        }
        card.style.transform =
          `translateX(calc(-50% + ${s.tx}px)) translateY(-50%) rotateY(${s.ry}deg) scale(${s.sc})`;
        card.style.opacity = s.op;
        card.style.zIndex = s.zi;
        card.style.filter = `brightness(${s.br})`;
        card.style.pointerEvents = off === 0 ? 'none' : 'auto';
        card.style.cursor = off !== 0 ? 'pointer' : 'default';
      });
    }

    /* --- card factory --- */
    function createCard(portfolio, index) {
      const card = document.createElement('div');
      card.className = 'absolute top-1/2 left-1/2';
      card.style.cssText = [
        `width:${cardWidth()}px`,
        'transition:transform .65s cubic-bezier(.23,1,.32,1),opacity .5s ease,filter .5s ease',
        'will-change:transform,opacity',
        'backface-visibility:hidden',
      ].join(';');
      card.dataset.index = index;

      const src = portfolio.media_path ? `{{ asset('storage/') }}/${portfolio.media_path}` : '';
      card.innerHTML = `
      <div class="relative w-full overflow-hidden rounded-3xl border border-white/[0.1] bg-white/[0.04] shadow-[0_32px_64px_rgba(0,0,0,0.5)]" style="aspect-ratio:9/16;">
        ${src ? `<img src="${src}" alt="${portfolio.title || ''}" class="absolute inset-0 w-full h-full object-cover" loading="lazy" decoding="async">` : ''}
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
        ${portfolio.title ? `<div class="absolute bottom-0 left-0 right-0 p-4 pb-5">
          <p class="text-white font-bold text-sm leading-snug line-clamp-2">${portfolio.title}</p>
        </div>` : ''}
      </div>`;

      card.addEventListener('click', () => {
        const idx = parseInt(card.dataset.index);
        if (idx !== currentIndex) {
          currentIndex = idx;
          applyStyles();
          restartAuto();
        }
      }, {
        passive: true
      });

      return card;
    }

    /* --- render all cards for current set --- */
    function renderCards() {
      track.innerHTML = '';
      cards = [];
      const isEmpty = !portfoliosData.length;
      emptyMsg?.classList.toggle('hidden', !isEmpty);
      if (isEmpty) {
        stopAuto();
        return;
      }

      const frag = document.createDocumentFragment();
      portfoliosData.forEach((p, i) => {
        const c = createCard(p, i);
        cards.push(c);
        frag.appendChild(c);
      });
      track.appendChild(frag);

      requestAnimationFrame(applyStyles);

      /* hide skeleton once first images load */
      if (skeleton) {
        const imgs = track.querySelectorAll('img');
        let loaded = 0;
        const reveal = () => {
          skeleton.style.opacity = '0';
          setTimeout(() => skeleton.style.display = 'none', 400);
        };
        if (!imgs.length) {
          reveal();
          return;
        }
        imgs.forEach(img => {
          if (img.complete) {
            if (++loaded >= imgs.length) reveal();
          } else {
            img.addEventListener('load', () => {
              if (++loaded >= imgs.length) reveal();
            }, {
              once: true
            });
            img.addEventListener('error', () => {
              if (++loaded >= imgs.length) reveal();
            }, {
              once: true
            });
          }
        });
        setTimeout(reveal, 1500);
      }
    }

    /* --- navigation --- */
    function navigate(dir) {
      if (!portfoliosData.length) return;
      currentIndex = (currentIndex + dir + portfoliosData.length) % portfoliosData.length;
      applyStyles();
      restartAuto();
    }

    /* --- auto rotate --- */
    function startAuto() {
      if (!autoTimer && portfoliosData.length) autoTimer = setInterval(() => navigate(1), AUTO_DELAY);
    }

    function stopAuto() {
      clearInterval(autoTimer);
      autoTimer = null;
    }

    function restartAuto() {
      stopAuto();
      startAuto();
    }

    /* --- tabs --- */
    function setActiveTab(categoryId) {
      document.querySelectorAll('.portfolio-category-tab').forEach(tab => {
        const active = tab.dataset.portfolioCategory === String(categoryId);
        tab.classList.toggle('text-white', active);
        tab.classList.toggle('text-white/40', !active);
        let ind = tab.querySelector('.portfolio-tab-indicator');
        if (active && !ind) {
          ind = document.createElement('span');
          ind.className =
            'portfolio-tab-indicator absolute bottom-0 left-0 right-0 h-0.5 bg-impost-primary rounded-full';
          tab.appendChild(ind);
        } else if (!active && ind) {
          ind.remove();
        }
      });
    }

    function filterByCategory(categoryId) {
      const id = Number(categoryId);
      portfoliosData = originalPortfolios.filter(p =>
        Number(p.category_id) === id || Number(p.category?.id) === id
      );
      currentIndex = 0;
      renderCards();
      restartAuto();
      setActiveTab(categoryId);
    }

    /* --- init --- */
    function init() {
      firstCategoryId
        ?
        filterByCategory(firstCategoryId) :
        (portfoliosData = [...originalPortfolios], renderCards(), startAuto());

      /* tab clicks */
      document.addEventListener('click', e => {
        const tab = e.target.closest('[data-portfolio-category]');
        if (tab) filterByCategory(parseInt(tab.dataset.portfolioCategory));
      });

      /* swipe */
      let tx0 = 0;
      fan?.addEventListener('touchstart', e => {
        tx0 = e.touches[0].clientX;
      }, {
        passive: true
      });
      fan?.addEventListener('touchend', e => {
        const diff = tx0 - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 45) navigate(diff > 0 ? 1 : -1);
      }, {
        passive: true
      });

      /* pause on hover */
      fan?.addEventListener('mouseenter', stopAuto, {
        passive: true
      });
      fan?.addEventListener('mouseleave', startAuto, {
        passive: true
      });

      /* resize → recalc */
      window.addEventListener('resize', () => {
        clearTimeout(resizeTO);
        resizeTO = setTimeout(() => {
          cards.forEach(c => c.style.width = `${cardWidth()}px`);
          applyStyles();
        }, 200);
      }, {
        passive: true
      });
    }

    'requestIdleCallback' in window ? requestIdleCallback(init, {
      timeout: 800
    }) : setTimeout(init, 0);
  })();
</script>
