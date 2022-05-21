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
        this.button = this.module.querySelector('.j-map-web-filters-open-modal-button__title');

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
        addEventListener(document, 'j-event--map-filter-update', this.handleUpdateMapFilter)
    }

    handleClick = (e) => {
        document.dispatchEvent(new CustomEvent(OPEN, {
            detail: {
                name: 'categories'
            }
        }));
    }

    handleUpdateMapFilter = (e) => {
        const {title} = e.detail;

        this.button.textContent = title;
    }
}

const list = document.querySelectorAll('.j-map-web-filters-open-modal-button');

list.forEach((item) => {
    new MapWebFiltersOpenModalButton(item);
})
