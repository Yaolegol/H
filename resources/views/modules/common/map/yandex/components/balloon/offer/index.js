import './index.less';

export const getOfferBalloon = (offerData, markerId) => {
    const {product, salePoints, seller} = offerData;
    const {address, id, measure, phone, price, price_description, title} = product;
    const {id: sellerId, name} = seller;

    const salePointId = markerId.split('_')[1];
    const currentSalePoint = salePoints.find(({id}) => {
        return id.toString() === salePointId;
    });

    let contactAddress = address;
    let contactName = name;
    let contactPhone = phone;

    if(currentSalePoint) {
        const _contactAddress = currentSalePoint['address'];
        const _contactName = currentSalePoint['contact_person'];
        const _contactPhone = currentSalePoint['phone'];

        if(_contactName) {
            contactName = _contactName;
        }

        if(_contactPhone) {
            contactPhone = _contactPhone;
        }

        if(_contactAddress) {
            contactAddress = _contactAddress;
        }
    }

    return `
        <div class="modules-common-map-yandex-components-balloon-offer">
            <div class="modules-common-map-yandex-components-balloon-offer__title">
                <a
                    href="/offers/${id}"
                >${title}</a>
            </div>
            <div>${contactAddress}</div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-price">
                <div class="modules-common-map-yandex-components-balloon-offer__section-price-title">Цена</div>
                <div><span class="modules-common-map-yandex-components-balloon-offer__price">${price} ₽</span> за ${measure.title}</div>
                <div>${price_description ?? ''}</div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-seller">
                <div class="modules-common-map-yandex-components-balloon-offer__section-seller-title">Продавец</div>
                <div>
                    <a
                        href="/sellers/${sellerId}"
                    >${contactName}</a>
                </div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer__section-seller">
                <div class="modules-common-map-yandex-components-balloon-offer__section-seller-title">Телефон</div>
                <div>
                    <a
                        href="tel:${contactPhone}"
                    >${contactPhone}</a>
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
