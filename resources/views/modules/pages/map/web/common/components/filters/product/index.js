import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import {ButtonsFilter} from 'views/components/buttons/filter';
import './index.less';

const {
    COMMON: {
        MODALS: {
            COMMON: {
                OPEN,
            }
        }
    }
} = EVENTS_NAMES;

class FiltersProduct {
    constructor(item) {
        this.module = item;

        this.initButtonsFilter();
        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event--map-filter-update', this.handleUpdateMapFilter)
    }

    handleOpenModalClick = (e) => {
        document.dispatchEvent(new CustomEvent(OPEN, {
            detail: {
                name: 'categories'
            }
        }));
    }

    handleResetClick = (e) => {
        document.dispatchEvent(new CustomEvent('j-event--map-web-filters-open-modal-button__reset'));
    }

    handleUpdateMapFilter = (e) => {
        this.buttonsFilterInstance.setButtonText(e.detail.title);
    }

    initButtonsFilter = () => {
        this.buttonsFilterInstance = new ButtonsFilter({
            container: this.module,
            onClick: this.handleOpenModalClick,
            onReset: this.handleResetClick,
        });
    }
}

const list = document.querySelectorAll('.j-modules-pages-map-web-common-components-filters-product');

list.forEach((item) => {
    new FiltersProduct(item);
})
