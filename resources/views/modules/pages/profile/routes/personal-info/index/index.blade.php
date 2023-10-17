<div>
    @component('modules.pages.profile.common.components.header.index', ['activeTab' => 'personal-info'])
        <div class="modules-pages-profile-routes-personal-info-index">
            <div class="modules-pages-profile-routes-personal-info-index__image-block">
                <div class="modules-pages-profile-routes-personal-info-index__image-container">
                    <img alt="Photo" class="modules-pages-profile-routes-personal-info-index__image" src="{{$userData['avatar'] ? $userData['avatar'] : '/build/icons/person.svg'}}">
                </div>
            </div>
            <div class="modules-pages-profile-routes-personal-info-index__content-block">
                <div class="modules-pages-profile-routes-personal-info-index__content-container">
                    <div class="modules-pages-profile-routes-personal-info-index__personal-data-container">
                        <div class="modules-pages-profile-routes-personal-info-index__title-container">
                            <h4>Личные данные</h4>
                            <div>(отображаются для других пользователей)</div>
                        </div>
                        @if($userData['is_changed'])
                            <div class="modules-pages-profile-routes-personal-info-index__approve-container">
                                @if($userData['approved_error_message'])
                                    <div class="modules-pages-profile-routes-personal-info-index__moderation-label modules-pages-profile-routes-personal-info-index__moderation-label_reject">
                                        Ваше сообщение отклонено
                                        <div class="modules-pages-profile-routes-personal-info-index__moderation-hint">
                                            <div>К сожалению, Ваше сообщение отклонено</div>
                                            <div class="modules-pages-profile-routes-personal-info-index__moderation-hint-container">Причина отклонения:</div>
                                            <div class="modules-pages-profile-routes-personal-info-index__moderation-hint-container">
                                                {{$userData['approved_error_message']}}
                                            </div>
                                            <div class="modules-pages-profile-routes-personal-info-index__moderation-hint-container">
                                                Как исправить?
                                            </div>
                                            <div class="modules-pages-profile-routes-personal-info-index__moderation-hint-container">
                                                Вы можете отредактировать сообщение и оно сново будет отправлено в очередь на публикацию
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="modules-pages-profile-routes-personal-info-index__moderation-label {{$userData['is_approved'] ? 'modules-pages-profile-routes-personal-info-index__moderation-label_approved' : ''}}">
                                        {{$userData['is_approved'] ? 'Сохранено' : 'Обрабатывается'}}
                                        <div class="modules-pages-profile-routes-personal-info-index__moderation-hint">
                                            <div>Поздравляем!</div>
                                            <div class="modules-pages-profile-routes-personal-info-index__moderation-hint-container">Ваше сообщение обрабатывается и скоро будет сохранено!</div>
                                            <div class="modules-pages-profile-routes-personal-info-index__moderation-hint-container">Обычно это занимает не более дня</div>
                                            <div class="modules-pages-profile-routes-personal-info-index__moderation-hint-container">Спасибо за терпение!</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        <form
                            action="/profile/personal-info/edit-personal-data"
                            enctype="multipart/form-data"
                            method="POST"
                        >
                            @csrf
                            <div class="modules-pages-profile-routes-personal-info-index__info-title">Ваше имя:</div>
                            <div class="modules-pages-profile-routes-personal-info-index__input-container">
                                @include('components.inputs.form.index', [
                                            'name' => 'name',
                                            'placeholder' => 'Имя',
                                            'type' => 'text',
                                            'value' => $userData['name']
                                        ])
                                @include('components.form.error.index', [
                                    'message' => $errors->first('name'),
                                ])
                            </div>
                            <div class="modules-pages-profile-routes-personal-info-index__info-title">О себе:</div>
                            <div class="modules-pages-profile-routes-personal-info-index__input-container">
                                @include('components.inputs.form.index', [
                                            'name' => 'description',
                                            'placeholder' => 'О себе',
                                            'type' => 'text',
                                            'value' => $userData['description']
                                        ])
                                @include('components.form.error.index', [
                                    'message' => $errors->first('description'),
                                ])
                            </div>
                            <div class="modules-pages-profile-routes-personal-info-index__photo-block">
                                <div class="modules-pages-profile-routes-personal-info-index__info-title">Фото профиля:</div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-title-description">*не более 10MB</div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-description">
                                    <div class="modules-pages-profile-routes-personal-info-index__input-container">
                                        @include('components.inputs.file.item.index', [
                                            'imageSrc' => $userData['avatar'],
                                            'name' => 'avatar',
                                            'title' => 'Добавить фото',
                                            'withPreviewFile' => true,
                                        ])
                                        @include('components.form.error.index', [
                                            'message' => $errors->first('avatar'),
                                        ])
                                    </div>
                                </div>
                            </div>
                            <div class="modules-pages-profile-routes-personal-info-index__send-button-container">
                                <button class="button j-components-click-block">Сохранить</button>
                            </div>
                            <div class="modules-pages-profile-routes-personal-info-index__info-container-required">
                                <div>* Для сохранения необходимо заполнить поле</div>
                            </div>
                            @include('components.form.error.index', [
                                'message' => session('commonError'),
                            ])
                        </form>
                    </div>
                    <div class="modules-pages-profile-routes-personal-info-index__section-container">
                        <div class="modules-pages-profile-routes-personal-info-index__change-password-container">
                            <div class="modules-pages-profile-routes-personal-info-index__title-container">
                                <h4>Изменить пароль</h4>
                                <div>* отмечены обязательные для заполнения поля</div>
                            </div>
                            <form
                                action="/profile/personal-info/edit-password"
                                method="POST"
                            >
                                @csrf
                                <div class="modules-pages-profile-routes-personal-info-index__info-title">Текущий пароль: *</div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-description">
                                    <div class="modules-pages-profile-routes-personal-info-index__input-container">
                                        @include('components.inputs.form.index', [
                                        'name' => 'current_password',
                                        'placeholder' => 'Текущий пароль',
                                        'required' => true,
                                        'type' => 'password'
                                    ])
                                        @include('components.form.error.index', [
                                            'message' => $errors->first('current_password'),
                                        ])
                                    </div>
                                </div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-title">Новый пароль: *</div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-description">
                                    <div class="modules-pages-profile-routes-personal-info-index__input-container">
                                        @include('components.inputs.form.index', [
                                        'name' => 'password',
                                        'placeholder' => 'Новый пароль',
                                        'required' => true,
                                        'type' => 'password'
                                    ])
                                        @include('components.form.error.index', [
                                            'message' => $errors->first('password'),
                                        ])
                                    </div>
                                </div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-title">Подтверждение нового пароля: *</div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-description">
                                    <div class="modules-pages-profile-routes-personal-info-index__input-container">
                                        @include('components.inputs.form.index', [
                                        'name' => 'password_confirmation',
                                        'placeholder' => 'Подтверждение нового пароля',
                                        'required' => true,
                                        'type' => 'password'
                                    ])
                                        @include('components.form.error.index', [
                                            'message' => $errors->first('password_confirmation'),
                                        ])
                                    </div>
                                </div>
                                <div class="modules-pages-profile-routes-personal-info-index__send-button-container">
                                    <button class="button j-components-click-block">Сохранить</button>
                                </div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-container-required">
                                    <div>* Для сохранения необходимо заполнить все обязательные поля</div>
                                </div>
                                @include('components.form.error.index', [
                                    'message' => session('commonChangePasswordError'),
                                ])
                            </form>
                        </div>
                    </div>
                    <div class="modules-pages-profile-routes-personal-info-index__section-container modules-pages-profile-routes-personal-info-index__section-container_large-offset">
                        <div class="modules-pages-profile-routes-personal-info-index__change-password-container">
                            <div class="modules-pages-profile-routes-personal-info-index__title-container">
                                <h4 class="modules-pages-profile-routes-personal-info-index__title">Удалить профиль</h4>
                                <div>* отмечены обязательные для заполнения поля</div>
                                <div class="modules-pages-profile-routes-personal-info-index__delete-description">После удаления профиля будут удалены все Ваши организации, торговые точки, торговые предложения и иная информация!</div>
                            </div>
                            <form
                                action="/profile/personal-info/destroy"
                                method="POST"
                            >
                                @csrf
                                <div class="modules-pages-profile-routes-personal-info-index__info-title">Текущий пароль: *</div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-description">
                                    <div class="modules-pages-profile-routes-personal-info-index__input-container">
                                        @include('components.inputs.form.index', [
                                        'name' => 'current_password',
                                        'placeholder' => 'Текущий пароль',
                                        'required' => true,
                                        'type' => 'password'
                                    ])
                                        @include('components.form.error.index', [
                                            'message' => $errors->first('current_password'),
                                        ])
                                    </div>
                                </div>
                                <div class="modules-pages-profile-routes-personal-info-index__send-button-container">
                                    <button class="button button_hover_red j-components-click-block">Удалить</button>
                                </div>
                                <div class="modules-pages-profile-routes-personal-info-index__info-container-required">
                                    <div>* Для удаления необходимо заполнить все обязательные поля</div>
                                </div>
                                @include('components.form.error.index', [
                                    'message' => session('commonDestroyError'),
                                ])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcomponent
</div>
