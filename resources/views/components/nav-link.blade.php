@props(['active' => false])

<a class="{{ $active
    ? 'bg-[#d4ac3c]/[0.12] text-[#d4ac3c]'
    : 'text-white/50 hover:text-white hover:bg-white/[0.06]'
  }} flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-150"
  aria-current="{{ $active ? 'page' : 'false' }}"
  {{ $attributes }}>{{ $slot }}</a>
