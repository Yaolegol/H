import {EVENTS_NAMES} from "events/index";
import {addEventListener} from 'helpers/events';
import "views/modules/header/catalog/category-item";
import "views/modules/header/catalog/content-item";
import "views/modules/header/catalog/navigation-item";
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
        this.backdrop = this.module.querySelector('.j-header-catalog__backdrop');
        this.contentItemList = [
            ...this.module.querySelectorAll('[data-item-role="header-catalog-content-item"]')
        ];
        this.navigationItemList = [
            ...this.module.querySelectorAll('[data-item-role="header-catalog-navigation-item"]')
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

        if ('header-catalog-navigation-item' === itemRole) {
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
            this.selectedNavigationItem.classList.add('header-catalog-navigation-item_active');
        }
    }

    unselectContentItem = () => {
        if(this.selectedContentItem) {
            this.selectedContentItem.classList.remove('selected');
        }
    }

    unselectNavigationItem = () => {
        if(this.selectedNavigationItem) {
            this.selectedNavigationItem.classList.remove('header-catalog-navigation-item_active');
        }
    }
}

const list = document.querySelectorAll('.j-header-catalog');

list.forEach((item) => {
    new Catalog(item);
})

