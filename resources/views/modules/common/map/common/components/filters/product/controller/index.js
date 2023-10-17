import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import {getUrlWithNewQueryData, setUrlQuery} from "helpers/query";

const {
    COMMON: {
        MODALS: {
            COMMON: {
                CLOSE,
            }
        }
    }
} = EVENTS_NAMES;

class MapProductFilterController {
    constructor(item) {
        this.module = item;

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event--modules-pages-map-web-common-components-filters-product-filter-button__reset', this.handleReset);
        addEventListener(document, 'click', this.handleClick);
    }

    handleClick = (e) => {
        const target = e.target;
        const isNavigationButton = target.classList.contains('j-modules-common-filters-product-modal-components-buttons-navigation');
        const isContentButton = target.classList.contains('j-modules-common-filters-product-modal-components-buttons-content');

        if(!isNavigationButton && !isContentButton) {
            return;
        }

        const id = target.dataset.id;
        const query = [];

        if(isNavigationButton) {
            const isMobile = window.innerWidth < 1024;

            if(isMobile) {
                if(!target.classList.contains('j-modules-common-filters-product-modal-components-buttons-navigation_mobile_clickable')) {
                    return;
                }
            }

            query.push(
                {
                    key: 'catalogLevelOneId',
                    value: id,
                },
                {
                    key: 'catalogLevelTwoId',
                    value: null,
                }
            );
        }

        if(isContentButton) {
            query.push(
                {
                    key: 'catalogLevelOneId',
                    value: null,
                },
                {
                    key: 'catalogLevelTwoId',
                    value: id,
                }
            );
        }

        if(window.location.pathname === '/') {
            setUrlQuery(query);
            this.setFilter(target.innerHTML);

            return;
        }

        window.location.href = getUrlWithNewQueryData({
            defaultUrl: window.location.origin,
            queryDataArray: query,
        });
    }

    handleReset = (e) => {
        this.resetUrlQuery();
        this.setFilter();
    }

    resetUrlQuery = () => {
        const query = [
            {
                key: 'catalogLevelOneId',
                value: null,
            },
            {
                key: 'catalogLevelTwoId',
                value: null,
            }
        ];

        setUrlQuery(query);
    }

    setFilter = (value) => {
        document.dispatchEvent(new CustomEvent(CLOSE));
        document.dispatchEvent(new CustomEvent('j-event-modules-pages-map-web-common-components-filters-product-controller__set-filter', {
            detail: {
                value,
            }
        }));
        document.dispatchEvent(new CustomEvent('j-event--map-filter-update'));
    }
}

module.initModule('j-modules-pages-map-web-common-components-filters-product-controller', MapProductFilterController);
