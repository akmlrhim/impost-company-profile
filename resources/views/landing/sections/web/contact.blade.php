<section id="contact" class="py-10 md:py-20 px-4 md:px-6 bg-impost-fifth overflow-hidden">

  <script src="https://www.google.com/recaptcha/api.js?render=6Lf9SDEsAAAAAIMRNODuo-OeyKzUDhSkK5csYok2"></script>

  <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">

    <div class="text-center md:text-left order-1 md:order-1">
      <h2 class="text-2xl md:text-4xl font-bold text-white mb-4 md:mb-6 leading-tight">
        Siap Punya Website yang <span class="text-impost-primary">Niat & Profesional?</span>
      </h2>

      <p class="text-sm md:text-base text-gray-300 mb-6 md:mb-8 leading-relaxed">
        Isi form singkat ini. Tim kami akan segera menghubungi kamu untuk konsultasi strategi digital
        bisnis kamu.
      </p>

      <div class="bg-neutral-900/50 p-4 md:p-6 rounded-xl border-l-4 border-impost-primary mb-6 text-left shadow-lg">
        <div class="flex gap-4">
          <div class="text-impost-primary flex-shrink-0 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M15 14c.2-1 .7-1.7 1.5-2.5 1-1 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5" />
              <path d="M9 18h6" />
              <path d="M10 22h4" />
            </svg>
          </div>
          <div>
            <h4 class="font-bold text-impost-primary text-sm md:text-base">Mindset Bisnis</h4>
            <p class="text-gray-300 text-xs md:text-sm mt-1 leading-relaxed">
              Website bukan biaya, tapi <strong>aset bisnis jangka panjang</strong>. Kalau mau bisnis naik level,
              mulai dari pondasi digital yang benar.
            </p>
          </div>
        </div>
      </div>

    </div>

    <div
      class="bg-neutral-900 border border-white/10 p-6 md:p-8 rounded-2xl shadow-2xl relative overflow-hidden order-2 md:order-2">
      <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-impost-primary to-yellow-600"></div>

      <h3 class="text-lg md:text-xl font-bold text-impost-primary mb-5 text-center md:text-left">Form Pendaftaran
      </h3>

      <form id="consultationForm" class="space-y-4">
        <div>
          <label class="block text-xs font-medium text-gray-400 mb-1.5">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" required
            class="form-input w-full px-4 py-2.5 rounded-md bg-gray-800 border border-gray-700 text-white focus:ring-1 focus:ring-impost-primary focus:border-impost-primary outline-none transition text-sm placeholder-gray-500"
            placeholder="Contoh: Budi Santoso">
        </div>

        <div>
          <label class="block text-xs font-medium text-gray-400 mb-1.5">Nama Bisnis</label>
          <input type="text" id="bisnis" name="bisnis" required
            class="form-input w-full px-4 py-2.5 rounded-md bg-gray-800 border border-gray-700 text-white focus:ring-1 focus:ring-impost-primary focus:border-impost-primary outline-none transition text-sm placeholder-gray-500"
            placeholder="Contoh: Kopi Senja Abadi">
        </div>

        <div>
          <label class="block text-xs font-medium text-gray-400 mb-1.5">No. WhatsApp</label>
          <input type="tel" id="whatsapp" name="whatsapp" required
            class="form-input w-full px-4 py-2.5 rounded-md bg-gray-800 border border-gray-700 text-white focus:ring-1 focus:ring-impost-primary focus:border-impost-primary outline-none transition text-sm placeholder-gray-500"
            placeholder="0812-xxxx-xxxx">
        </div>

        <div>
          <label class="block text-xs font-medium text-gray-400 mb-1.5">Kebutuhan Website</label>
          <div class="relative">
            <select id="kebutuhan" name="kebutuhan" required
              class="form-input w-full px-4 py-2.5 rounded-md bg-gray-800 border border-gray-700 text-white focus:ring-1 focus:ring-impost-primary focus:border-impost-primary outline-none transition appearance-none text-sm cursor-pointer">
              <option selected disabled value="">-- Pilih Kebutuhan --</option>
              <option value="Landing Page">Landing Page</option>
              <option value="Company Profile">Company Profile</option>
            </select>
          </div>
        </div>

        <button type="submit" id="btnSubmit" disabled
          class="leads-web-btn w-full bg-gray-600 text-neutral-400 font-bold py-3 rounded-md cursor-not-allowed transition-all duration-300 flex items-center justify-center gap-2 mt-2 group text-sm shadow-none">
          Lengkapi Data Untuk Lanjut
        </button>
      </form>
    </div>

  </div>
