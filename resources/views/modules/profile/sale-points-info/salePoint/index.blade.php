<div class="profile-sale-points-info-sale-point">
    <h4>Торговая точка {{$index + 1}}</h4>
    <form action="/profile/sale-points-info" method="POST">
        @csrf
        <input name="form-section" type="hidden" value="change-sale-point-data">
        <div class="profile-sale-points-info-sale-point__info-title">Наименование:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'organization-name',
                        'placeholder' => 'Organization name',
                        'type' => 'text',
                        'value' => old('organization-name')
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('organization-name'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Адрес:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'real-address',
                        'placeholder' => 'Real address',
                        'type' => 'text',
                        'value' => old('real-address')
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('real-address'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Режим работы:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'phone',
                        'placeholder' => 'Phone',
                        'type' => 'tel',
                        'value' => ''
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('phone'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Контактное лицо:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'name',
                        'placeholder' => 'Name',
                        'type' => 'text',
                        'value' => ''
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('name'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Телефон:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'phone',
                        'placeholder' => 'Phone',
                        'type' => 'tel',
                        'value' => ''
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('phone'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Фото:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.form.error.index', [
                'message' => $errors->first('organization-phone'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__send-button-container">
            <button class="profile-sale-points-info-sale-point__send-button">Сохранить</button>
        </div>
        @include('components.form.error.index', [
            'message' => session('commonError'),
        ])
    </form>
</div>
