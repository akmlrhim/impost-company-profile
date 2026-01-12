@props(['studyCase'])
<a href="{{ route('study-case.detail', $studyCase) }}">
  <article
    class="relative rounded-xl overflow-hidden h-72 group shadow-xl transition-transform duration-300 hover:scale-105">

    <!-- IMAGE -->
    <img
      src="{{ $studyCase->cover_path ? asset('storage/' . $studyCase->cover_path) : asset('img/service_default.webp') }}"
      class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
      loading="lazy" decoding="async" />

    <!-- GRADIENT OVERLAY -->
    <div
      class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent transition-opacity duration-300 group-hover:from-black/60">
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 h-full flex items-end p-5">
      <h3 class="text-lg font-semibold text-white leading-snug">
        {{ $studyCase->name }}
      </h3>
    </div>

  </article>
</a>
