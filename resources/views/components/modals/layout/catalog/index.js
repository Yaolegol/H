import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import 'views/components/inputs/search';
import "views/components/modals/layout/catalog/content";
import "views/components/modals/layout/catalog/navigation";
import 'views/components/search/catalog';
import './index.less';

class Catalog {
    constructor(item) {
        this.module = item;
        this.initialSelectedItemId = 0;
        this.contentItemList = [
            ...this.module.querySelectorAll('.j-components-catalog-content-item')
        ];
        this.navigationItemList = [
            ...this.module.querySelectorAll('.j-components-catalog-navigation-item')
        ];

        this.selectedContentItem = null;
        this.selectedNavigationItem = null;

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'mouseover', this.handleMouseOver);
    }

    handleMouseOver = (e) => {
        const {target} = e;
        const navigationItem = target.closest('.j-components-catalog-navigation-item');

        if (navigationItem) {
            const {itemId} = navigationItem.dataset;
            this.setActiveItem(itemId);
        }
    }

    init = () => {
        this.setContentItemsData();
        this.setNavigationItemList();

        this.setActiveItem(this.initialSelectedItemId);
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

    setActiveItem = (id) => {
        this.unselectNavigationItem();
        this.selectNavigationItem(id);

        this.unselectContentItem();
        this.selectContentItem(id);
    }

    setContentItemsData = () => {
        this.contentItemsData = this.contentItemList.reduce((acc, element) => {
            const {itemId} = element.dataset;

            const categoryList = [...element.querySelectorAll('.j-components-catalog-content-item__category')];
            const formattedCategoryList = categoryList.map((element) => {
                const {value} = element.dataset;

                return {
                    element,
                    value,
                }
            });

            return {
                ...acc,
                [itemId]: {
                    element,
                    list: formattedCategoryList,
                }
            }
        }, {});
    }

    setNavigationItemList = () => {
        this.catalogList = this.navigationItemList.reduce((acc, element) => {
            const {itemId, itemValue} = element.dataset;

            return [
                ...acc,
                {
                    elements: {
                        content: this.contentItemsData[itemId],
                        navigation: {
                            element,
                            value: itemValue,
                        },
                    },
                    id: itemId,
                }
            ]
        }, []);
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

module.initModule('j-modules-common-catalog', Catalog);
