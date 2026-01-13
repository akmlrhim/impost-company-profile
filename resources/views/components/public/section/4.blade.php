<style>
  .carousel-3d {
    perspective: 1200px;
    position: relative;
    width: 100%;
    height: 500px;
  }

  .carousel-container {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .carousel-card {
    position: absolute;
    width: 350px;
    left: 50%;
    top: 50%;
    transform-style: preserve-3d;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    backface-visibility: hidden;
  }

  .carousel-card.active {
    z-index: 10;
    opacity: 1;
    filter: brightness(1.2) saturate(1.2);
  }

  .carousel-card:not(.active) {
    opacity: 0.5;
    filter: brightness(0.7) saturate(0.8);
    cursor: pointer;
  }

  .carousel-card:not(.active):hover {
    opacity: 0.8;
    filter: brightness(0.9) saturate(1);
  }

  .carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 20;
    background: rgba(0, 212, 255, 0.1);
    border: 1px solid rgba(0, 212, 255, 0.3);
    backdrop-filter: blur(10px);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
  }

  .carousel-nav:hover {
    background: rgba(0, 212, 255, 0.3);
    border-color: rgba(0, 212, 255, 0.6);
    transform: translateY(-50%) scale(1.1);
  }

  .carousel-nav.prev {
    left: 20px;
  }

  .carousel-nav.next {
    right: 20px;
  }

  .mobile-carousel {
    display: none;
  }

  @media (max-width: 768px) {
    .carousel-3d {
      display: none;
    }

    .mobile-carousel {
      display: flex;
    }
  }

  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }

  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

<section class="py-12 md:py-16 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <div class="text-center max-w-3xl mx-auto mb-8 md:mb-4 font-header">
      <h3 class="text-3xl md:text-5xl font-bold text-white mb-6">
        Hasil Nyata,
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-impost-primary to-impost-secondary">
          Bukan Janji Kosong
        </span>
      </h3>
      <p class="text-white text-sm md:text-lg leading-relaxed italic">
        "Kami tidak bicara potensi, kami bicara apa yang sudah terjadi melalui strategi,
        disiplin, dan sistem yang benar."
      </p>
    </div>

    <!-- Desktop 3D Carousel -->
    <div class="carousel-3d">
      <div class="carousel-container" id="carouselContainer">
      </div>
    </div>

    {{-- mobile  --}}
    <div class="mobile-carousel overflow-x-auto snap-x snap-mandatory no-scrollbar pb-4 gap-6">
      <div class="flex gap-6">
        <div
          class="mobile-card group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-6 md:p-8 hover:border-impost-primary/40 transition-all duration-500 snap-center flex-shrink-0">
          <h4 class="text-white font-bold tracking-wide uppercase mb-4 text-sm md:text-base">Properti (Meta Ads)</h4>
          <div class="space-y-3">
            <div class="p-3 md:p-4 bg-black/40 rounded-2xl border border-white/5">
              <p class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">Total Sales</p>
              <p class="text-xl md:text-2xl font-bold text-impost-primary">Rp 7 Miliar</p>
            </div>
            <ul class="text-xs md:text-sm text-white space-y-2">
              <li>• Budget: Rp 30 Juta</li>
              <li>• ROI Puluhan Ribu Persen</li>
              <li>• Kasus: Ciputra Group</li>
            </ul>
          </div>
        </div>

        <div
          class="mobile-card group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-6 md:p-8 hover:border-impost-primary/40 transition-all duration-500 snap-center flex-shrink-0">
          <h4 class="text-white font-bold tracking-wide uppercase mb-4 text-sm md:text-base">Fashion & UMKM</h4>
          <div class="space-y-3">
            <div class="p-3 md:p-4 bg-black/40 rounded-2xl border border-white/5">
              <p class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">Produk Terjual</p>
              <p class="text-xl md:text-2xl font-bold text-impost-primary">10.000+ via Shopee</p>
            </div>
            <ul class="text-xs md:text-sm text-white space-y-2">
              <li>• Omzet Ratusan Juta/Bulan</li>
              <li>• Ribuan Ulasan Positif</li>
              <li>• Trafik & Konversi Stabil</li>
            </ul>
          </div>
        </div>

        <div
          class="mobile-card group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-6 md:p-8 hover:border-impost-primary/40 transition-all duration-500 snap-center flex-shrink-0">
          <h4 class="text-white font-bold tracking-wide uppercase mb-4 text-sm md:text-base">Gym & Bela Diri</h4>
          <div class="space-y-3">
            <div class="p-3 md:p-4 bg-black/40 rounded-2xl border border-white/5">
              <p class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">Growth Akun</p>
              <p class="text-xl md:text-2xl font-bold text-impost-primary">615%</p>
            </div>
            <ul class="text-xs md:text-sm text-white space-y-2">
              <li>• CPC: Rp100K → Rp3.285</li>
              <li>• ROI Hingga 5.000%+</li>
              <li>• Konten Viral 30K–60K</li>
            </ul>
          </div>
        </div>

        <div
          class="mobile-card group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-6 md:p-8 hover:border-impost-primary/40 transition-all duration-500 snap-center flex-shrink-0">
          <h4 class="text-white font-bold tracking-wide uppercase mb-4 text-sm md:text-base">Tour, Travel & Umroh</h4>
          <ul class="text-xs md:text-sm text-white space-y-2.5">
            <li>• Jemaah: 0 → 10+/bulan</li>
            <li>• Konten FYP & Engagement</li>
            <li>• Offline → Full Digital</li>
          </ul>
        </div>

        <!-- Card 5 -->
        <div
          class="mobile-card group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-6 md:p-8 hover:border-impost-primary/40 transition-all duration-500 snap-center flex-shrink-0">
          <h4 class="text-white font-bold tracking-wide uppercase mb-4 text-sm md:text-base">Kesehatan & Lokal</h4>
          <ul class="text-xs md:text-sm text-white space-y-2.5">
            <li>• Omzet Ratusan Juta/Bulan</li>
            <li>• Branding Premium</li>
            <li>• Ratusan Ribu Views</li>
          </ul>
        </div>

        <!-- Card 6 -->
        <div
          class="mobile-card group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-6 md:p-8 hover:border-impost-primary/40 transition-all duration-500 snap-center flex-shrink-0">
          <h4 class="text-white font-bold tracking-wide uppercase mb-4 text-sm md:text-base">Event & Hiburan</h4>
          <ul class="text-xs md:text-sm text-white space-y-2.5">
            <li>• 600.000+ Impressions</li>
            <li>• Ribuan Interaksi</li>
            <li>• Dihadiri Tokoh Penting</li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</section>

