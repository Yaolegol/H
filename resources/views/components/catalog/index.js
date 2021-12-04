import {addEventListener} from 'helpers/events';
import './index.less';

class Catalog {
    constructor(item) {
        this.module = item;
        this.initialSelectedItemId = this.module.dataset.initialSelectedItemId;
        this.contentItemList = [
            ...this.module.querySelectorAll('.j-components-catalog-content-item')
        ];
        this.navigationItemList = [
            ...this.module.querySelectorAll('.j-components-catalog-navigation-item')
        ];

        this.selectedContentItem = null;
        this.selectedNavigationItem = null;

        addEventListener(this.module, 'mouseover', this.handleMouseOver);

        this.init();
    }

    handleMouseOver = (e) => {
        const {target} = e;
        const isNavigationItem = target.classList.contains('j-components-catalog-navigation-item');

        if (isNavigationItem) {
            const {itemId} = target.dataset;

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
            this.selectedNavigationItem.classList.add('components-catalog-navigation-item_active');
        }
    }

    unselectContentItem = () => {
        if(this.selectedContentItem) {
            this.selectedContentItem.classList.remove('selected');
        }
    }

    unselectNavigationItem = () => {
        if(this.selectedNavigationItem) {
            this.selectedNavigationItem.classList.remove('components-catalog-navigation-item_active');
        }
    }
}

const list = document.querySelectorAll('.j-components-catalog');

list.forEach((item) => {
    new Catalog(item);
})

