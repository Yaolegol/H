import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import {module} from "helpers/module";
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
        this.closeButton = this.module.querySelector('.j-components-modals-base-common__close-button');
        this.contentContainer = this.module.querySelector('.j-components-modals-base-common__content-container');
        this.name = this.module.dataset.name;

        this.bind();
    }

    bind = () => {
        addEventListener(document, CLOSE, this.handleClose);
        addEventListener(document, OPEN, this.handleOpen);
        addEventListener(this.module, 'click', this.handleBackdropClick);
        addEventListener(this.closeButton, 'click', this.handleCloseButtonClick);
    }

    handleBackdropClick = (e) => {
        const isBackdropClicked = this.isBackdropClicked(e.target);

        if(isBackdropClicked) {
            this.sendCloseModalEvent();
        }
    }

    handleClose = () => {
        this.module.classList.remove('components-modals-base-common_show');
        document.body.classList.remove('j-style-overflow-hidden');
        this.contentContainer.innerHTML = '';
    }

    handleCloseButtonClick = () => {
        this.sendCloseModalEvent();
    }

    handleOpen = (e) => {
        const {detail} = e;
        const {templateId} = detail;

        const template = document.querySelector(`.j-template[data-template-id="${templateId}"]`);

        if(!template) {
            return;
        }

        this.module.classList.add('components-modals-base-common_show');
        document.body.classList.add('j-style-overflow-hidden');

        this.contentContainer.innerHTML = template.content.firstElementChild.outerHTML;
        module.updateModules();
    }

    isBackdropClicked = (target) => {
        return target.classList.contains('j-components-modals-base-common') || target.classList.contains('j-components-modals-base-common__body-block');
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

module.initModule('j-components-modals-base-common', ModalsCommon);