<script>
  const cardsData = [{
      title: 'Properti (Meta Ads)',
      metric: 'Total Sales',
      value: 'Rp 7 Miliar',
      details: ['• Budget: Rp 30 Juta', '• ROI Puluhan Ribu Persen', '• Kasus: Ciputra Group']
    },
    {
      title: 'Fashion & UMKM',
      metric: 'Produk Terjual',
      value: '10.000+ via Shopee',
      details: ['• Omzet Ratusan Juta/Bulan', '• Ribuan Ulasan Positif', '• Trafik & Konversi Stabil']
    },
    {
      title: 'Gym & Bela Diri',
      metric: 'Growth Akun',
      value: '615%',
      details: ['• CPC: Rp100K → Rp3.285', '• ROI Hingga 5.000%+', '• Konten Viral 30K–60K']
    },
    {
      title: 'Tour, Travel & Umroh',
      details: ['• Jemaah: 0 → 10+/bulan', '• Konten FYP & Engagement', '• Offline → Full Digital']
    },
    {
      title: 'Kesehatan & Lokal',
      details: ['• Omzet Ratusan Juta/Bulan', '• Branding Premium', '• Ratusan Ribu Views']
    },
    {
      title: 'Event & Hiburan',
      details: ['• 600.000+ Impressions', '• Ribuan Interaksi', '• Dihadiri Tokoh Penting']
    }
  ];

  let currentIndex = 0;
  const container = document.getElementById('carouselContainer');
  const totalCards = cardsData.length;

  function createCard(data, index) {
    const card = document.createElement('div');
    card.className = 'carousel-card';
    card.innerHTML = `
      <div class="group bg-impost-fourth/10 border border-impost-third/10 rounded-3xl p-8 hover:border-impost-primary/40 transition-all duration-500 h-full backdrop-blur-sm">
        <h4 class="text-white font-bold tracking-wide uppercase mb-6">${data.title}</h4>
        <div class="space-y-4">
          ${data.metric ? `
            <div class="p-4 bg-black/40 rounded-2xl border border-white/5">
              <p class="text-[10px] text-gray-500 uppercase tracking-widest mb-1">${data.metric}</p>
              <p class="text-2xl font-bold text-impost-primary">${data.value}</p>
            </div>
          ` : ''}
          <ul class="text-sm text-white space-y-2">
            ${data.details.map(detail => `<li>${detail}</li>`).join('')}
          </ul>
        </div>
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
    const angleStep = 360 / totalCards;
    const radius = 450;

    cards.forEach((card, index) => {
      const angle = angleStep * (index - currentIndex);
      const rad = (angle * Math.PI) / 180;

      const x = Math.sin(rad) * radius;
      const z = Math.cos(rad) * radius - radius;
      const rotateY = -angle;

      card.style.transform = `
        translate(-50%, -50%)
        translate3d(${x}px, 0, ${z}px)
        rotateY(${rotateY}deg)
      `;

      if (index === currentIndex) {
        card.classList.add('active');
      } else {
        card.classList.remove('active');
      }
    });
  }

  // Initialize carousel
  cardsData.forEach((data, index) => {
    const card = createCard(data, index);
    container.appendChild(card);
  });

  updateCarousel();

  // Auto-rotate
  let autoRotate;

  function startAutoRotate() {
    autoRotate = setInterval(() => {
      currentIndex = (currentIndex + 1) % totalCards;
      updateCarousel();
    }, 1000);
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

  // Start auto-rotate on load
  startAutoRotate();

  // Pause on hover
  container.addEventListener('mouseenter', stopAutoRotate);
  container.addEventListener('mouseleave', startAutoRotate);
</script>
