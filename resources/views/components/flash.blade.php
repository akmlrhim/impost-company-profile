@php
  $messages = [
      'success' => session('success'),
      'error' => session('error'),
      'info' => session('info'),
      'warning' => session('warning'),
  ];

  $styles = [
      'success' => 'bg-green-700 text-green-100',
      'error' => 'bg-red-700 text-red-100',
      'info' => 'bg-blue-700 text-blue-100',
      'warning' => 'bg-yellow-700 text-yellow-100',
  ];
@endphp

@foreach ($messages as $type => $message)
  @if ($message)
    <div x-data="{ show: true }" x-show="show" x-transition
      class="mb-3 p-3 rounded-sm font-medium text-xs sm:text-sm flex justify-between items-center {{ $styles[$type] }}">
      <span>{{ $message }}</span>

      <button type="button" @click="show = false"
        class="ml-3 text-lg font-bold leading-none cursor-pointer focus:outline-none">
        &times;
      </button>
    </div>
  @endif
@endforeach
