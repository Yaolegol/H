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

@component('modules.profile.common.body.create.index', [
        'backLink' => '/profile/sale-offers',
        'backTitle' => 'Смотреть все мои торговые предложения',
        'title' => 'Добавить торговое предложение'
    ])
    <form
        action="/profile/sale-offers"
        enctype="multipart/form-data"
        method="POST"
    >
        @csrf

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
                            'value' => ''
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
                            'value' => '',
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
                            'value' => '',
                        ])
            @include('components.form.error.index', [
                'message' => $errors->first('address'),
            ])
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Торговые точки (информацию о торговых точках можно добавить в соответствующем разделе Вашего профиля):'])
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
        @endcomponent





        @component('modules.profile.common.container.form-field.index', ['title' => 'Карта:'])
            @include('components.map.2gis.add-marker.index')
        @endcomponent

        @component('modules.profile.common.container.form-field.index', ['title' => 'Телефон:'])
            @include('components.inputs.form.index', [
                            'name' => 'phone',
                            'placeholder' => 'Organization-phone',
                            'type' => 'tel',
                            'value' => '',
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
                            'value' => '',
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
                                    'imageSrc' => '',
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
                                        'imageSrc' => '',
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
                                        'imageSrc' => '',
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
