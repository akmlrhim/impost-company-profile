@props(['service'])

<article
  class="group relative h-72 rounded-2xl overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl hover:-translate-y-1 cursor-pointer border border-white/10 hover:border-impost-primary/50">

  <div class="absolute inset-0">
    @if ($service->cover_path)
      <img src="{{ asset('storage/' . $service->cover_path) }}"
        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy"
        decoding="async" alt="{{ $service->service_name }}" />
    @else
      <div class="w-full h-full bg-gray-900 flex items-center justify-center border-b border-white/5">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="w-16 h-16 text-white/20">
          <path
            d="M10.293 2.293a1 1 0 0 1 1.414 0l2.5 2.5 5.994 1.227a1 1 0 0 1 .506 1.687l-7 7a1 1 0 0 1-1.687-.506l-1.227-5.994-2.5-2.5a1 1 0 0 1 0-1.414z" />
          <path d="m14.207 4.793-3.414 3.414" />
          <path d="M3 20a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z" />
          <path d="m9.086 6.5-4.793 4.793a1 1 0 0 0-.18 1.17L7 18" />
        </svg>
      </div>
    @endif
  </div>

  <div
    class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-90 transition-opacity duration-300 group-hover:opacity-100">
  </div>

  @if ($service->category === 'Utama')
    <div class="absolute top-4 right-4 z-20">
      <span
        class="inline-flex items-center px-3 py-1 rounded-full bg-impost-primary/90 text-black backdrop-blur-md shadow-lg border border-white/10">
        <span class="text-[10px] font-bold uppercase tracking-wider">Utama</span>
      </span>
    </div>
  @elseif ($service->category === 'Tambahan')
    <div class="absolute top-4 right-4 z-20">
      <span
        class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 text-white backdrop-blur-md shadow-lg border border-white/10">
        <span class="text-[10px] font-bold uppercase tracking-wider">Tambahan</span>
      </span>
    </div>
  @endif

  <div class="absolute inset-x-0 bottom-0 p-6 z-20">

    <h3
      class="text-xl font-bold text-white mb-2 leading-tight group-hover:text-impost-primary transition-colors duration-300">
      {{ $service->service_name }}
    </h3>

    <div class="w-8 h-0.5 bg-impost-primary mb-3 transition-all duration-500 group-hover:w-16"></div>

    <div class="grid grid-rows-[0fr] group-hover:grid-rows-[1fr] transition-all duration-500">
      <p
        class="text-sm text-gray-300 leading-relaxed overflow-hidden opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-75">
        {{ $service->description }}
      </p>
    </div>

  </div>

</article>
