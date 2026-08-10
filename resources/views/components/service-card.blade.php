@props(['service'])

<article class="group relative h-72 sm:h-80 rounded-[2rem] overflow-hidden cursor-pointer
  border border-white/8 shadow-[0_8px_32px_rgba(0,0,0,0.4)]
  hover:shadow-[0_20px_60px_rgba(0,0,0,0.65)] hover:border-impost-primary/30
  transform-gpu transition-all duration-300">

  {{-- Background image / placeholder --}}
  <div class="absolute inset-0 z-0">
    @if ($service->cover_path)
      <img src="{{ asset('storage/'.$service->cover_path) }}"
        class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 will-change-transform"
        loading="lazy" decoding="async" alt="{{ $service->service_name }}" />
    @else
      <div class="w-full h-full bg-white/4 flex items-center justify-center">
        <svg class="w-16 h-16 text-white/8" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
        </svg>
      </div>
    @endif
  </div>

  {{-- Gradient overlay --}}
  <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent z-10 pointer-events-none"></div>

  {{-- Category badge --}}
  @if ($service->category === 'Utama')
    <div class="absolute top-4 right-4 z-20">
      <span class="inline-flex items-center gap-1 px-3.5 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-impost-primary text-impost-fifth">Utama</span>
    </div>
  @elseif ($service->category === 'Tambahan')
    <div class="absolute top-4 right-4 z-20">
      <span class="inline-flex items-center gap-1 px-3.5 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider border border-white/20 text-white">Tambahan</span>
    </div>
  @endif

  {{-- Bottom text content --}}
  <div class="absolute inset-x-0 bottom-0 p-5 sm:p-6 z-20">
    <div class="transform-gpu transition-transform duration-300 group-hover:-translate-y-1.5">

      <h3 class="font-bold text-white text-base sm:text-lg mb-2 leading-tight group-hover:text-impost-primary transition-colors duration-300">
        {{ $service->service_name }}
      </h3>

      {{-- Animated underline --}}
      <div class="w-6 h-[2px] bg-impost-primary mb-3 transition-all duration-300 ease-out group-hover:w-12"></div>

      {{-- Description revealed on hover --}}
      <div class="grid grid-rows-[0fr] group-hover:grid-rows-[1fr] transition-[grid-template-rows] duration-500 ease-out">
        <p class="text-xs md:text-base font-medium leading-relaxed text-white overflow-hidden opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-75">
          {{ $service->description }}
        </p>
      </div>
    </div>
  </div>

</article>
