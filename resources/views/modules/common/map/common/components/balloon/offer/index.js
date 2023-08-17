import {plural_ru} from "helpers/plural";
import './index.less';

const getAddressLayout = (currentSalePoint, address) => {
    const _address = currentSalePoint ? currentSalePoint['address'] : address;

    return wrapWithBlock(_address);
}

const getCatalogLevelTwoLayout = (catalog_level_two) => {
    const values = catalog_level_two.map(({title}) => title).join(', ');

    return getKeyValueLayout('Товары', values);
}

const getContactPersonLayout = (currentSalePoint, contactPerson) => {
    const _contactPerson = currentSalePoint ? currentSalePoint['contact_person'] : contactPerson;

    return getKeyValueLayout('Контактное лицо:', _contactPerson);
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

    return getKeyValueLayout('Доставка: есть', deliveryDescription);
}

const getDescriptionLayout = (description) => {
    if(!description) {
        return '';
    }

    return wrapWithBlock(description);
}

const getKeyLayout = (key) => {
    return `
        <div class="modules-common-map-common-components-balloon-offer__key">
            ${key}
        </div>
    `;
}

const getKeyValueLayout = (key, value) => {
    const keyLayout = getKeyLayout(key);
    const valuesLayout = (typeof value === 'object') ? getValuesListLayout(value) : value;

    wrapWithBlock(`${keyLayout} ${valuesLayout}`);
}

const getMoreLinkLayout = (id) => {
    return wrapWithBlock(`
        <a
            class="modules-common-map-common-components-balloon-offer__section-link-title"
            href="/offers/${id}"
        >
            Подробнее
        </a>
    `);
}

const getPhoneLayout = (currentSalePoint, phone) => {
    const _phone = currentSalePoint ? currentSalePoint['phone'] : phone;

    return getKeyValueLayout('Телефон', `<a href="tel:${_phone}">${_phone}</a>`);
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

const getTitleLayout = (title) => {
    return wrapWithBlock(title);
}

const getValueLayout = (layout) => {
    return `
        <div class="modules-common-map-common-components-balloon-offer__container">
            ${layout}
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

    return getKeyValueLayout('Время работы', working_hours);
}

const wrapWithBlock = (layout) => {
    return `
        <div class="modules-common-map-common-components-balloon-offer__block">
            ${layout}
        </div>
    `
}

export const getOfferBalloon = (offerData, markerId) => {
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

    const publishLayout = getPublishDateLayout(created_at);
    const ratingLayout = getRatingLayout(rating, rating_votes);
    const catalogCategoriesLevelTwoLayout = getCatalogLevelTwoLayout(catalog_level_two);
    const titleLayout = getTitleLayout(title);
    const descriptionLayout = getDescriptionLayout(description);
    const addressLayout = getAddressLayout(currentSalePoint, address);
    const priceLayout = getPriceLayout(price, price_description);
    const contactPersonLayout = getContactPersonLayout(currentSalePoint, contact_person);
    const phoneLayout = getPhoneLayout(currentSalePoint, phone);
    const deliveryLayout = getDeliveryLayout(delivery, delivery_description);
    const workingHoursLayout = getWorkingHoursLayout(working_hours);
    const moreLinkLayout = getMoreLinkLayout(id);

    return `
        <div class="modules-common-map-common-components-balloon-offer">
            ${publishLayout}
            ${ratingLayout}
            ${catalogCategoriesLevelTwoLayout}
            ${titleLayout}
            ${descriptionLayout}
            ${addressLayout}
            ${priceLayout}
            ${contactPersonLayout}
            ${phoneLayout}
            ${deliveryLayout}
            ${workingHoursLayout}
            ${moreLinkLayout}
        </div>
    `
}
