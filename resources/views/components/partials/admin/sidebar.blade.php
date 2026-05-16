<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-[100dvh] flex flex-col
    -translate-x-full md:translate-x-0 transition-transform duration-300
    bg-[#0f0f0f] border-r border-white/[0.06]"
  aria-label="Sidebar">

  {{-- Logo --}}
  <div class="flex-shrink-0 flex items-center gap-3 px-5 py-5 border-b border-white/[0.06]">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 min-w-0">
      <img src="{{ asset('img/logo_original.webp') }}" class="h-9 w-auto object-contain shrink-0" alt="Impost Media">
      <div class="min-w-0">
        <p class="text-white font-bold text-sm leading-tight truncate">Impost Media</p>
        <p class="text-[10px] text-[#d4ac3c]/70 font-semibold uppercase tracking-wider">Admin Panel</p>
      </div>
    </a>
  </div>

  {{-- Navigation --}}
  <nav class="flex-1 overflow-y-auto no-scrollbar px-3 py-4 space-y-5">

    {{-- Dashboard --}}
    <div>
      <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
        </svg>
        Dashboard
      </x-nav-link>
    </div>

    {{-- Konten section --}}
    <div>
      <p class="px-3 mb-2 text-[10px] font-bold uppercase tracking-widest text-white/25 select-none">Konten</p>
      <div class="space-y-0.5">

        <x-nav-link href="{{ route('articles.index') }}" :active="request()->routeIs('articles.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
          </svg>
          Artikel
        </x-nav-link>

        <x-nav-link href="{{ route('portfolio.index') }}" :active="request()->routeIs('portfolio.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
          </svg>
          Portfolio
        </x-nav-link>

        <x-nav-link href="{{ route('services.index') }}" :active="request()->routeIs('services.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z"/>
          </svg>
          Layanan
        </x-nav-link>

        <x-nav-link href="{{ route('study-case.index') }}" :active="request()->routeIs('study-case.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605"/>
          </svg>
          Study Case
        </x-nav-link>

        <x-nav-link href="{{ route('testimonials.index') }}" :active="request()->routeIs('testimonials.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
          </svg>
          Testimoni
        </x-nav-link>

        <x-nav-link href="{{ route('clients.index') }}" :active="request()->routeIs('clients.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
          </svg>
          Klien
        </x-nav-link>

        <x-nav-link href="{{ route('employees.index') }}" :active="request()->routeIs('employees.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
          </svg>
          Tim
        </x-nav-link>

        <x-nav-link href="{{ route('jobvacancies.index') }}" :active="request()->routeIs('jobvacancies.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
          </svg>
          Lowongan Kerja
        </x-nav-link>

      </div>
    </div>

    {{-- Kategori section --}}
    <div>
      <p class="px-3 mb-2 text-[10px] font-bold uppercase tracking-widest text-white/25 select-none">Kategori</p>
      <div class="space-y-0.5">

        <x-nav-link href="{{ route('article-categories.index') }}" :active="request()->routeIs('article-categories.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/>
          </svg>
          Kategori Artikel
        </x-nav-link>

        <x-nav-link href="{{ route('portfolio-categories.index') }}" :active="request()->routeIs('portfolio-categories.*')">
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/>
          </svg>
          Kategori Portfolio
        </x-nav-link>

      </div>
    </div>

  </nav>

  {{-- User card --}}
  <div class="flex-shrink-0 border-t border-white/[0.06] p-4">

    <div class="flex items-center gap-3 mb-3 px-1">
      <div class="w-9 h-9 rounded-full bg-[#d4ac3c]/20 border border-[#d4ac3c]/30
        flex items-center justify-center shrink-0
        text-sm font-bold text-[#d4ac3c]">
        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
      </div>
      <div class="min-w-0 flex-1">
        <p class="text-sm font-semibold text-white truncate leading-tight">{{ Auth::user()->name }}</p>
        <p class="text-[11px] text-white/35 truncate">{{ Auth::user()->email }}</p>
      </div>
    </div>

    <div class="flex gap-2">
      <a href="{{ route('profile') }}"
        class="flex-1 flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl text-xs font-semibold
          text-white/55 bg-white/[0.05] hover:bg-white/[0.09] hover:text-white
          border border-white/[0.07] transition-all duration-150">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
        </svg>
        Profil
      </a>

      <form method="POST" action="{{ route('logout') }}" class="flex-1">
        @csrf
        <button type="submit"
          class="w-full flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl text-xs font-semibold
            text-red-400/70 bg-red-500/[0.07] hover:bg-red-500/[0.13] hover:text-red-400
            border border-red-500/[0.12] transition-all duration-150">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
          </svg>
          Logout
        </button>
      </form>
    </div>

  </div>

</aside>
