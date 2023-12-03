import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import './index.less';

class CallBack {
    constructor(element) {
        this.module = element;

        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        console.log('click!!!')
    }
}

module.initModule('j-modules-common-callback', CallBack);
