<nav class="bg-transparent/30 backdrop-blur-md fixed w-full z-20 top-0 start-0 border-b border-gray-400">
  <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto py-1.5 sm:py-2 px-3 sm:px-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('img/logo_impost_putih.webp') }}" class="h-10 sm:h-12 md:h-14 ml-6 sm:ml-12 w-auto"
        loading="lazy" />
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
        class="flex flex-col md:flex-row font-medium text-sm md:text-base p-3 md:p-0 mt-3 md:mt-0 md:space-x-8 rtl:space-x-reverse">
        <li><a href="{{ url('/') }}"
            class="block py-1.5 md:py-0 px-2 md:px-0 text-white rounded hover:text-impost-primary transition-colors">Home</a>
        </li>
        <li><a href="{{ url('/') }}#about"
            class="block py-1.5 md:py-0 px-2 md:px-0 text-white rounded hover:text-impost-primary transition-colors">About</a>
        </li>
        <li><a href="{{ url('/') }}#services"
            class="block py-1.5 md:py-0 px-2 md:px-0 text-white rounded hover:text-impost-primary transition-colors">Services</a>
        </li>
        <li><a href="{{ url('/') }}#blog"
            class="block py-1.5 md:py-0 px-2 md:px-0 text-white rounded hover:text-impost-primary transition-colors">Blog</a>
        </li>
        <li><a href="{{ route('contact') }}"
            class="block py-1.5 md:py-0 px-2 md:px-0 text-white rounded hover:text-impost-primary transition-colors">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
