<div class="profile--sale-points-info--create">
    <div class="profile--sale-points-info--create__all-points-link-container">
        <a
            class="profile--sale-points-info--create__all-points-link"
            href="/profile/organization-info"
        >
            Смотреть все мои организации
        </a>
    </div>
    <div class="profile--sale-points-info--create__title-container">
        <h2>Добавить организацию</h2>
    </div>
    <div class="profile--sale-points-info--create__form-container">
        <form
            action="/profile/organization-info"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            <div class="profile--sale-points-info--create__info-title">Наименование:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'title',
                            'placeholder' => 'Organization name',
                            'type' => 'text',
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
