<nav
  class="fixed top-0 z-30 w-full bg-gray-900 border-b border-gray-800 transition-all duration-300
         left-0 right-0 lg:left-64">

  <div class="flex items-center justify-between px-3 sm:px-4 lg:px-6 h-14 sm:h-16">

    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
      class="inline-flex md:hidden items-center justify-center w-10 h-10
             text-gray-300 rounded-lg hover:bg-gray-800
             focus:outline-none focus:ring-2 focus:ring-gray-700
             transition-colors">

      <span class="sr-only">Open sidebar</span>

      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75z" />
      </svg>
    </button>

    <div class="flex-1"></div>

    <div class="flex items-center gap-2 sm:gap-3 max-w-full">

      <div
        class="hidden sm:flex items-center justify-center w-9 h-9 lg:w-10 lg:h-10
               rounded-full bg-gray-800 text-gray-300 flex-shrink-0">
        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
        </svg>
      </div>

      <div class="flex flex-col leading-tight min-w-0">
        <span
          class="text-sm sm:text-base font-semibold text-white
                 truncate max-w-[160px] sm:max-w-[220px] lg:max-w-none">
          {{ Auth::user()->name }}
        </span>

        <span
          class="text-xs sm:text-sm text-gray-400
                 truncate max-w-[160px] sm:max-w-[220px] lg:max-w-none">
          {{ Auth::user()->email }}
        </span>
      </div>

      <button type="button"
        class="hidden lg:flex items-center justify-center w-8 h-8
               text-gray-400 hover:text-gray-300
               rounded-lg hover:bg-gray-800
               transition-colors flex-shrink-0">

        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

    </div>
  </div>
</nav>
