<nav class="fixed bg-gray-900 border-b border-gray-800 top-0 z-30 w-full ps-0 sm:ps-64">
  <div class="px-4 py-3 flex items-center justify-between w-full">

    <div class="block sm:hidden md:hidden me-auto">
      <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 text-sm text-gray-300 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-700">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
          <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
          </path>
        </svg>
      </button>
    </div>

    <div class="ml-auto flex items-center">
      <div class="relative">
        <button type="button" class="flex items-center text-sm">

          <img class="w-10 h-10 rounded-full" src="{{ asset('img/logo_impost_putih.png') }}" alt="User Avatar">

          <div class="mr-4 ml-3 text-white hidden md:flex flex-col text-left leading-tight">
            <span class="font-semibold">
              {{ Auth::user()->name }}
            </span>
            <span class="text-xs font-medium text-gray-400">
              {{ Auth::user()->email }}
            </span>
          </div>
        </button>
      </div>
    </div>

  </div>
</nav>
