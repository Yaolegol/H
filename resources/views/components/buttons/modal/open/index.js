import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import {module} from "helpers/module";

const {
    COMMON: {
        MODALS: {
            COMMON: {
                OPEN,
            }
        }
    }
} = EVENTS_NAMES;

class ButtonsModalOpen {
    constructor(item) {
        this.module = item;
        this.templateId = this.module.dataset.templateId;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        document.dispatchEvent(new CustomEvent(OPEN, {
            detail: {
                templateId: this.templateId,
            }
        }));
    }
}

module.initModule('j-components-buttons-modal-open', ButtonsModalOpen);
