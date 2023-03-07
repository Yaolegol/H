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
        <div class="modules-common-map-yandex-components-balloon-offer-view-all">
            <div class="modules-common-map-yandex-components-balloon-offer-view-all__title">
                <a
                    href="/offers/${id}"
                >${title}</a>
            </div>
            <div>${contactAddress}</div>
            <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-price">
                <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-price-title">Цена</div>
                <div><span class="modules-common-map-yandex-components-balloon-offer-view-all__price">${price} ₽</span> за ${measure.title}</div>
                <div>${price_description ?? ''}</div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller">
                <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title">Контактное лицо:</div>
                <div>
                    <a
                        href="/sellers/${sellerId}"
                    >${contactName}</a>
                </div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller">
                <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title">Телефон</div>
                <div>
                    <a
                        href="tel:${contactPhone}"
                    >${contactPhone}</a>
                </div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-link">
                <a
                    class="modules-common-map-yandex-components-balloon-offer-view-all__section-link-title"
                    href="/offers/${id}"
                >Подробнее</a>
            </div>
        </div>
    `
}
