<div class="profile-personal-info">
    <div class="profile-personal-info__image-block">
        <div class="profile-personal-info__image-container">
            <img alt="Photo" class="profile-personal-info__image" src="https://picsum.photos/200/300">
        </div>
    </div>
    <div class="profile-personal-info__content-container">
        <h2>Личные данные</h2>
        <form action="/profile/personal-info" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="profile-personal-info__info-title">Ваше имя:</div>
            <div class="profile-personal-info__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'name',
                            'placeholder' => 'Name',
                            'type' => 'text',
                            'value' => old('name')
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
                            'value' => old('phone')
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone'),
                ])
            </div>
            <div class="profile-personal-info__info-title">Email:</div>
            <div class="profile-personal-info__info-description">
                <div class="profile-personal-info__input-container">
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
            </div>
            <div class="profile-personal-info__info-description profile-personal-info__info-description_with-offset">
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
</div>
