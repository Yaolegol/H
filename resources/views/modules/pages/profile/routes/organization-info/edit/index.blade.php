@component('modules.pages.profile.common.components.header.index', ['activeTab' => 'organization-info'])
    @component('modules.pages.profile.common.components.body.create.index', [
            'backLink' => '/profile/organization-info',
            'backTitle' => 'Смотреть все мои организации',
            'title' => 'Изменить данные об организации'
        ])
        <form
            action="/profile/organization-info/{{$organizationItemData['id']}}"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            @method('PUT')

            @component('modules.pages.profile.common.components.container.form-field.index', ['title' => 'Наименование:'])
                @include('components.inputs.form.index', [
                                'name' => 'title',
                                'placeholder' => 'Organization name',
                                'type' => 'text',
                                'value' => $organizationItemData['title'],
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
                            'value' => $organizationItemData['inn'],
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
                            'value' => $organizationItemData['legal_address'],
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
                            'value' => $organizationItemData['real_address'],
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
                            'value' => $organizationItemData['email'],
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
                            'value' => $organizationItemData['phone'],
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone-phone'),
                ])
            @endcomponent

            @component('modules.pages.profile.common.components.container.section.index', ['title' => 'Свидетельтва, выданные организации'])
                @component('modules.pages.profile.common.components.container.file-field.index')
                    @include('components.inputs.file.item.index', [
                                        'imageSrc' => $organizationItemData['certificate_1'],
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
                                        'imageSrc' => $organizationItemData['certificate_2'],
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
                                        'imageSrc' => $organizationItemData['certificate_3'],
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
                                        'imageSrc' => $organizationItemData['certificate_4'],
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
                                        'imageSrc' => $organizationItemData['certificate_5'],
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
                                        'imageSrc' => $organizationItemData['photo_1'],
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
                                        'imageSrc' => $organizationItemData['photo_2'],
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
                                        'imageSrc' => $organizationItemData['photo_3'],
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
