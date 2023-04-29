<div class="modules-pages-auth-routes-forgot-password-index j-modules-pages-auth-routes-forgot-password-index">
    <div class="modules-pages-auth-routes-forgot-password-index__content-block">
        <h4 class="modules-pages-auth-routes-forgot-password-index__title">Восстановление пароля</h4>
        <div class="modules-pages-auth-routes-forgot-password-index__content-container">
            <div class="j-modules-pages-auth-routes-forgot-password-index__send-sms-container">
                @component('modules.pages.auth.common.components.layout.form.index', [
                    'formAction' => '/forgotPassword',
                ])
                    @include('modules.pages.auth.routes.forgotPassword.components.sendSms.index')
                @endcomponent
            </div>
            <div class="hidden j-modules-pages-auth-routes-forgot-password-index__confirm-code-container">
                @include('modules.pages.auth.routes.forgotPassword.components.confirmCode.index')
            </div>
            <div class="hidden modules-pages-auth-routes-forgot-password-index__error j-modules-pages-auth-routes-forgot-password-index__error-container"></div>
        </div>
    </div>
</div>
