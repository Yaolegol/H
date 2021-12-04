import {addEventListener} from 'helpers/events';
import {locationOpenModal} from 'views/modules/location/helpers';

class LocationCommonOpenModalButton {
    constructor(item) {
        this.module = item;

        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        locationOpenModal();
    }
}

const list = document.querySelectorAll('.j-location-common-open-modal-button');

list.forEach((item) => {
    new LocationCommonOpenModalButton(item);
})
