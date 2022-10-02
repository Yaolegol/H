@component('modules.pages.auth.common.components.layout.index', [
    'activeLink' => 'registration',
    'formAction' => '/register',
    'formClass' => 'j-test',
])
    <div class="j-test__send-sms-container">
        @include('modules.pages.auth.routes.register.components.sendSms.index')
    </div>
    <div class="hidden j-test__confirm-code-container">
        @include('modules.pages.auth.routes.register.components.confirmCode.index')
    </div>
@endcomponent
