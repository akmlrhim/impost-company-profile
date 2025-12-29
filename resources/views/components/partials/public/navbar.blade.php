<nav class="bg-transparent/30 backdrop-blur-md fixed w-full z-20 top-0 start-0 border-b border-gray-400">
  <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto py-3 sm:py-4 px-6 sm:px-8">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('img/logo_impost_putih.webp') }}" class="h-12 w-auto" loading="lazy" />
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button"
      class="inline-flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 p-1.5 sm:p-2 text-xs sm:text-sm rounded-base md:hidden text-impost-primary hover:bg-white"
      aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5 sm:w-6 sm:h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul
        class="flex flex-col md:flex-row font-medium text-sm md:text-base p-3 md:p-0 mt-3 md:mt-0 md:space-x-3 rtl:space-x-reverse">
        <li>
          <a href="{{ url('/') }}"
            class="relative block py-1.5 md:py-2 px-2 md:px-4 text-white rounded transition-all duration-300 hover:bg-impost-primary/80">
            <span class="relative z-10">Home</span>
          </a>
        </li>

        <li>
          <a href="{{ url('/') }}#about" x-data
            :class="window.location.hash === '#about' && window.location.pathname === '/' ? 'bg-impost-primary' : ''"
            @hashchange.window="$el.classList.toggle('bg-impost-primary', window.location.hash === '#about')"
            class="relative block py-1.5 md:py-2 px-2 md:px-4 text-white rounded transition-all duration-300 hover:bg-impost-primary/80">
            <span class="relative z-10">About</span>
          </a>
        </li>

        <li>
          <a href="{{ url('/') }}#services" x-data
            :class="window.location.hash === '#services' && window.location.pathname === '/' ? 'bg-impost-primary' : ''"
            @hashchange.window="$el.classList.toggle('bg-impost-primary', window.location.hash === '#services')"
            class="relative block py-1.5 md:py-2 px-2 md:px-4 text-white rounded transition-all duration-300 hover:bg-impost-primary/80">
            <span class="relative z-10">Services</span>
          </a>
        </li>

        {{-- dropdown  --}}
        <li x-data="{ open: false }" @click.away="open = false" class="relative">
          <button @click="open = !open" type="button"
            class="flex items-center justify-between w-full py-1.5 md:py-2 px-2 md:px-4 transition-all duration-300 hover:bg-impost-primary/80 rounded font-medium text-white md:w-auto cursor-pointer group"
            :aria-expanded="open" aria-haspopup="true">
            <span>Resource</span>
            <svg class="w-4 h-4 ms-1.5 transition-transform duration-300" :class="{ 'rotate-180': open }"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7" />
            </svg>
          </button>

          <!-- Dropdown Menu -->
          <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" @click="open = false"
            class="absolute left-0 md:left-auto md:right-0 mt-2 w-48 bg-impost-fourth border border-impost-primary/20 rounded-lg shadow-xl overflow-hidden z-50"
            style="display: none;">
            <ul class="py-2 text-sm">
              <li>
                <a href="{{ url('/') }}#blog" x-data
                  :class="window.location.hash === '#blog' && window.location.pathname === '/' ?
                      'bg-impost-primary/20 text-white' : ''"
                  class="flex items-center px-4 py-2.5 text-white hover:bg-impost-primary/80 hover:text-white transition-all duration-200 group">
                  <svg class="w-4 h-4 mr-3 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                  </svg>
                  <span>Blog</span>
                </a>
              </li>
              <li>
                <a href="{{ route('portfolio') }}"
                  class="flex items-center px-4 py-2.5 text-white hover:bg-impost-primary/80 hover:text-white transition-all duration-200 group {{ request()->routeIs('portfolio') ? 'bg-impost-primary/20' : '' }}">
                  <svg class="w-4 h-4 mr-3 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span>Portfolio</span>
                </a>
              </li>
              <li>
                <a href="{{ route('study-case') }}"
                  class="flex items-center px-4 py-2.5 text-white hover:bg-impost-primary/80 hover:text-white transition-all duration-200 group {{ request()->routeIs('study-case') ? 'bg-impost-primary/20' : '' }}">
                  <svg class="w-4 h-4 mr-3 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  <span>Study Case</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li>
          <a href="{{ route('contact') }}"
            class="relative block py-1.5 md:py-2 px-2 md:px-4 text-white rounded hover:bg-impost-primary/80 transition-all duration-300 overflow-hidden group {{ request()->routeIs('contact') ? 'bg-impost-primary text-white' : '' }}">
            <span class="relative z-10">Contact</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
