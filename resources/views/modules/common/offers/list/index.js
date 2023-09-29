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

        const htmlList = Object.values(formattedData).map((data) => MapOfferCard.createMapOfferCard(data));

        if(htmlList.length) {
            this.module.insertAdjacentHTML('beforeend', htmlList.join(''));

            MapOfferCard.init();
            document.dispatchEvent(new CustomEvent('j-event-module__update'));
            document.dispatchEvent(new CustomEvent('j-event-favorites-components-section__get-favorites-products', {
                detail: {
                    fromMemory: true
                }
            }));
        } else {
            this.module.innerHTML = `
                <div style="margin-top: 20px; font-style: italic;">
                    В видимой области карты <span style="font-weight: 800;">товаров не найдено</span>, попробуйте переместить карту!
                </div>
                <div style="margin-top: 20px;">
                    Вы можете поддержать проект - <span style="font-weight: 800;">поделитесь ссылкой на сайт</span> в социальных сетях и мессенджерах, чтобы было больше товаров!
                </div>
            `;
        }
    }
}

const list = [...document.querySelectorAll('.j-modules-common-offers-list')];

list.forEach((element) => {
    new OffersList(element);
});
