@php
  $messages = [
      'success' => session('success'),
      'error' => session('error'),
      'info' => session('info'),
      'warning' => session('warning'),
  ];

  $styles = [
      'success' => 'bg-green-100 text-green-700',
      'error' => 'bg-red-100 text-red-700',
      'info' => 'bg-blue-100 text-blue-700',
      'warning' => 'bg-yellow-100 text-yellow-700',
  ];
@endphp

@foreach ($messages as $type => $message)
  @if ($message)
    <div x-data="{ show: true }" x-show="show"
      class="mb-2 p-4 rounded-sm font-medium text-sm flex justify-between items-center {{ $styles[$type] }}">

      <span>{{ $message }}</span>

      <button @click="show=false" class="font-bold ml-4">×</button>
    </div>
  @endif
@endforeach
