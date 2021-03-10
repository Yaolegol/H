<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @yield('styles')
    </head>
    <body>
        <div class="layout">
            @include('modules.header.index')

            <div class="layout__content-container">
                @yield('content')
            </div>

            @yield('scripts')
        </div>
    </body>
</html>
