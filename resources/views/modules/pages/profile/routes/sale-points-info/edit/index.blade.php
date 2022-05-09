@component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-points-info'])
    @component('modules.pages.profile.common.components.body.create.index', [
            'backLink' => '/profile/sale-points-info',
            'backTitle' => 'Смотреть все мои торговые точки',
            'title' => 'Изменить данные о торговой точке'
        ])
        <form
            action="/profile/sale-points-info/{{$salePointItemData['id']}}"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            @method('PUT')

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Название:'])
                @include('components.inputs.form.index', [
                                'name' => 'title',
                                'placeholder' => 'Название',
                                'required' => true,
                                'type' => 'text',
                                'value' => $salePointItemData['title'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('organization-name'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', [
                'required' => true,
                'title' => 'Адрес:'])
                @include('components.inputs.form.index', [
                                'name' => 'address',
                                'placeholder' => 'Адрес',
                                'required' => true,
                                'type' => 'text',
                                'value' => $salePointItemData['address'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('address'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Карта:'])
                @include('components.map.2gis.components.add-marker.index', [
                    'markerLat' => $salePointItemData['map_marker_lat'],
                    'markerLng' => $salePointItemData['map_marker_lng'],
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Режим работы:'])
                @include('components.inputs.form.index', [
                                'name' => 'working_hours',
                                'placeholder' => 'Рабочие часы',
                                'type' => 'text',
                                'value' => $salePointItemData['working_hours'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('working_hours'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Контактное лицо:'])
                @include('components.inputs.form.index', [
                                'name' => 'contact_person',
                                'placeholder' => 'Контактное лицо',
                                'type' => 'text',
                                'value' => $salePointItemData['contact_person'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('contact_person'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Телефон:'])
                @include('components.inputs.form.index', [
                                'name' => 'phone',
                                'placeholder' => 'Телефон',
                                'type' => 'tel',
                                'value' => $salePointItemData['phone'],
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.section.index', ['title' => 'Фотографии торговой точки'])
                @component('modules.pages.profile.common.components.container.file-field.index')
                    @include('components.inputs.file.item.index', [
                                        'imageSrc' => $salePointItemData['photoArray'][0] ?? '',
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
                                        'imageSrc' => $salePointItemData['photoArray'][1] ?? '',
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
                                        'imageSrc' => $salePointItemData['photoArray'][2] ?? '',
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
