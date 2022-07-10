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

        this.searchDataList = this.navigationItemsList.map((element) => {
            const {itemId, value} = element.dataset;
            const content = contentBlockData[itemId];

            return {
                content,
                navigation: {
                    element,
                    value,
                }
            }
        });
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
        this.searchDataList.forEach(({content, navigation}) => {
            const {element: navigationElement} = navigation;
            const {element: contentBlockElement, itemsList: contentItemsList} = content;

            contentItemsList.forEach(({element}) => {
                element.classList.remove('hidden');
            });

            navigationElement.classList.remove('hidden');
            contentBlockElement.classList.remove('hidden');
        });
    }

    showSearchedItems = (searchValue) => {
        const regexp = new RegExp(searchValue, 'i');

        this.searchDataList.forEach(({content, navigation}) => {
            const {element: navigationElement, value: navigationValue} = navigation;
            const {element: contentBlockElement, itemsList: contentItemsList, value: contentValue} = content;

            let isContentExists = false;

            contentItemsList.forEach(({element, value}) => {
                if(value === 'Остальное') {
                    return;
                }

                const isSuit = regexp.test(value);

                if(isSuit) {
                    isContentExists = true;
                    element.classList.remove('hidden');
                } else {
                    element.classList.add('hidden');
                }
            });

            const isNavigationValueSuit = regexp.test(navigationValue) || navigationValue === 'Другое';
            const isSuit = isNavigationValueSuit || isContentExists;

            if(!isSuit) {
                navigationElement.classList.add('hidden');
                contentBlockElement.classList.add('hidden');
            } else {
                navigationElement.classList.remove('hidden');
                contentBlockElement.classList.remove('hidden');
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
