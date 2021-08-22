import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import 'views/components/inputs/radio/item';
import './index.less';

const {
    INPUTS: {
        RADIO: {
            GROUP: {
                CHANGE
            }
        }
    }
} = EVENTS_NAMES;

class InputsRadioGroup {
    constructor(element) {
        this.module = element;
        this.groupName = this.module.dataset.radioGroupName;
        this.value = null;

        addEventListener(this.module, 'change', this.handleChange);
        addEventListener(document, CHANGE, (e) => {
            console.log('--- e.detail');
            console.log(e.detail);
        });
    }

    handleChange = (e) => {
        if(this.value !== e.target.value) {
            this.value = e.target.value;

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

const list = [...document.querySelectorAll('.j-inputs-radio-group')];

list.forEach((element) => {
    new InputsRadioGroup(element);
});
