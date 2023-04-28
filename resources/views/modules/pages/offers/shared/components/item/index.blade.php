<div class="modules-pages-offers-shared-components-item">
    <div class="modules-pages-offers-shared-components-item__image-block">
        <div class="modules-pages-offers-shared-components-item__image-container">
            <img alt="{{$offer['title']}}" class="modules-pages-offers-shared-components-item__image" src="{{$offer['photoArray'][0] ?? ''}}">
            <a class="modules-pages-offers-shared-components-item__image-link" href="{{$offer['offerLink']}}"></a>
        </div>
    </div>
    <div class="modules-pages-offers-shared-components-item__content-block">
        <div class="modules-pages-offers-shared-components-item__info-section">
            <div>
                <a
                    class="modules-pages-offers-shared-components-item__product-link"
                    href="{{$offer['offerLink']}}"
                >{{$offer['title']}}</a>
            </div>
            <div class="modules-pages-offers-shared-components-item__description-container">
                {{$offer['description']}}
            </div>
            <div class="modules-pages-offers-shared-components-item__price-container">
                <span class="modules-pages-offers-shared-components-item__title">Цена: </span>
                <span class="modules-pages-offers-shared-components-item__price">{{$offer['price']}}</span>
            </div>
            <div class="modules-pages-offers-shared-components-item__contacts-block">
                <div class="modules-pages-offers-shared-components-item__phone-container">
                    <span class="modules-pages-offers-shared-components-item__title">Телефон:</span> <a href="tel:{{$offer['phone']}}">{{$offer['phone']}}</a>
                </div>
                @if($withSeller)
                    <div class="modules-pages-offers-shared-components-item__seller-info-container">
                        <span class="modules-pages-offers-shared-components-item__title">Продавец: </span><a href="{{$offer['user']['sellerLink']}}">{{$offer['user']['name'] ?? 'имя не указано'}}</a>
                    </div>
                @endif
            </div>
            <div class="modules-pages-offers-shared-components-item__categories-block">
                <div>
                    <span class="modules-pages-offers-shared-components-item__title">Категория:</span>
                    {{$offer['catalog_level_one']['title']}}
                </div>
                <div>
                    <span class="modules-pages-offers-shared-components-item__title">Товары:</span>
                    @foreach($offer['catalog_level_two'] as $catalogLevelTwoItem)
                        {{$catalogLevelTwoItem['title']}}@if($loop->iteration < $loop->count), @endif
                    @endforeach
                </div>
            </div>
        </div>
{{--        <div class="modules-pages-offers-shared-components-item__rating-section">--}}
{{--            <span>Товар: 4.5</span> <span>Продавец: 4.0</span>--}}
{{--        </div>--}}
    </div>
    <div class="modules-pages-offers-shared-components-item__service-block">
        @include('modules.pages.favorites.shared.components.button.index', [
            'id' => $offer['id'],
        ])
    </div>
</div>


