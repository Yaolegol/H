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

class Location {
    constructor(item) {
        this.module = item;

        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        document.dispatchEvent(new CustomEvent(OPEN, {
            detail: {
                name: 'location'
            }
        }));
    }
}

const list = document.querySelectorAll('.j-components-buttons-location');

list.forEach((item) => {
    new Location(item);
})
