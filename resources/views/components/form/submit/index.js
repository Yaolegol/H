import {addEventListener} from "helpers/events";
import {module} from "helpers/module";

class FormSubmit {
    constructor(element) {
        this.module = element;
        this.submitButton = this.module.querySelector('.j-components-form-submit__submit-button');
        this.submitButtonText = this.submitButton.innerHTML;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'submit', this.handleSubmit);
        addEventListener(this.module, 'j-event-components-form-submit__enable-submit-button', this.handleEnableSubmitButton);
    }

    handleEnableSubmitButton = (e) => {
        this.toggleSubmitButton();
    }

    handleSubmit = (e) => {
        this.toggleSubmitButton(true);
    }

    toggleSubmitButton = (isDisable) => {
        if(isDisable) {
            this.submitButton.classList.add('button_disabled');
            this.submitButton.innerHTML = '';
            this.submitButton.classList.add('preloader');
        } else {
            this.submitButton.classList.remove('button_disabled');
            this.submitButton.innerHTML = this.submitButtonText;
            this.submitButton.classList.remove('preloader');
        }
    }
}

module.initModule('j-components-form-submit', FormSubmit);
