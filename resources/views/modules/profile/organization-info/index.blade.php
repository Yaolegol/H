<div class="profile-organization-info">
    <div class="profile-organization-info__content-container">
        <h2>Данные об организации</h2>
        <form action="/profile/organization-info" method="POST">
            @csrf
            <div class="profile-organization-info__info-title">Наименование организации:</div>
            <div class="profile-organization-info__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'organization-name',
                            'placeholder' => 'Organization name',
                            'type' => 'text',
                            'value' => old('organization-name')
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('organization-name'),
                ])
            </div>
            <div class="profile-organization-info__info-title">ИНН организации:</div>
            <div class="profile-organization-info__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'inn',
                            'placeholder' => 'Inn',
                            'type' => 'number',
                            'value' => old('inn')
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('inn'),
                ])
            </div>
            <div class="profile-organization-info__info-title">Юридический адрес организации:</div>
            <div class="profile-organization-info__info-description">
                <div class="profile-organization-info__input-container">
                    @include('components.inputs.form.index', [
                                'name' => 'legal-address',
                                'placeholder' => 'Legal address',
                                'type' => 'text',
                                'value' => old('legal-address')
                            ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('legal-address'),
                    ])
                </div>
            </div>
            <div class="profile-organization-info__info-title">Фактический адрес организации:</div>
            <div class="profile-organization-info__info-description">
                <div class="profile-organization-info__input-container">
                    @include('components.inputs.form.index', [
                                'name' => 'real-address',
                                'placeholder' => 'Real address',
                                'type' => 'text',
                                'value' => old('real-address')
                            ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('real-address'),
                    ])
                </div>
            </div>
            <div class="profile-organization-info__info-title">Email организации:</div>
            <div class="profile-organization-info__info-description">
                <div class="profile-organization-info__input-container">
                    @include('components.inputs.form.index', [
                                'name' => 'organization-email',
                                'placeholder' => 'Organization email',
                                'type' => 'email',
                                'value' => old('organization-email')
                            ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('organization-email'),
                    ])
                </div>
            </div>
            <div class="profile-organization-info__info-title">Телефон организации:</div>
            <div class="profile-organization-info__info-description">
                <div class="profile-organization-info__input-container">
                    @include('components.inputs.form.index', [
                                'name' => 'organization-phone',
                                'placeholder' => 'Organization-phone',
                                'type' => 'tel',
                                'value' => old('organization-phone')
                            ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('organization-phone'),
                    ])
                </div>
            </div>
            <div class="profile-organization-info__info-title">Свидетельства:</div>
            <div class="profile-organization-info__info-description">
                <div class="profile-organization-info__input-container">
                    @include('components.form.error.index', [
                        'message' => $errors->first('organization-phone'),
                    ])
                </div>
            </div>
            <div class="profile-organization-info__info-title">Фото:</div>
            <div class="profile-organization-info__info-description">
                <div class="profile-organization-info__input-container">
                    @include('components.form.error.index', [
                        'message' => $errors->first('organization-phone'),
                    ])
                </div>
            </div>
            <div class="profile-organization-info__send-button-container">
                <button class="profile-organization-info__send-button">Сохранить</button>
            </div>
            @include('components.form.error.index', [
                'message' => session('commonError'),
            ])
        </form>
    </div>
</div>


