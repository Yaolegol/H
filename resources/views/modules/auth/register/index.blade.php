<div class="auth-login">
    <div class="auth-login__content-block">
        <div class="auth-login__tabs-container">
            <a class="auth-login__tab-button" href="/login">Вход</a>
            <div class="auth-login__tab-button auth-login__tab-button_with-offset auth-login__tab-button_active">Регистрация</div>
        </div>
        <div class="auth-login__content-container">
            <form action="/register" method="POST">
                @csrf
                <div class="auth-login__form-item-container">
                    @include('components.inputs.form.index', [
                        'name' => 'registration_email',
                        'placeholder' => 'Email',
                        'type' => 'email',
                        'value' => old('registration_email')
                    ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('registration_email'),
                    ])
                </div>
                <div class="auth-login__form-item-container">
                    @include('components.inputs.form.index', [
                        'name' => 'password',
                        'placeholder' => 'Password',
                        'type' => 'password'
                    ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('password'),
                    ])
                </div>
                <div class="auth-login__form-item-container">
                    @include('components.inputs.form.index', [
                        'name' => 'password_confirmation',
                        'placeholder' => 'Confirm password',
                        'type' => 'password'
                    ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('password_confirmation'),
                    ])
                </div>
                <div class="auth-login__send-button-container">
                    <button class="auth-login__send-button">Отправить</button>
                </div>
                @include('components.form.error.index', [
                    'message' => session('commonError'),
                ])
            </form>
        </div>
    </div>
</div>
