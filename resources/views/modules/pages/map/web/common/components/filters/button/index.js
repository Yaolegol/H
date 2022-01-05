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

        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        document.dispatchEvent(new CustomEvent(OPEN, {
            detail: {
                name: 'categories'
            }
        }));
    }
}

const list = document.querySelectorAll('.j-map-web-filters-open-modal-button');

list.forEach((item) => {
    new MapWebFiltersOpenModalButton(item);
})
