import {EVENTS_NAMES} from "events/index";
import {addEventListener} from 'helpers/events';
import "views/modules/catalog/content-item";
import "views/modules/catalog/navigation-item";
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
        this.initialSelectedItemId = this.module.dataset.initialSelectedItemId;
        this.backdrop = this.module.querySelector('.j-modules-catalog__backdrop');
        this.contentItemList = [
            ...this.module.querySelectorAll('[data-item-role="catalog-content-item"]')
        ];

        addEventListener(document, TOGGLE, this.handleCatalogToggle);
        addEventListener(this.backdrop, 'click', this.handleBackdropClick);
        addEventListener(this.module, 'mouseover', this.handleMouseOver);

        this.selectContentItem(this.initialSelectedItemId);
    }

    handleBackdropClick = (e) => {
        this.module.classList.toggle('show');
    }

    handleCatalogToggle = (e) => {
        this.module.classList.toggle('show');
    }

    handleMouseOver = (e) => {
        const {itemId, itemRole} = e.target.dataset;

        if ('catalog-navigation-item' === itemRole) {
            this.selectContentItem(itemId);
        }
    }

    selectContentItem = (id) => {
        const selectedItem = this.contentItemList.find((item) => {
            console.log('item.dataset.itemId')
            console.log(item.dataset.itemId)
            return item.dataset.itemId === id
        });

        if(this.selectedContentItem) {
            this.selectedContentItem.classList.remove('selected');
        }

        if(selectedItem) {
            this.selectedContentItem = selectedItem;
            this.selectedContentItem.classList.add('selected');
        }
    }
}

const list = document.querySelectorAll('.j-modules-catalog');

list.forEach((item) => {
    new Catalog(item);
})

