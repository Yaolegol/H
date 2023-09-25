import {addEventListener} from "helpers/events";
import {module} from "helpers/module";

class ClickBlock {
    constructor(element) {
        this.module = element;

        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        this.module.classList.add('button_disabled');
    }
}

module.initModule('j-components-click-block', ClickBlock);
