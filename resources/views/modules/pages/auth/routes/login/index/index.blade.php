@component('modules.pages.auth.common.components.layout.page.index', [
    'activeLink' => 'auth',
])
    <div class="modules-pages-auth-routes-login-index">
        @component('modules.pages.auth.common.components.layout.form.index', [
                'formAction' => '/login',
            ])
            @component('modules.pages.auth.common.components.formItemContainer.index')
                @include('components.inputs.phone.index', [
                                'name' => 'phone',
                                'required' => true,
                ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone'),
                ])
            @endcomponent
            @component('modules.pages.auth.common.components.formItemContainer.index')
                @include('components.inputs.form.index', [
                        'name' => 'password',
                        'placeholder' => 'Пароль',
                        'required' => true,
                        'type' => 'password'
                    ])
                @include('components.form.error.index', [
                    'message' => $errors->first('password'),
                ])
            @endcomponent
            <x-slot name="slot_footer">
                <div class="modules-pages-auth-routes-login-index__forgot-password-container">
                    @include('modules.pages.auth.routes.login.components.forgotPassword.index')
                </div>
            </x-slot>
        @endcomponent
    </div>
@endcomponent
