import {addEventListener} from "helpers/events";
import 'views/components/inputs/checkbox/common';
import './index.less';

class CheckboxGroup {
    constructor(element) {
        this.module = element;
        this.id = this.module.dataset.id;
        this.hiddenInput = this.module.querySelector('.j-components-inputs-radio-checkbox-group__hidden-input');
        this.inputList = [...this.module.querySelectorAll('.j-components-inputs-radio-checkbox-group__input')];

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
        addEventListener(document, 'j-event-components-inputs-checkbox-select-all__change', this.handleSelectAllChange);
    }

    handleClick = () => {
        const hasChecked = this.inputList.some((input) => {
            return input.checked;
        });

        this.hiddenInput.checked = hasChecked;
        this.notifyClick(hasChecked);
    }

    handleSelectAllChange = (e) => {
        const {id, isChecked} = e.detail;

        if(this.id !== id) {
            return;
        }

        this.inputList.forEach((input) => {
            input.checked = isChecked;
        });

        this.notifyClick(isChecked);
    }

    notifyClick = (hasChecked) => {
        document.dispatchEvent(new CustomEvent('j-event-components-inputs-radio-checkbox-group__click', {
            detail: {
                id: this.id,
                hasCheckedInput: hasChecked,
            }
        }))
    }
}

const list = [...document.querySelectorAll('.j-components-inputs-radio-checkbox-group')];

list.forEach((element) => {
    new CheckboxGroup(element);
});
