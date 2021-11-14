<div class="offers-item">
    <div class="offers-item__image-block">
        <img alt="{{$offer['title']}}" class="offers-item__image" src="{{$offer['photo_1']}}">
        <a class="offers-item__image-link" href="{{$offer['offerLink']}}"></a>
    </div>
    <div class="offers-item__content-block">
        <div class="offers-item__info-section">
            <div>
                <a href="{{$offer['offerLink']}}">{{$offer['title']}}</a>
            </div>
            <div class="offers-item__description-container">
                <span>{{$offer['description']}}</span>
            </div>
            <div class="offers-item__price-container">
                <span>Цена: </span><span>{{$offer['price']}}</span>
            </div>
            <div class="offers-item__contacts-block">
                <div>
                    Телефон: <a href="tel:{{$offer['phone']}}">{{$offer['phone']}}</a>
                </div>
                <div class="offers-item__seller-info-container">
                    <span>Продавец: </span><a href="/sellers/{{$offer['user']['id']}}">{{$offer['user']['name']}}</a>
                </div>
            </div>
        </div>
        <div class="offers-item__rating-section">
            <span>Товар: 4.5</span> <span>Продавец: 4.0</span>
        </div>
    </div>
</div>


