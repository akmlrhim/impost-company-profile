@props(['service'])
<article
  class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-lg overflow-hidden border-2 border-impost-fourth flex flex-col h-full">

  <div class="h-56 overflow-hidden">
    <img src="{{ $service->cover_path ? asset('storage/' . $service->cover_path) : asset('img/service_default.webp') }}"
      class="w-full h-full object-cover" loading="lazy" decoding="async">
  </div>

  <div class="p-4 flex flex-col flex-1">
    <h3 class="text-md font-bold text-white mb-1.5">
      {{ $service->service_name }}
    </h3>

    <p class="text-xs sm:text-sm text-white leading-snug">
      {{ $service->description }}
    </p>
  </div>
</article>
