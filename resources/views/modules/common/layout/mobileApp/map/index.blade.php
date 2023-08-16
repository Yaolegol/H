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
    </head>
    <body>
        @yield('layout-content')
        @yield('layout-scripts')

        <!-- Yandex map -->
        <script
            src="https://api-maps.yandex.ru/2.1/?apikey={{env('YANDEX_MAP_KEY')}}&lang=ru_RU"
            type="text/javascript"
        ></script>
    </body>
</html>
