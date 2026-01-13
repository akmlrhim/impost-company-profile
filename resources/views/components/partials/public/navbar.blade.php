<nav class="fixed top-0 z-50 w-full bg-impost-fifth/10 backdrop-blur-lg border-b border-gray-300">
  <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto py-2 sm:py-4 px-4 sm:px-8">

    <a href="{{ route('home') }}" class="flex items-center">
      <img src="{{ asset('img/logo_impost_putih.jpg') }}" class="h-7 sm:h-10 md:h-14 w-auto transition-all duration-300"
        loading="lazy" />
    </a>

    <button data-collapse-toggle="navbar-dropdown" type="button"
      class="inline-flex items-center justify-center w-8 h-8 p-1 text-impost-primary rounded-md md:hidden hover:bg-white/10 focus:outline-none"
      aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
      </svg>
    </button>

    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul
        class="flex flex-col md:flex-row font-medium text-sm md:text-base p-4 md:p-0 mt-4 md:mt-0 space-y-1 md:space-y-0 md:space-x-3 rtl:space-x-reverse md:items-center">

        <li>
          <a href="{{ url('/') }}"
            class="block py-2 px-4 rounded transition-all duration-300 hover:bg-impost-primary/80">
            Home
          </a>
        </li>

        <li>
          <a href="{{ url('/') }}#services"
            class="block py-2 px-4 rounded transition-all duration-300 hover:bg-impost-primary/80">
            Services
          </a>
        </li>

        <li x-data="{ open: false }" @click.away="open = false" class="relative">
          <button @click="open = !open" type="button"
            class="flex items-center justify-between w-full py-2 px-4 transition-all duration-300 hover:bg-impost-primary/90 rounded-md text-white group">
            <span>Our Works</span>
            <svg class="w-4 h-4 ms-2 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
            </svg>
          </button>

          <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 md:-translate-y-2" x-transition:enter-end="opacity-100 md:translate-y-0"
            class="md:absolute relative left-0 md:right-0 mt-1 md:mt-3 w-full md:w-56 bg-impost-fourth border border-impost-primary/30 rounded-xl shadow-2xl overflow-hidden z-50 backdrop-blur-lg"
            style="display: none;">
            <ul class="py-1 md:py-2 text-sm">
              <li>
                <a href="{{ route('portfolio') }}"
                  class="flex items-center px-5 py-3 text-white/90 hover:bg-impost-primary/20 transition-colors {{ request()->routeIs('portfolio') ? 'bg-impost-primary/20' : '' }}">
                  Portfolio
                </a>
              </li>
              <li>
                <a href="{{ route('study-case') }}"
                  class="flex items-center px-5 py-3 text-white/90 hover:bg-impost-primary/20 border-t border-impost-primary/10 transition-colors {{ request()->routeIs('study-case') ? 'bg-impost-primary/20' : '' }}">
                  Study Case
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li x-data="{ open: false }" @click.away="open = false" class="relative">
          <button @click="open = !open" type="button"
            class="flex items-center justify-between w-full py-2 px-4 transition-all duration-300 hover:bg-impost-primary/90 rounded-md text-white">
            <span>Company</span>
            <svg class="w-4 h-4 ms-2 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
            </svg>
          </button>

          <div x-show="open"
            class="md:absolute relative left-0 md:right-0 mt-1 md:mt-3 w-full md:w-56 bg-impost-fourth border border-impost-primary/30 rounded-xl shadow-2xl overflow-hidden z-50"
            style="display: none;">
            <ul class="py-1 md:py-2 text-sm">
              <li><a href="{{ route('article.all') }}"
                  class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20 transition-colors {{ request()->routeIs('article.all') ? 'bg-impost-primary/20' : '' }}">Blog</a>
              </li>
              <li><a href="{{ route('about') }}"
                  class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20 border-t border-impost-primary/10 transition-colors {{ request()->routeIs('about') ? 'bg-impost-primary/20' : '' }}">About</a>
              </li>
              <li><a href="{{ route('contact') }}"
                  class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20 border-t border-impost-primary/10 transition-colors {{ request()->routeIs('contact') ? 'bg-impost-primary/20' : '' }}">Contact</a>
              </li>
              <li><a href="{{ route('careers') }}"
                  class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20 border-t border-impost-primary/10 transition-colors {{ request()->routeIs('careers') ? 'bg-impost-primary/20' : '' }}">Career</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="pt-4 md:pt-0 md:ml-2">
          <a href="{{ route('vsl-form') }}"
            class="flex items-center justify-center gap-2 py-2.5 px-5 bg-impost-primary hover:bg-impost-secondary text-black font-bold text-sm rounded-md transition-all duration-300 w-full md:w-auto shadow-md">
            <span>Get Started</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
