<nav x-data="{
    mobileMenuOpen: false,
    activeDropdown: null,
    scrolled: false,
    toggleDropdown(name) {
        this.activeDropdown = this.activeDropdown === name ? null : name;
    },
    closeDropdown() {
        this.activeDropdown = null;
    },
    closeAll() {
        this.mobileMenuOpen = false;
        this.activeDropdown = null;
    },
    init() {
        this.scrolled = window.scrollY > 10;
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 10;
        });
    }
}" @click.away="closeDropdown()" @keydown.escape.window="closeAll()"
  :class="scrolled
      ?
      'backdrop-blur-2xl bg-black/40 border-b border-white/10 shadow-[0_8px_30px_rgb(0,0,0,0.5)]' :
      'bg-transparent border-transparent'"
  class="fixed top-0 z-50 w-full transition-all duration-300" role="navigation" aria-label="Main navigation">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-14 md:h-20">

      <div class="flex-shrink-0">
        <a href="{{ route('home') }}" class="flex items-center gap-2" aria-label="Impost - Home">
          <img src="{{ asset('img/logo_original.webp') }}"
            class="h-7 sm:h-10 md:h-12 w-auto object-contain transition-transform hover:scale-105" alt="Impost Logo"
            loading="lazy" width="120" height="48" />
        </a>
      </div>

      @unless (request()->routeIs('landing.promo', 'landing.web'))
        <div class="flex md:hidden">
          <button type="button" @click="mobileMenuOpen = !mobileMenuOpen"
            class="inline-flex items-center justify-center p-1.5 rounded-md text-gray-200 hover:text-white hover:bg-white/10 focus:outline-none transition-colors"
            aria-controls="mobile-menu" :aria-expanded="mobileMenuOpen.toString()" aria-label="Toggle navigation menu">
            <svg x-show="!mobileMenuOpen" class="block h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg x-show="mobileMenuOpen" x-cloak class="block h-5 w-5" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      @endunless

      @unless (request()->routeIs('landing.promo', 'landing.web'))
        <div class="hidden md:flex md:items-center md:gap-6 lg:gap-8">
          <a href="{{ url('/') }}"
            class="relative text-sm font-medium text-gray-200 hover:text-white transition-all duration-300 focus:outline-none px-2 py-1 after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-impost-primary after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:ease-out after:duration-300"
            @if (request()->is('/')) aria-current="page" @endif>
            Home
          </a>

          <a href="{{ url('/') }}#services"
            class="relative text-sm font-medium text-gray-200 hover:text-white transition-all duration-300 focus:outline-none px-2 py-1 after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-impost-primary after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:ease-out after:duration-300">
            Services
          </a>

          <div class="relative" @mouseenter="activeDropdown = 'works'" @mouseleave="closeDropdown()">
            <button @click="toggleDropdown('works')"
              class="relative flex items-center gap-1 text-sm font-medium text-gray-200 hover:text-white transition-all duration-300 focus:outline-none px-2 py-1 after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-impost-primary after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:ease-out after:duration-300"
              :aria-expanded="(activeDropdown === 'works').toString()" aria-haspopup="true" aria-controls="works-menu">
              <span>Our Works</span>
              <svg class="h-4 w-4 transition-transform duration-200"
                :class="{ 'rotate-180': activeDropdown === 'works' }" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div x-show="activeDropdown === 'works'" x-cloak x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
              x-transition:leave-end="opacity-0 translate-y-1" id="works-menu" role="menu" aria-orientation="vertical"
              class="absolute left-1/2 -translate-x-1/2 mt-4 w-48 bg-impost-fifth rounded-xl border border-white/10 shadow-xl overflow-hidden ring-1 ring-black ring-opacity-5 z-50">
              <div class="py-1">
                <a href="{{ route('portfolio') }}" role="menuitem"
                  class="block px-4 py-2.5 text-sm text-gray-200 hover:bg-impost-primary/20 hover:text-white focus:bg-impost-primary/20 focus:text-white focus:outline-none transition-colors {{ request()->routeIs('portfolio') ? 'bg-impost-primary/20 text-white' : '' }}"
                  @if (request()->routeIs('portfolio')) aria-current="page" @endif>
                  Portfolio
                </a>
                <a href="{{ route('study-case') }}" role="menuitem"
                  class="block px-4 py-2.5 text-sm text-gray-200 hover:bg-impost-primary/20 hover:text-white focus:bg-impost-primary/20 focus:text-white focus:outline-none transition-colors border-t border-white/5 {{ request()->routeIs('study-case') ? 'bg-impost-primary/20 text-white' : '' }}"
                  @if (request()->routeIs('study-case')) aria-current="page" @endif>
                  Study Case
                </a>
              </div>
            </div>
          </div>

          <div class="relative" @mouseenter="activeDropdown = 'company'" @mouseleave="closeDropdown()">
            <button @click="toggleDropdown('company')"
              class="relative flex items-center gap-1 text-sm font-medium text-gray-200 hover:text-white transition-all duration-300 focus:outline-none px-2 py-1 after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-impost-primary after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:ease-out after:duration-300"
              :aria-expanded="(activeDropdown === 'company').toString()" aria-haspopup="true"
              aria-controls="company-menu">
              <span>Company</span>
              <svg class="h-4 w-4 transition-transform duration-200"
                :class="{ 'rotate-180': activeDropdown === 'company' }" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div x-show="activeDropdown === 'company'" x-cloak x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
              x-transition:leave-end="opacity-0 translate-y-1" id="company-menu" role="menu"
              aria-orientation="vertical"
              class="absolute left-1/2 -translate-x-1/2 mt-4 w-48 bg-impost-fifth rounded-xl border border-white/10 shadow-xl overflow-hidden ring-1 ring-black ring-opacity-5 z-50">
              <div class="py-1">
                <a href="{{ route('article.all') }}" role="menuitem"
                  class="block px-4 py-2.5 text-sm text-gray-200 hover:bg-impost-primary/20 hover:text-white focus:bg-impost-primary/20 focus:text-white focus:outline-none transition-colors {{ request()->routeIs('article.all') ? 'bg-impost-primary/20 text-white' : '' }}"
                  @if (request()->routeIs('article.all')) aria-current="page" @endif>
                  Blog
                </a>
                <a href="{{ route('about') }}" role="menuitem"
                  class="block px-4 py-2.5 text-sm text-gray-200 hover:bg-impost-primary/20 hover:text-white focus:bg-impost-primary/20 focus:text-white focus:outline-none transition-colors border-t border-white/5 {{ request()->routeIs('about') ? 'bg-impost-primary/20 text-white' : '' }}"
                  @if (request()->routeIs('about')) aria-current="page" @endif>
                  About
                </a>
                <a href="{{ route('contact') }}" role="menuitem"
                  class="block px-4 py-2.5 text-sm text-gray-200 hover:bg-impost-primary/20 hover:text-white focus:bg-impost-primary/20 focus:text-white focus:outline-none transition-colors border-t border-white/5 {{ request()->routeIs('contact') ? 'bg-impost-primary/20 text-white' : '' }}"
                  @if (request()->routeIs('contact')) aria-current="page" @endif>
                  Contact
                </a>
                <a href="{{ route('careers') }}" role="menuitem"
                  class="block px-4 py-2.5 text-sm text-gray-200 hover:bg-impost-primary/20 hover:text-white focus:bg-impost-primary/20 focus:text-white focus:outline-none transition-colors border-t border-white/5 {{ request()->routeIs('careers') ? 'bg-impost-primary/20 text-white' : '' }}"
                  @if (request()->routeIs('careers')) aria-current="page" @endif>
                  Career
                </a>
              </div>
            </div>
          </div>

          <a href="{{ route('vsl-form') }}"
            class="inline-flex items-center justify-center px-5 py-2 text-sm font-bold text-black transition-all duration-300 bg-impost-primary rounded-lg hover:bg-impost-secondary hover:shadow-lg hover:-translate-y-0.5 focus:outline-none"
            aria-label="Get started with Impost">
            Get Started
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </a>
        </div>
      @endunless

    </div>
  </div>

  @unless (request()->routeIs('landing.promo', 'landing.web'))
    <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 -translate-y-2" id="mobile-menu"
      class="md:hidden border-t border-white/10 bg-black/50 backdrop-blur-2xl shadow-2xl">

      <div class="px-4 pt-2 pb-5 space-y-0.5" role="menu" aria-orientation="vertical">
        <a href="{{ url('/') }}" role="menuitem"
          class="block px-3 py-2.5 text-sm font-medium text-white rounded-md hover:bg-white/10 hover:text-impost-primary focus:outline-none focus:bg-white/10 focus:text-impost-primary transition-colors"
          @if (request()->is('/')) aria-current="page" @endif>
          Home
        </a>

        <a href="{{ url('/') }}#services" role="menuitem"
          class="block px-3 py-2.5 text-sm font-medium text-white rounded-md hover:bg-white/10 hover:text-impost-primary focus:outline-none focus:bg-white/10 focus:text-impost-primary transition-colors">
          Services
        </a>

        <div class="space-y-0.5">
          <button @click="toggleDropdown('works')" role="menuitem"
            class="flex w-full items-center justify-between px-3 py-2.5 text-sm font-medium text-white rounded-md hover:bg-white/10 hover:text-impost-primary focus:outline-none focus:bg-white/10 focus:text-impost-primary transition-colors"
            :aria-expanded="(activeDropdown === 'works').toString()" aria-controls="mobile-works-menu">
            <span>Our Works</span>
            <svg class="h-3.5 w-3.5 transition-transform duration-200"
              :class="{ 'rotate-180': activeDropdown === 'works' }" fill="none" viewBox="0 0 24 24"
              stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="activeDropdown === 'works'" x-collapse id="mobile-works-menu" class="pl-4 space-y-0.5"
            role="menu">
            <a href="{{ route('portfolio') }}" role="menuitem"
              class="block px-3 py-2 text-xs font-medium text-gray-300 rounded-md hover:bg-white/5 hover:text-white focus:outline-none focus:bg-white/5 focus:text-white transition-colors"
              @if (request()->routeIs('portfolio')) aria-current="page" @endif>
              Portfolio
            </a>
            <a href="{{ route('study-case') }}" role="menuitem"
              class="block px-3 py-2 text-xs font-medium text-gray-300 rounded-md hover:bg-white/5 hover:text-white focus:outline-none focus:bg-white/5 focus:text-white transition-colors"
              @if (request()->routeIs('study-case')) aria-current="page" @endif>
              Study Case
            </a>
          </div>
        </div>

        <div class="space-y-0.5">
          <button @click="toggleDropdown('company')" role="menuitem"
            class="flex w-full items-center justify-between px-3 py-2.5 text-sm font-medium text-white rounded-md hover:bg-white/10 hover:text-impost-primary focus:outline-none focus:bg-white/10 focus:text-impost-primary transition-colors"
            :aria-expanded="(activeDropdown === 'company').toString()" aria-controls="mobile-company-menu">
            <span>Company</span>
            <svg class="h-3.5 w-3.5 transition-transform duration-200"
              :class="{ 'rotate-180': activeDropdown === 'company' }" fill="none" viewBox="0 0 24 24"
              stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="activeDropdown === 'company'" x-collapse id="mobile-company-menu" class="pl-4 space-y-0.5"
            role="menu">
            <a href="{{ route('article.all') }}" role="menuitem"
              class="block px-3 py-2 text-xs font-medium text-gray-300 rounded-md hover:bg-white/5 hover:text-white focus:outline-none focus:bg-white/5 focus:text-white transition-colors"
              @if (request()->routeIs('article.all')) aria-current="page" @endif>
              Blog
            </a>
            <a href="{{ route('about') }}" role="menuitem"
              class="block px-3 py-2 text-xs font-medium text-gray-300 rounded-md hover:bg-white/5 hover:text-white focus:outline-none focus:bg-white/5 focus:text-white transition-colors"
              @if (request()->routeIs('about')) aria-current="page" @endif>
              About
            </a>
            <a href="{{ route('contact') }}" role="menuitem"
              class="block px-3 py-2 text-xs font-medium text-gray-300 rounded-md hover:bg-white/5 hover:text-white focus:outline-none focus:bg-white/5 focus:text-white transition-colors"
              @if (request()->routeIs('contact')) aria-current="page" @endif>
              Contact
            </a>
            <a href="{{ route('careers') }}" role="menuitem"
              class="block px-3 py-2 text-xs font-medium text-gray-300 rounded-md hover:bg-white/5 hover:text-white focus:outline-none focus:bg-white/5 focus:text-white transition-colors"
              @if (request()->routeIs('careers')) aria-current="page" @endif>
              Career
            </a>
          </div>
        </div>

        <div class="pt-3">
          <a href="{{ route('vsl-form') }}"
            class="flex items-center justify-center w-full px-5 py-2.5 text-sm font-bold text-black bg-impost-primary rounded-lg hover:bg-impost-secondary focus:outline-none transition-colors"
            aria-label="Get started with Impost">
            Get Started
          </a>
        </div>
      </div>
    </div>
  @endunless
</nav>
