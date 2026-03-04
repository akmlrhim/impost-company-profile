<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-[100dvh] transition-transform -translate-x-full bg-gray-900 border-r border-gray-800 md:translate-x-0"
  aria-label="Sidebar">

  <div class="flex flex-col h-full bg-gray-900">

    <div class="flex-shrink-0 py-5 px-4 bg-gray-900 z-10 border-b border-gray-800/50">
      <a href="{{ route('dashboard') }}" class="flex items-center ps-2">
        <img src="{{ asset('img/logo_original.webp') }}" class="mr-3 h-10 md:h-12 object-contain" alt="Logo" />
        <span class="text-white font-bold">IMPOST MEDIA</span>
      </a>
    </div>

    <div class="flex-1 overflow-y-auto px-3 py-4 no-scrollbar">
      <ul class="space-y-1 font-medium text-sm text-gray-300 pb-4">

        <li>
          <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-5 shrink-0">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <span class="ms-3">Dashboard</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('articles.index') }}" :active="request()->routeIs('articles.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="size-5 shrink-0">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
              <polyline points="14 2 14 8 20 8" />
              <line x1="16" x2="8" y1="13" y2="13" />
              <line x1="16" x2="8" y1="17" y2="17" />
              <polyline points="10 9 9 9 8 9" />
            </svg>
            <span class="ms-3">Artikel</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('portfolio.index') }}" :active="request()->routeIs('portfolio.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="size-5 shrink-0">
              <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
              <circle cx="9" cy="9" r="2" />
              <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
            </svg>
            <span class="ms-3">Portfolio</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('services.index') }}" :active="request()->routeIs('services.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="size-5 shrink-0">
              <path
                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
              <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
              <line x1="12" y1="22.08" x2="12" y2="12" />
            </svg>
            <span class="ms-3">Layanan</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('study-case.index') }}" :active="request()->routeIs('study-case.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="size-5 shrink-0">
              <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
              <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
            </svg>
            <span class="ms-3">Study Case</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('teams.index') }}" :active="request()->routeIs('teams.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="size-5 shrink-0">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
              <circle cx="9" cy="7" r="4" />
              <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            <span class="ms-3">Tim</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('clients.index') }}" :active="request()->routeIs('clients.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="size-5 shrink-0">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
              <circle cx="9" cy="7" r="4" />
              <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            <span class="ms-3">Klien</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('testimonials.index') }}" :active="request()->routeIs('testimonials.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="size-5 shrink-0">
              <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
            </svg>
            <span class="ms-3">Testimoni</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('article-categories.index') }}" :active="request()->routeIs('article-categories.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="size-5 shrink-0">
              <path d="M3 6h18" />
              <path d="M7 12h10" />
              <path d="M10 18h4" />
            </svg>
            <span class="ms-3">Kategori Artikel</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('portfolio-categories.index') }}" :active="request()->routeIs('portfolio-categories.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="size-5 shrink-0">
              <path d="M3 6h18" />
              <path d="M7 12h10" />
              <path d="M10 18h4" />
            </svg>
            <span class="ms-3">Kategori Portfolio</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('jobvacancies.index') }}" :active="request()->routeIs('jobvacancies.*')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-briefcase-business-icon lucide-briefcase-business">
              <path d="M12 12h.01" />
              <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
              <path d="M22 13a18.15 18.15 0 0 1-20 0" />
              <rect width="20" height="14" x="2" y="6" rx="2" />
            </svg>
            <span class="ms-3">Loker</span>
          </x-nav-link>
        </li>

        <li class="h-4"></li>
      </ul>
    </div>

    <div class="flex-shrink-0 border-t border-gray-800 bg-gray-900 p-4 pb-safe">

      <div class="flex items-center mb-4">
        <div class="flex-shrink-0">
          <div
            class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center text-gray-300 font-bold border border-gray-600 ring-2 ring-gray-800">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
          </div>
        </div>
        <div class="ml-3 min-w-0 overflow-hidden">
          <p class="text-sm font-semibold text-white truncate">
            {{ Auth::user()->name }}
          </p>
          <p class="text-xs text-gray-400 truncate">
            {{ Auth::user()->email }}
          </p>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-2">

        <a href="{{ route('profile') }}"
          class="flex items-center justify-center py-2.5 px-2 text-xs font-medium text-gray-300 bg-gray-800 hover:bg-gray-700 rounded-lg border border-gray-700 transition-colors duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
            <circle cx="12" cy="7" r="4" />
          </svg>
          Profile
        </a>

        <form method="POST" action="{{ route('logout') }}" class="w-full">
          @csrf
          <button type="submit"
            class="w-full flex items-center justify-center py-2.5 px-2 text-xs font-medium text-red-200 bg-red-900/40 hover:bg-red-900/60 border border-red-900/50 rounded-lg transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="mr-2">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
              <polyline points="16 17 21 12 16 7" />
              <line x1="21" y1="12" x2="9" y2="12" />
            </svg>
            Logout
          </button>
        </form>
      </div>

    </div>

  </div>
</aside>
