@props(['service'])

<article
  class="relative h-80 rounded-xl overflow-hidden group shadow-xl transition-transform duration-300 hover:scale-105">

  <!-- IMAGE -->
  <img src="{{ $service->cover_path ? asset('storage/' . $service->cover_path) : asset('img/service_default.webp') }}"
    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
    loading="lazy" decoding="async" />

  <!-- GRADIENT OVERLAY -->
  <div
    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent transition-all duration-300 group-hover:from-black/60">
  </div>

  <!-- CONTENT -->
  <div class="relative z-10 h-full flex flex-col justify-end p-5">
    <h3 class="text-lg font-semibold text-white mb-1">
      {{ $service->service_name }}
    </h3>

    <p class="text-sm text-gray-200 line-clamp-2">
      {{ $service->description }}
    </p>
  </div>

</article>
