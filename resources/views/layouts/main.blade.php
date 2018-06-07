<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('includes.header')
    </head>
    <body>
        <main class="py-4">
            @yield('content')
        </main>
    </body>
</html>
