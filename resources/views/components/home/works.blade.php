@push('styles')
  <style>
    .glow {
      box-shadow: 0 0 20px rgba(255, 107, 53, 0.4);
    }

    @media (min-width: 768px) {
      .timeline-line {
        animation: drawLine 2s ease-out forwards;
      }
    }

    @keyframes drawLine {
      from {
        height: 0;
      }

      to {
        height: 100%;
      }
    }
  </style>
@endpush

<section class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto py-8 sm:py-10 md:py-12">
  <div class="text-center mb-12 sm:mb-16 md:mb-20">
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white leading-tight font-header">
      Alur Layanan
    </h2>
    <p class="mt-4 sm:mt-6 text-gray-300 max-w-3xl mx-auto leading-relaxed text-sm sm:text-base px-4">
      Dari konsultasi hingga evaluasi hasil. Setiap langkah dirancang untuk memastikan kesuksesan proyek Anda.
    </p>
  </div>

  <div class="relative">
    <div
      class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-impost-primary opacity-30 rounded-full timeline-line">
    </div>

    <div class="md:hidden absolute left-7 top-0 w-0.5 h-full bg-impost-primary opacity-20"></div>

    <div class="mb-8 sm:mb-12 md:mb-16 flex flex-row md:flex-row items-start md:items-center justify-between w-full">
      <div class="md:hidden flex-shrink-0 mr-4">
        <div
          class="w-14 h-14 bg-impost-primary text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg glow">
          1
        </div>
      </div>

      <div class="flex-1 md:w-5/12 md:order-1">
        <div
          class="bg-gray-800 p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
          <div class="flex items-start gap-3 sm:gap-4">
            <div
              class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-impost-primary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
              <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
              </svg>
            </div>
            <div class="flex-1">
              <h3 class="text-base sm:text-lg font-bold text-white mb-2 sm:mb-3">Onboarding & Meeting Awal</h3>
              <p class="text-gray-300 leading-relaxed text-xs sm:text-sm">
                Diskusi mendalam mengenai detail proyek, kondisi ideal yang ingin dicapai, serta masalah yang sedang
                dihadapi bisnis Anda.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden md:flex md:w-2/12 md:order-2 justify-center relative z-10">
        <div
          class="w-16 h-16 bg-impost-primary text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-xl glow">
          1
        </div>
      </div>
      <div class="hidden md:block md:w-5/12 md:order-3"></div>
    </div>

    <div
      class="mb-8 sm:mb-12 md:mb-16 flex flex-row md:flex-row-reverse items-start md:items-center justify-between w-full">
      <div class="md:hidden flex-shrink-0 mr-4">
        <div
          class="w-14 h-14 bg-impost-primary text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg glow">
          2
        </div>
      </div>

      <div class="flex-1 md:w-5/12 md:order-1">
        <div
          class="bg-gray-800 p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
          <div class="flex items-start gap-3 sm:gap-4">
            <div
              class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-impost-primary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
              <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>
            </div>
            <div class="flex-1">
              <h3 class="text-base sm:text-lg font-bold text-white mb-2 sm:mb-3">Analisis & Penawaran</h3>
              <p class="text-gray-300 text-xs sm:text-sm leading-relaxed">
                Setelah Anda mengisi formulir, tim kami melakukan analisis mendalam untuk menyusun <strong
                  class="text-impost-primary">Project Brief</strong> dan skema harga.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden md:flex md:w-2/12 md:order-2 justify-center relative z-10">
        <div
          class="w-16 h-16 bg-impost-primary text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-xl glow">
          2
        </div>
      </div>
      <div class="hidden md:block md:w-5/12 md:order-3"></div>
    </div>

    <div class="mb-8 sm:mb-12 md:mb-16 flex flex-row md:flex-row items-start md:items-center justify-between w-full">
      <div class="md:hidden flex-shrink-0 mr-4">
        <div
          class="w-14 h-14 bg-impost-primary text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg glow">
          3
        </div>
      </div>

      <div class="flex-1 md:w-5/12 md:order-1">
        <div
          class="bg-gray-800 p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
          <div class="flex items-start gap-3 sm:gap-4">
            <div
              class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-impost-primary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
              <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div class="flex-1">
              <h3 class="text-base sm:text-lg font-bold text-white mb-2 sm:mb-3">Deal & Invoicing</h3>
              <p class="text-gray-300 leading-relaxed text-xs sm:text-sm">
                Negosiasi hingga sepakat (Harga & KPI). Proses dilanjutkan dengan tanda tangan kontrak dan pembayaran di
                awal (Invoicing).
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden md:flex md:w-2/12 md:order-2 justify-center relative z-10">
        <div
          class="w-16 h-16 bg-impost-primary text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-xl glow">
          3
        </div>
      </div>
      <div class="hidden md:block md:w-5/12 md:order-3"></div>
    </div>

    <div
      class="mb-8 sm:mb-12 md:mb-16 flex flex-row md:flex-row-reverse items-start md:items-center justify-between w-full">
      <div class="md:hidden flex-shrink-0 mr-4">
        <div
          class="w-14 h-14 bg-impost-primary text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg glow">
          4
        </div>
      </div>

      <div class="flex-1 md:w-5/12 md:order-1">
        <div
          class="bg-gray-800 p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
          <div class="flex items-start gap-3 sm:gap-4">
            <div
              class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-impost-primary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
              <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <div class="flex-1">
              <h3 class="text-base sm:text-lg font-bold text-white mb-2 sm:mb-3">Finalisasi Project Brief</h3>
              <p class="text-gray-300 leading-relaxed text-xs sm:text-sm">
                Tim menyempurnakan strategi internal, lalu dikembalikan ke Anda untuk ditinjau (Masa review maks. 2
                minggu).
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden md:flex md:w-2/12 md:order-2 justify-center relative z-10">
        <div
          class="w-16 h-16 bg-impost-primary text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-xl glow">
          4
        </div>
      </div>
      <div class="hidden md:block md:w-5/12 md:order-3"></div>
    </div>

    <div class="mb-8 sm:mb-12 md:mb-16 flex flex-row md:flex-row items-start md:items-center justify-between w-full">
      <div class="md:hidden flex-shrink-0 mr-4">
        <div
          class="w-14 h-14 bg-impost-primary text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg glow">
          5
        </div>
      </div>

      <div class="flex-1 md:w-5/12 md:order-1">
        <div
          class="bg-gray-800 p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
          <div class="flex items-start gap-3 sm:gap-4">
            <div
              class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-impost-primary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
              <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <div class="flex-1">
              <h3 class="text-base sm:text-lg font-bold text-white mb-2 sm:mb-3">Produksi & Eksekusi</h3>
              <p class="text-gray-300 leading-relaxed text-xs sm:text-sm">
                Mulai produksi konten dan menjalankan proyek. Proses ini mencakup <span
                  class="italic text-impost-primary">trial and error</span> untuk mencapai hasil optimal.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden md:flex md:w-2/12 md:order-2 justify-center relative z-10">
        <div
          class="w-16 h-16 bg-impost-primary text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-xl glow">
          5
        </div>
      </div>
      <div class="hidden md:block md:w-5/12 md:order-3"></div>
    </div>

    <div class="flex flex-row md:flex-row-reverse items-start md:items-center justify-between w-full">
      <div class="md:hidden flex-shrink-0 mr-4">
        <div class="w-14 h-14 bg-impost-primary text-white rounded-xl flex items-center justify-center shadow-lg glow">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
          </svg>
        </div>
      </div>

      <div class="flex-1 md:w-5/12 md:order-1">
        <div
          class="bg-gray-800 p-5 sm:p-6 md:p-8 rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
          <div class="flex items-start gap-3 sm:gap-4">
            <div
              class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-impost-primary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
              <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>
            </div>
            <div class="flex-1">
              <h3 class="text-base sm:text-lg font-bold text-white mb-2 sm:mb-3">Reporting & Evaluasi</h3>
              <p class="text-gray-300 leading-relaxed text-xs sm:text-sm">
                Di akhir bulan, kami mengirimkan laporan data & KPI. Anda memutuskan apakah lanjut kontrak atau tidak.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden md:flex md:w-2/12 md:order-2 justify-center relative z-10">
        <div
          class="w-16 h-16 bg-impost-primary text-white rounded-2xl flex items-center justify-center shadow-xl glow">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
          </svg>
        </div>
      </div>
      <div class="hidden md:block md:w-5/12 md:order-3"></div>
    </div>
  </div>
</section>
