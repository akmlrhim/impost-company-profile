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
    <div x-data="{ show: true }" x-show="show"
      class="mb-3 p-3 rounded-sm font-medium text-sm flex justify-between items-center {{ $styles[$type] }}">

      <span>{{ $message }}</span>

      <button @click="show=false" class="font-bold ml-4 text-xl cursor-pointer">×</button>
    </div>
  @endif
@endforeach
