import {EVENTS_NAMES} from "events/index";
import {addEventListener} from 'helpers/events';
import "views/modules/catalog/content-item";
import "views/modules/catalog/navigation-item";
import './index.less';

const {
    COMMON: {
        CATALOG: {
            OPEN,
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
        this.navigationItemList = [
            ...this.module.querySelectorAll('[data-item-role="catalog-navigation-item"]')
        ];

        this.selectedContentItem = null;
        this.selectedNavigationItem = null;

        addEventListener(document, OPEN, this.handleCatalogOpen);
        addEventListener(this.backdrop, 'click', this.handleBackdropClick);
        addEventListener(this.module, 'mouseover', this.handleMouseOver);

        this.init();
    }

    handleBackdropClick = (e) => {
        this.module.classList.remove('show');
    }

    handleCatalogOpen = (e) => {
        this.module.classList.add('show');
    }

    handleMouseOver = (e) => {
        const {itemId, itemRole} = e.target.dataset;

        if ('catalog-navigation-item' === itemRole) {
            this.unselectNavigationItem();
            this.selectNavigationItem(itemId);

            this.unselectContentItem();
            this.selectContentItem(itemId);
        }
    }

    init = () => {
        this.selectNavigationItem(this.initialSelectedItemId);
        this.selectContentItem(this.initialSelectedItemId);
    }

    // resetState = () => {
    //     this.unselectNavigationItem();
    //     this.unselectContentItem();
    //
    //     this.selectedContentItem = null;
    //     this.selectedNavigationItem = null;
    // }

    selectContentItem = (id) => {
        const selectedItem = this.contentItemList.find((item) => {
            return item.dataset.itemId === id;
        });

        if(selectedItem) {
            this.selectedContentItem = selectedItem;
            this.selectedContentItem.classList.add('selected');
        }
    }

    selectNavigationItem = (id) => {
        const selectedItem = this.navigationItemList.find((item) => {
            return item.dataset.itemId === id;
        });

        if(selectedItem) {
            this.selectedNavigationItem = selectedItem;
            this.selectedNavigationItem.classList.add('catalog-navigation-item_active');
        }
    }

    unselectContentItem = () => {
        if(this.selectedContentItem) {
            this.selectedContentItem.classList.remove('selected');
        }
    }

    unselectNavigationItem = () => {
        if(this.selectedNavigationItem) {
            this.selectedNavigationItem.classList.remove('catalog-navigation-item_active');
        }
    }
}

const list = document.querySelectorAll('.j-modules-catalog');

list.forEach((item) => {
    new Catalog(item);
})

