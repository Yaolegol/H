<div class="components-cards-organization">
    <div class="components-cards-organization__item-container components-cards-organization__item-container_without-offset">
        <div class="components-cards-organization__title">Название</div>
        <div class="components-cards-organization__value">{{$organization['title']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">ИНН</div>
        <div class="components-cards-organization__value">{{$organization['inn']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Юридический адрес</div>
        <div class="components-cards-organization__value">{{$organization['legal_address']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Фактический адрес</div>
        <div class="components-cards-organization__value">{{$organization['real_address']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Email</div>
        <div class="components-cards-organization__value">{{$organization['email']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Телефон</div>
        <div class="components-cards-organization__value">{{$organization['phone']}}</div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Сертификаты</div>
        <div class="components-cards-organization__image-list-container">
            @if($organization['certificate_1'])
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$organization['certificate_1']}}">
                </div>
            @endif
            @if($organization['certificate_2'])
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$organization['certificate_2']}}">
                </div>
            @endif
            @if($organization['certificate_3'])
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$organization['certificate_3']}}">
                </div>
            @endif
            @if($organization['certificate_4'])
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$organization['certificate_4']}}">
                </div>
            @endif
            @if($organization['certificate_5'])
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$organization['certificate_5']}}">
                </div>
            @endif
        </div>
    </div>
    <div class="components-cards-organization__item-container">
        <div class="components-cards-organization__title">Фото</div>
        <div class="components-cards-organization__image-list-container">
            @if($organization['photo_1'])
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$organization['photo_1']}}">
                </div>
            @endif
            @if($organization['photo_2'])
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$organization['photo_2']}}">
                </div>
            @endif
            @if($organization['photo_3'])
                <div class="components-cards-organization__image-item-container">
                    <img alt="" class="components-cards-organization__image" src="{{$organization['photo_3']}}">
                </div>
            @endif
        </div>
    </div>
    <div class="components-cards-organization__item-container components-cards-organization__item-container_service">
        <div class="components-cards-organization__edit-button-container">
            <a class="components-cards-organization__link components-cards-organization__link_edit" href="./organization-info/edit/{{$organization['id']}}">Изменить</a>
        </div>
        <div class="components-cards-organization__remove-button-container">
            <a class="components-cards-organization__link components-cards-organization__link_remove" href="./organization-info/destroy/{{$organization['id']}}">Удалить</a>
        </div>
    </div>
</div>


