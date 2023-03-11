import {addEventListener} from "helpers/events";
import './index.less';

class CheckboxGroup {
    constructor(element) {
        this.module = element;
        this.hiddenInput = this.module.querySelector('.j-components-inputs-radio-checkbox-group__hidden-input');
        this.inputList = [...this.module.querySelectorAll('.j-components-inputs-radio-checkbox-group__input')];

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
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
