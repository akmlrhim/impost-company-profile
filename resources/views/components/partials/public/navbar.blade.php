<nav x-data="{ mobileOpen: false }"
  class="fixed top-0 z-[999] w-full bg-impost-fifth/80 backdrop-blur-lg border-b border-gray-300">

  <div class="max-w-7xl flex items-center justify-between mx-auto py-2 sm:py-4 px-4 sm:px-8">

    <a href="{{ route('home') }}" class="flex items-center z-50">
      <img src="{{ asset('img/logo_impost_putih.jpg') }}" class="h-7 sm:h-10 md:h-14 w-auto" loading="lazy" />
    </a>

    <button @click="mobileOpen = !mobileOpen"
      class="inline-flex items-center justify-center w-10 h-10 text-white md:hidden bg-black/30 hover:bg-black/50 rounded-lg transition z-50">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <div x-show="mobileOpen" x-transition @click.away="mobileOpen = false"
      class="absolute md:static top-full left-0 w-full md:w-auto bg-impost-fifth md:bg-transparent md:block">

      <ul class="flex flex-col md:flex-row gap-1 md:gap-0 p-4 md:p-0 text-sm md:text-base">

        <li>
          <a href="{{ url('/') }}" class="block py-2 px-4 rounded text-white hover:bg-impost-primary/80">
            Home
          </a>
        </li>

        <li>
          <a href="{{ url('/') }}#services" class="block py-2 px-4 rounded text-white hover:bg-impost-primary/80">
            Services
          </a>
        </li>

        <li x-data="{ open: false }" class="relative">
          <button @click="open = !open"
            class="flex items-center justify-between w-full py-2 px-4 text-white hover:bg-impost-primary/80 rounded-md">
            <span>Our Works</span>
            <svg class="w-4 h-4 ms-2 transition-transform" :class="{ 'rotate-180': open }" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
            </svg>
          </button>

          <div x-show="open" x-transition
            class="md:absolute relative left-0 mt-1 md:mt-3 w-full md:w-56 bg-impost-fourth border border-impost-primary/30 rounded-xl shadow-2xl overflow-hidden z-50">
            <ul class="py-1 md:py-2 text-sm">
              <li>
                <a href="{{ route('portfolio') }}" class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20">
                  Portfolio
                </a>
              </li>
              <li>
                <a href="{{ route('study-case') }}"
                  class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20 border-t border-impost-primary/10">
                  Study Case
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li x-data="{ open: false }" class="relative">
          <button @click="open = !open"
            class="flex items-center justify-between w-full py-2 px-4 text-white hover:bg-impost-primary/80 rounded-md">
            <span>Company</span>
            <svg class="w-4 h-4 ms-2 transition-transform" :class="{ 'rotate-180': open }" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
            </svg>
          </button>

          <div x-show="open" x-transition
            class="md:absolute relative left-0 mt-1 md:mt-3 w-full md:w-56 bg-impost-fourth border border-impost-primary/30 rounded-xl shadow-2xl overflow-hidden z-50">
            <ul class="py-1 md:py-2 text-sm">
              <li>
                <a href="{{ route('article.all') }}" class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20">
                  Blog
                </a>
              </li>
              <li>
                <a href="{{ route('about') }}"
                  class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20 border-t border-impost-primary/10">
                  About
                </a>
              </li>
              <li>
                <a href="{{ route('contact') }}"
                  class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20 border-t border-impost-primary/10">
                  Contact
                </a>
              </li>
              <li>
                <a href="{{ route('careers') }}"
                  class="block px-5 py-3 text-white/90 hover:bg-impost-primary/20 border-t border-impost-primary/10">
                  Career
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="pt-3 md:pt-0 md:ml-2">
          <a href="{{ route('contact') }}"
            class="block text-center py-2.5 px-5 bg-impost-primary hover:bg-impost-secondary text-black font-bold rounded-md transition">
            Get Started
          </a>
        </li>

      </ul>
    </div>

  </div>
</nav>
