@component('modules.pages.auth.common.components.layout.index', [
    'activeLink' => 'auth',
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
                'type' => 'password'
            ])
        @include('components.form.error.index', [
            'message' => $errors->first('password'),
        ])
    @endcomponent
@endcomponent
