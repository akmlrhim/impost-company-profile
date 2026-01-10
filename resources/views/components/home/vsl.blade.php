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

<!-- MODAL -->
<div id="vslModal" tabindex="-1" aria-hidden="true"
  class="hidden fixed inset-0 z-50 flex items-end sm:items-center justify-center
         bg-black/70 backdrop-blur-sm p-2 sm:p-4 overflow-y-auto">

  <!-- MODAL BOX -->
  <div
    class="relative w-full max-w-2xl bg-gray-900 rounded-2xl
           p-5 sm:p-6 md:p-8
           shadow-2xl max-h-[92vh] overflow-y-auto">

    <button type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-200 transition"
      data-modal-hide="vslModal" aria-label="Tutup">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <h3 class="mb-6 text-xl sm:text-2xl font-semibold text-white text-center">
      Isi data berikut untuk melanjutkan
    </h3>

    <form action="{{ route('save-leads') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
      @csrf

      <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
          Nama Lengkap <span class="text-red-600">*</span>
        </label>
        <input type="text" name="fullname" value="{{ old('fullname') }}"
          class="w-full rounded-xl bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="Masukkan nama lengkap">
        @error('fullname')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
          Nomor HP <span class="text-red-600">*</span>
        </label>
        <input type="tel" name="phone" value="{{ old('phone') }}"
          class="w-full rounded-xl bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="08xxxxxxxxxx">
        @error('phone')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
          Email
        </label>
        <input type="email" name="email" value="{{ old('email') }}"
          class="w-full rounded-xl bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="email@contoh.com">
        @error('email')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
          Nama Bisnis <span class="text-red-600">*</span>
        </label>
        <input type="text" name="business_name" value="{{ old('business_name') }}"
          class="w-full rounded-xl bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="Nama bisnis Anda">
        @error('business_name')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-300 mb-2">
          Omzet Per Bulan <span class="text-red-600">*</span>
        </label>
        <select name="income"
          class="w-full rounded-xl bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-impost-primary">
          <option value="">Pilih kisaran omzet</option>
          <option value="<10jt" {{ old('income') == '<10jt' ? 'selected' : '' }}>&lt; 10 Juta</option>
          <option value="10-50jt" {{ old('income') == '10-50jt' ? 'selected' : '' }}>10 – 50 Juta</option>
          <option value="50-100jt" {{ old('income') == '50-100jt' ? 'selected' : '' }}>50 – 100 Juta</option>
          <option value=">100jt" {{ old('income') == '>100jt' ? 'selected' : '' }}>&gt; 100 Juta</option>
        </select>
        @error('income')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-300 mb-3">
          Tujuan <span class="text-red-600">*</span>
        </label>

        <div class="space-y-4">
          @php
            $objectives = [
                'Branding' => 'Meningkatkan citra dan kepercayaan brand',
                'Engagement' => 'Mendapatkan interaksi & followers',
                'Sales ROI' => 'Meningkatkan leads dan penjualan',
                'Branding & Sales' => 'Branding sekaligus penjualan',
            ];
          @endphp

          @foreach ($objectives as $value => $desc)
            <label class="flex gap-3 cursor-pointer">
              <input type="checkbox" name="objective[]" value="{{ $value }}"
                class="mt-1 w-5 h-5 rounded bg-gray-800 border-gray-700 text-impost-primary focus:ring-impost-primary"
                {{ in_array($value, old('objective', [])) ? 'checked' : '' }}>
              <span class="text-sm text-gray-300 leading-relaxed">
                <span class="block font-medium text-white">{{ $value }}</span>
                <span class="text-xs text-gray-400">{{ $desc }}</span>
              </span>
            </label>
          @endforeach
        </div>

        @error('objective')
          <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
        @enderror
      </div>

      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-300 mb-2">
          Catatan
        </label>
        <textarea name="note" rows="3"
          class="w-full rounded-xl bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-impost-primary"
          placeholder="Ceritakan kebutuhan bisnis Anda">{{ old('note') }}</textarea>
      </div>

      <div class="md:col-span-2">
        <button type="submit"
          class="w-full rounded-xl bg-impost-primary py-3.5 text-sm font-semibold text-white hover:bg-impost-primary/90 focus:ring-4 focus:ring-impost-primary/30 transition">
          Kirim Data
        </button>

        <p class="mt-3 text-center text-xs text-gray-400">
          🔒 Data Anda aman dan tidak akan disebarkan
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
