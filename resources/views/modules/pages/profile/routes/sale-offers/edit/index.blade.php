@component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-offers'])
    @component('modules.pages.profile.common.components.body.create.index', [
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

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Категория:'])
                @include('components.inputs.radio.group-first-level.index', [
                            'groupName' => 'radio-group__catalog_level_one',
                            'itemsList' => $catalogCategoriesList,
                            'inputName' => 'catalog_level_one_id',
                            'required' => true,
                        ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index')
                @include('components.inputs.radio.group-second-level.index', [
                            'contentList' => $catalogSubCategoriesList,
                            'inputsName' => 'catalog_level_two_id',
                            'listenGroupName' => 'radio-group__catalog_level_one',
                            'title' => 'Подкатегория',
                            'required' => true,
                        ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Регион:'])
                @include('components.inputs.radio.group-first-level.index', [
                            'groupName' => 'radio-group__region',
                            'itemsList' => $regionList,
                            'inputName' => 'region_id',
                            'required' => true,
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
                                'placeholder' => 'Название товара',
                                'required' => true,
                                'type' => 'text',
                                'value' => $saleOfferItemData['title'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('title'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Описание:'])
                @include('components.inputs.form.index', [
                                'name' => 'description',
                                'placeholder' => 'Описание товара',
                                'type' => 'text',
                                'value' => $saleOfferItemData['description'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('description'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Адрес (где можно купить Вашу продукцию):'])
                @include('components.inputs.form.index', [
                                'name' => 'address',
                                'placeholder' => 'Адрес',
                                'type' => 'text',
                                'value' => $saleOfferItemData['address'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('address'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Торговые точки (информацию о торговых точках можно добавить в соответствующем разделе Вашего профиля):'])
                @foreach($salePointsList as $salePointItem)
                    @include('components.checkboxes.map.index', [
                        'isChecked' => $salePointItem['active'],
                        'map_marker_lat' => $salePointItem['map_marker_lat'],
                        'map_marker_lng' => $salePointItem['map_marker_lng'],
                        'name' => "sale-point_$loop->index",
                        'title' => $salePointItem['title'],
                        'value' => $salePointItem['id']
                    ])
                @endforeach
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Карта:'])
                @include('components.map.2gis.components.add-marker.index', [
                    'markerLat' => $saleOfferItemData['map_marker_lat'],
                    'markerLng' => $saleOfferItemData['map_marker_lng'],
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Телефон:'])
                @include('components.inputs.form.index', [
                                'name' => 'phone',
                                'placeholder' => 'Телефон',
                                'required' => true,
                                'type' => 'tel',
                                'value' => $saleOfferItemData['phone'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone-phone'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Цена:'])
                @include('components.inputs.form.index', [
                                'name' => 'price',
                                'placeholder' => 'Цена',
                                'required' => true,
                                'type' => 'number',
                                'value' => $saleOfferItemData['price'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('price'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'title' => 'Цена за:'
            ])
                @include('components.inputs.radio.group-first-level.index', [
                    'groupName' => 'radio-group__price-measure',
                    'itemsList' => $measureList,
                    'inputName' => 'measure_id',
                    'required' => true,
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'title' => 'Примечание к цене:'
            ])
                @include('components.inputs.textarea.base.index', [
                    'name' => 'price_description',
                    'value' => $saleOfferItemData['price_description'],
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Организация:'])
                @foreach($organizationsList as $organizationItem)
                    @include('components.inputs.radio.item.index', [
                            'isChecked' => $organizationItem['isChecked'] ?? false,
                            'name' => 'organization_id',
                            'title' => $organizationItem['title'],
                            'value' => $organizationItem['value'],
                        ])
                @endforeach
            @endcomponent

            @component('modules.pages.profile.common.components.container.section.index', ['title' => 'Фотографии товара'])
                @component('modules.pages.profile.common.components.container.file-field.index')
                    @include('components.inputs.file.item.index', [
                                        'imageSrc' => $saleOfferItemData['photoArray'][0] ?? '',
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
                                        'imageSrc' => $saleOfferItemData['photoArray'][1] ?? '',
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
                                        'imageSrc' => $saleOfferItemData['photoArray'][2] ?? '',
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
@endcomponent
