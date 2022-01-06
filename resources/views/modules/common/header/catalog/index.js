import {EVENTS_NAMES} from "events/index";
import {addEventListener} from 'helpers/events';
import "views/modules/common/header/catalog/catalogLink";
import 'views/components/catalog/container';
import "views/components/catalog/category-item";
import "views/components/catalog/content-item";
import "views/components/catalog/content-item-container";
import "views/components/catalog/navigation-item";
import "views/components/catalog/navigation-item-container";
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

