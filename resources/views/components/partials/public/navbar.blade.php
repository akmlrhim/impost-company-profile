<nav x-data="{
    mobileMenuOpen: false,
    activeDropdown: null,
    scrolled: false,
    toggleDropdown(name) { this.activeDropdown = this.activeDropdown === name ? null : name; },
    closeDropdown() { this.activeDropdown = null; },
    closeAll() {
        this.mobileMenuOpen = false;
        this.activeDropdown = null;
    },
    init() {
        this.scrolled = window.scrollY > 20;
        window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 20; });
    }
}" @click.away="closeDropdown()" @keydown.escape.window="closeAll()"
  class="fixed top-0 z-50 w-full transition-all duration-300"
  :class="scrolled
      ?
      'bg-impost-fifth/85 backdrop-blur-2xl border-b border-white/10 shadow-[0_8px_30px_rgba(0,0,0,0.5)]' :
      'bg-transparent border-b border-transparent'"
  role="navigation" aria-label="Main navigation">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16 md:h-20">

      {{-- Logo --}}
      <div class="flex-shrink-0">
        <a href="{{ route('home') }}" aria-label="Impost – Home">
          <img src="{{ asset('img/logo_original.webp') }}" class="h-8 sm:h-10 md:h-11 w-auto object-contain"
            alt="Impost Logo" loading="lazy" width="120" height="44" />
        </a>
      </div>

      {{-- Mobile hamburger --}}
      @unless (request()->routeIs('landing.promo', 'landing.web'))
        <div class="flex md:hidden">
          <button type="button" @click="mobileMenuOpen = !mobileMenuOpen"
            class="p-2 rounded-full text-white/80 hover:text-white hover:bg-white/10 transition-colors focus:outline-none"
            :aria-expanded="mobileMenuOpen.toString()" aria-label="Toggle menu">
            <svg x-show="!mobileMenuOpen" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg x-show="mobileMenuOpen" x-cloak class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      @endunless

      {{-- Desktop nav --}}
      @unless (request()->routeIs('landing.promo', 'landing.web'))
        <div class="hidden md:flex md:items-center md:gap-1 lg:gap-2">

          <a href="{{ url('/') }}"
            class="px-3 py-1.5 rounded-full text-sm font-semibold transition-colors duration-200
              {{ request()->is('/') ? 'bg-white/10 text-white' : 'text-white hover:text-white hover:bg-white/8' }}"
            @if (request()->is('/')) aria-current="page" @endif>
            Home
          </a>

          <a href="{{ url('/') }}#services"
            class="px-3 py-1.5 rounded-full text-sm font-semibold text-white hover:text-white hover:bg-white/8 transition-colors duration-200">
            Services
          </a>

          {{-- Our Works dropdown --}}
          <div class="relative" @mouseenter="activeDropdown='works'" @mouseleave="closeDropdown()">
            <button @click="toggleDropdown('works')"
              class="flex items-center gap-1 px-3 py-1.5 rounded-full text-sm font-semibold transition-colors duration-200
                {{ request()->routeIs('portfolio', 'study-case') ? 'bg-white/10 text-white' : 'text-white hover:text-white hover:bg-white/8' }}"
              :aria-expanded="(activeDropdown === 'works').toString()">
              <span>Our Works</span>
              <svg class="h-3.5 w-3.5 transition-transform duration-200"
                :class="{ 'rotate-180': activeDropdown === 'works' }" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="activeDropdown==='works'" x-cloak x-transition:enter="transition ease-out duration-150"
              x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0"
              x-transition:leave-end="opacity-0 translate-y-1"
              class="absolute left-1/2 -translate-x-1/2 mt-2 w-44 bg-impost-fifth border border-white/10 rounded-xl shadow-[0_16px_40px_rgba(0,0,0,0.6)] overflow-hidden z-50">
              <a href="{{ route('portfolio') }}"
                class="block px-4 py-2.5 text-sm font-medium transition-colors
                  {{ request()->routeIs('portfolio') ? 'bg-white/10 text-white' : 'text-white hover:bg-white/8 hover:text-white' }}">
                Portfolio
              </a>
              <a href="{{ route('study-case') }}"
                class="block px-4 py-2.5 text-sm font-medium border-t border-white/5 transition-colors
                  {{ request()->routeIs('study-case') ? 'bg-white/10 text-white' : 'text-white hover:bg-white/8 hover:text-white' }}">
                Study Case
              </a>
            </div>
          </div>

          {{-- Company dropdown --}}
          <div class="relative" @mouseenter="activeDropdown='company'" @mouseleave="closeDropdown()">
            <button @click="toggleDropdown('company')"
              class="flex items-center gap-1 px-3 py-1.5 rounded-full text-sm font-semibold transition-colors duration-200
                {{ request()->routeIs('article.all', 'about', 'contact', 'careers') ? 'bg-white/10 text-white' : 'text-white hover:text-white hover:bg-white/8' }}"
              :aria-expanded="(activeDropdown === 'company').toString()">
              <span>Company</span>
              <svg class="h-3.5 w-3.5 transition-transform duration-200"
                :class="{ 'rotate-180': activeDropdown === 'company' }" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div x-show="activeDropdown==='company'" x-cloak x-transition:enter="transition ease-out duration-150"
              x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0"
              x-transition:leave-end="opacity-0 translate-y-1"
              class="absolute left-1/2 -translate-x-1/2 mt-2 w-44 bg-impost-fifth border border-white/10 rounded-xl shadow-[0_16px_40px_rgba(0,0,0,0.6)] overflow-hidden z-50">
              <a href="{{ route('article.all') }}"
                class="block px-4 py-2.5 text-sm font-medium transition-colors
                  {{ request()->routeIs('article.all') ? 'bg-white/10 text-white' : 'text-white hover:bg-white/8 hover:text-white' }}">
                Blog
              </a>
              <a href="{{ route('about') }}"
                class="block px-4 py-2.5 text-sm font-medium border-t border-white/5 transition-colors
                  {{ request()->routeIs('about') ? 'bg-white/10 text-white' : 'text-white hover:bg-white/8 hover:text-white' }}">
                About
              </a>
              <a href="{{ route('contact') }}"
                class="block px-4 py-2.5 text-sm font-medium border-t border-white/5 transition-colors
                  {{ request()->routeIs('contact') ? 'bg-white/10 text-white' : 'text-white hover:bg-white/8 hover:text-white' }}">
                Contact
              </a>
              <a href="{{ route('careers') }}"
                class="block px-4 py-2.5 text-sm font-medium border-t border-white/5 transition-colors
                  {{ request()->routeIs('careers') ? 'bg-white/10 text-white' : 'text-white hover:bg-white/8 hover:text-white' }}">
                Career
              </a>
            </div>
          </div>

          <a href="{{ route('vsl-form') }}"
            class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-5 py-2.5 bg-impost-primary text-impost-fifth hover:bg-impost-secondary transition-colors duration-150 cursor-pointer whitespace-nowrap ml-2"
            aria-label="Mulai konsultasi">
            Mulai Sekarang
          </a>
        </div>
      @endunless

    </div>
  </div>

  {{-- Mobile menu --}}
  @unless (request()->routeIs('landing.promo', 'landing.web'))
    <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 -translate-y-2"
      class="md:hidden border-t border-white/10 bg-impost-fifth/95 backdrop-blur-2xl shadow-2xl">

      <div class="px-4 pt-2 pb-5 space-y-0.5">
        <a href="{{ url('/') }}"
          class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition-colors
            {{ request()->is('/') ? 'bg-white/10 text-white' : 'text-white hover:bg-white/8 hover:text-white' }}"
          @if (request()->is('/')) aria-current="page" @endif>
          Home
        </a>
        <a href="{{ url('/') }}#services"
          class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/8 hover:text-white transition-colors">
          Services
        </a>

        {{-- Works --}}
        <div>
          <button @click="toggleDropdown('works')"
            class="flex w-full items-center justify-between px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/8 hover:text-white transition-colors focus:outline-none">
            <span>Our Works</span>
            <svg class="h-3.5 w-3.5 transition-transform duration-200"
              :class="{ 'rotate-180': activeDropdown === 'works' }" fill="none" viewBox="0 0 24 24"
              stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="activeDropdown==='works'" x-collapse class="pl-4 mt-0.5 space-y-0.5">
            <a href="{{ route('portfolio') }}"
              class="block px-4 py-2 rounded-lg text-sm text-white/60 hover:bg-white/6 hover:text-white transition-colors">Portfolio</a>
            <a href="{{ route('study-case') }}"
              class="block px-4 py-2 rounded-lg text-sm text-white/60 hover:bg-white/6 hover:text-white transition-colors">Study
              Case</a>
          </div>
        </div>

        {{-- Company --}}
        <div>
          <button @click="toggleDropdown('company')"
            class="flex w-full items-center justify-between px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/8 hover:text-white transition-colors focus:outline-none">
            <span>Company</span>
            <svg class="h-3.5 w-3.5 transition-transform duration-200"
              :class="{ 'rotate-180': activeDropdown === 'company' }" fill="none" viewBox="0 0 24 24"
              stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="activeDropdown==='company'" x-collapse class="pl-4 mt-0.5 space-y-0.5">
            <a href="{{ route('article.all') }}"
              class="block px-4 py-2 rounded-lg text-sm text-white/60 hover:bg-white/6 hover:text-white transition-colors">Blog</a>
            <a href="{{ route('about') }}"
              class="block px-4 py-2 rounded-lg text-sm text-white/60 hover:bg-white/6 hover:text-white transition-colors">About</a>
            <a href="{{ route('contact') }}"
              class="block px-4 py-2 rounded-lg text-sm text-white/60 hover:bg-white/6 hover:text-white transition-colors">Contact</a>
            <a href="{{ route('careers') }}"
              class="block px-4 py-2 rounded-lg text-sm text-white/60 hover:bg-white/6 hover:text-white transition-colors">Career</a>
          </div>
        </div>

        <div class="pt-3">
          <a href="{{ route('vsl-form') }}"
            class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5 bg-impost-primary text-impost-fifth hover:bg-impost-secondary transition-colors duration-150 cursor-pointer whitespace-nowrap w-full">Mulai
            Sekarang</a>
        </div>
      </div>
    </div>
  @endunless
</nav>
