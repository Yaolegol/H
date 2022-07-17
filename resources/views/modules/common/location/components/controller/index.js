import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import {setUrlQuery} from "helpers/query";

class LocationController {
    constructor(item) {
        this.module = item;

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event--location-common-open-modal-button__reset', this.handleResetClick);
        addEventListener(this.module, 'click', this.handleModuleClick);
    }

    handleModuleClick = (e) => {
        console.log('--- LocationController handleModuleClick')

        const target = e.target;
        const isLocationButton = target.classList.contains('j-location-controller__location-button');

        if(isLocationButton) {
            this.setLocationCookie(target);
            this.setLocationQuery(target);
            document.location.reload();
        }
    }

    handleResetClick = (e) => {
        this.resetLocationCookie();
        this.resetLocationQuery();
        document.location.reload();
    }

    resetLocationCookie = () => {
        const now = new Date();

        document.cookie = `search-region-id=0;expires=${now};`;
        document.cookie = `search-city-id=0;expires=${now};`;
    }

    resetLocationQuery = () => {
        const queryDataArray = [
            {
                key: 'search-country-id',
                value: null,
            },
            {
                key: 'search-region-id',
                value: null,
            },
            {
                key: 'search-city-id',
                value: null,
            }
        ];

        setUrlQuery(queryDataArray);
    }

    setLocationCookie = (target) => {
        const {searchCountryId = 1, searchRegionId, searchCityId} = target.dataset;
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
        const {searchCountryId = 1, searchRegionId, searchCityId} = target.dataset;

        const queryDataArray = [
            {
                key: 'search-country-id',
                value: searchCountryId,
            },
            {
                key: 'search-region-id',
                value: searchRegionId,
            },
            {
                key: 'search-city-id',
                value: searchCityId,
            }
        ];

        setUrlQuery(queryDataArray);
    }
}

module.initModule('j-location-controller', LocationController);
