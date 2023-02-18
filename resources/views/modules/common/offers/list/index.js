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

    getUniqueList = (list) => {
        return list.reduce((acc, item, i, arr) => {
            const firstDataObject = arr.find(o => o.offer.product.id === item.offer.product.id);

            if(firstDataObject !== item) {
                return acc;
            }

            return [
                ...acc,
                item,
            ];
        }, []);
    }

    handleUpdateVisibleMarkersData = (e) => {
        const {list} = e.detail;
        this.module.innerHTML = '';
        const uniqueList = this.getUniqueList(list);
        const htmlList = uniqueList.map(({offer}) => createMapOfferCard(offer));
        this.module.insertAdjacentHTML('beforeend', htmlList.join(''));
    }
}

const list = [...document.querySelectorAll('.j-modules-common-offers-list')];

list.forEach((element) => {
    new OffersList(element);
});
