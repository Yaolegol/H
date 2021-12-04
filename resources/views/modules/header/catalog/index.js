import {EVENTS_NAMES} from "events/index";
import {addEventListener} from 'helpers/events';
import 'views/components/catalog';
import './index.less';

const {
    COMMON: {
        CATALOG: {
            OPEN,
        }
    }
} = EVENTS_NAMES;

class CatalogModal {
    constructor(item) {
        this.module = item;
        this.backdrop = this.module.querySelector('.j-header-catalog__backdrop');

        addEventListener(document, OPEN, this.handleCatalogOpen);
        addEventListener(this.backdrop, 'click', this.handleBackdropClick);
    }

    handleBackdropClick = (e) => {
        this.module.classList.remove('show');
    }

    handleCatalogOpen = (e) => {
        this.module.classList.add('show');
    }
}

const list = document.querySelectorAll('.j-header-catalog');

list.forEach((item) => {
    new CatalogModal(item);
})

