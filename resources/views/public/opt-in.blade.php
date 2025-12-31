@extends('layouts.public')

@section('content')
  <div class="pt-20 md:pt-16">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-16">
      <div class="max-w-3xl mx-auto text-center mb-8 md:mb-14">
        <span class="text-sm sm:text-base md:text-lg font-semibold tracking-widest text-impost-primary uppercase">
          OPT-IN
        </span>
        <div class="mt-2 md:mt-4 mx-auto w-12 md:w-16 h-1 bg-impost-primary rounded-full"></div>

        <div class="relative w-full overflow-hidden rounded-lg aspect-video mt-12">
          <script src="https://fast.wistia.com/player.js" async></script>
          <script src="https://fast.wistia.com/embed/xua3iamsq7.js" async type="module"></script><style>wistia-player[media-id='xua3iamsq7']:not(:defined) { background: center / contain
            no-repeat url('https://fast.wistia.com/embed/medias/xua3iamsq7/swatch'); display: block; filter: blur(5px);
            padding-top:56.25%; }</style> <wistia-player media-id="xua3iamsq7" aspect="1.7777777777777777"></wistia-player>
        </div>

        <div class="mt-8">
          <button data-modal-target="vslModal" data-modal-toggle="vslModal"
            class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-lg bg-impost-primary px-7 py-3 text-sm font-semibold text-white shadow-lg shadow-impost-primary/30 hover:bg-impost-primary/80 focus:ring-4 focus:ring-impost-primary/40 transition">
            Konsultasikan Sekarang
          </button>
        </div>

      </div>
    </div>

  </div>

  {{-- VSL MODAL  --}}
  <div id="vslModal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm p-4">

    <div class="relative w-full max-w-md bg-gray-900 rounded-2xl p-8 shadow-2xl">

      <button type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-200 transition-colors"
        data-modal-hide="vslModal">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <h3 class="mb-6 text-2xl font-semibold text-white text-center">
        Daftar Konsultasi Gratis
      </h3>

      <form id="vsl_form" class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
          <input id="fullname" required
            class="w-full rounded-lg bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-impost-primary focus:border-transparent transition-all"
            placeholder="Masukkan nama lengkap">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
          <input type="email" id="email" required
            class="w-full rounded-lg bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-impost-primary focus:border-transparent transition-all"
            placeholder="nama@email.com">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-300 mb-2">Nomor HP</label>
          <input type="tel" id="phone" required
            class="w-full rounded-lg bg-gray-800 border border-gray-700 px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-impost-primary focus:border-transparent transition-all"
            placeholder="08xxxxxxxxxx">
        </div>

        <button id="submit_btn" type="submit"
          class="w-full rounded-lg bg-impost-primary py-3.5 text-sm font-semibold text-white hover:bg-impost-primary/90 focus:ring-4 focus:ring-impost-primary/30 disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-lg shadow-impost-primary/20">
          Kirim Data
        </button>

        <p class="text-center text-xs text-gray-400 flex items-center justify-center gap-1.5 pt-2">
          <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
              clip-rule="evenodd" />
          </svg>
          Data Anda aman dan tidak akan disebarkan
        </p>
      </form>
    </div>
  </div>
  {{-- END VSL MODAL  --}}
@endsection

@push('scripts')
  <script>
    const SHEET_API_ENDPOINT = '{{ config('app.sheetdb_api_url') }}';

    const form = document.getElementById('vsl_form');
    const btn = document.getElementById('submit_btn');
    const modal = document.getElementById('vslModal');

    form.addEventListener('submit', e => {
      e.preventDefault();

      btn.disabled = true;
      btn.textContent = 'Menyimpan...';

      const payload = {
        data: [{
          Nama: fullname.value,
          Email: email.value,
          "Nomor HP": phone.value,
          "Waktu Mengisi": new Date().toLocaleString('id-ID')
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
          if (!res.ok) throw new Error();
          return res.json();
        })
        .then(() => {
          modal.classList.add('hidden');

        })
        .catch(() => {
          alert('Terjadi kesalahan. Silakan coba lagi.');
          btn.disabled = false;
          btn.textContent = 'Terkirim';
        });
    });
  </script>
@endpush
