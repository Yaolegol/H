import {ButtonsFilter} from "views/components/buttons/filter";
import {locationOpenModal} from 'views/modules/common/location/helpers';
import './index.less';

class LocationFilterButton {
    constructor(item) {
        this.module = item;

        this.initButtonsFilter();
    }

    handleOpenModalClick = () => {
        locationOpenModal();
    }

    handleResetClick = () => {
        document.dispatchEvent(new CustomEvent('j-event--location-common-open-modal-button__reset'));
    }

    initButtonsFilter = () => {
        this.buttonsFilterInstance = new ButtonsFilter({
            container: this.module,
            onClick: this.handleOpenModalClick,
            onReset: this.handleResetClick,
        });
    }
}

const list = document.querySelectorAll('.j-modules-common-location-components-choose-filter-button');

list.forEach((item) => {
    new LocationFilterButton(item);
})
