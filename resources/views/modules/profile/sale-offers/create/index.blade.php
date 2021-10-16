@php
    $catalogCategoriesList = array_map(function($catalogItem) {
        return [
            'id' => 'id__radio-input__catalog-level-one__' . $catalogItem['id'],
            'title' => $catalogItem['title'],
            'value' => $catalogItem['id'],
        ];
    }, $catalogFull);

    $catalogSubCategoriesList = array_map(function($catalogItem) {
        $catalogLevelTwoItemsList = array_map(function($catalogLevelTwoItem) {
            return [
                'id' => 'id__radio-input__catalog-level-two__' . $catalogLevelTwoItem['id'],
                'title' => $catalogLevelTwoItem['title'],
                'value' => $catalogLevelTwoItem['id'],
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
            'inputName' => 'city_id',
            'listenId' => $regionItem['id'],
        ];
    }, $locationList);
@endphp
<div class="profile--sale-offers--create">
    <div class="profile--sale-offers--create__all-offers-link-container">
        <a
            class="profile--sale-offers--create__all-offers-link"
            href="/profile/sale-offers"
        >
            Смотреть все мои торговые предложения
        </a>
    </div>
    <div class="profile--sale-offers--create__title-container">
        <h1>Добавить торговое предложение</h1>
    </div>
    <div class="profile--sale-offers--create__form-container">
        <form
            action="/profile/sale-offers"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            <div class="profile--sale-offers--create__form-item-container">
                <div class="profile--sale-offers--create__info-title">Категория:</div>
                <div class="profile--sale-offers--create__categories-container">
                    @include('components.inputs.radio.group.index', [
                        'dispatchEvents' => true,
                        'groupName' => 'radio-group__catalog_level_one',
                        'itemsList' => $catalogCategoriesList,
                        'inputName' => 'catalog_level_one_id',
                    ])
                </div>
            </div>
            <div class="profile--sale-offers--create__form-item-container">
                @include('components.inputs.radio.content-group.index', [
                    'contentList' => $catalogSubCategoriesList,
                    'listenGroupName' => 'radio-group__catalog_level_one',
                    'title' => 'Подкатегория'
                ])
            </div>
            <div class="profile--sale-offers--create__form-item-container">
                <div class="profile--sale-offers--create__info-title">Регион:</div>
                <div class="profile--sale-offers--create__categories-container">
                    @include('components.inputs.radio.group.index', [
                        'dispatchEvents' => true,
                        'groupName' => 'radio-group__region',
                        'itemsList' => $regionList,
                        'inputName' => 'region_id',
                    ])
                </div>
            </div>
            <div class="profile--sale-offers--create__form-item-container">
                @include('components.inputs.radio.content-group.index', [
                    'contentList' => $citiesList,
                    'listenGroupName' => 'radio-group__region',
                    'title' => 'Город'
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Заголовок:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'title',
                            'placeholder' => 'Title',
                            'type' => 'text',
                            'value' => ''
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('title'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Описание:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'description',
                            'placeholder' => 'Description',
                            'type' => 'text',
                            'value' => '',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('description'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Адрес:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'address',
                            'placeholder' => 'Address',
                            'type' => 'text',
                            'value' => '',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('address'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Карта:</div>
            <div
                class="profile--sale-offers--create__input-container"
                id="leaflet-map"
                style="height: 500px;"
            >

            </div>
            <div class="profile--sale-offers--create__info-title">Телефон:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'phone',
                            'placeholder' => 'Organization-phone',
                            'type' => 'tel',
                            'value' => '',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone-phone'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Цена:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'price',
                            'placeholder' => 'Price',
                            'type' => 'number',
                            'value' => '',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('price'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Организация:</div>
            <div class="profile--sale-offers--create__input-container">
                @foreach($organizationsList as $organizationItem)
                    <div class="profile--sale-offers--create__categories-container">
                        @include('components.inputs.radio.item.index', [
                            'id' => $organizationItem['id'],
                            'name' => 'organization_id',
                            'title' => $organizationItem['title'],
                            'value' => $organizationItem['id'],
                        ])
                    </div>
                @endforeach
            </div>
            <div class="profile--sale-offers--create__info-title">Торговые точки:</div>
            <div class="profile--sale-offers--create__input-container">
                @foreach($salePointsList as $salePointItem)
                    <label>
                        <input
                            name="sale-point_{{$loop->index}}"
                            type="checkbox"
                            value="{{$salePointItem['id']}}"
                        >
                        <span>{{$salePointItem['title']}}</span>
                    </label>
                @endforeach
            </div>
            <div class="profile-organization-info__section">
                <h2>Фотографии товара</h2>
                <div class="profile-organization-info__section profile-organization-info__section_add-file">
                    <div class="profile-organization-info__input-container">
                        @include('components.inputs.file.item.index', [
                                    'imageSrc' => '',
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
                                    'imageSrc' => '',
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
                                    'imageSrc' => '',
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
            <div class="profile--sale-offers--create__send-button-container">
                <button class="profile--sale-offers--create__send-button">Сохранить</button>
            </div>
            @include('components.form.error.index', [
                'message' => session('commonError'),
            ])
        </form>
    </div>
</div>


