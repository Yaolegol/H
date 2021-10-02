<div class="offers-item">
    <div class="offers-item__image-block">
        <img alt="{{$offer['title']}}" class="offers-item__image" src="{{$offer['photo_1']}}">
    </div>
    <div class="offers-item__content-block">
        <div class="offers-item__info-section">
            <div>
                <a href="{{$offer['offerLink']}}">{{$offer['title']}}</a>
            </div>
            <div class="offers-item__product-description">
                <span>{{$offer['description']}}</span>
            </div>
            <div class="offers-item__contacts-block">
                <div>
                    Телефон: 8 111 111 11 11
                </div>
                <div>
                    <span>Продавец: </span><a href="/sellers/{{$offer['user']['id']}}">{{$offer['user']['name']}}</a>
                </div>
            </div>
        </div>
        <div class="offers-item__rating-section">
            <span>Товар: 4.5</span> <span>Продавец: 4.0</span>
        </div>
    </div>
</div>


