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
        <script data-id="3">
            console.log('START COUNTING');
            let count = 0;
            while(count < 1000000000) {
                count++;
            }

            console.log(count);
        </script>

        <script data-id="11" src="/build/test_header_medium.js" async></script>
        <script data-id="10" src="/build/test_header_small.js" defer></script>
        <script>
            console.log('HEADER LAST SCRIPT START COUNT')

            let countSecond = 0;
            while(countSecond < 1000000000) {
                countSecond++;
            }

            console.log(countSecond);
        </script>
    </head>
    <body>
        <script>
            console.log('BODY FIRST SCRIPT START COUNT')

            let count3 = 0;
            while(count3 < 2000000000) {
                count3++;
            }

            console.log(count3);
        </script>
        @auth
            <div class="j-user__auth"></div>
        @endauth
        <div class="layout">
            @include('modules.header.index')

            <div class="layout__content-block">
                <div class="layout__content-container">
                    @yield('layout-content')
                </div>
            </div>
        </div>
        @yield('layout-scripts')
{{--        <script data-id="4" src="/build/test_header.js"></script>--}}
        <script>
            console.log('BODY LAST SCRIPT')

            window.addEventListener('load', (e) => {
                console.log('load window')
            })
            document.addEventListener('load', (e) => {
                console.log('load document')
            })
            window.addEventListener('DOMContentLoaded', (e) => {
                console.log('DOMContentLoaded window')
            })
            document.addEventListener('DOMContentLoaded', (e) => {
                console.log('DOMContentLoaded document')
            })

            let scriptElement = document.createElement('script');
            scriptElement.src = '/build/test_header.js';
            document.head.appendChild(scriptElement);
        </script>
    </body>
</html>
