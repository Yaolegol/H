import {EVENTS_NAMES} from "events/index";
import {addEventListener} from 'helpers/events';
import "views/modules/navigation-item";
import './index.less';

const {
    COMMON: {
        CATALOG: {
            TOGGLE
        }
    }
} = EVENTS_NAMES;

class Catalog {
    constructor(item) {
        this.module = item;
        this.backdrop = this.module.querySelector('.j-modules-catalog__backdrop');

        addEventListener(document, TOGGLE, this.handleCatalogToggle);
        addEventListener(this.backdrop, 'click', this.handleBackdropClick);
    }

    handleBackdropClick = () => {
        this.module.classList.toggle('show');
    }

    handleCatalogToggle = (e) => {
        this.module.classList.toggle('show');
    }
}

const list = document.querySelectorAll('.j-modules-catalog');

list.forEach((item) => {
    new Catalog(item);
})

