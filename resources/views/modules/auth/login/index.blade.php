<div class="auth-login">
    <div class="auth-login__content-block">
        <div class="auth-login__tabs-container">
            <div class="auth-login__tab-button auth-login__tab-button_active">Вход</div>
            <a
                class="auth-login__tab-button auth-login__tab-button_with-offset"
                href="/register"
            >
                Регистрация
            </a>
        </div>
        <div class="auth-login__content-container">
            <form action="/login" method="POST">
                @csrf
                <div class="auth-login__form-item-container">
                    @include('components.inputs.form.index', [
                        'name' => 'email',
                        'placeholder' => 'Email',
                        'type' => 'email',
                        'value' => old('email')
                    ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('email'),
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
