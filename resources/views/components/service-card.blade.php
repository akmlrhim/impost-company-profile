@props(['service'])

<article x-data="{ open: false }" @click="open = !open" @mouseenter="open = true" @mouseleave="open = false"
  class="relative h-80 rounded-xl overflow-hidden group shadow-xl transition-transform duration-300 hover:scale-105 cursor-pointer">

  <img src="{{ $service->cover_path ? asset('storage/' . $service->cover_path) : asset('img/service_default.webp') }}"
    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
    loading="lazy" decoding="async" />

  <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

  <div class="absolute inset-0 flex items-end z-10">
    <div class="w-full px-4 pb-4">

      <p x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-3" class="text-sm text-gray-200 mb-2">
        {{ $service->description }}
      </p>

      <h3 class="text-lg font-semibold text-white leading-tight">
        {{ $service->service_name }}
      </h3>

    </div>
  </div>

</article>
