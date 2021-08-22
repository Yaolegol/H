@php
    $catalogCategoriesList = array_map(function($catalogItem) {
        return [
            'id' => $catalogItem['id'],
            'title' => $catalogItem['title'],
            'value' => $catalogItem['id'],
        ];
    }, $catalogFull);

    $catalogSubCategoriesList = array_map(function($catalogItem) {
        return [
            'id' => $catalogItem['id'],
            'content' => $catalogItem['content'],
        ];
    }, $catalogFull);
@endphp
<div class="profile--sale-offers--create">
    <div class="profile--sale-offers--create__all-offers-link-container">
        <a
            class="profile--sale-offers--create__all-offers-link"
            href="/profile/sale-offers"
        >
            Смотреть все мои торговые предложения
        </a>
    </div>
    <div class="profile--sale-offers--create__title-container">
        <h1>Добавить торговое предложение</h1>
    </div>
    <div class="profile--sale-offers--create__form-container">
        <form action="/profile/sale-offers" method="POST">
            @csrf
            <div class="profile--sale-offers--create__form-item-container">
                <div class="profile--sale-offers--create__info-title">Выберите категорию:</div>
                <div class="profile--sale-offers--create__categories-container">
                    @include('components.inputs.radio.group.index', [
                        'itemsList' => $catalogCategoriesList,
                        'name' => 'category',
                    ])
                </div>
            </div>
            <div class="profile--sale-offers--create__form-item-container">
                @include('modules.profile.sale-offers.create.subcategory.index', [
                    'catalogSubCategoriesList' => $catalogSubCategoriesList
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Наименование:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'title',
                            'placeholder' => 'Organization name',
                            'type' => 'text',
                            'value' => ''
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('title'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">ИНН:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'inn',
                            'placeholder' => 'Inn',
                            'type' => 'number',
                            'value' => '',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('inn'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Юридический адрес:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'legal_address',
                            'placeholder' => 'Legal address',
                            'type' => 'text',
                            'value' => '',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('legal_address'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Фактический адрес:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'real_address',
                            'placeholder' => 'Real address',
                            'type' => 'text',
                            'value' => '',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('real_address'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Email:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'email',
                            'placeholder' => 'Organization email',
                            'type' => 'email',
                            'value' => '',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('email'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Телефон:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.inputs.form.index', [
                            'name' => 'phone',
                            'placeholder' => 'Organization-phone',
                            'type' => 'tel',
                            'value' => '',
                        ])
                @include('components.form.error.index', [
                    'message' => $errors->first('phone-phone'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Свидетельства:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.form.error.index', [
                    'message' => $errors->first('organization-phone'),
                ])
            </div>
            <div class="profile--sale-offers--create__info-title">Фото:</div>
            <div class="profile--sale-offers--create__input-container">
                @include('components.form.error.index', [
                    'message' => $errors->first('organization-phone'),
                ])
            </div>
            <div class="profile--sale-offers--create__send-button-container">
                <button class="profile--sale-offers--create__send-button">Сохранить</button>
            </div>
            @include('components.form.error.index', [
                'message' => session('commonError'),
            ])
        </form>
    </div>
</div>


