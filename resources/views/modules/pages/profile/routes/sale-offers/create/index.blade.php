@component('modules.pages.profile.common.components.body.create.index', [
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

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Категория:'])
            @include('components.inputs.radio.group-first-level.index', [
                        'groupName' => 'radio-group__catalog_level_one',
                        'itemsList' => $catalogCategoriesList,
                        'inputName' => 'catalog_level_one_id',
                    ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index')
            @include('components.inputs.radio.group-second-level.index', [
                        'contentList' => $catalogSubCategoriesList,
                        'inputsName' => 'catalog_level_two_id',
                        'listenGroupName' => 'radio-group__catalog_level_one',
                        'title' => 'Подкатегория'
                    ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Регион:'])
            @include('components.inputs.radio.group-first-level.index', [
                        'groupName' => 'radio-group__region',
                        'itemsList' => $regionList,
                        'inputName' => 'region_id',
                    ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index')
            @include('components.inputs.radio.group-second-level.index', [
                    'contentList' => $citiesList,
                    'inputsName' => 'city_id',
                    'listenGroupName' => 'radio-group__region',
                    'title' => 'Город'
                ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Заголовок:'])
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

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Описание:'])
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

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Адрес (где можно купить Вашу продукцию):'])
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

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Торговые точки (информацию о торговых точках можно добавить в соответствующем разделе Вашего профиля):'])
            @foreach($salePointsList as $salePointItem)
                @include('components.checkboxes.map.index', [
                    'map_marker_lat' => $salePointItem['map_marker_lat'],
                    'map_marker_lng' => $salePointItem['map_marker_lng'],
                    'name' => "sale-point_$loop->index",
                    'title' => $salePointItem['title'],
                    'value' => $salePointItem['id']
                ])
            @endforeach
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Карта:'])
            @include('components.map.2gis.components.add-marker.index')
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Телефон:'])
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

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Цена:'])
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

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Организация:'])
            @include('components.inputs.radio.group-first-level.index', [
                                'groupName' => 'radio-group__organization',
                                'itemsList' => $organizationsList,
                                'inputName' => 'organization_id',
                            ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.section.index', ['title' => 'Фотографии товара'])
            @component('modules.pages.profile.common.components.container.file-field.index')
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

            @component('modules.pages.profile.common.components.container.file-field.index')
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

            @component('modules.pages.profile.common.components.container.file-field.index')
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

        @include('modules.pages.profile.common.components.footer.index')
    </form>
@endcomponent
