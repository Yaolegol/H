import {addEventListener} from "helpers/events";
import {setUrlQuery} from "helpers/query";
import './index.less';

class LocationModalContent {
    constructor(item) {
        this.module = item;
        addEventListener(this.module, 'click', this.handleModuleClick);
    }

    handleModuleClick = (e) => {
        const target = e.target;
        const isLocationButton = target.classList.contains('j-location-modal-content__location-button');

        if(isLocationButton) {
            this.setLocationCookie(target);
            this.setLocationQuery(target);
            document.location.reload();
        }
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

const list = [...document.querySelectorAll('.j-location-modal-content')];

list.forEach((item) => {
    new LocationModalContent(item);
});
