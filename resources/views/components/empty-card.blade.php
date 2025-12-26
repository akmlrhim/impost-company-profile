<div class="w-full rounded-xl border border-white/20 bg-white/5 backdrop-blur-sm p-6 text-center shadow-lg">
  <div class="mb-4 sm:mb-5 flex justify-center">
    <img src="{{ asset('img/empty.webp') }}" alt="Data kosong" class="w-24 h-24 sm:w-32 sm:h-32 object-contain opacity-90">
  </div>

  <h3 class="text-sm sm:text-base font-semibold text-white">
    Data {{ $item }} tidak tersedia.
  </h3>

  <p class="mt-1.5 sm:mt-2 text-xs sm:text-sm text-white/70">
    Belum ada data yang dapat ditampilkan saat ini.
  </p>
</div>
