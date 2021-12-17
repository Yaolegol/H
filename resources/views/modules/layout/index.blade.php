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

        <script data-id="6">
            console.log('HEADER LOG')
            console.log('document.readyState')
            console.log(document.readyState)

            document.addEventListener('readystatechange', (event) => {
                console.log('--- readystatechange')
                console.log(document.readyState)
            });

            window.addEventListener('load', (event) => {
                console.log('--- load');
            });

            document.addEventListener("DOMContentLoaded", function(event) {
                console.log("--- DOMContentLoaded");
            });
        </script>
        <script data-id="3">
            console.log('START COUNTING');
            let count = 0;
            while(count < 1000000000) {
                count++;
            }

            console.log(count);
        </script>

        <script data-id="11" src="/build/test_header_medium.js"></script>
{{--        <script data-id="4" src="/build/test_header.js"></script>--}}
        <script data-id="10" src="/build/test_header_small.js"></script>
    </head>
    <body>
        <script data-id="7">
            console.log('BODY START')
            console.log('document.readyState')
            console.log(document.readyState)

            // let scriptTag = document.createElement('script');
            // scriptTag.src = '/build/test_header_0.js';
            // scriptTag.async = false;
            // scriptTag.defer = true;
            // document.head.append(scriptTag);
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


        <div class="j-test-1">test</div>
        @yield('layout-scripts')
        <script data-id="1">
            console.log('BODY LOG')
            console.log('document.readyState')
            console.log(document.readyState)

            const test1 = document.querySelector('.j-test-1');
            console.log('test1');
            console.log(test1);

            const test_script_1 = () => {
                console.log('test_script_1');
            };

            const test2 = document.querySelector('.j-test-2');
            console.log('test2');
            console.log(test2);
            test2.classList.add('test');
        </script>

        <script data-id="2">
            test_script_1();
        </script>
{{--        <script data-id="5" src="/build/test_body_bottom.js"></script>--}}

        <div class="j-test-2">test 2</div>
        <script data-id="8">
            const newTest2 = document.querySelector('.j-test-2');
            console.log('!!! test2');
            console.log(newTest2);
        </script>

        <script data-id="module" type="module">
            console.log('!!! MODULE TEST')
            var a = 'test';
            console.log('a');
            console.log(a);

            const test = document.querySelector('.j-test-2');
            console.log('test');
            console.log(test);
        </script>
        <script data-id="module" type="module">
            console.log('!!! MODULE TEST')
            var a = 'test';
            console.log('a');
            console.log(a);

            const test = document.querySelector('.j-test-2');
            console.log('test');
            console.log(test);
        </script>
        <script data-id="module" type="module">
            console.log('!!! MODULE TEST')
            var a = 'test';
            console.log('a');
            console.log(a);

            const test = document.querySelector('.j-test-2');
            console.log('test');
            console.log(test);
        </script>

        <script data-id="module" type="module">
            console.log('!!!NEW TEST')
            function test() {
                console.log('function test body start');
                try {
                    abc + 5;
                } catch(err) {
                    console.log(err);
                }

                console.log('function test body end')
            }

            const intervalId = setInterval(() => {
                test();
            }, 1000);

            setTimeout(()=> {
                clearInterval(intervalId);
            }, 10000)
        </script>

        <div>test</div>
        <div>test</div>

    </body>
</html>
