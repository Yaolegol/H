import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import './index.less';

const {
    COMMON: {
        MODALS: {
            COMMON: {
                OPEN,
            }
        }
    }
} = EVENTS_NAMES;

class MapWebFiltersOpenModalButton {
    constructor(item) {
        this.module = item;
        this.defaultTitle = this.module.dataset.defaultTitle;
        this.title = this.module.querySelector('.j-map-web-filters-open-modal-button__title');
        this.button = this.module.querySelector('.j-map-web-filters-open-modal-button__button');
        this.buttonReset = this.module.querySelector('.j-map-web-filters-open-modal-button__button-reset');

        this.bind();
    }

    bind = () => {
        addEventListener(this.button, 'click', this.handleOpenModalClick);
        addEventListener(this.buttonReset, 'click', this.handleResetClick);
        addEventListener(document, 'j-event--map-filter-update', this.handleUpdateMapFilter)
    }

    handleOpenModalClick = (e) => {
        document.dispatchEvent(new CustomEvent(OPEN, {
            detail: {
                name: 'categories'
            }
        }));
    }

    handleResetClick = (e) => {
        document.dispatchEvent(new CustomEvent('j-event--map-web-filters-open-modal-button__reset'));
    }

    handleUpdateMapFilter = (e) => {
        const {title} = e.detail;

        this.title.textContent = title || this.defaultTitle;
    }
}

const list = document.querySelectorAll('.j-map-web-filters-open-modal-button');

list.forEach((item) => {
    new MapWebFiltersOpenModalButton(item);
})
