<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- About -->
        <title>{{env('APP_NAME')}}</title>
        <meta
            name="description"
            content="{{env('APP_DESCRIPTION')}}"
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
        <meta name="csrf-token" content="{{csrf_token()}}">

        <!-- OGP -->
        <meta property="og:title" content="{{env('APP_NAME')}}">
        <meta property="og:description" content="{{env('APP_DESCRIPTION')}}">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="clickferma.ru">
        <meta property="og:url" content="https://clickferma.ru">
        <meta property="og:image" content="https://clickferma.ru/build/icons/favicon/favicon.svg">
    </head>
    <body class="j-location-controller j-modules-pages-map-web-common-components-filters-product-controller">
        <!-- SVG Styles for telegram -->
        <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 44 44" fill="none" style="position: absolute; pointer-events: none;">
            <defs>
                <linearGradient id="paint0_linear_14_67" x1="2200" y1="0" x2="2200" y2="4367.37" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#2AABEE"/>
                    <stop offset="1" stop-color="#229ED9"/>
                </linearGradient>
                <clipPath id="clip0_14_67">
                    <rect width="44" height="44" fill="white"/>
                </clipPath>
            </defs>
        </svg>
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
