<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-gray-900 border-r border-gray-800 md:translate-x-0"
  aria-label="Sidebar">
  <div class="flex flex-col h-full bg-gray-900">

    <div class="py-5 px-3">
      <a href="{{ route('dashboard') }}" class="flex items-center ps-2">
        <img src="{{ asset('img/logo_impost_putih.webp') }}" class="mr-3 h-16" alt="Logo" />
      </a>
    </div>

    <div class="flex-1 overflow-y-auto py-2 px-3 no-scrollbar">
      <ul class="space-y-2 font-medium text-md text-gray-300">

        <li>
          <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <span class="ms-2">Dashboard</span>
          </x-nav-link>
        </li>

        {{-- CMS Dropdown --}}
        <li>
          <button type="button"
            class="w-full flex items-center justify-between p-2 text-white rounded-sm hover:bg-gray-800 hover:text-white cursor-pointer"
            onclick="document.getElementById('cms-dropdown').classList.toggle('hidden')">
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
              </svg>
              <span class="ms-2">CMS</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-4 transition-transform">
              <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
          </button>

          <ul id="cms-dropdown" class="hidden text-sm mt-1 ml-4">
            <li>
              <x-nav-link href="{{ route('services.index') }}" :active="request()->routeIs('services.*')">
                <span class="ms-2">Layanan</span>
              </x-nav-link>
            </li>

            <li>
              <x-nav-link href="{{ route('articles.index') }}" :active="request()->routeIs('articles.*')">
                <span class="ms-2">Artikel</span>
              </x-nav-link>
            </li>

            <li>
              <x-nav-link href="{{ route('teams.index') }}" :active="request()->routeIs('teams.*')">
                <span class="ms-2">Tim</span>
              </x-nav-link>
            </li>

            <li>
              <x-nav-link href="{{ route('clients.index') }}" :active="request()->routeIs('clients.*')">
                <span class="ms-2">Klien</span>
              </x-nav-link>
            </li>

            <li>
              <x-nav-link href="{{ route('portfolio.index') }}" :active="request()->routeIs('portfolio.*')">
                <span class="ms-2">Portfolio</span>
              </x-nav-link>
            </li>

            <li>
              <x-nav-link href="{{ route('study-case.index') }}" :active="request()->routeIs('study-case.*')">
                <span class="ms-2">Study Case</span>
              </x-nav-link>
            </li>

            <li>
              <x-nav-link href="{{ route('testimonials.index') }}" :active="request()->routeIs('testimonials.*')">
                <span class="ms-2">Testimoni</span>
              </x-nav-link>
            </li>

            <li>
              <x-nav-link href="{{ route('jobpostings.index') }}" :active="request()->routeIs('jobpostings.*')">
                <span class="ms-2">Loker</span>
              </x-nav-link>
            </li>
          </ul>
        </li>

        {{-- Category Dropdown --}}
        <li>
          <button type="button"
            class="w-full flex items-center justify-between p-2 text-white rounded-sm hover:bg-gray-800 hover:text-white cursor-pointer"
            onclick="document.getElementById('ctg-dropdown').classList.toggle('hidden')">
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-list-indent-increase-icon lucide-list-indent-increase size-5">
                <path d="M21 5H11" />
                <path d="M21 12H11" />
                <path d="M21 19H11" />
                <path d="m3 8 4 4-4 4" />
              </svg>
              <span class="ms-2">Kategori</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-4 transition-transform">
              <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
          </button>

          <ul id="ctg-dropdown" class="hidden text-sm mt-1 ml-4">
            <li>
              <x-nav-link href="{{ route('article-categories.index') }}" :active="request()->routeIs('article-categories.*')">
                <span class="ms-2">Artikel</span>
              </x-nav-link>
            </li>

            <li>
              <x-nav-link href="{{ route('portfolio-categories.index') }}" :active="request()->routeIs('portfolio-categories.*')">
                <span class="ms-2">Portfolio</span>
              </x-nav-link>
            </li>
          </ul>
        </li>

        <li>
          <x-nav-link href="{{ route('leads.index') }}" :active="request()->routeIs('leads.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-book-user-icon lucide-book-user size-5">
              <path d="M15 13a3 3 0 1 0-6 0" />
              <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
              <circle cx="12" cy="8" r="2" />
            </svg>
            <span class="ms-2">Leads</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            <span class="ms-2">Users</span>
          </x-nav-link>
        </li>

      </ul>
    </div>

    <div class="border-t border-gray-800 py-4 px-3">
      <div class="flex items-center px-2 mb-3">
        <div class="flex-shrink-0">
          <div class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center text-gray-300 font-semibold">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
          </div>
        </div>
        <div class="ml-3 flex-1 min-w-0">
          <p class="text-sm font-medium text-white truncate">
            {{ Auth::user()->name }}
          </p>
          <p class="text-xs text-gray-400 truncate">
            {{ Auth::user()->email }}
          </p>
        </div>
      </div>

      <button type="button" onclick="window.location.href='{{ route('profile') }}'"
        class="w-full flex items-center p-2 text-gray-300 rounded-sm hover:bg-gray-800 hover:text-white cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-user-pen-icon lucide-user-pen">
          <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
          <path
            d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
          <circle cx="10" cy="7" r="4" />
        </svg>
        <span class="ms-2">Profile</span>
      </button>

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
    </div>

  </div>
</aside>
