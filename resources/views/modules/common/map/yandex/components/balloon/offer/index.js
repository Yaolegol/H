import './index.less';

export const getOfferBalloon = () => {
    return `
        <div class="modules-common-map-yandex-components-balloon-offer">
            <div class="modules-common-map-yandex-components-balloon-offer__title">{{ properties.data.offer.product.title }}</div>
            <div>{{ properties.data.offer.product.address }}</div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-price">
                <div class="modules-common-map-yandex-components-balloon-offer__section-price-title">Цена</div>
                <div><span class="modules-common-map-yandex-components-balloon-offer__price">{{ properties.data.offer.product.price }} ₽</span> за {{properties.data.offer.product.measure.title}}</div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-seller">
                <div class="modules-common-map-yandex-components-balloon-offer__section-seller-title">Продавец</div>
                <div>{{ properties.data.offer.seller.name }}</div>
                <div>
                    <a
                        href="tel:+{{properties.data.offer.seller.phone}}"
                    >+{{ properties.data.offer.seller.phone }}</a>
                </div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-link">
                <a
                    class="modules-common-map-yandex-components-balloon-offer__section-link-title"
                    href="/offers/{{properties.data.offer.product.id}}"
                >Подробнее</a>
            </div>
        </div>
    `
}
