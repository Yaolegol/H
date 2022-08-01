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
    <body class="j-location-controller j-modules-pages-map-web-common-components-filters-product-controller">
        <div class="j-csrf-token" data-value="{{ csrf_token() }}"></div>
        @auth
            <div class="j-user__auth"></div>
        @endauth
        <div class="modules-common-layout-web">
            @include('modules.common.header.index.index')

            <div class="modules-common-layout-web__content-block">
                <div
                    class="
                        modules-common-layout-web__content-container
                        @isset($withoutOffset)
                            modules-common-layout-web__content-container_without-offset
                        @endisset
                    "
                >
                    @yield('layout-content')
                </div>
            </div>
        </div>
        @include('components.modals.base.common.index')
        @yield('layout-scripts')
    </body>
</html>
