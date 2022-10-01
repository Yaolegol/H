import {module} from "helpers/module";
import IMask from 'imask';
import './index.less';

class PhoneInput {
    constructor(element) {
        this.module = element;
        this.input = this.module.querySelector('.j-inputs-phone__input');

        this.init();
    }

    init = () => {
        this.phoneMask = IMask(this.input, {
            lazy: false,
            mask: '+{7}(000)000-00-00',
            placeholderChar: '_',
        });
    }
}

module.initModule('j-inputs-phone', PhoneInput);
