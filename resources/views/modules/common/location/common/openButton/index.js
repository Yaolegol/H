import {addEventListener} from 'helpers/events';
import {locationOpenModal} from 'views/modules/common/location/helpers';

class LocationCommonOpenModalButton {
    constructor(item) {
        this.module = item;
        this.button = this.module.querySelector('.j-location-common-open-modal-button__button');
        this.buttonReset = this.module.querySelector('.j-location-common-open-modal-button__button-reset');

        this.bind();
    }

    bind = () => {
        addEventListener(this.button, 'click', this.handleOpenModalClick);
        addEventListener(this.buttonReset, 'click', this.handleResetClick);

    }

    handleOpenModalClick = (e) => {
        locationOpenModal();
    }

    handleResetClick = (e) => {
        document.dispatchEvent(new CustomEvent('j-event--location-common-open-modal-button__reset'));
    }
}

const list = document.querySelectorAll('.j-location-common-open-modal-button');

list.forEach((item) => {
    new LocationCommonOpenModalButton(item);
})
