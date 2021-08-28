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

class InputsRadioGroup {
    constructor(element) {
        this.module = element;
        this.dispatchEvents = this.module.hasAttribute('data-dispatch-events');
        this.groupName = this.module.dataset.groupName;
        this.value = null;

        if(this.dispatchEvents) {
            addEventListener(this.module, 'change', this.handleChange);
        }
    }

    handleChange = (e) => {
        this.value = e.target.value;

        this.sendMessage();
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
