import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
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

class ModalsCommon {
    constructor(item) {
        this.module = item;
        this.name = this.module.dataset.name

        addEventListener(document, OPEN, this.handleOpen);
        addEventListener(this.module, 'click', this.handleBackdropClick);
    }

    handleBackdropClick = (e) => {
        const isClickedBackdrop = e.target.classList.contains('j-components-modals-common');

        if(isClickedBackdrop) {
            this.module.classList.remove('modals-common_show');
        }
    }

    handleOpen = (e) => {
        console.log('e')
        console.log(e)
        const {detail} = e;

        if(!detail) {
            return;
        }

        const {name} = detail;

        if(this.name === name) {
            this.module.classList.add('modals-common_show');
        }
    }
}

const list = document.querySelectorAll('.j-components-modals-common');

list.forEach((item) => {
    new ModalsCommon(item);
})
