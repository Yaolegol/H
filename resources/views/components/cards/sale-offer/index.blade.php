<div class="components-cards-sale-offer">
    <div class="components-cards-sale-offer__item-container components-cards-sale-offer__item-container_without-offset">
        <div class="components-cards-sale-offer__title">Название</div>
        <div class="components-cards-sale-offer__value">{{$saleOffer['title']}}</div>
    </div>
    <div class="components-cards-sale-offer__item-container">
        <div class="components-cards-sale-offer__title">Описание</div>
        <div class="components-cards-sale-offer__value">{{$saleOffer['description']}}</div>
    </div>
    <div class="components-cards-sale-offer__item-container">
        <div class="components-cards-sale-offer__title">Адрес</div>
        <div class="components-cards-sale-offer__value">{{$saleOffer['address']}}</div>
    </div>
    <div class="components-cards-sale-offer__item-container">
        <div class="components-cards-sale-offer__title">Телефон</div>
        <div class="components-cards-sale-offer__value">{{$saleOffer['phone']}}</div>
    </div>
    <div class="components-cards-sale-offer__item-container">
        <div class="components-cards-sale-offer__title">Цена</div>
        <div class="components-cards-sale-offer__value">{{$saleOffer['price']}}</div>
    </div>
    @if($saleOffer['organization'])
        <div class="components-cards-sale-offer__item-container">
            <div class="components-cards-sale-offer__title">Организация</div>
            <div class="components-cards-sale-offer__value">{{$saleOffer['organization']['title']}}</div>
        </div>
    @endif
    @if($saleOffer['sale_points'])
        <div class="components-cards-sale-offer__item-container">
            <div class="components-cards-sale-offer__title">Торговые точки</div>
            <div class="components-cards-sale-offer__value">
                @foreach($saleOffer['sale_points'] as $salePointItem)
                    <div>{{$salePointItem['title']}}</div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="components-cards-sale-offer__item-container">
        <div class="components-cards-sale-offer__title">Фото</div>
        <div class="components-cards-sale-offer__image-list-container">
            @if($saleOffer['photo_1'])
                <div class="components-cards-sale-offer__image-item-container">
                    <img alt="" class="components-cards-sale-offer__image" src="{{$saleOffer['photo_1']}}">
                </div>
            @endif
            @if($saleOffer['photo_2'])
                <div class="components-cards-sale-offer__image-item-container">
                    <img alt="" class="components-cards-sale-offer__image" src="{{$saleOffer['photo_2']}}">
                </div>
            @endif
            @if($saleOffer['photo_3'])
                <div class="components-cards-sale-offer__image-item-container">
                    <img alt="" class="components-cards-sale-offer__image" src="{{$saleOffer['photo_3']}}">
                </div>
            @endif
        </div>
    </div>
    <div class="components-cards-sale-offer__item-container components-cards-sale-offer__item-container_service">
        <div class="components-cards-sale-offer__edit-button-container">
            <a class="components-cards-sale-offer__link components-cards-sale-offer__link_edit" href="./sale-offers/edit/{{$saleOffer['id']}}">Изменить</a>
        </div>
        <div class="components-cards-sale-offer__remove-button-container">
            <a class="components-cards-sale-offer__link components-cards-sale-offer__link_remove" href="./sale-offers/destroy/{{$saleOffer['id']}}">Удалить</a>
        </div>
    </div>
</div>


