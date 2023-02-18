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

    handleUpdateVisibleMarkersData = (e) => {
        const {list} = e.detail;

        this.module.innerHTML = '';

        const formattedData = {};

        list.forEach(({placemark, placemarkData}) => {
            const productId = placemarkData.offer.product.id;

            if(!formattedData[productId]) {
                formattedData[productId] = {
                    placemarkList: [placemark],
                    placemarkData,
                }

                return;
            }

            formattedData[productId].placemarkList.push(placemark);
        });

        console.log('formattedData');
        console.log(formattedData);

        const htmlList = Object.values(formattedData).map((data) => MapOfferCard.createMapOfferCard(data));
        this.module.insertAdjacentHTML('beforeend', htmlList.join(''));
        MapOfferCard.init();
    }
}

const list = [...document.querySelectorAll('.j-modules-common-offers-list')];

list.forEach((element) => {
    new OffersList(element);
});
