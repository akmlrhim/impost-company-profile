@if ($items->hasPages())
  <div class="flex flex-col sm:flex-row items-center justify-between gap-4">

    <p class="order-2 sm:order-1 text-xs sm:text-sm text-white/50">
      Menampilkan {{ $items->firstItem() }}&ndash;{{ $items->lastItem() }} Dari {{ $items->total() }} Hasil
    </p>

    <div class="order-1 sm:order-2 flex items-center gap-1.5 sm:gap-2">

      {{-- Previous --}}
      @unless ($items->onFirstPage())
        <a href="{{ $items->previousPageUrl() }}"
          class="inline-flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 rounded-lg border border-white/10 text-white/60 hover:text-white hover:border-impost-primary/50 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
          </svg>
        </a>
      @endunless

      {{-- Page Numbers (sembunyikan saat di mobile) --}}
      <div class="hidden sm:flex items-center gap-1.5 sm:gap-2">
        @if ($items->currentPage() > 3)
          <a href="{{ $items->url(1) }}"
            class="inline-flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 rounded-lg border border-white/10 text-xs sm:text-sm font-semibold text-white/60 hover:text-white hover:border-impost-primary/50 transition-colors">
            1
          </a>
          @if ($items->currentPage() > 4)
            <span class="px-1 text-white/30">...</span>
          @endif
        @endif

        @foreach (range(1, $items->lastPage()) as $page)
          @if ($page >= $items->currentPage() - 2 && $page <= $items->currentPage() + 2)
            @if ($page == $items->currentPage())
              <span
                class="inline-flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-impost-primary text-impost-fifth text-xs sm:text-sm font-bold">
                {{ $page }}
              </span>
            @else
              <a href="{{ $items->url($page) }}"
                class="inline-flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 rounded-lg border border-white/10 text-xs sm:text-sm font-semibold text-white/60 hover:text-white hover:border-impost-primary/50 transition-colors">
                {{ $page }}
              </a>
            @endif
          @endif
        @endforeach

        @if ($items->currentPage() < $items->lastPage() - 2)
          @if ($items->currentPage() < $items->lastPage() - 3)
            <span class="px-1 text-white/30">...</span>
          @endif
          <a href="{{ $items->url($items->lastPage()) }}"
            class="inline-flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 rounded-lg border border-white/10 text-xs sm:text-sm font-semibold text-white/60 hover:text-white hover:border-impost-primary/50 transition-colors">
            {{ $items->lastPage() }}
          </a>
        @endif
      </div>

      {{-- Next --}}
      @if ($items->hasMorePages())
        <a href="{{ $items->nextPageUrl() }}"
          class="inline-flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 rounded-lg border border-white/10 text-white/60 hover:text-white hover:border-impost-primary/50 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
          </svg>
        </a>
      @endif

    </div>

  </div>
@endif
