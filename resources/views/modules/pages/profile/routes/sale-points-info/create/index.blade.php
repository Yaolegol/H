<div>
    @component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-points-info'])
        @component('modules.pages.profile.common.components.body.create.index', [
                'backLink' => '/profile/sale-points-info',
                'backTitle' => 'Смотреть все мои торговые точки',
                'title' => 'Добавить торговую точку'
            ])
            <form
                action="/profile/sale-points-info"
                class="form modules-pages-profile-routes-sale-points-create"
                enctype="multipart/form-data"
                method="POST"
            >
                @csrf

                @component('modules.pages.profile.common.components.container.form-field.index', [
                    'required' => true,
                    'title' => 'Название:'])
                    @include('components.inputs.form.index', [
                                    'name' => 'title',
                                    'placeholder' => 'Название',
                                    'required' => true,
                                    'type' => 'text',
                                ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('title'),
                    ])
                @endcomponent

                @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Описание:'])
                    @include('components.inputs.form.index', [
                                    'name' => 'description',
                                    'placeholder' => 'Описание',
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
                    'title' => 'Телефон:'
                    ])
                    @include('components.inputs.form.index', [
                                    'name' => 'phone',
                                    'placeholder' => 'Телефон',
                                    'type' => 'tel',
                                    'value' => old('phone'),
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
                    'title' => 'Адрес:'])
                    @include('components.inputs.form.index', [
                                    'name' => 'address',
                                    'placeholder' => 'Адрес',
                                    'required' => true,
                                    'type' => 'text',
                                ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('address'),
                    ])
                @endcomponent

                @component('modules.pages.profile.common.components.container.form-field.index', [
                    'required' => true,
                    'title' => 'Пожалуйста, кликните на карте по адресу, который Вы указали выше, чтобы покупателям было проще Вас найти (это добавит метку на карте):'
                ])
                    <div class="modules-pages-profile-routes-sale-points-create__map-geo-container">
                        @include('components.buttons.filter.index', [
                            'className' => 'j-modules-common-geo-components-button',
                            'dataset' => [],
                            'defaultTitle' => 'Приблизить карту ко мне',
                            'title' => 'Приблизить карту ко мне',
                        ])
                    </div>
                    <div class="modules-pages-profile-routes-sale-points-create__map-container">
                        @include('modules.common.map.yandex.components.add-marker.index', [
                            'required' => true,
                        ])
                    </div>
                @endcomponent

                @component('modules.pages.profile.common.components.container.section.index', [
                    'description' => '*Не более 10MB каждая',
                    'title' => 'Фотографии торговой точки'
                ])
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
</div>
