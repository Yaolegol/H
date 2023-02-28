import 'views/modules/pages/favorites/shared/components/button';
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
        const isUserAuth = Boolean(document.querySelector('.j-user__auth'));

        const {product, salePoints, seller} = placemarkData.offer;
        const {address, description, id, img, link: productLink, measure, phone, price, price_description, title} = product;
        const {title: measureTitle} = measure;
        const {src} = img;
        const {link: sellerLink, name} = seller;

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

        const favoritesHint = !isUserAuth ? `
            <div class="modules-pages-favorites-shared-components-button__hint-block">
                <div class="modules-pages-favorites-shared-components-button__hint-title">Чтобы добавить товар в избранное нужно</div>
                <div class="modules-pages-favorites-shared-components-button__hint-text-container">
                    <a class="modules-pages-favorites-shared-components-button__hint-link" href="/login">Войти</a>
                </div>
                <div class="modules-pages-favorites-shared-components-button__hint-text-container">
                    <div class="modules-pages-favorites-shared-components-button__hint-text">или</div>
                </div>
                <div class="modules-pages-favorites-shared-components-button__hint-text-container">
                    <a class="modules-pages-favorites-shared-components-button__hint-link" href="/register">Зарегистрироваться</a>
                </div>
            </div>
        `: '';

        const favoritesBlock = `
            <div
                class="modules-pages-favorites-shared-components-button j-favorites-components-button"
                data-id="${id}"
            >
                <button class="modules-pages-favorites-shared-components-button__button j-favorites-components-button__button">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94">
                        <path d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757  c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042  c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685  c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528  c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956  C22.602,0.567,25.338,0.567,26.285,2.486z" fill="currentColor"/>
                    </svg>
                </button>
                ${favoritesHint}
            </div>
        `;

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
                                <a class="j-modules-common-offers-list__phone-link" href="tel:${phone}">${phone}</a>
                            </div>
                            <div class="factory-cards-offer-map__seller-info-container">
                                <span class="factory-cards-offer-map__seller-info-title">Продавец:</span>
                                <a href="${sellerLink}">${name}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="factory-cards-offer-map__service-block">
                    ${favoritesBlock}
                </div>
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
