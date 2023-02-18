import {addEventListener} from "helpers/events";
import './index.less';

class OffersList {
    constructor(element) {
        this.module = element;
        this.offerCardTemplate = this.module.querySelector('.j-modules-common-offers-list__offer-card-template');
        this.offersContainer = this.module.querySelector('.j-modules-common-offers-list__offers-container');

        this.bind();
    }

    bind = () => {
        addEventListener(document,'j-event-map-yandex-components-view-all__update-visible-markers-data', this.handleUpdateVisibleMarkersData);
    }

    createCard = ({address, offerId, phone, price, title}) => {
        const offerCard = this.offerCardTemplate.content.firstElementChild.cloneNode(true);

        const image = offerCard.querySelector('.j-modules-common-offers-list__image');
        const imageLink = offerCard.querySelector('.j-modules-common-offers-list__image-link');
        const productLink = offerCard.querySelector('.j-modules-common-offers-list__product-link');
        const productDescription = offerCard.querySelector('.j-modules-common-offers-list__description');
        const productAddress = offerCard.querySelector('.j-modules-common-offers-list__address');
        const productPrice = offerCard.querySelector('.j-modules-common-offers-list__price');
        const measure = offerCard.querySelector('.j-modules-common-offers-list__measure');
        const phoneLink = offerCard.querySelector('.j-modules-common-offers-list__phone-link');

        productLink.innerHTML = title;
        productAddress.innerHTML = address;
        productPrice.innerHTML = price;
        phoneLink.innerHTML = phone;


        return offerCard;
    }

    handleUpdateVisibleMarkersData = (e) => {
        const {count, list} = e.detail;
        console.log('count');
        console.log(count);
        console.log('list');
        console.log(list);

        this.offersContainer.innerHTML = '';

        list.forEach((data) => {
            const card = this.createCard(data);

            this.offersContainer.appendChild(card);
        });
    }
}

const list = [...document.querySelectorAll('.j-modules-common-offers-list')];

list.forEach((element) => {
    new OffersList(element);
});
