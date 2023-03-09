@component('modules.pages.auth.common.components.layout.page.index', [
    'activeLink' => 'auth',
])
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
    @endcomponent
@endcomponent