</section>

<script>
  const form = document.getElementById('consultationForm');
  const btnSubmit = document.getElementById('btnSubmit');
  const inputs = form.querySelectorAll('.form-input');

  function checkFormValidity() {
    const isValid = form.checkValidity();

    if (isValid) {
      btnSubmit.disabled = false;
      btnSubmit.innerText = "Konsultasi Gratis Sekarang";
      btnSubmit.className =
        "leads-web-btn w-full bg-impost-primary text-impost-fifth font-bold py-3 rounded-md cursor-pointer hover:bg-yellow-500 transition-all duration-300 flex items-center justify-center gap-2 mt-2 group text-sm shadow-lg transform active:scale-95";
    } else {
      btnSubmit.disabled = true;
      btnSubmit.innerText = "Lengkapi Data Untuk Lanjut";
      btnSubmit.className =
        "leads-web-btn w-full bg-gray-600 text-neutral-400 font-bold py-3 rounded-md cursor-not-allowed transition-all duration-300 flex items-center justify-center gap-2 mt-2 group text-sm shadow-none";
    }
  }

  inputs.forEach(input => {
    input.addEventListener('input', checkFormValidity);
    input.addEventListener('change', checkFormValidity);
  });

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    const originalBtnText = "Konsultasi Gratis Sekarang";
    const nama = document.getElementById('nama').value;
    const bisnis = document.getElementById('bisnis').value;
    const whatsapp = document.getElementById('whatsapp').value;
    const kebutuhan = document.getElementById('kebutuhan').value;

    const NOMOR_ADMIN = "6283147802761";
    const SITE_KEY = "{{ config('services.recaptcha.site_key') }}";

    btnSubmit.disabled = true;
    btnSubmit.innerText = "Memverifikasi...";
    btnSubmit.classList.remove('bg-impost-primary', 'hover:bg-yellow-500');
    btnSubmit.classList.add('bg-gray-500');

    grecaptcha.ready(function() {
      grecaptcha.execute(SITE_KEY, {
        action: 'submit'
      }).then(function(token) {

        btnSubmit.innerText = "Sedang Memproses...";

        const dataToSubmit = {
          data: [{
            "Nama Lengkap": nama,
            "Nama Bisnis": bisnis,
            "No WhatsApp": whatsapp,
            "Kebutuhan": kebutuhan,
            "Recaptcha Token": token
          }]
        };

        fetch("https://sheetdb.io/api/v1/8n523o1dtqgyf", {
            method: "POST",
            headers: {
              "Accept": "application/json",
              "Content-Type": "application/json"
            },
            body: JSON.stringify(dataToSubmit)
          })
          .then(response => response.json())
          .then(data => {
            const message =
              `Mohon langsung kirimkan chat ini tanda edit.\n\nHai kak, saya tertarik konsultasi gratis *jasa website* impost media. Saya sudah mengisi form dengan data sebagai berikut:\n\nNama Lengkap : ${nama}\nNama Bisnis : ${bisnis}\nNo. WhatsApp : ${whatsapp}\nKebutuhan Website (Landing Page / Company Profile) : ${kebutuhan}\n\nMohon info langkah selanjutnya.`;

            const encodedMessage = encodeURIComponent(message);
            window.open(`https://wa.me/${NOMOR_ADMIN}?text=${encodedMessage}`);

            form.reset();
            checkFormValidity();
          })
          .catch(error => {
            console.error(error);
            alert("Terjadi kesalahan koneksi. Silakan coba lagi.");
            checkFormValidity();
          });
      });
    });
  });
</script>
