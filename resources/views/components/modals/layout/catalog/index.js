import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import 'views/components/inputs/search';
import "views/components/modals/layout/catalog/content";
import "views/components/modals/layout/catalog/navigation";
import 'views/components/search/catalog';
import './index.less';

const {
    COMMON: {
        MODALS: {
            COMMON: {
                CLOSE,
            }
        }
    }
} = EVENTS_NAMES;

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
        addEventListener(document, 'j-event-modules-common-catalog__check-is-active-hidden', this.handleCheckIsActiveHidden);
        addEventListener(document, CLOSE, this.handleModalClose);
    }

    getFirstVisibleNavigationItemId = () => {
        const firstVisibleNavigationItem = this.navigationItemList.find((element) => {
            return !element.classList.contains('hidden');
        });

        return firstVisibleNavigationItem.dataset.itemId;
    }

    handleCheckIsActiveHidden = () => {
        const isNavigationItemHidden = this.isActiveNavigationItemHidden();

        if(!isNavigationItemHidden) {
            return;
        }

        const id = this.getFirstVisibleNavigationItemId();
        this.setActiveItem(id);
    }

    handleModalClose = () => {
        document.removeEventListener('j-event-modules-common-catalog__check-is-active-hidden', this.handleCheckIsActiveHidden);
        document.removeEventListener(CLOSE, this.handleModalClose);
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
        this.setCatalogData();

        this.setActiveItem(this.initialSelectedItemId);
    }

    isActiveNavigationItemHidden = () => {
        return this.selectedNavigationItem.classList.contains('hidden');
    }

    selectContentItem = (id) => {
        if(this.selectedContentItem) {
            this.selectedContentItem.classList.remove('selected');
        }

        this.selectedContentItem = this.catalogData[id].content.element;
        this.selectedContentItem.classList.add('selected');
    }

    selectNavigationItem = (id) => {
        if(this.selectedNavigationItem) {
            this.selectedNavigationItem.classList.remove('selected');
        }

        this.selectedNavigationItem = this.catalogData[id].navigation.element;
        this.selectedNavigationItem.classList.add('selected');
    }

    setActiveItem = (id) => {
        this.selectNavigationItem(id);
        this.selectContentItem(id);
    }

    setCatalogData = () => {
        const contentData = this.contentItemList.reduce((acc, element) => {
            const {itemId} = element.dataset;

            return {
                ...acc,
                [itemId]: element,
            }
        }, {});

        this.catalogData = this.navigationItemList.reduce((acc, element) => {
            const {itemId} = element.dataset;

            return {
                ...acc,
                [itemId]: {
                    content: {
                        element: contentData[itemId],
                    },
                    navigation: {
                        element,
                    }
                }
            };
        }, {});
    }
}

module.initModule('j-modules-common-catalog', Catalog);
