<nav class="bg-transparent/30 backdrop-blur-md fixed w-full z-20 top-0 start-0 border-b border-gray-400">
  <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto py-2 px-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('img/logo_impost_putih.png') }}" class="h-16 ml-12 w-auto scale-200 origin-center"
        loading="lazy" />
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-base md:hidden text-impost-primary hover:bg-white"
      aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul
        class="flex flex-col font-medium p-4 md:p-0 mt-4 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
        <li>
          <a href="{{ url('/') }}"
            class="block py-2 px-3 text-white rounded md:bg-transparent md:p-0 md:hover:text-impost-primary transition-colors">Home</a>
        </li>
        <li>
          <a href="{{ url('/') }}#about"
            class="block py-2 px-3 text-white rounded md:bg-transparent md:p-0 md:hover:text-impost-primary transition-colors">About</a>
        </li>
        <li>
          <a href="{{ url('/') }}#services"
            class="block py-2 px-3 text-white rounded md:border-0 hover:text-impost-primary md:p-0 transition-colors">Services</a>
        </li>
        <li>
          <a href="{{ url('/') }}#blog"
            class="block py-2 px-3 text-white rounded md:border-0 md:hover:text-impost-primary md:p-0 transition-colors">Our
            Blog</a>
        </li>
        <li>
          <a href="{{ url('/') }}#contact"
            class="block py-2 px-3 text-white rounded md:border-0 md:hover:text-impost-primary md:p-0 transition-colors">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
