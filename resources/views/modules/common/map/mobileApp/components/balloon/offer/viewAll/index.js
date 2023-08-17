import {plural_ru} from "helpers/plural";
import './index.less';

const getAddressLayout = (currentSalePoint, address) => {
    const _address = currentSalePoint ? currentSalePoint['address'] : address;

    return getKeyValueLayout('Адрес', [_address]);
}

const getCatalogLevelTwoLayout = (catalog_level_two) => {
    const stringValues = catalog_level_two.map(({title}) => title).join(', ');

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
        <div class="modules-common-map-common-components-balloon-offer__title">
            ${key}
        </div>
    `;
}

const getKeyValueLayout = (key, values) => {
    const keyLayout = getKeyLayout(key);
    const valuesLayout = getValuesListLayout(values);

    if(valuesLayout === '') {
        return '';
    }

    return wrapWithBlock(`${keyLayout} ${valuesLayout}`);
}

const getMoreLinkLayout = (id) => {
    return wrapWithBlock(`
        <span
            class="modules-common-map-common-components-balloon-offer__title j-modules-common-map-common-components-balloon-offer__link-product"
            data-id-product="${id}"
        >
            Подробнее о товаре
        </span>
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
        <div class="modules-common-map-common-components-balloon-offer__publish-date">
            Опубликовано: ${createdAtDayFormatted}.${createdAtMonthFormatted}.${createdAtYear}
        </div>
    `)
}

const getRatingLayout = (rating, rating_votes) => {
    return rating > 0 ? wrapWithBlock(`
        <div class="modules-common-map-common-components-balloon-offer__rating-star-container">
            <div class="modules-common-map-common-components-balloon-offer__rating-star-container-default"></div>
            <div class="modules-common-map-common-components-balloon-offer__rating-star-container-active" style="width: ${20 * rating}px"></div>
        </div>
        <div class="modules-common-map-common-components-balloon-offer__rating-votes-container">
            ${rating_votes} ${plural_ru(rating_votes, ['оценка', 'оценки', 'оценок'])}
        </div>
    `) : ''
}

const getSellerLayout = (id, name) => {
    const _name = name ? name : 'Имя не указано';

    const layout = `
        <div
            class="j-modules-common-map-common-components-balloon-offer__link-seller"
            data-id-seller="${id}"
        >
            ${_name}
            <div class="modules-common-map-common-components-balloon-offer__hint">
                Подробнее о фермере
            </div>
        </div>
    `;

    return getKeyValueLayout('Фермер', [layout]);
}

const getTitleLayout = (title) => {
    return getKeyValueLayout('Название товаров', [title]);
}

const getValueLayout = (value) => {
    return `
        <div class="modules-common-map-common-components-balloon-offer__container">
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
        <div class="modules-common-map-common-components-balloon-offer__block">
            ${layout}
        </div>
    `
}

export const getOfferBalloon_mobileApp = (offerData, markerId) => {
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
    const {catalog_level_two} = catalog;

    const currentSalePoint = getCurrentSalePoint(markerId, salePoints);

    const addressLayout = getAddressLayout(currentSalePoint, address);
    const catalogCategoriesLevelTwoLayout = getCatalogLevelTwoLayout(catalog_level_two);
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
        <div
            class="modules-common-map-common-components-balloon-offer j-modules-common-map-common-components-balloon-offer"
            data-id-seller="${sellerId}"
        >
            ${publishLayout}
            ${ratingLayout}
            ${catalogCategoriesLevelTwoLayout}
            ${priceLayout}
            ${contactPersonLayout}
            ${phoneLayout}
            ${addressLayout}
            ${deliveryLayout}
            ${workingHoursLayout}
            ${titleLayout}
            ${descriptionLayout}
            ${sellerLayout}
            ${moreLinkLayout}
        </div>
    `
}
