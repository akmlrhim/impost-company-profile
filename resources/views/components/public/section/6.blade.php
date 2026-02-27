<section class="py-14 sm:py-20 relative z-10 font-sans overflow-hidden">
  <div class="max-w-7xl mx-auto px-5 sm:px-6">

    <div class="mb-10 sm:mb-16 text-center max-w-3xl mx-auto">
      <h2
        class="text-xl sm:text-3xl md:text-5xl font-medium font-header text-white tracking-tight mb-3 sm:mb-5 leading-tight">
        Kami Tidak Mencari Klien<br>
        <span class="text-impost-primary italic">Kami Mencari Partner</span>
      </h2>
      <p class="text-xs sm:text-base md:text-lg text-white/70 font-light leading-relaxed">
        Sinergi terbaik lahir dari visi yang sama. Apakah kita cocok?
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-10 items-start">

      <div class="rounded-2xl border border-white/10 bg-white/[0.03] overflow-hidden">

        <div class="flex items-center gap-3 px-5 sm:px-6 py-4 sm:py-5 border-b border-white/10 bg-emerald-500/5">
          <div class="w-7 h-7 sm:w-9 sm:h-9 rounded-full bg-emerald-800 flex items-center justify-center flex-shrink-0">
            <svg class="w-3.5 h-3.5 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <h3 class="text-sm sm:text-base md:text-lg lg:text-xl font-bold text-white">Anda Adalah Partner Ideal Jika:
          </h3>
        </div>

        @php
          $idealItems = [
              [
                  'title' => 'Visioner & Serius',
                  'desc' => 'Anda melihat marketing sebagai investasi, bukan pengeluaran yang harus dipangkas.',
              ],
              [
                  'title' => 'Butuh Kepastian',
                  'desc' =>
                      'Lelah dengan "bakar uang" iklan tanpa hasil. Anda ingin data yang bisa dipertanggungjawabkan.',
              ],
              [
                  'title' => 'Siap Scale-Up',
                  'desc' =>
                      'Bisnis Anda sudah berjalan, tapi stuck di level tertentu dan butuh sistem untuk naik kelas.',
              ],
          ];
        @endphp

        <div class="divide-y divide-white/5">
          @foreach ($idealItems as $item)
            <div
              class="group flex items-start gap-3 sm:gap-4 px-5 sm:px-6 py-4 sm:py-5 hover:bg-emerald-500/5 transition-colors duration-200">
              <div class="flex-shrink-0 w-1.5 h-1.5 sm:w-2 sm:h-2 rounded-full bg-emerald-500 mt-2"></div>
              <div>
                <h4
                  class="text-white font-semibold text-xs sm:text-sm md:text-base lg:text-base mb-1 group-hover:text-emerald-400 transition-colors">
                  {{ $item['title'] }}
                </h4>
                <p class="text-white text-xs sm:text-sm leading-relaxed">{{ $item['desc'] }}</p>
              </div>
            </div>
          @endforeach
        </div>

      </div>

      <div class="rounded-2xl border border-white/10 bg-white/[0.03] overflow-hidden">

        <div class="flex items-center gap-3 px-5 sm:px-6 py-4 sm:py-5 border-b border-white/10 bg-red-500/5">
          <div
            class="w-7 h-7 sm:w-9 sm:h-9 rounded-full bg-red-500/20 border border-red-500/40 flex items-center justify-center flex-shrink-0">
            <div class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></div>
          </div>
          <h3 class="text-sm sm:text-base md:text-lg lg:text-xl font-bold text-white">
            Mungkin Kita Tidak Cocok Jika:
          </h3>
        </div>

        @php
          $notItems = [
              [
                  'num' => '01',
                  'title' => 'Ingin Hasil "Sulap"',
                  'desc' => 'Berharap omzet meledak dalam semalam tanpa pondasi yang kuat.',
              ],
              [
                  'num' => '02',
                  'title' => 'Anti Kritik & Data',
                  'desc' => 'Lebih percaya "feeling" pribadi daripada data riil di lapangan.',
              ],
              [
                  'num' => '03',
                  'title' => 'Kuantitas > Kualitas',
                  'desc' => 'Hanya ingin postingan banyak asal jadi, tanpa strategi branding.',
              ],
          ];
        @endphp

        <div class="divide-y divide-white/5">
          @foreach ($notItems as $item)
            <div
              class="group flex items-start gap-3 sm:gap-4 px-5 sm:px-6 py-4 sm:py-5 hover:bg-red-500/5 transition-colors duration-200">
              <div class="flex-shrink-0 w-1.5 h-1.5 sm:w-2 sm:h-2 rounded-full bg-red-500 mt-2"></div>
              <div>
                <h5
                  class="text-white font-medium text-xs sm:text-sm md:text-base lg:text-base mb-1 group-hover:text-red-400 transition-colors">
                  {{ $item['title'] }}
                </h5>
                <p class="text-white text-xs sm:text-sm leading-relaxed">{{ $item['desc'] }}</p>
              </div>
            </div>
          @endforeach
        </div>

      </div>

    </div>

  </div>
</section>
