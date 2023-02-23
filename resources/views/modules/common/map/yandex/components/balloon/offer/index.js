import './index.less';

export const getOfferBalloon = (offerData) => {
    const {product, seller} = offerData;
    const {address, id, measure, price, price_description, title} = product;
    const {name, phone} = seller;

    return `
        <div class="modules-common-map-yandex-components-balloon-offer">
            <div class="modules-common-map-yandex-components-balloon-offer__title">
                <a
                    href="/offers/${id}"
                >${title}</a>
            </div>
            <div>${address}</div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-price">
                <div class="modules-common-map-yandex-components-balloon-offer__section-price-title">Цена</div>
                <div><span class="modules-common-map-yandex-components-balloon-offer__price">${price} ₽</span> за ${measure.title}</div>
                <div>${price_description}</div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-seller">
                <div class="modules-common-map-yandex-components-balloon-offer__section-seller-title">Продавец</div>
                <div>${name}</div>
                <div>
                    <a
                        href="tel:+${phone}"
                    >+${phone}</a>
                </div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-link">
                <a
                    class="modules-common-map-yandex-components-balloon-offer__section-link-title"
                    href="/offers/${id}"
                >Подробнее</a>
            </div>
        </div>
    `
}

export const getOfferBalloonProductPage = (offerData) => {
    const {product} = offerData;
    const {address, measure, price, price_description, title} = product;

    return `
        <div class="modules-common-map-yandex-components-balloon-offer">
            <div class="modules-common-map-yandex-components-balloon-offer__title">
                ${title}
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-price">
                <div class="modules-common-map-yandex-components-balloon-offer__section-price-title">Цена</div>
                <div><span class="modules-common-map-yandex-components-balloon-offer__price">${price} ₽</span> за ${measure.title}</div>
                <div>${price_description}</div>
            </div>
        </div>
    `
}
