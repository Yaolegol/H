import {addEventListener} from "helpers/events";
import 'views/components/inputs/checkbox/common';
import './index.less';

class CheckboxGroup {
    constructor(element) {
        this.module = element;
        this.groupId = this.module.dataset.groupId;
        this.hiddenInput = this.module.querySelector('.j-components-inputs-radio-checkbox-group__hidden-input');
        this.inputList = [...this.module.querySelectorAll('.j-components-inputs-radio-checkbox-group__input')];

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'change', this.handleChange);
        addEventListener(document, 'j-event-components-inputs-checkbox-select-all__change', this.handleSelectAllChange);
        addEventListener(document, 'j-event-module__init', this.handleModulesInit);
    }

    handleChange = () => {
        const hasChecked = this.inputList.some((input) => {
            return input.checked;
        });
        const hasUnChecked = this.inputList.some((input) => {
            return !input.checked;
        });

        this.hiddenInput.checked = hasChecked;
        this.notifyChange(hasChecked, hasUnChecked);
    }

    handleModulesInit = () => {
        this.handleChange();
    }

    handleSelectAllChange = (e) => {
        const {id, isChecked} = e.detail;

        if(this.groupId !== id) {
            return;
        }

        this.inputList.forEach((input) => {
            input.checked = isChecked;
        });

        this.notifyChange(isChecked, !isChecked);
    }

    notifyChange = (hasChecked, hasUnChecked) => {
        document.dispatchEvent(new CustomEvent('j-event-components-inputs-radio-checkbox-group__change', {
            detail: {
                id: this.groupId,
                hasCheckedInput: hasChecked,
                hasUnCheckedInput: hasUnChecked,
            }
        }))
    }
}

const list = [...document.querySelectorAll('.j-components-inputs-radio-checkbox-group')];

list.forEach((element) => {
    new CheckboxGroup(element);
});
