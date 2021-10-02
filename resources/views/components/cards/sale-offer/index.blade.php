<div class="cards--sale-point">
    <div class="cards--sale-offer__item-container cards--sale-offer__item-container_without-offset">
        <div class="cards--sale-offer__title">Название</div>
        <div class="cards--sale-offer__value">{{$saleOffer['title']}}</div>
    </div>
    <div class="cards--sale-offer__item-container">
        <div class="cards--sale-offer__title">Описание</div>
        <div class="cards--sale-offer__value">{{$saleOffer['description']}}</div>
    </div>
    <div class="cards--sale-offer__item-container">
        <div class="cards--sale-offer__title">Адрес</div>
        <div class="cards--sale-offer__value">{{$saleOffer['address']}}</div>
    </div>
    <div class="cards--sale-offer__item-container">
        <div class="cards--sale-offer__title">Телефон</div>
        <div class="cards--sale-offer__value">{{$saleOffer['phone']}}</div>
    </div>
    <div class="cards--sale-offer__item-container">
        <div class="cards--sale-offer__title">Цена</div>
        <div class="cards--sale-offer__value">{{$saleOffer['price']}}</div>
    </div>
    <div class="cards--sale-offer__item-container">
        <div class="cards--sale-offer__title">Фото</div>
        <div class="cards--sale-offer__image-list-container">
            @if($saleOffer['photo_1'])
                <div class="cards--sale-offer__image-item-container">
                    <img alt="" class="cards--sale-offer__image" src="{{$saleOffer['photo_1']}}">
                </div>
            @endif
            @if($saleOffer['photo_2'])
                <div class="cards--sale-offer__image-item-container">
                    <img alt="" class="cards--sale-offer__image" src="{{$saleOffer['photo_2']}}">
                </div>
            @endif
            @if($saleOffer['photo_3'])
                <div class="cards--sale-offer__image-item-container">
                    <img alt="" class="cards--sale-offer__image" src="{{$saleOffer['photo_3']}}">
                </div>
            @endif
        </div>
    </div>
    <div class="cards--sale-offer__item-container cards--sale-offer__item-container_service">
        <div class="cards--sale-offer__edit-button-container">
            <a class="cards--sale-offer__link cards--sale-offer__link_edit" href="./sale-offers/edit">Изменить</a>
        </div>
        <div class="cards--sale-offer__remove-button-container">
            <a class="cards--sale-offer__link cards--sale-offer__link_remove" href="./sale-offers/destroy/{{$saleOffer['id']}}">Удалить</a>
        </div>
    </div>
</div>


