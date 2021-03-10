import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import './index.less';

const {
    COMMON: {
        CATALOG: {
            TOGGLE
        }
    }
} = EVENTS_NAMES;

class Burger {
    constructor(item) {
        this.module = item;

        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        document.dispatchEvent(new CustomEvent(TOGGLE));
    }
}

const list = document.querySelectorAll('.j-components-buttons-burger');

list.forEach((item) => {
    new Burger(item);
})
