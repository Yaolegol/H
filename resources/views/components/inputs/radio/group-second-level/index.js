import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import 'views/components/inputs/radio/checkbox-group';
import './index.less';

const {
    INPUTS: {
        RADIO: {
            GROUP: {
                INIT,
                CHANGE,
            }
        }
    }
} = EVENTS_NAMES;

class InputsRadioGroupSecondLevel {
    constructor(element) {
        this.module = element;
        this.contentContainerList = [...this.module.querySelectorAll('.j-inputs-radio-group-second-level__content-container')];
        this.allInputList = [...this.module.querySelectorAll('.j-components-inputs-radio-checkbox-group__input')];
        this.hiddenInput = this.module.querySelector('.j-inputs-radio-group-second-level__hidden-input');
        this.contentContainersMap = this.getContentContainersMap();
        this.listenGroupName = this.module.dataset.listenGroupName;
        this.activeContentContainer = null;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'change', this.handleChange);
        addEventListener(document, CHANGE, this.handleDocumentChange);
    }

    getContentContainersMap = () => {
        return this.contentContainerList.reduce((acc, contentContainer) => {
            const id = contentContainer.dataset.listenId;

            return {
                ...acc,
                [id]: contentContainer
            }
        }, {});
    }

    handleChange = (e) => {
        this.hiddenInput.checked = this.allInputList.some((input) => {
            return input.checked;
        });
    }

    handleDocumentChange = (e) => {
        const {detail} = e;
        const {groupName, value} = detail;

        if(groupName !== this.listenGroupName) {
            return;
        }

        const contentContainer = this.contentContainersMap[value];

        if(!contentContainer) {
            this.hideContent();

            return;
        }

        this.toggleModule();
        this.hideActiveBlock();
        this.setActiveBlock(contentContainer);
    }

    hideActiveBlock = () => {
        if(this.activeContentContainer) {
            this.activeContentContainer.classList.remove('components-inputs-radio-group-second-level__content-container_active');
        }
    }

    hideContent = () => {
        this.toggleModule(false);
        this.hideActiveBlock();
    }

    setActiveBlock = (content) => {
        this.activeContentContainer = content;
        this.activeContentContainer.classList.add('components-inputs-radio-group-second-level__content-container_active');
    }

    toggleModule = (isShow = true) => {
        if(isShow) {
            this.module.classList.remove('components-inputs-radio-group-second-level_hidden');
        } else {
            this.module.classList.add('components-inputs-radio-group-second-level_hidden');
        }
    }
}

const list = [...document.querySelectorAll('.j-inputs-radio-group-second-level')];

list.forEach((element) => {
    new InputsRadioGroupSecondLevel(element);
});
