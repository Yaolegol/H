<div class="profile--sale-points-info--edit">
    <div class="profile--sale-points-info--edit__all-points-link-container">
        <a
            class="profile--sale-points-info--edit__all-points-link"
            href="/profile/organization-info"
        >
            Смотреть все мои организации
        </a>
    </div>
    <div class="profile--sale-points-info--edit__title-container">
        <h2>Изменить данные об организации</h2>
    </div>
    <div class="profile--sale-points-info--edit__form-container">
        <form
            action="/profile/organization-info/{{$organizationItemData['id']}}"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            @method('PUT')
            <div class="profile--sale-points-info--create__info-title">Наименование:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'title',
                            'placeholder' => 'Organization name',
                            'type' => 'text',
                            'value' => $organizationItemData['title'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('title'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">ИНН:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'inn',
                            'placeholder' => 'Inn',
                            'type' => 'number',
                            'value' => $organizationItemData['inn'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('inn'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">Юридический адрес:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'legal_address',
                            'placeholder' => 'Legal address',
                            'type' => 'text',
                            'value' => $organizationItemData['legal_address'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('legal_address'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">Фактический адрес:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'real_address',
                            'placeholder' => 'Real address',
                            'type' => 'text',
                            'value' => $organizationItemData['real_address'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('real_address'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">Email:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'email',
                            'placeholder' => 'Organization email',
                            'type' => 'email',
                            'value' => $organizationItemData['email'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('email'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">Телефон:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'phone',
                            'placeholder' => 'Organization-phone',
                            'type' => 'tel',
                            'value' => $organizationItemData['phone'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone-phone'),
                ])
            </div>
            <div class="profile-organization-info__section">
                <h2>Свидетельтва, выданные организации</h2>
                <div class="profile-organization-info__section profile-organization-info__section_add-file">
                    <div class="profile--sale-points-info--create__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationItemData['certificate_1'],
                                    'name' => 'certificate_1',
                                    'title' => 'Добавить свидетельство №1',
                                    'withPreviewFile' => true,
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('certificate_1'),
                        ])
                    </div>
                    <div class="profile--sale-points-info--create__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationItemData['certificate_2'],
                                    'name' => 'certificate_2',
                                    'title' => 'Добавить свидетельство №2',
                                    'withPreviewFile' => true,
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('certificate_2'),
                        ])
                    </div>
                    <div class="profile--sale-points-info--create__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationItemData['certificate_3'],
                                    'name' => 'certificate_3',
                                    'title' => 'Добавить свидетельство №3',
                                    'withPreviewFile' => true,
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('certificate_3'),
                        ])
                    </div>
                    <div class="profile--sale-points-info--create__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationItemData['certificate_4'],
                                    'name' => 'certificate_4',
                                    'title' => 'Добавить свидетельство №4',
                                    'withPreviewFile' => true,
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('certificate_4'),
                        ])
                    </div>
                    <div class="profile--sale-points-info--create__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationItemData['certificate_5'],
                                    'name' => 'certificate_5',
                                    'title' => 'Добавить свидетельство №5',
                                    'withPreviewFile' => true,
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('certificate_5'),
                        ])
                    </div>
                </div>
            </div>
            <div class="profile-organization-info__section">
                <h2>Фотографии организации</h2>
                <div class="profile-organization-info__section profile-organization-info__section_add-file">
                    <div class="profile--sale-points-info--create__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationItemData['photo_1'],
                                    'name' => 'photo_1',
                                    'title' => 'Добавить фото №1',
                                    'withPreviewFile' => true,
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('photo_1'),
                        ])
                    </div>
                    <div class="profile--sale-points-info--create__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationItemData['photo_2'],
                                    'name' => 'photo_2',
                                    'title' => 'Добавить фото №2',
                                    'withPreviewFile' => true,
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('photo_2'),
                        ])
                    </div>
                    <div class="profile--sale-points-info--create__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationItemData['photo_3'],
                                    'name' => 'photo_3',
                                    'title' => 'Добавить фото №3',
                                    'withPreviewFile' => true,
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('photo_3'),
                        ])
                    </div>
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
