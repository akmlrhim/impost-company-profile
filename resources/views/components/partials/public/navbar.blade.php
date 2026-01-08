<nav class="fixed top-0 z-50 w-full bg-impost-fifth/10 backdrop-blur-lg border-b border-gray-300">
  <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto py-3 sm:py-4 px-6 sm:px-8">
    <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('img/logo_impost_putih.jpg') }}" class="h-14 w-auto" loading="lazy" />
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
        class="flex flex-col md:flex-row font-medium text-sm md:text-base p-3 md:p-0 mt-3 md:mt-0 md:space-x-3 rtl:space-x-reverse md:items-center">

        <li>
          <a href="{{ url('/') }}" x-data
            :class="window.location.hash === '#home' && window.location.pathname === '/' ? 'bg-impost-primary' : ''"
            @hashchange.window="$el.classList.toggle('bg-impost-primary', window.location.hash === '#home')"
            class="relative block py-1.5 md:py-2 px-2 md:px-4 text-white rounded transition-all duration-300 hover:bg-impost-primary/80">
            <span class="relative z-10">Home</span>
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

        {{-- dropdown our works  --}}
        <li x-data="{ open: false }" @click.away="open = false" class="relative">
          <button @click="open = !open" type="button"
            class="flex items-center justify-between w-full py-2 md:py-2.5 px-3 md:px-5 transition-all duration-300 hover:bg-impost-primary/90 rounded-md font-medium text-white md:w-auto cursor-pointer group"
            :aria-expanded="open" aria-haspopup="true">
            <span class="tracking-wide">Our Works</span>
            <svg class="w-4 h-4 ms-2 transition-transform duration-300 group-hover:translate-y-0.5"
              :class="{ 'rotate-180': open }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7" />
            </svg>
          </button>

          <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2" @click="open = false"
            class="absolute left-0 md:left-auto md:right-0 mt-3 w-56 bg-gradient-to-br from-impost-fourth via-impost-fourth to-impost-fourth/95 border border-impost-primary/30 rounded-xl shadow-2xl overflow-hidden z-50 backdrop-blur-lg"
            style="display: none;">

            <!-- Decorative gradient overlay -->
            <div
              class="absolute inset-0 bg-gradient-to-br from-impost-primary/5 via-transparent to-transparent pointer-events-none">
            </div>

            <ul class="py-2 text-sm relative">
              <li>
                <a href="{{ route('portfolio') }}"
                  class="flex items-center px-5 py-3 text-white/90 hover:text-white hover:bg-gradient-to-r hover:from-impost-primary/20 hover:to-impost-primary/10 transition-all duration-300 group relative overflow-hidden {{ request()->routeIs('portfolio') ? 'bg-impost-primary/15 text-white' : '' }}">

                  <!-- Hover effect background -->
                  <span
                    class="absolute inset-0 bg-gradient-to-r from-impost-primary/0 to-impost-primary/0 group-hover:from-impost-primary/10 group-hover:to-transparent transition-all duration-300"></span>

                  <svg
                    class="w-4 h-4 mr-3.5 opacity-75 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 relative z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span class="font-medium tracking-wide relative z-10">Portfolio</span>

                  <!-- Arrow indicator -->
                  <svg
                    class="w-4 h-4 ml-auto opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 relative z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </li>

              <!-- Divider -->
              <li class="px-4 my-1">
                <div class="border-t border-impost-primary/10"></div>
              </li>

              <li>
                <a href="{{ route('study-case') }}"
                  class="flex items-center px-5 py-3 text-white/90 hover:text-white hover:bg-gradient-to-r hover:from-impost-primary/20 hover:to-impost-primary/10 transition-all duration-300 group relative overflow-hidden {{ request()->routeIs('study-case') ? 'bg-impost-primary/15 text-white' : '' }}">

                  <!-- Hover effect background -->
                  <span
                    class="absolute inset-0 bg-gradient-to-r from-impost-primary/0 to-impost-primary/0 group-hover:from-impost-primary/10 group-hover:to-transparent transition-all duration-300"></span>

                  <svg
                    class="w-4 h-4 mr-3.5 opacity-75 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 relative z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  <span class="font-medium tracking-wide relative z-10">Study Case</span>

                  <!-- Arrow indicator -->
                  <svg
                    class="w-4 h-4 ml-auto opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 relative z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </li>
            </ul>
          </div>
        </li>

        {{-- dropdown company  --}}
        <li x-data="{ open: false }" @click.away="open = false" class="relative">
          <button @click="open = !open" type="button"
            class="flex items-center justify-between w-full py-2 md:py-2.5 px-3 md:px-5 transition-all duration-300 hover:bg-impost-primary/90 rounded-md font-medium text-white md:w-auto cursor-pointer"
            :aria-expanded="open" aria-haspopup="true">
            <span class="tracking-wide">Company</span>
            <svg class="w-4 h-4 ms-2 transition-transform duration-300 group-hover:translate-y-0.5"
              :class="{ 'rotate-180': open }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7" />
            </svg>
          </button>

          <!-- Dropdown Menu -->
          <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2" @click="open = false"
            class="absolute left-0 md:left-auto md:right-0 mt-3 w-56 bg-gradient-to-br from-impost-fourth via-impost-fourth to-impost-fourth/95 border border-impost-primary/30 rounded-xl shadow-2xl overflow-hidden z-50 backdrop-blur-lg"
            style="display: none;">

            <!-- Decorative gradient overlay -->
            <div
              class="absolute inset-0 bg-gradient-to-br from-impost-primary/5 via-transparent to-transparent pointer-events-none">
            </div>

            <ul class="py-2 text-sm relative">
              <!-- Blog -->
              <li>
                <a href="{{ route('article.all') }}"
                  class="flex items-center px-5 py-3 text-white/90 hover:text-white hover:bg-gradient-to-r hover:from-impost-primary/20 hover:to-impost-primary/10 transition-all duration-300 group relative overflow-hidden {{ request()->routeIs('blog') ? 'bg-impost-primary/15 text-white' : '' }}">

                  <span
                    class="absolute inset-0 bg-gradient-to-r from-impost-primary/0 to-impost-primary/0 group-hover:from-impost-primary/10 group-hover:to-transparent transition-all duration-300"></span>

                  <svg
                    class="w-4 h-4 mr-3.5 opacity-75 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 relative z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                  </svg>
                  <span class="font-medium tracking-wide relative z-10">Blog</span>

                  <svg
                    class="w-4 h-4 ml-auto opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 relative z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </li>

              <!-- Divider -->
              <li class="px-4 my-1">
                <div class="border-t border-impost-primary/10"></div>
              </li>

              <!-- About -->
              <li>
                <a href="{{ route('about') }}"
                  class="flex items-center px-5 py-3 text-white/90 hover:text-white hover:bg-gradient-to-r hover:from-impost-primary/20 hover:to-impost-primary/10 transition-all duration-300 group relative overflow-hidden {{ request()->routeIs('about') ? 'bg-impost-primary/15 text-white' : '' }}">

                  <span
                    class="absolute inset-0 bg-gradient-to-r from-impost-primary/0 to-impost-primary/0 group-hover:from-impost-primary/10 group-hover:to-transparent transition-all duration-300"></span>

                  <svg
                    class="w-4 h-4 mr-3.5 opacity-75 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 relative z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="font-medium tracking-wide relative z-10">About</span>

                  <svg
                    class="w-4 h-4 ml-auto opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 relative z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </li>

            </ul>
          </div>
        </li>

        <!-- CTA Button -->
        <li class="md:ml-2">
          <a href="{{ route('contact') }}"
            class="inline-flex items-center gap-2 py-1.5 md:py-2 px-4 md:px-5 bg-impost-primary hover:bg-impost-secondary text-black font-semibold text-sm rounded-md transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-impost-primary/30">
            <span>Get Started</span>
            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
