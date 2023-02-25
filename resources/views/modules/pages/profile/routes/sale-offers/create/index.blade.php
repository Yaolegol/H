@component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-offers'])
    @component('modules.pages.profile.common.components.body.create.index', [
            'backLink' => '/profile/sale-offers',
            'backTitle' => 'Смотреть все мои торговые предложения',
            'title' => 'Добавить торговое предложение'
        ])
        <form
            action="/profile/sale-offers"
            class="form"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Категория:',
            ])
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
                            'required' => true,
                            'title' => 'Подкатегория',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('catalog_level_two_id'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Название товара:'
                ])
                @include('components.inputs.form.index', [
                                'name' => 'title',
                                'placeholder' => 'Название товара',
                                'required' => true,
                                'type' => 'text',
                                'value' => ''
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('title'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Описание товара:'])
                @include('components.inputs.form.index', [
                                'name' => 'description',
                                'placeholder' => 'Описание товара',
                                'type' => 'text',
                                'value' => '',
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
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('contact_person'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Телефон:'
                ])
                @include('components.inputs.form.index', [
                                'name' => 'phone',
                                'placeholder' => 'Телефон',
                                'required' => true,
                                'type' => 'tel',
                                'value' => '',
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
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('working_hours'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Цена:'
            ])
                @include('components.inputs.form.index', [
                                'name' => 'price',
                                'placeholder' => 'Цена',
                                'required' => true,
                                'type' => 'number',
                                'value' => '',
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
                                'value' => '',
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('address'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Кликните на карте (адрес, указанный выше):'
            ])
                @include('modules.common.map.yandex.components.add-marker.index', [
                    'required' => true,
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Торговые точки (информацию о торговых точках можно добавить в разделе Вашего профиля - "Торговые точки"):'])
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
@endcomponent
