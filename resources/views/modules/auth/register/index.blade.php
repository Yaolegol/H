<div class="auth-login">
    <div class="auth-login__content-block">
        <div class="auth-login__tabs-container">
            <div class="auth-login__tab-button">Вход</div>
            <div class="auth-login__tab-button auth-login__tab-button_with-offset">Регистрация</div>
        </div>
        <div class="auth-login__content-container">
            <form action="/register" method="POST">
                @csrf
                <div class="auth-login__form-item-container">
                    @include('components.inputs.form.index', [
                        'placeholder' => 'Email',
                        'type' => 'email'
                    ])
                </div>
                <div class="auth-login__form-item-container">
                    @include('components.inputs.form.index', [
                        'placeholder' => 'Password',
                        'type' => 'password'
                    ])
                </div>
                <div class="auth-login__form-item-container">
                    @include('components.inputs.form.index', [
                        'placeholder' => 'Confirm password',
                        'type' => 'password'
                    ])
                </div>
            </form>
        </div>
    </div>
</div>
