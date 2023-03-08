@component('modules.pages.auth.common.components.layout.page.index', [
    'activeLink' => 'registration',
])
    <div class="modules-pages-auth-routes-register-index j-modules-pages-auth-routes-register-index">
        <div class="j-modules-pages-auth-routes-register-index__send-sms-container">
            @component('modules.pages.auth.common.components.layout.form.index', [
                'formAction' => '/register',
            ])
                @include('modules.pages.auth.routes.register.components.sendSms.index')
            @endcomponent
        </div>
        <div class="hidden j-modules-pages-auth-routes-register-index__confirm-code-container">
            @include('modules.pages.auth.routes.register.components.confirmCode.index')
        </div>
        <div class="hidden modules-pages-auth-routes-register-index__error j-modules-pages-auth-routes-register-index__error-container"></div>
    </div>
@endcomponent
