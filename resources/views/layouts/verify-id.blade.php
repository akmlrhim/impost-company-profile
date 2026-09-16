<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex, nofollow">
  <meta name="description" content="Verifikasi identitas resmi personel CV Impost Media Indonesia.">


  <title>{{ $title }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="min-h-screen text-slate-800 bg-slate-50" style="color-scheme: light; background-color: #f8fafc;">
  <header class="sticky top-0 z-50 w-full bg-white/80 backdrop-blur-md border-b border-slate-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-14 sm:h-16 items-center">
        <div class="flex-shrink-0 flex items-center gap-2">
          <div class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center">
            <img src="{{ asset('img/logo_original.webp') }}" alt="IMPOST MEDIA Logo"
              class="w-full h-full object-contain">
          </div>
          <span class="text-lg sm:text-xl font-bold tracking-tight text-slate-900">IMPOST MEDIA</span>
        </div>
      </div>
    </div>
  </header>

  @yield('content')

  <footer class="mt-auto py-6 sm:py-8 text-center text-slate-500">
    <div class="max-w-7xl mx-auto px-4">
      <p class="text-xs sm:text-sm text-center">© {{ date('Y') }} IMPOST MEDIA. All rights reserved.</p>
      <div class="flex justify-center gap-4 sm:gap-6 mt-3 sm:mt-4 text-[10px] sm:text-xs">
        <a class="hover:text-blue-600 transition-colors font-medium" href="#">Privacy Policy</a>
        <a class="hover:text-blue-600 transition-colors font-medium" href="#">Terms of Use</a>
      </div>
    </div>
  </footer>
</body>

</html>
