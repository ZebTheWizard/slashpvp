<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('includes.header')
    </head>
    <body>
        <main class="py-4" id="app">
          @if(env('APP_NAME') === 'Slash PVP')
            <h1 class="site-title">SLASH PVP</h1>
          @elseif(env('APP_NAME') === 'Red Rose')
            <div class="d-flex justify-content-center mb-2">
              <h1 class="site-title redrose">RED</h1>
              <img src="/img/logo-raw.png" class="my-1" width="80" height="80">
              <h1 class="site-title redrose">ROSE</h1>
            </div>

          @endif
          <div class="w-100 text-white d-flex align-items-center justify-content-center mb-4">
            <h5 class="mx-2"><a href="/" class="text-white">Home</a></h5>
            <h5 class="mx-2"><a href="/contact" class="text-white">Contact</a></h5>
            <h5 class="mx-2"><a href="/updates" class="text-white">Updates</a></h5>
          </div>
          <hr style="border-color: #3e3e3e;">
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
