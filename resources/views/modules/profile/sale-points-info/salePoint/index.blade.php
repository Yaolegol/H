<div class="profile-sale-points-info-sale-point">
    <h4>Торговая точка {{$salePoint['number']}}</h4>
    <form action="/profile/sale-points-info" method="POST">
        @csrf
        <input name="sale-point-number" type="hidden" value="{{$salePoint['number']}}">
        <div class="profile-sale-points-info-sale-point__info-title">Название:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'title',
                        'placeholder' => 'Title',
                        'type' => 'text',
                        'value' => $salePoint['title']
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('organization-name'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Адрес:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'address',
                        'placeholder' => 'Address',
                        'type' => 'text',
                        'value' => $salePoint['address']
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('address'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Режим работы:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'working_hours',
                        'placeholder' => 'Working hours',
                        'type' => 'text',
                        'value' => $salePoint['working_hours']
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('working_hours'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Контактное лицо:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'contact_person',
                        'placeholder' => 'Contact person',
                        'type' => 'text',
                        'value' => $salePoint['contact_person']
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('contact_person'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Телефон:</div>
        <div class="profile-sale-points-info-sale-point__input-container">
            @include('components.inputs.form.index', [
                        'name' => 'phone',
                        'placeholder' => 'Phone',
                        'type' => 'tel',
                        'value' => $salePoint['phone']
                    ])
            @include('components.form.error.index', [
                'message' => $errors->first('phone'),
            ])
        </div>
        <div class="profile-sale-points-info-sale-point__info-title">Фото:</div>
        <div class="profile-sale-points-info-sale-point__send-button-container">
            <button class="profile-sale-points-info-sale-point__send-button">Сохранить</button>
        </div>
        @include('components.form.error.index', [
            'message' => session('commonError'),
        ])
    </form>
</div>
