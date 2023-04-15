import './index.less';

export const getOfferBalloon = (offerData, markerId) => {
    const {catalog, product, salePoints, seller} = offerData;
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
    const {catalog_level_one, catalog_level_two} = catalog;

    const salePointId = markerId.split('_')[1];
    const currentSalePoint = salePoints.find(({id}) => {
        return id.toString() === salePointId;
    });

    let contactAddress = address;
    let contactName = name;
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

    const catalogCategoriesLevelTwoTitleList = catalog_level_two.map(({title}) => title).join(', ');

    return `
        <div class="modules-common-map-yandex-components-balloon-offer-view-all">
            <div class="modules-common-map-yandex-components-balloon-offer-view-all__title">
                <a
                    href="/offers/${id}"
                >${title}</a>
            </div>
            <div>${balloonDescription}</div>
            <div>${contactAddress}</div>
            <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-price">
                <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-price-title">Цена</div>
                <div>
                    <span class="modules-common-map-yandex-components-balloon-offer-view-all__price">${price}</span>
                </div>
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
            ${delivery ?
                `
                    <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller">
                        <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title">Доставка: есть</div>
                        <div>${delivery_description}</div>
                    </div>
                `
                : ""}
            ${working_hours ?
                `
                    <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller">
                        <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title">Время работы:</div>
                        <div>${working_hours}</div>
                    </div>
                `
                : ""}
            <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-link">
                <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title">Категория:</div>
                <div>${catalog_level_one.title}</div>
                <div class="modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title">Товары:</div>
                <div>${catalogCategoriesLevelTwoTitleList}</div>
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
