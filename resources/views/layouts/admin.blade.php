<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'Page' }}</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="{{ asset('quill/quill.css') }}">

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif

  @stack('styles')

  <style>
    [x-cloak] {
      display: none !important
    }
  </style>

</head>

<body class="bg-gray-100">

  <x-partials.admin.navbar />
  <x-partials.admin.sidebar />

  <div class="p-4 md:ml-64 pt-18 min-h-screen overflow-auto">
    @include('components.partials.admin.breadcrumb', ['title' => $title])
    @yield('content')
  </div>


  @stack('scripts')

  <script src="{{ asset('quill/quill.js') }}"></script>

</body>

</html>
