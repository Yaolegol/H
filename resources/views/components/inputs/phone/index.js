import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import IMask from 'imask';
import './index.less';

class PhoneInput {
    constructor(element) {
        this.module = element;
        this.input = this.module.querySelector('.j-inputs-phone__input');
        this.inputMask = this.module.querySelector('.j-inputs-phone__input-mask');

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.inputMask, 'input', this.handleInput);
    }

    handleInput = (e) => {
        this.input.value = this.IMaskInstance.unmaskedValue;
    }

    init = () => {
        this.IMaskInstance = IMask(this.inputMask, {
            lazy: false,
            mask: '+{7}(000)000-00-00',
            placeholderChar: '_',
        });
    }
}

module.initModule('j-inputs-phone', PhoneInput);
