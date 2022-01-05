@component('modules.pages.auth.common.components.layout.index', [
    'activeLink' => 'auth',
    'formAction' => '/login',
])
    @component('modules.pages.auth.common.components.formItemContainer.index')
        @include('components.inputs.form.index', [
            'name' => 'registration_email',
            'placeholder' => 'Email',
            'type' => 'email',
            'value' => old('registration_email')
        ])
        @include('components.form.error.index', [
            'message' => $errors->first('registration_email'),
        ])
    @endcomponent
    @component('modules.pages.auth.common.components.formItemContainer.index')
        @include('components.inputs.form.index', [
                'name' => 'password',
                'placeholder' => 'Password',
                'type' => 'password'
            ])
        @include('components.form.error.index', [
            'message' => $errors->first('password'),
        ])
    @endcomponent
@endcomponent
