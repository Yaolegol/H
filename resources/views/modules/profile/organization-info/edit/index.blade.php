<div class="profile--sale-points-info--edit">
    <div class="profile--sale-points-info--edit__all-points-link-container">
        <a
            class="profile--sale-points-info--edit__all-points-link"
            href="/profile/sale-points-info"
        >
            Смотреть все мои торговые точки
        </a>
    </div>
    <div class="profile--sale-points-info--edit__title-container">
        <h2>Изменить данные о торговой точке</h2>
    </div>
    <div class="profile--sale-points-info--edit__form-container">
        <form
            action="/profile/sale-points-info/{{$salePointItemData['id']}}"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            @method('PUT')
            <div class="profile--sale-points-info--edit__info-title">Название:</div>
            <div class="profile--sale-points-info--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'title',
                            'placeholder' => 'Title',
                            'type' => 'text',
                            'value' => $salePointItemData['title'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('organization-name'),
                ])
            </div>
            <div class="profile--sale-points-info--edit__info-title">Адрес:</div>
            <div class="profile--sale-points-info--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'address',
                            'placeholder' => 'Address',
                            'type' => 'text',
                            'value' => $salePointItemData['address'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('address'),
                ])
            </div>
            <div class="profile--sale-points-info--edit__info-title">Режим работы:</div>
            <div class="profile--sale-points-info--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'working_hours',
                            'placeholder' => 'Working hours',
                            'type' => 'text',
                            'value' => $salePointItemData['working_hours'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('working_hours'),
                ])
            </div>
            <div class="profile--sale-points-info--edit__info-title">Контактное лицо:</div>
            <div class="profile--sale-points-info--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'contact_person',
                            'placeholder' => 'Contact person',
                            'type' => 'text',
                            'value' => $salePointItemData['contact_person'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('contact_person'),
                ])
            </div>
            <div class="profile--sale-points-info--edit__info-title">Телефон:</div>
            <div class="profile--sale-points-info--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'phone',
                            'placeholder' => 'Phone',
                            'type' => 'tel',
                            'value' => $salePointItemData['phone'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone'),
                ])
            </div>
            <div class="profile-organization-info__section">
                <h2>Фотографии торговой точки</h2>
                <div class="profile-organization-info__section profile-organization-info__section_add-file">
                    <div class="profile-organization-info__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $salePointItemData['photo_1'],
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
                                    'imageSrc' => $salePointItemData['photo_2'],
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
                                    'imageSrc' => $salePointItemData['photo_3'],
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
