<div class="cards--organization">
    <div class="cards--organization__item-container cards--organization__item-container_without-offset">
        <div class="cards--organization__title">Название</div>
        <div class="cards--organization__value">{{$organization['title']}}</div>
    </div>
    <div class="cards--organization__item-container">
        <div class="cards--organization__title">ИНН</div>
        <div class="cards--organization__value">{{$organization['inn']}}</div>
    </div>
    <div class="cards--organization__item-container">
        <div class="cards--organization__title">Юридический адрес</div>
        <div class="cards--organization__value">{{$organization['legal_address']}}</div>
    </div>
    <div class="cards--organization__item-container">
        <div class="cards--organization__title">Фактический адрес</div>
        <div class="cards--organization__value">{{$organization['real_address']}}</div>
    </div>
    <div class="cards--organization__item-container">
        <div class="cards--organization__title">Email</div>
        <div class="cards--organization__value">{{$organization['email']}}</div>
    </div>
    <div class="cards--organization__item-container">
        <div class="cards--organization__title">Телефон</div>
        <div class="cards--organization__value">{{$organization['phone']}}</div>
    </div>
    <div class="cards--organization__item-container">
        <div class="cards--organization__title">Сертификаты</div>
        <div class="cards--organization__image-list-container">
            @if($organization['certificate_1'])
                <div class="cards--organization__image-item-container">
                    <img alt="" class="cards--organization__image" src="{{$organization['certificate_1']}}">
                </div>
            @endif
            @if($organization['certificate_2'])
                <div class="cards--organization__image-item-container">
                    <img alt="" class="cards--organization__image" src="{{$organization['certificate_2']}}">
                </div>
            @endif
            @if($organization['certificate_3'])
                <div class="cards--organization__image-item-container">
                    <img alt="" class="cards--organization__image" src="{{$organization['certificate_3']}}">
                </div>
            @endif
            @if($organization['certificate_4'])
                <div class="cards--organization__image-item-container">
                    <img alt="" class="cards--organization__image" src="{{$organization['certificate_4']}}">
                </div>
            @endif
            @if($organization['certificate_5'])
                <div class="cards--organization__image-item-container">
                    <img alt="" class="cards--organization__image" src="{{$organization['certificate_5']}}">
                </div>
            @endif
        </div>
    </div>
    <div class="cards--organization__item-container">
        <div class="cards--organization__title">Фото</div>
        <div class="cards--organization__image-list-container">
            @if($organization['photo_1'])
                <div class="cards--organization__image-item-container">
                    <img alt="" class="cards--organization__image" src="{{$organization['photo_1']}}">
                </div>
            @endif
            @if($organization['photo_2'])
                <div class="cards--organization__image-item-container">
                    <img alt="" class="cards--organization__image" src="{{$organization['photo_2']}}">
                </div>
            @endif
            @if($organization['photo_3'])
                <div class="cards--organization__image-item-container">
                    <img alt="" class="cards--organization__image" src="{{$organization['photo_3']}}">
                </div>
            @endif
        </div>
    </div>
    <div class="cards--organization__item-container cards--organization__item-container_service">
        <div class="cards--organization__edit-button-container">
            <a class="cards--organization__link cards--organization__link_edit" href="./sale-points-info/edit/{{$organization['id']}}">Изменить</a>
        </div>
        <div class="cards--organization__remove-button-container">
            <a class="cards--organization__link cards--organization__link_remove" href="./sale-points-info/destroy/{{$organization['id']}}">Удалить</a>
        </div>
    </div>
</div>


