import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import 'views/components/inputs/radio/group-second-level';
import 'views/components/inputs/radio/radio-item';
import './index.less';

const {
    INPUTS: {
        RADIO: {
            GROUP: {
                CHANGE,
                INIT,
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

        addEventListener(this.module, 'click', this.handleClick);

        this.init();
    }

    handleClick = (e) => {
        const {target} = e;
        const {tagName, value} = target;


        const isInput = tagName === 'INPUT';

        if(!isInput) {
            return;
        }

        const isSameValue = this.value === value;

        if(isSameValue) {
            e.target.checked = false;
            this.value = null;
        } else {
            this.value = value;
        }

        this.sendMessage(CHANGE);
    }

    init = () => {
        if(this.value) {
            this.sendMessage(INIT);
        }
    }

    sendMessage = (event) => {
        document.dispatchEvent(new CustomEvent(event, {
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
