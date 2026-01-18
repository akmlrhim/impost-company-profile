@props(['service'])

<article
  class="group relative h-72 rounded-2xl overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl cursor-pointer">

  <div class="absolute inset-0">
    @if ($service->cover_path)
      <img src="{{ asset('storage/' . $service->cover_path) }}"
        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy"
        decoding="async" alt="{{ $service->service_name }}" />
    @else
      <div class="w-full h-full bg-gray-200 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-lamp-desk-icon lucide-lamp-desk w-20 h-20 text-gray-400">
          <path
            d="M10.293 2.293a1 1 0 0 1 1.414 0l2.5 2.5 5.994 1.227a1 1 0 0 1 .506 1.687l-7 7a1 1 0 0 1-1.687-.506l-1.227-5.994-2.5-2.5a1 1 0 0 1 0-1.414z" />
          <path d="m14.207 4.793-3.414 3.414" />
          <path d="M3 20a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z" />
          <path d="m9.086 6.5-4.793 4.793a1 1 0 0 0-.18 1.17L7 18" />
        </svg>
      </div>
    @endif

  </div>

  <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/50 to-black/90"></div>

  @if ($service->category === 'Utama')
    <div class="absolute top-4 right-4 z-20">
      <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/95 backdrop-blur-sm shadow-lg">
        <span class="text-xs font-semibold text-gray-900 uppercase tracking-wider">Utama</span>
      </span>
    </div>
  @elseif ($service->category === 'Tambahan')
    <div class="absolute top-4 right-4 z-20">
      <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-amber-500 shadow-lg">
        <span class="text-xs font-semibold text-white uppercase tracking-wider">Tambahan</span>
      </span>
    </div>
  @endif

  <div class="absolute inset-x-0 bottom-0 p-6">

    <h3 class="text-lg font-bold text-white mb-2 leading-tight">
      {{ $service->service_name }}
    </h3>

    <div class="w-12 h-0.5 bg-white/60 mb-3"></div>

    <p
      class="text-xs text-gray-200 leading-relaxed max-w-md opacity-0 max-h-0 overflow-hidden transition-all duration-500 group-hover:opacity-100 group-hover:max-h-32">
      {{ $service->description }}
    </p>

  </div>

</article>
