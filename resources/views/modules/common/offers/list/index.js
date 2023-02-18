import {addEventListener} from "helpers/events";
import {MapOfferCard} from "views/factory/cards/offer/map";
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
            const firstDataObject = arr.find(o => o.placemarkData.offer.product.id === item.placemarkData.offer.product.id);

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
        const htmlList = uniqueList.map((data) => MapOfferCard.createMapOfferCard(data));
        this.module.insertAdjacentHTML('beforeend', htmlList.join(''));
        MapOfferCard.init();
    }
}

const list = [...document.querySelectorAll('.j-modules-common-offers-list')];

list.forEach((element) => {
    new OffersList(element);
});
