@php
    $catalogCategoriesList = array_map(function($catalogItem) {
        $catalogItemId = $catalogItem['id'];

        return [
            'id' => 'id__radio-input__catalog-level-one__' . $catalogItemId,
            'title' => $catalogItem['title'],
            'value' => $catalogItemId,
        ];
    }, $catalogFull);

    $catalogSubCategoriesList = array_map(function($catalogItem) use($saleOfferItemData) {
        $catalogLevelTwoItemsList = array_map(function($catalogLevelTwoItem) use($saleOfferItemData) {
            $catalogLevelTwoItemId = $catalogLevelTwoItem['id'];

            return [
                'id' => 'id__radio-input__catalog-level-two__' . $catalogLevelTwoItemId,
                'isChecked' => $catalogLevelTwoItemId === $saleOfferItemData['catalog_level_two_id'],
                'title' => $catalogLevelTwoItem['title'],
                'value' => $catalogLevelTwoItemId,
            ];
        }, $catalogItem['catalog_level_two']);

        return [
            'content' => $catalogLevelTwoItemsList,
            'groupName' => 'radio-group__catalog_level_two',
            'inputName' => 'catalog_level_two_id',
            'listenId' => $catalogItem['id'],
        ];
    }, $catalogFull);

    $regionList = array_map(function($regionItem) {
        return [
            'id' => 'id__radio-input__region__' . $regionItem['id'],
            'title' => $regionItem['title'],
            'value' => $regionItem['id'],
        ];
    }, $locationList);

    $citiesList = array_map(function($regionItem) {
        $regionItemCitiesList = array_map(function($cityItem) {
            return [
                'id' => 'id__radio-input__city__' . $cityItem['id'],
                'title' => $cityItem['title'],
                'value' => $cityItem['id'],
            ];
        }, $regionItem['cities']);

        return [
            'content' => $regionItemCitiesList,
            'groupName' => 'radio-group__cities',
            'inputName' => 'city',
            'listenId' => $regionItem['id'],
        ];
    }, $locationList);
@endphp
<div class="profile--sale-offers--edit">
    <div class="profile--sale-offers--edit__all-offers-link-container">
        <a
            class="profile--sale-offers--edit__all-offers-link"
            href="/profile/sale-offers"
        >
            Смотреть все мои торговые предложения
        </a>
    </div>
    <div class="profile--sale-offers--edit__title-container">
        <h1>Редактировать торговое предложение</h1>
    </div>
    <div class="profile--sale-offers--edit__form-container">
        <form
            action="/profile/sale-offers/{{$saleOfferItemData['id']}}"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            @method('PUT')
            <div class="profile--sale-offers--edit__form-item-container">
                <div class="profile--sale-offers--edit__info-title">Категория:</div>
                <div class="profile--sale-offers--edit__categories-container">
                    @include('components.inputs.radio.group.index', [
                        'dispatchEvents' => true,
                        'groupName' => 'radio-group__catalog_level_one',
                        'itemsList' => $catalogCategoriesList,
                        'inputName' => 'catalog_level_one_id',
                    ])
                </div>
            </div>
            <div class="profile--sale-offers--edit__form-item-container">
                @include('components.inputs.radio.content-group.index', [
                    'contentList' => $catalogSubCategoriesList,
                    'listenGroupName' => 'radio-group__catalog_level_one',
                    'title' => 'Подкатегория'
                ])
            </div>
            <div class="profile--sale-offers--edit__form-item-container">
                <div class="profile--sale-offers--edit__info-title">Регион:</div>
                <div class="profile--sale-offers--edit__categories-container">
                    @include('components.inputs.radio.group.index', [
                        'dispatchEvents' => true,
                        'groupName' => 'radio-group__region',
                        'itemsList' => $regionList,
                        'inputName' => 'region_id',
                    ])
                </div>
            </div>
            <div class="profile--sale-offers--edit__form-item-container">
                @include('components.inputs.radio.content-group.index', [
                    'contentList' => $citiesList,
                    'listenGroupName' => 'radio-group__region',
                    'title' => 'Город'
                ])
            </div>
            <div class="profile--sale-offers--edit__info-title">Заголовок:</div>
            <div class="profile--sale-offers--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'title',
                            'placeholder' => 'Title',
                            'type' => 'text',
                            'value' => $saleOfferItemData['title'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('title'),
                ])
            </div>
            <div class="profile--sale-offers--edit__info-title">Описание:</div>
            <div class="profile--sale-offers--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'description',
                            'placeholder' => 'Description',
                            'type' => 'text',
                            'value' => $saleOfferItemData['description'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('description'),
                ])
            </div>
            <div class="profile--sale-offers--edit__info-title">Адрес:</div>
            <div class="profile--sale-offers--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'address',
                            'placeholder' => 'Address',
                            'type' => 'text',
                            'value' => $saleOfferItemData['address'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('address'),
                ])
            </div>
            <div class="profile--sale-offers--edit__info-title">Телефон:</div>
            <div class="profile--sale-offers--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'phone',
                            'placeholder' => 'Organization-phone',
                            'type' => 'tel',
                            'value' => $saleOfferItemData['phone'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone-phone'),
                ])
            </div>
            <div class="profile--sale-offers--edit__info-title">Цена:</div>
            <div class="profile--sale-offers--edit__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'price',
                            'placeholder' => 'Price',
                            'type' => 'number',
                            'value' => $saleOfferItemData['price'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('price'),
                ])
            </div>
            <div class="profile-organization-info__section">
                <h2>Фотографии товара</h2>
                <div class="profile-organization-info__section profile-organization-info__section_add-file">
                    <div class="profile-organization-info__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => $saleOfferItemData['photo_1'],
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
                                    'imageSrc' => $saleOfferItemData['photo_2'],
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
                                    'imageSrc' => $saleOfferItemData['photo_3'],
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
            <div class="profile--sale-offers--edit__send-button-container">
                <button class="profile--sale-offers--edit__send-button">Сохранить</button>
            </div>
            @include('components.form.error.index', [
                'message' => session('commonError'),
            ])
        </form>
    </div>
</div>


