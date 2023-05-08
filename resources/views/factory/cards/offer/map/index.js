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

        const {catalog, product, salePoints, seller} = placemarkData.offer;
        const {address, description, id, img, link: productLink, phone, price, price_description, rating, title} = product;
        const {src} = img;
        const {link: sellerLink, name} = seller;
        const {catalog_level_one, catalog_level_two} = catalog;

        let _name = name;

        if(!_name) {
            _name = 'имя не указано';
        }

        const salePointsHtml = salePoints.map(({address, description, id: salePointId, phone, title, working_hours}) => {
            return `
                <div class="factory-cards-offer-map__sale-point-address-container">${address}</div>
                <button
                    class="factory-cards-offer-map__show-on-map-button factory-cards-offer-map__show-on-map-button_with-offset j-factory-cards-offer-map__placemark-link"
                    data-placemark-id="${id}_${salePointId}"
                    type="button"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.582 491.582" width="14" height="14">
                        <path
                            d="M245.791,0C153.799,0,78.957,74.841,78.957,166.833c0,36.967,21.764,93.187,68.493,176.926 c31.887,57.138,63.627,105.4,64.966,107.433l22.941,34.773c2.313,3.507,6.232,5.617,10.434,5.617s8.121-2.11,10.434-5.617    l22.94-34.771c1.326-2.01,32.835-49.855,64.967-107.435c46.729-83.735,68.493-139.955,68.493-176.926    C412.625,74.841,337.783,0,245.791,0z M322.302,331.576c-31.685,56.775-62.696,103.869-64.003,105.848l-12.508,18.959    l-12.504-18.954c-1.314-1.995-32.563-49.511-64.007-105.853c-43.345-77.676-65.323-133.104-65.323-164.743    C103.957,88.626,167.583,25,245.791,25s141.834,63.626,141.834,141.833C387.625,198.476,365.647,253.902,322.302,331.576z" fill="currentColor" />
                        <path
                            d="M245.791,73.291c-51.005,0-92.5,41.496-92.5,92.5s41.495,92.5,92.5,92.5s92.5-41.496,92.5-92.5    S296.796,73.291,245.791,73.291z M245.791,233.291c-37.22,0-67.5-30.28-67.5-67.5s30.28-67.5,67.5-67.5    c37.221,0,67.5,30.28,67.5,67.5S283.012,233.291,245.791,233.291z" fill="currentColor" />
                    </svg>
                    Показать на карте
                </button>
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

        const catalogCategoriesLevelTwoTitleList = catalog_level_two.map(({title}) => title).join(', ');

        const ratingLayout = rating > 0 ? `
            <div class="factory-cards-offer-map__rating-container">
                <div class="factory-cards-offer-map__rating-star-container">
                    <div class="factory-cards-offer-map__rating-star-container-default"></div>
                    <div class="factory-cards-offer-map__rating-star-container-active" style="width: ${20 * rating}px"></div>
                </div>
            </div>
        `: '';

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
                            class="factory-cards-offer-map__show-on-map-button factory-cards-offer-map__show-on-map-button_with-offset j-factory-cards-offer-map__placemark-link"
                            data-placemark-id="${id}"
                            type="button"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.582 491.582" width="14" height="14">
                                <path
                                    d="M245.791,0C153.799,0,78.957,74.841,78.957,166.833c0,36.967,21.764,93.187,68.493,176.926 c31.887,57.138,63.627,105.4,64.966,107.433l22.941,34.773c2.313,3.507,6.232,5.617,10.434,5.617s8.121-2.11,10.434-5.617    l22.94-34.771c1.326-2.01,32.835-49.855,64.967-107.435c46.729-83.735,68.493-139.955,68.493-176.926    C412.625,74.841,337.783,0,245.791,0z M322.302,331.576c-31.685,56.775-62.696,103.869-64.003,105.848l-12.508,18.959    l-12.504-18.954c-1.314-1.995-32.563-49.511-64.007-105.853c-43.345-77.676-65.323-133.104-65.323-164.743    C103.957,88.626,167.583,25,245.791,25s141.834,63.626,141.834,141.833C387.625,198.476,365.647,253.902,322.302,331.576z" fill="currentColor" />
                                <path
                                    d="M245.791,73.291c-51.005,0-92.5,41.496-92.5,92.5s41.495,92.5,92.5,92.5s92.5-41.496,92.5-92.5    S296.796,73.291,245.791,73.291z M245.791,233.291c-37.22,0-67.5-30.28-67.5-67.5s30.28-67.5,67.5-67.5    c37.221,0,67.5,30.28,67.5,67.5S283.012,233.291,245.791,233.291z" fill="currentColor" />
                            </svg>
                            Показать на карте
                        </button>
                        ${salePointsBlock}
                        <div class="factory-cards-offer-map__price-container">
                            <span class="factory-cards-offer-map__price-title">Цена:</span>
                            <span class="factory-cards-offer-map__price">
                                ${price}
                            </span>
                        </div>
                        <div class="factory-cards-offer-map__contacts-block">
                            <div class="factory-cards-offer-map__phone-container">
                                <span class="factory-cards-offer-map__phone-title">Телефон:</span>
                                <a class="j-modules-common-offers-list__phone-link" href="tel:${phone}">${phone}</a>
                            </div>
                            <div class="factory-cards-offer-map__seller-info-container">
                                <span class="factory-cards-offer-map__seller-info-title">Продавец:</span>
                                <a href="${sellerLink}">${_name}</a>
                            </div>
                        </div>
                    </div>
                    <div class="factory-cards-offer-map__category-block">
                        <div>
                            <span class="factory-cards-offer-map__category-title">Товары:</span>
                            ${catalogCategoriesLevelTwoTitleList}
                        </div>
                        ${ratingLayout}
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
