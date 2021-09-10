<div class="profile--sale-points-info--create">
    <div class="profile--sale-points-info--create__all-points-link-container">
        <a
            class="profile--sale-points-info--create__all-points-link"
            href="/profile/sale-points-info"
        >
            Смотреть все мои торговые точки
        </a>
    </div>
    <div class="profile--sale-points-info--create__title-container">
        <h1>Добавить торговую точку</h1>
    </div>
    <div class="profile--sale-points-info--create__form-container">
        <form action="/profile/sale-points-info" method="POST">
            @csrf
            <div class="profile--sale-points-info--create__info-title">Название:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'title',
                            'placeholder' => 'Title',
                            'type' => 'text',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('organization-name'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">Адрес:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'address',
                            'placeholder' => 'Address',
                            'type' => 'text',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('address'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">Режим работы:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'working_hours',
                            'placeholder' => 'Working hours',
                            'type' => 'text',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('working_hours'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">Контактное лицо:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'contact_person',
                            'placeholder' => 'Contact person',
                            'type' => 'text',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('contact_person'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">Телефон:</div>
            <div class="profile--sale-points-info--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'phone',
                            'placeholder' => 'Phone',
                            'type' => 'tel',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone'),
                ])
            </div>
            <div class="profile--sale-points-info--create__info-title">Фото:</div>
            <div class="profile--sale-points-info--create__send-button-container">
                <button class="profile--sale-points-info--create__send-button">Сохранить</button>
            </div>
            @include('components.form.error.index', [
                'message' => session('commonError'),
            ])
        </form>
    </div>
</div>
