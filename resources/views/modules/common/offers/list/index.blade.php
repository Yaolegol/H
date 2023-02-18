<div
    class="modules-common-offers-list j-modules-common-offers-list"
>
    <template class="j-modules-common-offers-list__offer-card-template">
        <div class="modules-pages-offers-shared-components-item">
            <div class="modules-pages-offers-shared-components-item__image-block">
                <div class="modules-pages-offers-shared-components-item__image-container">
                    <img
                        alt=""
                        class="modules-pages-offers-shared-components-item__image j-modules-common-offers-list__image"
                        src=""
                    >
                    <a
                        class="modules-pages-offers-shared-components-item__image-link j-modules-common-offers-list__image-link"
                        href=""
                    ></a>
                </div>
            </div>
            <div class="modules-pages-offers-shared-components-item__content-block">
                <div class="modules-pages-offers-shared-components-item__info-section">
                    <div>
                        <a
                            class="modules-pages-offers-shared-components-item__product-link j-modules-common-offers-list__product-link"
                            href=""
                        ></a>
                    </div>
                    <div class="modules-pages-offers-shared-components-item__description-container j-modules-common-offers-list__description"></div>
                    <div class="modules-pages-offers-shared-components-item__address-container j-modules-common-offers-list__address"></div>
                    <div class="modules-pages-offers-shared-components-item__price-container">
                        <span>Цена: </span>
                        <span class="modules-pages-offers-shared-components-item__price j-modules-common-offers-list__price"></span>
                        <span>₽</span>
                        <span class="modules-pages-offers-shared-components-item__measure hidden">(за <span class="j-modules-common-offers-list__measure"></span>)</span>
                    </div>
                    <div class="modules-pages-offers-shared-components-item__contacts-block">
                        <div class="modules-pages-offers-shared-components-item__phone-container">
                            Телефон: <a class="j-modules-common-offers-list__phone-link" href=""></a>
                        </div>
                        <div class="modules-pages-offers-shared-components-item__seller-info-container">
                            <span>Продавец: </span><a class="j-modules-common-offers-list__seller" href=""></a>
                        </div>
                    </div>
                </div>
                {{--        <div class="modules-pages-offers-shared-components-item__rating-section">--}}
                {{--            <span>Товар: 4.5</span> <span>Продавец: 4.0</span>--}}
                {{--        </div>--}}
            </div>
            <div class="modules-pages-offers-shared-components-item__service-block">
{{--                @include('modules.pages.favorites.shared.components.button.index', [--}}
{{--                    'id' => $offer['id'],--}}
{{--                ])--}}
            </div>
        </div>
    </template>
    <div class="j-modules-common-offers-list__offers-container"></div>
</div>
