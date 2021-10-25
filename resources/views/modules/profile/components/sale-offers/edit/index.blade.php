@php
    $catalogCategoriesList = array_map(function($catalogLevelOneItem) use($saleOfferItemData) {
        $catalogLevelOneItemId = $catalogLevelOneItem['id'];
        $saleOfferItemDataCatalogId = $saleOfferItemData['catalog_level_two_id'];
        $catalogLevelTwoItemsList = $catalogLevelOneItem['catalog_level_two'];

        $isChecked = false;

        foreach ($catalogLevelTwoItemsList as $catalogLevelTwoItem) {
            $catalogLevelTwoItemId = $catalogLevelTwoItem['id'];

            if($catalogLevelTwoItemId === $saleOfferItemDataCatalogId) {
                $isChecked = true;
            }
        }

        return [
            'id' => 'id__radio-input__catalog-level-one__' . $catalogLevelOneItemId,
            'isChecked' => $isChecked,
            'title' => $catalogLevelOneItem['title'],
            'value' => $catalogLevelOneItemId,
        ];
    }, $catalogFull);

    $catalogSubCategoriesList = array_map(function($catalogLevelOneItem) use($saleOfferItemData) {
        $catalogLevelTwoItemsList = array_map(function($catalogLevelTwoItem) use($saleOfferItemData) {
            $catalogLevelTwoItemId = $catalogLevelTwoItem['id'];
            $saleOfferItemDataCatalogId = $saleOfferItemData['catalog_level_two_id'];

            return [
                'id' => 'id__radio-input__catalog-level-two__' . $catalogLevelTwoItemId,
                'isChecked' => $catalogLevelTwoItemId === $saleOfferItemDataCatalogId,
                'title' => $catalogLevelTwoItem['title'],
                'value' => $catalogLevelTwoItemId,
            ];
        }, $catalogLevelOneItem['catalog_level_two']);

        return [
            'content' => $catalogLevelTwoItemsList,
            'groupName' => 'radio-group__catalog_level_two',
            'inputName' => 'catalog_level_two_id',
            'listenId' => $catalogLevelOneItem['id'],
        ];
    }, $catalogFull);

    $regionList = array_map(function($regionItem) use($saleOfferItemData) {
        $regionItemId = $regionItem['id'];
        $saleOfferItemDataRegionId = $saleOfferItemData['region_id'];

        return [
            'id' => 'id__radio-input__region__' . $regionItemId,
            'isChecked' => $regionItemId === $saleOfferItemDataRegionId,
            'title' => $regionItem['title'],
            'value' => $regionItemId,
        ];
    }, $locationList);

    $citiesList = array_map(function($regionItem) use($saleOfferItemData) {
        $regionItemCitiesList = array_map(function($cityItem) use($saleOfferItemData) {
            $cityItemId = $cityItem['id'];
            $saleOfferItemDataCityId = $saleOfferItemData['city_id'];

            return [
                'id' => 'id__radio-input__city__' . $cityItemId,
                'isChecked' => $cityItemId === $saleOfferItemDataCityId,
                'title' => $cityItem['title'],
                'value' => $cityItemId,
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


@component('modules.profile.common.body.create.index', [
        'backLink' => '/profile/sale-offers',
        'backTitle' => 'Смотреть все мои торговые предложения',
        'title' => 'Редактировать торговое предложение'
    ])
    <form
        action="/profile/sale-offers/{{$saleOfferItemData['id']}}"
        enctype="multipart/form-data"
        method="POST"
    >
        @csrf
        @method('PUT')

        @component('modules.profile.common.container.form-field.index', ['title' => 'Категория:'])
            @include('components.inputs.radio.group.index', [
                        'dispatchEvents' => true,
                        'groupName' => 'radio-group__catalog_level_one',
                        'itemsList' => $catalogCategoriesList,
                        'inputName' => 'catalog_level_one_id',
                    ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index')
            @include('components.inputs.radio.content-group.index', [
                        'contentList' => $catalogSubCategoriesList,
                        'listenGroupName' => 'radio-group__catalog_level_one',
                        'title' => 'Подкатегория'
                    ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Регион:'])
            @include('components.inputs.radio.group.index', [
                        'dispatchEvents' => true,
                        'groupName' => 'radio-group__region',
                        'itemsList' => $regionList,
                        'inputName' => 'region_id',
                    ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index')
            @include('components.inputs.radio.content-group.index', [
                    'contentList' => $citiesList,
                    'listenGroupName' => 'radio-group__region',
                    'title' => 'Город'
                ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Заголовок:'])
            @include('components.inputs.form.index', [
                            'name' => 'title',
                            'placeholder' => 'Title',
                            'type' => 'text',
                            'value' => $saleOfferItemData['title'],
                        ])
            @include('components.form.error.index', [
                'message' => $errors->first('title'),
            ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Описание:'])
            @include('components.inputs.form.index', [
                            'name' => 'description',
                            'placeholder' => 'Description',
                            'type' => 'text',
                            'value' => $saleOfferItemData['description'],
                        ])
            @include('components.form.error.index', [
                'message' => $errors->first('description'),
            ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Адрес (где можно купить Вашу продукцию):'])
            @include('components.inputs.form.index', [
                            'name' => 'address',
                            'placeholder' => 'Address',
                            'type' => 'text',
                            'value' => $saleOfferItemData['address'],
                        ])
            @include('components.form.error.index', [
                'message' => $errors->first('address'),
            ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Торговые точки (информацию о торговых точках можно добавить в соответствующем разделе Вашего профиля):'])
            @foreach($salePointsList as $salePointItem)
                <label>
                    <input
                        @if($salePointItem['active'])
                            checked
                        @endif
                        name="sale-point_{{$loop->index}}"
                        type="checkbox"
                        value="{{$salePointItem['id']}}"
                    >
                    <span>{{$salePointItem['title']}}</span>
                </label>
            @endforeach
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Карта:'])
            @include('components.map.2gis.add-marker.index')
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Телефон:'])
            @include('components.inputs.form.index', [
                            'name' => 'phone',
                            'placeholder' => 'Organization-phone',
                            'type' => 'tel',
                            'value' => $saleOfferItemData['phone'],
                        ])
            @include('components.form.error.index', [
                'message' => $errors->first('phone-phone'),
            ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Цена:'])
            @include('components.inputs.form.index', [
                            'name' => 'price',
                            'placeholder' => 'Price',
                            'type' => 'number',
                            'value' => $saleOfferItemData['price'],
                        ])
            @include('components.form.error.index', [
                'message' => $errors->first('price'),
            ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Организация:'])
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
        @endcomponent

        @component('modules.profile.common.container.section.index', ['title' => 'Фотографии товара'])
            @component('modules.profile.common.container.file-field.index')
                @include('components.inputs.file.item.index', [
                                    'imageSrc' => $saleOfferItemData['photo_1'],
                                    'name' => 'photo_1',
                                    'title' => 'Добавить фото №1',
                                    'withPreviewFile' => true,
                                ])
                @include('components.form.error.index', [
                    'message' => $errors->first('photo_1'),
                ])
            @endcomponent

            @component('modules.profile.common.container.file-field.index')
                    @include('components.inputs.file.item.index', [
                                        'imageSrc' => $saleOfferItemData['photo_2'],
                                        'name' => 'photo_2',
                                        'title' => 'Добавить фото №2',
                                        'withPreviewFile' => true,
                                    ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('photo_2'),
                    ])
            @endcomponent

            @component('modules.profile.common.container.file-field.index')
                    @include('components.inputs.file.item.index', [
                                        'imageSrc' => $saleOfferItemData['photo_3'],
                                        'name' => 'photo_3',
                                        'title' => 'Добавить фото №3',
                                        'withPreviewFile' => true,
                                    ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('photo_3'),
                    ])
            @endcomponent
        @endcomponent

        @include('modules.profile.common.footer.index')
    </form>
@endcomponent
