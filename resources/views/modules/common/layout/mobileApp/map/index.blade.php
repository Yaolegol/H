<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @yield('layout-styles')

        <script
            src="https://api-maps.yandex.ru/2.1/?apikey=b92366ae-3520-458e-bf9f-17db62817585&lang=ru_RU"
            type="text/javascript"
        ></script>
    </head>
    <body>
        @yield('layout-content')
        @yield('layout-scripts')
    </body>
</html>
