import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import './index.less';

class InputsCode {
    constructor(element) {
        this.module = element;
        this.inputsList = [...this.module.querySelectorAll('.j-components-inputs-code__input')];

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'keydown', this.handleKeydown);
        addEventListener(this.module, 'input', this.handleInput);
        addEventListener(this.module, 'beforeinput', this.handleBeforeInput);
    }

    checkAllInputsHasValue = (e) => {
        const isAllInputsHasValue = this.inputsList.every((input) => {
            return Boolean(input.value);
        });

        if(!isAllInputsHasValue) {
            return;
        }

        const code = this.inputsList.reduce((acc, input) => {
            return acc + input.value;
        }, '');

        this.module.dispatchEvent(new CustomEvent('j-event-components-inputs-code__complete', {
            detail: {
                code
            }
        }));
    }

    handleBeforeInput = (e) => {
        const {data} = e;

        if(!data) {
            return;
        }

        const isAllow = /\d/.test(data);

        if(!isAllow) {
            e.preventDefault();
        }
    }

    handleKeydown = (e) => {
        const {key, target} = e;

        if(key === 'Backspace' && !target.value) {
            this.tryFocusInput(e.target, false);
        }
    }

    handleInput = (e) => {
        const {target} = e;

        if(!target.value) {
            return;
        }

        this.tryFocusInput(target);
        this.checkAllInputsHasValue();
    }

    tryFocusInput = (currentFocusedInput, isNeedFocusNextInput = true) => {
        const inputIndex = this.inputsList.findIndex((input) => {
            return input === currentFocusedInput;
        });

        const nextInputIndex = isNeedFocusNextInput ? inputIndex + 1 : inputIndex - 1;

        const nextInput = this.inputsList[nextInputIndex];

        if(!nextInput) {
            return;
        }

        nextInput.focus()
    }
}


module.initModule('j-components-inputs-code', InputsCode);
