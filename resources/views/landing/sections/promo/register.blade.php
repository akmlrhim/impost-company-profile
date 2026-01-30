<section id="register" class="py-12 md:py-20 px-5 md:px-6 relative overflow-hidden">

  <script src="https://www.google.com/recaptcha/api.js?render=6Lf9SDEsAAAAAIMRNODuo-OeyKzUDhSkK5csYok2"></script>

  <div
    class="max-w-4xl mx-auto bg-neutral-900 border border-impost-primary/20 p-5 md:p-10 rounded-3xl shadow-2xl relative z-10">

    <div class="text-center mb-6 md:mb-10">
      <span
        class="bg-red-600 text-white px-3 py-1 md:px-4 md:py-1.5 rounded text-[10px] md:text-xs font-bold tracking-wider animate-pulse inline-block mb-3 md:mb-4">
        TERBATAS!
      </span>
      <h2 class="text-2xl md:text-3xl font-bold text-white leading-tight">
        Hanya <span class="text-impost-primary">4 Klien</span> Setiap Bulan
      </h2>
      <p class="text-gray-400 text-xs md:text-sm mt-2 md:mt-3">
        Kami membatasi slot agar tim bisa fokus memberikan hasil maksimal. Siapa cepat, dia dapat.
      </p>
    </div>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5" id="registerForm">

      <div class="col-span-1">
        <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1.5 md:mb-2">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" required
          class="form-input w-full bg-neutral-800 border border-neutral-700 rounded-xl px-4 py-3 text-sm md:text-base text-white focus:ring-2 focus:ring-impost-primary focus:border-impost-primary outline-none transition-all placeholder-gray-600"
          placeholder="Masukkan nama Anda">
      </div>

      <div class="col-span-1">
        <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1.5 md:mb-2">No. HP / WhatsApp</label>
        <input type="tel" id="no_wa" name="no_wa" required
          class="form-input w-full bg-neutral-800 border border-neutral-700 rounded-xl px-4 py-3 text-sm md:text-base text-white focus:ring-2 focus:ring-impost-primary focus:border-impost-primary outline-none transition-all placeholder-gray-600"
          placeholder="Contoh: 081234567890">
      </div>

      <div class="col-span-1">
        <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1.5 md:mb-2">Email</label>
        <input type="email" id="email" name="email" required
          class="form-input w-full bg-neutral-800 border border-neutral-700 rounded-xl px-4 py-3 text-sm md:text-base text-white focus:ring-2 focus:ring-impost-primary focus:border-impost-primary outline-none transition-all placeholder-gray-600"
          placeholder="email@anda.com">
      </div>

      <div class="col-span-1">
        <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1.5 md:mb-2">Nama Bisnis</label>
        <input type="text" id="nama_bisnis" name="nama_bisnis" required
          class="form-input w-full bg-neutral-800 border border-neutral-700 rounded-xl px-4 py-3 text-sm md:text-base text-white focus:ring-2 focus:ring-impost-primary focus:border-impost-primary outline-none transition-all placeholder-gray-600"
          placeholder="Nama bisnis Anda">
      </div>

      <div class="col-span-1 md:col-span-2">
        <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1.5 md:mb-2">Estimasi Omzet Per
          Bulan</label>
        <div class="relative">
          <select id="omzet" name="omzet" required
            class="form-input w-full bg-neutral-800 border border-neutral-700 rounded-xl px-4 py-3 text-sm md:text-base text-white focus:ring-2 focus:ring-impost-primary focus:border-impost-primary outline-none appearance-none cursor-pointer">
            <option value="" disabled selected>Pilih kisaran omzet</option>
            <option value="<10jt">
              < Rp 10 Juta</option>
            <option value="10-50jt">Rp 10 - 50 Juta</option>
            <option value="50-100jt">Rp 50 - 100 Juta</option>
            <option value=">100jt">> Rp 100 Juta</option>
          </select>
        </div>
      </div>

      <div class="col-span-1 md:col-span-2 mt-2">
        <button type="submit" id="btnSubmit" disabled
          class="w-full bg-gray-600 text-neutral-300 font-bold py-2 md:py-3 rounded-xl text-md md:text-base shadow-none cursor-not-allowed transition-all duration-300">
          Isi Data Lengkap Untuk Lanjut
        </button>
      </div>

    </form>

    <div class="mt-5 md:mt-6 text-center border-t border-white/5 pt-5 md:pt-6">
      <p class="text-xs md:text-sm font-medium text-white mb-0.5 md:mb-1">
        Jangan Tunda Lagi!
      </p>
      <p class="text-[10px] md:text-xs text-red-500 uppercase font-bold tracking-wide">
        Setiap hari tanpa strategi = Potensi Omzet Hilang
      </p>
    </div>

  </div>
</section>

<script>
  const form = document.getElementById('registerForm');
  const btnSubmit = document.getElementById('btnSubmit');
  const inputs = form.querySelectorAll('.form-input');

  function checkFormValidity() {
    const isValid = form.checkValidity();

    if (isValid) {
      btnSubmit.disabled = false;
      btnSubmit.innerText = "Konsultasi Gratis Sekarang";
      btnSubmit.className =
        "w-full bg-impost-primary text-neutral-900 font-bold py-2 md:py-3 rounded-xl hover:bg-yellow-400 transition-all text-md md:text-base shadow-lg transform active:scale-95 cursor-pointer";
    } else {
      btnSubmit.disabled = true;
      btnSubmit.innerText = "Lengkapi Data...";
      btnSubmit.className =
        "w-full bg-gray-600 text-neutral-400 font-bold py-2 md:py-3 rounded-xl text-md md:text-base shadow-none cursor-not-allowed transition-all duration-300";
    }
  }

  inputs.forEach(input => {
    input.addEventListener('input', checkFormValidity);
    input.addEventListener('change', checkFormValidity);
  });

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    const originalBtnText = "Konsultasi Gratis Sekarang";
    const nama = document.getElementById('nama_lengkap').value;
    const bisnis = document.getElementById('nama_bisnis').value;
    const email = document.getElementById('email').value;
    const whatsapp = document.getElementById('no_wa').value;
    const omzet = document.getElementById('omzet').value;
    const NOMOR_ADMIN = "6283147802761";
    const SITE_KEY = "{{ config('services.recaptcha.site_key') }}";

    btnSubmit.disabled = true;
    btnSubmit.innerText = "Memverifikasi...";
    btnSubmit.classList.remove('bg-impost-primary', 'hover:bg-yellow-400');
    btnSubmit.classList.add('bg-gray-500');

    grecaptcha.ready(function() {
      grecaptcha.execute(SITE_KEY, {
        action: 'submit'
      }).then(function(token) {

        btnSubmit.innerText = "Sedang Memproses...";

        const dataToSubmit = {
          data: [{
            "Nama Lengkap": nama,
            "No HP": whatsapp,
            "Email": email,
            "Nama Bisnis": bisnis,
            "Omzet Perbulan": omzet,
            "Recaptcha Token": token
          }]
        };

        fetch("https://sheetdb.io/api/v1/i0volwcev8m62", {
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
              `Mohon langsung kirimkan chat ini tanda edit.\n\nHai kak, saya tertarik konsultasi gratis *jasa digital marketing* impost media *start from 3 juta*. Saya sudah mengisi form dengan data sebagai berikut:\n\nNama Lengkap : ${nama}\nNama Bisnis : ${bisnis}\nNo. WhatsApp : ${whatsapp}\nOmzet Perbulan : ${omzet}\n\nMohon info langkah selanjutnya untuk bisa lanjut ke tahap konsultasi atau pembahasan strategi.`;

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
