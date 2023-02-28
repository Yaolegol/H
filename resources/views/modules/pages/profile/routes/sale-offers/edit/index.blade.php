@component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-offers'])
    @component('modules.pages.profile.common.components.body.create.index', [
            'backLink' => '/profile/sale-offers',
            'backTitle' => 'Смотреть все мои торговые предложения',
            'title' => 'Редактировать торговое предложение'
        ])
        <form
            action="/profile/sale-offers/{{$saleOfferItemData['id']}}"
            class="form modules-pages-profile-routes-sale-offers-edit"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            @method('PUT')

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Категория:'])
                @include('components.inputs.radio.group-first-level.index', [
                            'groupName' => 'radio-group__catalog_level_one',
                            'itemsList' => $catalogCategoriesList,
                            'inputName' => 'catalog_level_one_id',
                            'required' => true,
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('catalog_level_one_id'),
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
                @include('components.form.error.index', [
                    'message' => $errors->first('catalog_level_two_id'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Название товара:'])
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

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Контактное лицо:'])
                @include('components.inputs.form.index', [
                                'name' => 'contact_person',
                                'placeholder' => 'Контактное лицо',
                                'type' => 'text',
                                'value' => $saleOfferItemData['contact_person'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('contact_person'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Телефон:'])
                @include('components.inputs.form.index', [
                                'name' => 'phone',
                                'placeholder' => 'Телефон',
                                'required' => true,
                                'type' => 'tel',
                                'value' => $saleOfferItemData['phone'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Режим работы:'])
                @include('components.inputs.form.index', [
                                'name' => 'working_hours',
                                'placeholder' => 'Рабочие часы',
                                'type' => 'text',
                                'value' => $saleOfferItemData['working_hours'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('working_hours'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Цена:'])
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
                'required' => true,
                'title' => 'Цена за:'
            ])
                @include('components.inputs.radio.group-first-level.index', [
                    'groupName' => 'radio-group__price-measure',
                    'itemsList' => $measureList,
                    'inputName' => 'measure_id',
                    'required' => true,
                ])
                @include('components.form.error.index', [
                    'message' => $errors->first('measure_id'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'title' => 'Примечание к цене:'
            ])
                @include('components.inputs.textarea.base.index', [
                    'name' => 'price_description',
                    'value' => $saleOfferItemData['price_description'],
                ])
                @include('components.form.error.index', [
                    'message' => $errors->first('price_description'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Адрес (где можно купить Вашу продукцию):'
            ])
                @include('components.inputs.form.index', [
                                'name' => 'address',
                                'placeholder' => 'Адрес',
                                'required' => true,
                                'type' => 'text',
                                'value' => $saleOfferItemData['address'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('address'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Пожалуйста, кликните на карте по адресу, который Вы указали выше, чтобы покупателям было проще Вас найти (это добавит метку на карте):'
            ])
                <div class="modules-pages-profile-routes-sale-offers-edit__map-geo-container">
                    @include('components.buttons.filter.index', [
                        'className' => 'j-modules-common-geo-components-button',
                        'dataset' => [],
                        'defaultTitle' => 'Приблизить карту ко мне',
                        'title' => 'Приблизить карту ко мне',
                    ])
                </div>
                <div class="modules-pages-profile-routes-sale-offers-edit__map-container">
                    @include('modules.common.map.yandex.components.add-marker.index', [
                        'markerLat' => $saleOfferItemData['map_marker_lat'],
                        'markerLng' => $saleOfferItemData['map_marker_lng'],
                        'required' => true,
                    ])
                </div>
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Торговые точки:'])
                @if(count($salePointsList) > 0)
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
                @else
                    <div>Информацию о торговых точках можно добавить в разделе Вашего профиля - "Торговые точки"</div>
                @endif
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Организация:'])
                @if(count($organizationsList) > 0)
                    @include('components.inputs.radio.group-first-level.index', [
                                    'groupName' => 'radio-group__organization',
                                    'itemsList' => $organizationsList,
                                    'inputName' => 'organization_id',
                                ])
                @else
                    <div>Информацию об организации можно добавить в разделе Вашего профиля - "Организации"</div>
                @endif
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
