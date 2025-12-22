@if ($items->hasPages())
  <div class="flex flex-col sm:flex-row items-center justify-center gap-4">

    {{-- Previous --}}
    @if ($items->onFirstPage())
      <span
        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-600 bg-gray-800 rounded-lg cursor-not-allowed">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Previous
      </span>
    @else
      <a href="{{ $items->previousPageUrl() }}"
        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-impost-third rounded-lg hover:bg-impost-fourth transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Previous
      </a>
    @endif

    {{-- Page Numbers --}}
    <div class="flex items-center gap-2">
      @if ($items->currentPage() > 3)
        <a href="{{ $items->url(1) }}"
          class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-white hover:bg-impost-third rounded-lg transition-colors">
          1
        </a>
        @if ($items->currentPage() > 4)
          <span class="px-2 text-gray-500">...</span>
        @endif
      @endif

      @foreach (range(1, $items->lastPage()) as $page)
        @if ($page >= $items->currentPage() - 2 && $page <= $items->currentPage() + 2)
          @if ($page == $items->currentPage())
            <span class="px-4 py-2 text-sm font-bold text-white bg-impost-fourth rounded-lg">
              {{ $page }}
            </span>
          @else
            <a href="{{ $items->url($page) }}"
              class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-white hover:bg-impost-third rounded-lg transition-colors">
              {{ $page }}
            </a>
          @endif
        @endif
      @endforeach

      @if ($items->currentPage() < $items->lastPage() - 2)
        @if ($items->currentPage() < $items->lastPage() - 3)
          <span class="px-2 text-gray-500">...</span>
        @endif
        <a href="{{ $items->url($items->lastPage()) }}"
          class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-white hover:bg-impost-third rounded-lg transition-colors">
          {{ $items->lastPage() }}
        </a>
      @endif
    </div>

    {{-- Next --}}
    @if ($items->hasMorePages())
      <a href="{{ $items->nextPageUrl() }}"
        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-impost-third rounded-lg hover:bg-impost-fourth transition-colors">
        Next
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
    @else
      <span
        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-600 bg-gray-800 rounded-lg cursor-not-allowed">
        Next
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </span>
    @endif
  </div>
@endif
