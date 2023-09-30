import {addEventListener} from "helpers/events";
import 'views/components/share/common';
import {MapOfferCard} from "views/factory/cards/offer/map";
import './index.less';

class OffersList {
    constructor(element) {
        this.module = element;
        this.contentArea = this.module.querySelector('.j-modules-common-offers-list__content-area');
        this.emptyArea = this.module.querySelector('.j-modules-common-offers-list__empty-area');

        this.bind();
    }

    bind = () => {
        addEventListener(document,'j-event-map-yandex-components-view-all__update-visible-markers-data', this.handleUpdateVisibleMarkersData);
    }

    handleUpdateVisibleMarkersData = (e) => {
        const {list} = e.detail;

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
        this.contentArea.innerHTML = '';

        console.log('!!!!!!!!!!!!!!list');
        console.log(list);

        if(htmlList.length) {
            this.emptyArea.classList.add('hidden');
            this.contentArea.insertAdjacentHTML('beforeend', htmlList.join(''));

            MapOfferCard.init();
            document.dispatchEvent(new CustomEvent('j-event-module__update'));
            document.dispatchEvent(new CustomEvent('j-event-favorites-components-section__get-favorites-products', {
                detail: {
                    fromMemory: true
                }
            }));
        } else {
            this.emptyArea.classList.remove('hidden');
        }
    }
}

const list = [...document.querySelectorAll('.j-modules-common-offers-list')];

list.forEach((element) => {
    new OffersList(element);
});
