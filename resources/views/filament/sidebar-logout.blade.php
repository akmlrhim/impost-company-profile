<form
    method="POST"
    action="{{ filament()->getLogoutUrl() }}"
    class="fi-sidebar-logout px-6 pb-4"
>
    @csrf

    <button
        type="submit"
        class="flex w-full items-center gap-x-3 rounded-lg px-3 py-2 text-sm font-medium text-gray-700 outline-none transition duration-75 hover:bg-gray-100 focus-visible:bg-gray-100 dark:text-gray-200 dark:hover:bg-white/5 dark:focus-visible:bg-white/5"
    >
        <x-filament::icon
            icon="heroicon-o-arrow-left-on-rectangle"
            class="h-6 w-6 text-gray-400 dark:text-gray-500"
        />

        <span>Keluar</span>
    </button>
</form>
