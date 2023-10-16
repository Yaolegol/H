import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import './index.less';

class BackButton {
    constructor(element) {
        this.module = element;

        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        history.back();
    }
}

module.initModule('j-components-buttons-back', BackButton);
