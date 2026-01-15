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
    filter: brightness(1.3) saturate(1.3);
  }

  .carousel-card:not(.active) {
    opacity: 0.4;
    filter: brightness(0.6) saturate(0.7);
    cursor: pointer;
  }

  .carousel-card:not(.active):hover {
    opacity: 0.7;
    filter: brightness(0.85) saturate(1);
  }

  .card-content {
    background: rgba(4, 4, 4, 0.6);
    border: 1px solid rgba(212, 172, 60, 0.3);
    border-radius: 24px;
    padding: 32px;
    backdrop-filter: blur(10px);
    transition: all 0.5s;
    height: 100%;
  }

  .card-content:hover {
    border-color: rgba(212, 172, 60, 0.6);
    box-shadow: 0 0 30px rgba(212, 172, 60, 0.2);
  }

  .card-title {
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 24px;
    font-size: 16px;
    letter-spacing: 1px;
  }

  .metric-box {
    padding: 16px;
    background: rgba(4, 4, 4, 0.8);
    border-radius: 16px;
    border: 1px solid rgba(212, 172, 60, 0.2);
    margin-bottom: 16px;
  }

  .metric-label {
    font-size: 10px;
    color: #999;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 4px;
  }

  .metric-value {
    font-size: 24px;
    font-weight: bold;
    color: #d4ac3c;
  }

  .details-list {
    list-style: none;
    font-size: 14px;
    color: white;
    line-height: 1.8;
  }

  .details-list li {
    margin-bottom: 8px;
  }

  .carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 20;
    background: rgba(212, 172, 60, 0.1);
    border: 1px solid rgba(212, 172, 60, 0.3);
    backdrop-filter: blur(10px);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    color: #d4ac3c;
    font-size: 24px;
  }

  .carousel-nav:hover {
    background: rgba(212, 172, 60, 0.3);
    border-color: rgba(212, 172, 60, 0.6);
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 0 20px rgba(212, 172, 60, 0.3);
  }

  .carousel-nav.prev {
    left: 20px;
  }

  .carousel-nav.next {
    right: 20px;
  }

  section {
    padding: 48px 0;
    position: relative;
    overflow: hidden;
  }

  .container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 16px;
    position: relative;
    z-index: 10;
  }

  .header-section {
    text-align: center;
    max-width: 768px;
    margin: 0 auto 32px;
  }

  .header-section h3 {
    font-size: 32px;
    font-weight: bold;
    color: white;
    margin-bottom: 24px;
    line-height: 1.2;
  }

  .gradient-text {
    background: linear-gradient(90deg, #d4ac3c 0%, #f4d03f 50%, #d4ac3c 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .header-section p {
    color: white;
    font-size: 14px;
    line-height: 1.6;
    font-style: italic;
  }

  /* Responsive Styles */
  @media (max-width: 768px) {
    .carousel-3d {
      perspective: 600px;
      height: 400px;
    }

    .carousel-card {
      width: 280px;
    }

    .card-content {
      padding: 24px;
    }

    .card-title {
      font-size: 14px;
      margin-bottom: 16px;
    }

    .metric-value {
      font-size: 20px;
    }

    .details-list {
      font-size: 12px;
    }

    .carousel-nav {
      width: 40px;
      height: 40px;
      font-size: 20px;
    }

    .carousel-nav.prev {
      left: 10px;
    }

    .carousel-nav.next {
      right: 10px;
    }

    .header-section h3 {
      font-size: 24px;
      margin-bottom: 16px;
    }

    .header-section p {
      font-size: 12px;
    }

    section {
      padding: 32px 0;
    }
  }

  @media (max-width: 480px) {
    .carousel-3d {
      perspective: 500px;
      height: 380px;
    }

    .carousel-card {
      width: 250px;
    }

    .card-content {
      padding: 20px;
    }

    .card-title {
      font-size: 13px;
    }

    .metric-box {
      padding: 12px;
    }

    .metric-value {
      font-size: 18px;
    }

    .details-list {
      font-size: 11px;
    }
  }
</style>


<section class="py-12 md:py-24 relative overflow-hidden">
  <div class="container">
    <div class="header-section">
      <h3 class="font-header">
        Hasil Nyata, Bukan Janji Kosong
      </h3>
      <p>
        "Kami tidak bicara potensi, kami bicara apa yang sudah terjadi melalui strategi,
        disiplin, dan sistem yang benar."
      </p>
    </div>

    <div class="carousel-3d">
      <button class="carousel-nav prev" onclick="navigate(-1)">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-chevron-left-icon lucide-chevron-left">
          <path d="m15 18-6-6 6-6" />
        </svg></button>

      <div class="carousel-container" id="carouselContainer">
        {{-- Data didalam sini  --}}
      </div>

      <button class="carousel-nav next" onclick="navigate(1)"><svg xmlns="http://www.w3.org/2000/svg" width="24"
          height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right">
          <path d="m9 18 6-6-6-6" />
        </svg></button>
    </div>
  </div>
</section>

<script>
  const studyCaseData = [{
      title: 'Properti (Meta Ads)',
      image: 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=500&h=500&fit=crop',
      description: 'Total Sales: Rp 7 Miliar | Budget: Rp 30 Juta | ROI Puluhan Ribu Persen | Kasus: Ciputra Group'
    },
    {
      title: 'Fashion & UMKM',
      image: 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?w=500&h=500&fit=crop',
      description: 'Produk Terjual 10.000+ via Shopee | Omzet Ratusan Juta/Bulan | Ribuan Ulasan Positif'
    },
    {
      title: 'Gym & Bela Diri',
      image: 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=500&h=500&fit=crop',
      description: 'Growth Akun 615% | CPC: Rp100K → Rp3.285 | ROI Hingga 5.000%+ | Konten Viral 30K–60K'
    },
    {
      title: 'Tour, Travel & Umroh',
      image: 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=500&h=500&fit=crop',
      description: 'Jemaah: 0 → 10+/bulan | Konten FYP & Engagement | Offline → Full Digital'
    },
    {
      title: 'Kesehatan & Lokal',
      image: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=500&h=500&fit=crop',
      description: 'Omzet Ratusan Juta/Bulan | Branding Premium | Ratusan Ribu Views'
    },
    {
      title: 'Event & Hiburan',
      image: 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=500&h=500&fit=crop',
      description: '600.000+ Impressions | Ribuan Interaksi | Dihadiri Tokoh Penting'
    }
  ];

  let currentIndex = 0;
  const container = document.getElementById('carouselContainer');
  const totalCards = studyCaseData.length;

  function createCard(data, index) {
    const card = document.createElement('div');
    card.className = 'carousel-card';
    card.innerHTML = `
					<div class="card-content" style="position: relative; overflow: hidden; padding: 0; background: none; border: none;">
						<img src="${data.image}" alt="${data.title}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
						<div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0, 0, 0, 0.7); padding: 32px 24px 24px;">
							<h4 style="color: #d4ac3c; font-weight: bold; margin-bottom: 12px; font-size: 16px; text-transform: uppercase; letter-spacing: 1px;">${data.title}</h4>
							<p style="color: #ccc; font-size: 13px; line-height: 1.6; margin: 0;">${data.description}</p>
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

    let radius = 450;
    if (window.innerWidth <= 480) {
      radius = 280;
    } else if (window.innerWidth <= 768) {
      radius = 350;
    }

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

  function navigate(direction) {
    currentIndex = (currentIndex + direction + totalCards) % totalCards;
    updateCarousel();
    restartAutoRotate();
  }

  studyCaseData.forEach((data, index) => {
    const card = createCard(data, index);
    container.appendChild(card);
  });

  updateCarousel();

  let autoRotate;

  function startAutoRotate() {
    autoRotate = setInterval(() => {
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

  startAutoRotate();

  if (window.innerWidth > 768) {
    container.addEventListener('mouseenter', stopAutoRotate);
    container.addEventListener('mouseleave', startAutoRotate);
  }

  window.addEventListener('resize', updateCarousel);
</script>
