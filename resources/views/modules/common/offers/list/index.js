import {addEventListener} from "helpers/events";
import {createMapOfferCard} from "views/factory/cards/offer/map";
import './index.less';

class OffersList {
    constructor(element) {
        this.module = element;

        this.bind();
    }

    bind = () => {
        addEventListener(document,'j-event-map-yandex-components-view-all__update-visible-markers-data', this.handleUpdateVisibleMarkersData);
    }

    handleUpdateVisibleMarkersData = (e) => {
        const {count, list} = e.detail;
        console.log('count');
        console.log(count);
        console.log('list');
        console.log(list);

        this.module.innerHTML = '';

        list.forEach((data) => {
            const card = createMapOfferCard(data.offer);

            this.module.insertAdjacentHTML('beforeend', card);
        });
    }
}

const list = [...document.querySelectorAll('.j-modules-common-offers-list')];

list.forEach((element) => {
    new OffersList(element);
});
