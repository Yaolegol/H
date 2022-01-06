import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from "helpers/events";
import {getUrlWithNewQueryData, setUrlQuery} from "helpers/query";
import 'views/components/catalog/container';
import "views/components/catalog/category-item";
import "views/components/catalog/content-item";
import "views/components/catalog/content-item-container";
import "views/components/catalog/navigation-item";
import "views/components/catalog/navigation-item-container";
import "views/modules/pages/map/web/common/components/filters/modal/modalContent/navigationContentButton";
import 'views/modules/pages/map/web/common/components/filters/modal/modalContent/navigationItem';
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

class MapFiltersModalContent {
    constructor(item) {
        this.module = item;
        addEventListener(this.module, 'click', this.handleModuleClick);
        // addEventListener(this.module, 'click', this.handleModuleClick);
    }

    closeModal = () => {
        document.dispatchEvent(new CustomEvent(CLOSE, {
            detail: {
                name: 'categories'
            }
        }));
    }

    handleModuleClick = (e) => {
        const target = e.target;
        const isNavigationContentButton = target.classList.contains('j-map-web-filters-components-navigation-content-button');

        if(isNavigationContentButton) {
            const id = target.dataset.id;
            const query = [
                {
                    key: 'catalogLevelTwoId',
                    value: id,
                }
            ];

            console.log('id')
            console.log(id)

            this.closeModal();
            setUrlQuery(query);
            this.sendMapFilterUpdateMessage();

            // this.setLocationCookie(target);
            // this.setLocationQuery(target);
            // document.location.reload();
        }
    }

    sendMapFilterUpdateMessage = () => {
        document.dispatchEvent(new CustomEvent('j-event--map-filter-update'));
    }

    setLocationCookie = (target) => {
        const {searchCountryId, searchRegionId, searchCityId} = target.dataset;
        const currentYear = new Date().getFullYear();
        const expirationTime = new Date(currentYear + 10, 0);

        document.cookie = `search-country-id=${searchCountryId};path=/;expires=${expirationTime};`;
        document.cookie = `search-region-id=${searchRegionId};path=/;expires=${expirationTime};`;

        if(searchCityId) {
            document.cookie = `search-city-id=${searchCityId};path=/;expires=${expirationTime};`;
        } else {
            document.cookie = `search-city-id=${searchCityId};path=/;expires=Thu, 01 Jan 1970 00:00:00 GMT;`;
        }
    }

    setLocationQuery = (target) => {
        const {searchCountryId, searchRegionId, searchCityId} = target.dataset;

        const queryDataArray = [
            {
                key: 'searchCountryId',
                value: searchCountryId,
            },
            {
                key: 'searchRegionId',
                value: searchRegionId,
            },
            {
                key: 'searchCityId',
                value: searchCityId,
            }
        ];

        const newUrl = getUrlWithNewQueryData({
            queryDataArray,
            removeQueryWithoutValue: true,
        });
        const newUrlString = newUrl.toString();

        history.pushState({}, null, newUrlString);
    }
}

const list = [...document.querySelectorAll('.j-map-web-filters-components-modal-modal-content')];

list.forEach((item) => {
    new MapFiltersModalContent(item);
});
