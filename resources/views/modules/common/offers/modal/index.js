import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import {MapOfferCard} from "views/factory/cards/offer/map";
import './index.less';

class OffersModal {
    constructor(element) {
        this.module = element;

        this.bind();
        this.init();
    }

    bind = () => {
        addEventListener(document,'j-event-map-yandex-components-view-all__get-visible-markers-data-complete', this.handleGetVisibleMarkersData);
    }

    handleGetVisibleMarkersData = (e) => {
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

        const htmlList = Object.values(formattedData).map((data) => MapOfferCard.createMapOfferCard(data));
        this.module.insertAdjacentHTML('beforeend', htmlList.join(''));
        MapOfferCard.init();
    }

    init = () => {
        document.dispatchEvent(new CustomEvent('j-event-map-yandex-components-view-all__get-visible-markers-data'));
    }
}

module.initModule('j-modules-common-offers-modal', OffersModal);
