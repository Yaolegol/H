import {EVENTS_NAMES} from "events/index";
import {addEventListener} from "helpers/events";
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

class CheckboxGroup {
    constructor(element) {
        this.module = element;
        this.hiddenInput = this.module.querySelector('.j-components-inputs-radio-checkbox-group__hidden-input');
        this.inputList = [...this.module.querySelectorAll('.j-components-inputs-radio-checkbox-group__input')];
        this.listenGroupName = this.module.dataset.listenGroupName;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
        addEventListener(document, CHANGE, this.handleChange);
    }

    handleChange = (e) => {
        const {detail} = e;
        const {groupName} = detail;

        if(groupName !== this.listenGroupName) {
            return;
        }

        this.inputList.forEach((input) => {
            input.checked = false;
        });

        this.hiddenInput.checked = false;
    }

    handleClick = () => {
        this.hiddenInput.checked = this.inputList.some((input) => {
            return input.checked;
        });
    }
}

const list = [...document.querySelectorAll('.j-components-inputs-radio-checkbox-group')];

list.forEach((element) => {
    new CheckboxGroup(element);
});
