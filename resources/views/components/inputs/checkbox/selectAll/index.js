import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import 'views/components/inputs/checkbox/common';
import './index.less';

class SelectAllCheckbox {
    constructor(element) {
        this.module = element;
        this.input = this.module.querySelector('.j-components-inputs-checkbox-select-all__input');
        this.id = this.module.dataset.id;

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event-components-inputs-checkbox-select-all__set-checked', this.handleSetChecked);
        addEventListener(this.input, 'change', this.handleChange);
        addEventListener(document, 'j-event-components-inputs-radio-checkbox-group__change', this.handleClickSecondLevel);
    }

    handleChange = () => {
        this.sendMessage();
    }

    handleClickSecondLevel = (e) => {
        const {id, hasUnCheckedInput} = e.detail;

        if(this.id !== id) {
            return;
        }

        this.input.checked = !hasUnCheckedInput;
    }

    handleSetChecked = (e) => {
        const {isChecked} = e.detail;

        this.input.checked = isChecked;
    }

    sendMessage = () => {
        document.dispatchEvent(new CustomEvent('j-event-components-inputs-checkbox-select-all__change', {
            detail: {
                id: this.id,
                isChecked: this.input.checked,
            }
        }));
    }
}

module.initModule('j-components-inputs-checkbox-select-all', SelectAllCheckbox);
