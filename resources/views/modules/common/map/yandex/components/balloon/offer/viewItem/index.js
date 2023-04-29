import './index.less';

export const getOfferBalloonProductPage = (offerData, markerId) => {
    const {product, salePoints, seller} = offerData;
    const {
        address,
        contact_person,
        delivery,
        delivery_description,
        description,
        id,
        phone,
        price,
        price_description,
        title,
        working_hours,
    } = product;
    const {id: sellerId, name} = seller;

    const salePointId = markerId.split('_')[1];
    const currentSalePoint = salePoints.find(({id}) => {
        return id.toString() === salePointId;
    });

    let contactAddress = address;
    let contactName = name ?? 'не указано';
    let contactPhone = phone;
    let balloonDescription = description;

    if(currentSalePoint) {
        const _contactAddress = currentSalePoint['address'];
        const _contactName = currentSalePoint['contact_person'] || contact_person;
        const _contactPhone = currentSalePoint['phone'];
        const _description = currentSalePoint['description'];

        if(_description) {
            balloonDescription = _description;
        }

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
        <div class="modules-common-map-yandex-components-balloon-offer-view-item">
            <div class="modules-common-map-yandex-components-balloon-offer-view-item__title">
                ${title}
            </div>
            <div>${balloonDescription}</div>
            <div>${contactAddress}</div>
            <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-price">
                <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-price-title">Цена</div>
                <div>
                    <span class="modules-common-map-yandex-components-balloon-offer-view-item__price">${price}</span>
                </div>
                <div>${price_description ?? ''}</div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-seller">
                <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-seller-title">Контактное лицо:</div>
                <div>
                    <a
                        href="/sellers/${sellerId}"
                    >${contactName}</a>
                </div>
            </div>
            <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-seller">
                <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-seller-title">Телефон</div>
                <div>
                    <a
                        href="tel:${contactPhone}"
                    >${contactPhone}</a>
                </div>
            </div>
            ${delivery ?
                `
                    <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-seller">
                        <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-seller-title">Доставка: есть</div>
                        <div>${delivery_description}</div>
                    </div>
                `
            : ""}
            ${working_hours ?
                `
                            <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-seller">
                                <div class="modules-common-map-yandex-components-balloon-offer-view-item__section-seller-title">Время работы:</div>
                                <div>${working_hours}</div>
                            </div>
                        `
                : ""}
        </div>
    `
}
