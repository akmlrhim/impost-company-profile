@props(['active' => false])
<a class="{{ $active ? 'bg-impost-fourth text-white' : 'text-white hover:bg-impost-fourth hover:text-white' }} flex items-center p-2 rounded-sm"
  aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>
