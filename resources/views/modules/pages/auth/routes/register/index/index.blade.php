@component('modules.pages.auth.common.components.layout.index', [
    'activeLink' => 'registration',
    'formAction' => '/register',
    'formClass' => 'j-test',
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
                        'type' => 'password'
                    ])
        @include('components.form.error.index', [
            'message' => $errors->first('password_confirmation'),
        ])
    @endcomponent
@endcomponent
