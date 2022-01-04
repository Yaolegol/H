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
        <div class="j-csrf-token" data-value="{{ csrf_token() }}"></div>
        @auth
            <div class="j-user__auth"></div>
        @endauth
        <div class="layout">
            @include('modules.header.index')

            <div class="layout__content-block">
                @yield('layout-content')
            </div>

            @yield('layout-scripts')
        </div>
    </body>
</html>
