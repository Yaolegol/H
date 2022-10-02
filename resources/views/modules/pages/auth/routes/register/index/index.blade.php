@component('modules.pages.auth.common.components.layout.index', [
    'activeLink' => 'registration',
    'formAction' => '/register',
    'formClass' => 'j-test',
])
    <div class="modules-pages-auth-routes-register-index">
        <div class="j-test__send-sms-container">
            @include('modules.pages.auth.routes.register.components.sendSms.index')
        </div>
        <div class="hidden j-test__confirm-code-container">
            @include('modules.pages.auth.routes.register.components.confirmCode.index')
        </div>
        <div class="hidden modules-pages-auth-routes-register-index__error j-test__error-container"></div>
    </div>
@endcomponent
