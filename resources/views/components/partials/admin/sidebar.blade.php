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
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard">
            <rect width="7" height="9" x="3" y="3" rx="1" />
            <rect width="7" height="5" x="14" y="3" rx="1" />
            <rect width="7" height="9" x="14" y="12" rx="1" />
            <rect width="7" height="5" x="3" y="16" rx="1" />
          </svg>
          <span class="ms-2">Dashboard</span>
        </x-nav-link>
      </li>

      <li>
        <x-nav-link href="{{ route('services.index') }}" :active="request()->routeIs('services.*')"
          class="hover:bg-gray-800 text-gray-300 hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-monitor-cloud-icon lucide-monitor-cloud">
            <path d="M11 13a3 3 0 1 1 2.83-4H14a2 2 0 0 1 0 4z" />
            <path d="M12 17v4" />
            <path d="M8 21h8" />
            <rect x="2" y="3" width="20" height="14" rx="2" />
          </svg>
          <span class="ms-2">Layanan</span>
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
