<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- About -->
        <title>{{ config('app.name', 'Кликферма') }}</title>
        <meta
            name="description"
            content="Продать, найти, купить натуральные фермерские продукты. Объявления о продаже натуральных фермерских продуктов. Бесплатное размещение объявлений"
        >

        <!-- Styles -->
        @yield('layout-styles')

        <!-- Favicon -->
        <link
            href="/build/icons/favicon/favicon.svg"
            rel="icon"
            sizes="any"
            type="image/svg+xml"
        >
        <link
            href="/build/icons/favicon/favicon.svg"
            rel="apple-touch-icon"
            sizes="any"
            type="image/svg+xml"
        >

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <div class="modules-common-layout-web__footer-container">
            @include('modules.common.footer.index.index')
        </div>
        @include('components.modals.base.common.index')
        @yield('layout-scripts')

        <!-- Yandex map -->
        <script
            src="https://api-maps.yandex.ru/2.1/?apikey={{env('YANDEX_MAP_KEY')}}&lang=ru_RU"
            type="text/javascript"
        ></script>

{{--        <!-- Yandex.Metrika counter -->--}}
{{--        <script type="text/javascript" >--}}
{{--            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};--}}
{{--                m[i].l=1*new Date();--}}
{{--                for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}--}}
{{--                k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})--}}
{{--            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");--}}

{{--            ym(93934360, "init", {--}}
{{--                clickmap:true,--}}
{{--                trackLinks:true,--}}
{{--                accurateTrackBounce:true--}}
{{--            });--}}
{{--        </script>--}}
{{--        <noscript><div><img src="https://mc.yandex.ru/watch/93934360" style="position:absolute; left:-9999px;" alt="" /></div></noscript>--}}
{{--        <!-- /Yandex.Metrika counter -->--}}
    </body>
</html>
