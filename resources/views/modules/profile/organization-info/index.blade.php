<div class="profile-organization-info">
    <div class="profile-organization-info__content-container">
        <div class="profile-organization-info__organization-data-container">
            <div class="profile-organization-info__section profile-organization-info__section_without-offset">
                <h2>Общая информация об организации</h2>
                <form
                    action="/profile/organization-info"
                    enctype="multipart/form-data"
                    method="POST"
                >
                    @csrf
                    <input name="section" type="hidden" value="info">
                    <div class="profile-organization-info__info-title">Наименование:</div>
                    <div class="profile-organization-info__input-container">
                        @include('components.inputs.form.index', [
                                    'name' => 'title',
                                    'placeholder' => 'Organization name',
                                    'type' => 'text',
                                    'value' => $organizationData['title']
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('title'),
                        ])
                    </div>
                    <div class="profile-organization-info__info-title">ИНН:</div>
                    <div class="profile-organization-info__input-container">
                        @include('components.inputs.form.index', [
                                    'name' => 'inn',
                                    'placeholder' => 'Inn',
                                    'type' => 'number',
                                    'value' => $organizationData['inn'],
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('inn'),
                        ])
                    </div>
                    <div class="profile-organization-info__info-title">Юридический адрес:</div>
                    <div class="profile-organization-info__input-container">
                        @include('components.inputs.form.index', [
                                    'name' => 'legal_address',
                                    'placeholder' => 'Legal address',
                                    'type' => 'text',
                                    'value' => $organizationData['legal_address'],
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('legal_address'),
                        ])
                    </div>
                    <div class="profile-organization-info__info-title">Фактический адрес:</div>
                    <div class="profile-organization-info__input-container">
                        @include('components.inputs.form.index', [
                                    'name' => 'real_address',
                                    'placeholder' => 'Real address',
                                    'type' => 'text',
                                    'value' => $organizationData['real_address'],
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('real_address'),
                        ])
                    </div>
                    <div class="profile-organization-info__info-title">Email:</div>
                    <div class="profile-organization-info__input-container">
                        @include('components.inputs.form.index', [
                                    'name' => 'email',
                                    'placeholder' => 'Organization email',
                                    'type' => 'email',
                                    'value' => $organizationData['email'],
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('email'),
                        ])
                    </div>
                    <div class="profile-organization-info__info-title">Телефон:</div>
                    <div class="profile-organization-info__input-container">
                        @include('components.inputs.form.index', [
                                    'name' => 'phone',
                                    'placeholder' => 'Organization-phone',
                                    'type' => 'tel',
                                    'value' => $organizationData['phone'],
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('phone-phone'),
                        ])
                    </div>
                    <div class="profile-organization-info__section">
                        <h2>Свидетельтва, выданные организации</h2>
                        <div class="profile-organization-info__section profile-organization-info__section_add-file">
                            <div class="profile-organization-info__input-container">
                                @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationData['certificate_1'],
                                    'name' => 'certificate_1',
                                    'title' => 'Добавить свидетельство №1',
                                    'withPreviewFile' => true,
                                ])
                                @include('components.form.error.index', [
                                    'message' => $errors->first('certificate_1'),
                                ])
                            </div>
                            <div class="profile-organization-info__input-container">
                                @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationData['certificate_2'],
                                    'name' => 'certificate_2',
                                    'title' => 'Добавить свидетельство №2',
                                    'withPreviewFile' => true,
                                ])
                                @include('components.form.error.index', [
                                    'message' => $errors->first('certificate_2'),
                                ])
                            </div>
                            <div class="profile-organization-info__input-container">
                                @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationData['certificate_3'],
                                    'name' => 'certificate_3',
                                    'title' => 'Добавить свидетельство №3',
                                    'withPreviewFile' => true,
                                ])
                                @include('components.form.error.index', [
                                    'message' => $errors->first('certificate_3'),
                                ])
                            </div>
                            <div class="profile-organization-info__input-container">
                                @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationData['certificate_4'],
                                    'name' => 'certificate_4',
                                    'title' => 'Добавить свидетельство №4',
                                    'withPreviewFile' => true,
                                ])
                                @include('components.form.error.index', [
                                    'message' => $errors->first('certificate_4'),
                                ])
                            </div>
                            <div class="profile-organization-info__input-container">
                                @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationData['certificate_5'],
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
                            <div class="profile-organization-info__input-container">
                                @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationData['photo_1'],
                                    'name' => 'photo_1',
                                    'title' => 'Добавить фото №1',
                                    'withPreviewFile' => true,
                                ])
                                @include('components.form.error.index', [
                                    'message' => $errors->first('photo_1'),
                                ])
                            </div>
                            <div class="profile-organization-info__input-container">
                                @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationData['photo_2'],
                                    'name' => 'photo_2',
                                    'title' => 'Добавить фото №2',
                                    'withPreviewFile' => true,
                                ])
                                @include('components.form.error.index', [
                                    'message' => $errors->first('photo_2'),
                                ])
                            </div>
                            <div class="profile-organization-info__input-container">
                                @include('components.inputs.file.item.index', [
                                    'imageSrc' => $organizationData['photo_3'],
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
                    @include('components.form.error.index', [
                        'message' => session('commonError'),
                    ])
                    <div class="profile-organization-info__send-button-container">
                        <button class="profile-organization-info__send-button">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


