@component('modules.pages.profile.common.components.body.create.index', [
        'backLink' => '/profile/organization-info',
        'backTitle' => 'Смотреть все мои организации',
        'title' => 'Добавить организацию'
    ])
    <form
        action="/profile/organization-info"
        enctype="multipart/form-data"
        method="POST"
    >
        @csrf

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Наименование:'])
            @include('components.inputs.form.index', [
                            'name' => 'title',
                            'placeholder' => 'Organization name',
                            'type' => 'text',
                        ])
            @include('components.form.error.index', [
                'message' => $errors->first('title'),
            ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'ИНН:'])
            @include('components.inputs.form.index', [
                        'name' => 'inn',
                        'placeholder' => 'Inn',
                        'type' => 'number',
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('inn'),
            ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Юридический адрес:'])
            @include('components.inputs.form.index', [
                        'name' => 'legal_address',
                        'placeholder' => 'Legal address',
                        'type' => 'text',
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('legal_address'),
            ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Фактический адрес:'])
            @include('components.inputs.form.index', [
                        'name' => 'real_address',
                        'placeholder' => 'Real address',
                        'type' => 'text',
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('real_address'),
            ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Email:'])
            @include('components.inputs.form.index', [
                        'name' => 'email',
                        'placeholder' => 'Organization email',
                        'type' => 'email',
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('email'),
            ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Телефон:'])
            @include('components.inputs.form.index', [
                        'name' => 'phone',
                        'placeholder' => 'Organization-phone',
                        'type' => 'tel',
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('phone-phone'),
            ])
        @endcomponent

        @component('modules.pages.profile.common.components.container.section.index', ['title' => 'Свидетельтва, выданные организации'])
                @component('modules.pages.profile.common.components.container.file-field.index')
                    @include('components.inputs.file.item.index', [
                                        'name' => 'certificate_1',
                                        'title' => 'Добавить свидетельство №1',
                                        'withPreviewFile' => true,
                                    ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('certificate_1'),
                    ])
                @endcomponent

                @component('modules.pages.profile.common.components.container.file-field.index')
                    @include('components.inputs.file.item.index', [
                                'name' => 'certificate_2',
                                'title' => 'Добавить свидетельство №2',
                                'withPreviewFile' => true,
                            ])
                    @include('components.form.error.index', [
                        'message' => $errors->first('certificate_2'),
                    ])
                @endcomponent

                @component('modules.pages.profile.common.components.container.file-field.index')
                        @include('components.inputs.file.item.index', [
                                    'name' => 'certificate_3',
                                    'title' => 'Добавить свидетельство №3',
                                    'withPreviewFile' => true,
                                ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('certificate_3'),
                        ])
                @endcomponent

                    @component('modules.pages.profile.common.components.container.file-field.index')
                        @include('components.inputs.file.item.index', [
                                'name' => 'certificate_4',
                                'title' => 'Добавить свидетельство №4',
                                'withPreviewFile' => true,
                            ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('certificate_4'),
                        ])
                    @endcomponent

                    @component('modules.pages.profile.common.components.container.file-field.index')
                        @include('components.inputs.file.item.index', [
                                'name' => 'certificate_5',
                                'title' => 'Добавить свидетельство №5',
                                'withPreviewFile' => true,
                            ])
                        @include('components.form.error.index', [
                            'message' => $errors->first('certificate_5'),
                        ])
                    @endcomponent
        @endcomponent

        @component('modules.pages.profile.common.components.container.section.index', ['title' => 'Фотографии организации'])
            @component('modules.pages.profile.common.components.container.file-field.index')
                @include('components.inputs.file.item.index', [
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
