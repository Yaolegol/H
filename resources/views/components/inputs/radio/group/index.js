import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import 'views/components/inputs/radio/item';
import './index.less';

const {
    INPUTS: {
        RADIO: {
            GROUP: {
                CHANGE,
                RESET,
            }
        }
    }
} = EVENTS_NAMES;

class InputsRadioGroup {
    constructor(element) {
        this.module = element;
        this.dispatchEvents = this.module.hasAttribute('data-dispatch-events');
        this.groupName = this.module.dataset.radioGroupName;
        this.value = null;

        if(this.dispatchEvents) {
            addEventListener(this.module, 'change', this.handleChange);
        }

        addEventListener(document, RESET, this.handleReset);
    }

    handleChange = (e) => {
        this.value = e.target.value;

        this.sendMessage();
    }

    handleReset = (e) => {
        const {detail} = e;
        const {groupName} = detail;

        if(groupName === this.groupName) {
            const checkedInput = this.module.querySelector('input:checked');

            if(checkedInput) {
                checkedInput.checked = false;
            }
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

const list = [...document.querySelectorAll('.j-inputs-radio-group')];

list.forEach((element) => {
    new InputsRadioGroup(element);
});
