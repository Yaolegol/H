import {addEventListener} from 'helpers/events';
import {locationOpenModal} from 'views/modules/common/location/helpers';
import './index.less';

class LocationIconButton {
    constructor(item) {
        this.module = item;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleOpenModalClick);

    }

    handleOpenModalClick = (e) => {
        locationOpenModal();
    }
}

const list = document.querySelectorAll('.j-modules-common-location-components-choose-icon-button');

list.forEach((item) => {
    new LocationIconButton(item);
})
