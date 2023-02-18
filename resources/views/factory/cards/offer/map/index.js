import {addEventListener} from "helpers/events";

export class MapOfferCard {
    constructor(element) {
        this.module = element;
        this.address = this.module.querySelector('.j-factory-cards-offer-map__address');

        this.bind();
    }

    static createMapOfferCard = ({placemark, placemarkData}) => {
        const {product, seller} = placemarkData.offer;
        const {address, description, id, img, link: productLink, measure, price, price_description, title} = product;
        const {title: measureTitle} = measure;
        const {src} = img;
        const {link: sellerLink, name, phone} = seller;

        return `
            <div
                class="modules-pages-offers-shared-components-item j-factory-cards-offer-map"
                data-placemark-id="${placemark.id}"
            >
                <div class="modules-pages-offers-shared-components-item__image-block">
                    <div class="modules-pages-offers-shared-components-item__image-container">
                        <img
                            alt=""
                            class="modules-pages-offers-shared-components-item__image"
                            src="${src}"
                        >
                        <a
                            class="modules-pages-offers-shared-components-item__image-link"
                            href="${productLink}"
                        ></a>
                    </div>
                </div>
                <div class="modules-pages-offers-shared-components-item__content-block">
                    <div class="modules-pages-offers-shared-components-item__info-section">
                        <div>
                            <a
                                class="modules-pages-offers-shared-components-item__product-link"
                                href="${productLink}"
                            >${title}</a>
                        </div>
                        <div class="modules-pages-offers-shared-components-item__address-container j-factory-cards-offer-map__address">
                            ${address}
                        </div>
                        <div class="modules-pages-offers-shared-components-item__price-container">
                            <span>Цена: </span>
                            <span class="modules-pages-offers-shared-components-item__price">
                                ${price} ₽
                            </span>
                            <span class="modules-pages-offers-shared-components-item__measure hidden">
                                (за ${measureTitle})
                            </span>
                        </div>
                        <div class="modules-pages-offers-shared-components-item__contacts-block">
                            <div class="modules-pages-offers-shared-components-item__phone-container">
                                Телефон: <a class="j-modules-common-offers-list__phone-link" href="tel:+${phone}">+${phone}</a>
                            </div>
                            <div class="modules-pages-offers-shared-components-item__seller-info-container">
                                Продавец: <a href="${sellerLink}">${name}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modules-pages-offers-shared-components-item__service-block"></div>
            </div>
        `;
    }

    static init = () => {
        const list = [...document.querySelectorAll('.j-factory-cards-offer-map')];

        list.forEach((element) => {
            new MapOfferCard(element);
        });
    }

    bind = () => {
        addEventListener(this.address, 'click', this.showPlacemark);
    }

    showPlacemark = (e) => {
        document.dispatchEvent(new CustomEvent('j-event-map__show-placemark', {
            detail: {
                placemarkId: this.module.dataset.placemarkId,
            }
        }));
    }
}
