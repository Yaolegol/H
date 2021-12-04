import {addEventListener} from 'helpers/events';
import {mapFiltersOpenModal} from 'views/modules/map/web/filters/helpers';

class MapWebFiltersOpenModalButton {
    constructor(item) {
        this.module = item;

        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        mapFiltersOpenModal();
    }
}

const list = document.querySelectorAll('.j-map-web-filters-open-modal-button');

list.forEach((item) => {
    new MapWebFiltersOpenModalButton(item);
})
