@component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-points-info'])
    @component('modules.pages.profile.common.components.body.create.index', [
            'backLink' => '/profile/sale-points-info',
            'backTitle' => 'Смотреть все мои торговые точки',
            'title' => 'Добавить торговую точку'
        ])
        <form
            action="/profile/sale-points-info"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Название:'])
                @include('components.inputs.form.index', [
                                'name' => 'title',
                                'placeholder' => 'Название',
                                'type' => 'text',
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('organization-name'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Адрес:'])
                @include('components.inputs.form.index', [
                                'name' => 'address',
                                'placeholder' => 'Адрес',
                                'type' => 'text',
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('address'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Карта:'])
                @include('components.map.2gis.components.add-marker.index')
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

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Телефон:'])
                @include('components.inputs.form.index', [
                                'name' => 'phone',
                                'placeholder' => 'Телефон',
                                'type' => 'tel',
                            ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.section.index', ['title' => 'Фотографии торговой точки'])
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
