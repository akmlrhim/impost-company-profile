@php
  $steps = [
      [
          'num' => '1',
          'title' => 'Onboarding & Meeting',
          'desc' =>
              'Diskusi mendalam tentang detail proyek, kondisi ideal yang ingin dicapai, serta masalah yang dihadapi bisnis Anda.',
      ],
      [
          'num' => '2',
          'title' => 'Analisis & Penawaran',
          'desc' => 'Tim melakukan analisis mendalam untuk menyusun Project Brief dan skema harga yang tepat sasaran.',
      ],
      [
          'num' => '3',
          'title' => 'Deal & Invoicing',
          'desc' =>
              'Negosiasi hingga sepakat (Harga & KPI), tanda tangan kontrak, dan pembayaran awal sebagai tanda komitmen.',
      ],
      [
          'num' => '4',
          'title' => 'Finalisasi Brief',
          'desc' =>
              'Tim menyempurnakan strategi internal, lalu dikembalikan untuk Anda tinjau. Masa review maksimal 2 minggu.',
      ],
      [
          'num' => '5',
          'title' => 'Produksi & Eksekusi',
          'desc' =>
              'Mulai produksi konten dan menjalankan proyek, termasuk fase testing & optimasi untuk hasil terbaik.',
      ],
      [
          'num' => '6',
          'title' => 'Reporting & Evaluasi',
          'desc' =>
              'Laporan data & KPI dikirim setiap akhir bulan. Anda memegang kontrol penuh atas kelanjutan kontrak.',
      ],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="text-center max-w-3xl mx-auto mb-14 sm:mb-20">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight text-white mb-4">
        Alur <span class="text-impost-primary">Layanan</span>
      </h2>
      <p class="text-xs sm:text-sm font-medium leading-relaxed text-white">
        Dari konsultasi hingga evaluasi hasil, setiap langkah dirancang transparan dan terukur.
      </p>
    </div>

    {{-- Steps --}}
    <div class="max-w-4xl mx-auto">
      @foreach ($steps as $step)
        <div class="flex gap-6 sm:gap-8">

          {{-- Track: Number + Line --}}
          <div class="flex flex-col items-center flex-shrink-0 w-12 sm:w-16">
            <span class="text-2xl sm:text-3xl tabular-nums font-black leading-none tracking-tighter text-impost-primary">
              {{ $step['num'] }}
            </span>
            @unless ($loop->last)
              <div class="w-0.5 flex-1 mt-3 min-h-[3rem] bg-impost-primary/5"></div>
            @endunless
          </div>

          {{-- Content --}}
          <div class="flex-1 {{ $loop->last ? 'pb-0' : 'pb-10 sm:pb-14' }}">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_280px] xl:grid-cols-[1fr_300px] gap-5 lg:gap-8 items-start">

              {{-- Text --}}
              <div class="pt-0.5">
                <h3 class="text-xl sm:text-lg font-bold text-white mb-2.5 leading-snug">{{ $step['title'] }}</h3>
                <p class="text-xs md:text-base font-normal text-white leading-relaxed">{{ $step['desc'] }}</p>
              </div>

              {{-- Illustration card (desktop only) --}}
              <div class="hidden lg:block">
                <div class="rounded-2xl overflow-hidden border border-white/[0.08] bg-white/[0.03]">

                  {{-- Window chrome --}}
                  <div class="flex items-center gap-1.5 px-4 py-2.5 border-b border-white/[0.06]">
                    <div class="w-2.5 h-2.5 rounded-full bg-red-400/50"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-yellow-400/50"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-green-400/50"></div>
                  </div>

                  {{-- Step-specific mockup --}}
                  <div class="p-4">

                    @if ($loop->index === 0)
                      {{-- Chat / meeting --}}
                      <div class="space-y-2.5">
                        <div class="flex items-end gap-2">
                          <div class="w-6 h-6 rounded-full flex-shrink-0 bg-impost-primary/20"></div>
                          <div
                            class="bg-white/[0.08] rounded-2xl rounded-bl-sm px-3 py-2 text-xs text-white/70 leading-relaxed max-w-[85%]">
                            Halo! Kami ingin konsultasi layanan digital marketing. Bisa jadwalkan meeting?
                          </div>
                        </div>
                        <div class="flex items-end gap-2 flex-row-reverse">
                          <div class="w-6 h-6 rounded-full flex-shrink-0 bg-impost-primary/40"></div>
                          <div
                            class="rounded-2xl rounded-br-sm px-3 py-2 text-xs text-impost-fifth font-semibold max-w-[80%] bg-impost-primary">
                            Tentu! Kami siap diskusikan kebutuhan Anda. 🗓️
                          </div>
                        </div>
                        <div class="flex items-center gap-2 pt-1">
                          <div class="flex-1 h-8 bg-white/[0.06] rounded-xl px-3 flex items-center">
                            <span class="text-[10px] text-white/25">Tulis pesan...</span>
                          </div>
                          <div
                            class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0 bg-impost-primary">
                            <svg class="w-3.5 h-3.5 text-impost-fifth" fill="none" stroke="currentColor"
                              viewBox="0 0 24 24" stroke-width="2.5">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                          </div>
                        </div>
                      </div>
                    @elseif ($loop->index === 1)
                      {{-- Analytics / brand analysis --}}
                      <div>
                        <div class="flex items-center justify-between mb-3">
                          <span class="text-[11px] font-bold text-white/60">Brand Analysis</span>
                          <span
                            class="text-[10px] px-2 py-0.5 rounded-full font-semibold bg-impost-primary/20 text-impost-primary">
                            Completed
                          </span>
                        </div>
                        <div class="flex items-end gap-1.5 h-16 mb-3">
                          @foreach ([35, 60, 45, 80, 55, 90, 70] as $h)
                            <div class="flex-1 rounded-t-sm bg-impost-primary/60" style="height: {{ $h }}%">
                            </div>
                          @endforeach
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                          <div class="bg-white/[0.06] rounded-lg p-2.5">
                            <p class="text-[10px] text-white/40 mb-0.5">Kompetitor</p>
                            <p class="text-sm font-black text-white">5 brands</p>
                          </div>
                          <div class="bg-white/[0.06] rounded-lg p-2.5">
                            <p class="text-[10px] text-white/40 mb-0.5">Peluang</p>
                            <p class="text-sm font-black text-impost-primary">12 area</p>
                          </div>
                        </div>
                      </div>
                    @elseif ($loop->index === 2)
                      {{-- Deal / contract --}}
                      <div class="space-y-2.5">
                        <div class="flex items-center gap-2.5 p-2.5 bg-white/[0.06] rounded-xl">
                          <svg class="w-4 h-4 flex-shrink-0 text-impost-primary" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                          </svg>
                          <div>
                            <p class="text-[10px] text-white/40">Paket Layanan</p>
                            <p class="text-xs font-bold text-white">Digital Marketing Pro</p>
                          </div>
                        </div>
                        <div class="grid grid-cols-3 gap-1.5">
                          @foreach (['KPI Jelas', 'Kontrak', 'Invoice'] as $item)
                            <div
                              class="rounded-lg p-2 text-center bg-impost-primary/10 border border-impost-primary/25">
                              <p class="text-[9px] font-semibold text-impost-primary">{{ $item }}</p>
                            </div>
                          @endforeach
                        </div>
                        <div
                          class="flex items-center gap-2 p-2.5 rounded-xl bg-impost-primary/15 border border-impost-primary/35">
                          <svg class="w-4 h-4 flex-shrink-0 text-impost-primary" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                          </svg>
                          <span class="text-xs font-bold text-impost-primary">Kontrak Ditandatangani</span>
                        </div>
                      </div>
                    @elseif ($loop->index === 3)
                      {{-- Brief / document checklist --}}
                      <div>
                        <div class="flex items-center gap-2 mb-3">
                          <svg class="w-4 h-4 text-impost-primary" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                          </svg>
                          <span class="text-[11px] font-bold text-white">Project Brief — Final</span>
                        </div>
                        <div class="space-y-1.5">
                          @foreach (['Target Audience', 'Strategi Konten', 'Timeline & KPI', 'Anggaran & ROI'] as $item)
                            <div class="flex items-center gap-2 p-2 bg-white/[0.04] rounded-lg">
                              <div
                                class="w-4 h-4 rounded-full flex items-center justify-center flex-shrink-0 bg-impost-primary/25">
                                <svg class="w-2.5 h-2.5 text-impost-primary" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                                </svg>
                              </div>
                              <span class="text-xs text-white/60">{{ $item }}</span>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    @elseif ($loop->index === 4)
                      {{-- Production / content calendar --}}
                      <div>
                        <div class="flex items-center justify-between mb-3">
                          <span class="text-[11px] font-bold text-white/60">Content Calendar</span>
                          <span
                            class="text-[10px] px-2 py-0.5 rounded-full font-bold bg-impost-primary/20 text-impost-primary">●
                            Live</span>
                        </div>
                        <div class="grid grid-cols-3 gap-1.5">
                          @foreach (range(1, 6) as $i)
                            <div
                              class="aspect-square rounded-xl flex items-center justify-center
                              {{ $i <= 4
                                  ? 'bg-impost-primary/15 border border-impost-primary/30'
                                  : 'bg-white/[0.04] border border-dashed border-white/[0.12]' }}">
                              @if ($i <= 4)
                                <svg class="w-5 h-5 text-impost-primary" fill="none" stroke="currentColor"
                                  viewBox="0 0 24 24" stroke-width="1.5">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                              @else
                                <span class="text-white/20 text-lg font-thin">+</span>
                              @endif
                            </div>
                          @endforeach
                        </div>
                      </div>
                    @else
                      {{-- Reporting / dashboard --}}
                      <div>
                        <div class="flex items-center justify-between mb-3">
                          <span class="text-[11px] font-bold text-white/60">Monthly Report</span>
                          <span class="text-[10px] text-white/40">Juni 2025</span>
                        </div>
                        <div class="grid grid-cols-2 gap-1.5">
                          @foreach ([['Reach', '4.2M', '↑23%'], ['Engagement', '8.7%', '↑5%'], ['Conversion', '3.2%', '↑12%'], ['ROI', '340%', '↑45%']] as $m)
                            <div class="bg-white/[0.06] rounded-xl p-2.5">
                              <p class="text-[10px] text-white/40 mb-0.5">{{ $m[0] }}</p>
                              <p class="text-sm font-black text-white">{{ $m[1] }}</p>
                              <p class="text-[10px] font-bold text-impost-primary">{{ $m[2] }}</p>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    @endif

                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      @endforeach
    </div>

  </div>
</section>
