import {addEventListener} from "helpers/events";
import './index.less';

class LocationModalContent {
    constructor(item) {
        this.module = item;
        addEventListener(this.module, 'click', this.handleModuleClick);
    }

    setLocationCookie = (target) => {
        const {searchCountryId, searchRegionId, searchCityId} = target.dataset;

        document.cookie = `search-country-id=${searchCountryId};path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT;`;
        document.cookie = `search-region-id=${searchRegionId};path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT;`;

        if(searchCityId) {
            document.cookie = `search-city-id=${searchCityId};path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT;`;
        }
    }

    handleModuleClick = (e) => {
        const target = e.target;
        const isLocationButton = target.classList.contains('j-location-modal-content__location-button');

        if(isLocationButton) {
            this.setLocationCookie(target);
            document.location.reload();
        }
    }
}

const list = [...document.querySelectorAll('.j-location-modal-content')];

list.forEach((item) => {
    new LocationModalContent(item);
});
