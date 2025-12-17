<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-gray-900 border-r border-gray-800 md:translate-x-0"
  aria-label="Sidebar">
  <div class="overflow-y-auto py-5 px-3 h-full bg-gray-900">

    <a href="{{ route('dashboard') }}" class="flex items-center mb-6 ps-2">
      <img src="{{ asset('img/logo_impost_putih.png') }}" class="mr-3 h-16" alt="Logo Dark" />
      <span class="text-md font-extrabold text-white">ADMINISTRATOR</span>
    </a>

    <ul class="space-y-2 font-sans font-medium text-md text-gray-300">

      <li>
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
          class="hover:bg-gray-800 text-gray-300 hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
          </svg>

          <span class="ms-2">Dashboard</span>
        </x-nav-link>
      </li>

      <li>
        <x-nav-link href="{{ route('services.index') }}" :active="request()->routeIs('services.*')"
          class="hover:bg-gray-800 text-gray-300 hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
          </svg>

          <span class="ms-2">Layanan</span>
        </x-nav-link>
      </li>

      <li>
        <x-nav-link href="{{ route('articles.index') }}" :active="request()->routeIs('articles.*')"
          class="hover:bg-gray-800 text-gray-300 hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
          </svg>
          <span class="ms-2">Artikel</span>
        </x-nav-link>
      </li>

      {{-- logout  --}}
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
            class="w-full flex items-center p-2 text-gray-300 rounded-sm hover:bg-gray-800 hover:text-white cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-log-out-icon lucide-log-out">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
              <polyline points="16 17 21 12 16 7" />
              <line x1="21" y1="12" x2="9" y2="12" />
            </svg>
            <span class="ms-2">Logout</span>
          </button>
        </form>
      </li>


    </ul>
  </div>
</aside>
