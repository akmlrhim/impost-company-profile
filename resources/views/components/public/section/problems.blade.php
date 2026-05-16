@php
  $problems = [
    ['icon'=>'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z','title'=>'Konten Jalan, Sepi','desc'=>'Traffic tinggi tapi penjualan nol. Funnel bocor di mana-mana.'],
    ['icon'=>'M13 10V3L4 14h7v7l9-11h-7z','title'=>'Iklan Boncos','desc'=>'Budget habis tanpa hasil. Setiap rupiah yang keluar tidak balik.'],
    ['icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z','title'=>'Buta Data','desc'=>'Tidak tahu metrik mana yang penting. Keputusan berbasis feeling.'],
    ['icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z','title'=>'Terjebak Operasional','desc'=>'Sibuk hal teknis hingga tak punya waktu berpikir strategis.'],
    ['icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z','title'=>'Tim Tidak Efektif','desc'=>'Tim internal belum siap menghadapi lanskap digital yang berubah cepat.'],
    ['icon'=>'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636','title'=>'Trauma Agency','desc'=>'Pernah kecewa dengan agency sebelumnya. Ragu untuk mencoba lagi.'],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24 bg-impost-fifth">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-20">
      <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-3">Akar Masalah</p>
      <h2 class="font-bold leading-tight text-white mb-5">
        Mengapa Omzet<br>
        <span class="text-red-400">Sulit Bertumbuh?</span>
      </h2>
      <p class="text-base font-medium leading-relaxed text-white max-w-xl mx-auto">
        Banyak bisnis terjebak di masalah yang sama tanpa pernah menyentuh akar persoalannya.
      </p>
    </div>

    {{-- ── MOBILE: CSS scroll-snap carousel ──────────────────────────────────── --}}
    <div class="sm:hidden"
      x-data="{
        active: 0,
        total: {{ count($problems) }},
        goTo(i) {
          this.active = i;
          const track = this.$refs.track;
          track.scrollTo({ left: i * track.clientWidth, behavior: 'smooth' });
        }
      }">

      {{-- Scroll track — overflow-x: auto + scroll-snap handles everything natively --}}
      <div class="no-scrollbar overflow-x-auto"
        style="scroll-snap-type: x mandatory;"
        x-ref="track"
        @scroll.passive="active = Math.round($el.scrollLeft / Math.max($el.clientWidth, 1))">

        <div class="flex">
          @foreach ($problems as $item)
            {{-- min-width: 100% = 100% of the scroll container's clientWidth --}}
            <div class="flex-shrink-0 px-1" style="min-width: 100%; scroll-snap-align: start;">

              <div class="relative bg-white/[0.04] border border-white/[0.08] rounded-2xl overflow-hidden
                flex flex-col items-center text-center p-8">

                {{-- Red glow --}}
                <div class="absolute top-6 left-1/2 -translate-x-1/2 w-28 h-28 rounded-full
                  bg-red-500/10 blur-2xl pointer-events-none"></div>

                {{-- Icon --}}
                <div class="relative z-10 mb-6">
                  <svg class="w-12 h-12 text-red-400/80"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
                  </svg>
                </div>

                <h3 class="font-bold text-white mb-2.5">{{ $item['title'] }}</h3>
                <p class="text-sm leading-relaxed text-white/80">{{ $item['desc'] }}</p>

                <div class="absolute bottom-0 left-0 right-0 h-px
                  bg-gradient-to-r from-transparent via-red-500/50 to-transparent"></div>
              </div>

            </div>
          @endforeach
        </div>
      </div>

      {{-- Dot pagination --}}
      <div class="flex justify-center items-center gap-1.5 mt-5">
        @foreach ($problems as $i => $item)
          <button type="button"
            @click="goTo({{ $i }})"
            class="rounded-full transition-all duration-300"
            :class="active === {{ $i }}
              ? 'w-5 h-1.5 bg-red-400'
              : 'w-1.5 h-1.5 bg-white/25'">
          </button>
        @endforeach
      </div>

      {{-- Slide counter --}}
      <p class="text-center mt-2" style="font-size: 11px; color: rgba(255,255,255,0.3);">
        <span x-text="active + 1"></span>&thinsp;/&thinsp;{{ count($problems) }}
      </p>
    </div>

    {{-- ── DESKTOP: 3-column grid ─────────────────────────────────────────────── --}}
    <div class="hidden sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
      @foreach ($problems as $item)
        <div class="group relative bg-white/[0.04] border border-white/[0.08] rounded-2xl hover:border-white/[0.15]
          flex flex-col items-center text-center p-8 md:p-10 overflow-hidden
          hover:-translate-y-1.5 transition-all duration-300">

          <div class="absolute top-6 left-1/2 -translate-x-1/2 w-28 h-28 rounded-full bg-red-500/10
            blur-2xl group-hover:bg-red-500/20 transition-colors duration-500 pointer-events-none"></div>

          <div class="relative z-10 mb-6">
            <svg class="w-12 h-12 text-red-400/70 group-hover:text-red-400 transition-colors duration-300"
              fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.3">
              <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
            </svg>
          </div>

          <h3 class="font-bold text-white mb-2.5 group-hover:text-red-300 transition-colors duration-300">
            {{ $item['title'] }}
          </h3>
          <p class="text-sm font-medium leading-relaxed text-white">{{ $item['desc'] }}</p>

          <div class="absolute bottom-0 left-0 right-0 h-px
            bg-gradient-to-r from-transparent via-red-500/50 to-transparent
            opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>
      @endforeach
    </div>

    {{-- Callout --}}
    <div class="mt-6 bg-[#0a0a0a] border border-[#d4ac3c]/25 rounded-[2rem] p-6 md:p-8 text-center">
      <p class="text-base font-medium leading-relaxed text-white max-w-2xl mx-auto">
        Jika bisnis Anda mengalami <span class="text-red-400 font-bold">salah satu</span> dari masalah di atas,
        berarti Anda butuh <span class="text-white font-bold">sistem marketing yang benar</span> — bukan sekadar
        konten atau iklan.
      </p>
    </div>

  </div>
</section>
