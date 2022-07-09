import {addEventListener} from "helpers/events";
import {module} from "helpers/module";

class SearchCatalog {
    constructor(item) {
        this.module = item;
        this.initialSelectedItemId = 0;
        this.navigationItemsList = [
            ...this.module.querySelectorAll('.j-components-search-catalog__navigation-item')
        ];
        this.contentBlocksList = [
            ...this.module.querySelectorAll('.j-components-search-catalog__content-block')
        ];

        this.selectedContentItem = null;
        this.selectedNavigationItem = null;

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event-inputs-search__input', this.handleInput);
    }

    checkActiveItem = () => {
        const isSelectedItemHidden = this.selectedNavigationItem.classList.contains('hidden');

        if(!isSelectedItemHidden) {
            return;
        }

        const navigationItem = this.navigationItemsList.find((element) => {
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

    init = () => {
        const contentBlockData = this.contentBlocksList.reduce((acc, element) => {
            const {itemId, value} = element.dataset;
            const items = [...element.querySelectorAll('.j-components-search-catalog__content-item')];

            const itemsList = items.map((itemElement) => {
                const {value} = itemElement.dataset;

                return {
                    element: itemElement,
                    value,
                }
            });

            return {
                ...acc,
                [itemId]: {
                    element,
                    itemsList,
                    value
                },
            }
        }, {});

        this.searchData = this.navigationItemsList.reduce((acc, element) => {
            const {itemId, value} = element.dataset;
            const content = contentBlockData[itemId];

            return {
                ...acc,
                [itemId]: {
                    content,
                    navigation: {
                        element,
                        value,
                    }
                }
            }
        }, {});
    }

    selectContentItem = (id) => {
        const selectedItem = this.contentItemsList.find((item) => {
            return item.dataset.itemId === id;
        });

        if(selectedItem) {
            this.selectedContentItem = selectedItem;
            this.selectedContentItem.classList.add('selected');
        }
    }

    selectNavigationItem = (id) => {
        const selectedItem = this.navigationItemsList.find((item) => {
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

    showAll = () => {
        this.navigationItemsList.forEach(({elements}) => {
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
        const regexp = new RegExp(searchValue, 'i');

        this.searchData.forEach(({elements}) => {
            const {content, navigation} = elements;
            const {element: navigationElement, value: navigationValue} = navigation;
            const {element: contentElement, list: categoryList} = content;

            let isCategoryExists = false;

            categoryList.forEach(({element, value}) => {
                if(value === 'Остальное') {
                    return;
                }

                const isSuit = regexp.test(value);

                if(isSuit) {
                    element.classList.remove('hidden');
                    isCategoryExists = true;
                } else {
                    element.classList.add('hidden');
                }
            });

            const isSuit = regexp.test(navigationValue);

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

module.initModule('j-components-search-catalog', SearchCatalog);
