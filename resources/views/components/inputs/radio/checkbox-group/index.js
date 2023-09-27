import {addEventListener} from "helpers/events";
import 'views/components/inputs/checkbox/common';
import './index.less';

class CheckboxGroup {
    constructor(element) {
        this.module = element;
        this.id = this.module.dataset.id;
        this.inputList = [...this.module.querySelectorAll('.j-components-inputs-radio-checkbox-group__input')];
        this.listenGroupName = this.module.dataset.listenGroupName;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
        addEventListener(document, 'j-event-components-inputs-checkbox-select-all__change', this.handleSelectAllChange);
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

    handleSelectAllChange = (e) => {
        const {id, isChecked} = e.detail;

        if(this.id !== id) {
            return;
        }

        this.inputList.forEach((input) => {
            input.checked = isChecked;
        });
    }
}

const list = [...document.querySelectorAll('.j-components-inputs-radio-checkbox-group')];

list.forEach((element) => {
    new CheckboxGroup(element);
});
