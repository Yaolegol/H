<div class="modules-pages-auth-routes-forgotPassword-components-send-sms-index">
    @component('modules.pages.auth.common.components.formItemContainer.index')
        @include('components.inputs.phone.index', [
                        'name' => 'phone',
                        'required' => true,
        ])
        @include('components.form.error.index', [
            'message' => $errors->first('phone'),
        ])
    @endcomponent
    <div class="modules-pages-auth-routes-forgotPassword-components-send-sms-index__password-block">
        <h6 class="modules-pages-auth-routes-forgotPassword-components-send-sms-index__password-block-title">Придумайте новый пароль</h6>
        <div>
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
            @component('modules.pages.auth.common.components.formItemContainer.index')
                @include('components.inputs.form.index', [
                                'name' => 'password_confirmation',
                                'placeholder' => 'Подтверждение пароля',
                                'required' => true,
                                'type' => 'password'
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('password_confirmation'),
                ])
            @endcomponent
        </div>
    </div>
</div>
