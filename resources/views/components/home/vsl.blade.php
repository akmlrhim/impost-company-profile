<section class="py-10 sm:py-16 md:py-20" id="vsl">

  <div class="mb-6 sm:mb-10 text-center px-4 max-w-5xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
    <h2
      class="font-header mb-3 sm:mb-4 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-impost-primary leading-snug sm:leading-tight max-w-3xl mx-auto">
      Kami Akan Bedah Strategi Digital Marketing Klien Kami
    </h2>
    <p class="text-sm sm:text-base md:text-lg text-gray-300 max-w-lg md:max-w-2xl mx-auto leading-relaxed">
      Lihat langsung pendekatan yang kami gunakan dan apa yang benar-benar berdampak
      pada pertumbuhan bisnis mereka.
    </p>
  </div>

  <div class="mx-auto max-w-4xl px-4 sm:px-6">

    <div
      class="relative w-full overflow-hidden rounded-lg sm:rounded-2xl aspect-video shadow-2xl shadow-black/40 bg-black/20"
      data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">

      <script src="https://fast.wistia.com/player.js" async></script>
      <script src="https://fast.wistia.com/embed/qjyocurxgt.js" async type="module"></script>
      <style>
        wistia-player[media-id='qjyocurxgt']:not(:defined) {
          background: center / contain no-repeat url('https://fast.wistia.com/embed/medias/qjyocurxgt/swatch');
          display: block;
          filter: blur(5px);
          padding-top: 56.25%;
        }
      </style>
      <wistia-player media-id="qjyocurxgt" aspect="1.7777777777777777"></wistia-player>
    </div>

    <div class="mt-6 sm:mt-10 flex flex-col items-center gap-4 px-2" data-aos="fade-up" data-aos-duration="800"
      data-aos-delay="400">
      <button data-modal-target="vslModal" data-modal-toggle="vslModal"
        class="flex items-center justify-center gap-2 w-full sm:w-auto px-6 py-3.5 text-sm sm:text-base font-semibold text-white bg-impost-primary rounded-lg shadow-lg shadow-impost-primary/30 hover:bg-impost-primary/90 hover:shadow-xl hover:shadow-impost-primary/40 focus:outline-none focus:ring-4 focus:ring-impost-primary/40 transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
          stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
        </svg>
        Tonton Sekarang
      </button>
    </div>
  </div>
</section>


{{-- MODAL  --}}
<div id="vslModal" tabindex="-1" aria-hidden="true"
  class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm p-4">

  <div class="relative w-full max-w-2xl bg-gray-900 rounded-2xl p-8 shadow-2xl">

    <!-- Close Button -->
    <button type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-200 transition-colors"
      data-modal-hide="vslModal" aria-label="Tutup">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <h3 class="mb-6 text-2xl font-semibold text-white text-center">
      Isi data berikut untuk melanjutkan
    </h3>

    <!-- FORM -->
    <form action="{{ route('save-leads') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      @csrf
      <!-- Nama Lengkap -->
      <div>
        <label for="fullname" class="block text-sm font-medium text-gray-300 mb-2">
          Nama Lengkap <span class="text-red-700">*</span>
        </label>
        <input id="fullname" name="fullname"
          class="w-full rounded-lg bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white placeholder-gray-500
                 focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="Masukkan nama lengkap" value="{{ old('fullname') }}" />
        @error('fullname')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <!-- Nomor HP -->
      <div>
        <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">
          Nomor HP <span class="text-red-700">*</span>
        </label>
        <input type="tel" id="phone" name="phone"
          class="w-full rounded-lg bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white placeholder-gray-500
                 focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="Masukkan nomor telepon" value="{{ old('phone') }}" />
        @error('phone')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
          Email <span class="text-red-700">*</span>
        </label>
        <input type="email" id="email" name="email"
          class="w-full rounded-lg bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white placeholder-gray-500
                 focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="Masukkan email Anda" value="{{ old('email') }}" />
        @error('email')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <!-- Nama Bisnis -->
      <div>
        <label for="business_name" class="block text-sm font-medium text-gray-300 mb-2">
          Nama Bisnis <span class="text-red-700">*</span>
        </label>
        <input type="text" id="business_name" name="business_name"
          class="w-full rounded-lg bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white placeholder-gray-500
                 focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="Masukkan nama bisnis Anda" value="{{ old('business_name') }}" />
        @error('business_name')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <!-- Income -->
      <div class="sm:col-span-2">
        <label for="income" class="block text-sm font-medium text-gray-300 mb-2">
          Omzet Per Bulan <span class="text-red-700">*</span>
        </label>

        <select id="income" name="income"
          class="w-full rounded-lg bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white
         focus:outline-none focus:ring-2 focus:ring-impost-primary">

          <option value="">Pilih kisaran omzet</option>

          <option value="<10jt" {{ old('income') == '<10jt' ? 'selected' : '' }}>
            &lt; 10 Juta
          </option>

          <option value="10-50jt" {{ old('income') == '10-50jt' ? 'selected' : '' }}>
            10 – 50 Juta
          </option>

          <option value="50-100jt" {{ old('income') == '50-100jt' ? 'selected' : '' }}>
            50 – 100 Juta
          </option>

          <option value=">100jt" {{ old('income') == '>100jt' ? 'selected' : '' }}>
            &gt; 100 Juta
          </option>
        </select>


        @error('income')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <!-- Catatan -->
      <div class="sm:col-span-2">
        <label for="note" class="block text-sm font-medium text-gray-300 mb-2">
          Catatan
        </label>
        <textarea id="note" name="note" rows="4"
          class="w-full rounded-lg bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white placeholder-gray-500
                 focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="Ceritakan kebutuhan bisnis Anda">{{ old('note') }}</textarea>
        @error('note')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <!-- Submit -->
      <div class="sm:col-span-2">
        <button type="submit"
          class="w-full rounded-lg bg-impost-primary py-3.5 text-sm font-semibold text-white
                 hover:bg-impost-primary/90 focus:ring-4 focus:ring-impost-primary/30
                 transition-all shadow-lg shadow-impost-primary/20">
          Kirim Data
        </button>

        <p class="mt-3 text-center text-xs text-gray-400 flex items-center justify-center gap-1.5">
          <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
              clip-rule="evenodd" />
          </svg>
          Data anda aman dan tidak akan disebarkan
        </p>
      </div>
    </form>
  </div>
</div>

@if ($errors->any())
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('vslModal');
      const vslSection = document.getElementById('vsl');

      if (modal) {
        modal.classList.remove('hidden');
      }

      if (vslSection) {
        vslSection.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  </script>
@endif
