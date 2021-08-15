<div class="profile-organization-info">
    <div class="profile-organization-info__content-container">
        <div class="profile-organization-info__organization-data-container">
            <h2>Данные об организации</h2>
            <form action="/profile/organization-info" method="POST">
                @csrf
                <input name="form-section" type="hidden" value="change-organization-data">
                <div class="profile-organization-info__info-title">Наименование:</div>
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
                <div class="profile-organization-info__info-title">ИНН:</div>
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
                <div class="profile-organization-info__info-title">Юридический адрес:</div>
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
                <div class="profile-organization-info__info-title">Фактический адрес:</div>
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
                <div class="profile-organization-info__info-title">Email:</div>
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
                <div class="profile-organization-info__info-title">Телефон:</div>
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
                <div class="profile-organization-info__info-title">Свидетельства:</div>
                <div class="profile-organization-info__input-container">
                    @include('components.form.error.index', [
                        'message' => $errors->first('organization-phone'),
                    ])
                </div>
                <div class="profile-organization-info__info-title">Фото:</div>
                <div class="profile-organization-info__input-container">
                    @include('components.form.error.index', [
                        'message' => $errors->first('organization-phone'),
                    ])
                </div>
                <div class="profile-organization-info__send-button-container">
                    <button class="profile-organization-info__send-button">Сохранить</button>
                </div>
                @include('components.form.error.index', [
                    'message' => session('commonError'),
                ])
            </form>
        </div>
        <div class="profile-organization-info__sale-points-data-container">
            <h2>Данные о торговых точках организации</h2>
            <form action="/profile/organization-info" method="POST">
                @csrf
                <input name="form-section" type="hidden" value="change-sale-point-data">
                <div class="profile-organization-info__info-title">Наименование:</div>
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
                <div class="profile-organization-info__info-title">Адрес:</div>
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
                <div class="profile-organization-info__info-title">Режим работы:</div>
                <div class="profile-organization-info__input-container">
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
                <div class="profile-organization-info__info-title">Контактное лицо:</div>
                <div class="profile-organization-info__input-container">
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
                <div class="profile-organization-info__info-title">Телефон:</div>
                <div class="profile-organization-info__input-container">
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
                <div class="profile-organization-info__info-title">Фото:</div>
                <div class="profile-organization-info__input-container">
                    @include('components.form.error.index', [
                        'message' => $errors->first('organization-phone'),
                    ])
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
</div>


