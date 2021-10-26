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

class InputsRadioGroupFirstLevel {
    constructor(element) {
        this.module = element;
        this.groupName = this.module.dataset.groupName;
        this.checkedInput = this.module.querySelector('input[checked]');
        this.value = this.checkedInput ? this.checkedInput.value : null;

        this.init();

        addEventListener(this.module, 'change', this.handleChange);
    }

    handleChange = (e) => {
        this.value = e.target.value;

        this.sendMessage();
    }

    init = () => {
        if(this.value) {
            this.sendMessage();
        }
    }

    sendMessage = () => {
        document.dispatchEvent(new CustomEvent(CHANGE, {
            detail: {
                groupName: this.groupName,
                value: this.value,
            }
        }));
    }
}

const list = [...document.querySelectorAll('.j-inputs-radio-group-first-level')];

list.forEach((element) => {
    new InputsRadioGroupFirstLevel(element);
});
