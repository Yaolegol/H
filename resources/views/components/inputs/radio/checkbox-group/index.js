import {addEventListener} from "helpers/events";
import './index.less';

class CheckboxGroup {
    constructor(element) {
        this.module = element;
        this.inputList = [...this.module.querySelectorAll('.j-components-inputs-radio-checkbox-group__input')];
        this.listenGroupName = this.module.dataset.listenGroupName;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = () => {
        this.hiddenInput.checked = this.inputList.some((input) => {
            return input.checked;
        });

        document.dispatchEvent(new CustomEvent('j-event-components-inputs-radio-checkbox-group__click', {
            detail: {
                group: this.listenGroupName,
                isGroupHasCheckedInput: this.hiddenInput.checked,
            }
        }))
    }
}

const list = [...document.querySelectorAll('.j-components-inputs-radio-checkbox-group')];

list.forEach((element) => {
    new CheckboxGroup(element);
});
