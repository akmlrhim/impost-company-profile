@props(['studyCase'])
<a href="{{ route('study-case.detail', $studyCase) }}" class="block h-full">
  <article
    class="relative rounded-2xl overflow-hidden h-72 group shadow-2xl transition-all duration-500 hover:shadow-impost-primary/50 border-2 border-transparent hover:border-impost-primary/30">

    <!-- IMAGE with Enhanced Zoom -->
    <img
      src="{{ $studyCase->cover_path ? asset('storage/' . $studyCase->cover_path) : asset('img/service_default.webp') }}"
      class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-125 group-hover:rotate-2"
      loading="lazy" decoding="async" alt="{{ $studyCase->name }}" />

    <!-- ANIMATED GRADIENT OVERLAY -->
    <div
      class="absolute inset-0 bg-gradient-to-t from-impost-fifth via-impost-fourth/70 to-transparent opacity-80 transition-all duration-500 group-hover:opacity-60">
    </div>

    <!-- Accent Line Animation -->
    <div
      class="absolute bottom-0 left-0 w-0 h-1 bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-primary transition-all duration-500 group-hover:w-full">
    </div>

    <!-- CONTENT with Enhanced Animation -->
    <div class="relative z-10 h-full flex flex-col justify-end p-6">

      <!-- Badge/Tag (Optional - jika ada kategori) -->
      <div
        class="mb-3 transform transition-all duration-500 translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
        <span
          class="inline-block px-3 py-1 bg-impost-primary/90 text-impost-fifth text-xs font-semibold rounded-full backdrop-blur-sm">
          Case Study
        </span>
      </div>

      <!-- Title with Slide Up Effect -->
      <h3
        class="text-xl font-bold text-white leading-snug mb-2 transform transition-all duration-500 group-hover:-translate-y-1">
        {{ $studyCase->name }}
      </h3>

      <!-- Description (Hidden, Shows on Hover) -->
      <p
        class="text-white/80 text-sm leading-relaxed max-h-0 overflow-hidden opacity-0 transition-all duration-500 group-hover:max-h-20 group-hover:opacity-100">
        {{ Str::limit($studyCase->description ?? 'Temukan bagaimana kami membantu mencapai tujuan bisnis mereka.', 80) }}
      </p>

      <!-- Call to Action Arrow -->
      <div
        class="flex items-center gap-2 mt-3 text-impost-primary transform transition-all duration-500 translate-x-0 group-hover:translate-x-2">
        <span class="text-sm font-semibold">Lihat Detail</span>
        <svg class="w-4 h-4 transition-transform duration-500 group-hover:translate-x-1" fill="none"
          stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </div>
    </div>

    <!-- Shine Effect on Hover -->
    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
      <div
        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
      </div>
    </div>

  </article>
</a>
