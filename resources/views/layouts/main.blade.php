<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('includes.header')
    </head>
    <body>
        <main class="py-4" id="app">
          <h1 class="site-title">SLASH PVP</h1>
          <div class="w-100 text-white d-flex align-items-center justify-content-center mb-4">
            <h5 class="mx-2"><a href="/" class="text-white">Home</a></h5>
            <h5 class="mx-2"><a href="/contact" class="text-white">Contact</a></h5>
            <h5 class="mx-2"><a href="/updates" class="text-white">Updates</a></h5>
          </div>
            @yield('content')
        </main>
        <footer class="mt-5 py-5 text-muted text-center text-small">
          <p class="mb-1">Created by ZebTheWizard 2018</p>
          <ul class="list-inline">
            <li class="list-inline-item"><a class="text-white" href="https://github.com/ZebTheWizard/slashpvp">Github</a></li>
            <li class="list-inline-item"><a class="text-white" href="/home">Dashboard</a></li>
          </ul>
        </footer>

        @yield('scripts')
    </body>
</html>
