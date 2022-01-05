<div class="modules-pages-auth-common-components-layout">
    <div class="modules-pages-auth-common-components-layout__content-block">
        @include('modules.pages.auth.common.components.tabs.index', [
            'activeLink' => $activeLink
        ])
        <div class="modules-pages-auth-common-components-layout__content-container">
            <form action="{{$formAction}}" method="POST">
                @csrf

                {{$slot}}

                <div class="modules-pages-auth-common-components-layout__send-button-container">
                    <button class="modules-pages-auth-common-components-layout__send-button">Отправить</button>
                </div>
                @include('components.form.error.index', [
                    'message' => session('commonError'),
                ])
            </form>
        </div>
    </div>
</div>
