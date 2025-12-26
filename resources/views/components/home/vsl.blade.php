<section class="bg-impost-fifth/70" id="vsl">
  <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">

    <div class="relative max-w-2xl mx-auto group overflow-hidde rounded-lg">

      <video id="vsl_video" data-aos="fade-up" data-aos-duration="700" data-aos-offset="120" data-aos-easing="ease-out-cubic"
        class="w-full block rounded-lg" controls controlsList="nodownload" playsinline preload="metadata"
        oncontextmenu="return false;">
        <source src="https://flowbite.com/docs/videos/flowbite.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>


      <div id="vsl_popup"
        class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm flex items-center justify-center px-4">

        <div class="relative w-full max-w-md bg-gray-900 rounded-2xl shadow-2xl p-5 sm:p-6 animate-fadeIn">

          <button type="button" id="close_popup"
            class="absolute top-4 right-4 text-gray-400 hover:text-white transition cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>

          <div class="text-center space-y-3 mb-4 sm:mb-6">
            <div
              class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-blue-600 shadow-md animate-pulse">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>

            <h3 class="text-xl sm:text-2xl font-extrabold text-white leading-tight">
              Video Terhenti Sementara
            </h3>

            <p class="text-sm text-gray-400">
              Isi data berikut untuk melanjutkan menonton video.
            </p>
          </div>

          <form id="vsl_form" class="space-y-3">
            <div class="space-y-3">
              <div>
                <label class="block text-sm uppercase tracking-wide font-semibold text-gray-300 mb-1">
                  Nama Lengkap
                </label>
                <input type="text" id="fullname" required autocomplete="off" placeholder="Masukkan nama anda"
                  class="w-full rounded-md bg-gray-800 border border-gray-700 px-3 py-2 text-sm text-white focus:ring-2 focus:ring-impost-primary outline-none" />
              </div>

              <div>
                <label class="block text-sm uppercase tracking-wide font-semibold text-gray-300 mb-1">
                  Alamat Email
                </label>
                <input type="email" id="email" required autocomplete="off" placeholder="nama@email.com"
                  class="w-full rounded-md bg-gray-800 border border-gray-700 px-3 py-2 text-sm text-white focus:ring-2 focus:ring-impost-primary outline-none" />
              </div>

              <div>
                <label class="block text-sm tracking-wide uppercase font-semibold text-gray-300 mb-1">
                  Nomor HP
                </label>
                <input type="tel" id="phone" inputmode="numeric" required autocomplete="off"
                  placeholder="0812xxxxxx"
                  class="w-full rounded-md bg-gray-800 border border-gray-700 px-3 py-2 text-sm text-white focus:ring-2 focus:ring-impost-primary outline-none" />
              </div>
            </div>

            <div class="pt-4">
              <button type="submit" id="submit_btn"
                class="w-full rounded-md bg-impost-primary py-2.5 text-sm font-bold text-white shadow-lg transition cursor-pointer hover:bg-impost-primary/80 active:scale-95 disabled:opacity-60 disabled:cursor-not-allowed">
                Lanjutkan Menonton
              </button>
            </div>

            <p class="text-center text-xs text-gray-400 italic">
              Data anda aman & tidak akan disebarkan.
            </p>
          </form>
        </div>

      </div>
    </div>

    <div class="mt-4 md:mt-0 px-4 sm:px-0">

      <h2 data-aos="fade-up" data-aos-duration="900" data-aos-offset="120" data-aos-easing="ease-out-cubic"
        class="mb-4 text-2xl sm:text-4xl font-extrabold text-white ">
        Rahasia Menghasilkan <span class="text-yellow-400">Rp 50 Juta/Bulan</span> dari Bisnis Online
      </h2>
      <p data-aos="fade-up" data-aos-delay="150" data-aos-duration="750" data-aos-offset="120"
        data-aos-easing="ease-out-cubic" class="mb-6 font-light text-white text-sm md:text-base lg:text-md">
        Solusi digital marketing terpadu untuk membangun brand, meningkatkan traffic berkualitas, dan mendorong konversi
        secara konsisten.
      </p>

      <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="700" data-aos-offset="120"
        data-aos-easing="ease-out-cubic" class="flex w-full flex-col gap-3 sm:flex-row sm:items-center">

        <a href="{{ route('contact') }}"
          class="inline-flex w-full bg-impost-primary items-center justify-center rounded-lg px-6 py-3 text-sm font-medium text-white hover:bg-impost-primary/60 focus:outline-none focus:ring-4 focus:ring-impost-primary transition sm:w-auto">
          <span>Mulai Sekarang</span>
        </a>

        <a href="{{ route('contact') }}"
          class="inline-flex w-full items-center justify-center rounded-lg border border-white/30 px-6 py-3 text-sm font-medium text-white hover:bg-white/10 focus:outline-none focus:ring-4 focus:ring-white/20 transition sm:w-auto">
          Konsultasi Sekarang
        </a>

      </div>
    </div>

  </div>
  </div>
</section>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {

      document.addEventListener('keydown', e => {
        if (
          e.key === 'F12' ||
          (e.ctrlKey && ['u', 's', 'i'].includes(e.key.toLowerCase()))
        ) {
          e.preventDefault();
        }
      });

      const video = document.getElementById('vsl_video');
      const popup = document.getElementById('vsl_popup');
      const form = document.getElementById('vsl_form');
      const btn = document.getElementById('submit_btn');
      const closeBtn = document.getElementById('close_popup');

      const LOCK_AT = 10;
      const STORAGE_KEY = 'vsl_unlocked';
      const SHEET_API_ENDPOINT = '{{ env('SHEETDB_URL_ENDPOINT') }}';

      let unlocked = localStorage.getItem(STORAGE_KEY) === 'true';
      let shownOnce = false;

      video.addEventListener('timeupdate', () => {
        if (video.currentTime >= LOCK_AT && !unlocked && !shownOnce) {
          shownOnce = true;
          video.pause();
          popup.classList.remove('hidden');
        }
      });

      video.addEventListener('play', () => {
        if (!unlocked && video.currentTime >= LOCK_AT) {
          video.pause();
          popup.classList.remove('hidden');
        }
      });

      closeBtn.addEventListener('click', () => {
        popup.classList.add('hidden');
      });

      form.addEventListener('submit', e => {
        e.preventDefault();

        btn.disabled = true;
        btn.textContent = 'Menyimpan...';

        const payload = {
          data: [{
            "Nama": document.getElementById('fullname').value,
            "Email": document.getElementById('email').value,
            "Nomor HP": document.getElementById('phone').value,
            "Waktu Mengisi": new Date().toISOString()
          }]
        };

        fetch(SHEET_API_ENDPOINT, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
          })
          .then(res => {
            if (!res.ok) throw new Error('Gagal submit');
            return res.json();
          })
          .then(() => {
            localStorage.setItem(STORAGE_KEY, 'true');
            unlocked = true;

            popup.classList.add('hidden');
            video.play();
          })
          .catch(() => {
            alert('Terjadi kesalahan. Silakan coba lagi.');
            btn.disabled = false;
            btn.textContent = 'Lanjutkan Menonton';
          });
      });
    });
  </script>
@endpush
