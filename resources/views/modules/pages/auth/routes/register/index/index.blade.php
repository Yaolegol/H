@component('modules.pages.auth.common.components.layout.index', [
    'activeLink' => 'registration',
    'formAction' => '/register',
    'formClass' => 'j-test',
])
    <div>
        @include('modules.pages.auth.routes.register.components.sendSms.index')
    </div>
    <div>
        @include('modules.pages.auth.routes.register.components.confirmCode.index')
    </div>
@endcomponent
