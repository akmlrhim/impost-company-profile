<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
  <div class="relative flex items-center justify-center min-h-screen p-6" role="main">

    <div
      class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-4xl bg-impost-primary opacity-[0.05] blur-[120px] rounded-full pointer-events-none">
    </div>

    <div class="relative z-10 max-w-2xl w-full text-center">
      <div class="flex flex-col items-center justify-center">

        <div class="w-full max-w-xs md:max-w-sm mb-3">
          <img src="{{ asset('img/error_illustration.png') }}" loading="lazy" decoding="async" alt="Error Illustration"
            class="w-full h-72 object-contain">
        </div>

        <div class="space-y-2">
          <h1 class="text-6xl md:text-8xl font-black tracking-tighter text-impost-primary">
            @yield('code')
          </h1>

          <div class="h-px w-24 bg-impost-primary mx-auto my-4 opacity-50"></div>

          <h2 class="text-xl md:text-2xl font-bold uppercase tracking-widest text-gray-200">
            @yield('message')
          </h2>
        </div>

      </div>
    </div>
  </div>
</body>

</html>
