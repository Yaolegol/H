import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from "helpers/events";
import './index.less';

const {
    COMMON: {
        MODALS: {
            COMMON: {
                CLOSE,
            }
        }
    }
} = EVENTS_NAMES;

export class MapOfferCard {
    constructor(element) {
        this.module = element;
        this.salePointsButton = this.module.querySelector('.j-factory-cards-offer-map__sale-points-button');
        this.salePointsBlock = this.module.querySelector('.j-factory-cards-offer-map__sale-points-block');

        this.bind();
    }

    static createMapOfferCard = ({placemarkList, placemarkData}) => {
        const {product, salePoints, seller} = placemarkData.offer;
        const {address, description, id, img, link: productLink, measure, price, price_description, title} = product;
        const {title: measureTitle} = measure;
        const {src} = img;
        const {link: sellerLink, name, phone} = seller;

        const salePointsHtml = salePoints.map(({address, description, id: salePointId, phone, title, working_hours}) => {
            return `
                <div class="factory-cards-offer-map__sale-point-address-container">${address}</div>
                <button
                    class="factory-cards-offer-map__show-on-map-button j-factory-cards-offer-map__placemark-link"
                    data-placemark-id="${id}_${salePointId}"
                    type="button"
                >Показать на карте</button>
            `;
        });

        const salePontButton = salePointsHtml.length ? `
            <button class="factory-cards-offer-map__sale-points-button j-factory-cards-offer-map__sale-points-button" type="button">
                <span class="factory-cards-offer-map__sale-points-button-text factory-cards-offer-map__sale-points-button-text_show">Свернуть</span>
                <span class="factory-cards-offer-map__sale-points-button-text factory-cards-offer-map__sale-points-button-text_hide">Развернуть</span>
            </button>
        ` : '';

        const salePointsBlock = salePointsHtml.length ? `
            <div class="factory-cards-offer-map__sale-points-block j-factory-cards-offer-map__sale-points-block">
                <div class="factory-cards-offer-map__sale-points-title">Торговые точки:</div>
                <div class="factory-cards-offer-map__sale-points-container">${salePointsHtml.join('')}</div>
                ${salePontButton}
            </div>
        ` : '';

        return `
            <div class="factory-cards-offer-map j-factory-cards-offer-map">
                <div class="factory-cards-offer-map__image-block">
                    <div class="factory-cards-offer-map__image-container">
                        <img
                            alt=""
                            class="factory-cards-offer-map__image"
                            src="${src}"
                        >
                        <a
                            class="factory-cards-offer-map__image-link"
                            href="${productLink}"
                        ></a>
                    </div>
                </div>
                <div class="factory-cards-offer-map__content-block">
                    <div class="factory-cards-offer-map__info-section">
                        <div>
                            <a
                                class="factory-cards-offer-map__product-link"
                                href="${productLink}"
                            >${title}</a>
                        </div>
                        <div class="factory-cards-offer-map__address-container j-factory-cards-offer-map__placemark-link">
                            ${address}
                        </div>
                        <button
                            class="factory-cards-offer-map__show-on-map-button j-factory-cards-offer-map__placemark-link"
                            data-placemark-id="${id}"
                            type="button"
                        >Показать на карте</button>
                        ${salePointsBlock}
                        <div class="factory-cards-offer-map__price-container">
                            <span class="factory-cards-offer-map__price-title">Цена:</span>
                            <span class="factory-cards-offer-map__price">
                                ${price} ₽
                            </span>
                            <span class="factory-cards-offer-map__measure">
                                (за ${measureTitle})
                            </span>
                        </div>
                        <div class="factory-cards-offer-map__contacts-block">
                            <div class="factory-cards-offer-map__phone-container">
                                <span class="factory-cards-offer-map__phone-title">Телефон:</span>
                                <a class="j-modules-common-offers-list__phone-link" href="tel:+${phone}">+${phone}</a>
                            </div>
                            <div class="factory-cards-offer-map__seller-info-container">
                                <span class="factory-cards-offer-map__seller-info-title">Продавец:</span>
                                <a href="${sellerLink}">${name}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="factory-cards-offer-map__service-block"></div>
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
        addEventListener(this.module, 'click', this.handleModuleClick);
        addEventListener(this.salePointsButton, 'click', this.handleSalePointsButtonClick);
    }

    handleModuleClick = (e) => {
        const {target} = e;

        const element = target.classList.contains('j-factory-cards-offer-map__placemark-link') ? target : target.closest('.j-factory-cards-offer-map__placemark-link');

        if(!element) {
            return;
        }

        document.dispatchEvent(new CustomEvent(CLOSE));
        document.dispatchEvent(new CustomEvent('j-event-map__show-placemark', {
            detail: {
                placemarkId: element.dataset.placemarkId,
            }
        }));
    }

    handleSalePointsButtonClick = (e) => {
        if(this.salePointsBlock.classList.contains('show')) {
            this.salePointsBlock.classList.remove('show');
        } else {
            this.salePointsBlock.classList.add('show');
        }
    }
}
