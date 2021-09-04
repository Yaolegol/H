<div class="profile-organization-info">
    <div class="profile-organization-info__content-container">
        <div class="profile-organization-info__organization-data-container">
            <div class="profile-organization-info__section profile-organization-info__section_without-offset">
                <h2>Общая информация об организации</h2>
                <form action="/profile/organization-info" method="POST">
                    @csrf
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
                    <div class="profile-organization-info__send-button-container">
                        <button class="profile-organization-info__send-button">Сохранить</button>
                    </div>
                    @include('components.form.error.index', [
                        'message' => session('commonError'),
                    ])
                </form>
            </div>
            <div class="profile-organization-info__section">
                <h2>Свидетельтва, выданные организации</h2>
                <form action="/profile/organization-info" method="POST">
                    @csrf
                    <div class="profile-organization-info__info-title">
                        <div class="profile-organization-info__input-container">
                            @include('components.inputs.file.group.index', [
                                'groupName' => 'certificate',
                                'name' => 'certificate',
                                'title' => 'Добавить свидетельство',
                            ])
                            @include('components.form.error.index', [
                                'message' => $errors->first('certificate'),
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
{{--            <div class="profile-organization-info__section">--}}
{{--                <h2>Фотографии организации</h2>--}}
{{--                <form action="/profile/organization-info" method="POST">--}}
{{--                    @csrf--}}
{{--                    <div class="profile-organization-info__info-title">--}}
{{--                        <div class="profile-organization-info__input-container">--}}
{{--                            @include('components.inputs.file.group.index', [--}}
{{--                                'name' => 'photo',--}}
{{--                                'title' => 'Добавить фото',--}}
{{--                            ])--}}
{{--                            @include('components.form.error.index', [--}}
{{--                                'message' => $errors->first('photo'),--}}
{{--                            ])--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="profile-organization-info__send-button-container">--}}
{{--                        <button class="profile-organization-info__send-button">Сохранить</button>--}}
{{--                    </div>--}}
{{--                    @include('components.form.error.index', [--}}
{{--                        'message' => session('commonError'),--}}
{{--                    ])--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    </div>
</div>


