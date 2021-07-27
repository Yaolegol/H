<div class="profile-personal-info">
    <div class="profile-personal-info__image-block">
        <div class="profile-personal-info__image-container">
            <img alt="Photo" class="profile-personal-info__image" src="https://picsum.photos/200/300">
        </div>
    </div>
    <div class="profile-personal-info__content-block">
        <div class="profile-personal-info__content-container">
            <div class="profile-personal-info__personal-data-container">
                <h2>Личные данные</h2>
                <div>(отображаются для других пользователей)</div>
                <form action="/profile/personal-info" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="profile-personal-info__info-title">Ваше имя:</div>
                    <div class="profile-personal-info__input-container">
                        @include('components.inputs.form.index', [
                                    'name' => 'name',
                                    'placeholder' => 'Name',
                                    'type' => 'text',
                                    'value' => $userData['name']
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('name'),
                        ])
                    </div>
                    <div class="profile-personal-info__info-title">Телефон:</div>
                    <div class="profile-personal-info__input-container">
                        @include('components.inputs.form.index', [
                                    'name' => 'phone',
                                    'placeholder' => 'Phone',
                                    'type' => 'tel',
                                    'value' => $userData['phone']
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('phone'),
                        ])
                    </div>
                    <div class="profile-personal-info__info-title">Email (отображаемый для других пользователей):</div>
                    <div class="profile-personal-info__info-description">
                        <div class="profile-personal-info__input-container">
                            @include('components.inputs.form.index', [
                                        'name' => 'visible_email',
                                        'placeholder' => 'Email',
                                        'type' => 'email',
                                        'value' => $userData['visible_email']
                                    ])
                            @include('components.form.error.index', [
                                'message' => $errors->first('visible_email'),
                            ])
                        </div>
                    </div>
                    <div
                        class="profile-personal-info__info-description profile-personal-info__info-description_with-offset">
                        <div class="profile-personal-info__input-container">
                            @include('components.inputs.file.index', [
                                'name' => 'photo',
                            ])
                            @include('components.form.error.index', [
                                'message' => $errors->first('photo'),
                            ])
                        </div>
                    </div>
                    <div class="profile-personal-info__send-button-container">
                        <button class="profile-personal-info__send-button">Сохранить</button>
                    </div>
                    @include('components.form.error.index', [
                        'message' => session('commonError'),
                    ])
                </form>
            </div>
            <div class="profile-personal-info__registration-data-container">
                <h2>Регистрационные данные</h2>
                <form action="/profile/personal-info" method="POST">
                    @csrf
                    <div class="profile-personal-info__info-title">Email:</div>
                    <div class="profile-personal-info__info-description">
                        <div class="profile-personal-info__input-container">
                            @include('components.inputs.form.index', [
                                        'name' => 'registration_email',
                                        'placeholder' => 'Email',
                                        'type' => 'email',
                                        'value' => $userData['registration_email']
                                    ])
                            @include('components.form.error.index', [
                                'message' => $errors->first('registration_email'),
                            ])
                        </div>
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
                </form>
            </div>
            <div class="profile-personal-info__send-button-container">
                <button class="profile-personal-info__send-button">Сохранить</button>
            </div>
            @include('components.form.error.index', [
                'message' => session('commonError'),
            ])
        </div>
    </div>
</div>
