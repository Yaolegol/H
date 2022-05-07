<div class="modules-pages-offers-shared-components-item">
    <div class="modules-pages-offers-shared-components-item__image-block">
        <div class="modules-pages-offers-shared-components-item__image-container">
            <img alt="{{$offer['title']}}" class="modules-pages-offers-shared-components-item__image" src="{{$offer['photoArray'][0]}}">
            <a class="modules-pages-offers-shared-components-item__image-link" href="{{$offer['offerLink']}}"></a>
        </div>
    </div>
    <div class="modules-pages-offers-shared-components-item__content-block">
        <div class="modules-pages-offers-shared-components-item__info-section">
            <div>
                <a href="{{$offer['offerLink']}}">{{$offer['title']}}</a>
            </div>
            <div class="modules-pages-offers-shared-components-item__description-container">
                <span>{{$offer['description']}}</span>
            </div>
            <div class="modules-pages-offers-shared-components-item__price-container">
                <span>Цена: </span>
                <span class="modules-pages-offers-shared-components-item__price">{{$offer['price']}}</span>
                <span>₽</span>
                @if($offer['measure_id'] !== 4)
                    <span>(за {{$offer['measure']}})</span>
                @endif
            </div>
            <div class="modules-pages-offers-shared-components-item__contacts-block">
                <div>
                    Телефон: <a href="tel:{{$offer['phone']}}">{{$offer['phone']}}</a>
                </div>
                @if($withSeller)
                    <div class="modules-pages-offers-shared-components-item__seller-info-container">
                        <span>Продавец: </span><a href="{{$offer['user']['sellerLink']}}">{{$offer['user']['name']}}</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="modules-pages-offers-shared-components-item__rating-section">
            <span>Товар: 4.5</span> <span>Продавец: 4.0</span>
        </div>
    </div>
    <div class="modules-pages-offers-shared-components-item__service-block">
        @include('modules.pages.favorites.shared.components.button.index', [
            'id' => $offer['id'],
        ])
    </div>
</div>


