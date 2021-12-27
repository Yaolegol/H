<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
{{--        @yield('layout-styles')--}}
{{--        <link as="style" href="{{ asset('build/index_prefetch.css') }}" rel="prefetch">--}}
        <link href="{{ asset('build/index.css') }}" rel="stylesheet">
        <link href="{{ asset('build/vendor.css') }}" rel="stylesheet">
{{--        <script data-id="3">--}}
{{--            console.log('START COUNTING');--}}
{{--            let count = 0;--}}
{{--            while(count < 1000000000) {--}}
{{--                count++;--}}
{{--            }--}}

{{--            console.log(count);--}}
{{--        </script>--}}

        <script data-id="11" src="/build/test_header_medium.js"></script>
        <script data-id="11" src="/build/test_header_additional.js"></script>
        <script data-id="10" src="/build/test_header_additional2.js"></script>
        <script data-id="10" src="/build/test_header_additional3.js"></script>
        <script data-id="10" src="/build/test_header_additional4.js"></script>
{{--        <script data-id="10" src="/build/test_header_small.js"></script>--}}
{{--        <script>--}}
{{--            console.log('HEADER LAST SCRIPT START COUNT')--}}

{{--            let countSecond = 0;--}}
{{--            while(countSecond < 1000000000) {--}}
{{--                countSecond++;--}}
{{--            }--}}

{{--            console.log(countSecond);--}}
{{--        </script>--}}
{{--        <script>--}}
{{--            let scriptElementHead = document.createElement('script');--}}
{{--            scriptElementHead.src = '/build/test_header.js';--}}
{{--            document.head.appendChild(scriptElementHead);--}}
{{--        </script>--}}
        <link href="{{ asset('build/index_body.css') }}" rel="stylesheet">
        <link href="{{ asset('build/index_body2.css') }}" rel="stylesheet">
        <link href="{{ asset('build/index_body3.css') }}" rel="stylesheet">
        <link href="{{ asset('build/index_body4.css') }}" rel="stylesheet">
        <link href="{{ asset('build/index_body5.css') }}" rel="stylesheet">
        <link href="{{ asset('build/index_body6.css') }}" rel="stylesheet">
        <link as="style" href="{{ asset('build/index_preload.css') }}" rel="preload">

    </head>
    <body>
        <script>
            console.log('BODY FIRST SCRIPT')

            // console.log('BODY FIRST SCRIPT START COUNT')

            // let count3 = 0;
            // while(count3 < 0) {
            //     count3++;
            // }
            //
            // console.log(count3);
        </script>
        @auth
            <div class="j-user__auth"></div>
        @endauth
        <div class="layout">
            @include('modules.header.index')

            <div class="layout__content-block">
                <div class="layout__content-container">
                    @yield('layout-content')
                    <link href="{{ asset('build/index_body.css') }}" rel="stylesheet">
                    <div style="color: red; margin-top: 50px">
                        TEST TEST TEST
                    </div>
                </div>
            </div>
        </div>
{{--        @yield('layout-scripts')--}}
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

            console.log('BODY LAST SCRIPT START COUNT')

            let count5 = 0;
            while(count5 < 2000000000) {
                count5++;
            }

            console.log(count5);

            // let scriptElement = document.createElement('script');
            // scriptElement.src = '/build/test_header.js';
            // scriptElement.setAttribute('async', 'false');
            // document.body.appendChild(scriptElement);



        </script>
{{--        <link as="style" href="{{ asset('build/index_preload.css') }}" rel="preload">--}}

    </body>
</html>
