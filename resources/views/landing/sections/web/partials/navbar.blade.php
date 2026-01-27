<nav id="main-navbar"
  class="fixed w-full z-50 top-0 start-0 border-b border-white/10 backdrop-blur-md transition-all duration-300">
  <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto px-6 py-4">

    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('img/logo_impost_putih.jpg') }}" class="h-10 object-contain" alt="Impost Media Logo">
    </a>

    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <a href="#contact"
        class="hidden md:inline-flex bg-impost-primary text-impost-fifth font-bold px-5 py-2.5 rounded-full hover:brightness-110 transition items-center gap-2 text-sm shadow-[0_0_15px_rgba(212,172,60,0.2)]">
        Konsultasi Gratis
      </a>

      <button id="nav-toggle" data-collapse-toggle="navbar-sticky" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-impost-primary"
        aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>

    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 md:ml-auto md:mr-12"
      id="navbar-sticky">
      <ul
        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-white/10 rounded-lg bg-neutral-900/95 md:bg-transparent md:space-x-12 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
        <li>
          <a href="#home"
            class="block py-2 px-3 text-white font-bold bg-impost-primary rounded md:bg-transparent md:text-impost-primary md:p-0"
            aria-current="page">Home</a>
        </li>
        <li>
          <a href="#problem"
            class="block py-2 px-3 text-gray-300 font-bold rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-impost-primary md:p-0 transition">Our
            Problem</a>
        </li>
        <li>
          <a href="#pricing"
            class="block py-2 px-3 text-gray-300 font-bold rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-impost-primary md:p-0 transition">Pricing</a>
        </li>
        <li>
          <a href="#portfolio"
            class="block py-2 px-3 text-gray-300 font-bold rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-impost-primary md:p-0 transition">Portfolio</a>
        </li>
        <li class="md:hidden mt-4">
          <a href="#contact"
            class="block w-full text-center bg-impost-primary text-impost-fifth font-bold py-3 rounded-lg hover:brightness-110">
            Get Started
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const navElement = document.getElementById('main-navbar');
    const navMenu = document.getElementById('navbar-sticky');
    const navToggle = document.getElementById('nav-toggle');
    const navLinks = navMenu.querySelectorAll('a');

    document.addEventListener('click', function(event) {
      const isMenuOpen = !navMenu.classList.contains('hidden');
      const isClickOutside = !navElement.contains(event.target);

      if (isMenuOpen && isClickOutside) {
        navToggle.click();
      }
    });

    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        if (window.getComputedStyle(navToggle).display !== 'none' && !navMenu.classList.contains(
            'hidden')) {
          navToggle.click();
        }
      });
    });
  });
</script>
