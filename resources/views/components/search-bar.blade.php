<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-4 mb-4 sm:mb-6">

  <form method="GET" action="{{ $searchRoute }}" class="w-full sm:max-w-sm">
    <div class="relative flex">

      <input type="text" name="{{ $name }}" value="{{ request($name) }}" placeholder="{{ $placeholder }}"
        autocomplete="off"
        class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 sm:px-4 sm:py-2.5 pr-16 sm:pr-20 text-xs sm:text-sm text-gray-700 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition">

      <span class="absolute inset-y-0 right-8 sm:right-10 flex items-center text-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m21 21-4.35-4.35m1.6-5.15a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
        </svg>
      </span>

      @if (request($name))
        <a href="{{ $searchRoute }}"
          class="absolute inset-y-0 right-2 flex items-center text-gray-400 hover:text-red-500 transition"
          title="Reset pencarian">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </a>
      @endif

    </div>
  </form>

  @if ($addRoute)
    <a href="{{ $addRoute }}"
      class="inline-flex items-center justify-center rounded-md bg-blue-600 px-3 py-2 sm:px-4 sm:py-2.5 text-xs sm:text-sm font-medium text-white hover:bg-blue-700 transition">
      {{ $addLabel }}
    </a>
  @endif

</div>
