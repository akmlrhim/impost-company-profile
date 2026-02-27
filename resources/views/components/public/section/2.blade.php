<section class="py-16 sm:py-24 md:py-32 relative overflow-hidden flex items-center justify-center">

  <div class="max-w-7xl mx-auto px-6 relative z-10 w-full">

    {{-- Mobile layout --}}
    <div class="md:hidden">
      <div class="text-center mb-10">
        <h2 class="text-2xl sm:text-4xl font-medium font-header tracking-tight leading-tight mb-4 text-white">
          Mengapa Omzet
          <br>
          <span class="italic text-red-500 font-header drop-shadow-lg">Sulit Bertumbuh?</span>
        </h2>
      </div>

      <div class="grid grid-cols-2 gap-3">
        @php
          $problems = [
              [
                  'icon' =>
                      'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
                  'title' => 'Konten Jalan, Sepi',
                  'sub' => 'Konversi Rendah',
              ],
              ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Iklan Boncos', 'sub' => 'ROAS Minus'],
              [
                  'icon' =>
                      'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                  'title' => 'Buta Data',
                  'sub' => 'Tanpa KPI',
              ],
              [
                  'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                  'title' => 'Terjebak Ops',
                  'sub' => 'Tidak Strategis',
              ],
              [
                  'icon' =>
                      'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                  'title' => 'Tim Tidak Efektif',
                  'sub' => 'Skillset Lama',
              ],
              [
                  'icon' =>
                      'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636',
                  'title' => 'Trauma Agency',
                  'sub' => 'Ragu Melangkah',
              ],
          ];
        @endphp

        @foreach ($problems as $item)
          <div class="bg-red-950/30 border border-red-500/30 rounded-2xl p-3.5 flex flex-col gap-2">
            <div class="w-8 h-8 rounded-full flex items-center justify-center bg-red-500/10 text-red-500 shrink-0">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
              </svg>
            </div>
            <div>
              <h3 class="font-bold text-xs text-white leading-tight">{{ $item['title'] }}</h3>
              <p class="text-[10px] text-red-200/70 font-medium uppercase tracking-wide mt-0.5">{{ $item['sub'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- Desktop layout --}}
    <div class="hidden md:block relative" style="height: 560px;">

      <div class="absolute inset-0 flex items-center justify-center z-20 pointer-events-none">
        <div class="text-center">
          <h2 class="text-4xl lg:text-6xl font-medium font-header tracking-tight leading-tight mb-4 text-white">
            Mengapa Omzet <br>
            <span class="italic text-red-500 font-header drop-shadow-lg">Sulit Bertumbuh?</span>
          </h2>

        </div>
      </div>

      {{-- Bubble kiri atas --}}
      <div class="absolute top-[8%] left-[4%] group animate-float-slow -rotate-6 z-10">
        <div
          class="bg-red-950/30 backdrop-blur-md shadow-[0_8px_30px_rgba(220,38,38,0.15)] border border-red-500/30 rounded-full px-7 py-3 flex items-center gap-3 hover:border-red-500/80 hover:bg-red-900/40 transition-all duration-300 cursor-default">
          <div
            class="w-10 h-10 rounded-full flex items-center justify-center bg-red-500/10 text-red-500 shrink-0 group-hover:bg-red-500/20 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
          <div>
            <h3 class="font-bold text-sm text-white leading-tight">Konten Jalan, Sepi</h3>
            <p class="text-[11px] text-red-200/70 font-medium uppercase tracking-wide">Konversi Rendah</p>
          </div>
        </div>
      </div>

      {{-- Bubble kanan atas --}}
      <div class="absolute top-[8%] right-[4%] group animate-float-medium rotate-3 z-10">
        <div
          class="bg-red-950/30 backdrop-blur-md shadow-[0_8px_30px_rgba(220,38,38,0.15)] border border-red-500/30 rounded-full px-7 py-3 flex items-center gap-3 hover:border-red-500/80 hover:bg-red-900/40 transition-all duration-300 cursor-default">
          <div
            class="w-10 h-10 rounded-full flex items-center justify-center bg-red-500/10 text-red-500 shrink-0 group-hover:bg-red-500/20 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <div>
            <h3 class="font-bold text-sm text-white leading-tight">Iklan Boncos</h3>
            <p class="text-[11px] text-red-200/70 font-medium uppercase tracking-wide">ROAS Minus</p>
          </div>
        </div>
      </div>

      {{-- Bubble kiri tengah --}}
      <div class="absolute top-[42%] left-[8%] group animate-float-fast rotate-2 z-10">
        <div
          class="bg-red-950/30 backdrop-blur-md shadow-[0_8px_30px_rgba(220,38,38,0.15)] border border-red-500/30 rounded-full px-7 py-3 flex items-center gap-3 hover:border-red-500/80 hover:bg-red-900/40 transition-all duration-300 cursor-default">
          <div
            class="w-10 h-10 rounded-full flex items-center justify-center bg-red-500/10 text-red-500 shrink-0 group-hover:bg-red-500/20 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </div>
          <div>
            <h3 class="font-bold text-sm text-white leading-tight">Buta Data</h3>
            <p class="text-[11px] text-red-200/70 font-medium uppercase tracking-wide">Tanpa KPI</p>
          </div>
        </div>
      </div>

      {{-- Bubble kanan tengah --}}
      <div class="absolute top-[42%] right-[8%] group animate-float-slow -rotate-3 z-10">
        <div
          class="bg-red-950/30 backdrop-blur-md shadow-[0_8px_30px_rgba(220,38,38,0.15)] border border-red-500/30 rounded-full px-7 py-3 flex items-center gap-3 hover:border-red-500/80 hover:bg-red-900/40 transition-all duration-300 cursor-default">
          <div
            class="w-10 h-10 rounded-full flex items-center justify-center bg-red-500/10 text-red-500 shrink-0 group-hover:bg-red-500/20 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <h3 class="font-bold text-sm text-white leading-tight">Terjebak Ops</h3>
            <p class="text-[11px] text-red-200/70 font-medium uppercase tracking-wide">Tidak Strategis</p>
          </div>
        </div>
      </div>

      {{-- Bubble kiri bawah --}}
      <div class="absolute bottom-[8%] left-[10%] group animate-float-medium -rotate-3 z-10">
        <div
          class="bg-red-950/30 backdrop-blur-md shadow-[0_8px_30px_rgba(220,38,38,0.15)] border border-red-500/30 rounded-full px-7 py-3 flex items-center gap-3 hover:border-red-500/80 hover:bg-red-900/40 transition-all duration-300 cursor-default">
          <div
            class="w-10 h-10 rounded-full flex items-center justify-center bg-red-500/10 text-red-500 shrink-0 group-hover:bg-red-500/20 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div>
            <h3 class="font-bold text-sm text-white leading-tight">Tim Tidak Efektif</h3>
            <p class="text-[11px] text-red-200/70 font-medium uppercase tracking-wide">Skillset Lama</p>
          </div>
        </div>
      </div>

      {{-- Bubble kanan bawah --}}
      <div class="absolute bottom-[8%] right-[10%] group animate-float-fast rotate-6 z-10">
        <div
          class="bg-red-950/30 backdrop-blur-md shadow-[0_8px_30px_rgba(220,38,38,0.15)] border border-red-500/30 rounded-full px-7 py-3 flex items-center gap-3 hover:border-red-500/80 hover:bg-red-900/40 transition-all duration-300 cursor-default">
          <div
            class="w-10 h-10 rounded-full flex items-center justify-center bg-red-500/10 text-red-500 shrink-0 group-hover:bg-red-500/20 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
            </svg>
          </div>
          <div>
            <h3 class="font-bold text-sm text-white leading-tight">Trauma Agency</h3>
            <p class="text-[11px] text-red-200/70 font-medium uppercase tracking-wide">Ragu Melangkah</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
