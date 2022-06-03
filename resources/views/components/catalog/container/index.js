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

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'mouseover', this.handleMouseOver);
        addEventListener(document, 'j-event-components-test__input', this.handleInput);
    }

    checkActiveItem = () => {
        const isSelectedItemHidden = this.selectedNavigationItem.classList.contains('hidden');

        if(!isSelectedItemHidden) {
            return;
        }

        const navigationItem = this.navigationItemList.find((element) => {
            return !element.classList.contains('hidden');
        });

        if (navigationItem) {
            this.setActiveItem(navigationItem.dataset.itemId);
        }
    }

    handleInput = (e) => {
        const {detail} = e;
        const {value} = detail;

        if(!value) {
            this.showAll();
            this.setActiveItem(this.initialSelectedItemId);

            return;
        }

        this.showSearchedItems(value);
        this.checkActiveItem();
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

    showAll = () => {
        this.catalogList.forEach(({elements}) => {
            const {content, navigation} = elements;
            const {element: navigationElement} = navigation;
            const {element: contentElement, list: categoryList} = content;

            categoryList.forEach(({element}) => {
                element.classList.remove('hidden');
            });

            navigationElement.classList.remove('hidden');
            contentElement.classList.remove('hidden');
        });
    }

    showSearchedItems = (searchValue) => {
        const regexp = new RegExp(searchValue, 'giu');

        this.catalogList.forEach(({elements}) => {
            const {content, navigation} = elements;
            const {element: navigationElement, value: navigationValue} = navigation;
            const {element: contentElement, list: categoryList} = content;

            let isCategoryExists = false;

            categoryList.forEach(({element, value}) => {
                if(value === 'Остальное') {
                    return;
                }

                const isSuit = value.match(regexp);

                if(isSuit) {
                    element.classList.remove('hidden');
                    isCategoryExists = true;
                } else {
                    element.classList.add('hidden');
                }
            });

            const isSuit = navigationValue.match(regexp);

            if(!isSuit && !isCategoryExists) {
                navigationElement.classList.add('hidden');
                contentElement.classList.add('hidden');
            } else {
                navigationElement.classList.remove('hidden');
                contentElement.classList.remove('hidden');
            }
        });
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

