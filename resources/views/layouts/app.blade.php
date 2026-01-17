<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Savings') }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-gray-50 text-gray-900 antialiased dark:bg-gray-950 dark:text-gray-100">
  <div class="min-h-full">

    <!-- Navbar -->
    <header class="border-b border-gray-200 bg-white/80 backdrop-blur
                       dark:border-gray-800 dark:bg-gray-900/60">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <!-- Site name -->
          <div class="inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 dark:text-lime-600 size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>

            <a href="{{ url('/') }}" class="text-lg font-semibold tracking-tight
                              text-gray-900 hover:text-gray-700
                              dark:text-gray-100 dark:hover:text-gray-300">
              {{ config('app.name', 'Savings') }}
            </a>
          </div>

          <a href="{{ route('goals.create') }}" class="inline-flex items-center gap-2 rounded-lg
                              bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm
                              hover:bg-gray-800
                              focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2
                              dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-white
                              dark:focus:ring-gray-200 dark:focus:ring-offset-gray-950">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
              <path d="M10 3.75a.75.75 0 01.75.75v4.75h4.75a.75.75 0 010 1.5h-4.75v4.75a.75.75 0 01-1.5 0v-4.75H4.5a.75.75 0 010-1.5h4.75V4.5a.75.75 0 01.75-.75z" />
            </svg>
            Add Goal
          </a>
        </div>
      </div>
    </header>

    <!-- Page content -->
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm
                        dark:border-gray-800 dark:bg-gray-900">
        @yield('content')
      </div>
    </main>

  </div>

  @if (session('toast'))
    @php($toast = session('toast'))
    <div id="toast" class="fixed right-4 top-4 z-50 w-full max-w-sm rounded-xl px-4 py-3 shadow-lg
           {{ $toast['type'] === 'success' ? 'bg-emerald-600 text-white' : 'bg-red-600 text-white' }}">
      <div class="flex items-start gap-3">
        <div class="mt-0.5 shrink-0">
          @if ($toast['type'] === 'success')
            <!-- check icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75 11.25 15 15 9.75" />
            </svg>
          @else
            <!-- x icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18 18 6M6 6l12 12" />
            </svg>
          @endif
        </div>

        <div class="flex-1 text-sm font-semibold">
          {{ $toast['message'] }}
        </div>

        <button type="button" class="ml-2 rounded-lg p-1 hover:bg-white/10" onclick="window.__closeToast?.()" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>

    <script>
      (function() {
        const el = document.getElementById('toast');
        if (!el) return;

        window.__closeToast = function() {
          el.style.transition = 'opacity 200ms ease';
          el.style.opacity = '0';
          setTimeout(() => el.remove(), 220);
        };

        setTimeout(window.__closeToast, 3000);
      })();
    </script>
  @endif

</body>

</html>
