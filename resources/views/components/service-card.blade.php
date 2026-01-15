@props(['service'])

<article
  class="group relative h-72 rounded-2xl overflow-hidden shadow-xl transition-all duration-500 hover:shadow-2xl cursor-pointer">

  <div class="absolute inset-0">
    <img
      src="{{ $service->cover_path ? asset('storage/' . $service->cover_path) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80' }}"
      class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy"
      decoding="async" alt="{{ $service->service_name }}" />
  </div>

  <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/50 to-black/90"></div>

  @if ($service->category === 'Featured')
    <div class="absolute top-4 right-4 z-20">
      <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/95 backdrop-blur-sm shadow-lg">
        <span class="text-xs font-semibold text-gray-900 uppercase tracking-wider">Featured</span>
      </span>
    </div>
  @elseif ($service->category === 'Add-On')
    <div class="absolute top-4 right-4 z-20">
      <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-amber-500 shadow-lg">
        <span class="text-xs font-semibold text-white uppercase tracking-wider">Add-On</span>
      </span>
    </div>
  @endif

  <div class="absolute inset-x-0 bottom-0 p-6">

    <h3 class="text-2xl font-bold text-white mb-2 leading-tight">
      {{ $service->service_name }}
    </h3>

    <div class="w-12 h-0.5 bg-white/60 mb-3"></div>

    <p
      class="text-xs text-gray-200 leading-relaxed max-w-md opacity-0 max-h-0 overflow-hidden transition-all duration-500 group-hover:opacity-100 group-hover:max-h-32">
      {{ $service->description }}
    </p>

  </div>

</article>
