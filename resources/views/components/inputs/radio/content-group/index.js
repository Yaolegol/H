import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import 'views/components/inputs/radio/item';
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

class InputsRadioContentGroup {
    constructor(element) {
        this.module = element;
        this.contentContainerList = [...this.module.querySelectorAll('.j-inputs-radio-content-group__content-container')];
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

        if(groupName === this.listenGroupName) {
            this.module.classList.remove('inputs-radio-content_hidden');

            if(this.activeContentContainer) {
                this.activeContentContainer.classList.remove('inputs-radio-content__content-container_active');
                const checkedInput = this.activeContentContainer.querySelector('input:checked');

                if(checkedInput) {
                    checkedInput.checked = false;
                }
            }

            this.activeContentContainer = this.contentContainersMap[value];
            this.activeContentContainer.classList.add('inputs-radio-content__content-container_active');
        }
    }
}

const list = [...document.querySelectorAll('.j-inputs-radio-content-group')];

list.forEach((element) => {
    new InputsRadioContentGroup(element);
});
