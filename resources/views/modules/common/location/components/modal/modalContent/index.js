import {addEventListener} from "helpers/events";
import {setLocationWithNewRegion} from "helpers/location";
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
            const {link} = target.dataset;

            setLocationWithNewRegion(link);
        }
    }
}

const list = [...document.querySelectorAll('.j-location-modal-content')];

list.forEach((item) => {
    new LocationModalContent(item);
});
