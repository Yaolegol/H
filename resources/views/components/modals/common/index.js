import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import './index.less';

const {
    COMMON: {
        MODALS: {
            COMMON: {
                CLOSE,
                OPEN,
            }
        }
    }
} = EVENTS_NAMES;

class ModalsCommon {
    constructor(item) {
        this.module = item;
        this.name = this.module.dataset.name

        addEventListener(document, CLOSE, this.handleToggle);
        addEventListener(document, OPEN, this.handleToggle);
        addEventListener(this.module, 'click', this.handleBackdropClick);
    }

    handleBackdropClick = (e) => {
        const isClickedBackdrop = e.target.classList.contains('j-components-modals-common');

        if(isClickedBackdrop) {
            this.module.classList.remove('modals-common_show');
        }
    }

    handleToggle = (e) => {
        const {detail, type} = e;

        if(!detail) {
            return;
        }

        const {name} = detail;

        if(this.name === name) {
            if(type === OPEN) {
                this.module.classList.add('modals-common_show');
            } else if(type === CLOSE) {
                this.module.classList.remove('modals-common_show');
            }
        }
    }
}

const list = document.querySelectorAll('.j-components-modals-common');

list.forEach((item) => {
    new ModalsCommon(item);
})
