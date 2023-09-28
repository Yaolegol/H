import {plural_ru} from "helpers/plural";
import './index.less';

const getAddressLayout = (currentSalePoint, address) => {
    const _address = currentSalePoint ? currentSalePoint['address'] : address;

    return getKeyValueLayout('Адрес', [_address]);
}

const getCatalogLevelOneLayout = (catalog_level_one) => {
    let stringValues = catalog_level_one.map(({title}) => title).join(', ');

    return getKeyValueLayout('Категории', [stringValues]);
}

const getCatalogLevelTwoLayout = (catalog_level_two) => {
    let stringValues = catalog_level_two.map(({title}) => title).join(', ');

    return getKeyValueLayout('Товары', [stringValues]);
}

const getContactPersonLayout = (currentSalePoint, contactPerson) => {
    const _contactPerson = currentSalePoint ? currentSalePoint['contact_person'] : contactPerson;

    return getKeyValueLayout('Контактное лицо', [_contactPerson]);
}

const getCurrentSalePoint = (markerId, salePoints) => {
    const salePointId = markerId.split('_')[1];

    return salePoints.find(({id}) => {
        return id.toString() === salePointId;
    });
}

const getDeliveryLayout = (delivery, deliveryDescription) => {
    if(!delivery) {
        return '';
    }

    return getKeyValueLayout('Доставка: есть', [deliveryDescription]);
}

const getDescriptionLayout = (description) => {
    if(!description) {
        return '';
    }

    return getKeyValueLayout('Описание', [description]);
}

const getKeyLayout = (key) => {
    return `
        <div class="modules-common-map-yandex-components-balloon-offer-view-item__title">
            ${key}
        </div>
    `;
}

const getKeyValueLayout = (key, values) => {
    const valuesLayout = getValuesListLayout(values);

    if(valuesLayout === '') {
        return '';
    }

    let keyLayout = '';

    if(key) {
        keyLayout = getKeyLayout(key);
    }

    return wrapWithBlock(`${keyLayout} ${valuesLayout}`);
}

const getMoreLinkLayout = (id) => {
    return wrapWithBlock(`
        <a
            class="modules-common-map-yandex-components-balloon-offer-view-item__title"
            href="/offers/${id}"
        >
            Подробнее о товаре
        </a>
    `);
}

const getPhoneLayout = (currentSalePoint, phone) => {
    const _phone = currentSalePoint ? currentSalePoint['phone'] : phone;
    const layout = `<a href="tel:${_phone}">${_phone}</a>`;

    return getKeyValueLayout('Телефон', [layout]);
}

const getPriceLayout = (price, price_description) => {
    return getKeyValueLayout('Цена', [price, price_description]);
}

const getPublishDateLayout = (created_at) => {
    const createdAtDate = new Date(created_at);
    const createdAtMonth = createdAtDate.getMonth() + 1;
    const createdAtDay = createdAtDate.getDate();
    const createdAtDayFormatted = createdAtDay < 10 ? `0${createdAtDay}` : createdAtDay;
    const createdAtMonthFormatted = createdAtMonth < 10 ? `0${createdAtMonth}` : createdAtMonth;
    const createdAtYear = createdAtDate.getFullYear();

    return wrapWithBlock(`
        <div class="modules-common-map-yandex-components-balloon-offer-view-item__publish-date">
            Опубликовано: ${createdAtDayFormatted}.${createdAtMonthFormatted}.${createdAtYear}
        </div>
    `)
}

const getRatingLayout = (rating, rating_votes) => {
    return rating > 0 ? wrapWithBlock(`
        <div class="modules-common-map-yandex-components-balloon-offer-view-item__rating-star-container">
            <div class="modules-common-map-yandex-components-balloon-offer-view-item__rating-star-container-default"></div>
            <div class="modules-common-map-yandex-components-balloon-offer-view-item__rating-star-container-active" style="width: ${20 * rating}px"></div>
        </div>
        <div class="modules-common-map-yandex-components-balloon-offer-view-item__rating-votes-container">
            ${rating_votes} ${plural_ru(rating_votes, ['оценка', 'оценки', 'оценок'])}
        </div>
    `) : ''
}

const getSellerLayout = (id, name) => {
    const _name = name ? name : 'Имя не указано';

    const layout = `
        <a href="/sellers/${id}">
            ${_name}
        </a>
        <div class="modules-common-map-yandex-components-balloon-offer-view-item__hint">
            <a href="/sellers/${id}">
                Подробнее о фермере
            </a>
        </div>
    `;

    return getKeyValueLayout('Фермер', [layout]);
}

const getTitleLayout = (title) => {
    return wrapWithBlock(title);
}

const getValueLayout = (value) => {
    return `
        <div class="modules-common-map-yandex-components-balloon-offer-view-item__container">
            ${value}
        </div>
    `
}

const getValuesListLayout = (values) => {
    let layout = '';

    values.forEach((_value) => {
        if(!_value) {
            return;
        }

        const valueLayout = getValueLayout(_value);
        layout += valueLayout;
    });

    return layout;
}

const getWorkingHoursLayout = (working_hours) => {
    if(!working_hours) {
        return '';
    }

    return getKeyValueLayout('Время работы', [working_hours]);
}

const wrapWithBlock = (layout) => {
    return `
        <div class="modules-common-map-yandex-components-balloon-offer-view-item__block">
            ${layout}
        </div>
    `
}

export const getOfferBalloonProductPage = (offerData, markerId) => {
    const {catalog, product, salePoints, seller} = offerData;
    const {
        address,
        contact_person,
        created_at,
        delivery,
        delivery_description,
        description,
        id,
        phone,
        price,
        price_description,
        rating,
        rating_votes,
        title,
        working_hours,
    } = product;
    const {id: sellerId, name} = seller;
    const {catalog_level_one, catalog_level_two} = catalog;

    const currentSalePoint = getCurrentSalePoint(markerId, salePoints);

    const addressLayout = getAddressLayout(currentSalePoint, address);
    const catalogCategoriesLevelOneLayout = getCatalogLevelOneLayout(catalog_level_one);
    // const catalogCategoriesLevelTwoLayout = getCatalogLevelTwoLayout(catalog_level_two);
    const contactPersonLayout = getContactPersonLayout(currentSalePoint, contact_person);
    const deliveryLayout = getDeliveryLayout(delivery, delivery_description);
    const descriptionLayout = getDescriptionLayout(description);
    const moreLinkLayout = getMoreLinkLayout(id);
    const phoneLayout = getPhoneLayout(currentSalePoint, phone);
    const priceLayout = getPriceLayout(price, price_description);
    const publishLayout = getPublishDateLayout(created_at);
    const ratingLayout = getRatingLayout(rating, rating_votes);
    const sellerLayout = getSellerLayout(sellerId, name);
    const titleLayout = getTitleLayout(title);
    const workingHoursLayout = getWorkingHoursLayout(working_hours);

    return `
        <div class="modules-common-map-yandex-components-balloon-offer-view-item">
            ${priceLayout}
            ${contactPersonLayout}
            ${phoneLayout}
            ${addressLayout}
            ${deliveryLayout}
            ${workingHoursLayout}
        </div>
    `
}

