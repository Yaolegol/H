import 'views/modules/pages/favorites/shared/components/button';
import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from "helpers/events";
import {plural_ru} from "helpers/plural";
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
        const {address, created_at, description, id, img, link: productLink, phone, price, price_description, rating, rating_votes, title} = product;
        const {src} = img;
        const {link: sellerLink, name} = seller;
        const {catalog_level_one, catalog_level_two} = catalog;

        console.log('catalog_level_one');
        console.log(catalog_level_one);

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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 44" fill="none">
                        <path d="M14.577 43.2384L2.46606 22.2616C-3.11798 12.5898 3.86207 0.5 15.0301 0.5C26.1982 0.5 33.1783 12.5898 27.5942 22.2616L15.4833 43.2384C15.2819 43.5872 14.7784 43.5872 14.577 43.2384Z" stroke="currentColor" stroke-width="2"/>
                        <circle cx="15" cy="15" r="7.5" stroke="currentColor" stroke-width="2"/>
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
                    <a
                        class="modules-pages-favorites-shared-components-button__hint-link"
                        href="/login"
                        target="_blank"
                    >
                        Войти
                    </a>
                </div>
                <div class="modules-pages-favorites-shared-components-button__hint-text-container">
                    <div class="modules-pages-favorites-shared-components-button__hint-text">или</div>
                </div>
                <div class="modules-pages-favorites-shared-components-button__hint-text-container">
                    <a
                        class="modules-pages-favorites-shared-components-button__hint-link"
                        href="/register"
                        target="_blank"
                    >
                        Зарегистрироваться
                    </a>
                </div>
                <div class="modules-pages-favorites-shared-components-button__hint-text-container">
                    Это бесплатно!
                </div>
            </div>
        `: '';

        const favoritesBlock = `
            <div
                class="modules-pages-favorites-shared-components-button j-favorites-components-button"
                data-id="${id}"
            >
                <button class="modules-pages-favorites-shared-components-button__button j-favorites-components-button__button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" fill="currentColor">
                        <path d="M23.5631 1.52369L28.6205 12.2419C29.0158 13.0798 29.786 13.6714 30.6896 13.8088L41.9982 15.5275C43.4083 15.7419 44.0318 17.6017 42.9619 18.6926L34.7789 27.0356C34.1349 27.6922 33.846 28.6315 33.9962 29.5472L35.9279 41.3277C36.1839 42.8887 34.639 43.9671 33.4014 43.2866L23.2867 37.7246C22.482 37.2821 21.518 37.2821 20.7133 37.7246L10.5986 43.2866C9.36104 43.9671 7.81613 42.8887 8.07211 41.3277L10.0038 29.5472C10.154 28.6315 9.8651 27.6922 9.22107 27.0356L1.03809 18.6926C-0.0318016 17.6017 0.591688 15.7419 2.00177 15.5275L13.3104 13.8088C14.214 13.6714 14.9842 13.0798 15.3795 12.2419L20.4369 1.52369C21.0809 0.158771 22.9191 0.15877 23.5631 1.52369Z" stroke="currentColor"/>
                    </svg>
                </button>
                ${favoritesHint}
            </div>
        `;

        const productsCategories = catalog_level_one.map(({title}) => title).join(', ');

        const ratingLayout = rating > 0 ? `
            <div class="factory-cards-offer-map__rating-container">
                <div class="factory-cards-offer-map__rating-star-container">
                    <div class="factory-cards-offer-map__rating-star-container-default"></div>
                    <div class="factory-cards-offer-map__rating-star-container-active" style="width: ${20 * rating}px"></div>
                </div>
                <div class="factory-cards-offer-map__rating-votes-container">${rating_votes} ${plural_ru(rating_votes, ['оценка', 'оценки', 'оценок'])}</div>
            </div>
        `: '';

        const createdAtDate = new Date(created_at);
        const createdAtMonth = createdAtDate.getMonth() + 1;
        const createdAtDay = createdAtDate.getDate();
        const createdAtDayFormatted = createdAtDay < 10 ? `0${createdAtDay}` : createdAtDay;
        const createdAtMonthFormatted = createdAtMonth < 10 ? `0${createdAtMonth}` : createdAtMonth;
        const createdAtYear = createdAtDate.getFullYear();

        const imageLayout = src ? `
            <img
                alt=""
                class="factory-cards-offer-map__image"
                src="${src}"
            >
        ` : `
            <div class="factory-cards-offer-map__image-no">
                нет фото
            </div>
        `;

        return `
            <div class="factory-cards-offer-map j-factory-cards-offer-map">
                <div class="factory-cards-offer-map__image-block">
                    <div class="factory-cards-offer-map__image-container">
                        ${imageLayout}
                        <a
                            class="factory-cards-offer-map__image-link"
                            href="${productLink}"
                            target="_blank"
                        ></a>
                    </div>
                </div>
                <div class="factory-cards-offer-map__content-block">
                    <div class="factory-cards-offer-map__info-section">
                        <div>
                            <a
                                class="factory-cards-offer-map__product-link"
                                href="${productLink}"
                                target="_blank"
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
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 44" fill="none">
                                <path d="M14.577 43.2384L2.46606 22.2616C-3.11798 12.5898 3.86207 0.5 15.0301 0.5C26.1982 0.5 33.1783 12.5898 27.5942 22.2616L15.4833 43.2384C15.2819 43.5872 14.7784 43.5872 14.577 43.2384Z" stroke="currentColor" stroke-width="2"/>
                                <circle cx="15" cy="15" r="7.5" stroke="currentColor" stroke-width="2"/>
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
                                <a
                                    class="j-modules-common-offers-list__phone-link"
                                    href="tel:${phone}"
                                >
                                    ${phone}
                                </a>
                            </div>
                            <div class="factory-cards-offer-map__seller-info-container">
                                <span class="factory-cards-offer-map__seller-info-title">Фермер:</span>
                                <a
                                    href="${sellerLink}"
                                    target="_blank"
                                >
                                    ${_name}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="factory-cards-offer-map__category-block">
                        <div>
                            <span class="factory-cards-offer-map__category-title">Категории:</span>
                            ${productsCategories}
                        </div>
                        ${ratingLayout}
                        <div class="factory-cards-offer-map__created-at-block">
                            Опубликовано: ${createdAtDayFormatted}.${createdAtMonthFormatted}.${createdAtYear}
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
