<div class="cards--sale-point">
    <div class="cards--sale-point__item-container cards--sale-point__item-container_without-offset">
        <div class="cards--sale-point__title">Название</div>
        <div class="cards--sale-point__value">{{$salePoint['title']}}</div>
    </div>
    <div class="cards--sale-point__item-container">
        <div class="cards--sale-point__title">Адрес</div>
        <div class="cards--sale-point__value">{{$salePoint['address']}}</div>
    </div>
    <div class="cards--sale-point__item-container">
        <div class="cards--sale-point__title">Режим работы</div>
        <div class="cards--sale-point__value">{{$salePoint['working_hours']}}</div>
    </div>
    <div class="cards--sale-point__item-container">
        <div class="cards--sale-point__title">Контактное лицо</div>
        <div class="cards--sale-point__value">{{$salePoint['contact_person']}}</div>
    </div>
    <div class="cards--sale-point__item-container">
        <div class="cards--sale-point__title">Телефон</div>
        <div class="cards--sale-point__value">{{$salePoint['phone']}}</div>
    </div>
    <div class="cards--sale-point__item-container">
        <div class="cards--sale-point__title">Фото</div>
        <div class="cards--sale-point__image-list-container">
            @if($salePoint['photo_1'])
                <div class="cards--sale-point__image-item-container">
                    <img alt="" class="cards--sale-point__image" src="{{$salePoint['photo_1']}}">
                </div>
            @endif
            @if($salePoint['photo_2'])
                <div class="cards--sale-point__image-item-container">
                    <img alt="" class="cards--sale-point__image" src="{{$salePoint['photo_2']}}">
                </div>
            @endif
            @if($salePoint['photo_3'])
                <div class="cards--sale-point__image-item-container">
                    <img alt="" class="cards--sale-point__image" src="{{$salePoint['photo_3']}}">
                </div>
            @endif
        </div>
    </div>
    <div class="cards--sale-point__item-container cards--sale-point__item-container_service">
        <div class="cards--sale-point__edit-button-container">
            <a class="cards--sale-point__link cards--sale-point__link_edit" href="./sale-points-info/edit/{{$salePoint['id']}}">Изменить</a>
        </div>
        <div class="cards--sale-point__remove-button-container">
            <a class="cards--sale-point__link cards--sale-point__link_remove" href="./sale-points-info/destroy/{{$salePoint['id']}}">Удалить</a>
        </div>
    </div>
</div>


