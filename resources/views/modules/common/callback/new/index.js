import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import 'views/components/inputs/send';
import './index.less';

class CallBackNew {
    constructor(element) {
        this.module = element;
        this.button = this.module.querySelector('.j-modules-common-callback-new__button');
        this.input = this.module.querySelector('.j-modules-common-callback-new__input');
        this.isSend = false;

        addEventListener(this.button, 'click', this.handleClick);
    }

    handleClick = (e) => {
        console.log('click!!!')
        console.log('this.input.value');
        console.log(this.input.value);

        if(this.isSend) {
            return;
        }

        this.isSend = true;
        this.module.classList.add('success');
    }
}

module.initModule('j-modules-common-callback-new', CallBackNew);
