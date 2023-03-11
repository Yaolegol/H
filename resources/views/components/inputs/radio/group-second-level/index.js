import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import 'views/components/inputs/radio/checkbox-group';
import './index.less';

const {
    INPUTS: {
        RADIO: {
            GROUP: {
                CHANGE,
            }
        }
    }
} = EVENTS_NAMES;

class InputsRadioGroupSecondLevel {
    constructor(element) {
        this.module = element;
        this.contentContainerList = [...this.module.querySelectorAll('.j-inputs-radio-group-second-level__content-container')];
        this.contentContainersMap = this.getContentContainersMap();
        this.listenGroupName = this.module.dataset.listenGroupName;
        this.activeContentContainer = null;

        addEventListener(document, CHANGE, this.handleChange);
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
        const {detail} = e;
        const {groupName, value} = detail;

        if(groupName !== this.listenGroupName) {
            return;
        }

        const contentContainer = this.contentContainersMap[value];

        if(!contentContainer) {
            this.module.classList.add('components-inputs-radio-group-second-level_hidden');

            if(this.activeContentContainer) {
                this.activeContentContainer.classList.remove('components-inputs-radio-group-second-level__content-container_active');
            }

            return;
        }

        this.module.classList.remove('components-inputs-radio-group-second-level_hidden');

        if(this.activeContentContainer) {
            this.activeContentContainer.classList.remove('components-inputs-radio-group-second-level__content-container_active');
            const checkedInput = this.activeContentContainer.querySelector('input:checked');

            if(checkedInput) {
                checkedInput.checked = false;
            }
        }

        this.activeContentContainer = contentContainer;
        this.activeContentContainer.classList.add('components-inputs-radio-group-second-level__content-container_active');
    }
}

const list = [...document.querySelectorAll('.j-inputs-radio-group-second-level')];

list.forEach((element) => {
    new InputsRadioGroupSecondLevel(element);
});
