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
        this.closeButton = this.module.querySelector('.j-components-modals-common__close-button');
        this.name = this.module.dataset.name;

        this.bind();
    }

    bind = () => {
        addEventListener(document, CLOSE, this.handleToggle);
        addEventListener(document, OPEN, this.handleToggle);
        addEventListener(this.module, 'click', this.handleBackdropClick);
        addEventListener(this.closeButton, 'click', this.handleCloseButtonClick);
    }

    handleBackdropClick = (e) => {
        const isClickedBackdrop = e.target.classList.contains('j-components-modals-common');

        if(isClickedBackdrop) {
            this.sendCloseModalEvent();
        }
    }

    handleCloseButtonClick = () => {
        this.sendCloseModalEvent();
    }

    handleToggle = (e) => {
        const {detail, type} = e;

        if(!detail) {
            return;
        }

        const {name} = detail;

        if(this.name === name) {
            if(type === OPEN) {
                this.module.classList.add('components-modals-common_show');
                document.body.classList.add('j-style-overflow-hidden');
            } else if(type === CLOSE) {
                this.module.classList.remove('components-modals-common_show');
                document.body.classList.remove('j-style-overflow-hidden');
            }
        }
    }

    sendCloseModalEvent = () => {
        document.dispatchEvent(new CustomEvent(CLOSE, {
            detail: {
                name: this.name,
                type: CLOSE,
            }
        }));
    }
}

const list = document.querySelectorAll('.j-components-modals-common');

list.forEach((item) => {
    new ModalsCommon(item);
})
